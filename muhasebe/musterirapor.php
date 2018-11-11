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
        window.location.href='musterisil.php?delete_id='+id;
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
  <p><H1 align="center" style="color:#00F;">MÜŞTERİLER</H1></p>
 <center>
  <div id="tablo" style="text-align:center; max-width:1080px; min-width:1079px;">
  <input type="text" autocomplete="off" name="searchTags" id="searchTags" placeholder="Aranacak Kelime" />ARA
  <br /><br />
  <table width="1080" border="1" id="menuFull" style="max-width:1080px; min-width:1079px; list-style-type:none; position:relative;  width: 1080px; background-color:#FFF0EC;" name="menuFull">
  <tr>
  	<td align="center" valign="middle"><font color="#0000FF">No</font></td>
    <td align="center" valign="middle"><font color="#0000FF">TC Kimlik No</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Müşteri<br />Ad Soyad</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Müşteri<br />Telefonu</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Nakit Tahsilat</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Alacak Dekontu</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Nakit Ödeme</font></td>
    <td align="center" valign="middle"><font color="#0000FF">Borç Dekontu</font></td>
    <td align="center" valign="middle"><font color="#0000FF">BAKİYE</font></td>
    <td colspan="2" align="center" valign="middle"><font color="#0000FF">İşlem</font></td>
   </tr>
   
<?php
	$x=1;
	$sql="select * from musteri";
	$sorgu=@mysql_query($sql);
	while($deger=@mysql_fetch_array($sorgu)){ $id=$deger["id"];
			$sql1="select tutar from tahsilat where mid=$id";
			$sorgu1=@mysql_query($sql1);
			$toplam1=0;
			while($deger1=@mysql_fetch_array($sorgu1)){
				$toplam1=$toplam1+$deger1["tutar"];	
			}
			$sql2="select tutar from odeme where mid=$id";
			$sorgu2=@mysql_query($sql2);
			$toplam2=0;
			while($deger2=@mysql_fetch_array($sorgu2)){
				$toplam2=$toplam2+$deger2["tutar"];	
			}
			$sql3="select tutar from alacak where mid=$id";
			$sorgu3=@mysql_query($sql3);
			$toplam3=0;
			while($deger3=@mysql_fetch_array($sorgu3)){
				$toplam3=$toplam3+$deger3["tutar"];	
			}
			$sql4="select tutar from borc where mid=$id";
			$sorgu4=@mysql_query($sql4);
			$toplam4=0;
			while($deger4=@mysql_fetch_array($sorgu4)){
				$toplam4=$toplam4+$deger4["tutar"];	
			}
			$islem=($toplam1+$toplam3)-($toplam2+$toplam4);
			$islem=number_format($islem, 2, ',', '.');
			$toplam1=number_format($toplam1, 2, ',', '.');
			$toplam2=number_format($toplam2, 2, ',', '.');
			$toplam3=number_format($toplam3, 2, ',', '.');
			$toplam4=number_format($toplam4, 2, ',', '.');
		echo "<tr>";
		echo "<td>$x</td><td>".$deger["tc"]."</td><td>".$deger["ad"]." ".$deger["soyad"]."</td>";
		echo "<td>".$deger["tel"]."</td><td align=right>$toplam1</td><td align=right>$toplam3</td><td align=right>$toplam2</td><td align=right>$toplam4</td>";
		if($islem>0){echo "<td bgcolor=#B0FE96  align=right>$islem Alacaklı";}if($islem<0){echo "<td bgcolor=#FB6D4A  align=right>"; echo $islem; echo " Borçlu";}if($islem==0){echo "<td align=right>$islem";}
		echo "</td>";
		echo "<td><form name=g$x id=g$x action=yenimusteri.php method=post><input type=hidden name=id value='".$deger["id"]."'><input type=submit name=bt1 value=Düzelt></form></td>";
echo "<td><form name=g$x id=g$x action=ayrinti.php method=post><input type=hidden name=id value='".$deger["id"]."'><input type=submit name=btay value='Ayrıntılar'></form></td>";		
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