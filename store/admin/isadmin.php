<?php
	session_start();
	if($_SESSION["usertype"]!=1){
		header("location: "."login.php");
	}
	
?>
<html>
	<head>
		
	</head>
	<body>
		
	</body>
	<script language="JavaScript">
		opener.location.reload();
	</script>
</html>