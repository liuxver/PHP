<?php
	class voteitem
	{
		var $conn;
		
		public $id;
		public $item;
		public $votecount;
		function __construct(){
		 	$this->conn=mysqli_connect("localhost","root","1234","vote");
		 	mysqli_query($this->conn,"set names gbk");
		}
		 
		function __destruct(){
			mysqli_close($this->conn);
		}
		
		function exists($title){
			$sql="select * from voteitem where item='".$title."'";
			$result=$this->conn->query($sql);
			if($row=$result->fetch_row()){
				return true;
			}else{
				return false;
			}
		}
		 
		 
		function getinfo($id){
			$sql="select * from voteitem where id='".$id."'";
			$result=$this->conn->query($sql);
			if($row=$result->fetch_row()){
				$this->id=$id;
				$this->item=$row[1];
				$this->votecount=(int)$row[2];
			}
		}
		
		function insert(){
			$sql="insert into voteitem (item,votecount) values('".$this->item."',0);";
			$this->conn->query($sql);
		}
		
		function delete($id){
			$sql="delete from voteitem where id='".$id."';";
			$this->conn->query($sql);
		}
		
		function updateitem($newitem,$id){
			$sql="update vote set item=".$newitem." where id=".$id;
			$this->conn->query($sql);
		}
		
		function clearcount(){
			$sql="update voteitem set votecount=0 where id>0";
			$this->conn->query($sql);
		}
		
		function getitemcount(){
			$sql="select count(*) from voteitem"; 
			$result=$this->conn->query($sql);
			if($row=$result->fetch_row()){
				return (int)$row[0];
			}else{
				return 0;
			}
		}
		
		function updatecount($id){
			$sql="update voteitem set votecount=votecount+1 where id='".$id."';";
			$this->conn->query($sql);
		}
		
		function load_voteitem(){
			$sql="select * from voteitem";
			$result=$this->conn->query($sql);
			return $result;
		}
		
	}
?>