<?php

include('traits.php');
// Class and Object
class Bikes{

	private $price;
	public $color;
	public $model;

	function __construct($model){
		$this->model = $model;
	}

	public function setPrice($price){
		return $this->price = $price;
	}
	
	public function getPrice(){
		return $this->price;
	}

	public function getModel(){
		return $this->model;
	}
}
	
	$bajaj = new Bikes(2020);
	$bajaj->setPrice(45000);
	echo "Model : ".$bajaj->model."\n";
	echo "Price : ".json_encode($bajaj->getPrice())."\n";
	echo "Color : ".$bajaj->color = 'red'."\n";

	class Honda extends Bikes{

		public $name;

		use Calculation;

		function __destruct(){
			echo "<br/> Function end";
		}

	}

	$honda = new Honda(2021);
	echo "Child Model : ".$honda->getModel();

	echo "<br/> Trait : ".$honda->multiply(10,20);


?>