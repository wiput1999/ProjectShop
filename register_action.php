<?php
	include 'dbc.php';
	session_start();
	if ( $_SERVER['REQUEST_METHOD'] == "POST" ){
		if (( $_POST['pwd'] != "" ) && ($_POST['uname'] != "")){
			if ($_POST['pwd'] == $_POST['pwd2']){
				$stmt = $conn->prepare("SELECT * FROM user WHERE username = ?;");
				$stmt->bindParam(1,$_POST['uname'],PDO::PARAM_STR);
				$stmt->execute();
				if ( $stmt->rowCount() != 1 ) {
					$stmt = $conn->prepare("INSERT INTO user (username, password) VALUES ( ? , ? )");
					$stmt->bindValue(1, $_POST['uname'], PDO::PARAM_STR);
					$stmt->bindValue(2, $_POST['pwd'], PDO:: PARAM_STR);
					$stmt->execute();
					$_SESSION['message'] = "<p class='bg-success'> Yaay </p>";
					header("Location: index.php");
				}
				else {
					$_SESSION['message'] = "<p class='bg-danger'>You already registered</p>";
					header("Location: register.php");
				}
			}
			else {
				$_SESSION['message'] = "<p class='bg-danger'>Password didn't match</p>";
				header("Location: register.php");
			}
		}
		else {
			$_SESSION['message'] = "<p class='bg-danger'>Please input something</p>";
			header("Location: register.php");
		}
	}
	else {
		header("Location: register.php");
	}
?>
