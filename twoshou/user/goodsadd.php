<?php
	include('isuser.php');
?>
<?php
	session_start();
	date_default_timezone_set('Asia/chongqing');
?>
<html>
	<head>
		<title>添加商品信息</title>
		<link href="../css/style.css"  rel="stylesheet" type="text/css"/>
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
		<form action="goodssave.php?flag=<?php echo($_GET["flag"]); ?>" method="post" name="form1" onsubmit="return checkflds()">
			<table align="center"cellpadding="0" cellspacing="0" width="90%" border="2" bordercolorlight="red" bordercolordark="blue">
				<tr>
					<td align="center" width="100%" colspan="3" bgcolor="antiquewhite" height="28" ><font color="black"><b>添加商品信息</b></font></td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">商品名称:</td>
					<td align="left"><input type="text" name="aname" /></td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">所有者:</td>
					<td align="left"><input type="text" readonly="readonly" name="ownerid" value="<?php echo($_SESSION["username"]); ?>" /></td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">所属分类:</td>
					<td align="left">
						<select size="1" name="typeid">
					<?php
						include('..\class\goodstype.php');
						$tid=intval($_GET["tid"]);
						$obj=new goodstype();
						$result=$obj->getgoodstypelist();
						while($row=$result->fetch_row()){
					?>
							<option value="<?php echo($row[0]); ?>"  <?php  if($row[0]==$tid){  ?> selected <?php  } ?>>
								<?php echo($row[1]); ?>
							</option>
					<?php }  ?>
						</select>
					</td>
				</tr>
				<tr>
					<td align="right" width="25%" bgcolor="antiquewhite">添加时间:</td>
					<td align="left"><input type="text" name="stime" value="<?php echo(strftime("%Y-%m-%d %H:%M:%S")); ?>"  readonly size="24"/></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">商品价格:</td>
					<td align="left"><input type="text" name="sprice" /></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">新旧程度:</td>
					<td align="left"><input type="text" name="oldnew" /></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">保修:</td>
					<td align="left"><input type="text" name="repaired" /></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">发票:</td>
					<td align="left"><input type="text" name="invoice" /></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">运费:</td>
					<td align="left"><input type="text" name="carriage" /></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">支付方式:</td>
					<td align="left"><input type="text" name="pmode" /></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">送货方式:</td>
					<td align="left"><input type="text" name="dmode" /></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite" width="25%">图片文件:</td>
					<td align="left"><input type="text" name="goodsimage" /></td>
				</tr>
				<tr>
					<td align="right" bgcolor="antiquewhite">商品描述：</td>
					<td align="left"><textarea rows="3" name="adetail" cols="40"></textarea></td>
				</tr>
				<tr>
					<td align="center" colspan="2" bgcolor="antiquewhite" height="30"><input type="submit" value="确定" ></td>
				</tr>
				<tr>
					<td align="center" colspan="2" bgcolor="antiquewhite">
						<iframe frameborder="2" height="40" width="100%" scrolling="no" src="upload.php"></iframe>
						<input type="hidden" name="upimage" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>
