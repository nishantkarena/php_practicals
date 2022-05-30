<?php
session_start();
if(!$_SESSION['email']){
    header("Location:admin.php");
}
?> 
<!DOCTYPE html> 
<html>
    <head>
        <title>Home Page</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
        <script src="js/admin_delete.js"></script>
        <link href="css/new.css" rel="stylesheet" type="text/css">
    </head>
    <body>
    <span id="txtmsg"></span>
        <div class="container">
        <h2>Admin Page</h2>
            <div class="row" style="margin-top: 5rem;">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                    <h2>Logout : <a href="logout.php"><?=$_SESSION['email']?></a></h2>
                    </div>
                    <div class="pull-right">
                        <?php 
                        if($_SESSION['email']=="testuser@kcsitglobal.com"){?>
                            <a class="btn btn-success" href="admin/createadmin.php"> Create New Admin</a>
                            <a class="btn btn-primary" href="product/product.php"> Back</a>
                  <?php }else{ ?>
                            <a class="btn btn-primary" href="product/product.php"> Back</a>
                  <?php } ?>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Hobbies</th>
                    <?php 
                    if($_SESSION['email']=="testuser@kcsitglobal.com"){?>
                    <th width="280px">Action</th>
                    <?php }?>
                </tr>
                <?php
                include 'connection.php';
                $sql = "SELECT * FROM admin";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {?>
                    <tr>
                    <td><?= $row['id']?></td>
                    <td><?= $row['name']?></td>
                    <td><?= $row['email']?></td>
                    <td><?= $row['gender']?></td>
                    <td><?= $row['hobbies']?></td>
                    <?php
                    if($_SESSION['email']=="testuser@kcsitglobal.com"){?>
                    <td><a href='admin/editadmin.php?id=<?=$row['id']?>' class="btn btn-primary">Edit</a>
                    <button class="btn btn-danger" onclick="deleterow(<?=$row['id']?>);">Delete</button></td>
                    <?php }?>
                </tr>
                <?php }
                }
                else{
                    echo "<td colspan = '6'><center>"."No records Found"."</center></td>";
                } ?>
            </table>  
        </div>
    </body>
</html>