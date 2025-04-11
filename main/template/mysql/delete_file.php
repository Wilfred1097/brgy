<?php
include 'conn.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fileId = $_POST['id'];

    try {
        // Prepare SQL to delete the file by ID
        $stmt = $pdo->prepare("DELETE FROM files WHERE id = :id");
        $stmt->bindParam(':id', $fileId);
        $stmt->execute();

        echo json_encode(['success' => true, 'message' => 'File deleted successfully.']);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request.']);
}
?>