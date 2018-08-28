<meta http-equiv="content-type" content="text/html; charset=HZ-GB-2312" />
<?php
	include('isadmin.php');
	session_start();
?>
<html>
	<head>
		<title>保存商品</title>
	</head>
	<body>
		<?php
			$flag=$_GET["flag"];
			include('..\class\goods.php');
			$obj=new goods();
			$obj->goodsname=$_POST["aname"];
			$obj->typeid=$_POST["typeid"];
			
			$obj->goodsdetail=$_POST["adetail"];
			$obj->price=$_POST["sprice"];
			$obj->starttime=$_POST["stime"];
			$obj->num=$_POST["num"];
			
			if($flag==2){
				$gid=$_GET["gid"];
				$obj->update($gid);
			}else{
				$obj->imageurl=$_POST["goodsimage"];
				$obj->insert();
			}
			print "<h3>商品信息保存成功！</h3>";
		?>
	</body>
	<script type="text/javascript">
		opener.location.reload();
		setTimeout("window.close()",600);
	</script>
</html>