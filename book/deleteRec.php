<html>
<head>
<title>ɾ���û���Ϣ</title>
</head>
<body>
<?PHP
	include('ChkPwd.php');
	include('Class\Content.php');
	$ContId = $_GET["ContId"];	// ��ȡҪɾ�������Լ�¼���
	$objContent = new Content();
	$objContent->delete($ContId);		// ɾ�����Լ�¼
	echo("�ѳɹ�ɾ�����ԡ�");
?>
<Script Language="JavaScript">
  //�򿪴˽ű�����ҳ����ˢ��
  opener.location.reload();
  //ͣ��800�����رմ���
  setTimeout("window.close()",800);
</Script>
</body>
</html>