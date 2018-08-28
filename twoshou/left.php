<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=HZ-GB-2312" />
		<title>左边的内容</title>
	</head>
	<body>
		<table border="2" width="100%" cellspacing="0" bordercolorlight="red" bordercolordark="blue" bgcolor="antiquewhite">
			<tr>
				<td width="100%" height="24" bgcolor="burlywood" align="center"><b>站内公告</b></td>
			</tr>
		<?php
			session_start();
			include('class\bulletin.php');
			$obj= new bulletin();
			$result=$obj->getbulletinlist();
		?>
			<tr>
				<td width="100%" bgcolor="blanchedalmond" height="70" valign="top">
					<?php
						$exist=false;
						for($i=1;$i<10;$i++){
							$exist=true;
							if($row=$result->fetch_row()){
								$title=$row[1];
								if(strlen($title)>11){
									$title=substr($title,0,11);
					?>
					<a href="bulletinview.php?id=<?php echo($row[0]); ?>" target=_blank;><?php echo $title; ?>...</a>
					<?php
					}else{
					?>
					<a href="bulletinview.php?id=<?php echo($row[0]); ?>" target=_blank;><?php echo($title); ?></a>
					<?php
					}
							}
						}
					?>
				</td>
			</tr>
		<?php
			if(!$exist){
		?>
			<tr>
				<td width="100%" height="70" bgcolor="#0000FF">没有公告信息</td>
			</tr>
		<?php
			}
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
					<table border="2" cellspacing="1" height="58">
						<tr>
							<td width="100%" bgcolor="antiquewhite" height="35">
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
		<table border="2" width="100%" cellspacing="0" cellpadding="0" bordercolorlight="red" bordercolordark="blue" bgcolor="antiquewhite">
			<tr>
				<td bgcolor="brown" height="24" align="center">最被关注的10款商品</td>
			</tr>
			<tr>
				<td bgcolor="antiquewhite">
					<table border="0" width="100%" cellspacing="0" bordercolorlight="red" bordercolordark="blue">
						<tr>
							<td width="100%" height="37" bgcolor="antiquewhite">
						<?php
							include('class\goods.php');
							$objgoods=new goods();
							$result=$objgoods->gettopnmaxclick(10);
							$exist=false;
							while($row=$result->fetch_row()){
								$exist=true;
						?>
								<a href="goodsview.php?gid=<?php echo($row[0]); ?>" target="_blank"><?php echo($row[3]); ?></a>(浏览<font color="red"><?php echo($row[16]); ?></font>次)<br />
						<?php
							}
							if(!$exist){
								print "还没有商品";
							}
						?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td width="100%" bgcolor="antiquewhite" height="24" align="center">最活跃的10名用户</td>
			</tr>
			<tr>
				<td width="100%" valign="top" height="52" bgcolor="brown">
					<table border="0" cellspacing="0" bordercolorlight="red" bordercolordark="blue" bgcolor="antiquewhite">
						<tr>
							<td width="100%" bgcolor="antiquewhite">
						<?php
							$objuser= new users();
							$result=$objuser->gettopnactiveuser(10);
							$exist=false;
							while($row=$result->fetch_row()){
								$exist=true;
						?>
								<a href="user/userview.php?uid=<?php echo($row[0]); ?>" target="_blank"><?php echo($row[1]); ?></a>(<font color="red"><?php echo($row[2]); ?></font>件)<br />
						<?php
							}
							if(!$exist){
								print("还没有用户！");
							}
						?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>