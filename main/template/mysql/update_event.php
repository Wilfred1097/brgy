<?php
require 'conn.php'; // Database connection

header('Content-Type: application/json'); // JSON Response

$response = ["status" => "error", "message" => "Something went wrong!"];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $eventId = $_POST['eventId'] ?? ''; // Get event ID
    $title = $_POST['eventName'] ?? '';
    $description = $_POST['eventDescription'] ?? '';
    $startDate = $_POST['startDate'] ?? '';
    $startTime = $_POST['startTime'] ?? '';
    $endDate = $_POST['endDate'] ?? '';
    $endTime = $_POST['endTime'] ?? '';
    $location = $_POST['eventLocation'] ?? '';

    // Validate required fields
    if (empty($eventId) || empty($title) || empty($description) || empty($startDate) || empty($startTime) || empty($endDate) || empty($endTime) || empty($location)) {
        $response["message"] = "All fields are required.";
        echo json_encode($response);
        exit;
    }

    // Handle Image Upload (Optional)
    $imageName = null;
    if (isset($_FILES['eventImage']) && $_FILES['eventImage']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "./uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $image = $_FILES['eventImage'];
        $imageName = time() . "_" . basename($image['name']); // Unique filename
        $targetFilePath = $targetDir . $imageName;
        $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];

        // Validate file type
        $fileMime = mime_content_type($image["tmp_name"]);
        if (!in_array($fileMime, $allowedTypes)) {
            $response["message"] = "Invalid file format. Only PNG, JPEG, and JPG are allowed.";
            echo json_encode($response);
            exit;
        }

        // Move uploaded file
        if (!move_uploaded_file($image["tmp_name"], $targetFilePath)) {
            $response["message"] = "Failed to upload image.";
            echo json_encode($response);
            exit;
        }
    }

    // Update event in database
    try {
        if ($imageName) {
            $stmt = $pdo->prepare("UPDATE events SET title=?, description=?, start_date=?, start_time=?, end_date=?, end_time=?, location=?, image=? WHERE id=?");
            $stmt->execute([$title, $description, $startDate, $startTime, $endDate, $endTime, $location, $imageName, $eventId]);
        } else {
            $stmt = $pdo->prepare("UPDATE events SET title=?, description=?, start_date=?, start_time=?, end_date=?, end_time=?, location=? WHERE id=?");
            $stmt->execute([$title, $description, $startDate, $startTime, $endDate, $endTime, $location, $eventId]);
        }

        if ($stmt->rowCount() > 0) {
            $response["status"] = "success";
            $response["message"] = "Event updated successfully!";
        } else {
            $response["message"] = "No changes made or event not found.";
        }
    } catch (PDOException $e) {
        $response["message"] = "Database error: " . $e->getMessage();
    }
}

// Return response as JSON
echo json_encode($response);
?>
