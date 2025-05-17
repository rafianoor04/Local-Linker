
<?php
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Optional: clear cookies if used for session tracking
// setcookie("PHPSESSID", "", time() - 3600, "/");

header("Location: admin_login.php");
exit();