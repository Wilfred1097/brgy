<?php
// Include database connection
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $date = $_POST['date'] ?? null;
    $name = $_POST['name'] ?? null;
    $gender = $_POST['gender'] ?? null;
    $amount = $_POST['amount'] ?? null;

    // Validate inputs
    if (!$date || !$name || !$gender || !$amount) {
        http_response_code(400);
        echo json_encode([
            'status' => 'error',
            'message' => 'All fields are required.',
        ]);
        exit;
    }

    try {
        // Prepare SQL statement using PDO
        $stmt = $pdo->prepare("INSERT INTO cedula_transactions (date, name, gender, amount) VALUES (:date, :name, :gender, :amount)");
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':amount', $amount);

        // Execute the statement
        if ($stmt->execute()) {
            http_response_code(201);
            echo json_encode([
                'status' => 'success',
                'message' => 'Cedula transaction added successfully.',
            ]);
        } else {
            throw new Exception("Failed to insert cedula transaction.");
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