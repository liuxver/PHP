<?php
	include('class\voteitem.php');
	$objitem=new voteitem();
	$objitem->clearcount();
	include('class\voteip.php');
	$objip=new voteip();
	$objip->deleteall();
	echo("已经清空了！");
?>

<script language="JavaScript">
	opener.location.href="additem.php";
	setTimeout("window.close()",100);
</script>