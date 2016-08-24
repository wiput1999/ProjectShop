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
					$id = $conn->lastInsertId();
					$stmt = $conn->prepare("INSERT INTO profile (id, name, surname, address) VALUES ( ? , ? , ? , ?)");
					$stmt->bindValue(1, $id, PDO::PARAM_INT);
					$stmt->bindValue(2, $_POST['name'], PDO::PARAM_STR);
					$stmt->bindValue(3, $_POST['surname'], PDO::PARAM_STR);
					$stmt->bindValue(4, $_POST['address'], PDO::PARAM_STR);
					$stmt->execute();
					$_SESSION['message'] = "<div class='alert alert-success' role='alert'> Yaay </div>";
					header("Location: index.php");
				}
				else {
					$_SESSION['message'] = "<div class='alert alert-danger' role='alert'>You already registered</div>";
					header("Location: register.php");
				}
			}
			else {
				$_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Password didn't match</div>";
				header("Location: register.php");
			}
		}
		else {
			$_SESSION['message'] = "<div class='alert alert-danger' role='alert'>Please input something</div>";
			header("Location: register.php");
		}
	}
	else {
		header("Location: register.php");
	}
?>
