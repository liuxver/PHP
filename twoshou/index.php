<html>
	<head>
		<?php session_start(); ?>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<meta http-equiv="content-type" content="text/html; charset=HZ-GB-2312" />
		<title>网站主页</title>
	</head>
	<body>
		<center>
			<table border="2" width="800" cellpadding="0" cellspacing="0">
				<tr>
					<td colspan="3" height="80"><img src="img/title.jpg" width="800" height="100" border="2"</td>
				</tr>
				<tr>
					<td colspan="2" bgcolor="antiquewhite" height="19" valign="middle" align="left">
						选择商品分类
						<?php
							include('class\goodstype.php');
							$gtype=new goodstype();
							$result=$gtype->getgoodstypelist();
							while($row=$result->fetch_row()){
						?>
								<font color="#0000FF">|</font>&nbsp;<a href="list.php?tid=<?php echo($row[0]); ?>" target="_blank"><?php echo($row[1]); ?></a>&nbsp;
						<?php
							}
						?>
					</td>
					<td bgcolor="antiquewhite" height="19" valign="middle" align="right"></td>
				</tr>
				<tr>
					<td width="200" valign="top" align="left"><?php include("left.php"); ?></td>
					<td width="100%" valign="top" align="center">
						<table border="2" width="100%" cellspacing="0" cellpadding="0" bordercolorlight="red" bordercolordark="blue">
							<tr>
								<td width="100%" bgcolor="burlywood" height="18" align="left">最近上线的商品！</td>
							</tr>
							<tr>
								<td width="100%" valign="top" align="top" height="1"></td>
							</tr>
							<table border="2" width="100%" cellspacing="0" bordercolorlight="red" bordercolordark="blue" >
								<tr>
									<?php
										$objgoods=new goods();
										$result=$objgoods->gettopnnewgoods(16);
										$i=0;
										while($row=$result->fetch_row()){
											
									?>
									<td valign="top" width="25%" align="left" bgcolor="antiquewhite">
										<p align="center">
									<?php
											if(!isset($row[5])||trim($row[5])==""){
									?>
										<img border="2" src="img/noImg.jpg" height="110" />
									<?php
										}else{
									?>
										<a href="goodsview.php?gid=<?php echo($row[0]); ?>" target=_blank;>
											<img border="2" src="user/img/<?php echo($row[5]); ?>" width="100" height="110" />
										</a>
									<?php
										}
									?>
									 
										<br />
										商品名称：<a href="goodsview.php?gid=<?php echo($row[0]); ?>" target=_blank ><?php echo($row[3]); ?></a><br />
										交易类型：
									<?php
										if($row[2]==1){
									?>
										转让
									<?php
										}else{
									?>
										求购
									<?php
									}
									?>
										<br />
										所有者：<?php echo($row[15]); ?>
										价格：<?php echo($row[6]); ?>
										发布时间:<?php echo($row[7]); ?>
										</p>
									</td>
									<center>
										<?php
											if($i%4==3){
										?>
											</tr><tr>
										<?php
											}
										$i++;
										}
										if($i==0){
										?>
										<td width="100%" valign="top" align="left" bgcolor="antiquewhite">没有商品信息！</td>
									</center>
									<?php
										}
									?>
								</tr>
							</table>
						</table>
					</td>
				</tr>
			</table>
		</center>
	</body>
</html>