<?php
	date_default_timezone_set("Asia/Chongqing");
	session_start();
	if($_SESSION["last_vist"]){
		echo "您上次访问的时间为：";
		echo date("Y-m-d,H:i:s",$_SESSION["last_vist"]);
		echo "<BR>";
		echo "访问次数：".$_SESSION["num_visits"];
	}
	else{
		echo "这是您第一次访问！";
	}
	
	$_SESSION["last_vist"]=time();
	$_SESSION["num_visits"]++;
	if($_SESSION["num_visits"]==5){
		unset($_SESSION["last_vist"]);
		echo($_SESSION["last_vist"]);
	}
?>