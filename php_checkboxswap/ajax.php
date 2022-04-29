<?php

// print_r($result2);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
<div style="margin: auto;width: 60%;">
	<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
	</div>
	<form id="fupForm" name="form1" method="post">
    <table>
                <tr>
                    <th>Table 1</th>
                </tr>
                    <?php
                        include "connection.php";
                        // require "process2.php";
                        
                        $sql="SELECT * FROM table1 ORDER BY formdata ASC";
                        $result = mysqli_query($conn, $sql);
                        
                        $sql2="SELECT * FROM table2 ORDER BY formdata2 ASC";
                        $result2 = mysqli_query($conn, $sql2);
                        // print_r($result2);
                        if (mysqli_num_rows($result2) > 0) {
                            
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result2)) {?>
                <tr>
                                    <td>
                                        <input type="checkbox" id="checkbox" name=checkbox[] value="<?php echo $row['formdata2'];?>"><?php echo $row['formdata2'];?>
                                    </td><?php
                            }
                        }
                    ?>
                </tr>
                <tr >
                    <td>
                    <input type="button" name="save" class="btn btn-primary" value="Save to database" id="butsave">
                    </td>
                </tr>
            </table>
		
	</form>
</div>
</body>
</html>