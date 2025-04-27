<?php
// Include database connection
include 'conn.php';
require 'check_cookies.php';

header('Content-Type: application/json');

try {
    if (isset($_GET['dv_no'])) {
        $dv_no = $_GET['dv_no']; // Get the value from GET parameters
    } else {
        $dv_no = 1432; // Assign a default value if not set
    }

    // Validate input.  Crucial for security!
    if (!is_numeric($dv_no)) {
        echo json_encode(["error" => "Invalid 'dv_no' format"]);
        exit;
    }

    // Prepare the SQL query
    $sql = "SELECT financial_transaction.id AS transaction_id, financial_transaction.*, sub_program_with_rao_program.*
            FROM financial_transaction
            JOIN sub_program_with_rao_program ON financial_transaction.fund = sub_program_with_rao_program.id
            WHERE financial_transaction.dv_no LIKE :dv_no LIMIT 10";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['dv_no' => $dv_no . '%']);

    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($transactions)) {
        echo json_encode(["error" => "No data found matching your input"]);
        exit;
    }

    echo json_encode($transactions);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>