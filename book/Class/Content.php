<?php 
	class Content
	{
		var $conn;
		public $ContId;		
		public $Subject;//public $words;
		public $words;
		public $UserName;	
		public $Face;		
		public $Email;		
		public $Homepage;	
		public $CreateTime;	
		public $UpperId;		
		
				
		function __construct() {
			$this->conn = mysqli_connect("localhost", "root", "pass", "book"); 
			mysqli_query($this->conn, "SET NAMES gbk");
		}
		
		function __destruct() {
			mysqli_close($this->conn);
		}
				
		
		function GetInfo($Id)
		{			
			$sql = "SELECT * FROM Content WHERE ContId=" . $Id;
			$result = $this->conn->query($sql);
			if($row = $result->fetch_row())  
			{
				$this->ContId = $Id;
				$this->Subject = $row[1];
				$this->words = $row[2];
				$this->UserName = $row[3];
				$this->Face = $row[4];
				$this->Email = $row[5];
				$this->Homepage = $row[6];
				$this->CreateTime = $row[7];
				$this->UpperId = (int)$row[8];
			}
		}			
		
		function GetRecordCount()
		{			
			$sql = "SELECT COUNT(*) FROM Content";
			$result = $this->conn->query($sql);
			if($row = $result->fetch_row())  
				Return (int)$row[0];
			else
				Return 0;		
		}
				
		function insert()
		{
			$sql = "INSERT INTO Content (Subject, words, UserName, Face, Email, Homepage, CreateTime, UpperId) VALUES('" . $this->Subject . "', '" . $this->Words . "', '" .  $this->UserName . "', '" . $this->Face . "', '" . $this->Email . "', '" . $this->Homepage . "', '" . $this->CreateTime . "', " . $this->UpperId . ")";
			$this->conn->query($sql);
		}	
		
		function delete($Id)
		{
			$sql = "DELETE FROM Content WHERE ContId=" . $Id . " OR UpperId=" . $Id;
			$this->conn->query($sql);
		}			
		
		function load_content_byUpperid($uid)
		{
			$sql = "SELECT * FROM Content WHERE UpperId=" . $uid . " ORDER BY CreateTime DESC";
			$result = $this->conn->query($sql);
			Return $result;
		}

		function load_content_byPage($pageNo, $pageSize)
		{
			$sql = "SELECT * FROM Content WHERE UpperId=0 ORDER BY CreateTime DESC LIMIT " . ($pageNo-1) * $pageSize . "," . $pageSize;
			
			if($result = $this->conn->query($sql))
			echo("%%%%%%%%%%5");
			Return $result;
		}
	}
?>