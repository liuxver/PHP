<meta http-equiv="content-type" content="text/html" charset="utf-8" />
<?php
	if(!isset($_SERVER['PHP_AUTH_USER'])){
		header('www-Authenticate:Basic realm="My Realm"');
		header('HTTP/1.0 401 Unauthorized');
		echo 'Text to send if user hits cancel buttun';
		exit;
	}else{
		echo "<p>hello {$_SERVER['PHP_AUTH_USER']}.</p>";
		echo "{$_SERVER['PHP_AUTH_PW']}.</p>";
	}
?>