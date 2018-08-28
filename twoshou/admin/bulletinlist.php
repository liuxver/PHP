<?php
	include('isadmin.php');
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=HZ-GB-2312" />
		<title>公告管理</title>
		<link href="../css/style.css" rel="stylesheet" />
		
	</head>
	<body link="black" vlink="red">
		<form name="form1" method="post">
			<?php
				include('..\class\bulletin.php');
				$obj=new bulletin();
				$result=$obj->getbulletinlist();
				$exist=false;
			?>
			<p align="center"><font style="font-size: 10pt;" color="black"><b>公告管理</b></font></p>
			<table align="center" border="2" cellspacing="2" width="100%" bordercolorlight="red" bordercolordark="blue" style="font-size: 10pt;">
				<tr>
					<td width="50%" align="center" bgcolor="antiquewhite"><strong>题目</strong></td>
					<td width="30%" align="center" bgcolor="antiquewhite"><strong>时间</strong></td>
					<td width="10%" align="center" bgcolor="antiquewhite"><strong>修改</strong></td>
					<td width="10%" align="center" bgcolor="antiquewhite"><strong>选择</strong></td>
				</tr>
				<?php
					while($row=$result->fetch_row()){
						$exist=true;
				?>
				<tr>
					<td><a href="../bulletinview.php?id=<?php echo($row[0]); ?>" onclick="return bulletinwin(this.href)"><?php echo($row[1]); ?></a></td>
					<td align="center"><?php echo($row[3]); ?></td>
					<td align="center"><a href="bulletinedit.php?id=<?php echo($row[0]); ?>" onclick="return bulletinwin(this.href)">修改</a></td>
					<td align="center"><input type="checkbox" name="bulletin" id="<?php echo($row[0]); ?>" style="font-size: 10pt;"></td>
				</tr>
				<?php
					}
					if($exist==false){
						print "<tr><td colspan=5 align=center>没有公告信息啊旭哥哥！</td></tr></table>";
					}
				?>
			</table>
			<p align="center">
				<input type="button" value="添加公告" onclick="bulletinwin('bulletinadd.php')" name="add" />&nbsp;&nbsp;
				<input type="button" value="全选" onclick="sltall()" name="button1" />&nbsp;&nbsp;
				<input type="button" value="清空" onclick="sltnull()" name="button2" />&nbsp;&nbsp;
				<input type="submit" value="删除" onclick="selectchk()" name="tijiao"/>
				
			</p>
			<br />
			<br />
			<input type="hidden" name="bulletin" />
		</form>
	</body>
	<script language="JavaScript">
			function bulletinwin(url){
				var oth="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,left=200,top=200,width=400,height=300";
				var bulletinwin=window.open(url,"bulletinwin",oth);
				bulletinwin.focus();
				return false;
			}	
			
			function selectchk(){
				var s=false;
				var bulletinid,n=0;
				var strid,strurl;
				var input = document.getElementsByName("bulletin");
				//var nn=self.document.all.item("bulletin");
				for(i=0;i<input.length;i++){
					if(input[i].checked){
						n=n+1;
						s=true;
						bulletinid=input[i].id+"";
						if(n==1){
							strid=bulletinid;
						}else{
							strid=strid+","+bulletinid;
						}
					}
				}
				strurl="bulletindelete.php?id="+strid;
				alert(strurl);
				if(!s){
					alert("选择你要删除的项目啊，亲！");
					return false;
				}
				if(confirm("你确定要删除这些项目吗？亲爱的旭哥哥！")){
					form1.action=strurl;
					form1.submit();
				}
			}
			
			function sltall(){
				/*
				var nn=self.document.all.item("bulletin");
				for(j=0;j<nn.length;j++){
					self.document.all.item("bulletin",j).checked=true;
				}
				alert("love");*/
				
				var input = document.getElementsByName("bulletin");
 				for (var i=0;i<input.length ;i++ ){
 			   		// if(input[i].type=="checkbox"){
 						input[i].checked = true;
 					//}
 				}
 				//alert("love");
			}
		
			function sltnull(){
				/*var nn=self.document.all.item("bulletin");
				for(j=0;j<nn.length;j++){
					self.document.all.item("bulletin",j).checked=false;
				}*/
				var input = document.getElementsByTagName("input");
 				for (var i=0;i<input.length ;i++ ){
 			   		 if(input[i].type=="checkbox"){
 						input[i].checked = false;
 					}
 				}
 				//a
			}
		</script>
</html>
