<?php
    //this function used to sort an associative array in ascending order.
    $a=array("nishant"=>20088,"tej"=>20074,"jay"=>20083);
    asort($a);

    foreach($a as $key=>$value){
        echo "key = ".$key. " "."value = ".$value;
        echo "<br/>";
    }
?>