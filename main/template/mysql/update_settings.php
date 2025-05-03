<?php
include 'conn.php'; // Ensure correct connection file

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Fetch data from POST request
        $id = $_POST['id'] ?? '';
        $barangay_name = $_POST['barangay_name'] ?? '';
        $barangay_captain = $_POST['barangay_captain'] ?? '';
        $barangay_city = $_POST['barangay_city'] ?? '';
        $barangay_province = $_POST['barangay_province'] ?? '';
        $barangay_treasurer = $_POST['barangay_treasurer'] ?? '';
        $city_accountant = $_POST['city_accountant'] ?? '';
        $province_no = $_POST['province_no'] ?? '';
        $barangay_encoder = $_POST['barangay_encoder'] ?? '';
        $current_scki_no = $_POST['current_scki_no'] ?? '';

        // SQL Update Query (Using Named Parameters)
        $sql = "UPDATE settings
                SET barangay_name = :barangay_name,
                    barangay_captain = :barangay_captain,
                    barangay_city = :barangay_city,
                    barangay_province = :barangay_province,
                    barangay_treasurer = :barangay_treasurer,
                    city_accountant = :city_accountant,
                    province_no = :province_no,
                    barangay_encoder = :barangay_encoder,
                    current_scki_no = :current_scki_no
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        // Bind Parameters
        $stmt->bindParam(':barangay_name', $barangay_name);
        $stmt->bindParam(':barangay_captain', $barangay_captain);
        $stmt->bindParam(':barangay_city', $barangay_city);
        $stmt->bindParam(':barangay_province', $barangay_province);
        $stmt->bindParam(':barangay_treasurer', $barangay_treasurer);
        $stmt->bindParam(':city_accountant', $city_accountant);
        $stmt->bindParam(':province_no', $province_no);
        $stmt->bindParam(':barangay_encoder', $barangay_encoder);
        $stmt->bindParam(':current_scki_no', $current_scki_no);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Execute Query
        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Barangay settings successfully updated!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update barangay settings."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid request method."]);
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
