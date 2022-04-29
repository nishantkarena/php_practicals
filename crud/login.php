<?php

include 'connection.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


if(isset($_REQUEST)&& count($_REQUEST)>0){

    $useremail = $_POST['txtemail'];  
    $userpassword = $_POST['txtpassword'];  

    $sql = "select * from student where email = '$useremail' and password = '$userpassword'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['email']=$useremail;
            // session_unset();
            // print_r($_SESSION);
            header("Location:list.php");
        }
    }
    else {
        echo "Email or Password Invalid.";
    }
}
?>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
		<link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>		
		<script type="text/javascript" src="js/login.js"></script>
        <style type="text/css">
            #cnform{box-shadow:0px 0px 3px gray;margin-top:30px;margin-bottom:30px;}
			i.fa,b{color:teal;}
        </style>
    </head>
    <body>
		<form action="" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12" id="cnform">
                    <h3 class="text-center"><i class="fa fa-user-plus"></i>Login</h3><hr>  
                    <div class="form-group">
						<b>Email</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
							<input id="txtemail" type="text" name="txtemail"placeholder="Enter email id here" maxlength="50" class="form-control" />
						</div>
						<small id="txtemailval" class="text-danger"></small>
					</div>
                    <div class="form-group">
						<b>Password</b>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input id="txtpassword" type="password" name="txtpassword" placeholder="Enter password here" maxlength="12" class="form-control" />
						</div>
						<small id="txtpasswordval" class="text-danger"></small>
					</div>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="cnaclick"><i class="fa fa-user-plus" style="color:white;"></i>
                    </div>
                </div>
            </div>
        </div>
		</form>
    </body>
</html>