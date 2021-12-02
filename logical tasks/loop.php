<?php

// loop
for($i = 1; $i<=10; $i++){
	echo $i."\n";
} 

// Create tringle using loop
for($i=1;$i<=10;$i++){
	for($j=1;$j<=$i;$j++){
		echo "*";
	}
	echo "\n";
}

//  Fibonacci 
$value1 = 0;
$value2 = 1;

$res = 0;
while($res<13){
	$res = $value1 + $value2;
	$value1 = $value2;
	$value2 = $res;
	echo $res."\n";
}
	
?>