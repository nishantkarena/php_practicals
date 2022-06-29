<?php
session_start();
include '../connection.php';
$type=$_SESSION['usertype'];
if($type==0){
	header("Location:../admin.php");
}
$id= $_GET['id'];
if(isset($_REQUEST['edit'])){
    $name=$_POST["name"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$gender=$_POST["gender"];
	$hobbies=implode(',',$_POST["checkbox"]);

    if($name != "" && $email != "" && $gender != "" && $hobbies != ""){
        if(!empty($password)){
            $edit = "UPDATE `admin` SET `name`='$name',`email`='$email',`password`='$password',`gender`='$gender',`hobbies`='$hobbies' WHERE `id`='$id'"; 
            $result1 = $conn->query($edit); 
            if ($result1 == TRUE) {
                header("Location:index.php");
            }else{
                echo "<center>"."Error:" . $edit . "<br>" . $conn->error."</center>";
            }
        }else{
            $edit = "UPDATE `admin` SET `name`='$name',`email`='$email',`gender`='$gender',`hobbies`='$hobbies' WHERE `id`='$id'"; 
            $result1 = $conn->query($edit); 
            if ($result1 == TRUE) {
                header("Location:index.php");
            }else{
                echo "<center>"."Error:" . $edit . "<br>" . $conn->error."</center>";
            }
        }
        
    }
    else{
        echo "<center>"."Please Enter Required Fields."."</center>";
    }
}
$sql= "select * from admin where id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}
else{
    echo "<center>"."No Records Found"."</center>";
}
?>