<html>
	<head>
		<link rel="stylesheet" href="../css/style.css" />
		<title>注册新用户</title>
	</head>
	<body>
		<form method="post" action="usersave.php" name="myform" onsubmit="return chkfields()">
			<h3 align="center">个人信息</h3>
			<input type="hidden" name="isadd" value="new" />
			<table align="center" border="2" cellspacing="1" cellpadding="0" width="60%" bordercolor="red" bordercolordark="blue">
				<tr>
					<td width="20%" align="left" bgcolor="antiquewhite">用户名：</td>
					<td width="80%"><input type="text" name="userid" size="20" /></td>
				</tr>
				<tr>
					<td width="20%" align="left" bgcolor="antiquewhite">用户姓名：</td>
					<td width="80%"><input type="text" name="username" size="20" /></td>
				</tr>
				<tr>
					<td width="20%" align="left" bgcolor="antiquewhite">用户密码：</td>
					<td width="80%"><input type="password" name="password" size="20" /></td>
				</tr>
				<tr>
					<td width="20%" align="left" bgcolor="antiquewhite">确认密码：</td>
					<td width="80%"><input type="password" name="password1" size="20" /></td>
				</tr>
				<tr>
					<td align="left" bgcolor="antiquewhite">性别：</td>
					<td>
						<select name="sex">
							<option value="0">男</option>
							<option value="1">女</option>
						</select>
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="antiquewhite">通信地址：</td>
					<td><input type="text" name="address" size="40" /></td>
				</tr>
				<tr>
					<td align="left" bgcolor="antiquewhite">邮政编码：</td>
					<td><input type="text" name="postcode" size="40" /></td>
				</tr>
				<tr>
					<td align="left" bgcolor="antiquewhite">固定电话：</td>
					<td><input type="text" name="telephone" size="40" /></td>
				</tr>
				<tr>
					<td align="left" bgcolor="antiquewhite">移动电话：</td>
					<td><input type="text" name="mobile" size="40" /></td>
				</tr>
				<tr>
					<td align="left" bgcolor="antiquewhite">电子邮箱：</td>
					<td><input type="text" name="email" size="40" /></td>
				</tr>
			</table>
			<p align="center"><input type="submit" value="提交" name="b2" /></p>
		</form>
	</body>
	<script language="JavaScript">
		function chkfields(){
			if(document.myform.userid.value==''){
				window.alert("请输入用户名！");
				myform.userid.focus();
				return false;
			}
			if(document.myform.userid.length<=2){
				window.alert("用户名长度过短！");
				myform.userid.focus();
				return false;
			}
			if(document.myform.username.value==''){
				window.alert("请输入姓名！");
				myform.username.focus();
				return false;
			}
			if(document.myform.email.value==''){
				window.alert("请输入邮件！");
				myform.email.focus();
				return false;
			}
			if(document.myform.password.value.length<6){
				window.alert("密码长度过短！");
				myform.password.focus();
				return false;
			}
			if(document.myform.password1.value==''){
				window.alert("确认密码长度过短！");
				myform.password1.focus();
				return false;
			}
			if(document.myform.password.value!=document.myform.password1.value){
				window.alert("两次密码不一致");
			
				return false;
			}
			return true;
		}
	</script>
</html>