<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=HZ-GB-2312" />
		<link rel="stylesheet" href="" />
	</head>
	<body link="red" vlink="blue">
		<form id="form1" name="form1" method="post">
			<?php
				$soperate=$_GET["oper"];
				include('class\voteitem.php');
				$obj=new voteitem();
				$operid=$_GET["id"];
				if($soperate=="add"){
					$newtitle=$_POST["txttitle"];
					echo($newtitle);
					if($obj->exists($newtitle)){
						echo("已经存在 无法添加！");
					}else{
						$obj->item=$newtitle;
						$obj->insert();
						echo("添加成功！");
					}
				}
				elseif($soperate=="edit"){
					$newtitle=$_POSt["txttitle"];
					$orgtitle=$_POSt["sorgtitle"];
					echo("newtitle:".$newtitle."   orgtitle".$orgtitle);
					if($newtitle<>$orgtitle){
						if($obj->exists($newtitle)){
							echo("已经存在，无法删除！");
						}else{
							$obj->updateitem($newtitle,$operid);
							echo("编辑成功！");
						}
					}
				}elseif($soperate=="delete"){
					$obj->delete($operid);
					echo("删除成功！");
				}
				?>
				<p align="center" ><font style="font-size: 12pt;"><b>投票项目管理界面</b></font></p>
				<table border="1" cellspacing="0" width="90%" bordercolorlight="red" bordercolordark="green" style="font-size: 10pt;">
					<tr>
						<td width="60%" align="center" bgcolor="antiquewhite" ><strong>项目</strong></td>
						<td width="20%" align="center" bgcolor="antiquewhite"><strong>修改</strong></td>
						<td width="20%" align="center" bgcolor="antiquewhite"><strong>选择</strong></td>
					</tr>
			<?php
				$obj=new voteitem();
				$hasdata=false;
				$results=$obj->load_voteitem();
				while($row = $results->fetch_row()) {
					$hasdata=true;
			?>
					<tr>
						<td><?php echo($row[1]); ?></td>
						<td align="center" ><a href="additem.php?oper=update&id=<?php echo($row[0]); ?>&name=<?php echo($row[2]); ?>">修改</a></td>
						<td align="center"><input type="checkbox" name="voteitem" id=<?php echo($row[0]); ?> > </td>             <?php #有可能存在问题 ?>
					</tr>
			<?php
				}
				if(!$hasdata){
			?>
					<tr>
						<td colspan="3" align="center" ><font style="color: red;">目前还没有投票项目！</font></td>
					</tr>
			<?php	} ?>
				</table>
				<p align="center">
					<input type="button" name="revote" value="重新投票" onclick="return newwin('revote.php')" />&nbsp;&nbsp;
			<?php
					if($hasdata){
			?>
						<input type="button" value="全选" onclick="sltall()" />&nbsp;&nbsp;
						<input type="button" value="全不选 " onclick="sltnull()"/>&nbsp;&nbsp;
						<input type="button" value="删除"  onclick="" />
			<?php
					}
			?>
					
				</p>
		</form>
		<?php
			if($soperate=="update"){
				$stitle=$_GET["name"];
		?>
				<form name="ufrom" method="post" action="additem.php?id=<?php echo($operid); ?>&oper=edit">
					<div align="center">
						<input type="hidden" name="sorgtitle" value="<?php echo($stitle); ?>" />
						<font color="pink"><b> <font color="aqua">更新投票项目名称</font></b></font>
						<input type="text" name="txttitle" size="20" value="<?php echo($stitle); ?>" />
						<input type="submit" name="submit"value="添加" />
					</div>
				</form>
		<?php
			}
		
			else{
		?>
			<form name="aform" method="post" action="additem.php?oper=add">
				<div align="center">
					<font color="black"><b><font color="aqua">投票项目名称</font></b></font>
					<input type="text" name="txttitle" size="20" />
					<input type="submit" name="submit" value="添加1"/>
				</div> </form>
		
		<?php
		}
		?>
		<input type="hidden" name="voteitem" />
		<script language="JavaScript">
			function newwin(url){
				var oth="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,left=200,top=200";
				oth=oth+",width=200,height=100";
				var newwin=window.open(url,"newwin",oth);
				newwin.focus();
				return false;
			}
			
			
			function selectchk(){
				var s=false;
				var itemid,n=0;
				var strid,strurl;
				var nn=sele.document.all.item("voteitem");
				for(j=0;j<nn.length-1;j++){
					if(self.document.all.item("voteitem",j).checked){
						n=n+1;
						s=true;
						itemid=self.document.all.item("voteitem",j).id+"";
						if(n==1){
							strid=itemid;
						}else{
							strid=strid+","+itemid;
						}
					}
				}
				strurl="additem.php?oper=delete&id="+strid;
				if(!s){
					alert("请选择要删除的项目！");
					return false;
				}
				
				if(confirm("确定要删除吗？")){
					form1.action=strurl;
					form1.Submit();
				}
			}
			
			function sltall(){
				var nn=self.document.all.item("voteitem");
				for(j=0;j<nn.length;j++){
					self.document.all.item("voteitem",j).checked=true;
				}
			}
			
			function sltnull(){
				var nn=self.document.all.item("voteitem");
				for(j=0;j<nn.length;j++){
					self.document.all.item("voteitem",j).checked=false;
				}
			}
			
			
		</script>
	</body>
</html>




