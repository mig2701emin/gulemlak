<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ticaret Meclisi - Ev Konut Arsa İşyeri Satılık Kiralık</title>
<link rel="stylesheet" href="stil1.css" type="text/css" media="all">
<?php
session_start();
if(!empty($_SESSION["kld"]) and $_SESSION["yetki"]==11){
include("baglanti.php");
?>
<style type="text/css">
body {
	background-image: url(logo.png);
	font-family: Arial, Helvetica, sans-serif;
}
</style>

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
include("baglanti.php");
if($_POST){
	if(!empty($_POST["bty"])){
$kulad=$_POST["kulad"];
$parola=$_POST["parola"];
$ad=$_POST["ad"];
$soyad=$_POST["soyad"];
		$sql1="update yonetici set kulad='$kulad' ,parola='$parola', ad='$ad', soyad='$soyad'";
		$sorgu1=@mysql_query($sql1);
		if(!$sorgu1){
			echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Kayıt Başarıyla EklendiBir Hata Oluştu<br><a href=yonetici.php target=_top>GERİ DÖN</a></div>";
		}else{
			echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Güncelleme Başarıyla Tamamlandı...</div>";echo "<META HTTP-EQUIV=Refresh CONTENT='1;URL=yonetici.php'>";
		}
	}
}
?>
</center>
</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.<META HTTP-EQUIV=Refresh CONTENT='2;URL=labgiris.php'>";}
ob_end_flush(); ?>