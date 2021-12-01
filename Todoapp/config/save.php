<?php 

require('../config/connection/connection.php');

$sql = "INSERT INTO tasks (name) values ('".$_POST['name']."')";


if($db->query($sql)){
	header("Location: ../pages/task.php");
	echo "Task saved successfully";
}else{
	echo "Error : ".$sql.' '.$db->error;
}

?>