<?php
	$ip=$_SERVER["REMOTE_ADDR"];
	include('class\voteip.php');
	$objip=new voteip();
	
	if($objip->exists($ip)){
		echo("postvote上面的鬼东西！");
	}else{
		$objip->ip=$ip;
		$objip->insert();
		
		$ids=$_GET["cid"];
		
		include('class\voteitem.php');
		$objitem=new voteitem();
		$objitem->updatecount($ids);
		echo("我也不知道这里应该是啥子！");
	}
?>

<script language="JavaScript">
	setTimeout("window.close()",800);
	opener.location.reload();
</script>