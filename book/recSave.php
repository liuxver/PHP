<html>
<head>
<title>保存留言信息</title>
</head>
<body>
<?PHP
   date_default_timezone_set('Asia/Chongqing'); //系统时间差8小时问题
	include('Class\Content.php');
	$objContent = new Content();
	// 从参数或表单中接收数据到变量中
	$objContent->UserName = $_POST["name"];
	$objContent->Subject = $_POST["Subject"];
	$objContent->Words = $_POST["Words"];
	$objContent->Email = $_POST["email"];
	$objContent->Homepage = $_POST["homepage"];
	$objContent->Face = $_POST["logo"];
	$objContent->UpperId = $_GET["UpperId"];
	if($objContent->UpperId == "")
		$objContent->UpperId = 0;
	// 获取当前当前时间
	$now = getdate();
	$objContent->CreateTime = $now['year'] . "-" . $now['mon'] . "-" . $now['mday'] 
		. "  " . $now['hours'] . ":" . $now['minutes'] . ":" . $now['seconds'];
	
	$objContent->insert();
	echo("<h2>信息已成功保存！</h2>");
?>
</body>
<Script language="javascript">
  //打开此脚本的网页将被刷新
  opener.location.reload();
  //停留800毫秒后关闭窗口
  setTimeout("window.close()",2800);
</Script>
</html>