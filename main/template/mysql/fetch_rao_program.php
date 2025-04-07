<?php
// Include database connection
include 'conn.php';

try {
    // Query to fetch all transactions
    $sql = "SELECT * FROM rao_program";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch data as an associative array
    $rao_program = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging: Check if data exists
    if (empty($rao_program)) {
        echo json_encode(["error" => "No data found in rao_program"]);
        exit;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($rao_program);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>