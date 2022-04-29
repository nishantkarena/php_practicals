<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox</title>
</head>

    
<body>
<?php

echo "<pre>";
if(isset($_POST['submit'])){
foreach($_POST['checkbox'] as $value){
    echo $value;
}
}
echo "</pre>";
?>
    <form action="checkbox.php" method="post">
        <input type="checkbox" name="checkbox[]" value="value1"<?php if($value=="value1"){echo "checked=checked";}?>>value 1<br>
        <input type="checkbox" name="checkbox[]" value="value2"<?php if($value=="value2"){echo "checked=checked";}?>>value 2<br>
        <input type="checkbox" name="checkbox[]" value="value3"<?php if($value=="value3"){echo "checked=checked";}?>>value 3<br>
        <input type="submit" name="submit">

    </form>

</body>

</html>