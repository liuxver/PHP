<html>
	<head>
		<title>保存文件</title>
	</head>
	<body>
		<?php
			function makefilename(){
				$curtime=getdate();
				$filename=$curtime['year'].$curtime['mon'].$curtime['mday'].$curtime['hours'].$curtime['minutes'].$curtime['seconds'].".jpeg";
				return $filename;
			}
			
			$upload_dir=getcwd()."\\img\\";
			
			if(!is_dir($upload_dir)){
				mkdir($upload_dir);
			}
			$newfilename=makefilename();
			$newfile=$upload_dir.$newfilename;
			if(file_exists($_FILES['file1']['tmp_name'])){
				move_uploaded_file($_FILES['file1']['tmp_name'],$newfile);
			}else{
				echo("error!");
			}
			
			echo("<script>parent.document.form1.goodsimage.value='".$newfilename."'</script>");
			echo("图片上传成功[<a href=# onclick=history.go(-1)>继续上传</a>");
		?>
	</body>
</html>