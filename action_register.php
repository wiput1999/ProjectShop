<?php 
 session_start();
 $_SESSION['err_msg'] = "Register Disabled!";
 header("Location:index.php");
?>