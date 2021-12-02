<?php

use Database as GlobalDatabase;

class Connection{

	public $conn;

	public function __construct(){
		$this->conn = new mysqli("localhost","retson","root","training");
		return $this->conn;

		if (!$this->conn) {
            new Connection();
        }
        return $this->conn;
	}
}

$database = new Connection;
echo $database;

?>