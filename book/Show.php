<head>
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
</head>
<?PHP
function ShowList( $pageNo, $pageSize )  {
  ?>
<div align="center">
  <center>
  <table border="1" width="738" bordercolor="#3399FF" cellspacing="0" cellpadding="0" height="46" bordercolorlight="#FFCCFF" bordercolordark="#CCCCFF">
    
<?PHP 
	$existRecord = False;		
	$objContent = new Content();
	$results = $objContent->load_content_byPage($pageNo, $pageSize);
	// ʹ��while�����ʾ����$results�е���������
	while($row = $results->fetch_row())  { 
		$existRecord = True;
?>    <tr>
      <td width="148" height="16" class="main" align=center>  <br>
		<img border="0" src="images/<?PHP echo($row[4]); /* ����Face�ֶε�����*/ ?>.gif" width="100" height="100"><br>
	  <?PHP echo($row[3]); /* ���UserName�ֶε�ֵ */?><br><br>
      	<a href="<?PHP echo($row[6]); /* ���Homepage�ֶε�ֵ */?>" target=_blank>
		<img border="0" src="images/homepage.gif" width="16" height="16"></a>
      	<a href="mailto:<?PHP echo($row[5]); /* ���Email�ֶε�ֵ */ ?>">
		<img border="0" src="images/email.gif" width="16" height="16"></a><br>
		
		<?PHP if($_SESSION["UserName"] <> "")  {?>
		     <a href=newRec.php?UpperId=<?PHP echo($row[0]); /*ContId*/ ?> target=_blank onclick="return newwin(this.href)">�ظ�</a>  
		     <a href=deleteRec.php?ContId=<?PHP echo($row[0]); /*ContId*/ ?>  target=_blank onclick="return newwin(this.href)">ɾ��</a>
		 <?PHP } /* end of if */ ?>       
       </td>       
      <td width="584" height="16" class="main" align="left" valign="top">
      <br><b>����:<?PHP echo($row[1]); /* Subject */ ?> &nbsp;&nbsp;&nbsp; ʱ��: <?PHP echo($row[7]); /* CreateTime */ ?></b><hr><br>
      <?PHP 
			echo($row[2]); /* Words */     
			// ����������ʾ���лظ�����
			$content = new Content();	// ����Content����
			$sub_results = $content->load_content_byUpperid($row[0]);
			while($subrow = $sub_results->fetch_row())  {
				echo("<BR><BR><BR>"); ?>&nbsp;&nbsp;&nbsp;
          <img border="0" src="images/<?PHP echo($subrow[4]); /* Face */ ?>.gif" width="50" height="50">
          <?PHP echo($subrow[3]); /* UserName") */ ?>
          <a href="<?PHP echo($subrow[6]); /*homepage*/ ?>" target=_blank>
		  <img border="0" src="images/homepage.gif" width="16" height="16"></a>
      	  <a href="mailto:<?PHP echo($subrow[5]); /* email */ ?>">
		  <img border="0" src="images/email.gif" width="16" height="16"></a>&nbsp;&nbsp;&nbsp;
		  <b>&nbsp;&nbsp;&nbsp; ����:<?PHP echo($subrow[1]); /*Subject */?> &nbsp;&nbsp;&nbsp; ʱ��: <?PHP echo($subrow[7]); /* CreateTime */ ?></b><hr><br>
           &nbsp;&nbsp;&nbsp;  <?PHP echo($subrow[2]); /* Words */ ?>

      <?PHP
			} // end of while
        ?>
      </td>
    </tr>
<?PHP
	} // end of while 
	if(!$existRecord)   {
?>
  <tr>
    <td width="148" height="16" align=center class="main">û����������</td>       
  </tr>
<?PHP
	}  // end of if
   echo("</table></center></div>");
   } // end of function
 ?>

<?PHP
// $recordCount��ʾ���ؽ�����е���ҳ����$pageNo��ʾ��ǰҳ��
function ShowPage( $pageCount, $pageNo )  {
	echo("<table width=738> <tr> <td align=right class=main>");
  
	// ��ʾ��һҳ�������ǰҳ���ǵ�һҳ������������
	if($pageNo>1)
		echo("<A HREF=index.php?Page=1>��һҳ</A>&nbsp;&nbsp;");
	else
		echo("��һҳ&nbsp;&nbsp;");
	// ��ʾ��һҳ�������������һҳ������������
	if($pageNo>1)
		echo("<A HREF=index.php?Page=" . ($pageNo-1) . ">��һҳ</A>&nbsp;&nbsp;");
	else
		echo("��һҳ&nbsp;&nbsp;");
	// ��ʾ��һҳ�������������һҳ������������
	if($pageNo<>$pageCount)
	    echo("<A HREF=index.php?Page=" . ($pageNo+1) . ">��һҳ</A>&nbsp;&nbsp;");
	else
		echo("��һҳ&nbsp;&nbsp;");
	// ��ʾ���һҳ�������ǰҳ�������һҳ������������
	if($pageNo <> $pageCount)
	    echo("<A HREF=index.php?Page=" . $pageCount . ">���һҳ</A>&nbsp;&nbsp;");
	else
		echo("���һҳ&nbsp;&nbsp;");

	// ���ҳ��
	echo($pageNo . "/" . $pageCount . "</td></tr></table>");
}
?>