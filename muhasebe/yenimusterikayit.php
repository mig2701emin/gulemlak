<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ticaret Meclisi - Ev Konut Arsa İşyeri Satılık Kiralık</title>
<link rel="stylesheet" href="stil1.css" type="text/css" media="all">
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
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
</head>

<body>
<br>
<br>
<br>
<br>
<p><center>
  <a href="anamenu.php"><img src="baslik.png" alt="" name="" width="253" height="50" align="middle" /></a>
</center></p>
<?php
if(!empty($_POST["bt"])){//Yeni müşteri kaydı için
	if(!empty($_POST["tc"])){$tc=$_POST["tc"];} else {$tc=0;}
	$ad=$_POST["ad"];
	$soyad=$_POST["soyad"];
	$tel=$_POST["tel"];
	$sql="insert into musteri(tc,ad,soyad,tel) values($tc,'$ad', '$soyad', '$tel')";
	$sorgu=mysql_query($sql);
	if(!$sorgu){echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Veritabanına kayıt eklenemedi</div><META HTTP-EQUIV=Refresh CONTENT='1;URL=yenimusteri.php'>";}
	else{echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Kayıt Başarıyla Eklendi</div> <META HTTP-EQUIV=Refresh CONTENT='1;URL=anamenu.php'>";
	}
}

if(!empty($_POST["btup"])){//Müşteri güncelleme için
	if(!empty($_POST["tc"])){$tc=$_POST["tc"];} else {$tc=0;}
	$id=$_POST["id"];
	$ad=$_POST["ad"];
	$soyad=$_POST["soyad"];
	$tel=$_POST["tel"];
	$sql="update musteri set tc=$tc, ad='$ad', soyad='$soyad', tel='$tel' where id=$id";
	$sorgu=mysql_query($sql);
	if(!$sorgu){echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Veritabanına kayıt eklenemedi</div><META HTTP-EQUIV=Refresh CONTENT='1;URL=musterirapor.php'>";}
	else{echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Kayıt Başarıyla Güncellendi.</div> <META HTTP-EQUIV=Refresh CONTENT='1;URL=musterirapor.php'>";
	}
}

?>
</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>