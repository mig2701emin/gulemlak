<?
include('../setting.php'); 
$id=guvenlik($_GET['id']);
$selected=guvenlik($_GET['selected']);
$div=str_replace("kategori","",guvenlik($_GET['div']));
?>
<script>$(document).ready(function(){$("select[name='kategori<?=$div;?>']").chosen();});</script>
<select name="kategori<?=$div;?>" data-rel="chosen"<?if($div!=8){?>onchange="change_category(this.options[this.selectedIndex].value,'kategori<?=$div+1;?>','');"<?}?>>
<option value="0">Hepsi</option>
<?
if($id!=0){
$kategoriSQL=$mysqli->query("select * from kategoriler where ust_kategori='".$id."' order by siralama asc,kategori_adi asc");
while($kategori=$kategoriSQL->fetch_assoc()){
?>
<option value="<?=$kategori[Id];?>"<?if($kategori[Id]==$selected){?> selected<?}?>><?=$kategori[kategori_adi];?></option>
<?}}?>
</select>