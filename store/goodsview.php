<?php
	include('isuser.php');
		
?>
<?php
header("content-Type: text/html; charset=Utf-8"); //设置字符的编码是utp-8
mysql_query('set names utf8');
?>
<html>
	<head>
		<title>查看商品信息</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<center>
			<?php
				include('class\goods.php');
				$gid=$_GET["gid"];
				$uid=trim($_SESSION["user_id"]);
				//echo($gid);
				//echo($uid);
				$obj=new goods();
				$obj->add_clicktimes($gid);
				$obj->getgoodsinfo($gid);
				
				
				
				include('class\goodstype.php');
				$objtype=new goodstype();
				$objtype->getgoodstypeinfo($obj->typeid);
			?>
			<center>
			<?php
				if($obj->imageurl==""){
			?>
				<img src="img/noImg.jpg" height="50" border="2" />
			<?php
			}else{
			?>
				<img src="admin/img/<?php echo($obj->imageurl); ?>" height="50" border="2"/>
			<?php
			}
			?>
			</center>
			<table align="center" cellpadding="0" cellspacing="0" width="90%" bordercolorlight="red" bordercolordark="blue">
				<tr>
					<td align="center" width="100%" colspan="2" bgcolor="antiquewhite" height="28"><b>商品信息</b></td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">商品名称</td>
					<td align="left"><?php echo($obj->goodsname); ?></td>
				</tr>
				
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">所属分类</td>
					<td align="left"><?php echo($objtype->typename); ?></td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">添加时间</td>
					<td align="left"><?php echo($obj->starttime); ?></td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">商品价格</td>
					<td align="left"><?php echo($obj->price); ?></td>
				</tr>
				
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">剩余数量</td>
					<td align="left"><?php echo($obj->num); ?></td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">商品描述</td>
					<td align="left"><textarea rows="3" name="adetail" cols="40"><?php echo($obj->goodsdetail); ?></textarea></td>
				</tr>
				<tr>
					<td colspan="2" width="100%" bgcolor="antiquewhite">
						<a href="buy.php?uid=<?php echo($uid);　?>&gid=<?php echo($gid); ?>">购买</a>
					</td>
				</tr>
			</table>	
		</center>
		
	</body>
</html>