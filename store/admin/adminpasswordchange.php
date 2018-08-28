<?php
	include('isadmin.php');
	session_start();
	$uid=$_SESSION["username"];
?>
<html>
	<head>
		<title>修改密码哦</title>
		<link rel="stylesheet" href="../css/style.css" />
	    <script language="JavaScript">
	    	function checkfields(){
	    		if(document.myform.oripassword.value==""){
	    			alert("初始密码不能为空!");
	    			return false;
	    		}
	    		if(document.myform.password.value.length<6){
	    			alert("密码长度不能小于6个字符啊亲！");
	    			return false;
	    		}
	    		if(document.myform.password.value!=document.myform.password1.value)){
	    			alert("两次密码不一样啊小笨蛋！");
	    		}
	    		return true;
	    	}
	    </script>
	</head>
	<body>
		<form method="post" action="adminsavepassword.php?aid=<?php echo($uid); ?>" name="myform" onsubmit="return checkfields()">
			<div align="center"><h1>修改密码哦</h1></div>
			<table align="center" border="2" cellpadding="2" cellspacing="2" width="300" bordercolor="black" bordercolorlight="red" bordercolordark="blue" height="50">
				<tr>
					<td align="left" width="100" height="10">用户名</td>
					<td width="200" height="10"><?php echo($uid) ?></td>
				</tr>
				<tr>
					<td align="left" width="100" height="10">初始密码：</td>
					<td width="200" height="10"><input type="password" name="oripassword"></td>
				</tr>
				<tr>
					<td align="left" width="100" height="10">新密码：</td>
					<td width="200" height="10"><input type="password" name="password"></td>
				</tr>
				<tr>
					<td align="left" width="100" height="10">新密码：</td>
					<td width="200" height="10"><input type="password" name="password1"></td>
				</tr>
			</table>
			<p align="center">
				<input type="submit" value="提交" name="b2" />
			</p>
		</form>
	</body>
</html>