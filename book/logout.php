<?PHP
	session_start();
	unset($_SESSION['Passed']);
	unset($_SESSION['UserName']);
	unset($_SESSION['ShowName']);

	header("Location: index.php");
?>
