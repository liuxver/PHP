<html>
<head>
<title>删除用户信息</title>
</head>
<body>
<?PHP
	include('ChkPwd.php');
	include('Class\Content.php');
	$ContId = $_GET["ContId"];	// 获取要删除的留言记录编号
	$objContent = new Content();
	$objContent->delete($ContId);		// 删除留言记录
	echo("已成功删除留言。");
?>
<Script Language="JavaScript">
  //打开此脚本的网页将被刷新
  opener.location.reload();
  //停留800毫秒后关闭窗口
  setTimeout("window.close()",800);
</Script>
</body>
</html>