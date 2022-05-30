<?php
include 'editcategorypro.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Category</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>
        <script src ="../js/catval.js"></script>
        <link href="../css/new.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
        <h2>Edit Category</h2>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Logout : <a href="../logout.php"><?=$_SESSION['email']?></a></h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="categorylist.php"> Back</a>
                    </div>
                </div>
            </div>
            <form action="" method="POST">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="cname" id="cname" class="form-control" placeholder="Enter Category Name" value="<?=$row['name']?>" autofocus>
                            <span class="text-danger" id="cnameval"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <b>Active</b>
                        <div class="form-group">
                            <select name="active" id="active" class="form-control">
                                <option value="Yes"<?php if($row['active']=="Yes"){ echo "selected";}?>>Yes</option>
                                <option value="No"<?php if($row['active']=="No"){ echo "selected";}?>>No</option>
                            </select>
                        </div>
                        <small id="activeval" class="text-danger"></small>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>