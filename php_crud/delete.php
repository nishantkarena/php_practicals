<?php
include "connection.php";

$did=$_GET['id'];
  $query = "SELECT * FROM student where id = '$did'";
  $data = mysqli_query($conn, $query);
  $total = mysqli_num_rows($data);
  $row = mysqli_fetch_assoc($data);
  if($row == 0){
      echo "No Data available";
  }
  else
  {
      $sql = "DELETE FROM student WHERE id='$did'";
      if ($conn->query($sql) === TRUE) {
        unlink("uploads/".$row['file']);
        echo '1';
      } else {
      echo "Error deleting record: " . $conn->error;
      }
  }