<?php ob_start();session_start(); if($_SESSION["kld"]){?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ticaret Meclisi - Ev Konut Arsa İşyeri Satılık Kiralık</title>
<style type="text/css">
body {
	background-image: url(logo.png);
	font-family: Arial, Helvetica, sans-serif;
}
</style>

</head>
<body>
<div align="center" id="yon" style="color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;">
<?php
	echo"Teşekkürler Yönlendiriliyorsunuz";
	if($_SESSION["yetki"]==11){
		session_destroy();
		echo "<META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";
	}
?>
</div>
</body>
</html>
<?php } ob_end_flush(); ?>