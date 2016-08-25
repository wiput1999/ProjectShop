<?php
	include 'dbc.php';
	session_start();

	if ( $_GET['action'] == "add"){
		if ( in_array($_GET['id'],$_SESSION['cart'])){
			$_SESSION['message'] = "<div class='alert alert-success' role='alert'>Item already in cart</div>";
			?>
				<script>javascript:history.go(-1)</script>
			<?php
		}
		else {
			$_SESSION['cart'][] = $_GET['id'];
			$_SESSION['message'] = "<div class='alert alert-success' role='alert'>Item added to cart</div>";
			?>
				<script>javascript:history.go(-1)</script>
			<?php
		}
	}
	else if ($_GET['action'] == "remove"){
		$key = array_search($_GET['id'], $_SESSION['cart']);
		unset($_SESSION['cart'][$key]);
		$_SESSION['cart'] = array_values($_SESSION['cart']);
		?>
			<script>javascript:history.go(-1)</script>
		<?php
	}
?>