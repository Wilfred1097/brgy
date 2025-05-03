<?php
// Include database connection
include 'conn.php';
require 'check_cookies.php'; // Check if the cookie is present
// Return JSON response with distinct field naming
header('Content-Type: application/json');

try {
    // Query to fetch all generated reports
    $sql = "SELECT `id`, `filename`, `export_date` FROM `exported_transmital`;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch data as an associative array
    $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging: Check if data exists
    if (empty($reports)) {
        echo json_encode(["error" => "No data found in exported_transmital"]);
        exit;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($reports);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>