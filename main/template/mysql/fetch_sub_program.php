<?php
// Include database connection
include 'conn.php';

try {
    // Query to fetch all transactions and join with rao_program to get the RAO Program name
    $sql = "SELECT sub_program.*, rao_program.name as rao_program_name
            FROM sub_program
            JOIN rao_program ON sub_program.rao_program_id = rao_program.id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch data as an associative array
    $sub_program = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging: Check if data exists
    if (empty($sub_program)) {
        echo json_encode(["error" => "No data found in sub_program"]);
        exit;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($sub_program);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>