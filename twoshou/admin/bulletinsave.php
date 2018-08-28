<?php
	include('isadmin.php');
?>
<html>
	<head>
		<title>保存公告信息</title>
		<meta http-equiv="content-type" content="text/html; charset=HZ-GB-2312" />
	</head>
	<body>
		<?php
			date_default_timezone_set("Asia/Chongqing");
			include('..\class\users.php');
			include('..\class\bulletin.php');
			session_start();
			$straction=$_GET["action"];
			$objuser=new users();
			$objuser->getusersinfo($_SESSION["username"]);
			
			
			
			$objbul=new bulletin();
			
			$objbul->title=$_POST["title"];
			$objbul->content=$_POST["content"];
			$objbul->poster=$objuser->userid;
			$objbul->posttime=strftime("%Y-%m-%d %H:%M:%S");
			
			
			echo($objbul->title);
			echo($objbul->content);
			echo($objbul->poster);
			echo($objbul->posttime);
			
			echo($straction);
			
			if($straction=="add"){
				//echo("888888888888888888888");
				//if($objbul->insert()){
					//echo("888888888888888888888");
				//}
				$objbul->insert();
			}else{
				$id=$_GET["id"];
				$objbul->update($id);
			}
			
			print "<h3>公告成功保存了哦，亲爱的！</h3>";
		?>
		
	</body>
	<script language="JavaScript">
		opener.location.reload();
		setTimeout("window.close()",600000000);
	</script>
</html>