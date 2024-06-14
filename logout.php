<?php
session_start();
session_unset();
session_destroy();
setcookie('isLoggedIn', '', time() - 3600, "/"); // Delete the cookie
header("Location: login.html");
?>
