<?PHP
	include('class\Users.php');		// 包含Users类
	$user = new Users();
	session_start();
    //如果尚未定义Passed对象，则将其定义为False，表示没有通过身份认证
    if(!isset($_SESSION['Passed']))	{
		$_SESSION['Passed'] = False;
	}
  	// 如果$_SESSION['Passed']=False,则表示没有通过身份验证
	if($_SESSION['Passed']==False) {	
		// 读取从表单传递过来的身份数据
    	$UserName = $_POST['UserName'];
    	$UserPwd = $_POST['UserPwd'];
    	if($UserName == "")
      		$Errmsg = "请输入用户名和密码";
		else  {
			// 验证用户名和密码
			if(!$user->verify($UserName, $UserPwd))  {
?>

		<script language="javascript">
			alert("用户名或密码不正确!");
		</script>";
		<?PHP
			}
			else  { // 登录成功 ?>
					<script language="javascript">
			alert("登录成功!");
		</script>
		<?PHP
				$_SESSION['Passed'] = True;
				$_SESSION['UserName'] = $UserName;
				$_SESSION['ShowName'] = $user->ShowName;
				//$_SESSION['ShowName'] = $row[2];
			}
		} 
	}	
	// 经过登录不成功，则画出登录表单MyForm
  	if(!$_SESSION['Passed'])  {  
?>
		<script language="javascript">
		  history.go(-1);
		</script>
<?PHP	}   ?>