<?php
include 'conn.php'; // Ensure correct path

header('Content-Type: application/json'); // Set response to JSON
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Get data from POST request
        $id = $_POST['id'] ?? '';
        $date = $_POST['date'] ?? '';
        $chequeNumber = $_POST['cheque'] ?? ''; // Correct key
        $voucherNo = $_POST['voucher'] ?? '';   // Correct key
        $fund = $_POST['fund'] ?? '';
        $payee = $_POST['payee'] ?? '';
        $particulars = $_POST['particulars'] ?? '';
        $grossAmount = isset($_POST['gross']) ? floatval(str_replace(',', '', $_POST['gross'])) : 0;
        $vatable = isset($_POST['vatable']) ? intval($_POST['vatable']) : 0;
        $pbcNo = $_POST['pbc'] ?? ''; // Retrieve PBC No.
        $accountNumber = $_POST['accountNumber'] ?? ''; // Retrieve Account No.

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

        // If vatable becomes 0, recompute VAT & EVAT as 0
        if ($vatable === 0) {
            $vat = 0;
            $evat = 0;
            $totalAmount = $grossAmount;
        }

        // SQL Query (Use named placeholders for PDO)
        $sql = "UPDATE financial_transaction
                SET date = :date, cheque_no = :chequeNumber, dv_no = :voucherNo, fund = :fund,
                    payee = :payee, particulars = :particulars, gross_amount = :grossAmount,
                    vatable = :vatable, vat = :vatvalue, evat = :evatvalue,
                    vat_amount = :vat, evat_amount = :evat, net_amount = :totalAmount,
                    pbc_no = :pbcNo, account_no = :accountNumber
                WHERE id = :id";

        // Prepare statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
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
        $stmt->bindParam(':pbcNo', $pbcNo); // Bind PBC No.
        $stmt->bindParam(':accountNumber', $accountNumber); // Bind Account No.

        // Execute query
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Transaction successfully updated!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update transaction."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>