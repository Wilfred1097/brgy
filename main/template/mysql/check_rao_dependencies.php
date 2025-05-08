<?php
include 'conn.php'; // Ensure correct database connection

header('Content-Type: application/json'); // Return JSON response

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Get the Rao Program ID from the AJAX request
        $programId = isset($_POST['id']) ? intval($_POST['id']) : 0;

        if ($programId > 0) {
            // Check if there are any sub-programs associated with this RAO program
            $sql = "SELECT COUNT(*) as count FROM sub_program WHERE rao_program_id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $programId, PDO::PARAM_INT);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $result['count'];
            
            if ($count > 0) {
                echo json_encode(["has_dependencies" => true, "count" => $count]);
            } else {
                echo json_encode(["has_dependencies" => false, "count" => 0]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid RAO Program ID."]);
        }
    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>