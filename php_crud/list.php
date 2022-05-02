<?php
session_start(); 
if(!$_SESSION['email']){
    header("Location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="css/bootstrap/bootstrap.css" type="text/css" rel="stylesheet" />
    <link href="listcss.css" rel="stylesheet" type="text/css">
    <title>List</title>
    <script>
        function deleterow(str) {
            if(confirm('Are you sure want to delete?')){
                if (str.length == 0) {
                    document.getElementById("txtmsg").innerHTML = "";
                    return;
                } 
                else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        if(this.responseText==1){ 
                            document.getElementById("txtmsg").innerHTML = "Record deleted successfully";
                            setInterval('window.location.reload()', 1000);
                        }
                        else{
                            document.getElementById("txtmsg").innerHTML = this.responseText;
                        }
                    }
                }
            };
            xmlhttp.open("GET", "delete.php?id=" + str, true);
            xmlhttp.send();
        }
    }
    </script>
</head>
<body>
    <span id="txtmsg"></span>
    <a href="logout.php">Logout</a>
    <table id="students">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Designation</th>
            <th>Gender</th>
            <th>File</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        include 'connection.php';
        $sql = "SELECT * FROM student";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
            <td><?= $row['id']?></td>
            <td><?= $row['fname']?></td>
            <td><?= $row['lname']?></td>
            <td><?= $row['email']?></td>
            <td><?= $row['address']?></td>
            <td><?php if($row['designation']=="jr"){
                        echo "Junior Developer";
                      }
                      elseif($row['designation']=="sr"){
                          echo "Senior Developer";
                      }
                      elseif($row['designation']=="hr"){
                          echo "Human Resource";
                      }
                      else{
                          echo "Project Mangager";
                      }
                ?>
            </td>
            <td><?php if($row['gender']==1){
                        echo "Male";
                      }else{
                        echo "Female";
                      }
                ?>
            </td>
            <td><?= $row['file']?></td>
            <td><a href='edit.php?id=<?=$row['id']?>' class="btn btn-primary">Edit</a></td>
            <td><button class="btn btn-danger" onclick="deleterow(<?=$row['id']?>);">Delete</button></td>
        </tr>
       <?php    }
            } 
        ?>
        
    </table>
</body>
</html>