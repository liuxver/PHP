<html>
	<head>
		<title>查看公告！</title>
		<link rel="stylesheet" href="css/style.css" />
		<meta http-equiv="content-type" content="text/html; charset=HZ-GB-2312" />
		<style type="text/css">
			body{
				background-color: antiquewhite;
			}
		</style>
	</head>
	<body>
		<?php
			include('class\bulletin.php');
			
			$id=$_GET["id"];
			$obj=new bulletin();
			$result=$obj->getbulletininfo($id);
			
			if($obj->id==0){
				exit("没有这个公告信息！");
			}else{
				//echo($obj->content);
		?>
		<form name="myform" method="post" action="">
			<table border="2" width="100%" cellspacing="1">
				<tr>
					<td width="100%">公告标题：<input type="text" name="title" size="20" value="<?php echo($obj->title); ?>"></td>
				</tr>
				<tr>
					<td width="100%">公告内容：</td>
				</tr>
				<tr>
					<td width="100%">
						<textarea rows="15" name="content" cols="60" > <?php echo($obj->content); ?> </textarea>
					</td>
				</tr>
			</table>
		</form>
		<?php
			}
			$obj=null;
		?>
	</body>
</html>