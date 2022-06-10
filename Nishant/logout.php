<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['usertype']);
unset($_SESSION['uid']);
header("Location:admin.php");
?>