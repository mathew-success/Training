<?php

class General {
	public static function passwordEncrypt($password) {
		return md5($password);
  	}
}

?>
