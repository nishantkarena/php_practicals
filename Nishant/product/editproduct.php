<?php
include 'editproductpro.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Edit Product</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>
        <link href="../css/admin.css" rel="stylesheet" type="text/css">
        <script src ="../js/proval.js"></script>
    </head>
    <body>
        <div class="container">
        <h2>Edit Product</h2>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Logout : <a href="../logout.php"><?=$_SESSION['email']?></a></h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="product.php"> Back</a>
                    </div>
                </div>
            </div>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Product Name" value="<?=$row['name']?>" required>
                            <span class="text-danger" id="nameval"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Category Id</strong>
                            <select name="category_id" id="category_id" class="form-control">
                                <?php 
                                    include '../connection.php';
                                    $sql1 = "SELECT * FROM category";
                                    $result1 = mysqli_query($conn, $sql1);
                                    if (mysqli_num_rows($result1) > 0) {
                                        while($row1 = mysqli_fetch_assoc($result1)) {?>
                                        <option value="<?php echo $row1['id']?>" <?php if($row['category_id']==$row1['id']){ echo "selected";}?>><?php echo $row1['name']?></option>
                                    <?php }
                                    } 
                                ?>
                            </select>
                            <span class="text-danger" id="category_idval"></span>
                        </div>
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Created By UserId:</strong>
                            <span><?=$_SESSION['email']?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Active</strong>
                            <select name="active" id="active" class="form-control">
                            <option value="">Select</option>
                                <option value="Yes"<?php if($row['active']=="Yes"){ echo "selected";}?>>Yes</option>
                                <option value="No"<?php if($row['active']=="No"){ echo "selected";}?>>No</option>
                            </select>
                            <small id="activeval" class="text-danger"></small>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">  
                        <div class="form-group">
                            <strong>Select Image:</strong>
                            <input type="file" id="image" name="image" class="form-control" accept=".jpg,.jpeg,.png">
                            <span>Only PNG, JPEG and JPG files are allowed</span>
                            <span class="text-danger" id="imageval"><?php echo $row['images'];?></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" name="edit" class="btn btn-primary">Edit Product</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>