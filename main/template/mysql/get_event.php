<?php
require 'conn.php'; // Database connection
require 'check_cookies.php'; // Check if the cookie is present

header('Content-Type: application/json');

$response = ["status" => "error", "message" => "Invalid request."];

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $eventId = (int) $_GET['id']; // Force ID to be an integer

    try {
        // DEBUG: Show received ID
        $response["debug_id_received"] = $eventId;

        // Fetch event details
        $stmt = $pdo->prepare("SELECT * FROM events WHERE id = ?");
        $stmt->execute([$eventId]);
        $event = $stmt->fetch(PDO::FETCH_ASSOC);

        // DEBUG: Show raw database result
        $response["debug_query_result"] = $event;

        if ($event) {
            $response = [
                "status" => "success",
                "message" => "Event retrieved successfully!",
                "event" => $event
            ];
        } else {
            $response["message"] = "Event not found.";
        }
    } catch (PDOException $e) {
        $response["message"] = "Database error: " . $e->getMessage();
    }
}

echo json_encode($response);
?>
