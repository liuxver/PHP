<?php
	/*  这是销毁普通变量
	$a="45621632";
	echo($a);
	unset($a);
	echo($a);
	*/
	
	
	
	/*  这是销毁session变量
	session_start();
	$_SESSION["num_visits"]++;
	echo($_SESSION["num_visits"]);
	unset($_SESSION["num_visits"]);
	echo($_SESSION["num_visits"]);
	*/
	
	
	/*释放session变量，但是不删除文件
	session_start();
	$_SESSION["uesr"]="admin";
	session_unset();
	echo($_SESSION["user"]);
	echo "<BR>";
	echo("session_ID()=".session_id());
	*/
	
	
	//删除session文件，保留session变量
	session_start();
	$_SESSION["uesr"]="admin";
	session_destroy();
	echo($_SESSION["user"]);
	echo "<BR>";
	echo("session_ID()=".session_id());
?>