<?php
include "connection.php";
require "process2.php";

// $sql="SELECT * FROM table1 ORDER BY formdata ASC";
// $result = mysqli_query($conn, $sql);

// $sql2="SELECT * FROM table2 ORDER BY formdata2 ASC";
// $result2 = mysqli_query($conn, $sql2);

$obj= new formdata();
$data= $obj->getdata();
$result=$data['result'];
$result2=$data['result2'];


if(isset($_POST['right'])){
    foreach ($_POST['checkbox'] as $key => $value) {

        $obj->insertdata($value,'table2','table1','formdata');
        
    }
}
if(isset($_POST['left'])){
    foreach ($_POST['checkbox1'] as $key => $value) {

        $obj->insertdata($value,'table1','table2','formdata2');
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tables</title>
        <style> 
            table, th, td {
            border:1px solid black;
            }
        </style>
    </head>
    <body>
        <form action="" method="POST">
            <table style="width:50%">
                <tr>
                    <th>Table 1</th>
                </tr>
                    <?php
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                                    <td>
                                        <input type="checkbox" name=checkbox[] value="<?php echo $row['formdata'];?>"><?php echo $row['formdata'];?>
                                    </td><?php
                            }
                        }
                    ?>
                </tr>
                <tr >
                    <td>
                        <input type="submit" name="right" value="->Move Right->">
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <br>
        <br>
        <form action="" method="POST">
            <table style="width:50%">
                <tr>
                    <th>Table 2</th>
                </tr>
                    <?php
                        if (mysqli_num_rows($result2) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result2)) {?>
                <tr>
                                    <td>
                                        <input type="checkbox" name=checkbox1[] value="<?php echo $row['formdata2'];?>"><?php echo $row['formdata2'];?>
                                    </td><?php
                            }
                        }
                    ?>
                </tr>
                <tr >
                    <td>
                        <input type="submit" name="left" value="<-Move Left<-">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>