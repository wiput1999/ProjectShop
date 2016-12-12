<?php
	session_start();
	session_destroy();
	session_start();
	$_SESSION['info_msg'] = "<i class='fa fa-check-circle-o' aria-hidden='true'></i> Logout successfully, Bye!";
	header('Location:index.php');
?>