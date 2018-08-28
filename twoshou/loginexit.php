<?php
	session_start();
	$_SESSION["user_id"]="";
	$_SESSION["user_password"]="";
	header("Location:","index.php");
?>