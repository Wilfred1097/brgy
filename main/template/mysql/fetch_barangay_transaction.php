<?php
require 'conn.php'; // Include the database connection
require 'check_cookies.php'; // Check if the cookie is present

header("Content-Type: application/json");


// Fetch all transaction
try {
    $stmt = $pdo->prepare("SELECT
                                bt.*,
                                rp.name AS fund_cluster_name,
                                GROUP_CONCAT(
                                    CONCAT(
                                        'Supplier: ',
                                        IFNULL(bts.supplier_name, 'N/A'),
                                        ', ',
                                        'Item No: ',
                                        IFNULL(bti.item_no, ''),
                                        ', ',
                                        'Unit: ',
                                        IFNULL(bti.unit, ''),
                                        ', ',
                                        'Description: ',
                                        IFNULL(bti.description, ''),
                                        ', ',
                                        'Quantity: ',
                                        IFNULL(bti.quantity, ''),
                                        ', ',
                                        'Unit Price: ',
                                        IFNULL(bti.unit_price, ''),
                                        ', ',
                                        'Amount: ',
                                        IFNULL(bti.amount, '')
                                    ) SEPARATOR '||'
                                ) AS items,
                                GROUP_CONCAT(DISTINCT IFNULL(bts.supplier_name, 'N/A') SEPARATOR ', ') AS suppliers
                            FROM
                                barangay_transaction bt
                            LEFT JOIN rao_program rp ON
                                bt.fund_cluster = rp.id
                            LEFT JOIN barangay_transaction_suppliers bts ON
                                bt.id = bts.barangay_transaction_id
                            LEFT JOIN barangay_transaction_items bti ON
                                bt.id = bti.barangay_transaction_id AND
                                (bti.supplier_id = bts.id OR bti.supplier_id IS NULL)
                            GROUP BY
                                bt.id
                            ORDER BY
                                bt.id DESC;");
    $stmt->execute();
    $transaction = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => "success",
        "data" => $transaction
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "message" => "Database error: " . $e->getMessage()
    ]);
}
?>