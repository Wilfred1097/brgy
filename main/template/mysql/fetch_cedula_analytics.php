<?php
require 'conn.php'; // Include database connection
require 'check_cookies.php'; // Check if the cookie is present

header("Content-Type: application/json");

try {
    // SQL query to sum the amount for the past 7 days excluding today
    $query = "
        SELECT 
            DATE_SUB(CURDATE(), INTERVAL n DAY) AS transaction_date,
            IFNULL(SUM(ct.amount), 0) AS total_amount
        FROM 
            (SELECT 1 AS n UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7) AS days
        LEFT JOIN 
            cedula_transactions ct ON DATE(ct.date) = DATE_SUB(CURDATE(), INTERVAL n DAY)
        GROUP BY 
            transaction_date
        ORDER BY 
            transaction_date DESC;
    ";

    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Fetch all results as an associative array
    $dailyTotals = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return the data in JSON format
    echo json_encode($dailyTotals);
    
} catch (PDOException $e) {
    // Return an error message in case of database issues
    echo json_encode([
        "status" => "error",
        "message" => "Database error: " . $e->getMessage()
    ]);
}
?>