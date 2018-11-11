<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
body {
	background-image: url(logo.png);
	font-family: Arial, Helvetica, sans-serif;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ticaret Meclisi - Ev Konut Arsa İşyeri Satılık Kiralık</title>
<link rel="stylesheet" href="stil1.css" type="text/css" media="all">
<?php
include("baglanti.php");
	$sql="select * from yonetici";
	$sorgu=@mysql_query($sql);
	$deger=@mysql_fetch_array($sorgu);
?>
<?php
session_start();
if($_POST){// post var mı
	$kld=$_POST["kld"]; $sfr=$_POST["sfr"]; 
	if($kld==$deger["kulad"]&&$sfr==$deger["parola"]){// şifre kontrol
	
	$_SESSION["kld"]=$deger["kulad"];
	$_SESSION["yetki"]=$deger["yetki"];
	}else{echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Kullanıcı Adı veya Şifre yanlış. </div><META HTTP-EQUIV=Refresh CONTENT='1;URL=giris.php'>";}
}
if(!empty($_SESSION["kld"]) and $_SESSION["yetki"]==11){// oturum var mı
?>
</head>
<body><center>
<table border="0">
  <tr>
    <td align="center" valign="middle"><a href="yonetici.php"><img src="images/sifre.png" width="75" height="75" /></a><br />
      <a href="yenimusteri.php"><img name="" src="images/kisi.png" width="150" height="150" alt="" /></a>
      </td>
    <td colspan="3" align="center" valign="middle" bgcolor="#FFF0EC"><p><a href="yenimusteri.php"></a><a href="anamenu.php"><img src="baslik.png" width="253" height="50" /></a></p>
      <h1>EMLAK TAKİP SİSTEMİ</h1>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td align="center" valign="middle"><a href="logout.php"><img src="images/cikis.png" width="75" height="75" /></a><br /><a href="musterirapor.php"><img src="images/kisiler.png" width="150" height="150" /></a></td>
  </tr>
  <tr>
    <td width="174"><a href="tahsilatyap.php"><img name="" src="images/tahsilat.png" width="170" height="150" alt="" /></a></td>
    <td width="174"><a href="odemeyap.php"><img name="" src="images/odeme.png" width="170" height="150" alt="" /></a></td>
    <td width="174"><a href="masrafgir.php"><img name="" src="images/masraf.png" width="170" height="150" alt="" /></a></td>
    <td width="174"><a href="yenisatissozlesme.php"><img name="" src="images/satissoz.png" width="170" height="150" alt="" /></a></td>
    <td width="52"><a href="yenikirasozlesme.php"><img name="" src="images/kirasoz.png" width="170" height="150" alt="" /></a></td>
  </tr>
  <tr>
    <td align="center"><a href="alacak.php"><img src="images/alacak.png" width="170" height="150" /></a></td>
    <td colspan="3" align="center"><img name="" src="islembutton.png" width="270" height="47" alt="" /></td>
    <td align="center"><a href="borc.php"><img src="images/borc.png" alt="" width="170" height="150" /></a></td>
  </tr>
</table>
<hr width="1000" align="center" size="2" />
<table border="0">
  <tr>
    <td align="center"><a href="alacakrapor.php"><img src="images/rapalacak.png" width="170" height="150" alt="" /></a></td>
    <td colspan="3" align="center"><img name="" src="raporbutton.png" width="270" height="47" alt="" /></td>
    <td align="center"><a href="borcrapor.php"><img src="images/rapborc.png" width="170" height="150" alt="" /></a></td>
    </tr>
  <tr>
    <td><a href="tahsilatrapor.php"><img name="" src="images/raportahsilat.png" width="170" height="150" alt="" /></a></td>
    <td><a href="odemerapor.php"><img name="" src="images/raporodeme.png" width="170" height="150" alt="" /></a></td>
    <td><a href="masrafrapor.php"><img name="" src="images/rapormasraf.png" width="170" height="150" alt="" /></a></td>
    <td><a href="satissozrapor.php"><img name="" src="images/raporsatis.png" width="170" height="150" alt="" /></a></td>
    <td><a href="kirasozrapor.php"><img name="" src="images/raporkira.png" width="170" height="150" alt="" /></a></td>
  </tr>
</table></center>
<p>
  <a href="tahsilatyap.php"></a> 
  <a href="odemeyap.php"></a>
  <a href="masrafgir.php"></a>
  <a href="yenisatissozlesme.php"></a></p>
<p><a href="tahsilatrapor.php"></a> <a href="odemerapor.php"></a> <a href="masrafrapor.php"></a> <a href="satissozrapor.php"></a> <a href="kirasozrapor.php"></a></p>
</center>
</body></html>
<?php
}else{echo "<br><br><div align=center style='color:#00F; font-size:36px; font-family:Tahoma, Geneva, sans-serif;'>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</div>
<META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}

ob_end_flush(); ?>