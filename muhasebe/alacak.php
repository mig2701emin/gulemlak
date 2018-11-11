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
<script src="SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
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
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
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
	if(!empty($_POST["bt1"])){//Alacak Düzenle butonu
		$id=$_POST["id"];
		$sqls="select * from alacak where id=$id";
		$sorgus=@mysql_query($sqls);
		$degers=@mysql_fetch_array($sorgus);
		
		$mid=$degers["mid"];
		$sqlm="select * from musteri where id=$mid";
		$sorgum=@mysql_query($sqlm);
		$degerm=@mysql_fetch_array($sorgum);
		?>

<form id="form1" name="form1" method="post" action="alacakkayit.php"><input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
  <table width="600" border="0" align="center" bgcolor="#FFF0EC">
    <tr>
      <td colspan="2" align="center" valign="middle">ALACAK</td>
    </tr>
    <tr>
      <td width="149">MÜŞTERİ SEÇ</td>
      <td width="441"><span id="sprytextfield1">
      
<?php
$sql="select * from musteri";
	$sorgu=@mysql_query($sql);
?>

        <label for="kisi"></label>
      </span><span id="spryselect1">
      <select name="kisi" id="kisi">
        <option value="<?php echo $degerm["id"]; ?>" selected="selected"><?php echo $degerm["ad"]." ".$degerm["soyad"]; ?></option>
        <?php
	while($deger=@mysql_fetch_array($sorgu)){
		echo "<option value='".$deger["id"]."'>".$deger["ad"]." ".$deger["soyad"]."</option>";
	}
?>
      </select>
      <span class="selectInvalidMsg">Lütfen bir müşteri seçin.</span><span class="selectRequiredMsg">Lütfen bir müşteri seçin.</span></span></td>
    </tr>
    <tr>
      <td>TUTAR</td>
      <td><span id="sprytextfield3">
      <label for="tutar"></label>
      <input type="text" name="tutar" id="tutar" value="<?php echo $degers["tutar"]; ?>" />
      <span class="textfieldInvalidFormatMsg">Lütfen sayı giriniz.</span><span class="textfieldRequiredMsg">Lütfen tutar giriniz.</span></span></td>
    </tr>
    <tr>
      <td>AÇIKLAMA</td>
      <td><span id="sprytextarea1">
        <label for="aciklama"></label>
        <textarea name="aciklama" id="aciklama" cols="45" rows="5"><?php echo $degers["aciklama"]; ?></textarea>
</span></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle"><input type="submit" name="btup" id="btup" value="Düzelt" /></td>
    </tr>
  </table>
</form>
        
<?php
	}
}else{
?>
<form id="form1" name="form1" method="post" action="alacakkayit.php">
  <table width="600" border="0" align="center" bgcolor="#FFF0EC">
    <tr>
      <td colspan="2" align="center" valign="middle">ALACAK</td>
    </tr>
    <tr>
      <td width="149">MÜŞTERİ SEÇ</td>
      <td width="441"><span id="sprytextfield1">
      
<?php
$sql="select * from musteri";
	$sorgu=@mysql_query($sql);
?>

        <label for="kisi"></label>
      </span><span id="spryselect1">
      <select name="kisi" id="kisi">
        <option value="0" selected="selected">Müşteri Seçiniz</option>
        <?php
	while($deger=@mysql_fetch_array($sorgu)){
		echo "<option value='".$deger["id"]."'>".$deger["ad"]." ".$deger["soyad"]."</option>";
	}
?>
      </select>
      <span class="selectInvalidMsg">Lütfen bir müşteri seçin.</span><span class="selectRequiredMsg">Lütfen bir müşteri seçin.</span></span></td>
    </tr>
    <tr>
      <td>TUTAR</td>
      <td><span id="sprytextfield3">
      <label for="tutar"></label>
      <input type="text" name="tutar" id="tutar" />
      <span class="textfieldInvalidFormatMsg">Lütfen sayı giriniz.</span><span class="textfieldRequiredMsg">Lütfen tutar giriniz.</span></span></td>
    </tr>
    <tr>
      <td>AÇIKLAMA</td>
      <td><span id="sprytextarea1">
        <label for="aciklama"></label>
        <textarea name="aciklama" id="aciklama" cols="45" rows="5"></textarea>
</span></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle"><input type="submit" name="bt" id="bt" value="Kaydet" /></td>
    </tr>
  </table>
</form>
<?php } ?>
<center><p><a href="anamenu.php" target="_top"><img src="images/geridon.png" height="50" width="253" align="middle" /></a></p></center>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {isRequired:false});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "real", {hint:"120.50", useCharacterMasking:true});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {isRequired:false});
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1", {invalidValue:"0"});
</script>

</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>