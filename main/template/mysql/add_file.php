<?php
include 'conn.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if file was uploaded without errors
    if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] == 0) {
        $fileName = $_POST['fileName'];
        $fileUpload = $_FILES['fileUpload'];
        
        // Define the upload directory
        $uploadDir = 'uploads/files/';
        $uploadFilePath = $uploadDir . basename($fileUpload['name']);

        // Check if the upload directory exists, if not create it
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Move the uploaded file to the uploads/files directory
        if (move_uploaded_file($fileUpload['tmp_name'], $uploadFilePath)) {
            // Prepare SQL statement to insert file details into the database
            $stmt = $pdo->prepare("INSERT INTO files (file_name, file_path, uploaded_at) VALUES (:file_name, :file_path, NOW())");
            $stmt->bindParam(':file_name', $fileName);
            $stmt->bindParam(':file_path', $uploadFilePath);
        
            if ($stmt->execute()) {
                echo json_encode(['success' => true, 'message' => 'File uploaded and recorded successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Database error: Could not save file information.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'File upload error: Could not move the uploaded file.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No file uploaded or file upload error.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>