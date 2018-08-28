<meta http-equiv="content-type" content="text/html" charset="utf-8" />
<?php
    $name1=$_POST['name'];
    $password1=$_POST['password'];
    if($name1=="liuxv"&&$password1=="123456"){
    	echo("登录成功！");
    }
    else{
    	echo("登录失败！");
    }
?>