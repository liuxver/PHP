function name_check(obj)
{
	if(obj.name.value==""){
		alert("输入姓名");
		return false;
	}
	if(obj.password.value==""){
		alert("输入密码");
		return false;
	}
	return true;
}
