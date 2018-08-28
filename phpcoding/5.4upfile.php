<html>
	<head>
		<title>文件上传</title>
	</head>
	<body>
		<font style="font-family: '宋体';font-size:20pt;">
			<?php
				date_default_timezone_set("Asia/Chongqing");
				$upload_dir=getcwd()."\\images\\";
				if(!is_dir($upload_dir)){
					mkdir($upload_dir);
				}
				function makefilename(){
					$curtime=getdate();
					$filename=$curtime['year'].$curtime['mon'].$curtime['mday'].$curtime['hours']
					          .$curtime['minutes'].$curtime['seconds'].".jpg";
					return $filename;
				}
				$newfilename=makefilename();
				$newfile=$upload_dir.$newfilename;
				if(file_exists($_FILES['file1']['tmp_name'])){
					move_uploaded_file($_FILES['file1']['tmp_name'],$newfile);
				}
				else{
					echo("error!");
				}
				echo("客户端文件名：".$_FILES['file1']['name']."<BR>");
				echo("文件类型：".$_FILES['file1']['type']."<BR>");
				//echo("文件大小：".$_FILES['file1'['size']."<BR>"]);
				echo("服务器临时文件名：".$_FILES['file1']['tmp_name']."<BR>");
				echo("上传后的新文件名：".$newfile."<BR>");
			?>
			
			文件上传成功[<a href=#  onclick=history.go(-1)>继续上传</a>]
			<br />
			<br />
			<img border="5" src="images/<?php echo($newfilename);?>"/>
		</font>
	</body>
</html>