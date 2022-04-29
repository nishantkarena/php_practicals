<?php 
    // include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SampleForm</title>
    <script>

</script>
</head>
<body>
    <form action="dataform.php" method="post">
        <input type="checkbox" name="checkbox[]" id="checkbox1" value="Checkbox1">Checkbox 1<br>
        <input type="checkbox" name="checkbox[]" id="checkbox2" value="Checkbox2">Checkbox 2<br>
        <input type="checkbox" name="checkbox[]" id="checkbox3" value="Checkbox3">Checkbox 3<br>
        <input type="checkbox" name="checkbox[]" id="checkbox4" value="Checkbox4">Checkbox 4<br>
        <input type="checkbox" name="checkbox[]" id="checkbox5" value="Checkbox5">Checkbox 5<br>
        <input type="checkbox" name="checkbox[]" id="checkbox6" value="Checkbox6">Checkbox 6<br>
        <input type="checkbox" name="checkbox[]" id="checkbox7" value="Checkbox7">Checkbox 7<br>
        <input type="checkbox" name="checkbox[]" id="checkbox8" value="Checkbox8">Checkbox 8<br>
        <input type="checkbox" name="checkbox[]" id="checkbox9" value="Checkbox9">Checkbox 9<br>
        <input type="checkbox" name="checkbox[]" id="checkbox10" value="Checkbox10">Checkbox 10<br>
        <input type="submit" name="submit" onclick="validChk()" >
        <input type="submit" name="reset" value="reset" >
    </form>
</body>
</html>