<?php
    include('isadmin.php');
?>
<html>
	<head>
		<title>删除用户</title>
	</head>
	<body>
		<?php
			include('..\class\users.php');
			$userid=$_GET["userid"];
			$obj= new uers();
			$obj->delete($userid);
			print("<h3>删除成功！</h3>");
		?>
	</body>
	<script language="JavaScript">
		opener.location.reload();
		setTimeout("window.close()",600);
	</script>
</html>