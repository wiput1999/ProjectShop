<?php
session_start();
if ( in_array($_GET['id'],$_SESSION['cart']) ){
	$_SESSION['err_msg'] = "<i class='fa fa-times-circle-o' aria-hidden='true'></i> Item already in cart!";
	header("Location:index.php");
}
else {
	$_SESSION['cart'][] = $_GET['id'];
	$_SESSION['info_msg'] = "<i class='fa fa-check-circle-o' aria-hidden='true'></i> Item added to cart!";
	header("Location:index.php");
}
?>