<?php
require 'conn.php'; // Database connection

header('Content-Type: application/json'); // Ensure response is JSON

$response = ["status" => "error", "message" => "No events found.", "events" => []];

try {
    $stmt = $pdo->query("SELECT id, title, description, start_date, start_time, end_date, end_time, image, created_at FROM events ORDER BY created_at DESC");
    $events = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $events[] = [
            "id" => $row["id"],
            "title" => $row["title"],
            "description" => $row["description"],
            "start" => $row["start_date"] . "T" . $row["start_time"], // Combine date and time
            "end" => $row["end_date"] . "T" . $row["end_time"], // Combine date and time
            "image" => $row["image"],
            "created_at" => $row["created_at"]
        ];
    }

    if (!empty($events)) {
        $response["status"] = "success";
        $response["message"] = "Events retrieved successfully!";
        $response["events"] = $events;
    }
} catch (PDOException $e) {
    $response["message"] = "Database error: " . $e->getMessage();
}

// Return response as JSON
echo json_encode($response);
?>