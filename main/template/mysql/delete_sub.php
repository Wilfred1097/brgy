<?php
include 'conn.php'; // Ensure correct database connection

header('Content-Type: application/json'); // Return JSON response

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Get the Sub Program ID and amount from the AJAX request
        $programId = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $amount = isset($_POST['amount']) ? floatval($_POST['amount']) : 0;

        if ($programId > 0) {
            // Begin transaction to ensure data consistency
            $pdo->beginTransaction();
            
            // First, get the RAO Program ID associated with this Sub Program
            $getRaoSql = "SELECT rao_program_id FROM sub_program WHERE id = :id";
            $getRaoStmt = $pdo->prepare($getRaoSql);
            $getRaoStmt->bindParam(':id', $programId, PDO::PARAM_INT);
            $getRaoStmt->execute();
            
            $raoData = $getRaoStmt->fetch(PDO::FETCH_ASSOC);
            
            if ($raoData) {
                $raoProgramId = $raoData['rao_program_id'];
                
                // Update the remaining_amount in the RAO Program
                $updateRaoSql = "UPDATE rao_program SET remaining_amount = remaining_amount + :amount WHERE id = :id";
                $updateRaoStmt = $pdo->prepare($updateRaoSql);
                $updateRaoStmt->bindParam(':amount', $amount, PDO::PARAM_STR);
                $updateRaoStmt->bindParam(':id', $raoProgramId, PDO::PARAM_INT);
                $updateRaoStmt->execute();
                
                // Now delete the Sub Program
                $deleteSql = "DELETE FROM sub_program WHERE id = :id";
                $deleteStmt = $pdo->prepare($deleteSql);
                $deleteStmt->bindParam(':id', $programId, PDO::PARAM_INT);
                
                // Execute the delete query
                if ($deleteStmt->execute()) {
                    // Commit the transaction
                    $pdo->commit();
                    echo json_encode([
                        "status" => "success", 
                        "message" => "Sub Program successfully deleted and RAO Program amount updated!"
                    ]);
                } else {
                    // Roll back the transaction if delete fails
                    $pdo->rollBack();
                    echo json_encode(["status" => "error", "message" => "Failed to delete Sub Program."]);
                }
            } else {
                // Roll back if RAO Program not found
                $pdo->rollBack();
                echo json_encode(["status" => "error", "message" => "Associated RAO Program not found."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid Sub Program ID."]);
        }
    } catch (PDOException $e) {
        // Roll back transaction on any error
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>