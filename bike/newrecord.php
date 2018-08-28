<html>
	<head>
		<style type="text/css">
			.main {font-size: 9pt;}
		</style>
		<script language="JavaScript">
			function chkfields(){
				if(document.newrecord.name.value==''){
					window.alert("请输入姓名：");
					newrecord.name.focus();
					return false;
				}
				
				if(document.newrecord.number.value==''){
					window.alert("请输入学号：");
					newrecord.number.focus();
					return false;
				}
				
				if(document.newrecord.phone.length==""){
					window.alert("请输入电话！");
					newrecord.phone.focus();
					return false;
				}
				
				if(document.newrecord.record.value.length>1000){
					window.alert("内容过长！");
					newrecord.record.focus();
					return false;
				}
				return true;
			}
		</script>
		<meta http-equiv="content-language" content="zh-cn" />
		<meta http-equiv="content-type" content="text/html; charset=HZ-GB-2312" />
		<meta name="generator" content="Microsoft Frontpage 6.0" />
		<meta name="Progid" content="frontpage.editor.document" />
		<title>添加新留言</title>
	</head>
	<body>
		<p align="center">编辑记录</p>
<?php
		$number=(int)$_GET['number'];
?>
		<form method="post" action="recordsave.php?number=<?php echo($number) ?>;" name="newrecord" onsubmit="return chkfields()">
			<table align="center" border="1" cellpadding="1" cellspacing="1" width="473" bordercolor="black" bordercolordark="red" height="108" >
				<tr>
					<td align="left" bgcolor="aliceblue" width="77" height="24" class="main">学号： <font color="red">*</font></td>
					<td width="380" height="24" class="main"> 
					<?php if($number){ 
						echo($number);
					}else{
					?>
			        <input name="number" size="51">
				    <?php 
					}
					?>                              
						
					</td>
				</tr>
				<tr>
					<td align="left" bgcolor="aliceblue" width="77" height="24" class="main">姓名：<font color="red">*</font></td>
					<td width="380" height="24" class="main"> <input name="name" size="51"></td>
				</tr>
				<tr>
					<td align="left" bgcolor="aliceblue" width="77" height="24" class="main">电话： <font color="red">*</font></td>
					<td width="380" height="24" class="main"> <input name="phone" size="51"></td>
				</tr>
				<tr>
					<td align="left" bgcolor="aliceblue" width="77" height="100" class="main">记录：<font color="red">*</font></td>
					<td width="380" height="100" class="main"> <textarea name="record" cols="380" rows="15"></textarea></td>
				</tr>
			</table>
			<p align="center">
				<input type="submit" value="提交" name="b1" />
				<input type="reset" value="重写" name="b2" />
			</p>
		</form>
	</body>	
</html>