<?php
	include('class\user.php');
	$user=new user();
	session_start();
	
	if(!isset($_SESSION['passed'])){
		$_SESSION['passed']=false;
	}
	//echo "3333333333333";
	if($_SESSION['passed']==false){
		$username=$_POST['username'];
		$password=$_POST['password'];
		if($username==""){
			$errmsg="请输入用户名和密码：";
		}
		else{
			if(!$user->verify($username,$password)){
?>
				<script language="JavaScript">
					alert("用户名和密码不正确！");
				</script>
<?php
			}
			else{
?>
			    <script language="JavaScript">
				    alert("登陆成功");
			    </script>		
<?php
				$_SESSION['passed']=true;
				$_SESSION['username']=$username;
			}
		}
	}

?>