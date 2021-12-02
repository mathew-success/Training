<?php
session_start();
require('../connection/database.php');
require('../helper/General.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$field_key = array_keys($_POST);
	
	$name = $_POST['name'];
	$password = $_POST['password'];
	$database = new Database;
	
	$passwordEncrypt = General::passwordEncrypt($password); 
	
	$data = $database->login('users',$name,$passwordEncrypt);

	if($data == FALSE){
		echo "Invalid records";
	}
}


?>