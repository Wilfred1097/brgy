<?php
require 'conn.php'; // Include database connection

$response = ["status" => "error", "message" => "Something went wrong!"];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $title = $_POST['eventName'] ?? '';
    $description = $_POST['eventDescription'] ?? '';
    $start_date = $_POST['startDate'] ?? '';
    $start_time = $_POST['startTime'] ?? '';
    $end_date = $_POST['endDate'] ?? '';
    $end_time = $_POST['endTime'] ?? '';
    $location = $_POST['eventLocation'] ?? '';

    // Validate required fields
    if (empty($title) || empty($description) || empty($start_date) || empty($start_time) || empty($end_date) || empty($end_time) || empty($location)) {
        $response["message"] = "All fields are required.";
        echo json_encode($response);
        exit;
    }

    // Handle file upload (optional)
    $imageName = null; // Default to NULL if no image is uploaded
    if (!empty($_FILES['eventImage']['name'])) {
        $image = $_FILES['eventImage'];
        $allowedTypes = ['image/png', 'image/jpeg', 'image/jpg'];

        // Ensure uploads directory exists
        $targetDir = "./uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Generate unique filename
        $imageName = time() . "_" . basename($image['name']);
        $targetFilePath = $targetDir . $imageName;

        // Validate file type using MIME type detection
        $fileMime = mime_content_type($image["tmp_name"]);
        if (!in_array($fileMime, $allowedTypes)) {
            $response["message"] = "Invalid file format. Only PNG, JPEG, and JPG are allowed.";
            echo json_encode($response);
            exit;
        }

        // Move uploaded file to the target directory
        if (!move_uploaded_file($image["tmp_name"], $targetFilePath)) {
            $response["message"] = "Failed to upload image.";
            echo json_encode($response);
            exit;
        }
    }

    // Insert event details into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO events (title, description, start_date, start_time, end_date, end_time, location, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $description, $start_date, $start_time, $end_date, $end_time, $location, $imageName]);

        $response["status"] = "success";
        $response["message"] = "Event added successfully!";
    } catch (PDOException $e) {
        $response["message"] = "Database error: " . $e->getMessage();
    }
}

// Return response as JSON
echo json_encode($response);
?>
