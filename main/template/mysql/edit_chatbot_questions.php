<?php
// Include database connection
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $id = $_POST['id'] ?? null;
    $questions = $_POST['edit_questions'] ?? null;
    $response = $_POST['edit_response'] ?? null;

    // Validate inputs
    if (!$id || !$questions || !$response) {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'All fields are required.',
        ]);
        exit;
    }

    try {
        // Prepare SQL statement using PDO
        $stmt = $pdo->prepare("UPDATE chatbot_questions SET questions = :questions, response = :response WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':questions', $questions);
        $stmt->bindParam(':response', $response);

        // Execute the statement
        if ($stmt->execute()) {
            http_response_code(200);
            echo json_encode([
                'status' => 'success',
                'message' => 'Chatbot Questions updated successfully.',
            ]);
        } else {
            throw new Exception("Failed to update Chatbot Questions.");
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