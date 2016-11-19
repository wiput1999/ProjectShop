<?php
	session_start();
	if( empty($_POST['username']) || empty($_POST['password']) ) {
		$_SESSION['err_msg'] = "Please insert username or password";
		header('Location:index.php');
		exit();
	}
	else {
		require 'dbc.php';
		$s_password = crypt( $_POST['password'] , '$6$rounds=5000$wanttoseesaltt$');
		$stmt = $conn->prepare(" SELECT user.id, profile.firstname, profile.lastname, profile.address FROM user INNER JOIN profile ON user.id = profile.id WHERE ( username = ? AND password = ? ) ");
		$stmt->bindParam(1,$_POST['username'],PDO::PARAM_STR);
		$stmt->bindParam(2,$s_password,PDO::PARAM_STR);
		$stmt->execute();
		if( $stmt->rowCount() == 1 ) {
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			$_SESSION['user_id'] = $data['id'];
			$_SESSION['firstname'] = $data['firstname'];
			$_SESSION['lastname'] = $data['lastname'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['address'] = $data['address'];
			$_SESSION['role'] = $data['role'];
			$_SESSION['cart'] = array();
			$_SESSION['info_msg'] = "Login successfully!";
			header('Location:index.php');
		}
		else {
			$_SESSION['err_msg'] = "Invalid username or password!";
			header('Location:index.php');
		}
	}
?>