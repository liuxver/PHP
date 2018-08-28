<?php
	include('check.php');
	include('class\customer.php');
	$number=$_GET["number"];
	$conn=mysqli_connect("localhost","root","1234","bike");
	
	
	var_dump($number);
	
	$sql="delete from customer where number=$number";
	
	var_dump($sql);
	
	if($conn->query($sql))
	    echo("已经成功删除留言！");
	else{
		echo("sorry!");
	}
?>