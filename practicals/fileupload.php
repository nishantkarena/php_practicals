<?php
if(isset($_POST["submit"])) {
$target_dir="uploads/";
$target_file=basename($_FILES["fileToUpload"]["name"]);
$fileType=strtolower(pathinfo($target_dir,PATHINFO_EXTENSION));
$uploadOk = 1;

// Check if file already exists
// if (file_exists($target_file)) {
// 	echo "Sorry, file already exists.";
// 	$uploadOk = 0;
// }

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
}

// // Allow certain file formats
if($fileType != "pdf" && $fileType != "xls" && $fileType != "doc"){
  echo "Sorry, only pdf,xls and doc files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	  echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	} else {
	  echo "Sorry, there was an error uploading your file.";
	}
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    <form action="fileupload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>