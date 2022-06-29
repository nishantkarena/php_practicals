<?php
session_start(); 
include '../../connection.php';
if(!isset($_SESSION['email'])){
    header("Location:../../admin.php");
}
$id= $_GET['id'];
if(isset($_REQUEST['edit'])){
    $cname=$_POST["cname"];
	$active=$_POST["active"];

    if($cname != "" && $active != ""){
        $edit = "UPDATE `category` SET `cname`='$cname',`active`='$active' WHERE `id`='$id'"; 
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