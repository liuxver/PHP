function form_check(obj)
{
				if(obj.username.value==""){
					alert("输入姓名！");
					return false;
				}
				if(obj.city.selectedIndex<0){
					alert("输入城市！");
					return false;
				}
				return true;
}
