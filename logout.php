<?php
	session_start();
	session_destroy();
	$_SESSION['info_msg'] = "Logout successfully!";
	header('Location:index.php');
?>