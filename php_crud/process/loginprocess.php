<?php
if(isset($_SESSION['email1'])){
    header("Location:index.php");
}
if(isset($_POST['cnaclick'])){
    $useremail = $_POST['txtemail'];  
    $userpassword = $_POST['password'];  

    if($useremail != "" && $userpassword != ""){
        $sql = "select * from student where email = '$useremail' and password = '$userpassword'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $_SESSION['email1']=$useremail;
                header("Location:index.php");
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