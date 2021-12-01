<?php

require('../connection/connection.php');
session_start();

if(empty($_POST['name'])){
	echo 'Name is required'."<br/><br/>";
}
if(empty($_POST['password'])){
	echo 'Password is required'."<br/>";
}

if($_POST['name'] && $_POST['password']){

	$name = mysqli_real_escape_string($db, $_POST['name']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	$sql = "select * from users where name ='".$name."' and password ='".md5($password)."'";
	$query = $db->query($sql);
	$row = mysqli_fetch_row($query);

	if($query->num_rows){
		$_SESSION['user_id'] = $row[0];
		header("Location: ../../pages/task.php");
	}else{
		echo "Error : ".$sql.' '.$db->error;
	}

}


?>