<?php
	session_start();
?>
<?php
	include('..\class\users.php');
	$username=trim($_SESSION["user_id"]);
	$password=trim($_SESSION["user_password"]);
	
	if($username==""){
		exit("请登录！");
	}else{
		$obj=new users();
		$obj->userid=trim($_SESSION["user_id"]);
		$obj->userpassword=trim($_SESSION["user_password"]);
		if(!$obj->checkuser()){
			exit("密码错误！");
		}
	}
