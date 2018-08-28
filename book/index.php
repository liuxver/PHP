<meta charset="utf-8" />
<?PHP	
	$UserName = $_POST['UserName'];
	if($UserName != "")
		include('ChkPwd.php'); 
	include('Show.php'); 
    include("Class\Content.php");
	$objContent = new Content();	// ����Content�������ڷ��ʱ�Content
	$pageSize = 5; // ����ÿҳ��ʾ���Լ�¼������
	$pageNo = (int)$_GET['Page'];	// ��ȡ��ǰ��ʾ��ҳ�� 
	$recordCount = $objContent->GetRecordCount();  
	// ���?�Ϸ���ҳ��
	if($pageNo < 1)
		$pageNo = 1;
	// ������ҳ��
	if( $recordCount ){ 
		//����¼������С��ÿҳ��ʾ�ļ�¼��������ֻ��һҳ
		if( $recordCount < $pageSize ){ 
			$pageCount = 1; 
		}  
		//ȡ��¼�������������ÿҳ��ʾ��¼����������ҳ������ܼ�¼��������ÿҳ��ʾ��¼�����Ľ��ȡ���ټ�1
		if( $recordCount % $pageSize ){ 
			$pageCount = (int)($recordCount / $pageSize) + 1;
		}
		else {    //���û��������ҳ������ܼ�¼��������ÿҳ��ʾ��¼������
			$pageCount = $recordCount / $pageSize; 
		}
	}
	else{  // �������û�м�¼����ҳ��Ϊ0
		$pageCount = 0;
	}	
	
	if($pageNo > $pageCount)
		$pageNo = $pageCount;  
?>
<html>
<head>
<title>�������԰�</title>
<style>
<!--
.main        { font-size: 10pt }
-->
</style>
<script language="JavaScript">
function newwin(url) {
  var newwin=window.open(url,"newwin","toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=550,height=460");
  newwin.focus();
  return false;
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"></head>

<body topmargin="0" vlink="#000000" link="#000000">

<div align="center">
  <center>
<table width="714" border="0" height="218" cellspacing="0" cellpadding="0">
<tr>
	<td height="18" class="main" bordercolorlight="#0000FF" bordercolordark="#00FFFF" bgcolor="#3399FF" background="images/b3.gif">
     <?PHP 
		 if(!$_SESSION['Passed'])  { 
?>
	<form method="POST" action="<?PHP $_SERVER['PHP_SELF'] ?>" name="myform"> 
	&nbsp;<font size="2">�û���</font><input type="text" name="UserName" size="12">&nbsp;&nbsp;              
     ����: <input type="password" name="UserPwd" size="12"> <input type="submit" value="��¼" name="B1">&nbsp; 
	 <?PHP
		}
		else {
			echo("<b>��ӭ����Ա����!</b>");
		}
	 ?>
     [ <a target="_blank" href="newRec.php"  onclick="return newwin(this.href)">
	��Ҫ����</a> ]
	<?PHP 
		if($_SESSION['Passed'])  {
			echo('[<a href="logout.php">�˳���¼</a>]');
		}
	?> </td> </form>
</tr>
</center>
<tr> <td height="161" class="main"> <?PHP ShowList($pageNo, $pageSize); ?> </td></tr>
<tr> <td height="15"> </td></tr>   
<tr>
	<td height="13" class="main" background="images/b3.gif"> <?PHP ShowPage($pageCount, $pageNo); ?></td>
</tr>
<tr> <td height="15"> </td></tr>   
  </table>
</body>















