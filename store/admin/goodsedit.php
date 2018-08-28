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
			
			include('..\class\goodstype.php');
			$objtype=new goodstype();
			$objtype->getgoodstypeinfo($obj->typeid);
		?>
		<form action="goodssave.php?flag=2&gid=<?php echo($gid); ?>" method="post" name="form1" onsubmit="return checkflds()">
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
					<td align="right" bgcolor="antiquewhite" width="25%">商品剩余数量:</td>
					<td align="left"><input type="text" name="num" value="<?php echo($obj->num); ?>" /></td>
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