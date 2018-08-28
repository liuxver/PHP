<meta http-equiv="content-type" content="text/html" charset="utf-8" />
<?php
	if($_POST['submit']){
		echo("用户名：".$_POST['username']."<BR>");
		echo("密码：".$_POST['password']."<br>");
		echo("确认密码：".$_POST['password1']."<br>");
		echo("性别：".$_POST['radiosex']."<br>");
		echo("兴趣爱好：");
		if($_POST['c1']=='on')
		    echo("玩游戏  ");
		if($_POST['c2']=='on')
		    echo("打篮球  ");
		if($_POST['c3']=='on')
			echo("打乒乓  ");
		echo("<br>");
		echo("所在城市：".$_POST['city']."<br>");
		echo("自我介绍：".$_POST['instrotion']."<br>");
	}
?>