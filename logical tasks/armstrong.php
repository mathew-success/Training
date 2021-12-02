<?php

$no = 153;
$actual_no = $no;
$arm_strong = 0;
while($no > 0){
	$rem = $no/10;
	$arm_strong = $arm_strong + ($rem**3);
	$no = $no/10;
}
echo $arm_strong;
if($actual_no == $arm_strong){
	echo "Armstrong";
}else{
	echo "Not an armstrong number".$arm_strong;
}



?>