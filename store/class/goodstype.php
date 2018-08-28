<?php
	class goodstype
	{
		public $typeid;
		public $typename;
		
		var $conn;
		
		function __construct(){
			$this->conn=mysqli_connect("localhost","root","1234","store");
			//mysqli_query($this->conn,"set names gbk");
		}
		
		function __destruct(){
			mysqli_close($this->conn);
		}
		
		function getgoodstypeinfo($id){
			$sql="select * from goodstype where typeid=".$id.";";
			$result=$this->conn->query($sql);
			//echo($sql);
			if(($row=$result->fetch_row())){
				$this->typeid=$id;
				$this->typename=$row[1];
			}else{
				$typeid="";
			}
		}
		
		function getgoodstypelist(){
			$sql="select * from goodstype;";
			$result=$this->conn->query($sql);
			return $result;
		}
		
		function havegoodstype($name){
			$sql="select * from goodstype where typename='".$name."';";
			$result=$this->conn->query($sql);
			if($row=$result->fetch_row()){
				return true;
			}else{
				return false;
			}
		}
		
		function delete($id){
			$sql="delete from goodstype where typeid=".$id.";";
			$this->conn->query($sql);
		}
		
		function insert(){
			$sql="insert into goodstype(typename) values('".$this->typename."');";
			$this->conn->query($sql);
		}
		
		function update($id){
			$sql="update goodstype set typename='".$this->typename."' where typeid=".$id.";";
			$this->conn->query($sql);
		}
	}
?>