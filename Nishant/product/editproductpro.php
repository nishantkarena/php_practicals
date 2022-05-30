<?php
session_start(); 
if(!isset($_SESSION['email']) || isset($_SESSION['email']) != "testuser@kcsitglobal.com"){
    header("Location:../admin.php");
}
include '../connection.php';
$id= $_GET['id'];
if(isset($_REQUEST['edit'])){
    $name=$_POST["name"];
	$category_id=$_POST["category_id"];
	$createdbyuser=$_SESSION['email'];
	$active=$_POST["active"];
    $image=$_FILES["image"]["name"];
    $rname=rand().$image;

    if($name != "" && $category_id != "" && $createdbyuser != "" && $active != ""){
        $target_dir = "../uploads/";
        $target_file = $target_dir . $rname;
        $uploadOk = 1;
        $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(!empty($image)){
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
                    $selecti= "select * from product where id='$id'";
                    $datai = mysqli_query($conn, $selecti);
                    $totali = mysqli_num_rows($datai);
                    $rowi = mysqli_fetch_assoc($datai);
                    unlink("../uploads/".$rowi['images']);

                    $edit = "UPDATE `product` SET `name`='$name',`category_id`='$category_id',`images`='$rname',`active`='$active',`createdbyuser`='$createdbyuser' WHERE `id`='$id'"; 
                    $result2 = $conn->query($edit); 
                    if ($result2 == TRUE) {
                        header("Location:product.php");
                    }else{
                        echo "<center>"."Error:" . $edit . "<br>" . $conn->error."</center>";
                    }
                } else {
                    echo "<center>"."Sorry, there was an error uploading your file."."</center>"."<br>";
                }
            }
        }else{
            $edit = "UPDATE `product` SET `name`='$name',`category_id`='$category_id',`active`='$active',`createdbyuser`='$createdbyuser' WHERE `id`='$id'"; 
            $result2 = $conn->query($edit); 
            if ($result2 == TRUE) {
                header("Location:product.php");
            }else{
                echo "<center>"."Error:" . $edit . "<br>" . $conn->error."</center>";
            }
        }
    }
    else{
        echo "<center>"."Please Enter Required Fields."."</center>";
    }
}
//to get product details
$sql= "select * from product where id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
}else{
    echo "<center>"."No data found"."</center>";
}
?>