<?php
// spreekt voor zichzelf, vernietigd gewoon de session en stuurt je daarna naar inlog.php
session_start();
session_destroy();
header('Location: login.php'); 
exit;
?>

