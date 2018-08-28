<?php
	class voteip
	{
		var $conn;
		public $ip;
		function __construct(){
			$this->conn=mysqli_connect("localhost","root","1234","vote");
			mysqli_query($this->conn,"set names gbk");
		}
		
		
		function __destruct(){
			mysqli_close($this->conn);
		}
		
		function exists($_ip){
			$result=$this->conn->query("select * from voteip where ip='".$_ip."'");
			if($row=$result->fetch_row()){
				return true;
			}else{
				return false;
			}
		}
		
		function insert()
		{
			$sql="insert into voteip values('".$this->ip."')";
			$this->conn->query($sql);
		}
		
		function deleteall(){
			$sql="delete from voteip";
			$this->conn->query($sql);
		}
		
	}
?>