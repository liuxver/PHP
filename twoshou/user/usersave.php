<html>
	<head>
		<title>保存用户</title>
	</head>
	<body>
		<?php
			include('..\class\users.php');
			$objuser=new users();
			$uid=$_POST["userid"];
			$objuser->userid=$uid;
			$objuser->userpassword=$_POST["password"];
			$objuser->name=$_POST["username"];
			$objuser->sex=$_POST["sex"];
			$objuser->address=$_POST["address"];
			$objuser->postcode=$_POST["postcode"];
			$objuser->email=$_POST["email"];
			$objuser->telephone=$_POST["telephone"];
			$objuser->mobile=$_POST["mobile"];
			if($_POST["isadd"]=="new"){
				if($objuser->haveusers($uid)){
		?>
					<script language="JavaScript">
						alert("注册成功！");
						history.go(-1);
					</script>
		<?php
				}else{
				$objuser->usertype=0;
				$objuser->insert();
				}
		}else{
			$objuser->update($objuser->userid);
		}
		print "<h2>用户信息保存成功！</h2>";
	?>
	</body>
	<script language="JavaScript">
		opener.location.reload();
		setTimeout("window.close()",800);
	</script>
</html>