<html>
	<head>
		<link href="../css/style.css" rel="stylesheet" type="text/css" />
		<script language="JavaScript">
			function newwin(url){
				var oth="toolbar=no,loccation=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,left=200,top=100";
				oth=oth+",width=600,height=500";
				var newwin=window.open(url,"newwin",oth);
				newwin.focus();
				return false;
			}
		</script>
		<title>查看我的商品列表</title>
	</head>
	<body>
		<center>
			<table border="2" width="760" cellspacing="0" cellpadding="0">
				<tr>
					<td height="80"><img src="../img/title.jpg" border="2" width="800" height="100" />  </td>
				</tr>
				<tr>
					<td bgcolor="antiquewhite" height="19" valign="middle" align="left">
					<?php
						session_start();
						$flag=intval($_GET["flag"]);
						
						if($flag==0){
							$cond=" where saleorbuy=1";
						}else{
							$cond=" where saleorbuy=2";
						}
						
						if($tid>0){
							$cond=$cond." and ownerid='".$tid;
						}
						
						$uid=$_GET["uid"];
						$cond=$cond." and ownerid='".$uid."'";
						
						include('..\class\users.php');
						$objuser=new users();
						
						$objuser->getusersinfo($uid);
						
						include('..\class\goods.php');
						$obj=new goods();
						$result=$obj->getgoodslist($cond);
						if($flag==0){
					?>
						<b>转让信息</b>&nbsp;&nbsp;<a href="userview.php?flag=1">求购信息</a>
					<?php
					}else{
					?>
						<a href="userview.php?flag=0">转让信息</a>&nbsp;&nbsp;<b>求购信息</b>
					<?php
					}
					?>
					</td>
				</tr>
				<tr>
					<td width="16%" valign="top" align="left" bgcolor="antiquewhite">
						<table border="2" width="100%" cellspacing="1" bordercolorlight="red" bordercolordark="blue" bgcolor="antiquewhite">
							<tr>
								<td valign="top" colspan="2" align="center">
									<table border="2" width="100%" cellspacing="0" bordercolorlight="red" bordercolordark="blue">
										<tr>
											<td colspan="6" bgcolor="antiquewhite">
												<p align="center"><b><?php echo($objuser->name); ?>的商品信息</b></p>
											</td>
										</tr>
										<tr>
											<td align="center" width="14%" bgcolor="antiquewhite">商品图片</td>
											<td align="center" width="20%" bgcolor="antiquewhite">商品名称</td>
											<td align="center" width="10%" bgcolor="antiquewhite">价格</td>
											<td align="center" width="12%" bgcolor="antiquewhite">新旧程度</td>
											<td align="center" width="10%" bgcolor="antiquewhite">发布时间</td>
											<td align="center" width="12%" bgcolor="antiquewhite">操作</td>
										</tr>
									<?php
										$m=0;
										while($row=$result->fetch_row()){
									?>
										<tr>
											<td align="center" bgcolor="antiquewhite">
											<?php if($row[5]==""){ ?>
												<img src="../img/noImg.jpg"  height="50" border="2"/>
											<?php
											}else{
											?>
												<img src="../img/<?php echo($row[5]); ?>" height="50" border="2" />
											<?php
											}
											?>
											</td>
											<td align="center" bgcolor="antiquewhite"><a href="../goodsview.php?gid=<?php echo($row[0]); ?>" target=_blank><?php echo($row[3]); ?></a></td>
											<td align="center" bgcolor="antiquewhite"><?php echo($row[6]); ?></td>
											<td align="center" bgcolor="antiquewhite"><?php echo($row[8]); ?></td>
											<td align="center" bgcolor="antiquewhite"><?php echo($row[7]); ?></td>
											<td align="center" bgcolor="antiquewhite">
											<?php
												if($row[14]==1){
											?>
											已结结束
											<?php
												}else{
													if($row[15]==$_SESSION["user_id"]){
											?>
												<a href="goodsedit.php?gid=<?php echo($row[0]); ?>" target=_blank>修改</a>&nbsp;&nbsp;
												<a href="goodsselt.php?gid=<?php echo($row[0]); ?>" target=_blank>删除</a>&nbsp;&nbsp;
												<a href="goodsover.php?gid=<?php echo($row[0]); ?>" target=_blank>结束</a>
											<?php
													}
												}
											?>
											</td>
										</tr>
										<?php
											$m=$m+1;
										}
										if($m==0){
											echo("<tr><td align=center colspan=6>没有商品信息！</td></tr>");
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