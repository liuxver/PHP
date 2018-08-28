<?php
	include('isadmin.php');
?>
<html>
	<head>
		<link rel="stylesheet" href="../css/style.css" />
		<script language="JavaScript">
		function newwin(url){
			var oth="toorbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,left=200,top=100";
			oth=oth+",width=600,height=500";
			var newwin=window.open(url,"newwin",oth);
			newwin.focus();
			return false;
		}
		</script>
	</head>
	<?php
		$m=0;
	?>
	<body>
		<table border="1" width="100%" cellpadding="0" bordercolorlight="red" bordercolordark="blue">
			<tr>
				<td bgcolor="antiquewhite" height="25" colspan="2" align="center"><b>订单信息</b></td>
			</tr>
		</table>
		<table border="1" width="100%" cellspacing="0" bordercolorlight="red" bordercolordark="blue">
			<tr bgcolor="antiquewhite">
				<td align="center" width="20%">订单序列号 </td>
				<td align="center" width="30%">购买者</td>
				<td align="center" width="30%">购买的图书</td>
				<td align="center" width="20%">操作</td>
			</tr>
			<?php
				include('..\class\sell.php');
				$obj=new sell();
				$result=$obj->getselllist();
				//include('..\class\users.php');
				while($row=$result->fetch_row()){
					$m=$m+1;
			?>
					<tr>
						<td align="center"><?php echo($row[0]); ?></td>
						<td align="center"><?php echo($row[1]); ?></td>
						<td align="center"><?php echo($row[2]); ?></td>
						<td align="center">
							<a href="selldelete.php?gid=<?php echo($row[2]); ?>&uid=<?php echo($row[1]); ?>" onclick="if(confirm("确定要删除吗？亲爱的！")){return this.href;}return false;" target=_blank>删除</a>
						</td>
					</tr>
				<?php
				}
				if($m==0){
					print "<tr><td align=center colspan=5>没有商品信息！</td></tr>";
				}
				?>
				
		</table>
	</body>
</html>