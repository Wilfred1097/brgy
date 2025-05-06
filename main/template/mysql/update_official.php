<?php
require 'conn.php'; // Database connection

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Get user ID
        $userId = $_POST['userId'] ?? '';

        if (empty($userId)) {
            echo json_encode(["status" => "error", "message" => "User ID is required!"]);
            exit;
        }

        // Get form data
        $firstName = $_POST['firstName'] ?? '';
        $middleName = $_POST['middleName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $address = $_POST['address'] ?? '';
        $dob = $_POST['dateOfBirth'] ?? ''; // Ensure you're sending 'dateOfBirth' from the form
        $age = $_POST['age'] ?? '';
        $position = $_POST['position'] ?? '';
        $gmail = $_POST['gmail'] ?? '';
        $phone_number = $_POST['phone_number'] ?? '';

        // Validate required fields
        if (empty($firstName) || empty($lastName) || empty($address) || empty($dob) || empty($age) || empty($position) || empty($phone_number)) {
            echo json_encode(["status" => "error", "message" => "All required fields must be filled!"]);
            exit;
        }

        // Handle image upload (if a new image is uploaded)
        if (!empty($_FILES['imageUpload']['name'])) {
            $image = $_FILES['imageUpload'];
            $imageName = time() . '_' . basename($image['name']); // Unique image name
            $imagePath = "uploads/officials/" . $imageName; // Define upload path

            // Move uploaded file to the designated folder
            if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
                echo json_encode(["status" => "error", "message" => "Failed to upload image."]);
                exit;
            }

            // Update query including image path
            $query = "UPDATE officials SET first_name = ?, middle_name = ?, last_name = ?, address = ?, date_of_birth = ?, age = ?, position = ?, gmail = ?, phone_number = ?, image_path = ? WHERE id = ?";
            $params = [$firstName, $middleName, $lastName, $address, $dob, $age, $position, $gmail, $phone_number, $imagePath, $userId];
        } else {
            // Update query without changing the image
            $query = "UPDATE officials SET first_name = ?, middle_name = ?, last_name = ?, address = ?, date_of_birth = ?, age = ?, position = ?, gmail = ?, phone_number = ? WHERE id = ?";
            $params = [$firstName, $middleName, $lastName, $address, $dob, $age, $position, $gmail, $phone_number, $userId];
        }

        // Prepare and execute SQL update query
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);

        if ($stmt->rowCount() > 0) {
            echo json_encode(["status" => "success", "message" => "Officials updated successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "No changes made."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>