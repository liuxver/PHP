<?php
	$username=$_POST['username'];
	if($username!=""){
		include('chkpwd.php');
	}
	include('show.php');
	include('class\content.php');
	$objcontent=new content();
	
	$pagesize=5;
	$pageno=(int)$_GET['page'];
	$recordcount = $objcontent->getrecordcount();
	
	if($pageno<1){
		$pageno=1;
	}
	
	if($recordcount){
		if($recordcount<$pagesize){
			$pagecount=1;
		}
		
		if($recordcount%$pagesize){
			$pagecount=(int)($recordcount/$pagesize)+1;
		}else{
			$pagecount=$recordcount/$pagesize;
		}
	}
	else{
		$pagecount=0;
	}
	
	
	if($pageno>$pagecount){
		$pageno=$pagecount;
	}
?>

<html>
	<head>
		<title>主页</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<style>
			.main{
				font-size: 10pt;
			}
		</style>
		
		<script>
			function newwin(url){
				var newwin=window.open(url,"newwin","toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=yes,width=500,height=400");
				newwin.focus();
				return false;
			}
		</script>
	</head>
	<body topmargin="0"  vlink="gray" link="red">
		<div align="center">
			<center>
				<table width="750" height="200" cellspacing="0" cellpadding="0">
					<tr>
						<td height="20" class="main" bordercolorlight="#0000FF" bordercolordark="#00FFFF" bgcolor="#3399FF" background="img/b3.gif" >
							<?php
								if(!$_SESSION['passed']){
							?>
							<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" name="myform">&nbsp;
								<font size="2">用户名：</font><input type="text" name="username" size="12" />&nbsp;&nbsp;
								   密码：<input type="password" name="userpwd" size="12" />
								<input type="submit" value="登录" name="b1" />&nbsp;
								<?php
								}
								else{
									echo("<b>欢迎你，老公！！！</b>");
								}
								?>
								[<a target="_blank" href="newrec.php" onclick="return newwin(this.href)">我要留言</a>]
								<?php
									if($_SESSION['passed']){
										echo('[<a href="logout.php">退出登录</a>]');
									}
								?>
							</form>
						</td>
					</tr>
					<tr>
						<td height="160" class="main"><?php showlist($pageno,$pagesize); ?></td>
					</tr>
					<tr><td height="15"></td></tr>
					<tr>
						<td height="15" class="main" background="img/b3.gif">   <?php showpage($pagecount,$pageno); ?></td>
					</tr>
					<tr> <td height="15"></td></tr>
					<p >4444</p>
				</table>
			</center>
		</div>
	</body>
</html>