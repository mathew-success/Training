<html>
	<head>
		<title>To Do App</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row" style="margin:15% 0px;">
				<div class="col-sm-12">
					<h3 class="text-center">Create an account</h3>
					<form action="../../config/auth/register.php" method="post">
						<label>Name : </label>
						<input type="text" class="form-control" name="name" id="">
						<br/>
						<label>Email : </label>
						<input type="text" class="form-control" name="email" id="">
						<br/>
						<label>Phone number : </label>
						<input type="text" class="form-control" name="phone_no" id="">
						<br/>
						<label>Password : </label>
						<input type="password" class="form-control" name="password" id="">
						<br/>
						<div class="row">
							<div class="col-sm-6 text-left">
								<button type="submit" class="btn btn-success">Register</button>
							</div>
							<div class="col-sm-6 text-right">
								<label><a href="login.php">Already have an account !</a></label>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>