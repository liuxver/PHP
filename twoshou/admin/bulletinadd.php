<?php
	include('isadmin.php');
?>
<html>
	<head>
		<title>添加公告信息！</title>
		<link rel="stylesheet" href="../css/style.css" type="text/css" />
		<script language="JavaScript">
			function checkfields(){
				if(myform.title.value==""){
					alert("公告标题内容不能为空！旭哥哥，你好啊，又见面咯！");
					myform.title.onfocus();
					return false;
				}
				if(myform.content.value==""){
					alert("内容也不能为空啊，好哥哥！");
					myform.content.onfocus();
					return false;
				}
				return true;
			}
		</script>
		<meta http-equiv="content-type" content="text/html; charset=HZ-GB-2312" />
		<style type="text/css">
			body{
				background-color: antiquewhite;
			}
		</style>
	</head>
	<body>
		<form name="myform" method="post" action="bulletinsave.php?action=add" onsubmit="return checkfields()">
			<table border="2" width="100%" cellspacing="1">
				<tr>
					<td width="100%">公告标题：<input type="text" name="title" size="20"></td>
				</tr>
				<tr>
					<td width="100%">公告内容：</td>
				</tr>
				<tr>
					<td width="100%">
						<textarea rows="12" name="content" cols="55"></textarea>
					</td>
				</tr>
			</table>
			<p align="center">
				<input type="submit" value="提交" name="b1">
				<input type="reset" value="重写" name="b2" />
			</p>
		</form>
	</body>
</html>