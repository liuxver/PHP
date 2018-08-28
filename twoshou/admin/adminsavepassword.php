<?php
	include('isadmin.php');
?>
<html>
	<head>
		<title>保存密码</title>
	</head>
	<body>
		<?php
			session_start();
			$oripassword=$_POST["oripassword"];
			$password=$_POST["password"];
			include('..\class\users.php');
			$obj=new users();
			$obj->userid=$_SESSION["username"];
			$obj->userpassword=$oripassword;
			if($obj->checkuser()==false){
				print("<h3>不存在这个用户或者密码错误</h3>");
			
		?>
		<script language="JavaScript">
			setTimeout("history.go(-1)",600);
		</script>
		<?php 
		}else{
			$obj->userpassword=$password;
			$obj->setpassword($obj->userid);
			print("<h3>修改密码成功</h3>");
			$_SESSION["userpassword"]=trim($password);
		}
		?>
		
	</body>
</html>