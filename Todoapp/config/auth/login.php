<html>
	<head>
		<title>To Do App</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row" style="margin:15% 0px;">
				<div class="col-sm-12">
					<h3 class="text-center">Login Here</h3>
					<form action="login_action.php" method="post">
						<label>Username : </label>
						<input type="text" class="form-control" name="name" id="">
						<span class="error"><?php echo $nameErr; ?></span>
						<br/>
						<label>Password : </label>
						<input type="password" class="form-control" name="password" id="">
						<span class="error"><?php echo $passwordErr; ?></span>
						<br/>
						<div class="row">
							<div class="col-sm-6 text-left">
								<button type="submit" class="btn btn-success">Save</button>
							</div>
							<div class="col-sm-6 text-right">
								<label><a href="../../auth/register.php">Create an account !</a></label>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>