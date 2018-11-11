<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ticaret Meclisi - Ev Konut Arsa İşyeri Satılık Kiralık</title>
<link rel="stylesheet" href="stil1.css" type="text/css" media="all">
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

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

<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	if(!empty($_POST["btay"])){
		$id=$_POST["id"];
		$sqlk="select * from musteri where id=$id";
		$sorguk=@mysql_query($sqlk);
		$degerk=@mysql_fetch_array($sorguk);
?>
<div id="icerik" name="icerik" style=" text-align:center;">

<p><center>
  <a href="anamenu.php"><img src="baslik.png" alt="" name="" width="253" height="50" align="middle" /></a>
</center></p>
  <p><H1 align="center" style="color:#00F;"><?php echo $degerk["ad"]." ".$degerk["soyad"]; ?></H1></p>
 <center>
  <div id="tablo" style="text-align:center; max-width:1080px; min-width:1079px;">
  <input type="text" autocomplete="off" name="searchTags" id="searchTags" placeholder="Aranacak Kelime" />ARA
  <table width="1050" border="1" id="menuFull" style="max-width:1050px; min-width:1049px; list-style-type:none; position:relative;  width: 1050px; background-color:#FFF0EC;" name="menuFull">
  <tr>
    <td rowspan="2" align="center" valign="middle"><font color="#0000FF">No</font></td>
    <td rowspan="2" align="center" valign="middle"><font color="#0000FF">Tarih</font></td>
    <td rowspan="2" align="center" valign="middle"><font color="#0000FF">TC Kimlik No</font></td>
    <td rowspan="2" align="center" valign="middle"><font color="#0000FF">Müşteri<br />Ad Soyad</font></td>
    <td rowspan="2" align="center" valign="middle"><font color="#0000FF">Müşteri<br />Telefonu</font></td>
    <td rowspan="2" align="center" valign="middle"><font color="#0000FF">Açıklama</font></td>
    <td bgcolor="#74EF7A" colspan="2" align="center" valign="middle"><font color="#0000FF">Müşterinin Alacağı</font></td>
    <td bgcolor="#FB6D4A" colspan="2" align="center" valign="middle"><font color="#0000FF">Müşterinin Borcu</font></td>
  </tr>
  <tr>
  	<td bgcolor="#74EF7A" align="center" valign="middle">Nakit Tahsilat</td>
  	<td bgcolor="#74EF7A" align="center" valign="middle">Alacak Dekontu</td>
    <td bgcolor="#FB6D4A" align="center" valign="middle">Nakit Ödeme</td>
    <td bgcolor="#FB6D4A" align="center" valign="middle">Borç Dekontu</td>
   </tr>

<?php
		$toplam1=0;$toplam2=0;$toplam3=0;$toplam4=0;
		$sql1="select *,DATE_FORMAT(tarih, '%d.%m.%Y') as trh from tahsilat where mid=$id order by tarih desc";
		$sorgu1=@mysql_query($sql1);
		$x=1;
		while($deger1=@mysql_fetch_array($sorgu1)){
			$toplam1+=$deger1["tutar"];
		echo "<tr style='background-color:#D6FEDC;'>";
		echo "<td>$x</td><td>".$deger1["trh"]."</td><td>".$degerk["tc"]."</td><td>".$degerk["ad"]." ".$degerk["soyad"]."</td>";
		echo "<td>".$degerk["tel"]."</td><td>".$deger1["aciklama"]."</td><td bgcolor=#74EF7A align=right>";
		$tutar1=$deger1["tutar"];
		$tutar1=number_format($tutar1, 2, ',', '.');
		echo "$tutar1</td><td bgcolor=#74EF7A>-</td><td bgcolor=#FB6D4A>-</td><td bgcolor=#FB6D4A>-</td>";
		echo "</tr>";
		$x++;
		}
		$sql3="select *,DATE_FORMAT(tarih, '%d.%m.%Y') as trh from alacak where mid=$id order by tarih desc";
		$sorgu3=@mysql_query($sql3);
		while($deger3=@mysql_fetch_array($sorgu3)){
			$toplam3+=$deger3["tutar"];
		echo "<tr style='background-color:#D2E4FF;'>";
		echo "<td>$x</td><td>".$deger3["trh"]."</td><td>".$degerk["tc"]."</td><td>".$degerk["ad"]." ".$degerk["soyad"]."</td>";
		echo "<td>".$degerk["tel"]."</td><td>".$deger3["aciklama"]."</td><td bgcolor=#74EF7A>-</td><td bgcolor=#74EF7A align=right>";
		$tutar3=$deger3["tutar"];
		$tutar3=number_format($tutar3, 2, ',', '.');
		echo "$tutar3</td><td bgcolor=#FB6D4A>-</td><td bgcolor=#FB6D4A>-</td>";
		echo "</tr>";
		$x++;
		}
			$sql2="select *,DATE_FORMAT(tarih, '%d.%m.%Y') as trh from odeme where mid=$id order by tarih desc";
		$sorgu2=@mysql_query($sql2);
		while($deger2=@mysql_fetch_array($sorgu2)){
			$toplam2+=$deger2["tutar"];
		echo "<tr style='background-color:#E6CCFF;'>";
		echo "<td>$x</td><td>".$deger2["trh"]."</td><td>".$degerk["tc"]."</td><td>".$degerk["ad"]." ".$degerk["soyad"]."</td>";
		echo "<td>".$degerk["tel"]."</td><td>".$deger2["aciklama"]."</td><td bgcolor=#74EF7A>-</td><td bgcolor=#74EF7A>-</td><td bgcolor=#FB6D4A  align=right>";
		$tutar2=$deger2["tutar"];
		$tutar2=number_format($tutar2, 2, ',', '.');
		echo "$tutar2</td><td bgcolor=#FB6D4A>-</td>";
		echo "</tr>";
		$x++;
		}

		$sql4="select *,DATE_FORMAT(tarih, '%d.%m.%Y') as trh from borc where mid=$id order by tarih desc";
		$sorgu4=@mysql_query($sql4);
		while($deger4=@mysql_fetch_array($sorgu4)){
			$toplam4+=$deger4["tutar"];
		echo "<tr style='background-color:#FFFFB0;'>";
		echo "<td>$x</td><td>".$deger4["trh"]."</td><td>".$degerk["tc"]."</td><td>".$degerk["ad"]." ".$degerk["soyad"]."</td>";
		echo "<td>".$degerk["tel"]."</td><td>".$deger4["aciklama"]."</td><td bgcolor=#74EF7A>-</td><td bgcolor=#74EF7A>-</td><td bgcolor=#FB6D4A>-</td><td bgcolor=#FB6D4A align=right>";
		$tutar4=$deger4["tutar"];
		$tutar4=number_format($tutar4, 2, ',', '.');
		echo "$tutar4</td>";
		echo "</tr>";
		$x++;
		}
		$islem=($toplam1+$toplam3)-($toplam2+$toplam4);
		$toplam1=number_format($toplam1, 2, ',', '.');
		$toplam2=number_format($toplam2, 2, ',', '.');
		$toplam3=number_format($toplam3, 2, ',', '.');
		$toplam4=number_format($toplam4, 2, ',', '.');
		$islem=number_format($islem, 2, ',', '.');
		
		echo "<tr><td colspan=6 align=center>TOPLAM</td><td align=right>$toplam1</td><td align=right>$toplam3</td><td align=right>$toplam2</td><td align=right>$toplam4</td></tr>";
		
		echo "<tr style='background-color:#FF99FF;'><td colspan=6 align=center><h2>BAKİYE</h2></td><td colspan=4><h1>";
		if($islem>0){echo "$islem Alacaklı";}if($islem<0){  echo $islem; echo " Borçlu";}
		echo "</h1></td></tr>";

	}
?>
<tr><td colspan="10" align="center"><input style="width:150px; height:40px; color:#00F; size:24px; background-color:#F9F;" name="b_print" type="button" class="ipt"   onClick="printdiv('icerik');" value="Yazdır"></td></tr>
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
</center></div>
<center><p><a href="musterirapor.php" target="_top"><img src="images/geri.png" height="76" width="76" align="middle" /></a></p></center>

</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>