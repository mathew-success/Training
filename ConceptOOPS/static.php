<?php

class Addition{

	static public function calc($a, $b){
		return $a + $b;
	}
}

$result = Addition::calc(100, 400);

echo "Addition : ".$result;

?>