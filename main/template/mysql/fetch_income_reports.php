<?php
require 'conn.php'; // Include database connection
require 'check_cookies.php'; // Check if the cookie is present

header("Content-Type: application/json");

try {
    // Query to fetch all data from the income_reports table
    $query = "SELECT * FROM income_reports";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Fetch all results as an associative array
    $incomeReports = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the data in JSON format
    echo json_encode($incomeReports);
} catch (PDOException $e) {
    // Return an error message in case of database issues
    echo json_encode([
        "status" => "error",
        "message" => "Database error: " . $e->getMessage()
    ]);
}
?>