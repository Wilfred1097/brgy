<?php
require_once "conn.php"; // Ensure correct path!

header("Content-Type: application/json");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    if (!isset($_POST["startDate"]) || !isset($_POST["endDate"])) {
        echo json_encode(["error" => "Missing input values"]);
        exit;
    }

    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];

    // Check if the connection is available
    if (!isset($pdo)) { // Use $pdo, not $conn
        echo json_encode(["error" => "Database connection failed"]);
        exit;
    }

    // Check for conflicting events
    $sql = "SELECT COUNT(*) as count FROM events WHERE (start_date <= :endDate AND end_date >= :startDate)";
    $stmt = $pdo->prepare($sql); // Use $pdo instead of $conn
    $stmt->bindParam(":startDate", $startDate);
    $stmt->bindParam(":endDate", $endDate);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode(["exists" => ($row["count"] > 0)]);
} catch (PDOException $e) {
    echo json_encode(["error" => "Database error: " . $e->getMessage()]);
}
?>
