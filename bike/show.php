

<?php
	include('class\customer.php');
	$objcustomer=new customer;
	$pagesize=5;
	$pageno=(int)$_GET['page'];
	$customercount = $objcustomer->getcount();
	//echo($customercount);
	if($pageno<1){
		$pageno=1;
	}
	
	if($customercount){
		if($customercount<$pagesize){
			$pagecount=1;
		}
		
		if($customercount%$pagesize){
			$pagecount=(int)($customercount/$pagesize)+1;
		}else{
			$pagecount=$customercount/$pagesize;
		}
	}
	else{
		$pagecount=0;
	}
	//echo($pagecount);
	//echo($customercount);
	
	if($pageno>$pagecount){
		$pageno=$pagecount;
	}
	//include_once('class\customer.php');
	include('function.php');
	
	
	

	
	//include_once('function.php');
?>

<html>
	<head>
		<script>
			function newwin(url){
				var newwin=window.open(url,"newwin","toolbar=no,location=no,directories=no,status=no,scrollbars=yes,resizable=yes,width=500,height=400");
				newwin.focus();
				return false;
			}
		</script>
	</head>
	<body>
		<h2>[<a target="_blank" href="newrecord.php" onclick="return newwin(this.href)">添加记录</a>]</h2>
		<table>
			<tr>
				<td height="160" class="main"><?php showrecord($pageno,$pagesize); ?></td>
			</tr>
			<tr>
				<td height="15" class="main" >   <?php showpage($pagecount,$pageno); ?></td>
			</tr>
		</table>
    </body>
</html>

