<?php
session_start();
include '../connection.php';
$type=$_SESSION['usertype'];
if($type==0){
	header("Location:../admin.php");
}
if(isset($_POST['submit']) && count($_POST)>0){
	$name=$_POST["name"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$gender=$_POST["gender"];
	$usertype=0;
	@$hobbies=implode(',',(array)$_POST["checkbox"]);
    if($hobbies==""){
        echo "<center>"."Please Select Any Hobbies"."</center>"."<br>";
    }
	if($name != "" && $email != "" && $password != "" && $gender != "" && $hobbies != ""){
		$sql = "INSERT INTO admin VALUES (NULL,'$name','$email','$gender','$hobbies','$password','$usertype')";
        if(mysqli_query($conn, $sql)){
			header("Location:index.php");
        } else{
            echo "<center>"."ERROR: Sorry $sql. ". mysqli_error($conn)."</center>";
        }
	}
	else{
		echo "<center>"."Enter Required Fields"."</center>";
	}
}
?>