<?php
session_start();
include 'dbc.php';
?>
<html>
<head>
	<title>Da Shop</title>
	<?php include 'layout/header.php'; ?>
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<? include 'layout/nav.php'; ?>
	<div class="header"></div>
	<div class="container">
		<?php
		if ( isset($_SESSION['message']) ){
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}
		?>
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
			$stmt = $conn->prepare("SELECT * FROM product");
			$stmt->execute();
			echo "<div class='row'>";
			while ( $data = $stmt->fetch(PDO::FETCH_ASSOC)){
				?>
				<div class="col-md-4 product_list">
					<img src="<?php echo $data['image']?>" class="img-responsive thumb">
					<p class="h2"><?php echo $data['name']?></p>
					<p class="desc"><?php echo $data['desc']?></p>
					<p><?php echo $data['price']?> Baht</p>
					<a href="product.php?id=<?php echo $data['id']?>">View Product</a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="cart_action.php?action=add&id=<?php echo $data['id']?>">Add to cart</a>
				</div>
				<?php
			}
			echo "</div>";
			?>
			<a href="logout.php" class="btn btn-primary">Logout</a>
			<?php
		}
		?>
	</div>
</body>
</html>