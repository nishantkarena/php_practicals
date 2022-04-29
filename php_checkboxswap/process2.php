<?php

class formdata 
{
    public function insertdata($data,$tableB,$tableA,$col)
    {
        require("connection.php");
        
        
        if(!empty($data)){

                $ins="INSERT INTO $tableB VALUES('','$data')";
                print_r($ins);
                if(mysqli_query($conn, $ins)){
                    echo "hello";
                    $del = "DELETE FROM $tableA WHERE $col='$data'";
                    if (mysqli_query($conn, $del)) {
                        header("location:excersice3.php");
                        // echo "Record deleted successfully";
                    } else {
                        echo "Error deleting record: " . mysqli_error($conn);
                    }
                }    
        }
        else{
            echo "Please Select any Checkbox ";
        }
    }

    public function getdata()
    {
        require("connection.php");
        // $a="HELLO";
        $sql="SELECT * FROM table1 ORDER BY formdata ASC";
        $total['result'] = mysqli_query($conn, $sql);

        $sql2="SELECT * FROM table2 ORDER BY formdata2 ASC";
        $total['result2'] = mysqli_query($conn, $sql2);

        return $total;
        // return $result2;

    }
}

?>