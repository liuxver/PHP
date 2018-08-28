<?php
    include('isadmin.php');
?>
<html>
	<head>
		<title>升级用户成为管理员</title>
	</head>
	<body>
		<?php
			include('..\class\users.php');
			$userid=$_GET["userid"];
			$obj= new users();
			$obj->admin($userid);
			print("<h3>设置成功！</h3>");
		?>
	</body>
	<script language="JavaScript">
		opener.location.reload();
		setTimeout("window.close()",600);
	</script>
</html>