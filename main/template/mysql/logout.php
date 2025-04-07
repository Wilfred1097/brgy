<?php
// Start session (if needed)
session_start();

// Unset the cookie by setting its expiration to a past time
setcookie("brgy", "", time() - 3600, "/");

// Redirect to login page
header("Location: ./../../../index.php");
exit();
?>
