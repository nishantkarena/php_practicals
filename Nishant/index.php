<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Product Page</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        <script src="js/product_delete.js"></script>
        <link href="css/admin.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <span id="txtmsg"></span>
        <div class="container">
        <h2>Product List</h2>
            <div class="row" style="margin-top: 5rem;">
                <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                <a class="btn btn-primary" href="admin.php"> Admin</a>
                    </div>
                    <div class="pull-left">
                        <form action="" method="POST">
                            <span>Select Category :</span>
                            <select class="btn" name="category_id" id="category_id" class="form-control">
                                <option value="all">All</option>
                                <?php 
                                //Fetching Categories from category table for filter data
                                    
                                    if(isset($_POST['catgory_submit']) && count($_POST)>0){
                                        $catid = $_POST['category_id'];
                                        $sql1 = "SELECT * FROM category WHERE active='1'";
                                        $result1 = mysqli_query($conn, $sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                                            <option value="<?php echo $row1['id']?>" <?php if($row1['id']==$catid){ echo "selected";}?>><?php echo $row1['cname']?></option>
                                        <?php }
                                        } 
                                    }else{
                                        $sql1 = "SELECT * FROM category WHERE active='1'";
                                        $result1 = mysqli_query($conn, $sql1);
                                        if (mysqli_num_rows($result1) > 0) {
                                            while($row1 = mysqli_fetch_assoc($result1)) {?>
                                            <option value="<?php echo $row1['id']?>"><?php echo $row1['cname']?></option>
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
                </tr>
                <?php
                //Display all Data when 'ALL' selected from the category dropdown
                if(isset($_POST['catgory_submit']) && count($_POST)>0){
                    if($_POST['category_id']=="all"){
                        $sql = "SELECT p.id, p.name, c.cname,a.email,p.active,p.images FROM product p INNER JOIN category c ON p.category_id = c.id INNER JOIN admin a ON p.createdbyuser = a.id where c.active= '1';";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)) {?>
                            <tr>
                            <td><?= $row['id']?></td>
                            <td><?= $row['name']?></td>
                            <td><?= $row['cname']?></td>
                            <td><?= $row['email']?></td>
                            <td><?php if($row['active']=="1"){echo "Yes";}else{echo "No";}?></td>
                            <td><img src="uploads/<?php echo $row['images'];?>" class="img-responsive img-thumbnail" width="150" ></td>
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
                    $sql = "SELECT p.id, p.name, c.cname,a.email,p.active,p.images FROM product p INNER JOIN category c ON p.category_id = c.id INNER JOIN admin a ON p.createdbyuser = a.id where c.active= '1' and c.id='$catid';";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                        <td><?= $row['id']?></td>
                        <td><?= $row['name']?></td>
                        <td><?= $row['cname']?></td>
                        <td><?= $row['email']?></td>
                        <td><?php if($row['active']=="1"){echo "Yes";}else{echo "No";}?></td>
                        <td><img src="uploads/<?php echo $row['images'];?>" class="img-responsive img-thumbnail" width="150" ></td>
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
                    $sql = "SELECT p.id, p.name, c.cname,a.email,p.active,p.images FROM product p INNER JOIN category c ON p.category_id = c.id INNER JOIN admin a ON p.createdbyuser = a.id where c.active= '1';";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                        <td><?= $row['id']?></td>
                        <td><?= $row['name']?></td>
                        <td><?= $row['cname']?></td>
                        <td><?= $row['email']?></td>
                        <td><?php if($row['active']=="1"){echo "Yes";}else{echo "No";}?></td>
                        <td><img src="uploads/<?php echo $row['images'];?>" class="img-responsive img-thumbnail" width="150" ></td>
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