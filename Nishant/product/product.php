<?php
session_start();
if(!$_SESSION['email']){
    header("Location:../admin.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Product Page</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="../js/product_delete.js"></script>
        <link href="../css/admin.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <span id="txtmsg"></span>
        <div class="container">
        <h2>Product List</h2>
            <div class="row" style="margin-top: 5rem;">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <h2>Logout : <a href="../logout.php"><?=$_SESSION['email']?></a></h2>
                    </div>
                    <div class="pull-left">
                        <form action="" method="POST">
                            <span>Select Category :</span>
                            <select class="btn" name="category_id" id="category_id" class="form-control">
                                <option value="all">All</option>
                                <?php 
                                //Fetching Categories from category table for filter data
                                    include '../connection.php';
                                    if(isset($_POST['catgory_submit']) && count($_POST)>0){
                                        $catid = $_POST['category_id'];
                                        $sql1 = "SELECT * FROM category WHERE active='yes'";
                                        $result1 = mysqli_query($conn, $sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                                            <option value="<?php echo $row1['id']?>" <?php if($row1['id']==$catid){ echo "selected";}?>><?php echo $row1['name']?></option>
                                        <?php }
                                        } 
                                    }else{
                                        $sql1 = "SELECT * FROM category WHERE active='yes'";
                                        $result1 = mysqli_query($conn, $sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                                            <option value="<?php echo $row1['id']?>"><?php echo $row1['name']?></option>
                                        <?php }
                                        } 
                                    }
                                ?>
                            </select>
                            <input type="submit" name="catgory_submit" value="Show" class="btn btn-primary" >
                        </form>
                        <!-- <span>Active Status:</span>
                        <select class ="btn" name="activedata" id="activedata">
                            <option value="">Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select> -->
                        <br>
                        <?php 
                        // For Super Admin Only
                    if($_SESSION['email']=="testuser@kcsitglobal.com"){?>
                        <a class="btn btn-success" href="addproduct.php"> Add New Product</a>
                        <a class="btn btn-success" href="../category/categorylist.php"> Category</a>
                        <a class="btn btn-primary" href="../home.php"> Admin</a>
                        <?php 
                        //For Normal User
                    }else{?>
                        <a class="btn btn-primary" href="../home.php"> Admin</a>
                        <a class="btn btn-success" href="../category/categorylist.php"> Category</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <table class="table table-bordered" id="table">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Created By User ID</th>
                    <th>Active </th>
                    <th>Image</th>
                    <?php 
                    if($_SESSION['email']=="testuser@kcsitglobal.com"){?>
                    <th width="280px">Action</th>
                    <?php }?>
                </tr>
                <?php
                include '../connection.php';

                //Display all Data when 'ALL' selected from the category dropdown
                if(isset($_POST['catgory_submit']) && count($_POST)>0){
                    if($_POST['category_id']=="all"){
                        $sql = "SELECT * FROM product where active='Yes'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                            <td><?= $row['id']?></td>
                            <td><?= $row['name']?></td>
                            <td>
                                <?php 
                                //display category name from category table
                                $cat=$row['category_id'];
                                $sel="select name from category where id='$cat'";
                                $result2 = mysqli_query($conn, $sel);
                                if (mysqli_num_rows($result2) > 0) {
                                    while($row2 = mysqli_fetch_assoc($result2)) {
                                        echo $row2['name'];
                                    }
                                }
                                ?>
                            </td>
                            <td><?= $row['createdbyuser']?></td>
                            <td><?= $row['active']?></td>
                            <td><img src="../uploads/<?php echo $row['images'];?>" class="img-responsive img-thumbnail" width="150" ></td>
                            <?php
                            if($_SESSION['email']=="testuser@kcsitglobal.com"){?>
                            <td><a href='editproduct.php?id=<?=$row['id']?>' class="btn btn-primary">Edit</a>
                            <button class="btn btn-danger" onclick="deleterow(<?=$row['id']?>);">Delete</button></td>
                        <?php }?>
                        </tr>
                        <?php }
                        } 
                        else{
                            echo "<td colspan = '7'><center>"."No records Found"."</center></td>";
                        }
                    }
                }

                //Display Specific category data When any option selected from category dropdown.
                if(isset($_POST['catgory_submit']) && count($_POST)>0){
                    $catid = $_POST['category_id'];
                    $sql = "SELECT * FROM product where active='Yes' AND category_id='$catid'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                        <td><?= $row['id']?></td>
                        <td><?= $row['name']?></td>
                        <td>
                            <?php 
                            //display category name from category table
                            $cat=$row['category_id'];
                            $sel="select name from category where id='$cat'";
                            $result2 = mysqli_query($conn, $sel);
                            if (mysqli_num_rows($result2) > 0) {
                                while($row2 = mysqli_fetch_assoc($result2)) {
                                    echo $row2['name'];
                                }
                            }
                            
                            ?>
                        </td>
                        
                        <td><?= $row['createdbyuser']?></td>
                        <td><?= $row['active']?></td>
                        <td><img src="../uploads/<?php echo $row['images'];?>" class="img-responsive img-thumbnail" width="150" ></td>
                        <?php
                        if($_SESSION['email']=="testuser@kcsitglobal.com"){?>
                        <td><a href='editproduct.php?id=<?=$row['id']?>' class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" onclick="deleterow(<?=$row['id']?>);">Delete</button></td>
                        <?php }?>
                    </tr>
                    <?php }
                    } 
                    else{
                        if($catid = $_POST['category_id'] != "all"){
                            echo "<td colspan = '7'><center>"."No records Found"."</center></td>";
                        }
                    }
                }else{

                    //Display All data when page load first time or refresh Product page.
                    $sql = "SELECT * FROM product where active='Yes'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                        <td><?= $row['id']?></td>
                        <td><?= $row['name']?></td>
                        <td>
                            <?php 
                            //display category name from category table
                            $cat=$row['category_id'];
                            $sel="select name from category where id='$cat'";
                            $result2 = mysqli_query($conn, $sel);
                            if (mysqli_num_rows($result2) > 0) {
                                while($row2 = mysqli_fetch_assoc($result2)) {
                                    echo $row2['name'];
                                }
                            }
                            ?>
                        </td>
                        <td><?= $row['createdbyuser']?></td>
                        <td><?= $row['active']?></td>
                        <td><img src="../uploads/<?php echo $row['images'];?>" class="img-responsive img-thumbnail" width="150" ></td>
                        <?php
                        if($_SESSION['email']=="testuser@kcsitglobal.com"){?>
                        <td><a href='editproduct.php?id=<?=$row['id']?>' class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" onclick="deleterow(<?=$row['id']?>);">Delete</button></td>
                    <?php }?>
                    </tr>
                    <?php }
                    } 
                    else{
                        echo "<td colspan = '7'><center>"."No records Found"."</center></td>";
                    }
                }
                ?>                
            </table>  
        </div>
    </body>
</html>