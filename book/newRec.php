<html>

<head>
<style>
<!--
.main        { font-size: 9pt }
-->
</style>
<script Language="JavaScript">
function ChkFields() {
	if (document.formadd.name.value=='') {
		window.alert ("请输入姓名！");
		formadd.name.focus();
		return false
	}
	if (document.formadd.Subject.value=='') {
		window.alert ("请输入主题！");
		formadd.Subject.focus();
		return false
	}
	if (document.formadd.Subject.value.length>50) {
		window.alert ("主题超长！");
		formadd.Subject.focus();
		return false
	}
	if (document.formadd.Words.value.length>1000) {
		window.alert ("留言内容超长！");
		formadd.Words.focus();
		return false
	}

	return true
}

</script>

<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>添加新留言</title>
</head>


<p align="center">添加新留言（*为必填项）</p>

<?PHP
	// 获取上级留言的编号
	$UpperId = (int)$_GET['UpperId'];  
	?>

<form method="POST" action="recSave.php?UpperId=<?PHP echo($UpperId); ?>" name="formadd" onsubmit = "return ChkFields()">
 <table align="center" border="1" cellpadding="1" cellspacing="1" width="473" bordercolor="#008000" bordercolordark="#FFFFFF" height="108">
      <tr>
        <td align=left bgcolor="#FFCCFF" width="77" height="24" class="main">
		您的姓名<font color="#FF0000">*</font></td>
		<td width="380" height="24" class="main">
		<input name="name" size="51"></td>
	  </tr>
	  <tr>
	    <td align=left bgcolor="#FFCCFF" width="77" height="23" class="main">
		电子邮件</td>
        <td width="380" height="23" class="main">
		<input name="email" size="51"></td>
      </tr>
	  <tr>
	    <td align=left bgcolor="#FFCCFF" width="77" height="23" class="main">
		主页地址</td>
        <td width="380" height="23" class="main">
		<input name="homepage" size="51"></td>
      </tr>
	  <tr>
	    <td align=left bgcolor="#FFCCFF" width="77" height="23" class="main">留言标题<font color="#FF0000">*</font></td>
        <td width="380" height="23" class="main"><input name="Subject" size="51"></td>
      </tr>
      <tr>
	    <td align=left bgcolor="#FFCCFF" width="77" height="43" class="main" valign="top">具体内容<font color="#FF0000">*</font></td>
        <td width="380" height="43" class="main" valign="top"><textarea rows="4" name="Words" cols="50"></textarea></td>
      </tr>
		<tr>
	    <td align=left bgcolor="#FFCCFF" width="165" class="main" valign="top">请选择头像</td>
        <td width="292"  class="main" valign="top"><select size="1" name="logo" onChange="showlogo()">
            <option selected value="1">1</option>
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
          </select>&nbsp;&nbsp; <img src="images/1.gif" name="img">
        <script language="javascript">  
          
		  function showlogo(){
		    document.images.img.src = "images/" + document.formadd.logo.options[document.formadd.logo.selectedIndex].value + ".gif";
		  }
		</script>
       </td>
      </tr>
  </table> 
  <p align="center"><input type="submit" value="提交" name="B1"><input type="reset" value="全部重写" name="B2"></p>
</form>
<p align="center">　</p>

</body>

</html>