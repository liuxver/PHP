<html>
	<head>
		<title>修改商品信息</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript">
			function checkflds(){
				if(document.form1.aname.value==""){
					alert("请输入商品名称！");
					FormData.aname.focus;//可能存在问题
					return false;
				}
				var a,b;
				a=document.form1.atype.selectedIndex;
				if(document.form1.atype.value==0){
					if(form1,anum.value!=1){
						alert("请输入一个东西，我还不知道是啥子噻！");
						form1.anum.value=1;
						return false;
					}
				}
				return true;
			}
		</script>
		
	</head>
	<body>
		<?php
			include('..\class\goods.php');
			$gid=intval($_GET["gid"]);
			$obj=new goods();
			$obj->getgoodsinfo($gid);
			
			include('..\class\users.php');
			$objuser=new users();
			$objuser->getusersinfo($obj->ownerid);
			
			include('..\class\goodstype.php');
			$objtype=new goodstype();
			$objtype->getgoodstypeinfo($obj->typeid);
		?>
		<form action="goodssave.php?flag=<?php echo($obj->saleorbuy-1); ?>&action=edit&gid=<?php echo($gid); ?>" method="post" name="form1" onsubmit="return checkflds()">
			<center>
				<table align="center" cellpadding="0" cellspacing="0" width="60%" border="2" bordercolorlight="red" bordercolordark="blue">
					<tr>
						<td align="center" width="100%" colspan="2" bgcolor="antiquewhite" height="28">编辑商品信息</td>
					</tr>
					<tr>
						<td align="right" width="25%" bgcolor="antiquewhite">商品名称：</td>
						<td align="left"><input type="text" name="aname" value="<?php echo($obj->goodsname); ?>"/></td>
					</tr>
					<tr>
						<td align="right" width="25%" bgcolor="antiquewhite">所有者:</td>
						<td align="left"><input type="text" readonly="readonly" name="ownerid" value="<?php echo($objuser->name); ?>" /></td>
					</tr>
				
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">所属分类:</td>
					<td align="left">
						<select size="1" name="typeid">
					<?php
						//include('..\class\goodstype.php');
						$tid=intval($_GET["tid"]);
						$objtype1=new goodstype();
						$result=$objtype1->getgoodstypelist();
						while($row=$result->fetch_row()){
					?>
							<option value="<?php echo($row[0]); ?>"  <?php  if($row[0]==$objgoods->typeid){  ?> selected <?php  } ?>>
								<?php echo($row[1]); ?>
							</option>
					<?php }  ?>
						</select>
					</td>
				</tr>
				
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">添加时间:</td>
					<td align="left"><input type="text" name="stime" value="<?php echo($obj->starttime); ?>"  readonly="readonly" size="24"/></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">商品价格:</td>
					<td align="left"><input type="text" name="sprice" value="<?php echo($obj->price); ?>" /></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">新旧程度:</td>
					<td align="left"><input type="text" name="oldnew" value="<?php echo($obj->oldnew); ?>"/></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">保修:</td>
					<td align="left"><input type="text" name="repaired" value="<?php echo($obj->repaired); ?>" /></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">发票:</td>
					<td align="left"><input type="text" name="invoice" value="<?php echo($obj->invoice); ?>" /></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">运费:</td>
					<td align="left"><input type="text" name="carriage" value="<?php echo($obj->carriage); ?>" /></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">支付方式:</td>
					<td align="left"><input type="text" name="pmode" value="<?php echo($obj->paymode); ?>" /></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">送货方式:</td>
					<td align="left"><input type="text" name="dmode" value="<?php echo($obj->delivermode); ?>" /></td>
				</tr>
				
				<tr>
					<td align="right" bgcolor="antiquewhite">商品描述：</td>
					<td align="left"><textarea rows="3" name="adetail" cols="40" value="<?php echo($obj->goodsdetail); ?>" ></textarea></td>
				</tr>
				<tr>
					<td align="center" colspan="2" bgcolor="antiquewhite" height="30"><input type="submit" value="确定" ></td>
				</tr>
				</table>
			</center>
		</form>
	</body>
</html>