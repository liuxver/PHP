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
					<td height="80"><img src="img/title.jpg" border="2" width="800" height="100" />  </td>
				</tr>
				<tr>
					<td bgcolor="antiquewhite" height="19" valign="middle" align="left">
					<p>商品信息</p>
					</td>
				</tr>
				<tr>
					<td width="16%" valign="top" align="left" bgcolor="antiquewhite">
						<table border="2" width="100%" cellspacing="1" bordercolorlight="red" bordercolordark="blue" bgcolor="antiquewhite">
							<tr>
								<td valign="top" colspan="2" align="center">
									<table border="2" width="100%" cellspacing="0" bordercolorlight="red" bordercolordark="blue">
										
										<tr>
											<td align="center" width="20%" bgcolor="antiquewhite">商品图片</td>
											<td align="center" width="20%" bgcolor="antiquewhite">商品名称</td>
											<td align="center" width="20%" bgcolor="antiquewhite">价格</td>
											<td align="center" width="20%" bgcolor="antiquewhite">发布时间</td>
											<td align="center" width="10%" bgcolor="antiquewhite">剩余数量</td>
											<td align="center" width="10%" bgcolor="antiquewhite">操作</td>
										</tr>
									<?php
										session_start();
										$tid=$_GET["tid"];
										include('class\goodstype.php');
										include('class\goods.php');
										$obj=new goods();
										$result=$obj->getgoodslist1($tid);
										
										$m=0;
										while($row=$result->fetch_row()){
											
									?>
										<tr>
											<td align="center" bgcolor="antiquewhite">
											<?php if($row[4]==""){ ?>
												<img src="img/noImg.jpg"  height="50" border="2"/>
											<?php
											}else{
											?>
												<img src="admin/img/<?php echo($row[4]); ?>" height="50" border="2" />
											<?php
											}
											?>
											</td>
											<td align="center" bgcolor="antiquewhite"><a href="goodsview.php?gid=<?php echo($row[0]); ?>" target=_blank><?php echo($row[2]); ?></a></td>
											<td align="center" bgcolor="antiquewhite"><?php echo($row[5]); ?></td>
											<td align="center" bgcolor="antiquewhite"><?php echo($row[6]); ?></td>
											<td align="center" bgcolor="antiquewhite"><?php echo($row[7]); ?></td>
											<td align="center" bgcolor="antiquewhite">
											
												<a href="goodsview.php?gid=<?php echo($row[2]); ?>" target=_blank>购买</a>&nbsp;&nbsp;
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