<?php
// Include database connection
include 'conn.php';

try {
    // Query to fetch all transactions
    $sql = "SELECT * FROM chatbot_questions";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch data as an associative array
    $chatbot_questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging: Check if data exists
    if (empty($chatbot_questions)) {
        echo json_encode(["error" => "No data found in chatbot_questions"]);
        exit;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($chatbot_questions);
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>