<?php
    include "connection.php";
    $data=$_POST['checkbox'];
    // $data1=$_POST['checkbox1'];

    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";

    if(isset($_POST['right'])){
        if(!empty($data)){
            foreach($data as $key=>$values){
                $ins="INSERT INTO table2 VALUES('','$values')";
                if(mysqli_query($conn, $ins)){
                    $del = "DELETE FROM table1 WHERE formdata='$values'";
                    if (mysqli_query($conn, $del)) {
                        header("location:excersice3.php");
                        // echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . mysqli_error($conn);
                    }
                }
            }     
        }
        else{
            echo "Please Select any Checkbox ";
        }
    }

    if(isset($_POST['left'])){
        if(!empty($data1)){
            foreach($data1 as $key=>$value2){
                $ins="INSERT INTO table1 VALUES('','$value2')";
                if(mysqli_query($conn, $ins)){
                    $del = "DELETE FROM table2 WHERE formdata='$value2'";
                    if (mysqli_query($conn, $del)) {
                        header("location:excersice3.php");
                        // echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . mysqli_error($conn);
                    }
                }
            }     
        }
        else{
            echo "Please Select any Checkbox";
        }
    }
?>