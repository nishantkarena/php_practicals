<?php
session_start();
include 'connection.php';
if(isset($_SESSION['email'])){
    header("Location:admin/index.php");
}
if(isset($_REQUEST) && count($_REQUEST)>0){
    $useremail = $_POST['txtemail'];  
    $userpassword = $_POST['txtpassword'];  
    
    if($useremail != "" && $userpassword != ""){
        $sql = "select * from admin where email = '$useremail' and password = '$userpassword'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['email']=$useremail;
            $_SESSION['usertype']=$row['usertype'];
            $_SESSION['uid']=$row['id'];
            header("Location:admin/index.php");
            }
        }
        else {
            echo "<center>". "Email or Password Invalid."."<br>". "</center>";
        }
    }else{
        echo "<center>". "Please Enter Email And Password."."</center>";
    }
         
}
?>