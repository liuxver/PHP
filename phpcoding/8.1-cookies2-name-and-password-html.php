<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/1.css"/>
		<script language="JavaScript" src="javascript/检查用户名和密码.js"></script>
	</head>
	<body>
			<form name="name_password" method="post" action="8.1-cookies2-login.php">
				姓名：<input name="name" type="text" value="<?php echo($_COOKIE["name"]);?>" size="50px" />
				<input name="checkboxcookie" type="checkbox" checked="checked" />记住密码   <br />
				密码：<input name="password" type="password" value="<?php echo($_COOKIE["name"]);?>" size="50px"/><br />
				<input type="submit" name="submit" value="登录" onclick="return name_check(this.form)" />
				<input type="submit" name="submit" id="submit"  value="submit" onclick="return form_check(this.form)"/>
				<input type="reset" name="reset" value="重置"  style="font-size: 11pt; font-family: '宋体';" />
			</form>
	</body>
</html>
