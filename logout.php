<?php
// Initialize the session

session_destroy(); //destroy the session
unset($_SESSION["id"]);
unset($_SESSION["Ddriverid"]);
header("location:../index.php"); //to redirect back to "index.php" after logging out
exit();
?>