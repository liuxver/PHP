<?php
	include('chkpwd.php');
	include('class\content.php');
	$contid=$_GET["contid"];
	$conn=mysqli_connect("localhost","root","1234","book");
	
	
	var_dump($contid);
	
	$sql="delete from content where conid=$contid or upperid=$contid;";
	
	var_dump($sql);
	
	if($conn->query($sql))
	    echo("已经成功删除留言！");
	else{
		echo("sorry!");
	}
?>