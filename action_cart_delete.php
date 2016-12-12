<?php 
$key = array_search($_GET['id'], $_SESSION['cart']);
unset($_SESSION['cart'][$key]);
$_SESSION['cart'] = array_values($_SESSION['cart']);
header("Location:view_cart.php");
?>