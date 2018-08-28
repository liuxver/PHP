<?php
	$mysql=mysqli_connect("localhost","root","1234","mysqldb");
	if(empty($mysql)){
		die("mysqli_connect failed:".mysqli_connect_error());
	}
	echo("connect to:");
	$result=$mysql->query("select * from employees;");
	
	while($row =$result->fetch_row()){
		print_r($row);
	}
	mysqli_close($mysql);
?>