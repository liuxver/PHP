<html>
	<head>
		<style type="text/css">
			.main {font-size: 9pt;}
		</style>
		<script language="JavaScript">
			function chkfields(){
				if(document.formadd.name.value==''){
					window.alert("请输入姓名：");
					formadd.name.focus();
					return false;
				}
				
				if(document.formadd.subject.value==''){
					window.alert("请输入主题：");
					formadd.name.focus();
					return false;
				}
				
				if(document.formadd.subject.length>50){
					window.alert("主题长度过长！");
					formadd.subject.focus();
					return false;
				}
				
				if(document.formadd.words.value.length>1000){
					window.alert("内容过长！");
					formadd.words.focus();
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
		<p align="center">添加新留言</p>
<?php
		$upperid=(int)$_GET['upperid'];
		//var_dump($upperid);
?>
		<form method="post" action="recsave.php?upperid=<?php echo($upperid); ?>" name="formadd" onsubmit="return chkfields()">
			<table align="center" border="1" cellpadding="1" cellspacing="1" width="473" bordercolor="black" bordercolordark="red" height="108" >
				<tr>
					<td align="left" bgcolor="aliceblue" width="77" height="24" class="main">姓名 <font color="red">*</font></td>
					<td width="380" height="24" class="main"> <input name="name" size="51"></td>
				</tr>
				<tr>
					<td align="left" bgcolor="aliceblue" width="77" height="24" class="main">邮箱 <font color="red">*</font></td>
					<td width="380" height="24" class="main"> <input name="email" size="51"></td>
				</tr>
				<tr>
					<td align="left" bgcolor="aliceblue" width="77" height="24" class="main">主页 <font color="red">*</font></td>
					<td width="380" height="24" class="main"> <input name="homepage" size="51"></td>
				</tr>
				<tr>
					<td align="left" bgcolor="aliceblue" width="77" height="24" class="main">主题 <font color="red">*</font></td>
					<td width="380" height="24" class="main"> <input name="subject" size="51"></td>
				</tr>
				<tr>
					<td align="left" bgcolor="aliceblue" width="77" height="100" class="main">内容 <font color="red">*</font></td>
					<td width="380" height="100" class="main"> <textarea name="words" cols="380" rows="15"></textarea></td>
				</tr>
				<tr>
					<td align="left" bgcolor="aliceblue" width="165" class="main" valign="top">请选择头像</td>
					<td width="292" class="main" valign="top" >
						<select size="1" name="logo" onchange="showlogo()">
							<option selected="selected" value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
						</select>
						&nbsp;&nbsp;
						<img src="img/1.gif" name="img" />
						<script language="JavaScript">
							function showlogo(){
								//很重要的部分  选择头像
								document.images.img.src="img/"+document.formadd.logo.options[document.formadd.logo.selectedIndex].value+".gif";
							}
						</script>
					</td>
				</tr>
			</table>
			<p align="center">
				<input type="submit" value="提交" name="b1" />
				<input type="reset" value="重写" name="b2" />
			</p>
		</form>
	</body>	
</html>