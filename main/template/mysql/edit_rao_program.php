<?php
require 'conn.php'; // Include your database connection file

header('Content-Type: application/json'); // Set JSON response header

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $year = $_POST['year'];
    $programName = $_POST['programName'];
    $newAmount = floatval($_POST['amount']);

    try {
        // Begin transaction to ensure data consistency
        $pdo->beginTransaction();
        
        // First, get the current amount and remaining amount from the database
        $getCurrentSql = "SELECT amount, remaining_amount FROM rao_program WHERE id = :id";
        $getCurrentStmt = $pdo->prepare($getCurrentSql);
        $getCurrentStmt->bindParam(':id', $id, PDO::PARAM_INT);
        $getCurrentStmt->execute();
        
        $currentData = $getCurrentStmt->fetch(PDO::FETCH_ASSOC);
        
        if ($currentData) {
            $currentAmount = floatval($currentData['amount']);
            $currentRemainingAmount = floatval($currentData['remaining_amount']);
            
            // Calculate how much the amount has changed
            $amountDifference = $newAmount - $currentAmount;
            
            // Calculate new remaining amount
            // If amount increases, add the difference to remaining_amount
            // If amount decreases, ensure it doesn't go below 0 and that there's enough remaining to decrease
            $newRemainingAmount = $currentRemainingAmount + $amountDifference;
            
            // Validate that the new remaining amount is not negative
            if ($newRemainingAmount < 0) {
                // Rollback and return error
                $pdo->rollBack();
                echo json_encode([
                    'status' => 'error', 
                    'message' => 'Cannot reduce amount below what has already been allocated to sub-programs. The maximum reduction allowed is ₱' . 
                    number_format($currentAmount - ($currentAmount - $currentRemainingAmount), 2) . '.'
                ]);
                exit;
            }
            
            // Update both amount and remaining_amount
            $updateSql = "UPDATE rao_program SET 
                          year = :year, 
                          name = :programName, 
                          amount = :amount, 
                          remaining_amount = :remainingAmount
                          WHERE id = :id";
            
            $updateStmt = $pdo->prepare($updateSql);
            $updateStmt->bindParam(':id', $id, PDO::PARAM_INT);
            $updateStmt->bindParam(':year', $year, PDO::PARAM_INT);
            $updateStmt->bindParam(':programName', $programName, PDO::PARAM_STR);
            $updateStmt->bindParam(':amount', $newAmount, PDO::PARAM_STR);
            $updateStmt->bindParam(':remainingAmount', $newRemainingAmount, PDO::PARAM_STR);
            
            // Execute the update
            if ($updateStmt->execute()) {
                // Commit the transaction
                $pdo->commit();
                
                // Prepare the success message with details
                $message = 'RAO Program updated successfully.';
                if ($amountDifference > 0) {
                    $message .= ' Amount increased by ₱' . number_format($amountDifference, 2) . '.';
                } elseif ($amountDifference < 0) {
                    $message .= ' Amount decreased by ₱' . number_format(abs($amountDifference), 2) . '.';
                }
                
                echo json_encode([
                    'status' => 'success', 
                    'message' => $message,
                    'newRemainingAmount' => $newRemainingAmount
                ]);
            } else {
                // Roll back on error
                $pdo->rollBack();
                $errorInfo = $updateStmt->errorInfo();
                echo json_encode([
                    'status' => 'error', 
                    'message' => 'Failed to update RAO Program', 
                    'error' => $errorInfo
                ]);
            }
        } else {
            // Roll back if program not found
            $pdo->rollBack();
            echo json_encode([
                'status' => 'error', 
                'message' => 'RAO Program not found'
            ]);
        }
    } catch (PDOException $e) {
        // Roll back transaction on any error
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        echo json_encode([
            'status' => 'error', 
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error', 
        'message' => 'Invalid request method'
    ]);
}
?>