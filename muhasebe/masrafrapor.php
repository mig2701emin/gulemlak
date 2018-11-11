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
<script type="text/javascript">
function delete_id(id)
{
     if(confirm('Kaydı Silmek İstediğinizden Eminmisiniz?'))
     {
        window.location.href='masrafsil.php?delete_id='+id;
     }
}
</script>
<?php
	$sqlc="select tutar from masraf";
	$sorguc=@mysql_query($sqlc);
	$toplam=0;
	while($degerc=@mysql_fetch_array($sorguc)){
		$toplam=$toplam+$degerc["tutar"];	
	}
	if(!empty($_POST["islem"])){//Tarih aralığına göre bilgi için
		$trh1=$_POST["trh1"];
		$trh2=$_POST["trh2"];
		$sqlt="select tutar from masraf where tarih between '$trh1' and '$trh2'";
		$sorgut=@mysql_query($sqlt);
			$toplamt=0;
		while($degert=@mysql_fetch_array($sorgut)){
		$toplamt=$toplamt+$degert["tutar"];	
		}
	}
?>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>

<body>

<center>
<a href="anamenu.php"><img src="baslik.png" alt="" name="" width="253" height="50" align="middle" /></a>

<center><form id="form1" name="form1" method="post" action="masrafrapor.php">
<table width="1080" border="1" style="max-width:1080px; min-width:1079px; list-style-type:none; position:relative;  width: 1080px; background-color:#FFF0EC;">
  <tr>
  	<td align="center" valign="middle"><font color="#0000FF">Toplam<br />Masraf</font></td>
    <td align="center" valign="middle"><b><?php $toplam=number_format($toplam, 2, ',', '.'); echo $toplam; ?></b></td>
    <td align="center" valign="middle"><font color="#0000FF">Tarih Aralığına<br />
      Göre Masraf Öğren</font></td>
    <td align="center" valign="middle"><span id="sprytextfield1">
      <label for="trh1"></label>
      <input type="text" name="trh1" id="trh1" value="<?php if(!empty($_POST["islem"])){ echo $trh1; } ?>" /><br />
      <span class="textfieldInvalidFormatMsg">Tarihi 2011-11-11 şeklinde giriniz.</span><span class="textfieldRequiredMsg">Lütfen tarih giriniz.</span></span>
    </td>
    <td align="center" valign="middle"><font color="#0000FF"><span id="sprytextfield2">
    <label for="trh2"></label>
    <input type="text" name="trh2" id="trh2" value="<?php if(!empty($_POST["islem"])){ echo $trh2; } ?>" /><br />
    <span class="textfieldRequiredMsg">Lütfen tarih giriniz.</span><span class="textfieldInvalidFormatMsg">Tarihi 2011-11-11 şeklinde giriniz.</span></span></font></td><td align="center"><font color="#00FF00" size="+3"><?php if(!empty($_POST["islem"])){$toplamt=number_format($toplamt, 2, ',', '.'); echo $toplamt; } ?></font></td>
    <td align="center" valign="middle"><input type="submit" name="islem" id="islem" value="Hesapla" /></td>
  </tr>
</table></form></center>
  <p><H1 align="center" style="color:#00F;">MASRAFLAR</H1></p>
</center></p>

<center>
  <div id="tablo" style="text-align:center; max-width:1080px; min-width:1079px;">
  <input type="text" autocomplete="off" name="searchTags" id="searchTags" placeholder="Aranacak Kelime" />ARA
  <br /><br />
  <table width="1080" border="1" id="menuFull" style="max-width:1080px; min-width:1079px; list-style-type:none; position:relative;  width: 1080px; background-color:#FFF0EC;" name="menuFull">
  <tr>
  	<td align="center" valign="middle"><font color="#0000FF">No</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Masraf Tarihi</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Masraf Türü</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Tutar</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Açıklama</font></td>
    <td colspan="2" align="center" valign="middle"><font color="#0000FF">İşlem</font></td>
   </tr>
   
<?php
	$x=1;
	$sql="select *,DATE_FORMAT(tarih, '%d.%m.%Y') as trh from masraf order by tarih desc";
	$sorgu=@mysql_query($sql);
	while($deger=@mysql_fetch_array($sorgu)){
		echo "<tr>";
		echo "<td>$x</td><td>".$deger["trh"]."</td><td>".$deger["turu"]."</td>";
		echo "<td align=right>";
		$tutarc=$deger["tutar"];
		$tutarc=number_format($tutarc, 2, ',', '.');
		echo "$tutarc</td><td>".$deger["aciklama"]."</td><td><form name=g$x id=g$x action=masrafgir.php method=post><input type=hidden name=id value='".$deger["id"]."'><input type=submit name=bt1 value=Düzelt></form></td><td><form name=f$x action='masrafsil.php' method=post onsubmit='return false;'><input type=hidden name=barkod value='".$deger["id"]."'>"; ?>
<a href="javascript:delete_id(<?php echo $deger["id"]; ?>)">Sil</a>
<?php echo "</form></td>";		
		echo "</tr>";
		$x++;
	}
?>
</table>
<script>
//Aramalarda büyük küçük harf duyarlılığı için
jQuery.expr[':'].contains = function(a, i, m) {
return jQuery(a).text().toUpperCase()
.indexOf(m[3].toUpperCase()) >= 0;
};
 
$(document).ready(function () {
 
// keyup ile inputa herhangi bir değer girilince fonksiyonu tetikliyoruz
$("#searchTags").keyup(function(){
 
// inputa yazılan değeri alıyoruz
var value = $("#searchTags").val();
 
// eğer input içinde değer yoksa yani boşsa tüm menüyü çıkartıyoruz
if(value.length==0){
 
$("#menuFull tr").show();
 
// arama yapılmışsa ilk olarak tüm menüyü gizliyoruz ve girilen değer ile eşleşen kısmı çıkarıyoruz
}else{
 
$("#menuFull tr").hide();
$("#menuFull tr:contains("+value+")").show();
 
}
 
});
 
});
</script>
</div>
</center>
<center><p><a href="anamenu.php" target="_top"><img src="images/geridon.png" height="50" width="253" align="middle" /></a></p></center>
<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "date", {format:"yyyy-mm-dd", useCharacterMasking:true, hint:"2011-11-11"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "date", {format:"yyyy-mm-dd", useCharacterMasking:true, hint:"2011-11-11"});
</script>
</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>