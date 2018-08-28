<?PHP
	class Users
	{
		var $conn;

		public $UserName;		// 鐢ㄦ埛鍚�
		public $UserPwd;		// 鐢ㄦ埛瀵嗙爜
		public $ShowName;		// 鏄剧ず鍚嶇О
		
				
		function __construct() {
			// 杩炴帴鏁版嵁搴�
			$this->conn = mysqli_connect("localhost", "root", "pass", "book"); 
			mysqli_query($this->conn, "SET NAMES gbk");
		}
		
		function __destruct() {
			// 鍏抽棴杩炴帴
			mysqli_close($this->conn);
		}

		// 鍒ゆ柇鎸囧畾鐢ㄦ埛鏄惁瀛樺湪
		function exists($user)
		{
			$result = $this->conn->query("SELECT * FROM Users WHERE UserName='" . $user . "'");
			if($row = $result->fetch_row()) {
				$this->UserName = $user;
				$this->UserPwd = $row[1];
				$this->ShowName = $row[2];
				return true;
			}
			else
				return false;
		}
				
		// 鍒ゆ柇鎸囧畾鐨勭敤鎴峰悕鍜屽瘑鐮佹槸鍚﹀瓨鍦�
		function verify($user, $pwd)
		{			
			$sql = "SELECT * FROM Users WHERE UserName='" . $user . "' AND     UserPwd='" . $pwd . "'";
			$result = $this->conn->query($sql);
			if($row = $result->fetch_row())  
			{
				$this->UserName = $user;
				$this->UserPwd = $pwd;
				$this->ShowName = $row[2];
				return true;
			}
			else
				return false;
		}
		
		// 鎻掑叆鏂拌褰�
		function insert()
		{
			$sql = "INSERT INTO Users VALUES('" . $this->UserName . "', '" . $this->UserPwd . "', '" 
				. $this->ShowName . "')";
			$this->conn->query($sql);
		}
		
		// 鏇存柊鏄剧ず鍚嶇О
		function updateShowName()
		{
			$sql = "UPDATE Users SET ShowName='" . $this->ShowName . "' WHERE UserName='" . $this->UserName . "'";
			$this->conn->query($sql);
		}
		
		// 鏇存柊瀵嗙爜
		function updatePassword() {		
			$sql = "UPDATE Users SET UserPwd='" . $this->UserPwd . "' WHERE UserName='" . $this->UserName . "'";
			$this->conn->query($sql);
		}		

		// 鍒犻櫎鐢ㄦ埛
		function delete()
		{
			$sql = "DELETE FROM Users WHERE UserName='" . $this->UserName . "'";
			$this->conn->query($sql);
		}			
		
		function load_users()
		{
			$sql = "SELECT * FROM Users";
			$result = $this->conn->query($sql);
			Return $result;
		}
	}
?>