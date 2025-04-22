<?php
// Include database connection
include 'conn.php';
require 'check_cookies.php'; // Check if the cookie is present

// Return JSON response with distinct field naming
header('Content-Type: application/json');

try {
    // Check if 'dv_no' parameter is available in the GET request
    if (isset($_GET['dv_no'])) {
        $dv_no = $_GET['dv_no'];
        
        // Prepare the SQL query with a WHERE clause to filter starting with 'dv_no'
        $sql = "SELECT financial_transaction.id AS transaction_id, financial_transaction.*, sub_program_with_rao_program.*
                FROM financial_transaction
                JOIN sub_program_with_rao_program ON financial_transaction.fund = sub_program_with_rao_program.id
                WHERE financial_transaction.dv_no LIKE :dv_no LIMIT 10";  // Use a limit for better performance
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['dv_no' => $dv_no . '%']);  // Use the user input to filter results

    } else {
        // No input provided, you might want to handle this accordingly
        echo json_encode(["error" => "No input provided"]);
        exit;
    }

    // Fetch data as an associative array
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging: Check if data exists
    if (empty($transactions)) {
        echo json_encode(["error" => "No data found matching your input"]);
        exit;
    }

    // Return JSON response
    echo json_encode($transactions);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>