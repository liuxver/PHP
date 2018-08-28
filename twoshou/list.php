<html>
	<head>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
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
	<body>
		<center>
			<table border="2" width="760" cellspacing="0" cellpadding="0">
				<tr>
					<td height="80"><a href="img/title.jpg"><img src="img/title.jpg" border="2" height="100"></a></td>
				</tr>
				<tr>
					<td bgcolor="antiquewhite" height="19" valign="middle" align="left">
					<?php
						$tid=intval($GET["tid"]);
						$flag=intval($_GET["flag"]);
						if($flag==0){
					?>
					<b>转让信息</b>&nbsp;&nbsp;<a href="left.php?flag=1&tid=<?php echo($tid); ?>">求购信息</a>
					<?php
						}else{
					?>
					<a href="list.php?flag=0&tid=<?php echo($tid); ?>">转让信息</a>&nbsp;&nbsp;<b>求购信息</b>
					<?php } ?>
					</td>
				</tr>
				<tr>
					<td width="16%" valign="top" align="left" bgcolor="antiquewhite">
						<table border="2" width="100%" cellspacing="1" bgcolor="antiquewhite" bordercolorlight="red" bordercolordark="blue">
							<tr>
								<td valign="top" colspan="2" align="center">
									<table border="2" width="100%" cellspacing="0" bordercolorlight="red" bordercolordark="blue">
										<tr>
											<td colspan="6" bgcolor="antiquewhite">
												<p align="center"><font color="crimson"><b>【商品信息-
											<?php
												include('class\goodstype.php');
												$objtype=new goodstype();
												$objtype->getgoodstypeinfo($tid);
												echo($objtype->typename);
											?>
												</b></font></p>
											</td>
										</tr>
										<tr>
											<td colspan="6" bgcolor="antiquewhite">
												<center>
													<input type="button" value="我要转让" onclick="newwin('user/goodsadd.php?flag=0&tid=<?php echo($tid); ?>')"  name=add/>&nbsp;&nbsp;
													<input type="button" value="我要求购" onclick="newwin('user/goodsadd?flag=1&tid=<?php echo($tid); ?>')" name=add/>
												</center>
											</td>
										</tr>
										<tr>
											<td align="center" width="15%" bgcolor="antiquewhite">商品图片</td>
											<td align="center" width="15%" bgcolor="antiquewhite">商品名称</td>
											<td align="center" width="15%" bgcolor="antiquewhite">价格</td>
											<td align="center" width="15%" bgcolor="antiquewhite">新旧程度</td>
											<td align="center" width="15%" bgcolor="antiquewhite">卖家</td>
											<td align="center" width="15%" bgcolor="antiquewhite">发布时间</td>
										</tr>
										<?php
											if($flag==0){
												$cond=" where saleorbuy=1";
											}else{
												$cond=" where saleorbuy=2";
											}
											
											//查看类型
											if($tid>0){
												$cond=$cond." and typeid=".$tid;
											}
											
											$cond=$cond." and isover=0";//未结束的商品
											
											
											include('class\goods.php');
											$obj=new goods();
											$result=$obj->getgoodslist($cond);
											$m=0;
											while($row=$result->fetch_row()){
										?>
										<tr>
											<td align="center" bgcolor="antiquewhite">
											<?php
												if($row[5]==""){
											?>
												<img src="img/noImg.jpg" height="50" border="2" />
											<?php
											}else{
											?>
												<img src="user/img/<?php echo($row[5]); ?>" height="50" border="2" />
											<?php
											}
											?>
											</td>
											<td align="center" bgcolor="antiquewhite" ><a href="goodsview.php?gid=<?php echo($row[0]); ?>" target=_blank><?php echo($row[3]); ?></a></td>
											<td align="center" bgcolor="antiquewhite"><?php echo($row[6]); ?></td>
											<td align="center" bgcolor="antiquewhite"><?php echo($row[6]); ?></td>
											<td align="center" bgcolor="antiquewhite"><a href="user//userview.php?uid=<?php echo($row[15]); ?>" target=_blank><?php echo($row[15]); ?></a></td>
											<td bgcolor="antiquewhite" align="center"><?php echo($row[7]); ?></td>
										</tr>
										<?php
											$m=$m+1;
										}
										
										if($m==0){
											print "<tr><td bgcolor=#FFFFFF align=center colspan=6>没有商品信息</td></tr>";
										}
										?>
										
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>