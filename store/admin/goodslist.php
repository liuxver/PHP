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
		$itype=$_GET["type"];
	?>
	<body>
		<table border="1" width="100%" cellpadding="0" bordercolorlight="red" bordercolordark="blue">
			<tr>
				<td bgcolor="antiquewhite" height="25" colspan="2" align="center"><b>图书信息</b></td>
			</tr>
		</table>
		<table border="1" width="100%" cellspacing="0" bordercolorlight="red" bordercolordark="blue">
			<tr bgcolor="antiquewhite">
				<td align="center" width="20%">图书名称</td>
				<td align="center" width="20%">上架时间</td>
				<td align="center" width="20%">当前价格</td>
				<td align="center" width="20%">剩余数量</td>
				<td align="center" width="20%">操作</td>
			</tr>
			<?php
				include('..\class\goods.php');
				$obj=new goods();
				$result=$obj->getgoodslist(" where typeid=".$itype);
				//include('..\class\users.php');
				while($row=$result->fetch_row()){
					$m=$m+1;
			?>
					<tr>
						<td align="center"><a href="../goodsview.php?gid=<?php echo($row[0]); ?>" target=_blank><?php echo($row[2]); ?></a></td>
						<td align="center"><?php echo($row[6]); ?></td>
						<td align="center"><?php echo($row[5]); ?></td>
						<td align="center"><?php echo($row[7]); ?></td>
						<td align="center">
							<a href="goodsdelete.php?gid=<?php echo($row[0]); ?>" onclick="if(confirm("确定要删除吗？亲爱的！")){return this.href;}return false;" target=_blank>删除</a>
							&nbsp;&nbsp;<a href="goodsedit.php?gid=<?php echo($row[0]); ?>">修改</a>
						</td>
					</tr>
				<?php
				}
				if($m==0){
					print "<tr><td align=center colspan=5>没有商品信息！</td></tr>";
				}
				?>
				
		</table>
		<center>
			<input type="button" value="添加商品信息" onclick="newwin('goodsadd.php?tid=<?php echo($itype); ?>')" name="add" />
		</center>
		
	</body>
</html>