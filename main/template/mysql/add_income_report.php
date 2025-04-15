<?php
require 'conn.php'; // Include database connection

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Retrieve POST data
        $date = $_POST['date'] ?? null;
        $orNumber = $_POST['orNumber'] ?? null;
        $name = $_POST['name'] ?? null;
        $transactionType = $_POST['transactionType'] ?? null;
        $amount = $_POST['amount'] ?? null;
        $docStamp = $_POST['docStamp'] ?? null;
        $rcdNumber = $_POST['rcdNumber'] ?? null;

        // Validate required fields
        if (!$date || !$orNumber || !$name || !$transactionType || !$amount || !$docStamp || !$rcdNumber) {
            echo json_encode([
                "status" => "error",
                "message" => "All fields are required."
            ]);
            exit;
        }

        // Prepare SQL query
        $query = "INSERT INTO income_reports (date, or_number, name, transaction_type, amount, doc_stamp, rcd_number) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);

        // Execute query with data
        $stmt->execute([$date, $orNumber, $name, $transactionType, $amount, $docStamp, $rcdNumber]);

        // Check if the record was inserted
        if ($stmt->rowCount() > 0) {
            echo json_encode([
                "status" => "success",
                "message" => "Income report added successfully."
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to add income report."
            ]);
        }
    } catch (PDOException $e) {
        echo json_encode([
            "status" => "error",
            "message" => "Database error: " . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request method."
    ]);
}
?>