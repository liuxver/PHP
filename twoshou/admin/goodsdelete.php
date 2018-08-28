<?php
	include('isadmin.php');
?>
<html>
	<head>
		<title>删除商品</title>
	</head>
	<body>
		<?php
			include('..\class\goods.php');
			$gid=$_GET["gid"];
			$obj=new goods();
			$obj->delete($gid);
			print("<h3>删除成功的哦，亲爱的！</h3>");
		?>
	</body>
	<script language="JavaScript">
		opener.location.reload();
		setTimeout("window.close()",600);
	</script>
</html>