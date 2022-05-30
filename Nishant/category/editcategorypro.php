<?php
session_start(); 
if(!isset($_SESSION['email']) || isset($_SESSION['email']) != "testuser@kcsitglobal.com"){
    header("Location:../admin.php");
}
include '../connection.php';
$id= $_GET['id'];
if(isset($_REQUEST['edit'])){
    $name=$_POST["cname"];
	$active=$_POST["active"];

    if($name != "" && $active != ""){
        $edit = "UPDATE `category` SET `name`='$name',`active`='$active' WHERE `id`='$id'"; 
        $result1 = $conn->query($edit); 
        if ($result1 == TRUE) {
            header("Location:categorylist.php");
        }else{
            echo "<center>"."Error:" . $edit . "<br>" . $conn->error."</center>";
        }       
    }
    else{
        echo "<center>"."Enter Required Fields."."</center>";
    }
}
// to get category details.
$sql= "select * from category where id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}
else{
    echo "<center>"."No data Found"."</center>";
}
?>