<?php
$data = $_POST;
$msg="";
    $msg=array();
    if(count($data)> 0){
        foreach($data as $key=>$value){
            if(empty($value)){
                $msg= $key . "  Is Required";
                echo $msg."<br>";
            }
        }
    }

echo "<pre>";
echo print_r($data);
echo "</pre>";

$genderErr="";
$gender;

if(empty($_POST['gender'])) {
    $genderErr="Gender is Required";
}else {
    $gender=($_POST['gender']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form For PHP</title>
</head>
<body>
    <form action="form.php" method="post">
    Name: <input type="text" name="Name"><br>
    
    Address: <textarea name="Address" id="address" cols="30" rows="5"></textarea><br>
       
    Designation : <select name="designation" id="designation"><br>
        <option value="">Select</option>
        <option value="Manager">Manager</option>
        <option value="Doctor">Doctor</option>
        <option value="Teacher">Teacher</option>
    </select><br>

    Gender : <input type="radio" id="male" name="gender" value="Male" >
                <label>Male</label>
            <input type="radio" id="female" name="gender" value="Female">
                <label >Female</label>
             <span>//--
                <?php
                    echo $genderErr;
                ?>
            </span><br>


    Phone Number : <input type="text" name="Phone_Number"><br>

    <input type="submit">
    </form>
</body>
</html>
