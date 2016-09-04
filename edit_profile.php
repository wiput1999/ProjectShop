<?php
	session_start();
?>
<html>
<head>
	<title>Da Shop</title>
	<?php include 'layout/header.php'; ?>
	<link rel="stylesheet" href="css/edit_profile.css">
</head>
<body>
	<? include 'layout/nav.php'; ?>
	<div class="container">
		<?php
			if ( isset($_SESSION['message']) ){
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			}
		?>
		<h1>Edit Profile</h1>
		<div class="row">
			<div class="col-md-6">
				<form method="POST" action="edit_profile_action.php">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" value="<?=$_SESSION['name']?>">
					</div>
					<div class="form-group">
						<label for="surname">Surname</label>
						<input type="text" class="form-control" id="surname" name="surname" value="<?=$_SESSION['surname']?>">
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<textarea type="text" class="form-control" id="address" name="address"><?=$_SESSION['address']?></textarea>
					</div>
					<button type="submit" class="btn btn-info"> Save</button>
				</form>
			</div>
		</div>
	</div>
	<?php include 'layout/js.php'; ?>
</body>
</html>