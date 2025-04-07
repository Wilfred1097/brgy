<?php
// Include database connection
include 'conn.php';

try {
    // Query to fetch all transactions
    $sql = "SELECT * FROM sub_program";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch data as an associative array
    $sub_program = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging: Check if data exists
    if (empty($sub_program)) {
        echo json_encode(["error" => "No data found in Combined Programs"]);
        exit;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($sub_program);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>