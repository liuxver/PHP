<?php
	class user{
		var $conn;
		var $username;
		var $password;
		
		function __construct(){
			$this->conn=mysqli_connect("localhost","root","1234","bike");
			mysqli_query($this->conn,"set names gbk");
		}
		
		function __destruct(){
			mysqli_close($this->conn);
		}
		
		function verify($user,$pwd){
			$sql="select * from user where username='".$user."' and password='".$pwd."';";
			$result=$this->conn->query($sql);
			if($row=$result->fetch_row()){
				return true;
			}
			else{
				return false;
			}
		}
	}
?>