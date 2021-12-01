<?php

	function addition($a,$b){
		$z = $a + $b; 
		return $z; 
	}

	function subtraction($a,$b){
		$z = $a - $b; 
		return $z; 
	}

	function multiplication($a,$b){
		$z = $a * $b; 
		return $z; 
	}

	function divide($a,$b){
		$z = $a / $b; 
		return $z; 
	}

	echo "Addition      (10+10)   :".addition(10,10)."\n";
	echo "Subtraction   (15 - 10) :".subtraction(15,10)."\n";
	echo "Multiplication(10 * 10) :".multiplication(10,10)."\n";
	echo "Divide        (10 / 15) :".divide(10,15)."\n";
?>