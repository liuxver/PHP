<?php
	include('isadmin.php');
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=HZ-GB-2312"/>
		<title>商品信息管理界面</title>
		<link rel="stylesheet" href="../css/style.css" />
		<script language="JavaScript">
			function form_onsubmit(obj){
				validationpassed=true;
				if(obj.classid.selectedIndex<0){
					alert("这里我也不清楚应该出现什么！");
					validationpassed=false;
					return validationpassed;
				}//可能有问题{}
				if(obj.txttitle.value==""){
					alert("同样  还是不知道该是啥子东西！");
					validationpassed=false;
					return validationpassed;
				}
			}
			
			function form_onsubmit1(obj){
				validationpassed=true;
				if(obj.txttitle.value==""){
					alert("请输入内容啊宝贝儿！");
					validationpassed=false;
					return validationpassed;
				}
			}
		</script>
	</head>
	<body link="black" vlink="red" >
		<form name="form1" id="form1" method="post">
			<?php
				include('..\class\goodstype.php');
				include('..\class\goods.php');
				$objtype=new goodstype();
				$objgoods=new goods();
				$soperate=$_GET["oper"];
				$operid=$_GET["tid"];
				if($soperate=="delete"){
					if($objgoods->havegoodstype($operid)){
						exit("此分类包含商品信息，不能删除！");
					}
					$objtype->delete($operid);
					exit("删除成功！");
				}elseif($soperate=="add"){
					$name=$_POST["txttitle"];
					if($objtype->havegoodstype($name)){
						exit("已经存在这个商品分类啦啊亲爱的！");
					}else{
						$objtype->typename=$name;
						$objtype->insert();
					}
				}elseif($soperate=="edit"){
					$name=$_POST["txttitle"];
					if($objtype->havegoodstype($name)){
						exit("已经存在这个商品名称啦宝贝儿悦悦！");
					}else{
						$objtype->typename=$name;
						$objtype->update($operid);
					}
				}
			?>
			<p align="center"><font style="font-size: 10pt;"><b>商品分类管理</b></font></p>
			<center>
				<table border="2" cellspacing="2" width="90%" bordercolorlight="red" bordercolordark="blue">
					<tr>
						<td width="30%" align="center" bgcolor="antiquewhite"><strong>分类名称</strong></td>
						<td width="20%" align="center" bgcolor="antiquewhite"><strong>修改</strong></td>
						<td width="20%" align="center" bgcolor="antiquewhite"><strong>删除</strong></td>
					</tr>
					<?php
						$result=$objtype->getgoodstypelist();
						$exist=false;
						while($row=$result->fetch_row()){
							$exist=true;
					?>
					<tr>
						<td><?php echo($row[1]);  ?></td>
						<td align="center"><a href="typelist.php?oper=update&tid=<?php echo($row[0]); ?>&name=<?php echo($row[1]); ?>">修改</a></td>
						<td align="center"><a href="typelist.php?oper=delete&tid=<?php echo($row[0]); ?>&name=<?php echo($row[1]); ?>">删除</a></td>
					</tr>
					<?php  	} ?>
				</table>
				<p align="center">
					<?php
						if(!$exist){
							echo("<tr><td colspan=4 align=center><font style='color:red'>没有分类信息</font></td></tr></table>");
						}
					?>
					
				</p>
			</center>
		</form>
		<?php
			if($soperate=="update"){
				$stitle=$_GET["name"];
		?>
		<form name="uform" method="post" action="typelist.php?tid=<?php echo($operid); ?>&oper=edit">
			<div align="center">
				<input type="hidden" name="sorgtitle" value="<?php echo($stitle); ?>" />
				<font color="black"><b>分类名称</b></font>
				<input type="text" name="txttitle" size="20" value="<?php echo($stitle); ?>" />
				<input type="submit" name="submit" value="修改" />
			</div>
		</form>
	<?php
		}else{
	?>
		<form name="aform" method="post" action="typelist.php?tid=<?php echo($operid); ?>&oper=add">
			<p align="center">
				<font color="red">添加分类：</font>&nbsp;&nbsp;
				<font color="black"><b>分类名称</b></font>
				<input type="text" name="txttitle" size="20"/>
				<input type="hidden" name="supperid" value="0" />&nbsp;&nbsp;
				<input type="submit" name="submit" value="添加" onclick="return form_onsubmit1(this.form)"/>
			</p>
		</form>
	<?php
		}
	?>
	</body>
	<script language="JavaScript">
	//alert("1111111");
		opener.location.reload();
	</script>
</html>