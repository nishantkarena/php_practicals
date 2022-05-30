<?php
session_start();
include '../connection.php';
if(!isset($_SESSION['email']) || isset($_SESSION['email']) != "testuser@kcsitglobal.com"){
    header("Location:../admin.php");
}
if(isset($_POST['submit']) && count($_POST)>0){
	$name=$_POST["cname"];
	$active=$_POST["active"];
	if($name != "" && $active != ""){
		$sql = "INSERT INTO category VALUES (NULL,'$name','$active')";
        if(mysqli_query($conn, $sql)){
			header("Location:categorylist.php");
        } else{
            echo "<center>"."ERROR: Sorry $sql. ". mysqli_error($conn)."</center>";
        }
		mysqli_close($conn);
	}
	else{
		echo "<center>"."Enter Required Fields"."</center>";
	}
}
?>