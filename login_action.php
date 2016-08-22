<?php
	include 'dbc.php';
	session_start();
	if ( $_SERVER['REQUEST_METHOD'] == "POST" && !isset($_SESSION['userid'])){
		if (( $_POST['pwd'] != "" ) && ($_POST['uname'] != "")){
			$stmt = $conn->prepare("SELECT user.id FROM user WHERE username = ? AND password = ? ");
			$stmt->bindParam(1,$_POST['uname'],PDO::PARAM_STR);
			$stmt->bindParam(2,$_POST['pwd'],PDO::PARAM_STR);
			$stmt->execute();	
			if ( $stmt->rowCount() == 1 ) {
				$data = $stmt->fetch(PDO::FETCH_ASSOC);
				$_SESSION['userid'] = $data['id'];
				$_SESSION['message'] = "<p class='bg-success'>Logged in</p>";
				header("Location: index.php");
			}
			else {
				$_SESSION['message'] = "<p class='bg-danger'>Wrong username or password</p>";
				header("Location: index.php");
			}
		}
		else {
			$_SESSION['message'] = "<p class='bg-danger'>Please input something</p>";
			header("Location: index.php");
		}
	}
	else {
		header("Location: index.php");
	}
?>
