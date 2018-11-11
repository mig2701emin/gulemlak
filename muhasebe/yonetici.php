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
<script type="text/javascript" src="jquery-1.5.min.js"></script>
<script type="text/javascript">
	function kontrol(){
		var ad=$("#ad").val();
		ad=jQuery.trim(ad);
		var soyad=$("#soyad").val();
		soyad=jQuery.trim(soyad);
		var kulad=$("#kulad").val();
		kulad=jQuery.trim(kulad);
		var parola=$("#parola").val();
		parola=jQuery.trim(parola);
		if(ad==''||soyad==''||parola==''||kulad==''){
			if(kulad==''){
				document.getElementById("bilgi1").innerHTML="<img src='images/file1800.GIF'><font color=#FF0F0F> Lütfen Kullanıcı Adınızı Giriniz.</font>";
			}else{document.getElementById("bilgi1").innerHTML="";}
			if(parola==''){
				document.getElementById("bilgi2").innerHTML="<img src='images/file1800.GIF'><font color=#FF0F0F> Lütfen Parolanızı Giriniz.</font>";
			}else{document.getElementById("bilgi2").innerHTML="";}
			if(ad==''){
				document.getElementById("bilgi3").innerHTML="<img src='images/file1800.GIF'><font color=#FF0F0F> Lütfen İsim Giriniz.</font>";
			}else{document.getElementById("bilgi3").innerHTML="";}
			if(soyad==''){
				document.getElementById("bilgi4").innerHTML="<img src='images/file1800.GIF'><font color=#FF0F0F> Lütfen Soyisim Giriniz</font>";
			}else{document.getElementById("bilgi4").innerHTML="";}
		}else{
			document.getElementById("bilgi1").innerHTML="";
			document.getElementById("bilgi2").innerHTML="";
			document.getElementById("bilgi3").innerHTML=""
			document.getElementById("bilgi4").innerHTML=""
			window.location="yonet.php";
			$("#form1").removeAttr("onsubmit");
		}
	}
</script>

<style type="text/css">
        input{width:300px;font:10pt tahoma;cursor:pointer;}
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
<center>
<?php
		$sql1="select * from yonetici";
		$sorgu1=@mysql_query($sql1);
		$deger1=@mysql_fetch_array($sorgu1);
		?>
        <form action="yonet.php" method="post" name="form1" id="form1" onsubmit="return false;">
  <table width="897" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFF0EC">
  <tr><td colspan="3" align="center" valign="middle" height="50">Sayın <?php echo $deger1["ad"]."  ".$deger1["soyad"]." "; ?>Kişisel Bilgilerinizi Güncellemek İçin Lütfen Bilgilerini Düzenleyip 'GÜNCELLE' Butonuna Basınız.</td></tr>
    <tr>
      <td width="120">Kullanıcı Adınız :</td>
      <td width="467"  height="37">
        <input type="text" name="kulad" id="kulad" value="<?php echo $deger1["kulad"]; ?>" /></td>
      <td width="239"></td>
    </tr>
    <tr><td></td><td colspan="2" align="left" valign="middle"><div id="bilgi1"><font color="#FF0F0F"></font></div></td></tr>
    <tr>
      <td width="120">Parolanız :</td>
      <td width="467"  height="37">
        <input type="text" name="parola" id="parola" value="<?php echo $deger1["parola"]; ?>" /></td>
      <td width="239"></td>
    </tr>
    <tr><td></td><td colspan="2" align="left" valign="middle"><div id="bilgi2"><font color="#FF0F0F">Parolanızı unutmayacağınız bir şekilde giriniz...</font></div></td></tr>
    <tr>
    <tr>
      <td width="120">Adınız :</td>
      <td width="467"  height="37">
        <input type="text" name="ad" id="ad" value="<?php echo $deger1["ad"]; ?>" /></td>
      <td width="239"></td>
    </tr>
    <tr><td></td><td colspan="2" align="left" valign="middle"><div id="bilgi3"><font color="#FF0F0F"></font></div></td></tr>
    <tr>
      <td width="120">Soyadınız :</td>
      <td width="467"  height="37">
        <input type="text" name="soyad" id="soyad" value="<?php echo $deger1["soyad"]; ?>" /></td>
      <td width="239"></td>
    </tr>
    <tr><td></td><td colspan="2" align="left" valign="middle"><div id="bilgi4"><font color="#FF0F0F"></font></div></td></tr>
    
    <tr>
      <td colspan="2" align="center" valign="middle"><input type="submit" name="bty" id="bt" value="GÜNCELLE" onclick="kontrol()" style="width:100px; height:40px;"/></td>
      <td align="center" valign="middle">&nbsp;</td>
    </tr>
  </table>
  <p></p>
</form>
</center>
<center><p><a href="anamenu.php" target="_top"><img src="images/geridon.png" height="50" width="253" align="middle" /></a></p></center>

</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.<META HTTP-EQUIV=Refresh CONTENT='2;URL=labgiris.php'>";}
ob_end_flush(); ?>