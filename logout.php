<?php
session_start();
session_destroy(); //destroys the session
header("Location: login.php"); //redirects the user to login form
exit();
?>
