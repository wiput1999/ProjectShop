<?php
	session_start();
?>
<html>
<head>
	<title>Da Shop</title>
	<?php include 'layout/header.php'; ?>
</head>
<body>
	<?php include 'layout/nav.php' ?>
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
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="surname">Surname</label>
						<input type="text" class="form-control" id="surname" name="surname">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" id="address" name="address">
					</div>
					<button type="submit" class="btn btn-primary"> Register</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>