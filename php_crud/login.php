<?php
session_start(); 
include 'connection.php';
require 'process/loginprocess.php';
?>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/indexpage.css">
    <script src="js/login.js"></script>
</head>

<body>
    <form action="" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12"
                    id="cnform">
                    <h3 class="text-center"><i class="fa fa-user-plus"></i>Login</h3>
                    <hr>
                    <div class="form-group">
                        <b>Email</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input id="txtemail" type="text" name="txtemail" placeholder="Enter email id here"
                                maxlength="50" class="form-control" required autofocus />
                        </div>
                        <small id="txtemailval" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <b>Password</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input id="password" type="password" name="password" placeholder="Enter password here"
                                maxlength="12" class="form-control" required />
                        </div>
                        <small id="passwordval" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="cnaclick" id="cnaclick"><i
                            class="fa fa-user-plus" style="color:white;"></i>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>