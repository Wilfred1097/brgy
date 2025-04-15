<?php
require 'conn.php'; // Ensure conn.php is in the same directory

error_reporting(E_ALL);
ini_set('display_errors', 1);

header("Content-Type: application/json"); // Ensures JSON response

// Process POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input data
    $firstName = $_POST['firstName'] ?? '';
    $middleName = $_POST['middleName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $address = $_POST['address'] ?? '';
    $dob = $_POST['dateOfBirth'] ?? '';
    $age = $_POST['age'] ?? 0;
    $role = $_POST['role'] ?? '';
    $gmail = $_POST['gmail'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    // Check if password and confirm password match
    if ($password !== $confirmPassword) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Passwords do not match'
        ]);
        exit;
    }

    // Check for duplicate username or gmail
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR gmail = :gmail");
    $stmt->execute([':username' => $username, ':gmail' => $gmail]);
    if ($stmt->rowCount() > 0) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Username or Gmail already exists'
        ]);
        exit;
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Handle file upload if provided
    $imagePath = null;
    if (!empty($_FILES['imageUpload']['name'])) {
        $uploadDir = 'uploads/profile/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileTmpPath = $_FILES['imageUpload']['tmp_name'];
        $fileName = $_FILES['imageUpload']['name'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExts = ['png', 'jpg', 'jpeg'];
        if (in_array($fileExt, $allowedExts)) {
            $newFileName = uniqid() . '.' . $fileExt;
            $destPath = $uploadDir . $newFileName;
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $imagePath = $destPath;
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Error moving uploaded file'
                ]);
                exit;
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid file extension'
            ]);
            exit;
        }
    }

    // Insert data into the users table
    $sql = "INSERT INTO users
            (first_name, middle_name, last_name, address, dob, age, role, gmail, username, password, image_path)
            VALUES
            (:first_name, :middle_name, :last_name, :address, :dob, :age, :role, :gmail, :username, :password, :image_path)";

    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([
            ':first_name' => $firstName,
            ':middle_name' => $middleName,
            ':last_name' => $lastName,
            ':address' => $address,
            ':dob' => $dob,
            ':age' => $age,
            ':role' => $role,
            ':gmail' => $gmail,
            ':username' => $username,
            ':password' => $hashedPassword,
            ':image_path' => $imagePath
        ]);
        echo json_encode([
            'status' => 'success',
            'message' => 'User added successfully'
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
}
?>
