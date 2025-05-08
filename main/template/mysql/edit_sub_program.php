<?php
require 'conn.php'; // Include your database connection file
header('Content-Type: application/json'); // Set JSON response header

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $raoProgramId = $_POST['raoProgramId'];
    $programName = $_POST['programName'];
    $newAmount = floatval($_POST['newAmount']);
    $originalAmount = floatval($_POST['originalAmount']);
    $amountDifference = floatval($_POST['amountDifference']); // Can be positive (increase) or negative (decrease)

    try {
        // Begin transaction for data consistency
        $pdo->beginTransaction();
        
        // Get current RAO program info and sub program info
        $getRaoSql = "SELECT remaining_amount FROM rao_program WHERE id = :id";
        $getRaoStmt = $pdo->prepare($getRaoSql);
        $getRaoStmt->bindParam(':id', $raoProgramId, PDO::PARAM_INT);
        $getRaoStmt->execute();
        $raoData = $getRaoStmt->fetch(PDO::FETCH_ASSOC);
        
        $getSubSql = "SELECT rao_program_id FROM sub_program WHERE id = :id";
        $getSubStmt = $pdo->prepare($getSubSql);
        $getSubStmt->bindParam(':id', $id, PDO::PARAM_INT);
        $getSubStmt->execute();
        $subData = $getSubStmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$raoData) {
            $pdo->rollBack();
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'RAO Program not found.']);
            exit;
        }
        
        $currentRemainingAmount = floatval($raoData['remaining_amount']);
        $originalRaoProgramId = $subData['rao_program_id'];
        
        // Check if there's a RAO program change
        $isRaoProgramChanged = ($originalRaoProgramId != $raoProgramId);
        
        // Validation for amount change if the RAO program remains the same
        if (!$isRaoProgramChanged && $amountDifference > 0 && $amountDifference > $currentRemainingAmount) {
            $pdo->rollBack();
            http_response_code(400);
            echo json_encode([
                'status' => 'error', 
                'message' => "Cannot increase amount by ₱" . number_format($amountDifference, 2) . 
                             ". The RAO Program only has ₱" . number_format($currentRemainingAmount, 2) . " remaining."
            ]);
            exit;
        }
        
        // Different handling based on whether RAO program is changing or not
        if ($isRaoProgramChanged) {
            // If RAO program is changing, we need to:
            // 1. Add back the original amount to the old RAO program's remaining amount
            // 2. Subtract the new amount from the new RAO program's remaining amount
            
            // Update original RAO program (add back the amount)
            $updateOldRaoSql = "UPDATE rao_program SET remaining_amount = remaining_amount + :amount 
                               WHERE id = :id";
            $updateOldRaoStmt = $pdo->prepare($updateOldRaoSql);
            $updateOldRaoStmt->bindParam(':amount', $originalAmount, PDO::PARAM_STR);
            $updateOldRaoStmt->bindParam(':id', $originalRaoProgramId, PDO::PARAM_INT);
            $updateOldRaoStmt->execute();
            
            // Check if new RAO program has enough remaining amount
            $getNewRaoSql = "SELECT remaining_amount FROM rao_program WHERE id = :id";
            $getNewRaoStmt = $pdo->prepare($getNewRaoSql);
            $getNewRaoStmt->bindParam(':id', $raoProgramId, PDO::PARAM_INT);
            $getNewRaoStmt->execute();
            $newRaoData = $getNewRaoStmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$newRaoData || floatval($newRaoData['remaining_amount']) < $newAmount) {
                $pdo->rollBack();
                http_response_code(400);
                echo json_encode([
                    'status' => 'error', 
                    'message' => "The selected RAO Program doesn't have enough remaining amount. Available: ₱" . 
                                 number_format(floatval($newRaoData['remaining_amount']), 2)
                ]);
                exit;
            }
            
            // Update new RAO program (subtract the new amount)
            $updateNewRaoSql = "UPDATE rao_program SET remaining_amount = remaining_amount - :amount 
                               WHERE id = :id";
            $updateNewRaoStmt = $pdo->prepare($updateNewRaoSql);
            $updateNewRaoStmt->bindParam(':amount', $newAmount, PDO::PARAM_STR);
            $updateNewRaoStmt->bindParam(':id', $raoProgramId, PDO::PARAM_INT);
            $updateNewRaoStmt->execute();
            
        } else {
            // If RAO program remains the same, we just need to update the remaining amount
            // based on the difference between the new and original amount
            
            $updateRaoSql = "UPDATE rao_program SET remaining_amount = remaining_amount - :difference 
                             WHERE id = :id";
            $updateRaoStmt = $pdo->prepare($updateRaoSql);
            $updateRaoStmt->bindParam(':difference', $amountDifference, PDO::PARAM_STR);
            $updateRaoStmt->bindParam(':id', $raoProgramId, PDO::PARAM_INT);
            $updateRaoStmt->execute();
        }
        
        // Finally, update the sub program
        $updateSubSql = "UPDATE sub_program SET rao_program_id = :raoProgramId, name = :programName, 
                        amount = :amount WHERE id = :id";
        $updateSubStmt = $pdo->prepare($updateSubSql);
        $updateSubStmt->bindParam(':id', $id, PDO::PARAM_INT);
        $updateSubStmt->bindParam(':raoProgramId', $raoProgramId, PDO::PARAM_INT);
        $updateSubStmt->bindParam(':programName', $programName, PDO::PARAM_STR);
        $updateSubStmt->bindParam(':amount', $newAmount, PDO::PARAM_STR);
        
        // Execute statement
        if ($updateSubStmt->execute()) {
            $pdo->commit();
            
            // Prepare success message
            $message = 'Sub Program updated successfully.';
            if ($isRaoProgramChanged) {
                $message .= ' Moved to different RAO Program.';
            } else if ($amountDifference != 0) {
                $changeType = $amountDifference > 0 ? 'increased' : 'decreased';
                $message .= " Amount $changeType by ₱" . number_format(abs($amountDifference), 2) . ".";
            }
            
            echo json_encode([
                'status' => 'success', 
                'message' => $message
            ]);
        } else {
            $pdo->rollBack();
            echo json_encode([
                'status' => 'error', 
                'message' => 'Failed to update Sub Program'
            ]);
        }
    } catch (PDOException $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        http_response_code(500);
        echo json_encode([
            'status' => 'error', 
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
} else {
    http_response_code(405);
    echo json_encode([
        'status' => 'error', 
        'message' => 'Invalid request method'
    ]);
}
?>