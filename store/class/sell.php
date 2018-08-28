<?php
	class sell
	{
		public $userid;
		public $goodsid;
		
		var $conn;
		
		function __construct(){
			$this->conn=mysqli_connect("localhost","root","1234","store");
			//mysqli_query($this->conn,"set names gbk");
		}
		
		function __destruct(){
			mysqli_close($this->conn);
		}
		
		function getselllist(){
			$sql="select * from sell;";
			$result=$this->conn->query($sql);
			return $result;
		}
		function getselllist1($uid){
			$sql="select * from sell where userid=".$uid.";";
			$result=$this->conn->query($sql);
			return $result;
		}
		
		function insert(){
			$sql="insert into sell(userid,goodsid) values('".$this->userid."',".$this->goodsid.");";
		//	echo($sql);
			$this->conn->query($sql);
		}
		function delete($uid,$gid){
			$sql="delete from sell where userid='".$uid."' and goodsid=".$gid.";";
			//echo($sql);
			$this->conn->query($sql);
		}		
	}
?>