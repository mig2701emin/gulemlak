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
if(!empty($_POST["bt"])){//Yeni sözleşme kaydı için
$tarih=date("Y-m-d");
	if(!empty($_POST["cinsi"])){$cinsi=$_POST["cinsi"];} else {$cinsi=" ";}
	if(!empty($_POST["adres"])){$adres=$_POST["adres"];} else {$adres=" ";}
	if(!empty($_POST["ada"])){$ada=$_POST["ada"];} else {$ada=" ";}
	if(!empty($_POST["pafta"])){$pafta=$_POST["pafta"];} else {$pafta=" ";}
	if(!empty($_POST["parsel"])){$parsel=$_POST["parsel"];} else {$parsel=" ";}
	$satad=$_POST["satad"];
	if(!empty($_POST["sattc"])){$sattc=$_POST["sattc"];} else {$sattc=" ";}
$sattel=$_POST["sattel"];
$alad=$_POST["alad"];
	if(!empty($_POST["altc"])){$altc=$_POST["altc"];} else {$altc=" ";}
$altel=$_POST["altel"];
$bedel=$_POST["bedel"];
$pesinat=$_POST["pesinat"];
$mahkeme=$_POST["mahkeme"];
	if(!empty($_POST["ozelsart"])){$ozelsart=$_POST["ozelsart"];} else {$ozelsart=" ";}

	$sql="insert into satissozlesme(tarih, cinsi, adres, ada, pafta, parsel, satad, sattc, sattel, alad, altc, altel, bedel, pesinat, mahkeme, ozelsart) values('$tarih', '$cinsi', '$adres', '$ada', '$pafta', '$parsel', '$satad', '$sattc', '$sattel', '$alad', '$altc', '$altel', $bedel, $pesinat, '$mahkeme', '$ozelsart')";
	$sorgu=mysql_query($sql);
	if(!$sorgu){echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Veritabanına kayıt eklenemedi.</div><META HTTP-EQUIV=Refresh CONTENT='50;URL=yenisatissozlesme.php'>";}
	else{echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Kayıt Başarıyla Eklendi</div> <META HTTP-EQUIV=Refresh CONTENT='1;URL=anamenu.php'>";
	}
}

if(!empty($_POST["btup"])){//Sözleşme güncelleme için
$tarih=date("Y-m-d");
$id=$_POST["id"];
	if(!empty($_POST["cinsi"])){$cinsi=$_POST["cinsi"];} else {$cinsi=" ";}
	if(!empty($_POST["adres"])){$adres=$_POST["adres"];} else {$adres=" ";}
	if(!empty($_POST["ada"])){$ada=$_POST["ada"];} else {$ada=" ";}
	if(!empty($_POST["pafta"])){$pafta=$_POST["pafta"];} else {$pafta=" ";}
	if(!empty($_POST["parsel"])){$parsel=$_POST["parsel"];} else {$parsel=" ";}
	$satad=$_POST["satad"];
	if(!empty($_POST["sattc"])){$sattc=$_POST["sattc"];} else {$sattc=" ";}
$sattel=$_POST["sattel"];
$alad=$_POST["alad"];
	if(!empty($_POST["altc"])){$altc=$_POST["altc"];} else {$altc=" ";}
$altel=$_POST["altel"];
$bedel=$_POST["bedel"];
$pesinat=$_POST["pesinat"];
$mahkeme=$_POST["mahkeme"];
	if(!empty($_POST["ozelsart"])){$ozelsart=$_POST["ozelsart"];} else {$ozelsart=" ";}

	$sql="update satissozlesme set tarih='$tarih', cinsi='$cinsi', adres='$adres', ada='$ada', pafta='$pafta', parsel='$parsel', satad='$satad', sattc='$sattc', sattel='$sattel', alad='$alad', altc='$altc', altel='$altel', bedel=$bedel, pesinat=$pesinat, mahkeme='$mahkeme', ozelsart='$ozelsart' where id=$id";
	$sorgu=mysql_query($sql);
	if(!$sorgu){echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Veritabanına kayıt eklenemedi.</div><META HTTP-EQUIV=Refresh CONTENT='50;URL=satissozrapor.php'>";}
	else{echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Kayıt Başarıyla Güncellendi.</div> <META HTTP-EQUIV=Refresh CONTENT='1;URL=satissozrapor.php'>";
	}
}
?>
</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>