<?php
	session_start();
	session_destroy();
	session_start();
	$_SESSION['message'] = "<div class='alert alert-info' role='alert'> Logged out </div>";
	header( "Location: index.php");
?>