<?php

$personal = [
	'name' => 'Retson Mathew',
	'email' => 'retson@success.app',
	'address1' => [
		'door_no' => '25B',
		'street_name' => 'Thillainagar 11 th cross',
        'area' => 'Thillainagar',
        'city' => 'Trichy'
	],
	'address2' => [
		'door_no' => '346',
		'street_name' => 'Thillainagar first cross',
        'area' => 'Thillainagar',
        'city' => 'Trichy'
	],
	'phone_numbers' => [9876543210, 8976785432]
];

//print_r($personal);

echo "Your Name : ".$personal['name']."\n";
echo "Your Email : ".$personal['email']."\n\n";
echo "Your address 1 :"."\n";
echo "Door no : ".$personal['address1']['door_no'].",\n";
echo "Street Name : ".$personal['address1']['street_name'].",\n";
echo "Area : ".$personal['address1']['area'].",\n";
echo "City : ".$personal['address1']['city'].",\n\n";
echo "Your address 2 :"."\n";
echo "Door no : ".$personal['address2']['door_no'].",\n";
echo "Street Name : ".$personal['address2']['street_name'].",\n";
echo "Area : ".$personal['address2']['area'].",\n";
echo "City : ".$personal['address2']['city'].",\n\n";
echo "Your Phone Number :"."\n";
echo "One : ".$personal['phone_numbers'][0]."\n";
echo "Two : ".$personal['phone_numbers'][1]."\n";

?>