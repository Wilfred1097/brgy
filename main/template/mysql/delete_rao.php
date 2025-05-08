<?php
include 'conn.php'; // Ensure correct database connection

header('Content-Type: application/json'); // Return JSON response

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Get the RAO Program ID from the AJAX request
        $programId = isset($_POST['id']) ? intval($_POST['id']) : 0;

        if ($programId > 0) {
            // Begin transaction for data consistency
            $pdo->beginTransaction();
            
            // First check if there are any sub-programs associated with this RAO program
            $checkSql = "SELECT COUNT(*) as count FROM sub_program WHERE rao_program_id = :id";
            $checkStmt = $pdo->prepare($checkSql);
            $checkStmt->bindParam(':id', $programId, PDO::PARAM_INT);
            $checkStmt->execute();
            
            $result = $checkStmt->fetch(PDO::FETCH_ASSOC);
            $count = $result['count'];
            
            if ($count > 0) {
                // If there are sub-programs, don't delete and send an error
                $pdo->rollBack();
                echo json_encode([
                    "status" => "error", 
                    "message" => "Cannot delete this RAO Program because it has $count associated Sub Program(s). Please delete all Sub Programs first or reassign them to another RAO Program."
                ]);
            } else {
                // No sub-programs, proceed with delete
                $sql = "DELETE FROM rao_program WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':id', $programId, PDO::PARAM_INT);

                // Execute the query
                if ($stmt->execute()) {
                    $pdo->commit();
                    echo json_encode([
                        "status" => "success", 
                        "message" => "RAO Program successfully deleted!"
                    ]);
                } else {
                    $pdo->rollBack();
                    echo json_encode([
                        "status" => "error", 
                        "message" => "Failed to delete RAO Program."
                    ]);
                }
            }
        } else {
            echo json_encode([
                "status" => "error", 
                "message" => "Invalid RAO Program ID."
            ]);
        }
    } catch (PDOException $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        echo json_encode([
            "status" => "error", 
            "message" => "Database error: " . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        "status" => "error", 
        "message" => "Invalid request method."
    ]);
}
?>