<?php
	$value="my cookies value";
	setcookie("testcookies",$value,time()+60*60*24*30);
	
?>

<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
		<?php
			
			if(isset($_COOKIE["testcookies"])){
				echo($_COOKIE["testcookies"]."<br>");
			}
			print_r($_COOKIE);
			echo("dfghjk");
		?>
	</body>
</html>