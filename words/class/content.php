<?php
	class content
	{
		var $conn;
		public $contid;
		public $subject;
		public $words;
		public $username;
		public $face;
		public $email;
		public $homepage;
		public $createtime;
		public $upperid;
	
	function __construct(){
		$this->conn=mysqli_connect("localhost","root","1234","book");
	//	if(mysqli_query($this->conn,"SET NAMES gbk"))  echo("8888888888888888");
	
	}
	
	function __destruct(){
		mysqli_close($this->conn);
	}
	
	function getinfo($id)
	{
		$sql="select * from content where contid=".$id.";";
		$result=$this->conn->query($sql);
		if($row=$result->fetch_row())
		{
			$this->contid=$id;
			$this->subject=$row[1];
			$this->words=$row[2];
			$this->username=$row[3];
			$this->face=$row[4];
			$this->email=$row[5];
			$this->homepage=$row[6];
			$this->createtime=$row[7];
			$this->ipperid=(int)$row[8];
		}
	}
	
	function getrecordcount()
	{
		$sql="select count(*) from content";
	//	$result=$this->conn->query($sql);
		$result = $this->conn->query($sql);
		if($row=$result->fetch_row()){
			return (int)$row[0];
		}
		else{
			return 0;
		}
	}
	
	function insert()
	{
		$sql="insert into content (subject,words,username,face,email,homepage,createtime,upperid)values('".$this->subject."','".$this->words."','".$this->username
		."','".$this->face."','".$this->email."','".$this->homepage."','".$this->createtime."','".$this->upperid."')";
		$this->conn->query($sql);
	}
	
	function delete($id)
	{
		$sql="delete from content where contid=".$id."or upperid=".$id;
		$this->conn->query($sql);
	}
	
	function load_content_byupperid($uid)
	{
		$sql="select * from content where upperid=".$uid." order by createtime desc";
		$result=$this->conn->query($sql);
		return $result;
	}
	
	function load_content_bypage($pageno,$pagesize)
	{
		$sql="select * from content where upperid=0 order by createtime desc limit ".($pageno-1)*$pagesize.",".$pagesize.";";
		//var_dump($sql);
		//if($result=$this->conn->query($sql)){
			//echo("22222222222");
		//}
		//else{
			//echo("666666666");
		//}
		$result=$this->conn->query($sql);
		//var_dump($result);
		return $result;
	}
	
	function query($sql){
		return mysqli_query($this->conn,$sql);
	}
	}
?>