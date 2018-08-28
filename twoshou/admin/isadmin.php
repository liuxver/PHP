<?php
	session_start();
	if($_SESSION["usertype"]!=1){
		header("location: "."login.php");
	}
?>