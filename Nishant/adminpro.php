<?php
session_start();
include 'connection.php';
if(isset($_SESSION['email'])){
    header("Location:product/product.php");
}
if(isset($_REQUEST) && count($_REQUEST)>0){
    $useremail = $_POST['txtemail'];  
    $userpassword = $_POST['txtpassword'];  
    
    if($useremail != "" && $userpassword != ""){
        $sql = "select * from super_admin where email = '$useremail' and password = '$userpassword'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['email']=$useremail;
                header("Location:product/product.php");
            }
        }
        else {
            $sql2 = "select * from admin where email = '$useremail' and password = '$userpassword'";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
            while($row2 = mysqli_fetch_assoc($result2)) {
                $_SESSION['email']=$useremail;
                header("Location:product/product.php");
                }
            }
            else {
                echo "<center>". "Email or Password Invalid."."<br>". "</center>";
            }
        }  
    }else{
        echo "<center>". "Please Enter Email And Password."."</center>";
    }
         
}
?>