<?php
require 'conn.php'; // Include database connection

header('Content-Type: application/json'); // JSON Response
error_reporting(E_ALL);
ini_set('display_errors', 1);

$response = ["status" => "error", "message" => "Something went wrong!"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userId = $_POST['userId'] ?? '';

    if (empty($userId)) {
        $response["message"] = "Invalid user ID.";
        echo json_encode($response);
        exit;
    }

    try {
        // Delete the user from the database
        $stmt = $pdo->prepare("DELETE FROM officials WHERE id = ?");
        $stmt->execute([$userId]);

        if ($stmt->rowCount() > 0) {
            $response["status"] = "success";
            $response["message"] = "Officials deleted successfully!";
        } else {
            $response["message"] = "Officials not found or already deleted.";
        }
    } catch (PDOException $e) {
        $response["message"] = "Database error: " . $e->getMessage();
    }
}

// Ensure there are no extra outputs
ob_end_clean();
echo json_encode($response);
exit;