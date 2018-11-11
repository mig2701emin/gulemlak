<?
include("../setting.php");
$id=guvenlik($_GET['id']);
?>
<select name="kategori2" data-rel="chosen">
<option value="">Seçiniz</option>
<?
$altkategoriSQL=$mysqli->query("select * from proje_kategoriler where ust_kategori='$id'");
while($altkat=$altkategoriSQL->fetch_assoc()){
?>
<option value="<?=$altkat[Id];?>"><?=$altkat[kategori_adi];?></option>
<?}?>
</select>