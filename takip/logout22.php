<?php
		session_start();
		ob_start();
		include_once('config.php');				
		
		if(!isset($_SESSION["login"])){
    header("location: login.php");
}
		
		session_destroy();
		echo "<center>Çıkış Yaptiniz. Giriş Sayfasına Yönlendiriliyorsunuz.</center>";
		header("Refresh: 2; url=login.php");
		ob_end_flush();
	
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>UÇKAN Takip | </title>
</head>
<body>
	
</body>
</html>