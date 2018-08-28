<?php
	session_start();
	include('../class/users.php');
	$adminid=$_SESSION["username"];
	$adminpassword=$_SESSION["userpassword"];
	if($adminid!=""){
		$objuser=new users();
		$objuser->getusersinfo($adminid);
		if($objuser->userid!=""&& $objuser->userpassword==$adminpassword && $objuser->usertype==1){
			$_SESSION["usertype"]=1;
			header("location: "."index.php");
		}
	}
?>
<html>
	<head>
		<title>管理员登录界面！</title>
		<link rel="stylesheet" href="../css/style.css" />
	</head>
	<body>
		<form name="myform" action="putsession.php" method="post">
			<br />
			<table border="0" align="center">
				<tr>
					<td align="center"><h2>管理员用户登录！</h2></td>
				</tr>
			</table>
			<table border="5" align="center">
				<tr>
					<td align="right">管理员账号：</td>
					<td><input max="20" name="loginname" size="30"></td>
				</tr>
				<tr>
					<td align="right">管理员密码：</td>
					<td><input max="20" name="password" size="30" type="password" /> </td>
				</tr>
				<br />
				<tr>
					<td align="right">&nbsp;</td>
					<td align="center"><input type="submit" value="提交" /> </td>
				</tr>
			</table>
		</form>
	</body>
</html>