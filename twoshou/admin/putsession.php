<?php
	session_start();
	$userid=$_POST["loginname"];
	$password=$_POST["password"];
	include('..\class\users.php');
	$objuser=new users();
	$objuser->userid=$userid;
	$objuser->userpassword=$password;
	if($objuser->checkuser()){
		$objuser->getusersinfo($userid);
		$_SESSION["username"]=$userid;
		$_SESSION["userpassword"]=$password;
		$_SESSION["usertype"]=$objuser->usertype;
		header("location: "."index.php");
	}else{
		header("location: "."login.php");
	}
?>