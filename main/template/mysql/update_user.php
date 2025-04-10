<?php
require 'conn.php'; // Database connection
session_start(); // Start session if using session variables

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
        $position = $_POST['position'] ?? ''; // Updated to 'position'
        $gmail = $_POST['gmail'] ?? '';
        $phoneNumber = $_POST['phone_number'] ?? ''; // Updated to 'phone_number'
        
        // Handle image upload (if a new image is uploaded)
        if (!empty($_FILES['imageUpload']['name'])) {
            $image = $_FILES['imageUpload'];
            $imageName = time() . '_' . basename($image['name']); // Unique image name
            $imagePath = "uploads/profile/" . $imageName; // Define upload path

            // Move uploaded file to the designated folder
            if (!move_uploaded_file($image['tmp_name'], $imagePath)) {
                echo json_encode(["status" => "error", "message" => "Failed to upload image."]);
                exit;
            }

            // Update query including image path
            $query = "UPDATE officials
                      SET first_name = ?, middle_name = ?, last_name = ?, address = ?, date_of_birth = ?,
                          age = ?, position = ?, gmail = ?, phone_number = ?, image = ?
                      WHERE id = ?";
            $params = [$firstName, $middleName, $lastName, $address, $dob, $age, $position, $gmail, $phoneNumber, $imagePath, $userId];
        } else {
            // Update query without changing the image
            $query = "UPDATE officials
                      SET first_name = ?, middle_name = ?, last_name = ?, address = ?, date_of_birth = ?,
                          age = ?, position = ?, gmail = ?, phone_number = ?
                      WHERE id = ?";
            $params = [$firstName, $middleName, $lastName, $address, $dob, $age, $position, $gmail, $phoneNumber, $userId];
        }

        // Prepare and execute SQL update query
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);

        if ($stmt->rowCount() > 0) {
            echo json_encode(["status" => "success", "message" => "User updated successfully!"]);
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