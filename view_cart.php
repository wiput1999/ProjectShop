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
	<link rel="stylesheet" href="css/view_cart.css">
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
		<h1>Order</h1>
		<?php 
			$inQuery = implode(',', array_fill(0, count($_SESSION['cart']), '?'));
			$stmt = $conn->prepare('SELECT * FROM product WHERE id IN ('.$inQuery.')');
			foreach ($_SESSION['cart'] as $k => $id) {
   				 $stmt->bindValue(($k+1), (int)$id, PDO::PARAM_INT);
   			}
			$stmt->execute();
			if ( $stmt->rowCount() != 0) {
				while ( $data = $stmt->fetch(PDO::FETCH_ASSOC) ){
				?>
					<h2><?php echo $data['name']?></h2>
					<img src="<?php echo $data['image']?>" class="img-responsive">
					<p><?php echo $data['desc']?></p>
					<p><?php echo $data['price']?> Baht</p>
					<a href="cart_action.php?action=remove&id=<?php echo $data['id']?>">Remove from Cart</a>
				<?php
					}
			}
			else {
				?>
					No item in cart fuck you.
				<?php
			}
		?>
	</div>
	<?php include 'layout/js.php'; ?>
</body>
</html>