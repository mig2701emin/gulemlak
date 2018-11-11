<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ticaret Meclisi - Ev Konut Arsa İşyeri Satılık Kiralık</title>
<link rel="stylesheet" href="stil1.css" type="text/css" media="all">
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<?php
session_start();
if(!empty($_SESSION["kld"]) and $_SESSION["yetki"]==11){
	include("baglanti.php");
	date_default_timezone_set('Europe/Istanbul');
?>
<style type="text/css">
body {
	background-image: url(logo.png);
}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p><center>
  <a href="anamenu.php"><img src="baslik.png" alt="" name="" width="253" height="50" align="middle" /></a>
</center></p>

    <?php

if(isset($_GET['delete_id'])){	
	$x=$_GET["delete_id"];
	$sql="delete from satissozlesme where id=$x";
	$sorgu=@mysql_query($sql);
	if(!$sorgu){
		echo "<br><center><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Bir Hata Oluştu.</div></center>";
?><META HTTP-EQUIV="Refresh" CONTENT="1;URL=satissozrapor.php"><?php
	}else{
		echo "<br><center><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Silme İşlemi Başarıyla Tamamlandı.</div></center>";
?><META HTTP-EQUIV="Refresh" CONTENT="1;URL=satissozrapor.php"><?php
	}
}
?>


</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>