<html>
	<head>
		<title>保存留言信息</title>
		
	</head>
	<body>
<?php
	    date_default_timezone_set('Asia/Chongqing');
	    include('class\content.php');
	    
	    $objcontent=new content;
	    
	    $objcontent->username=$_POST["name"];
	    $objcontent->subject=$_POST["subject"];
	    $objcontent->words=$_POST["words"];
	    $objcontent->email=$_POST["email"];
	    $objcontent->homepage=$_POST["homepage"];
	    $objcontent->face=$_POST["logo"];
	    
	    
	    $objcontent->upperid=$_GET["upperid"];
	    
	    
	    if($objcontent->upperid==""){
	    	$objcontent->upperid=0;
	    }
	    
	    $now=getdate();
	    $objcontent->createtime=$now['year']."-".$now['mon']."-".$now['mday']."  ".$now['hours'].":".$now['minutes'].":".$now['seconds'];
	    
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