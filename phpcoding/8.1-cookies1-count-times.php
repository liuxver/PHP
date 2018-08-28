<?php
	if(isset($_COOKIE["num"])){
		$num=$_COOKIE["num"];
	}
	else{
		$num=0;
	}
	$num=$num+1;
	setcookie("num",$num,time()+60*60*24*30);
	if($num==4){
		setcookie("num",$num,time()-3600);
	}
?>

<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
			if($num>1){
				echo("您已经是第 ".$num." 次访问本站了！");
			}
			else{
				echo("欢迎您首次访问本站！");
			}
		?>
		<br />
		<br />
		下面是网页正文
		<br />
	</body>
</html>