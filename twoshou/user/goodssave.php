<meta http-equiv="content-type" content="text/html; charset=HZ-GB-2312" />
<?php
	include('isuser.php');
	session_start();
?>
<html>
	<head>
		<title>保存商品</title>
	</head>
	<body>
		<?php
			$straction=$_GET["action"];
			include('..\class\goods.php');
			$obj=new goods();
			$obj->goodsname=$_POST["aname"];
			$obj->typeid=$_POST["typeid"];
			$obj->saleorbuy=intval($_POST["flag"])+1;
			$obj->goodsdetail=$_POST["adetail"];
			$obj->price=$_POST["sprice"];
			$obj->starttime=$_POST["stime"];
			$obj->oldnew=$_POST["oldnew"];
			$obj->invoice=$_POST["invoice"];
			$obj->repaired=$_POST["repaired"];
			$obj->carriage=$_POST["carriage"];
			$obj->paymode=$_POST["pmode"];
			$obj->delivermode=$_POST["dmode"];
			$obj->ownerid=$_SESSION["user_id"];
			
			if($straction=="edit"){
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