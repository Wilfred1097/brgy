<?php
// Include database connection
include 'conn.php';
require 'check_cookies.php'; // Check if the cookie is present

// Return JSON response with distinct field naming
header('Content-Type: application/json');

try {
    // Query to fetch all transactions
    $sql = "SELECT
                financial_transaction.id AS transaction_id,
                financial_transaction.*,
                rao_program.*
            FROM
                financial_transaction
            JOIN rao_program ON financial_transaction.fund = rao_program.id;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch data as an associative array
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging: Check if data exists
    if (empty($transactions)) {
        echo json_encode(["error" => "No data found in financial_transaction"]);
        exit;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($transactions);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>