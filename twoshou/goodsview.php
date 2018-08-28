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
				$obj=new goods();
				$obj->add_clicktimes($gid);
				$obj->getgoodsinfo($gid);
				
				include('class\users.php');
				$objuser=new users();
				$objuser->getusersinfo($obj->ownerid);
				
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
				<img src="user/img/<?php echo($obj->imageurl); ?>" height="50" border="2"/>
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
					<td align="right" width="25%" bgcolor="antiquewhite">所有者</td>
					<td align="left"><?php echo($objuser->name); ?></td>
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
					<td align="right" width="25%" bgcolor="antiquewhite">新旧程度</td>
					<td align="left"><?php echo($obj->oldnew); ?></td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">保修</td>
					<td align="left"><?php echo($obj->repaired); ?></td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">发票</td>
					<td align="left"><?php echo($obj->invoice); ?></td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">运费</td>
					<td align="left"><?php echo($obj->carriage); ?></td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">支付方式</td>
					<td align="left"><?php echo($obj->paymode); ?></td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">运货方式</td>
					<td align="left"><?php echo($obj->delivermode); ?></td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">商品描述</td>
					<td align="left"><textarea rows="3" name="adetail" cols="40"><?php echo($obj->goodsdetail); ?></textarea></td>
				</tr>
			</table>	
		</center>
		
	</body>
</html>