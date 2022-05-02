<?php
    include "connection.php";

    if(isset($_POST['submit'])){
        $data=implode(",",$_POST['checkbox']);
        //echo "$data";

        $sql = "INSERT INTO check_box  VALUES ('','$data')";
          
        if(mysqli_query($conn, $sql)){
            echo "<h3>data stored in a database successfully.</h3>"; 
			print_r($sql);
        } else{
            echo "ERROR: Sorry $sql. ". mysqli_error($conn);
        }
		 // Close connection
		 mysqli_close($conn);
	}
	
	else{
		echo "Enter Required Fields";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox</title>
</head>

    
<body>
    <form action="checkbox.php" method="post">
        <input type="checkbox" name="checkbox[]" value="value1">value 1<br>
        <input type="checkbox" name="checkbox[]" value="value2">value 2<br>
        <input type="checkbox" name="checkbox[]" value="value3">value 3<br>
        <input type="submit" name="submit">

    </form>

</body>

</html>