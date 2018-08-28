<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=HZ-GB-2312" />
		<title>左边的内容</title>
	</head>
	<body>
		<table border="2" width="100%" cellspacing="0" bordercolorlight="red" bordercolordark="blue" bgcolor="antiquewhite">
		<?php
			
			include('class\users.php');
			$objuser= new users();
			$userid=trim($_SESSION["user_id"]);
			$password=trim($_SESSION["user_password"]);
			$objuser->getusersinfo($userid);
			$_SESSION["user_name"]=$objuser->name;
			if($userid!=""&&$objuser->userpassword==$password){
		?>
			<tr>
				<td width="100%" bgcolor="antiquewhite" height="18" align="center">用户信息:</td>
			</tr>
			<tr>
				<td width="100%" height="18" bgcolor="aqua">
					<table border="2" cellspacing="1" width="100%">
						<tr>
							<td width="100%" bgcolor="antiquewhite">
								用户名：<?php echo($objuser->userid); ?> <br />
								地址：<?php echo($objuser->address); ?><br />
								邮件：<?php echo($objuser->email); ?><br />
								电话：<?php echo($objuser->telephone); ?><br />
							</td>
						</tr>
						<tr>
							<td width="100%" align="center" bgcolor="antiquewhite">
								<a href="user/userview.php?uid=<?php echo($objuser->userid); ?>" target="_blank">我的商品</a>&nbsp;&nbsp;
								<a href="loginexit.php" onclick="return newswin(this.href)">退出登录</a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		<?php
			}
			else{
		?>
			<tr>
				<td width="100%" bgcolor="aqua" height="24" align="center">用户登录</td>
			</tr>
			<tr>
				<td width="100%" height="18" bgcolor="antiquewhite">
					<table border="2" cellspacing="1" >
						<tr>
							<td width="100%" bgcolor="antiquewhite" >
								<form method="post" action="putsession.php">
									用户名：<input type="text" name="loginname" size="18" value="" />
									<br />
									密&nbsp;码:<input type="password" name="password" size="18" value="" />
									<br />
									<br />
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="登录" name="b1" />&nbsp;&nbsp;
									<a href="user/useradd.php" target="_blank">注册</a>
								</form>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		<?php	}  ?>	
		</table>
		
	</body>
</html>