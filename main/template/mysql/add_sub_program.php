<?php
require 'conn.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $raoProgramId = $_POST['raoProgramId']; // Get the selected RAO program ID
    $programName = $_POST['programName'];
    $amount = $_POST['amount'];

    try {
        // Start a transaction
        $pdo->beginTransaction();

        // Insert into sub_program
        $sql = "INSERT INTO sub_program (rao_program_id, name, amount) VALUES (:raoProgramId, :programName, :amount)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':raoProgramId', $raoProgramId, PDO::PARAM_INT);
        $stmt->bindParam(':programName', $programName, PDO::PARAM_STR);
        $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);
        $stmt->execute();

        // Update remaining_amount in rao_program
        $updateSql = "UPDATE rao_program SET remaining_amount = remaining_amount - :amount WHERE id = :raoProgramId";
        $updateStmt = $pdo->prepare($updateSql);
        $updateStmt->bindParam(':amount', $amount, PDO::PARAM_STR);
        $updateStmt->bindParam(':raoProgramId', $raoProgramId, PDO::PARAM_INT);
        $updateStmt->execute();

        // Commit transaction
        $pdo->commit();

        echo json_encode(['status' => 'success', 'message' => 'Sub Program added successfully']);
    } catch (PDOException $e) {
        // Roll back transaction if something goes wrong
        $pdo->rollBack();
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>
