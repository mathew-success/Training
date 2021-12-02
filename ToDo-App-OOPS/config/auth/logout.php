<?php

require('../connection/database.php');

class Logout{

	public function logout(){
		unset($_SESSION['user_id']);
		header("Location: ../../index.php");
	}
}

$signout = new Logout;
$signout->logout();

?>