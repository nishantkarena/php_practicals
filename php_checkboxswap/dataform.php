<?php
include "connection.php";
if(isset($_POST['submit'])){

    $data=$_POST["checkbox"];
    // print_r($id=$_POST["checkbox"][]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formdata</title>
</head>
<body>
    <form action=""method="post">
        <table>
            <tr>
                <th>ID</th>
                <th>Checkbox</th>
                <th>Text</th>
            </tr>

            <?php
                foreach($data as $key=>$values){
                    $result=0; 
                    $sql = "INSERT INTO Sampledata  VALUES ('','$values','')";
                    if(mysqli_query($conn, $sql)){
                        $result=1;
                        ?>
                        <tr>
                            <td><?php ?></td>
                            <td><input checked type="checkbox" ><?php echo $values;?></td>
                            <td><input type="text" name="textdata[]"></td>
                        </tr>
                        <?php
                    } 
                    else{
                            echo "ERROR: Sorry . ". mysqli_error($conn);
                    }
                }
                
            ?>
            <td><input type="submit" name="dsubmit"></td>
            <?php
            if(isset($_POST['dsubmit'])){
                echo "<pre>";
                print_r($_POST);
                echo "</pre>";
                foreach($_POST['dsubmit'] as $akey=>$avalue){
                    $sql = "INSERT INTO Sampledata  VALUES ('','','$avalue')";
                    
                }

            }
            ?>
        </table>
    </form>
</body>
</html>