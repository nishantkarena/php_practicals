<?php
include 'addproductpro.php';
?>
<html>
    <head>
        <title>Add Product Form</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="   crossorigin="anonymous"></script>
        <script src ="../../js/proval.js"></script>
        <link href="../../css/admin.css" rel="stylesheet" type="text/css">
    </head>
    </head>
    <body> 
        <div class="container">
        <h2>Add New Product</h2>
            <div class="row">
                <span class="text-danger" id="error"></span>
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2><?=$_SESSION['email']?>: <a href="../../logout.php">Logout</a></h2>
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
                            <strong>Product Name:</strong>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter First Name"  autofocus required>
                            <span class="text-danger" id="nameval"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Category Id</strong>
                            <select name="category_id" id="category_id" class="form-control" required>
                                <?php 
                                    $sql = "SELECT * FROM category where active='1'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                     while($row = mysqli_fetch_assoc($result)) {?>
                                        <option value="<?php echo $row['id']?>"><?php echo $row['cname']?></option>
                                    <?php }
                                    } 
                                ?>
                            </select>
                            <span class="text-danger" id="category_idval"></span>
                        </div>
                    </div>  
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Active Status</strong>
                            <select name="active" id="active" class="form-control" required>
                                <option value="">Select</option>
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            <span class="text-danger" id="activeval"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">  
                        <div class="form-group">
                            <strong>Select Image:</strong>
                            <input type="file" id="image"name="image" class="form-control" required accept=".jpg,.jpeg,.png">
                            <span>Only PNG, JPEG and JPG files are allowed</span>
                            <span class="text-danger" id="imageval"></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>