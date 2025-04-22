<?php
// Include database connection
include 'conn.php';
require 'check_cookies.php'; // Check if the cookie is present

// Get the raw POST data
$data = json_decode(file_get_contents("php://input"), true);

// Check if user_id is present
if (isset($data['user_id'])) {
    $userId = $data['user_id'];

    // Prepare the SQL statement
    $sql = "SELECT `id`, `first_name`, `middle_name`, `last_name`, `address`, `dob`, `age`, `role`, `gmail`, `username`, `image_path`
            FROM `users`
            WHERE `id` = :id";

    // Prepare and execute the statement
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $userId]);

    // Fetch the user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Return JSON response with user data
        header('Content-Type: application/json');
        echo json_encode($user);
    } else {
        // Return an error message if the user is not found
        header('Content-Type: application/json');
        http_response_code(404); // Not Found
        echo json_encode(['error' => 'User not found.']);
    }
} else {
    // Return an error message if user_id is not present
    header('Content-Type: application/json');
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'User ID not provided.']);
}
?>