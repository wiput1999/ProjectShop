<?php
	require 'dbc.php';

	$stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
	$stmt->bindParam(1,$_POST['username'],PDO::PARAM_STR);
	$stmt->execute();

	$count = $stmt->rowCount();

	if ($count > 0) {
		echo "false";
	}
	else {
		echo "true";
	}
?>