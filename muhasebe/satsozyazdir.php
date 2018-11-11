<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ticaret Meclisi - Ev Konut Arsa İşyeri Satılık Kiralık</title>
<link rel="stylesheet" href="stil1.css" type="text/css" media="all">
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<?php
session_start();
if(!empty($_SESSION["kld"]) and $_SESSION["yetki"]==11){
	include("baglanti.php");
	date_default_timezone_set('Europe/Istanbul');

?>
<script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>
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
<center>
<div id="icerik" name="icerik" style=" text-align:center;">

<?php
if(!empty($_POST["bt15"])){//Tahsilat Düzenle butonu
		$id=$_POST["id"];
		$sqls="select * from satissozlesme where id=$id";
		$sorgus=@mysql_query($sqls);
		$degers=@mysql_fetch_array($sorgus);
?>
 <table width="900" border="1" align="center"bgcolor="#FFF0EC">
  <tr>
    <td colspan="5" align="center" valign="middle"><p><img src="images/firmalogo.jpg" width="264" height="100" /><br />
      <img src="baslik.png" width="253" height="50" />      <br />
      Şirinevler Mah. Abdulkadir Konukoğlu Bulvarı<br />
      29 Ekim Sitesi No: 225 C-6/B<br />
      (Mondi Bitişiği)<input type="hidden" name="id" id="id" value="<?php echo $degers["id"]; ?>" />
    </p></td>
    <td colspan="6" align="center" valign="middle"><h1>Gayrimenkul Alım-Satım ve<br />Komisyon Sözleşmesi</h1><br /><?php echo $tarih=date("d-m-Y"); ?></td>
    </tr>
  <tr>
    <td colspan="5">SATILACAK GAYRİMENKULÜN</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
  </tr>
  <tr>
    <td width="170">CİNSİ</td>
    <td width="340" colspan="2" style="min-width:100px;"><span id="sprytextfield4">
      <label for="cinsi"></label>
      <?php echo $degers["cinsi"]; ?>
</span></td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>ADRESİ</td>
    <td colspan="10" style="min-width:100px; min-height:35px;"><span id="sprytextarea1">
      <label for="adres"></label>
   <?php echo $degers["adres"]; ?>
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
    <td colspan="2" style="min-width:100px;"><span id="sprytextfield1">
      <label for="ada"></label>
      <?php echo $degers["ada"]; ?>
</span></td>
    <td colspan="2">PAFTA</td>
    <td colspan="2" style="min-width:100px;"><span id="sprytextfield3">
      <label for="pafta"></label>
      <?php echo $degers["pafta"]; ?>
</span></td>
    <td colspan="2">PARSEL</td>
    <td colspan="2" style="min-width:100px;"><span id="sprytextfield2">
      <label for="parsel"></label>
	<?php echo $degers["parsel"]; ?>
    </span></td>
    </tr>
  <tr>
    <td colspan="5">SATICININ VEYA VEKİLİNİN</td>
    <td colspan="6">ALICININ VEYA VEKİLİNİN</td>
    </tr>
  <tr>
    <td colspan="2">ADI SOYADI</td>
    <td colspan="3" style="min-width:100px;"><span id="sprytextfield5">
      <label for="satad"></label>
      <?php echo $degers["satad"]; ?>
      <span class="textfieldRequiredMsg"></span></span></td>
    <td colspan="3">ADI SOYADI</td>
    <td colspan="3" style="min-width:100px;">
      <label for="alad"></label>
      <?php echo $degers["alad"]; ?></td>
    </tr>
  <tr>
    <td colspan="2">T.C. KİMLİK NO</td>
    <td colspan="3" style="min-width:100px;"><span id="sprytextfield6">
      <label for="sattc"></label>
     <?php echo $degers["sattc"]; ?>
</span></td>
    <td colspan="3">T.C. KİMLİK NO</td>
    <td colspan="3" style="min-width:100px;"><span id="sprytextfield9">
      <label for="altc"></label>
      <?php echo $degers["altc"]; ?>
</span></td>
    </tr>
  <tr>
    <td colspan="2">TELEFON NO</td>
    <td colspan="3" style="min-width:100px;">
    <label for="sattel"></label>
    <?php echo $degers["sattel"]; ?></td>
    <td colspan="3">TELEFON NO</td>
    <td colspan="3" style="min-width:100px;">
    <label for="altel"></label>
    <?php echo $degers["altel"]; ?></td>
    </tr>
  <tr>
    <td colspan="11">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="11" align="left"  style="min-width:100px;">1- Yukarıda adres tapu kayıtları bulunan gayrimenkulü     

    <label for="bedel"></label>
    <?php $tutarc=$degers["bedel"];
		$tutarc=number_format($tutarc, 2, ',', '.'); echo $tutarc; ?><span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg"></span></span> bedelle satıcı satmayı, alıcı almayı ve gayrimenkulü alım satımda Emlak komisyoncusunun aracılık hizmetini tamamladığını kabul etmişlerdir.</td>
  </tr>
  <tr>
    <td colspan="11" align="left" style="min-width:100px;">2- Alıcıdan bu satışa mahsuben <span id="sprytextfield12">
    <label for="pesinat"></label>
    <?php $pesinat=$degers["pesinat"];
		$pesinat=number_format($pesinat, 2, ',', '.'); echo $pesinat; ?>    <span class="textfieldRequiredMsg"></span><span class="textfieldInvalidFormatMsg"></span></span> satıcıya peşinat olarak ödenmiştir. Geriye kalan bedel 7. maddedeki şartlarda açıklandığı gibi ödenecektir.</td>

  </tr>
  <tr>
    <td colspan="11" align="left">3- A) İşbu akdin imzasından sonra alıcı gayrimenkulü almaktan vazgeçerse antlaşma anında satışa mahsuben verdiği bedeli geri almayacaktır. B) satıcı vazgeçerse satışa mahsuben aldığı bedelin iki katını alıcıya vermeyi kabul ve taahhüt eder.</td>
  </tr>
  <tr>
    <td colspan="11" align="left">4- Satıcıdan %3 ve alıcıdan %3 olmak üzere işbu akdin imzasından itibaren Emlak Komisyoncusuna, tapuda ferağ anında komisyon ücreti olarak ödemeyi taraflar kabul ve tahhüt etmiştir.</td>
  </tr>
  <tr>
    <td colspan="11" align="left">5- İşbu akdin imzasından sonra gayrimenkulü satıcı satmaktan vazgeçerse veya alıcı almaktan vazgeçerse cayan taraf hem kendi ödeyeceği hem de diğer tarafın ödeyeceği komisyon ücretinin tamamını Emlak Komisyoncusuna ödemeyi kabul ve taahhüt eder.</td>
  </tr>
  <tr>
    <td colspan="11" align="left"  style="min-width:100px;">6- İşbu akit satıcı, alıcı ve Emlak Komisyoncusu arasında yukarıda belirtilen ve aşağıdaki özel şartlarla birlikte geçerli olmak üzere imzalanmış olup, doğabilecek uyuşmazlıklarda <span id="sprytextfield13">
      <label for="mahkeme"></label>
     <?php echo $degers["mahkeme"]; ?>      <span class="textfieldRequiredMsg"></span></span> Mahkemeleri ve İcra Dairelerinin yetkili olduğu kabul edilmiştir.</td>

    </tr>
  <tr>
    <td colspan="11" align="left" style="min-width:100px; min-height:35px;"><p>7- Özel Şartlar
 <?php echo $degers["ozelsart"]; ?>
      <br />
      <span id="sprytextarea2">
        <label for="ozelsart"></label>
      </span>    </p></td>
  </tr>
  <tr>
    <td colspan="3" align="center">ALICI</td>
    <td colspan="4" align="center">SATICI</td>
    <td colspan="4" align="center">EMLAK KOMİSYONCUSU /Temsilen</td>
  </tr>
  <tr>
    <td height="150" colspan="3" align="center">&nbsp;</td>
    <td colspan="4" align="center">&nbsp;</td>
    <td colspan="4" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="11" valign="middle" align="center"><input name="b_print" type="button" class="ipt"   onClick="printdiv('icerik');" value="Sözleşmeyi Yazdır"></td>
  </tr>
</table>
</div>
</center>

<?php } ?>
<center><p><a href="anamenu.php" target="_top"><img src="images/geridon.png" height="50" width="253" align="middle" /></a></p></center>
</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>