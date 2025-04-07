<?php
require 'conn.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $year = $_POST['year'];
    $programName = $_POST['programName'];
    $amount = $_POST['amount'];

    try {
        // Prepare SQL statement
        $sql = "UPDATE rao_program SET year = :year, name = :programName, amount = :amount WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        $stmt->bindParam(':programName', $programName, PDO::PARAM_STR);
        $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);

        // Execute statement
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'RAO Program updated successfully']);
        } else {
            $errorInfo = $stmt->errorInfo();
            echo json_encode(['status' => 'error', 'message' => 'Failed to update RAO Program', 'error' => $errorInfo]);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>