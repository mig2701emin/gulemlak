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
        window.location.href='satissozraporsil.php?delete_id='+id;
     }
}
</script>

<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p><center>
  <a href="anamenu.php"><img src="baslik.png" alt="" name="" width="253" height="50" align="middle" /></a>
</center></p>
 <center>
  <div id="tablo" style="text-align:center; max-width:1080px; min-width:1079px;">
  <input type="text" autocomplete="off" name="searchTags" id="searchTags" placeholder="Aranacak Kelime" />ARA
  <br /><br />
  <table width="1080" border="1" id="menuFull" style="max-width:1080px; min-width:1079px; list-style-type:none; position:relative;  width: 1080px; background-color:#FFF0EC;" name="menuFull">
  <tr>
  	<td align="center" valign="middle"><font color="#0000FF">No</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Sözleşme Tarihi</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Cinsi</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Bedeli</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Peşinat</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Satıcı Adı</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Satıcı Tel</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Alıcı Adı</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Alıcı Tel</font></td>
    <td colspan="3" align="center" valign="middle"><font color="#0000FF">İşlem</font></td>
   </tr>
   
<?php
	$x=1;
	$sql="select *,DATE_FORMAT(tarih, '%d.%m.%Y') as trh from satissozlesme order by tarih desc";
	$sorgu=@mysql_query($sql);
	while($deger=@mysql_fetch_array($sorgu)){
		echo "<tr>";
		echo "<td>$x</td><td>".$deger["trh"]."</td>";
		echo "<td>".$deger["cinsi"]."</td><td align=right>";
		$bedel=$deger["bedel"];
		$bedel=number_format($bedel, 2, ',', '.');
		echo "$bedel</td><td align=right>";
		$pesinat=$deger["pesinat"];
		$pesinat=number_format($pesinat, 2, ',', '.');
		echo "$pesinat</td><td>".$deger["satad"]."</td><td>".$deger["sattel"]."</td><td>".$deger["alad"]."</td><td>".$deger["altel"]."</td><td><form name=g$x id=g$x action=satsozduzenle.php method=post><input type=hidden name=id value='".$deger["id"]."'><input type=submit name=bt5 value=Düzelt></form></td><td><form name=r$x id=r$x action=satsozyazdir.php method=post><input type=hidden name=id value='".$deger["id"]."'><input type=submit name=bt15 value=Yazdır></form></td><td><form name=f$x action='satissozraporsil.php' method=post onsubmit='return false;'><input type=hidden name=barkod value='".$deger["id"]."'>"; ?>
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
</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>