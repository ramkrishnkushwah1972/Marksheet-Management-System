<?php
session_start(); 
unset($_SESSION['adminlogin']);
session_destroy(); 
header("location:home.php"); 
?>

