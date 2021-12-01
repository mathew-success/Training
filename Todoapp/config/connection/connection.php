<?php 

$db = new mysqli('localhost','retson','root','training');

if($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}

?>