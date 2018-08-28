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
	// 使用while语句显示所有$results中的留言数据
	while($row = $results->fetch_row())  { 
		$existRecord = True;
?>    <tr>
      <td width="148" height="16" class="main" align=center>  <br>
		<img border="0" src="images/<?PHP echo($row[4]); /* 输入Face字段的内容*/ ?>.gif" width="100" height="100"><br>
	  <?PHP echo($row[3]); /* 输出UserName字段的值 */?><br><br>
      	<a href="<?PHP echo($row[6]); /* 输出Homepage字段的值 */?>" target=_blank>
		<img border="0" src="images/homepage.gif" width="16" height="16"></a>
      	<a href="mailto:<?PHP echo($row[5]); /* 输出Email字段的值 */ ?>">
		<img border="0" src="images/email.gif" width="16" height="16"></a><br>
		
		<?PHP if($_SESSION["UserName"] <> "")  {?>
		     <a href=newRec.php?UpperId=<?PHP echo($row[0]); /*ContId*/ ?> target=_blank onclick="return newwin(this.href)">回复</a>  
		     <a href=deleteRec.php?ContId=<?PHP echo($row[0]); /*ContId*/ ?>  target=_blank onclick="return newwin(this.href)">删除</a>
		 <?PHP } /* end of if */ ?>       
       </td>       
      <td width="584" height="16" class="main" align="left" valign="top">
      <br><b>标题:<?PHP echo($row[1]); /* Subject */ ?> &nbsp;&nbsp;&nbsp; 时间: <?PHP echo($row[7]); /* CreateTime */ ?></b><hr><br>
      <?PHP 
			echo($row[2]); /* Words */     
			// 下面用于显示所有回复留言
			$content = new Content();	// 定义Content对象
			$sub_results = $content->load_content_byUpperid($row[0]);
			while($subrow = $sub_results->fetch_row())  {
				echo("<BR><BR><BR>"); ?>&nbsp;&nbsp;&nbsp;
          <img border="0" src="images/<?PHP echo($subrow[4]); /* Face */ ?>.gif" width="50" height="50">
          <?PHP echo($subrow[3]); /* UserName") */ ?>
          <a href="<?PHP echo($subrow[6]); /*homepage*/ ?>" target=_blank>
		  <img border="0" src="images/homepage.gif" width="16" height="16"></a>
      	  <a href="mailto:<?PHP echo($subrow[5]); /* email */ ?>">
		  <img border="0" src="images/email.gif" width="16" height="16"></a>&nbsp;&nbsp;&nbsp;
		  <b>&nbsp;&nbsp;&nbsp; 标题:<?PHP echo($subrow[1]); /*Subject */?> &nbsp;&nbsp;&nbsp; 时间: <?PHP echo($subrow[7]); /* CreateTime */ ?></b><hr><br>
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
    <td width="148" height="16" align=center class="main">没有留言数据</td>       
  </tr>
<?PHP
	}  // end of if
   echo("</table></center></div>");
   } // end of function
 ?>

<?PHP
// $recordCount表示返回结果集中的总页数，$pageNo表示当前页码
function ShowPage( $pageCount, $pageNo )  {
	echo("<table width=738> <tr> <td align=right class=main>");
  
	// 显示第一页，如果当前页就是第一页，则不生成链接
	if($pageNo>1)
		echo("<A HREF=index.php?Page=1>第一页</A>&nbsp;&nbsp;");
	else
		echo("第一页&nbsp;&nbsp;");
	// 显示上一页，如果不存在上一页，则不生成链接
	if($pageNo>1)
		echo("<A HREF=index.php?Page=" . ($pageNo-1) . ">上一页</A>&nbsp;&nbsp;");
	else
		echo("上一页&nbsp;&nbsp;");
	// 显示下一页，如果不存在下一页，则不生成链接
	if($pageNo<>$pageCount)
	    echo("<A HREF=index.php?Page=" . ($pageNo+1) . ">下一页</A>&nbsp;&nbsp;");
	else
		echo("下一页&nbsp;&nbsp;");
	// 显示最后一页，如果当前页就是最后一页，则不生成链接
	if($pageNo <> $pageCount)
	    echo("<A HREF=index.php?Page=" . $pageCount . ">最后一页</A>&nbsp;&nbsp;");
	else
		echo("最后一页&nbsp;&nbsp;");

	// 输出页码
	echo($pageNo . "/" . $pageCount . "</td></tr></table>");
}
?>