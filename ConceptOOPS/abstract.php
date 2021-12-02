<?php

abstract class Bike{

	public $engine_type;

	public function __construct($engine_type){
		$this->engine_type = $engine_type;
	}

	abstract public function mileage($a, $b);

}

class Tvs extends Bike{

	public function mileage($a, $b){
		return $a + $b;
	}
}

$tvs = new Tvs('Petrol');
echo json_encode($tvs);
echo "<br/> Engine Type : ".$tvs->engine_type;
echo "<br/> Mileage : ".$tvs->mileage(50, 10);

?>