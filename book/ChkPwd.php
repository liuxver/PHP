<?PHP
	include('class\Users.php');		// ����Users��
	$user = new Users();
	session_start();
    //�����δ����Passed�������䶨��ΪFalse����ʾû��ͨ�������֤
    if(!isset($_SESSION['Passed']))	{
		$_SESSION['Passed'] = False;
	}
  	// ���$_SESSION['Passed']=False,���ʾû��ͨ�������֤
	if($_SESSION['Passed']==False) {	
		// ��ȡ�ӱ����ݹ������������
    	$UserName = $_POST['UserName'];
    	$UserPwd = $_POST['UserPwd'];
    	if($UserName == "")
      		$Errmsg = "�������û���������";
		else  {
			// ��֤�û���������
			if(!$user->verify($UserName, $UserPwd))  {
?>

		<script language="javascript">
			alert("�û��������벻��ȷ!");
		</script>";
		<?PHP
			}
			else  { // ��¼�ɹ� ?>
					<script language="javascript">
			alert("��¼�ɹ�!");
		</script>
		<?PHP
				$_SESSION['Passed'] = True;
				$_SESSION['UserName'] = $UserName;
				$_SESSION['ShowName'] = $user->ShowName;
				//$_SESSION['ShowName'] = $row[2];
			}
		} 
	}	
	// ������¼���ɹ����򻭳���¼��MyForm
  	if(!$_SESSION['Passed'])  {  
?>
		<script language="javascript">
		  history.go(-1);
		</script>
<?PHP	}   ?>