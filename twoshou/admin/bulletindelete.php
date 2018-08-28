<?php
	include('isadmin.php');
?>
<html>
	<head>
		<link rel="stylesheet" href="../css/style.css" />
	</head>
	<body>
		<?php
			$id=$_GET["id"];
			include('..\class\bulletin.php');
			$obj=new bulletin();
			$obj->delete($id);
		?>
	</body>
	<script language="JavaScript">
		alert("删除成功！");
		location.href="bulletinlist.php";
	</script>
</html>