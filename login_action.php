<?php
	include 'dbc.php';
	session_start();
	if ( $_SERVER['REQUEST_METHOD'] == "POST" && !isset($_SESSION['userid'])){
		if (( $_POST['pwd'] != "" ) && ($_POST['uname'] != "")){
			$stmt = $conn->prepare("SELECT user.id, profile.name, profile.surname FROM user INNER JOIN profile ON user.id = profile.id WHERE ( username = ? AND password = ? ) ");
			$stmt->bindParam(1,$_POST['uname'],PDO::PARAM_STR);
			$stmt->bindParam(2,$_POST['pwd'],PDO::PARAM_STR);
			$stmt->execute();	
			if ( $stmt->rowCount() == 1 ) {
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				$_SESSION['name'] = $data['name'];
				$_SESSION['userid'] = $data['id'];
				$_SESSION['cart'] = array();
				$_SESSION['message'] = "<div class='alert alert-success' role='alert'>Logged in</div>";
				header("Location: index.php");
			}
			else {
				$_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Wrong username or password</div>";
				header("Location: index.php");
			}
		}
		else {
			$_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Please input something</div>";
			header("Location: index.php");
		}
	}
	else {
		header("Location: index.php");
	}
?>
