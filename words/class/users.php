<?php
	class users
	{
		var $conn;
		
		public $username;
		public $userpwd;
		public $showname;
		
		function __construct(){
			$this->conn=mysqli_connect("localhost","root","1234","book");
			mysqli_query($this->conn,"SET NAMES gbk");
		}
		
		function __destruct(){
			mysqli_close($this->conn);
		}
		
		
		
		//判断用户名是否存在
		function exists($user)
		{
			$result=$this->conn->query("select * from users where username='".$user."'");
			if($row=$result->fetch_row()){
				$this->username=$user;
				$this->userpwd=$row[1];
				$this->showname=$row[2];
				return true;
			}
			else{
				return true;
			}
		}
		
		
		//判断用户名和密码是否存在
		function verify($user,$pwd)
		{
			$sql="select * from users where username='".$user."' and userpwd='".$pwd."'".";";
			$result =$this->conn->query($sql);
			if($row=$result->fetch_row()){
				//$this->username=
				//$this->showname=$row[2];
				return true;
			}
			else{
				return false;
			}
		}
		
		//将当前变量的成员变量保存在表中
		function insert()
		{
			$sql="insert into users values('".$this->username."','".$this->userpwd."','".$this->showname."')";
			$this->conn->query($sql);
		}
		
		
		//更新 showname字段
		function updateshowname()
		{
			$sql="update users set showname='".$this->showname."' where username='".$this->username."'";
			$this->conn->query($sql);
		}
		
		
		//更新密码
		function updatepassword()
		{
			$sql="update users set userpwd='".$this->userpwd."' where username='".$this->username."'";
			$this->conn->query($sql);
		}
		
		function delete()
		{
			$sql="delete from users where username='".$this->username."'";
			$this->conn->query($sql);
		}
		
		function load_users()
		{
			$sql="select * from users";
			$result=$this->conn->query($sql);
			return $result;
		}
		
		
		
		
		
	}
?>