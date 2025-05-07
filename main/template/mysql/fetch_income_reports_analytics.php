<?php
require 'conn.php'; // Include database connection
require 'check_cookies.php'; // Check if the cookie is present

header("Content-Type: application/json");

try {
    $month = isset($_GET['month']) ? $_GET['month'] : '';

    if ($month) {
        // Parse the year and month from the input
        list($year, $monthNum) = explode('-', $month);
        
        // Get the number of days in the specified month
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, intval($monthNum), intval($year));
        
        // Create a date series for all days in the month using a recursive CTE
        $query = "WITH RECURSIVE date_series AS (
                      SELECT CAST(:year_month_start AS DATE) AS date
                      UNION ALL
                      SELECT DATE_ADD(date, INTERVAL 1 DAY)
                      FROM date_series
                      WHERE DATE_ADD(date, INTERVAL 1 DAY) <= CAST(:year_month_end AS DATE)
                  )
                  SELECT 
                      ds.date AS transaction_date,
                      COALESCE(SUM(ir.amount), 0) AS total_amount
                  FROM 
                      date_series ds
                  LEFT JOIN 
                      income_reports ir ON DATE(ir.date) = ds.date
                  GROUP BY 
                      ds.date
                  ORDER BY 
                      ds.date ASC";
        
        $stmt = $pdo->prepare($query);
        $startDate = $month . '-01';
        $endDate = $month . '-' . $daysInMonth;
        $stmt->bindParam(':year_month_start', $startDate);
        $stmt->bindParam(':year_month_end', $endDate);
    } else {
        // No filter - return current month with all dates
        $currentYear = date('Y');
        $currentMonth = date('m');
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, intval($currentMonth), intval($currentYear));
        
        $query = "WITH RECURSIVE date_series AS (
                      SELECT CAST(:year_month_start AS DATE) AS date
                      UNION ALL
                      SELECT DATE_ADD(date, INTERVAL 1 DAY)
                      FROM date_series
                      WHERE DATE_ADD(date, INTERVAL 1 DAY) <= CAST(:year_month_end AS DATE)
                  )
                  SELECT 
                      ds.date AS transaction_date,
                      COALESCE(SUM(ir.amount), 0) AS total_amount
                  FROM 
                      date_series ds
                  LEFT JOIN 
                      income_reports ir ON DATE(ir.date) = ds.date
                  GROUP BY 
                      ds.date
                  ORDER BY 
                      ds.date ASC";
        
        $stmt = $pdo->prepare($query);
        $startDate = $currentYear . '-' . $currentMonth . '-01';
        $endDate = $currentYear . '-' . $currentMonth . '-' . $daysInMonth;
        $stmt->bindParam(':year_month_start', $startDate);
        $stmt->bindParam(':year_month_end', $endDate);
    }

    $stmt->execute();
    $dailyTotals = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Format the dates to be more readable (like "March 1, 2025")
    foreach ($dailyTotals as &$record) {
        $date = new DateTime($record['transaction_date']);
        $record['formatted_date'] = $date->format('F j, Y');
        // Keep the original date format for any JavaScript processing
        $record['transaction_date'] = $date->format('Y-m-d');
    }

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