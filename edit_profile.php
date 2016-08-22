<?php
	session_start();
?>
<html>
<head>
	<title>Da Shop</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<?php
			if ( isset($_SESSION['message']) ){
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			} 
		?>
		<h1>Register</h1>
		<div class="row">
			<div class="col-md-6">
				<form method="POST" action="register_action.php">
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="uname">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="pwd">
					</div>
					<div class="form-group">
						<label for="cpassword">Confirm Password</label>
						<input type="password" class="form-control" id="cpassword" name="pwd2">
					</div>
					<button type="submit" class="btn btn-default"> Register</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>