<?php
require('interface.php');

class Foreigner implements Passport{

	public function passportNo()
	{
		return "PASS12345";
	}
}

$foreigner = new Foreigner;
echo "Passport No : ".$foreigner->passportNo();


?>