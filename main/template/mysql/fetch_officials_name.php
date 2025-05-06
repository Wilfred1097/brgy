<?php
// Include database connection
include 'conn.php';
require 'check_cookies.php'; // Check if the cookie is present

try {
    // Query to fetch all transactions
    $sql = "SELECT `id`, `first_name`, `last_name`, `position`  FROM `officials`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch data as an associative array
    $officials_name = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging: Check if data exists
    if (empty($officials_name)) {
        echo json_encode(["error" => "No data found in Combined Programs"]);
        exit;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($officials_name);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>