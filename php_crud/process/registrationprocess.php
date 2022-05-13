<?php
session_start();
include 'connection.php';
if(isset($_SESSION['email1'])){
    header("Location:index.php");
}
if(isset($_POST['cnaclick']) && count($_POST)>0)
{
	$fname=$_POST["txtfirstname"];
	$lname=$_POST["txtlastname"];
	$email=$_POST["txtemail"];
	$password=$_POST["txtpassword"];
	$confpassword=$_POST["txtconfpassword"];
	$gender=$_POST["txtgender"];
	$address=$_POST["address"];
	$designation=$_POST["designation"];
	$file=$_FILES["fileToUpload"]["name"];
	$rname=rand().$file;

	$sql = "select * from student where email = '$email'";
    $result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		echo "<center>". "This email is already being used"."</center>";
	}
	else{
		if($fname != "" && $lname != ""&& $email != ""&& $password != ""&& $confpassword != "" && $gender != "" && $address != "" && $designation != "" && $file != ""){
			$target_dir = "uploads/";
			$target_file = $target_dir .$rname;
			$uploadOk = 1;
			$filetype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
				echo "<center>"."Sorry, your file is too large."."</center><br>";
				$uploadOk = 0;
			}
			
			// Allow certain file formats
			if($filetype != "docx" && $filetype != "pdf" && $filetype != "xlsx") {
				echo "<center>"."Sorry, only PDF,DOC and XLS files are allowed."."</center><br>";
				$uploadOk = 0;
			}
	
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "<center>"."Sorry, your file was not uploaded."."</center><br>";
				// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$sql = "INSERT INTO student  VALUES (NULL,'$fname','$lname','$email','$address','$password','$designation','$gender','$rname')";
						if(mysqli_query($conn, $sql)){
						header("Location:login.php");
					} else{
						echo "<center>"."ERROR: Sorry $sql. ". mysqli_error($conn)."</center><br>";
					}
						mysqli_close($conn);
				}
				else {
					echo "<center>"."Sorry, there was an error uploading your file."."</center><br>";
				}
			}
		}else{
			echo "<center>"."Enter Required Fields"."</center><br>";
		}
	}
	 
}
?>