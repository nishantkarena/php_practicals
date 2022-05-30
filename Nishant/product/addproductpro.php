<?php
session_start(); 
include '../connection.php';
if(!isset($_SESSION['email']) || isset($_SESSION['email']) != "testuser@kcsitglobal.com"){
    header("Location:../admin.php");
}
if(isset($_POST['submit']) && count($_POST)>0)
{
	$name=$_POST["name"];
	$category_id=$_POST["category_id"];
	$createdbyuser=$_SESSION['email'];
	$active=$_POST["active"];
	$image=$_FILES["image"]["name"];
    $rname=rand().$image;

    if($name != "" && $category_id != "" && $image != "" && $createdbyuser != "" && $active != ""){
        $target_dir = "../uploads/";
        $target_file = $target_dir . $rname;
        $uploadOk = 1;
        $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "<center>"."Sorry, your file is too large."."</center>"."<br>";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($filetype != "png" && $filetype != "jpeg" && $filetype != "jpg") {
            echo "<center>"."Sorry, only PNG, JPEG and JPG files are allowed."."</center>"."<br>";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "<center>"."Sorry, your file was not uploaded."."</center>";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO product VALUES (NULL,'$name','$category_id','$rname','$createdbyuser','$active')";
                if(mysqli_query($conn, $sql)){
                    header("Location:product.php");
                } else{
                    echo "<center>"."ERROR: Sorry $sql. ". mysqli_error($conn)."</center>";
                }
            } else {
                echo "<center>"."Sorry, there was an error uploading your file."."</center>"."<br>";
            }
        }
	}
	else{
		echo "<center>"."Enter Required Fields"."</center>";
	}
}
?>