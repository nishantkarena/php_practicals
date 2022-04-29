<?php
	include 'connection.php';
	$data=$_POST['checkbox'];
	foreach($data as $key=>$values){
        $ins="INSERT INTO table1 VALUES('','$values')";
        if(mysqli_query($conn, $ins)){
            $del = "DELETE FROM table2 WHERE formdata2='$values'";
            if (mysqli_query($conn, $del)) {
                echo json_encode(array("statusCode"=>200));
                // header("location:excersice3.php");
                // echo "Record deleted successfully";
            } else {
                echo json_encode(array("statusCode"=>201));
                // echo "Error deleting record: " . mysqli_error($conn);
            }
        }
    }
	mysqli_close($conn);
?>