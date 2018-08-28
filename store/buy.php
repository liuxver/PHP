<?php
	include('isuser.php');
?>
<html>
	<head>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?php
			include('class\sell.php');
			$gid=$_GET["gid"];
			$uid=$_GET["uid"];
			$obj=new sell();
			$obj->userid=$uid;
			$obj->goodsid=$gid;
			$obj->insert();
			print "购买成功！";
		?>
	</body>
	<script language="JavaScript">
		opener.location.reload();
		setTimeout("window.close()",600);
	</script>
</html>
