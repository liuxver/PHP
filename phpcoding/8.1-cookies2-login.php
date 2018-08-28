<?php
	$id=$_POST['name'];
	$password=$_POST['password'];
	if($id=="admin" and $password=="pass")
	{
		echo("您已经登陆成功，欢迎光临！");
		if($_POST['checkboxcookie']=="on"){
			setcookie("username",$id,time()+60*60*24*30);
			setcookie("password",$id,time()+60*60*24*30);
		}
	}
	else{
		echo("登录失败，请重新登录！");
	}
?>
