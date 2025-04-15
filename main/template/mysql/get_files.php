<?php
include 'conn.php'; // Include your database connection
require 'check_cookies.php'; // Check if the cookie is present

try {
    // Prepare the SQL query to retrieve all files
    $stmt = $pdo->prepare("SELECT * FROM files");
    $stmt->execute();

    // Fetch all results
    $files = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return data as JSON
    echo json_encode(['success' => true, 'data' => $files]);
} catch (PDOException $e) {
    // Handle error if something goes wrong
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>