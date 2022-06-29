<?php
session_start();
include '../../connection.php';
if(!$_SESSION['email']){
    header("Location:../../admin.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Category List Page</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <script src="../../js/category_delete.js"></script>
        <link href="../../css/new.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <span id="txtmsg"></span>
        <div class="container">
        <h2>Category List</h2>
            <div class="row" style="margin-top: 5rem;">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                    <h2><?=$_SESSION['email']?>: <a href="../../logout.php">Logout</a></h2>
                    </div>
                    <div class="pull-right">
                            <a class="btn btn-success" href="addcategory.php"> Add Category</a>
                            <a class="btn btn-primary" href="../index.php"> Back</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Active</th>
                    <th width="280px">Action</th>
                </tr>
                <?php
                
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                        <td><?= $row['id']?></td>
                        <td><?= $row['cname']?></td>
                        <td><?php if($row['active']=="1"){echo "Yes";}else{echo "No";}?></td>
                        <td><a href='editcategory.php?id=<?=$row['id']?>' class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" onclick="deleterow(<?=$row['id']?>);">Delete</button></td>
                    </tr>
              <?php }
                }else{
                        echo "<td colspan = '4'><center>"."No records Found"."</center></td>";
                }?>
            </table>  
        </div>
    </body>
</html>