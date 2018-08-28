<?php
	include('isuser.php');
?>
<html>
	<head>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?php
			include('..\class\goods.php');
			$gid=$_GET["gid"];
			$obj=new goods();
			$obj->setover($gid);
			print "结束成功！";
		?>
	</body>
	<script language="JavaScript">
		opener.location.reload();
		setTimeout("window.close()",600);
	</script>
</html>
