<?php

session_start(); 

class Database{

	public $conn;

	public function __construct()
	{
		$this->conn = new mysqli("localhost","retson","root","training");
		
		if($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
	}
	
	public function login($table,$name,$password){

		$sql = "select * from $table where name ='".$name."' and password ='".$password."'";
		$query = $this->conn->query($sql);
		$row = mysqli_fetch_row($query);
	
		if($query->num_rows){
			$_SESSION['user_id'] = $row[0];
			header("Location: ../../view/pages/task.php");
		}else{
			echo "Error : ".$sql.' '.$this->conn->error;
		}
	}

	public function signup($table,$fields,$name,$email,$phone_no,$password){
		
		$columns = implode(',',$fields);

		$sql = "insert into $table ($columns) values ('$name','$email','$phone_no','$password')";

		if($this->conn->query($sql)){
			$_SESSION['user_id'] = $this->conn->insert_id;
			header("Location: ../../view/pages/task.php");
		}else{
			echo "Error : ".$sql.' '.$this->conn->error;
		}
	}

	public function create($table, $fields, $values){
		
		$sql = "insert into $table ($fields) values ('$values')";
		
		if($this->conn->query($sql)){
			header("Location: ../../view/pages/task.php");
		}else{
			echo "Error : ".$sql.' '.$this->conn->error;
		}
	}

	public function index($table){
		$sql = "select * from $table";
		$query = $this->conn->query($sql);

		if ($query->num_rows > 0) {
			echo "<table class='table table-bordered'><tbody>";
			echo "<tr><th>S.No</th><th>Task Name</th></tr>";
			while($row = $query->fetch_assoc()) {
				echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td></tr>";
			}
			echo "</tbody></table>";
		} else {
			echo "No data found";
		}
	}
}


$taskField = 'name';
$taskName = $_POST['task_name'];

if($taskName){
	$saveTask = new Database;
	$saveTask->create('tasks',$taskField, $taskName);
}

$listTask = new Database;
$listTask->index('tasks');

?>