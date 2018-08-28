<?php
	function showpage($pagecount,$pageno){
		echo("<table width=738> <tr> <td align=right class=main>");
		if($pageno>1){
			echo("<a href=show.php?page=1>第一页</a>&nbsp;&nbsp;");
		}
		else{
			echo("第一页&nbsp;&nbsp;");
		}
		
		if($pageno>1){
			echo("<a href=show.php?page=".($pageno-1).">上一页</a>&nbsp;&nbsp;");
		}
		else{
			echo("上一页&nbsp;&nbsp;");
		}
		
		if($pageno<>$pagecount){
			echo("<a href=show.php?page=".($pageno+1).">下一页</a>&nbsp;&nbsp;");
		}
		else{
			echo("下一页&nbsp;&nbsp;");
		}
		
		if($pageno<>$pagecount){
			echo("<a href=show.php?page=".$pagecount.">最后一页</a>&nbsp;&nbsp;");
		}
		else{
			echo("最后一页&nbsp;&nbsp;");
		}
		//echo($pagecount);
		echo($pageno."/".$pagecount."</td></tr></table>");
	}	
?>



	
<?php
	function showrecord($pageno,$pagesize){
?>
		<div align="center">
			<center>
				<table border="3" width="738" bordercolor="red" cellspacing="0" cellpadding="0" height="46" bordercolorlight="#FFCCFF" bordercolordark="#CCCCFFF">
<?php
					//include('class\customer.php');
					$existrecord=false;
					$objcustomer=new customer();
					$results=$objcustomer->load_by_page($pageno,$pagesize);
					//var_dump($results);
					while($row=$results->fetch_row()){
						$existrecord=true;
?>
						<tr>
							<td width="148" height="16" class="main" align="center">
<?php
								echo($row[0]);
?>								
								<br />
								<a href=newrecord.php?number=<?php echo($row[0]); ?>  target=_blank onclick="return newwin(this.href)">修改</a>
								<a href=deleterecord.php?number=<?php echo($row[0]); ?> target=_blank onclick="return newwin(this.href)">删除</a>
								
							</td>
							<td width="584" height="16" class="main" align="left" valign="top">
								<br />
								<b>姓名：<?php echo($row[1]); ?> &nbsp;&nbsp; &nbsp; 电话：<?php echo($row[2]); ?></b>
								<br />
								<br />
								
<?php
								echo($row[2]);//显示 所有留言
?>

							</td>
						</tr>
<?php						
					}
					if(!existrecord){
?>
						<tr>
							<td width="148" height="16" align="center" class="main">没有留言数据</td>
						</tr>
<?php
				    }
				    echo("</table></center></div>");
	}
?>
