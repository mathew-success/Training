<?php

require('../connection/connection.php');
session_start();

$name = $_POST['name'];
$password = md5($_POST['password']);
$phone_no = $_POST['phone_no'];
$email = $_POST['email'];

if(empty($name)){
	echo 'Name is required'."<br/><br/>";
}
if(empty($email)){
	echo 'Email is required'."<br/><br/>";
}
if(empty($phone_no)){
	echo 'Phone number is required'."<br/><br/>";
}
if(empty($_POST['password'])){
	echo 'Password is required'."<br/><br/>";
}


if($name && $password && $phone_no && $email){

	$sql = "insert into users (name, password, phone_no, email) values('".$name."','".$password."','".$phone_no."','".$email."')";

	if($db->query($sql)){
		$_SESSION['user_id'] = $db->insert_id;
		header("Location: ../../pages/task.php");
	}else{
		echo "Error : ".$sql.' '.$db->error;
	}
}

?>