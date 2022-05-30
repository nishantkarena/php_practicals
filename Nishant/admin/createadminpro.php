<?php
session_start();
include '../connection.php';
if(!isset($_SESSION['email']) || isset($_SESSION['email']) != "testuser@kcsitglobal.com"){
    header("Location:../admin.php");
}
if(isset($_POST['submit']) && count($_POST)>0){
	$name=$_POST["name"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$gender=$_POST["gender"];
	@$hobbies=implode(',',(array)$_POST["checkbox"]);
    if($hobbies==""){
        echo "<center>"."Please Select Any Hobbies"."</center>"."<br>";
    }
	if($name != "" && $email != "" && $password != "" && $gender != "" && $hobbies != ""){
		$sql = "INSERT INTO admin VALUES (NULL,'$name','$email','$gender','$hobbies','$password')";
        if(mysqli_query($conn, $sql)){
			header("Location:../home.php");
        } else{
            echo "<center>"."ERROR: Sorry $sql. ". mysqli_error($conn)."</center>";
        }
	}
	else{
		echo "<center>"."Enter Required Fields"."</center>";
	}
}
?>