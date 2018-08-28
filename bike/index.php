<?php
	//echo "55555555555555";
	$username=$_POST['username'];
	//echo($username);
	if($username!=""){
		include('check.php');
	}

?>
<html>
	<head>
		<title>登录界面</title>
		<style type="text/css">
			div {position: relative; left: 150; top: 200; border: 5;}
		</style>
	</head>
	<body>
		<div>
			<?php
				if(!$_SESSION['passed']){
			?>
			<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" name="form">
				<input type="text" name="username" /><br />
				<input type="password" name="password" /><br />
				<input type="submit" value="提交"  name="button"/>&nbsp;&nbsp;
				<input type="reset" value="重置" name="reset" />
			</form>
			<?php
			}
			else{
				$url="show.php";
				echo "<script language='JavaScript' type='text/JavaScript' >";
				echo "window.location.href='$url'";
				echo "</script>";
			}
			?>
		</div>
	</body>
</html>