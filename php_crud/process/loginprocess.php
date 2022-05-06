<?php
if(isset($_SESSION['email1'])){
    header("Location:list.php");
}
if(isset($_POST['cnaclick'])){
    $useremail = $_POST['txtemail'];  
    $userpassword = $_POST['password'];  

    $sql = "select * from student where email = '$useremail' and password = '$userpassword'";
    $result = mysqli_query($conn, $sql);

    if($useremail != "" && $userpassword != ""){
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['email1']=$useremail;
                header("Location:list.php");
            }
        }
        else {
            echo "<center>"."Email or Password Invalid."."</center>";
        }
    }
    else{
        echo "<center>"."Please Enter Required Fields"."</center>";
    }
}
?>