<?php
include 'conn.php'; // Ensure correct database connection

header('Content-Type: application/json'); // Return JSON response

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Get the Cedula Transaction ID from the AJAX request
        $questionsId = isset($_POST['id']) ? intval($_POST['id']) : 0;

        if ($questionsId > 0) {
            // Prepare SQL DELETE query
            $sql = "DELETE FROM chatbot_questions WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $questionsId, PDO::PARAM_INT);

            // Execute the query
            if ($stmt->execute()) {
                echo json_encode(["status" => "success", "message" => "Chatbot Questions successfully deleted!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to delete Chatbot Questions."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid Chatbot Questions ID."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
