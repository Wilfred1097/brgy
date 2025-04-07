<?php
require 'conn.php'; // Ensure database connection

error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json"); // JSON response

// Process only POST requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Retrieve form data
        $firstName = $_POST['firstName'] ?? '';
        $middleName = $_POST['middleName'] ?? '';
        $lastName = $_POST['lastName'] ?? '';
        $address = $_POST['address'] ?? '';
        $dob = $_POST['dateOfBirth'] ?? '';
        $age = $_POST['age'] ?? 0;
        $position = $_POST['position'] ?? '';
        $gmail = $_POST['gmail'] ?? '';
        $phoneNumber = $_POST['phone_number'] ?? '';

        // Validate required fields
        if (empty($firstName) || empty($lastName) || empty($address) || empty($dob) || empty($position) || empty($gmail) || empty($phoneNumber)) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
            exit;
        }

        // Check for duplicate Gmail or phone number
        $stmt = $pdo->prepare("SELECT 1 FROM officials WHERE gmail = :gmail OR phone_number = :phone_number");
        $stmt->execute([':gmail' => $gmail, ':phone_number' => $phoneNumber]);
        if ($stmt->rowCount() > 0) {
            echo json_encode(['status' => 'error', 'message' => 'Gmail or phone number already exists']);
            exit;
        }

        // Handle image upload
        $imagePath = null;
        if (!empty($_FILES['imageUpload']['name'])) {
            $uploadDir = 'uploads/officials/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

            $fileTmpPath = $_FILES['imageUpload']['tmp_name'];
            $fileName = $_FILES['imageUpload']['name'];
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedExts = ['png', 'jpg', 'jpeg'];

            if (!in_array($fileExt, $allowedExts)) {
                echo json_encode(['status' => 'error', 'message' => 'Invalid file extension']);
                exit;
            }

            $newFileName = uniqid() . '.' . $fileExt;
            $destPath = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $imagePath = $newFileName; // Store only the file name, not the full path
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error moving uploaded file']);
                exit;
            }
        }

        // Insert data into the officials table
        $stmt = $pdo->prepare("INSERT INTO officials (first_name, middle_name, last_name, address, date_of_birth, age, position, gmail, phone_number, image, created_at)
                               VALUES (:first_name, :middle_name, :last_name, :address, :dob, :age, :position, :gmail, :phone_number, :image, NOW())");

        $stmt->execute([
            ':first_name' => $firstName,
            ':middle_name' => $middleName,
            ':last_name' => $lastName,
            ':address' => $address,
            ':dob' => $dob,
            ':age' => $age,
            ':position' => $position,
            ':gmail' => $gmail,
            ':phone_number' => $phoneNumber,
            ':image' => $imagePath
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Official added successfully']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
}
?>
