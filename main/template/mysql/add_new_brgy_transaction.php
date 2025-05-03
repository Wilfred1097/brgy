<?php
require 'conn.php';
header("Content-Type: application/json");

// Main transaction fields
$voucher_no = $_POST['voucher_no'];
$fund_cluster = $_POST['fund_cluster'];
$entity_name = $_POST['entity_name'];
$ris_number = $_POST['ris_number'];
$purchase_request_no = $_POST['purchase_request_no'];
$requisitioner = $_POST['requisitioner'];
$purchase_order_no = $_POST['purchase_order_no'];
$project_amount = $_POST['project_amount'];
$supplier_name = $_POST['supplier_name'];
$project_title = $_POST['project_title'];
$background_rationale = $_POST['background_rationale'];
$objectives = $_POST['objectives'];
$methodology = $_POST['methodology'];
$expected_output = $_POST['expected_output'];
$proponents = $_POST['proponents'];
$venue = $_POST['venue'];
$date = $_POST['date'];
$items_json = $_POST['items']; // This is a JSON string
$items = json_decode($items_json, true); // Convert to PHP array

try {
    // Insert into barangay_transaction
    $sql = "INSERT INTO barangay_transaction (
        voucher_no, fund_cluster, entity_name, ris_number,
        purchase_request_no, requisitioner, purchase_order_no, project_amount,
        supplier_name, project_title, background_rationale, objectives,
        methodology, expected_output, proponents, venue, date
    ) VALUES (
        :voucher_no, :fund_cluster, :entity_name, :ris_number,
        :purchase_request_no, :requisitioner, :purchase_order_no, :project_amount,
        :supplier_name, :project_title, :background_rationale, :objectives,
        :methodology, :expected_output, :proponents, :venue, :date
    )";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':voucher_no' => $voucher_no,
        ':fund_cluster' => $fund_cluster,
        ':entity_name' => $entity_name,
        ':ris_number' => $ris_number,
        ':purchase_request_no' => $purchase_request_no,
        ':requisitioner' => $requisitioner,
        ':purchase_order_no' => $purchase_order_no,
        ':project_amount' => $project_amount,
        ':supplier_name' => $supplier_name,
        ':project_title' => $project_title,
        ':background_rationale' => $background_rationale,
        ':objectives' => $objectives,
        ':methodology' => $methodology,
        ':expected_output' => $expected_output,
        ':proponents' => $proponents,
        ':venue' => $venue,
        ':date' => $date
    ]);

    $transaction_id = $pdo->lastInsertId(); // Get the inserted transaction's ID

    // Insert items
    $item_sql = "INSERT INTO barangay_transaction_items (
        barangay_transaction_id, item_no, unit, description, quantity, unit_price, amount
    ) VALUES (
        :transaction_id, :item_no, :unit, :description, :quantity, :unit_price, :amount
    )";

    $item_stmt = $pdo->prepare($item_sql);

    foreach ($items as $item) {
        $item_stmt->execute([
            ':transaction_id' => $transaction_id,
            ':item_no' => $item['item_no'],
            ':unit' => $item['unit'],
            ':description' => $item['description'],
            ':quantity' => $item['quantity'],
            ':unit_price' => $item['unit_price'],
            ':amount' => $item['amount']
        ]);
    }

    echo json_encode(['status' => 'success', 'message' => 'Transaction and items saved successfully.']);

} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Insert failed: ' . $e->getMessage()]);
}
?>
