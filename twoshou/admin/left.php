<html>
	<head>
		<title>left</title>
		<link href="../css/style.css" rel="stylesheet" />
		<base target="main" />
	</head>
	<body topmargin="4" leftmargin="4" bgcolor="antiquewhite">
		<div align="center">
			<center>
				<table border="0" width="90%" height="300">
					<tr>
						<td width="100%" height="10"></td>
					</tr>
					<tr>
						<td width="100%" height="10" ><font color="black">系统设置</font></td>
					</tr>
					<tr>
						<td width="100%" height="10">&nbsp;<font color="black"><a href="typelist.php" target="main">商品分类</a></font></td>
					</tr>
					<tr>
						<td width="100%" height="10">&nbsp;<font color="black"><a href="bulletinlist.php">公告管理</a></font></td>
					</tr>
					<tr>
						<td width="100%" height="10">&nbsp;</td>
					</tr>
					<tr>
						<td width="100%" height="10"><font color="black">商品管理</font></td>
					</tr>
					<?php
						include('..\class\goodstype.php');
						$objtype=new goodstype();
						$results=$objtype->getgoodstypelist();
						while($row=$results->fetch_row()){
					?>
					<tr>
						<td width="100%" height="6" >&nbsp;<font color="black"><a href="goodslist.php?type=<?php echo($row[0]); ?>" target="main"><?php echo($row[1]); ?></a></font></td>
					</tr>
					<?php
					}
					?>
					<tr>
						<td width="100%" height="10">&nbsp;</td>
					</tr>
					<tr>
						<td width="100%" height="10"><font color="black">用户管理</font></td>
					</tr>
					<tr>
						<td width="100%" height="10">&nbsp;<font color="black"><a href="userlist.php?flag=0" target="main">用户管理</a></font></td>
					</tr>
					<tr>
						<td width="100%" height="10">&nbsp;<font color="black"><a href="adminpasswordchange.php" target="main">修改密码</a></font></td>
					</tr>
				</table>
			</center>
		</div>
	</body>
</html>