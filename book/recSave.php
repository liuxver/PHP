<html>
<head>
<title>����������Ϣ</title>
</head>
<body>
<?PHP
   date_default_timezone_set('Asia/Chongqing'); //ϵͳʱ���8Сʱ����
	include('Class\Content.php');
	$objContent = new Content();
	// �Ӳ�������н������ݵ�������
	$objContent->UserName = $_POST["name"];
	$objContent->Subject = $_POST["Subject"];
	$objContent->Words = $_POST["Words"];
	$objContent->Email = $_POST["email"];
	$objContent->Homepage = $_POST["homepage"];
	$objContent->Face = $_POST["logo"];
	$objContent->UpperId = $_GET["UpperId"];
	if($objContent->UpperId == "")
		$objContent->UpperId = 0;
	// ��ȡ��ǰ��ǰʱ��
	$now = getdate();
	$objContent->CreateTime = $now['year'] . "-" . $now['mon'] . "-" . $now['mday'] 
		. "  " . $now['hours'] . ":" . $now['minutes'] . ":" . $now['seconds'];
	
	$objContent->insert();
	echo("<h2>��Ϣ�ѳɹ����棡</h2>");
?>
</body>
<Script language="javascript">
  //�򿪴˽ű�����ҳ����ˢ��
  opener.location.reload();
  //ͣ��800�����رմ���
  setTimeout("window.close()",2800);
</Script>
</html>