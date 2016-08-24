<?php
	include 'dbc.php';
	session_start();
	if ( isset($_SESSION['userid'])){
		if ( $_SERVER['REQUEST_METHOD'] == "POST" ){
			$stmt = $conn->prepare("SELECT * FROM profile WHERE id = ?;");
			$stmt->bindParam(1,$_SESSION['id'],PDO::PARAM_STR);
			$stmt->execute();
			if ( $stmt->rowCount() != 1 ) {
				$stmt = $conn->prepare("UPDATE profile SET name = ? , surname = ? , address = ? WHERE id = ? ");
				$stmt->bindValue(1, $_POST['name'], PDO::PARAM_STR);
				$stmt->bindValue(2, $_POST['surname'], PDO::PARAM_STR);
				$stmt->bindValue(3, $_POST['address'], PDO::PARAM_STR);
				$stmt->bindValue(4, $_SESSION['userid'], PDO::PARAM_STR);
				$stmt->execute();
				$_SESSION['name'] = $_POST['name'];
				$_SESSION['message'] = "<div class='alert alert-success'>Edited profile</div>";
				header("Location: index.php");
			}
		}
		else {
			header("Location: edit_profile.php");
		}
	}
?>
