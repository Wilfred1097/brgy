<?php
include 'conn.php'; // Ensure correct database connection

header('Content-Type: application/json'); // Return JSON response

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Get the transaction ID from the AJAX request
        $transactionId = isset($_POST['id']) ? intval($_POST['id']) : 0;

        if ($transactionId > 0) {
            // Prepare SQL DELETE query
            $sql = "DELETE FROM financial_transaction WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $transactionId, PDO::PARAM_INT);

            // Execute the query
            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Transaction successfully deleted!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to delete transaction."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid transaction ID."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
