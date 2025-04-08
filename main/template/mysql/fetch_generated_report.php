<?php
// Include database connection
include 'conn.php';
// Return JSON response with distinct field naming
header('Content-Type: application/json');

try {
    // Query to fetch all generated reports
    $sql = "SELECT `id`, `filename`, `created_at` FROM `generated_reports`;";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch data as an associative array
    $reports = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging: Check if data exists
    if (empty($reports)) {
        echo json_encode(["error" => "No data found in generated_reports"]);
        exit;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($reports);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>