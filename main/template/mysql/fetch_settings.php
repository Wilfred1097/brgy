<?php
// Include database connection
include 'conn.php';

try {
    // Query to fetch all transactions
    $sql = "SELECT * FROM settings";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch data as an associative array
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging: Check if data exists
    if (empty($transactions)) {
        echo json_encode(["error" => "No data found in settings"]);
        exit;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($transactions);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>