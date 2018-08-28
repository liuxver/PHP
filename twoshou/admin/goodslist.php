<?php
	include('isadmin.php');
?>
<html>
	<head>
		<link rel="stylesheet" href="../css/style.css" />
	</head>
	<?php
		$m=0;
		$itype=$_GET["type"];
	?>
	<body>
		<table border="1" width="100%" cellpadding="0" bordercolorlight="red" bordercolordark="blue">
			<tr>
				<td bgcolor="antiquewhite" height="25" colspan="2" align="center"><b>商品信息</b></td>
			</tr>
		</table>
		<table border="1" width="100%" cellspacing="0" bordercolorlight="red" bordercolordark="blue">
			<tr bgcolor="antiquewhite">
				<td align="center" width="20%">商品名称</td>
				<td align="center" width="20%">卖家</td>
				<td align="center" width="20%">当前价格</td>
				<td align="center" width="20%">是否结束</td>
				<td align="center" width="20%">操作</td>
			</tr>
			<?php
				include('..\class\goods.php');
				$obj=new goods();
				$result=$obj->getgoodslist(" where typeid=".$itype);
				include('..\class\users.php');
				while($row=$result->fetch_row()){
					$m=$m+1;
					$objuser=new users();
					$objuser->getusersinfo($row[15]);
			?>
					<tr>
						<td align="center"><a href="../goodsview.php?gid=<?php echo($row[0]); ?>" target=_blank><?php echo($row[3]); ?></a></td>
						<td align="center"><a href="../userview.php?uid=<?php echo($row[15]); ?>" target=_blank><?php echo($objuser->name); ?></a></td>
						<td align="center"><?php echo($row[6]); ?></td>
						<td align="center">
							<?php if($row[14]==1){ ?>
							已结束
						<?php }else{  ?>
							未结束
						<?php } ?>
						</td>
						<td align="center"><a href="goodsdelete.php?gid=<?php echo($row[0]); ?>" onclick="if(confirm("确定要删除吗？亲爱的！")){return this.href;}return false;" target=_blank>删除</a></td>
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