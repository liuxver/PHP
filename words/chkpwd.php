<?php
	include('class\users.php');
	$user=new users();
	session_start();
	
	if(!isset($_SESSION['passed'])){
		$_SESSION['passed']=false;
	}
	
	if($_SESSION['passed']==false){
		$username=$_POST['username'];
		$userpwd=$_POST['userpwd'];
		if($username==""){
			$errmsg="请输入用户名和密码：";
		}
		else{
			if(!$user->verify($username,$userpwd)){
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
				$_SESSION['showname']=$user->showname;
			}
		}
	}
	if(!$_SESSION['passed']){
?>
		<script language="JavaScript">
			history.go(-1);
		</script>
<?php		
	}
?>