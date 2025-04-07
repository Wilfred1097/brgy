<?php
require 'conn.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $year = $_POST['year'];
    $programName = $_POST['programName'];
    $amount = $_POST['amount'];

    try {
        // Prepare SQL statement
        $sql = "INSERT INTO rao_program (year, name, amount) VALUES (:year, :programName, :amount)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->bindParam(':programName', $programName, PDO::PARAM_STR);
        $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);

        // Execute statement
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'RAO Program added successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add RAO Program']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>