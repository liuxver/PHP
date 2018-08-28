<?php
	include('isadmin.php');
?>
<html>
	<head>
		<title>修改公告信息！</title>
		<link rel="stylesheet" href="../css/style.css" />
		<script language="JavaScript">
			function checkfields(){
				if(myform.title.value==""){
					alert("公告标题不能为空哦！");
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
		<?php
			$id=$_GET["id"];
			include('..\class\bulletin.php');
			$obj=new bulletin();
			$obj->getbulletininfo($id);
			
			echo($id);
			if($obj->id==0){
				exit("没有此公告！");
			}else{
		?>
		<form name="myform" method="post" action="bulletinsave.php?action=update&id=<?php echo($id); ?>" onsubmit="return checkfields()">
			<table border="2" width="100%" cellspacing="1">
				<tr>
					<td width="100%">公告标题：<input type="text" name="title" size="20" value="<?php echo($obj->title); ?>"></td>
				</tr>
				<tr>
					<td width="100%">公告内容：</td>
				</tr>
				<tr>
					<td width="100%">
						<textarea rows="15" name="content" cols="60" <?php echo($obj->content); ?>></textarea>
					</td>
				</tr>
			</table>
			<p align="center">
				<input type="submit" value="提交" name="b1">
				<input type="reset" value="重写" name="b2" />
			</p>
	<?php
		}
	?>
		</form>
	</body>
</html>