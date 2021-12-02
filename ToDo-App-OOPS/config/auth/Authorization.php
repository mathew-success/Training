<?php

session_start();

class Authorization {
  public static function activeUser() {
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
		header('Location: ../../view/pages/task.php');
	}
  }

  public static function invalidUser() {
	if(empty($_SESSION['user_id'])){
		header('Location: ../../view/auth/login.php');
	}
  }
}

?>