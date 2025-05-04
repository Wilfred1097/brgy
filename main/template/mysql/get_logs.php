<?php
include 'conn.php'; // Include your database connection
require 'check_cookies.php'; // Check if the cookie is present

try {
    // Prepare the SQL query to retrieve all logs
    $stmt = $pdo->prepare("SELECT
                                users.first_name,
                                users.middle_name,
                                users.last_name,
                                users.role,
                                login_logs.*
                            FROM
                                login_logs
                            JOIN users ON users.id = login_logs.user_id
                            ORDER BY login_logs.id DESC");
    $stmt->execute();

    // Fetch all results
    $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return data as JSON
    echo json_encode(['success' => true, 'data' => $logs]);
} catch (PDOException $e) {
    // Handle error if something goes wrong
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>