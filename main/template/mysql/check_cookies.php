<?php
// Check if the 'brgy' cookie is present
if (!isset($_COOKIE['brgy'])) {
    echo json_encode([
        "status" => "error",
        "message" => "Access denied!"
    ]);
    http_response_code(403); // Forbidden
    exit;
}
?>