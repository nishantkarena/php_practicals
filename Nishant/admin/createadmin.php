<?php
include 'createadminpro.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create New Admin</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>
        <script src ="../js/validation.js"></script>
        <link href="../css/new.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
        <h2>Add New Admin</h2>
            <div class="row">
                <span class="text-danger" id="error"></span>
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Logout : <a href="../logout.php"><?=$_SESSION['email']?></a></h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="../home.php"> Back</a>
                    </div>
                </div>
            </div>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter First Name" required autofocus>
                            <span class="text-danger" id="nameval"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email" required>
                            <span class="text-danger" id="emailval"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Gender:</strong>
                            <div class="input-group">
                                <input type="radio"name="gender" id="male" value="male" checked>
                                <span >Male</i></span><br>
                                <input type="radio" name="gender" id="female" value="female" >
                                <span > Female</i></span>
                            </div>
                            <span class="text-danger"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Hobbies:</strong><br>
                            <input type="checkbox" name="checkbox[]" id="checkbox" value="Cricket">Cricket<br>
                            <input type="checkbox" name="checkbox[]" id="checkbox" value="Singing">Singing<br>
                            <input type="checkbox" name="checkbox[]" id="checkbox" value="Swimming">Swimming<br>
                            <input type="checkbox" name="checkbox[]" id="checkbox" value="Shopping">Shopping<br>
                            <span class="text-danger" id="hobbiesval"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Password:</strong>
                            <input type="password" id="password" name="password" class="form-control" required>
                            <span class="text-danger" id="passwordval"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Add Admin</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>