<?php
	require 'dbc.php';

	$stmt = $conn->prepare("SELECT * FROM profile WHERE email = ?");
	$stmt->bindParam(1,$_POST['email']);
	$stmt->execute();

	$count = $stmt->rowCount();

	if ($count == 0) {
		echo "true";
	}
	else {
		echo "false";
	}
?>