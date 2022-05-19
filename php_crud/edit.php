<?php
session_start(); 

include 'connection.php';
require 'process/editprocess.php';
$sql= "select * from student where id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
} else {
    echo "Error";
}
?>
<html>

<head>
    <title>Edit Form</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
        integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
    <script src="js/jsvalidation.js"></script>
    <link rel="stylesheet" href="css/indexpage.css">
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12"
                    id="cnform">
                    <h3 class="text-center"><i class="fa fa-user-plus"></i>Edit</h3>
                    <hr>
                    <div class="form-group">
                        <b>Firstname</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="txtfirstname" name="txtfirstname" type="text" placeholder="Enter firstname here"
                                maxlength="20" class="form-control" value="<?=$row['fname']?>" autofocus required />
                        </div>
                        <small id="txtfirstnameval" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <b>Lastname</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="txtlastname" name="txtlastname" type="text" placeholder="Enter lastname here"
                                maxlength="20" class="form-control" value="<?=$row['lname']?>" required />
                        </div>
                        <small id="txtlastnameval" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <b>Email</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input id="txtemail" name="txtemail" type="text" placeholder="Enter email id here"
                                maxlength="50" class="form-control" value="<?=$row['email']?>" required />
                        </div>
                        <small id="txtemailval" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <b>Password</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input id="txtpassword" name="txtpassword" type="password" placeholder="Enter password here"
                                maxlength="12" class="form-control" value="<?=$row['password']?>" required />
                        </div>
                        <small id="txtpasswordval" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <b>Gender</b>
                        <div class="input-group">
                            <input type="radio" class="form-control" name="txtgender" id="male" value="1"
                                <?php if($row['gender']=="1"){ echo "checked";}?>>
                            <span class="input-group-addon"><i class="fa fa-male">Male</i></span>
                            <input type="radio" class="form-control" name="txtgender" id="female" value="0"
                                <?php if($row['gender']=="0"){ echo "checked";}?>>
                            <span class="input-group-addon"> <i class="fa fa-female">Female</i></span>
                        </div>
                        <small id="genderval" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <b>Address</b>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-child"></i></span>
                            <textarea name="address" id="address" cols="5" placeholder="Enter Your Address" rows="5"
                                class="form-control" required><?=$row['address']?></textarea>
                        </div>
                        <small id="addressval" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <b>Designation</b>
                        <div class="input-group">
                            <span class="input-group-addon"></span>
                            <select name="designation" id="designation" class="form-control">
                                <option value="">Select</option>
                                <option value="pr" <?php if($row['designation']=="pr"){ echo "selected";}?>>Project
                                    Manager</option>
                                <option value="jr" <?php if($row['designation']=="jr"){ echo "selected";}?>>Jr.Developer
                                </option>
                                <option value="sr" <?php if($row['designation']=="sr"){ echo "selected";}?>>Sr.Developer
                                </option>
                                <option value="hr" <?php if($row['designation']=="hr"){ echo "selected";}?>>Human
                                    Resource</option>
                            </select>
                        </div>
                        <small id="designationval" class="text-danger"></small>
                    </div>
                    <div class="form-group">
                        <b>Select File</b>
                        <input type="file" id="fileToUpload" name="fileToUpload" class="form-control">
                        <span>Last Uploaded File : <?=$row['file']?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="cnaclick" name="edit" class="btn btn-primary" class="form-control"
                            value="Edit">
                            <a href="index.php" class="btn btn-primary" class="form-control">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>