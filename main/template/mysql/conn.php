<?php
$host = "localhost";  // Change if using a remote database
$dbname = "barangay_db"; // Your database name
$username = "root";    // Your database username
$password = "";        // Your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
