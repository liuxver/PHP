<html>
	<head>
		<title>保存记录信息</title>
		
	</head>
	<body>
<?php
	    date_default_timezone_set('Asia/Chongqing');
	    include('class\customer.php');
	    
	    $objcontent=new customer;
	    
	    $objcontent->name=$_POST["name"];
	    $objcontent->phone=$_POST["phone"];
	    $objcontent->record=$_POST["record"];
	    
	    $num=$_POST["number"];
	    $objcontent->number=$_GET["number"];
	    
	    
	    if($objcontent->number==0){
	    	$objcontent->number=$num;
	    }
	    //echo($num);
	    //echo($objcontent->name);
	    echo($objcontent->number."<br>".$objcontent->name."<br>".$objcontent->phone."<br>".$objcontent->record."<br>");
	    $objcontent->insert();
	    echo("<h2>信息已经保存！</h2>");
?>
	</body>
	<script language="JavaScript">
	//打开此脚本的网页将被刷新
		opener.location.reload();
	//停留800毫秒以后关闭窗口
	    setTimeout("window.close()",800);
	</script>
</html>