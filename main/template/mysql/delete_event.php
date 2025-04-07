<?php
require 'conn.php'; // Include database connection

header('Content-Type: application/json'); // JSON Response

$response = ["status" => "error", "message" => "Something went wrong!"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $eventId = $_POST['eventId'] ?? '';

    if (empty($eventId)) {
        $response["message"] = "Invalid event ID.";
        echo json_encode($response);
        exit;
    }

    try {
        // Delete the event from the database
        $stmt = $pdo->prepare("DELETE FROM events WHERE id = ?");
        $stmt->execute([$eventId]);

        if ($stmt->rowCount() > 0) {
            $response["status"] = "success";
            $response["message"] = "Event deleted successfully!";
        } else {
            $response["message"] = "Event not found or already deleted.";
        }
    } catch (PDOException $e) {
        $response["message"] = "Database error: " . $e->getMessage();
    }
}

// Return response as JSON
echo json_encode($response);
?>
