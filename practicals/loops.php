<?php
//first star pattern
// for($i=1;$i<=5;$i++){
//     for($j=1;$j<=$i;$j++){
//         echo "*";
//     }
//     echo "<br>";
// }

//second star pattern
// for($i=1;$i<=5;$i++){
//     for($j=4;$j>=$i;$j--){
//         echo "&nbsp;&nbsp;";
//     }
//     for($k=1;$k<=$i;$k++){
//         echo "*";
//     }
//     echo "<br>";
// }

//array merge
$arr = array("a"=>"sahil",array("b"=>"jay"));
$arr2 = array("c"=>"milind");
$arr3 = array();
$arr3 = array_merge($arr[0],$arr2);

foreach($arr as $value)
{
	if(is_array($value))
	{
		$arr[0]= array_merge($value,$arr2);
	}
	
}
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
?>