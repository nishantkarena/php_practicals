<?php
session_start();
unset($_SESSION['email1']);
header("Location:login.php");
?>