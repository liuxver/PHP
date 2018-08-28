<?php
	include('isadmin.php');
?>
<html>
	<head>
		<title>管理用户界面</title>
		<link rel="stylesheet" href="../css/style.css" />
		<script language="JavaScript">
			function newwin(url){
				var newwin=window.open(url,"newwin","toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizableyes,width=400,height=400");
				newwin.focus();
				return false;
			}
		</script>
	</head>
	<body link="red" vlink="black">
		<h2 align="center">用户列表</h2>
		<table width="90%" align="center" cellspacing="2" cellpadding="2" border="2" bordercolor="black" bordercolorlight="red" bordercolordark="blue">
			<tr>
				<td align="center" width="10%" bgcolor="antiquewhite"><b>用户名</b></td>
				<td align="center" width="20%" bgcolor="antiquewhite"><b>真实姓名</b></td>
				<td align="center" width="30%" bgcolor="antiquewhite"><b>地址</b></td>
				<td align="center" width="20%" bgcolor="antiquewhite"><b>电子邮件</b></td>
				<td align="center" width="10%" bgcolor="antiquewhite"><b>电话</b></td>
				<td align="center" width="10%" bgcolor="antiquewhite"><b>操作</b></td>
			</tr>
			<?php
				include('..\class\users.php');
				$obj=new users();
				$result=$obj->getuserslist();
				$rcount=0;
				while($row=$result->fetch_row()){
					$rcount++;
			?>
			<tr>
				<td align="center"><?php echo($row[0]); //用户名?></td>
				<td align="center"><?php echo($row[2]); //姓名?></td>
				<td align="center"><?php echo($row[4]); //地址?></td>
				<td align="center"><?php echo($row[6]); //邮箱?></td>
				<td align="center"><?php echo($row[8]); //手机?></td>
				<td align="center">
					<?php
						if($row[9]!=1){
					?>
					<a href="userdelete.php?userid=<?php echo($row[0]); ?>" onclick="if(confirm("确定要删除吗？")){return newwin(this.href);} return false;">删除</a>&nbsp;&nbsp;
					<a href="useradmin.php?userid=<?php echo($row[0]); ?>" onclick="if(confirm("确定要升级他为管理员吗？")){return newwin(this.href); }return false;">设置为管理员</a>
					<?php	}  ?>
				</td>
			</tr>
			<?php
				}
				if($rcount==0){
					printf("<tr align='center'><td colspan=6><font color=red>没有用户记录</font></td></tr>");
				}else{
					printf("<tr align='center'><td colspan=6><font color=red>当前一共有".trim($rcount)."个用户</font></td></tr>");
				}
			?>
		</table>
	</body>
</html>