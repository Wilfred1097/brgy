<?php
require 'conn.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $raoProgramId = $_POST['raoProgramId'];
    $programName = $_POST['programName'];
    $amount = $_POST['amount'];

    try {
        // Prepare SQL statement
        $sql = "UPDATE sub_program SET rao_program_id = :raoProgramId, name = :programName, amount = :amount WHERE id = :id";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':raoProgramId', $raoProgramId, PDO::PARAM_INT);
        $stmt->bindParam(':programName', $programName, PDO::PARAM_STR);
        $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);

        // Execute statement
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Sub Program updated successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update Sub Program']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>