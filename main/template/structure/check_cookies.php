<?php
// Start the session (optional, if you're also using sessions)
session_start();

// Check if the "brgy" cookie is set
if (!isset($_COOKIE['brgy'])) {
    // Redirect to login page if cookie doesn't exist
    header("Location: ./../../login-page.php");
    exit(); // Ensure script stops execution after redirect
}
?>