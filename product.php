<?php
	session_start();
	include 'dbc.php';
	if ( !isset($_SESSION['userid']) ){
		$_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Please login</div>";
		header("Location: index.php");
	}
?>
<html>
<head>
	<title>Da Shop</title>
	<?php include 'layout/header.php'; ?>
	<link rel="stylesheet" href="css/product.css">
</head>
<body>
	<?php include 'layout/nav.php'; ?>
	<div class="container">
		<?php
			if ( isset($_SESSION['message']) ){
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			}
		?>
		<h1>Product</h1>
		<?php 
			$stmt = $conn->prepare('SELECT * FROM product WHERE id = ?');
			$stmt->bindValue(1, $_GET['id'], PDO::PARAM_INT);
			$stmt->execute();
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
		?>
		<h2><?php echo $data['name']?></h2>
		<img src="<?php echo $data['image']?>" class="img-responsive">
		<p><?php echo $data['desc']?></p>
		<p><?php echo $data['price']?> Baht</p>
		<a href="cart_action.php?action=add&id=<?php echo $data['id']?>">Add to Cart</a>
	</div>
</body>
</html>