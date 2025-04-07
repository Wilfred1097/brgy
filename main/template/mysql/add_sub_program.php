<?php
require 'conn.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $raoProgramId = $_POST['raoProgramId']; // Get the selected RAO program ID
    $programName = $_POST['programName'];
    $amount = $_POST['amount'];

    try {
        // Prepare SQL statement
        $sql = "INSERT INTO sub_program (rao_program_id, name, amount) VALUES (:raoProgramId, :programName, :amount)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':raoProgramId', $raoProgramId, PDO::PARAM_INT);
        $stmt->bindParam(':programName', $programName, PDO::PARAM_STR);
        $stmt->bindParam(':amount', $amount, PDO::PARAM_STR);

        // Execute statement
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Sub Program added successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to add Sub Program']);
        }
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>