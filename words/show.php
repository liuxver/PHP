<?php
	function showpage($pagecount,$pageno){
		echo("<table width=738> <tr> <td align=right class=main>");
		if($pageno>1){
			echo("<a href=index.php?page=1>第一页</a>&nbsp;&nbsp;");
		}
		else{
			echo("第一页&nbsp;&nbsp;");
		}
		
		if($pageno>1){
			echo("<a href=index.php?page=".($pageno-1).">上一页</a>&nbsp;&nbsp;");
		}
		else{
			echo("上一页&nbsp;&nbsp;");
		}
		
		if($pageno<>$pagecount){
			echo("<a href=index.php?page=".($pageno+1).">下一页</a>&nbsp;&nbsp;");
		}
		else{
			echo("下一页&nbsp;&nbsp;");
		}
		
		if($pageno<>$pagecount){
			echo("<a href=index.php?page=".$pagecount."最后一页</a>&nbsp;&nbsp;");
		}
		else{
			echo("最后一页&nbsp;&nbsp;");
		}
		
		echo($pageno."/".$pagecount."</td></tr></table>");
	}
?>


<?php
	function showlist($pageno,$pagesize){
?>
		<div align="center">
			<center>
				<table border="3" width="738" bordercolor="red" cellspacing="0" cellpadding="0" height="46" bordercolorlight="#FFCCFF" bordercolordark="#CCCCFFF">
<?php
				//	include('class\content.php');
					$existrecord=false;
					$objcontent=new content();
					$results=$objcontent->load_content_bypage($pageno,$pagesize);
					//var_dump($results);
					while($row=$results->fetch_row()){
						$existrecord=true;
?>
						<tr>
							<td width="148" height="16" class="main" align="center">
								<br />
								<img border="2" src="img/<?php echo($row[4]); ?>.gif" width="100" height="100" />
								<br />
<?php
								echo($row[3]);
?>
								<a href="<?php echo($row[6]);?>" target=_blank>
								    <img border="2" src="img/homepage.gif" width="16" height="16" >
								</a>
								<a href="mailto:<?php echo($row[5]); ?>">
									<img border="2" src="img/email.gif" width="16" height="16">
								</a>
							    <br />
							    
							    	
<?php
								if($_SESSION["username"]<>""){
?>
									<a href=newrec.php?upperid=<?php echo($row[0]); ?>  target=_blank onclick="return newwin(this.href)">回复</a>
									<a href=deleterec.php?contid=<?php echo($row[0]); ?> target=_blank onclick="return newwin(this.href)">删除</a>
<?php
								}
?>
								
							</td>
							<td width="584" height="16" class="main" align="left" valign="top">
								<br />
								<b>标题：<?php echo($row[1]); ?> &nbsp;&nbsp; &nbsp; 时间：<?php echo($row[7]); ?></b>
								<br />
								<br />
								
<?php
								echo($row[2]);//显示 所有留言
								
								
								
								$content=new content();
								$sub_results=$content->load_content_byupperid($row[0]);
								while($subrow=$sub_results->fetch_row()){
									echo("<br> <br> <br>");
?>
									&nbsp;&nbsp;&nbsp;
									<img border="0" src="img/<?php echo($subrow[4]); ?>.gif" width="50" height="50" />
									<?php  echo($subrow[3]);      ?>
									<a href="<?php echo($subrow[6]); ?>" target=_blank>
										<img border="0" src="img/homepage.gif" width="16" height="16" />
									</a>
									<a href="<?php echo($subrow[5]); ?>">
										<img border="0" src="img/email.gif" width="16" height="16" />
									</a>
									&nbsp;&nbsp;&nbsp;&nbsp;
									<b>
										&nbsp;&nbsp;&nbsp;标题:<?php echo($subrow[1]); ?>
										&nbsp;&nbsp;&nbsp;时间：<?php echo($subrow[7]); ?>
										&nbsp;&nbsp;&nbsp;<?php echo($subrow[2]); ?>
									</b>
<?php
								}								
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
