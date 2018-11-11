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
	$satad=$_POST["satad"];
	if(!empty($_POST["sattc"])){$sattc=$_POST["sattc"];} else {$sattc=" ";}
	$sattel=$_POST["sattel"];
	if(!empty($_POST["adres1"])){$adres1=$_POST["adres1"];} else {$adres1=" ";}
	if(!empty($_POST["iban"])){$iban=$_POST["iban"];} else {$iban=" ";}
	$alad=$_POST["alad"];
	if(!empty($_POST["altc"])){$altc=$_POST["altc"];} else {$altc=" ";}
	$altel=$_POST["altel"];
	if(!empty($_POST["adres2"])){$adres2=$_POST["adres2"];} else {$adres2=" ";}
	if(!empty($_POST["adres3"])){$adres3=$_POST["adres3"];} else {$adres3=" ";}
	$aylik1=$_POST["aylik1"];
	if(!empty($_POST["aylik2"])){$aylik2=$_POST["aylik2"];} else {$aylik2=" ";}
	if(!empty($_POST["yillik1"])){$yillik1=$_POST["yillik1"];} else {$yillik1=0;}
	if(!empty($_POST["yillik2"])){$yillik2=$_POST["yillik2"];} else {$yillik2=" ";}
	$sekil=$_POST["sekil"];
	if(!empty($_POST["depozito"])){$depozito=$_POST["depozito"];} else {$depozito=0;}
	if(!empty($_POST["artis"])){$artis=$_POST["artis"];} else {$artis=" ";}
	$muddet=$_POST["muddet"];
	if(!empty($_POST["suan"])){$suan=$_POST["suan"];} else {$suan=" ";}
	$basi=$_POST["basi"];
	if(!empty($_POST["neicin"])){$neicin=$_POST["neicin"];} else {$neicin=" ";}
	$mahkeme=$_POST["mahkeme"];
	if(!empty($_POST["ozelsart"])){$ozelsart=$_POST["ozelsart"];} else {$ozelsart=" ";}

	$sql="insert into kirasozlesme(tarih, cinsi, adres, satad, sattc, sattel, adres1, iban, alad, altc, altel, adres2, adres3, aylik1, aylik2, yillik1, yillik2, sekil, depozito, artis, muddet, suan, basi, neicin, mahkeme, ozelsart) values('$tarih', '$cinsi', '$adres', '$satad', '$sattc', '$sattel', '$adres1', '$iban', '$alad', '$altc', '$altel', '$adres2', '$adres3', $aylik1, '$aylik2', $yillik1, '$yillik2', '$sekil', $depozito, '$artis', '$muddet', '$suan', '$basi', '$neicin', '$mahkeme', '$ozelsart')";
	$sorgu=mysql_query($sql);
	if(!$sorgu){echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Veritabanına kayıt eklenemedi.</div><META HTTP-EQUIV=Refresh CONTENT='50;URL=yenikirasozlesme.php'>";}
	else{echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Kayıt Başarıyla Eklendi</div> <META HTTP-EQUIV=Refresh CONTENT='1;URL=anamenu.php'>";
	}
}

if(!empty($_POST["btup"])){//Sözleşme güncelleme için
$tarih=date("Y-m-d");
$id=$_POST["id"];
	if(!empty($_POST["cinsi"])){$cinsi=$_POST["cinsi"];} else {$cinsi=" ";}
	if(!empty($_POST["adres"])){$adres=$_POST["adres"];} else {$adres=" ";}
	$satad=$_POST["satad"];
	if(!empty($_POST["sattc"])){$sattc=$_POST["sattc"];} else {$sattc=" ";}
	$sattel=$_POST["sattel"];
	if(!empty($_POST["adres1"])){$adres1=$_POST["adres1"];} else {$adres1=" ";}
	if(!empty($_POST["iban"])){$iban=$_POST["iban"];} else {$iban=" ";}
	$alad=$_POST["alad"];
	if(!empty($_POST["altc"])){$altc=$_POST["altc"];} else {$altc=" ";}
	$altel=$_POST["altel"];
	if(!empty($_POST["adres2"])){$adres2=$_POST["adres2"];} else {$adres2=" ";}
	if(!empty($_POST["adres3"])){$adres3=$_POST["adres3"];} else {$adres3=" ";}
	$aylik1=$_POST["aylik1"];
	if(!empty($_POST["aylik2"])){$aylik2=$_POST["aylik2"];} else {$aylik2=" ";}
	if(!empty($_POST["yillik1"])){$yillik1=$_POST["yillik1"];} else {$yillik1=0;}
	if(!empty($_POST["yillik2"])){$yillik2=$_POST["yillik2"];} else {$yillik2=" ";}
	$sekil=$_POST["sekil"];
	if(!empty($_POST["depozito"])){$depozito=$_POST["depozito"];} else {$depozito=0;}
	if(!empty($_POST["artis"])){$artis=$_POST["artis"];} else {$artis=" ";}
	$muddet=$_POST["muddet"];
	if(!empty($_POST["suan"])){$suan=$_POST["suan"];} else {$suan=" ";}
	$basi=$_POST["basi"];
	if(!empty($_POST["neicin"])){$neicin=$_POST["neicin"];} else {$neicin=" ";}
	$mahkeme=$_POST["mahkeme"];
	if(!empty($_POST["ozelsart"])){$ozelsart=$_POST["ozelsart"];} else {$ozelsart=" ";}

	$sql="update kirasozlesme set tarih='$tarih', cinsi='$cinsi', adres='$adres', satad='$satad', sattc='$sattc', sattel='$sattel', adres1='$adres1', iban='$iban', alad='$alad', altc='$altc', altel='$altel', adres2='$adres2', adres3='$adres3', aylik1=$aylik1, aylik2='$aylik2', yillik1=$yillik1, yillik2='$yillik2', sekil='$sekil', depozito=$depozito, artis='$artis', muddet='$muddet', suan='$suan', basi='$basi', neicin='$neicin', mahkeme='$mahkeme', ozelsart='$ozelsart' where id=$id";
	$sorgu=mysql_query($sql);
	if(!$sorgu){echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Veritabanına kayıt eklenemedi.</div><META HTTP-EQUIV=Refresh CONTENT='50;URL=kirasozrapor.php'>";}
	else{echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Kayıt Başarıyla Güncellendi.</div> <META HTTP-EQUIV=Refresh CONTENT='1;URL=kirasozrapor.php'>";
	}
}


?>
</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>