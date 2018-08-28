<?php
    echo "l love you!";
    define("mydefine","4555");
    echo(mydefine);
    echo("<br/>");
    define(a,44);
    echo(a);
    
    echo("<br/>");
    $a="l love you.";
    $b=&$a;
    echo($b);
    echo($a);
    echo("<br/>");
    $a="l know you are a big hourse.";
    echo($b);
    echo($a);
    echo("<br/>");
    var_dump($a);
    echo("<br/>");
    echo("<br/>");
    echo("<br/>");
  //  $a=~1;
    echo(~0);
    echo("<br/>");
    echo("<br/>");
    echo("<br/>");
    echo("<br/>");
    $a="asdfghj";
    echo mb_strlen("你好","GBK");
    echo("<br/>");
    echo($a[3]);
    echo("<br/>");
    echo("<br/>");
    $str="123456rty12345";
    echo strspn($str,"123456789",2,5);
    echo("<br/>");
    echo strcspn('asdf','dfg');
    echo("<br/>");
    echo("<br/>");
    echo("<br/>");
    $a="toobar=no,location=no,directories=no,status=no,menubar=yes,scrollbars=yes,resizable=yes,left=200,top=200,width=400,height=300";
	
?>
<html>
	<head></head>
	<body>
		<script type="text/javascript">
			function newwin1(urls,wname){
				var a="toobar=yes,location=yes,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,left=200,top=200,width=400,height=300";
				//document.write("444");
				var newwin=window.open(urls,wname,a);
				newwin.focus();
			}
		</script>
		<a href=#  onclick="newwin1('http://www.liuxv.cn','刘旭的网站')">刘旭的网站</a>
	</body>
</html>