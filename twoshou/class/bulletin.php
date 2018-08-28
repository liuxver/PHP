<?php
	class bulletin
	{
		public $id;
		public $title;
		public $content;
		public $posttime;
		public $poster;
		
		var $conn;
		
		function __construct(){
			$this->conn=mysqli_connect("localhost","root","1234","twoshou");
		//	mysqli_query($this->conn,"set names gbk");
		}
		
		function __destruct(){
			mysqli_close($this->conn);
		}
		
		function getbulletininfo($bid){
			$sql="select * from bulletin where id='".$bid."';";
			$results=$this->conn->query($sql);
			if($row=$results->fetch_row()){
				$this->id=$bid;
				$this->title=$row[1];
				$this->content=$row[2];
				$this->posttime=$row[3];
				$this->poster=$row[4];
			}else{
				$this->id=0;
			}
		}
		
		function getbulletinlist(){
			$sql="select * from bulletin order by posttime desc";
			$results=$this->conn->query($sql);
			return $results;
		}
		
		function getrecentbulletinlist(){
			$sql="select * from bulletin where datediff(day,getdate(),posttime)<=7;";
			$result=$this->conn->query($sql);
			return $results;
		}
		
		function insert(){
			//echo("777777777777777");
			//$sql="insert into bulletin(title,content,posttime,poster) values('".$this->title."','".$this->content."','".$this->posttime."','".$this->poster."');";
			$sql = "INSERT INTO bulletin (title, content, posttime, poster) VALUES ('" . $this->title . "','" . $this->content . "','" . $this->posttime . "','" . $this->poster . "')";
		//	echo($sql);
			$this->conn->query($sql);
		//	echo("***********************");
			//$this->conn->query($sql);
		}
		
		function update($bid){
			$sql="update bulletin set title='".$this->title."',content='".$this->content."',posttime='".$this->posttime."',poster='".$this->poster."' where id=".$bid.";";
			$this->conn->query($sql);
			
		}
		
		function delete($bid){
			$sql="delete from bulletin where id in (".$bid.")";
			$this->conn->query($sql);
		}
	}
?>