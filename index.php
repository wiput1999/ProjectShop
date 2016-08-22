<?php
	session_start();
?>
<html>
<head>
	<title>Da Shop</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

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
		<h1>The Shop</h1>
		<?php
			if ( !isset($_SESSION['userid']) ){
		?>
		<form method="POST" action="login_action.php">
			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" class="form-control" id="username" name="uname">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="pwd">
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
		</form>
		<?php
			}
			else {
		?>
			<a href="logout.php" class="btn btn-primary">Logout</a>
		<?php
			}
		?>
	</div>
</body>
</html>