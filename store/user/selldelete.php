<?php
	include('isuser.php');
?>
<html>
	<head>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?php
			include('..\class\sell.php');
			$gid=$_GET["gid"];
			$uid=$_GET["uid"];
			$obj=new sell();
			
			$obj->delete($uid,$gid);
			print "删除成功！";
		?>
	</body>
	<script language="JavaScript">
		opener.location.reload();
		setTimeout("window.close()",6000000000000);
	</script>
</html>
