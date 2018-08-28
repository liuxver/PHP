<?php
	session_start();
	$uid=$_POST["loginname"];
	$password=$_POST["password"];
	$_SESSION["user_id"]=$uid;
	$_SESSION["user_password"]=$password;
	header("location:index.php");
?>