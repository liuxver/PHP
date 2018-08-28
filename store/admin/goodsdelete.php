<?php
	include('isadmin.php');
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
			$obj->delete($gid);
			print "删除成功！";
		?>
	</body>
	<script language="JavaScript">
		opener.location.reload();
		setTimeout("window.close()",600);
	</script>
</html>
