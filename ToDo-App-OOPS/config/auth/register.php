<?php
session_start();
require('../connection/database.php');
require('../helper/General.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$field_key = array_keys($_POST);
	$field_values = array_values($_POST);
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone_no = $_POST['phone_no'];
	$password = $_POST['password'];
	$database = new Database;
	
	$passwordEncrypt = General::passwordEncrypt($password); 
	
	$data = $database->signup('users',$field_key,$name,$email,$phone_no,$passwordEncrypt);

	if($data == FALSE){
		echo "Invalid records";
	}
	
}


?>