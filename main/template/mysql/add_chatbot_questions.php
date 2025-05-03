<?php
// Include database connection
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $questions = $_POST['questions'] ?? null;
    $response = $_POST['response'] ?? null;

    // Validate inputs
    if (!$questions || !$response) {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'All fields are required.',
        ]);
        exit;
    }

    try {
        // Prepare SQL statement using PDO
        $stmt = $pdo->prepare("INSERT INTO chatbot_questions (questions, response) VALUES (:questions, :response)");
        $stmt->bindParam(':questions', $questions);
        $stmt->bindParam(':response', $response);

        // Execute the statement
        if ($stmt->execute()) {
            http_response_code(201);
            echo json_encode([
                'status' => 'success',
                'message' => 'Chatbot Questions added successfully.',
            ]);
        } else {
            throw new Exception("Failed to insert Chatbot Questions.");
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage(),
        ]);
    }
}

// Close database connection
$pdo = null;
?>