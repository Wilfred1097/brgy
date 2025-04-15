<?php
// Include database connection
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $id = $_POST['id'] ?? null;
    $date = $_POST['date'] ?? null;
    $name = $_POST['name'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $amount = $_POST['amount'] ?? null;

    // Validate inputs
    if (!$id || !$date || !$name || !$gender || !$amount) {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'All fields are required.',
        ]);
        exit;
    }

    try {
        // Prepare SQL statement using PDO
        $stmt = $pdo->prepare("UPDATE cedula_transactions SET date = :date, name = :name, gender = :gender, amount = :amount WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':amount', $amount);

        // Execute the statement
        if ($stmt->execute()) {
            http_response_code(200);
            echo json_encode([
                'status' => 'success',
                'message' => 'Cedula transaction updated successfully.',
            ]);
        } else {
            throw new Exception("Failed to update cedula transaction.");
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