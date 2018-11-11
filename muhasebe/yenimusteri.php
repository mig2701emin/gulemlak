<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ticaret Meclisi - Ev Konut Arsa İşyeri Satılık Kiralık</title>
<link rel="stylesheet" href="stil1.css" type="text/css" media="all">
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script>
          $( document ).ready(function() {
              var makskarakter = 11;    //Kişinin girebileceği maksimum karakter limiti        
              var count = $('#tc').val().length;
              var char = makskarakter - count;
              $('#veri2').text(char + " karakter kaldı");
               
              $('#tc').keyup(function () {
                 var len = $(this).val().length;
                 if (len >= makskarakter) {
                   $('#verii').text("Tamam!");$('#veri2').text("");
				   tc.value=tc.value.substr(0,makskarakter);
                 } else {
                   var chardiff = makskarakter - len;
                   $('#veri2').text(chardiff + " karakter kaldı");$('#verii').text("");
                 }
              });
        });
      </script>

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
if($_POST){
	if(!empty($_POST["bt1"])){//Müşteri Düzenle butonu
		$id=$_POST["id"];
		$sqls="select * from musteri where id=$id";
		$sorgus=@mysql_query($sqls);
		$degers=@mysql_fetch_array($sorgus);
		
		?>


<form id="form1" name="form1" method="post" action="yenimusterikayit.php"><input type="hidden" name="id" id="id" value="<?php echo $degers["id"]; ?>" />
  <table width="600" border="0" align="center" bgcolor="#FFF0EC">
    <tr>
      <td colspan="2" align="center" valign="middle">YENİ MÜŞTERİ GİRİŞİ</td>
    </tr>
    <tr>
      <td width="127">TC KİMLİK NO</td>
      <td width="457"><span id="sprytextfield4">
        <label for="tc"></label>
        <input name="tc" type="text" id="tc" maxlength="11" value="<?php echo $degers["tc"]; ?>" />
  <span class="textfieldRequiredMsg">Lütfen TC kimlik no giriniz</span><span style="color:#00F;" id="verii"></span><span id="veri2" style="color:#F00;"></span><span class="textfieldInvalidFormatMsg">TC numarası rakamlardan oluşur.</span><span class="textfieldMinCharsMsg">TC numarası 11 rakamdan oluşur.</span><span class="textfieldMaxCharsMsg">TC numarası 11 rakamdan oluşur.</span></span>
</span></td>
    </tr>
    <tr>
      <td>ADI</td>
      <td><span id="sprytextfield1">
        <label for="ad"></label>
        <input type="text" name="ad" id="ad" value="<?php echo $degers["ad"]; ?>" />
        <span class="textfieldRequiredMsg"> Lütfen ad giriniz.</span></span></td>
    </tr>
    <tr>
      <td>SOYADI</td>
      <td><span id="sprytextfield2">
        <label for="soyad"></label>
        <input type="text" name="soyad" id="soyad" value="<?php echo $degers["soyad"]; ?>" />
        <span class="textfieldRequiredMsg">Lütfen soyad giriniz.</span></span></td>
    </tr>
    <tr>
      <td>TELEFON NO</td>
      <td><span id="sprytextfield3">
      <label for="tel"></label>
      <input type="text" name="tel" id="tel" value="<?php echo $degers["tel"]; ?>" />
      <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Lütfen geçerli bir telefon numarası giriniz.</span></span></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle"><input type="submit" name="btup" id="btup" value="Kaydet" /></td>
    </tr>
  </table>
</form>
<?php
	}
}else{
?>
<form id="form1" name="form1" method="post" action="yenimusterikayit.php">
  <table width="600" border="0" align="center" bgcolor="#FFF0EC">
    <tr>
      <td colspan="2" align="center" valign="middle">YENİ MÜŞTERİ GİRİŞİ</td>
    </tr>
    <tr>
      <td width="127">TC KİMLİK NO</td>
      <td width="457"><span id="sprytextfield4">
        <label for="tc"></label>
        <input name="tc" type="text" id="tc" maxlength="11" />
  <span class="textfieldRequiredMsg">Lütfen TC kimlik no giriniz</span><span style="color:#00F;" id="verii"></span><span id="veri2" style="color:#F00;"></span><span class="textfieldInvalidFormatMsg">TC numarası rakamlardan oluşur.</span><span class="textfieldMinCharsMsg">TC numarası 11 rakamdan oluşur.</span><span class="textfieldMaxCharsMsg">TC numarası 11 rakamdan oluşur.</span></span>
</span></td>
    </tr>
    <tr>
      <td>ADI</td>
      <td><span id="sprytextfield1">
        <label for="ad"></label>
        <input type="text" name="ad" id="ad" />
        <span class="textfieldRequiredMsg"> Lütfen ad giriniz.</span></span></td>
    </tr>
    <tr>
      <td>SOYADI</td>
      <td><span id="sprytextfield2">
        <label for="soyad"></label>
        <input type="text" name="soyad" id="soyad" />
        <span class="textfieldRequiredMsg">Lütfen soyad giriniz.</span></span></td>
    </tr>
    <tr>
      <td>TELEFON NO</td>
      <td><span id="sprytextfield3">
      <label for="tel"></label>
      <input type="text" name="tel" id="tel" />
      <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Lütfen geçerli bir telefon numarası giriniz.</span></span></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle"><input type="submit" name="bt" id="bt" value="Kaydet" /></td>
    </tr>
  </table>
</form>
<?php } ?>
<center><p><a href="anamenu.php" target="_top"><img src="images/geridon.png" height="50" width="253" align="middle" /></a></p></center>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "phone_number", {useCharacterMasking:true, hint:"(555) 555 5555"});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {isRequired:false});
</script>
</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>