<?php
	class users
	{
		public $userid;
		public $userpassword;
		public $name;
		public $sex;
		public $address;
		public $postcode;
		public $email;
		public $telephone;
		public $mobile;
		public $usertype;
		var $conn;
		
		function __construct(){
			$this->conn=mysqli_connect("localhost","root","1234","twoshou");
			//mysqli_query($this->conn,"set names gbk");
		}
		
		function __destruct(){
			mysqli_close($this->conn);
		}
		
		function getusersinfo($uid){
			$sql="select * from users where userid='".$uid."';";
			$result=$this->conn->query($sql);
			if($row=$result->fetch_row()){
				$this->userid=$uid;
				$this->userpassword=$row[1];
				$this->name=$row[2];
				$this->sex=$row[3];
				$this->address=$row[4];
				$this->postcode=$row[5];
				$this->email=$row[6];
				$this->telephone=$row[7];
				$this->mobile=$row[8];
				$this->usertype=$row[9];
			}else{
				$this->userid="";
			}
		}
		
		function getuserslist(){
			$sql="select * from users;";
			$result=$this->conn->query($sql);
			return $result;
		}
		
		function  gettopnactiveuser($n){
			$sql="select u.userid,u.name,count(g.goodsid) as cc "." from users u inner join goods g on u.userid=g.ownerid "." group by u.userid,u.name "."order by count(g.goodsid) desc limit 0,".$n.";";
			
			$result=$this->conn->query($sql);
			//echo($result);
			return $result;
		}
		
		function haveusers($uid){
			$sql="select * from users where userid='".$uid."';";
			$result=$this->conn->query($sql);
			if($row=$result->fetch_row()){
				return true;
			}else{
				return false;
			}
		}
		
		function checkuser(){
			$sql="select * from users where userid='".$this->userid."' and userpassword='".$this->userpassword."';";
			$result=$this->conn->query($sql);
			if($row=$result->fetch_row()){
				return true;
			}else{
				return false;
			}
		}
		
		function insert(){
			//echo("777777777777777");
			$sql="insert into users values('".$this->userid."','".$this->userpassword."','".$this->name."',".$this->sex.",'".$this->address."','".$this->postcode."','".$this->email."','".$this->telephone."','".$this->mobile."',".$this->usertype.");";
			//$sql="INSERT INTO users VALUES('".$this->userid."','".$this->userpassword."','".$this->name."',".$this->sex.",'".$this->address."','".$this->postcode."','".$this->email."','".$this->telephone."','".$this->mobile."',".$this->usertype.");";
			//echo($sql);
			$this->conn->query($sql);
		}
		
		function update($uid){
			$sql="update users set name='".$this->name."',sex=".$this->sex.",address='".$this->address."',postcode='".$this->postcode."',email='".$this->email."',telephone='".$this->telephone."',mobile='".$this->mobile."' where userid='".$uid."';";
			$this->conn->query($sql);
		}
		
		function admin($uid){
			$sql="update users set usertype=1 where userid=".$uid.";";
			$this->conn->query($sql);
		}
		
		function setpassword($uid){
			$sql="update users set userpassword='".$this->userpassword."' where userid='".$uid."';";
			$this->conn->query($sql);
		}
		
		function delete($uid){
			$sql="delete from users where userid='".$uid."';";
			$this->conn->query($sql);
		}
	}
?>