<?php
if(!$_SESSION['email1']){
    header("Location:login.php");
}
$id= $_GET['id'];
if(isset($_POST['edit'])){
    $fname=$_POST['txtfirstname'];
    $lname=$_POST['txtlastname'];
    $email=$_POST['txtemail'];
    $gender=$_POST['txtgender'];
    $address=$_POST['address'];
    $designation=$_POST['designation'];
    $files=$_FILES["fileToUpload"]["name"];
    $rname=rand().$files;

    $sql = "select * from student where email = '$email'";
    $result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) >= 1) {
		echo "<center>". "This email is already being used"."</center>";
	}
	else{
        if($fname != "" && $lname != ""&& $email != "" && $gender != "" && $address != "" && $designation != ""){
            $target_dir = "uploads/";
            $target_file = $target_dir . $rname;
            $uploadOk = 1;
            $filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if(!empty($files)){
                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($filetype != "docx" && $filetype != "pdf" && $filetype != "xlsx") {
                    echo "Sorry, only PDF,DOC and XLS files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                }
                // if everything is ok, try to upload file
                else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $select= "select * from student where id='$id'";
                        $data = mysqli_query($conn, $select);
                        $total = mysqli_num_rows($data);
                        $row = mysqli_fetch_assoc($data);
                        unlink("uploads/".$row['file']);
    
                        $edit = "UPDATE `student` SET `fname`='$fname',`lname`='$lname',`email`='$email',`address`='$address',`designation`='$designation',`gender`='$gender',`file`='$rname' WHERE `id`='$id'"; 
                        $result1 = $conn->query($edit); 
                        if ($result1 == TRUE) {
                            header("Location:index.php");
                        }else{
                            echo "Error:" . $edit . "<br>" . $conn->error;
                        }
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
            else{
                $edit = "UPDATE `student` SET `fname`='$fname',`lname`='$lname',`email`='$email',`address`='$address',`designation`='$designation',`gender`='$gender' WHERE `id`='$id'"; 
                $result1 = $conn->query($edit); 
                if ($result1 == TRUE) {
                    header("Location:index.php");
                }else{
                    echo "Error:" . $edit . "<br>" . $conn->error;
                }
            } 
        }else{
            echo "Enter Required Fields";
        }
    }
}
?>