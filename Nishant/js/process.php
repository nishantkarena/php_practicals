<?php
session_start();
include '../connection.php';
if(isset($_POST['request'])){
    $request = $_POST['request'];
}
?>

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
        $sql = "SELECT * FROM product where active='$request'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {?>
    <tr>
        <td><?= $row['id']?></td>
        <td><?= $row['name']?></td>
        <td>
            <?php 
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
        <td><img src="../uploads/<?php echo $row['images'];?>" class="img-responsive img-thumbnail" width="150"></td>
        <?php
                    if($_SESSION['email']=="testuser@kcsitglobal.com"){?>
        <td><a href='editproduct.php?id=<?=$row['id']?>' class="btn btn-primary">Edit</a>
            <button class="btn btn-danger" onclick="deleterow(<?=$row['id']?>);">Delete</button>
        </td>
        <?php }?>
    </tr>
    <?php }
                } 
                else{
                    echo "<td colspan = '7'><center>"."No records Found"."</center></td>";
                }
            ?>
</table>