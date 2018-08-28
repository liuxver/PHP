<meta http-equiv="content-type" content="text/html" charset="utf-8" />
<?php
	$conn=mysqli_connect("localhost","root","1234","mysqldb");
	if(empty($conn)){
		die("mysqli_connect failed:".mysqli_connect_error());
	}
	/*$sql="select empname,title,salary from employees";
	$results=$conn->query($sql);
	while($row=$results->fetch_row()){
		print($row[0]." ".$row[1]." ".$row[2]."<BR>");
	}
	$results->free();*/
	$sql1="create  if not exists table users(
	ID int(11) auto_increment primary key,
	username varchar(50),
	userpassword varchar(50)
	);";
    /*if($conn->query($sql1)===true){
    	echo("1111");
    }
    else{
    	echo("%%%%%%");
    }*/
    
	if($_POST['submit']){
		$sql2="insert into users(username,userpassword)values('".$_POST['username']."','".$_POST['userpassword']."')";
		$conn->query($sql2);
		/*if($conn->query($sql2)===true){
			echo("11111111111111");
		}
		else{
			echo("444444444444");
		}*/
	}
	$sql="select ID,username,userpassword from users";
	$results=$conn->query($sql);
	while($row = $results->fetch_row()){
		print($row[0]." ".$row[1]." ".$row[2]."<BR>");
	}
	$results->free();
	mysqli_close($conn);
?>
