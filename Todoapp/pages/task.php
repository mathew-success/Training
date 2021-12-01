<html>
	<head>
		<title>To Do App</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body class="container">
		<?php 
				session_start(); 

				require_once '../config/connection/connection.php';

				$user_id = $_SESSION['user_id'];
				
				$sql = "select * from users where id ='".$user_id."'";
				$query = $db->query($sql);
				$row = mysqli_fetch_row($query);
				
		?>
		<div class="row">
			<div class="col-sm-10 text-center">
				<h3>Welcome to the Todo App <?php echo $row[1]; ?>!</h3>
			</div>
			<div class="col-sm-2">
				<p style="margin: 11% 0;"><a href="../config/auth/logout.php" class="btn btn-sm btn-primary">Logout</a></p>
			</div>
		</div>
		<br/>
		<h4 class="text-center">Create your task</h4>
		<form action="../config/save.php" method="post">
			<label>Enter the task</label>
			<input type="text" class="form-control" name="name" id="">
			<br/>
			<button type="submit" class="btn btn-success">Save</button>
		</form>
		<h3>Task List</h3>
		<?php require('../config/list.php'); ?>
	</body>
</html>