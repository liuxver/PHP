<?php
	class customer1
	{
		var $conn;
		
		var $number;
		var $name;
		var $phone;
		var $record;
		
		function __construct(){
			$this->conn=mysqli_connect("localhost","root","1234","bike");
		}
		
		function __destruct(){
			mysqli_close($this->conn);
		}
		
		function getinfo($number){
			$sql="select * from customer where number=".$number.";";
			$result=$this->conn->query($sql);
			if($row=$result->fetch_row())
			{
				$this->number=$number;
				$this->name=$row[1];
				$this->phone=$row[2];
				$this->record=$row[3];
			}
		}
		
		function getcount(){
			$sql="select * from customer;";
			$result=$this->conn->query($sql);
			if($row=$result->fetch_row()){
				return (int)$row[0];
			}
			else{
				return 0;
			}
		}
		
		function insert(){
			$sql="insert into customer values('".$this->number."','".$this->name."','".$this->phone."','".$this->record."');";
			$this->conn->query($sql);
			//echo "############33";
		}
		
		function load_by_page($pageno,$pagesize){
			$sql="select * from customer order by number desc limit ".($pageno-1)*$pagesize.",".$pagesize.";";
			$result=$this->conn->query($sql);
			return $result;
		}
	}
?>