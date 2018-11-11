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
if(!empty($_POST["bt"])){//Yeni tahsilat kaydı için
	$tarih=date("Y-m-d");
	if(!empty($_POST["turu"])){$turu=$_POST["turu"];} else {$turu=" ";}
	$tutar=$_POST["tutar"];
	$aciklama=$_POST["aciklama"];
	$sql="insert into masraf(tarih, turu, tutar, aciklama) values('$tarih', '$turu', $tutar, '$aciklama')";
	$sorgu=mysql_query($sql);
	if(!$sorgu){echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Veritabanına kayıt eklenemedi. Virgül kullanmayınız.</div><META HTTP-EQUIV=Refresh CONTENT='1;URL=masrafgir.php'>";}
	else{echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Kayıt Başarıyla Eklendi</div> <META HTTP-EQUIV=Refresh CONTENT='1;URL=masrafrapor.php'>";
	}
}
if(!empty($_POST["btup"])){//Masraf düzeltme için
	$tarih=date("Y-m-d");
	$id=$_POST["id"];
	if(!empty($_POST["turu"])){$turu=$_POST["turu"];} else {$turu=" ";}
	$tutar=$_POST["tutar"];
	$aciklama=$_POST["aciklama"];
	$sql="update masraf set tarih='$tarih', turu='$turu', tutar=$tutar, aciklama='$aciklama' where id=$id";
	$sorgu=mysql_query($sql);
	if(!$sorgu){echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Düzeltme gerçekleşmedi</div><META HTTP-EQUIV=Refresh CONTENT='1;URL=masrafrapor.php'>";}
	else{echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Kayıt Başarıyla Güncellendi</div> <META HTTP-EQUIV=Refresh CONTENT='1;URL=masrafrapor.php'>";
	}
}

?>
</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>