<?php
include 'conn.php'; // Ensure correct path

header('Content-Type: application/json'); // Set response to JSON

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Get data from POST request
        $date = $_POST['date'] ?? '';
        $chequeNumber = $_POST['chequeNumber'] ?? '';
        $voucherNo = $_POST['voucherNo'] ?? '';
        $fund = $_POST['fund'] ?? '';
        $payee = $_POST['payee'] ?? '';
        $particulars = $_POST['particulars'] ?? '';
        $grossAmount = isset($_POST['grossAmount']) ? floatval($_POST['grossAmount']) : 0;
        $vatable = isset($_POST['vatable']) ? intval($_POST['vatable']) : 0;

        // Default VAT & EVAT values
        $vat = 0;
        $evat = 0;
        $vatvalue = 0;
        $evatvalue = 0;
        $totalAmount = $grossAmount;

        // If vatable, calculate VAT & EVAT
        if ($vatable === 1) {
            $vatvalue = isset($_POST['vat']) ? floatval($_POST['vat']) / 100 : 0;
            $evatvalue = isset($_POST['evat']) ? floatval($_POST['evat']) / 100 : 0;

            $vat = $grossAmount * $vatvalue;
            $evat = $grossAmount * $evatvalue;

            $totalAmount = $grossAmount - $vat - $evat;
        }

        // Check if the cheque number already exists
        $checkSql = "SELECT COUNT(*) FROM financial_transaction WHERE cheque_no = :chequeNumber";
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->bindParam(':chequeNumber', $chequeNumber);
        $checkStmt->execute();
        $chequeExists = $checkStmt->fetchColumn(); // Get count of matching records

        if ($chequeExists > 0) {
            echo json_encode(["status" => "error", "message" => "Cheque number already registered"]);
            exit; // Stop execution if cheque number exists
        }

        // SQL Query (Use named placeholders for PDO)
        $sql = "INSERT INTO financial_transaction (date, cheque_no, dv_no, fund, payee, particulars, gross_amount, vatable, vat, evat, vat_amount, evat_amount, net_amount)
                VALUES (:date, :chequeNumber, :voucherNo, :fund, :payee, :particulars, :grossAmount, :vatable, :vatvalue, :evatvalue, :vat, :evat, :totalAmount)";

        // Prepare statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':chequeNumber', $chequeNumber);
        $stmt->bindParam(':voucherNo', $voucherNo);
        $stmt->bindParam(':fund', $fund);
        $stmt->bindParam(':payee', $payee);
        $stmt->bindParam(':particulars', $particulars);
        $stmt->bindParam(':grossAmount', $grossAmount);
        $stmt->bindParam(':vatable', $vatable, PDO::PARAM_INT);
        $stmt->bindParam(':vatvalue', $vatvalue);
        $stmt->bindParam(':evatvalue', $evatvalue);
        $stmt->bindParam(':vat', $vat);
        $stmt->bindParam(':evat', $evat);
        $stmt->bindParam(':totalAmount', $totalAmount);

        // Execute query
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Transaction successfully added!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to add transaction."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
