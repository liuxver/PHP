<html>
	<head>
		<title>分页显示结果集</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8"  />
	</head>
	<body>
		<?php
			$page=$_GET['page'];//获取当前页码
			if($page==0){
				$page=1;
			}
			$pagesize=3;
			$conn=mysqli_connect("localhost","root","1234","mysqldb");
			if(empty($conn)){
				die("mysqli_connect failes:".mysqli_connect_error());
			}
			
			//获取记录数
			$sql="select count(1) from employees";
			$results=$conn->query($sql);
			$row=$results->fetch_row();
			$recordcount=$row[0];
			
			
			
			//计算总页数
			if($recordcount){
				if($recordcount<$pagesize){
					$pagecount=1;
				}//记录数小于页面显示的数量
				
				if($recordcount%$pagesize){
					$pagecount=(int)($recordcount/$pagesize)+1;
				}
				else{
					$pagecount=$recordcount/$pagesize;
				}
			}
			else{
				$pagecount=0;
			}
			
			echo("<br>当前页码：".$page."/".$pagecount);
		?>
		<table width="500" border="2">
			<tr>
				<td>员工姓名</td>
				<td>职务</td>
				<td>工资</td>
			</tr>
			<?php
				$sql="select empname,title,salary from employees LIMIT ".($page-1)*$pagesize.",".$pagesize.";";
				/*if($conn->query($sql)===true){
					echo("11111111");
				}
				else{
					echo("444444444444444");
				}*/
				$results=$conn->query($sql);
				while($row=$results->fetch_row()){
					echo("<tr>");
					echo("<td>".$row[0]."&nbsp;</td>");
					echo("<td>".$row[1]."&nbsp;</td>");
					echo("<td>".$row[2]."&nbsp;</td>");
					echo("</tr>");
				}
				
				mysqli_close($conn);
				
				if($page==1){
					echo("第一页");
				}
				else{
					echo("<a href=10.3-fen-ye.php?page=1>第一页</a>");
				}
				
				
				if($page==1){
					echo("上一页");
				}
				else{
					echo("<a href=10.3-fen-ye.php?page=".($page-1).">上一页</a>");
				}
				
				
				
				if($page==$pagecount){
					echo("下一页");
				}
				else{
					echo("<a href=10.3-fen-ye.php?page=".($page+1).">下一页</a>");
				}
				
				
				if($page=$pagecount){
					echo("最后一页");
				}
				else{
					echo("<a href=10.3-fen-ye.php?page=".$pagecount.">最后一页</a>");
				}
				
		?>		
		</table>
	</body>
</html>