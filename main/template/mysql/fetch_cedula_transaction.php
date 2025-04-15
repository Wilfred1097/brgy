<?php
// Include database connection
include 'conn.php';
require 'check_cookies.php'; // Check if the cookie is present

try {
    // Query to fetch all transactions
    $sql = "SELECT * FROM cedula_transactions";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch data as an associative array
    $cedula_transaction = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging: Check if data exists
    if (empty($cedula_transaction)) {
        echo json_encode(["error" => "No data found in cedula_transactions"]);
        exit;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($cedula_transaction);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>