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
<?php
session_start();
if(!empty($_SESSION["kld"]) and $_SESSION["yetki"]==11){
	date_default_timezone_set('Europe/Istanbul');
?>
<style type="text/css">
body {
	background-image: url(logo.png);
}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p><center>
  <a href="anamenu.php"><img src="baslik.png" alt="" name="" width="253" height="50" align="middle" /></a>
</center></p>
<form id="form1" name="form1" method="post" action="yenisatissozlesmekayit.php">
 <table width="900" border="1" align="center"bgcolor="#FFF0EC">
  <tr>
    <td colspan="6" align="center" valign="middle"><p><img src="images/firmalogo.jpg" width="264" height="100" /><br />
      <img src="baslik.png" width="253" height="50" />      <br />
      Şirinevler Mah. Abdulkadir Konukoğlu Bulvarı<br />
      29 Ekim Sitesi No: 225 C-6/B<br />
      (Mondi Bitişiği)
    </p></td>
    <td colspan="5" align="center" valign="middle"><h1>Gayrimenkul Alım-Satım ve<br />Komisyon Sözleşmesi</h1><br /><?php echo $tarih=date("d-m-Y"); ?></td>
    </tr>
  <tr>
    <td colspan="5">SATILACAK GAYRİMENKULÜN</td>
    <td width="170">&nbsp;</td>
    <td width="170"></td>
    <td colspan="3"></td>
    <td width="170">&nbsp;</td>
  </tr>
  <tr>
    <td width="170">CİNSİ</td>
    <td width="340" colspan="2"><span id="sprytextfield4">
      <label for="cinsi"></label>
      <input type="text" name="cinsi" id="cinsi" />
</span></td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>ADRESİ</td>
    <td colspan="10"><span id="sprytextarea1">
      <label for="adres"></label>
      <textarea name="adres" id="adres" cols="120" rows="1"></textarea>
</span></td>
    </tr>
  <tr>
    <td colspan="3">TAPU BİLGİLERİ </td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>ADA</td>
    <td colspan="2"><span id="sprytextfield1">
      <label for="ada"></label>
      <input type="text" name="ada" id="ada" />
</span></td>
    <td colspan="2">PAFTA</td>
    <td colspan="2"><span id="sprytextfield3">
      <label for="pafta"></label>
      <input type="text" name="pafta" id="pafta" />
</span></td>
    <td colspan="2">PARSEL</td>
    <td colspan="2"><span id="sprytextfield2">
      <label for="parsel"></label>
      <input type="text" name="parsel" id="parsel" />
    </span></td>
    </tr>
  <tr>
    <td colspan="6">SATICININ VEYA VEKİLİNİN</td>
    <td colspan="5">ALICININ VEYA VEKİLİNİN</td>
    </tr>
  <tr>
    <td colspan="3">ADI SOYADI</td>
    <td colspan="3"><span id="sprytextfield5">
      <label for="satad"></label>
      <input type="text" name="satad" id="satad" />
      <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span></span></td>
    <td colspan="2">ADI SOYADI</td>
    <td colspan="3"><span id="sprytextfield8">
      <label for="alad"></label>
      <input type="text" name="alad" id="alad" />
      <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span></span></td>
    </tr>
  <tr>
    <td colspan="3">T.C. KİMLİK NO</td>
    <td colspan="3"><span id="sprytextfield6">
      <label for="sattc"></label>
      <input type="text" name="sattc" id="sattc" />
</span></td>
    <td colspan="2">T.C. KİMLİK NO</td>
    <td colspan="3"><span id="sprytextfield9">
      <label for="altc"></label>
      <input type="text" name="altc" id="altc" />
</span></td>
    </tr>
  <tr>
    <td colspan="3">TELEFON NO</td>
    <td colspan="3"><span id="sprytextfield7">
    <label for="sattel"></label>
    <input type="text" name="sattel" id="sattel" />
    <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Geçersiz format.</span></span></td>
    <td colspan="2">TELEFON NO</td>
    <td colspan="3"><span id="sprytextfield10">
    <label for="altel"></label>
    <input type="text" name="altel" id="altel" />
    <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Geçersiz format.</span></span></td>
    </tr>
  <tr>
    <td colspan="11">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="11">1- Yukarıda adres tapu kayıtları bulunan gayrimenkulü <span id="sprytextfield11">
    <label for="bedel"></label>
    <input type="text" name="bedel" id="bedel" />
    <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Geçersiz format.</span></span> bedelle satıcı satmayı, alıcı almayı ve gayrimenkulü alım satımda Emlak komisyoncusunun aracılık hizmetini tamamladığını kabul etmişlerdir.</td>
  </tr>
  <tr>
    <td colspan="11">2- Alıcıdan bu satışa mahsuben <span id="sprytextfield12">
    <label for="pesinat"></label>
    <input type="text" name="pesinat" id="pesinat" />
    <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span><span class="textfieldInvalidFormatMsg">Geçersiz format.</span></span> satıcıya peşinat olarak ödenmiştir. Geriye kalan bedel 7. maddedeki şartlarda açıklandığı gibi ödenecektir.</td>
  </tr>
  <tr>
    <td colspan="11">3- A) İşbu akdin imzasından sonra alıcı gayrimenkulü almaktan vazgeçerse antlaşma anında satışa mahsuben verdiği bedeli geri almayacaktır. B) satıcı vazgeçerse satışa mahsuben aldığı bedelin iki katını alıcıya vermeyi kabul ve taahhüt eder.</td>
  </tr>
  <tr>
    <td colspan="11">4- Satıcıdan %3 ve alıcıdan %3 olmak üzere işbu akdin imzasından itibaren Emlak Komisyoncusuna, tapuda ferağ anında komisyon ücreti olarak ödemeyi taraflar kabul ve tahhüt etmiştir.</td>
  </tr>
  <tr>
    <td colspan="11">5- İşbu akdin imzasından sonra gayrimenkulü satıcı satmaktan vazgeçerse veya alıcı almaktan vazgeçerse cayan taraf hem kendi ödeyeceği hem de diğer tarafın ödeyeceği komisyon ücretinin tamamını Emlak Komisyoncusuna ödemeyi kabul ve taahhüt eder.</td>
  </tr>
  <tr>
    <td colspan="11">6- İşbu akit satıcı, alıcı ve Emlak Komisyoncusu arasında yukarıda belirtilen ve aşağıdaki özel şartlarla birlikte geçerli olmak üzere imzalanmış olup, doğabilecek uyuşmazlıklarda <span id="sprytextfield13">
      <label for="mahkeme"></label>
      <input type="text" name="mahkeme" id="mahkeme" />
      <span class="textfieldRequiredMsg">Bir değer gerekiyor.</span></span> Mahkemeleri ve İcra Dairelerinin yetkili olduğu kabul edilmiştir.</td>
    </tr>
  <tr>
    <td colspan="11"><p>7- Özel Şartlar
      <textarea name="ozelsart" id="ozelsart" cols="145" rows="8"></textarea>
      <br />
      <span id="sprytextarea2">
        <label for="ozelsart"></label>
      </span>    </p></td>
  </tr>
  <tr>
    <td colspan="4" align="center">ALICI</td>
    <td colspan="3" align="center">SATICI</td>
    <td colspan="4" align="center">EMLAK KOMİSYONCUSU /Temsilen</td>
  </tr>
  <tr>
    <td height="69" colspan="4" align="center">&nbsp;</td>
    <td colspan="3" align="center">&nbsp;</td>
    <td colspan="4" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="11" align="center"><input type="submit" name="bt" id="bt" value="Sözleşmeyi Kaydet" /></td>
  </tr>
</table>

</form>
<center><p><a href="anamenu.php" target="_top"><img src="images/geridon.png" height="50" width="253" align="middle" /></a></p></center>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {isRequired:false});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {isRequired:false});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {isRequired:false});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {isRequired:false});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {isRequired:false});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "phone_number", {hint:"(555) 555 5555", useCharacterMasking:true});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "none", {isRequired:false});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "phone_number", {hint:"(555) 555 5555", useCharacterMasking:true});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "real");
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "real");
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13");
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2", {isRequired:false});
</script>
</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>