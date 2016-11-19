<?php
	session_start();
	require 'dbc.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Apple Store</title>
	<?php require 'asset/layout/_css.php'; ?>
	<link rel="stylesheet" href="asset/css/index.css">
</head>
<body>
	<?php require 'asset/layout/_nav.php';?>
	<div class="header"></div>
	<?php
		if( !isset($_SESSION['user_id']) ) {
	?>
	<div class="container">
		<div class="row">
			<div class="container">
				<?php
					if ( isset($_SESSION['err_msg']) ) {
						echo"<div class='alert alert-danger' role='alert'>".$_SESSION['err_msg']."</div>";
						unset($_SESSION["err_msg"]);
					}
					if ( isset($_SESSION['info_msg']) ) {
						echo"<div class='alert alert-success' role='alert'>".$_SESSION['info_msg']."</div>";
						unset($_SESSION["info_msg"]);
					}
				?>
			</div>
		</div>
		<div class="row section-login">
			<div class="col-sm-12 col-md-6 col-lg-6">
				<form action="action_check_auth.php" method="POST" role="form" data-toggle="validator">
					<legend>Already have account?</legend>
					<div class="form-group">
						<input type="text" class="form-control" id="username" name="username" required="required" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="password" name="password" required="required" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign in</button>
				</form>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-6 section-register">
				<form action="action_register.php" method="POST" role="form" data-toggle="validator">
					<legend>Create a new account</legend>
					<div class="form-group">
						<input type="text" class="form-control" id="username" name="username" required="required" placeholder="Username">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" data-minlength="6" id="password" name="password" required="required" placeholder="Password">
						 <div class="help-block">Minimum of 6 characters</div>
					</div>
					<div class="form-group">
						<input type="cpassword" class="form-control" data-minlength="6" id="cpassword" name="cpassword" data-match="#password" data-match-error="Whoops, these don't match" required="required" placeholder="Confirm Password">
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="fname" name="fname" required="required" placeholder="Firstname">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="lname" name="lname" required="required" placeholder="Lastname">
					</div>
					<div class="form-group">
						<input type="email" name="email" id="email" class="form-control" required="required" placeholder="E-Mail Address" data-error="That email address is invalid">
						<div class="help-block with-errors"></div>
					</div>
					<div class="form-group">
						<textarea name="address" id="address" class="form-control" rows="3" required="required" placeholder="Address"></textarea>	
					</div>
					<button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Register</button>
				</form>
			</div>
		</div>
	</div>
	<?php } else {
		?>
		<div class="container">
			<div class="row">
				<div class="container">
					<?php
						if ( isset($_SESSION['err_msg']) ) {
							echo"<div class='alert alert-danger' role='alert'>".$_SESSION['err_msg']."</div>";
							unset($_SESSION["err_msg"]);
						}
						if ( isset($_SESSION['info_msg']) ) {
							echo"<div class='alert alert-success' role='alert'>".$_SESSION['info_msg']."</div>";
							unset($_SESSION["info_msg"]);
						}
					?>
				</div>
			</div>
			<div class="row shop-title">
				<div class="container text-center">
					<h1>Apple Store</h1>
				</div>
			</div>
		<?php
		$stmt = $conn->prepare("SELECT * FROM product");
		$stmt->execute();
		echo "<div class='row masonry-container'>";
		while ( $data = $stmt->fetch(PDO::FETCH_ASSOC)){
			?>
			<div class="col-md-4 product_list item">
				<div class="thumbnail">
					<a href="product.php?id=<?php echo $data['id']?>"><img src="<?php echo $data['image']?>" class="img-responsive" alt=""></a>
					<div class="caption">
						<h3><?php echo $data['name']?></h3>
						<p><?php echo $data['description']?><br><?php echo $data['price']?> Baht</p>
						<p>
							<a href="product.php?id=<?php echo $data['id']?>" class="btn btn-primary" role="button">View Product</a> 
							<a href="cart_action.php?action=add&id=<?php echo $data['id']?>" class="btn btn-default" role="button">Add to cart</a>
						</p>
					</div>
				</div>
			</div>
			<?php
		}
		echo "</div></div>";
	?>

	<?php
	}
	require 'asset/layout/_footer.php';
	require 'asset/layout/_js.php';
	?>
	<script type="text/javascript" src="asset/js/index.js"></script>
</body>
</html>