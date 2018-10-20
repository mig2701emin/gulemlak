<?php
$checker=$mysqli->query("select * from magaza_kullanicilari where uyeId='$_SESSION[uye]'");
if($checker->num_rows==0){
$izin="0";
}else{
$izin="1";
}
$checkDetail=$checker->fetch_assoc();
$uye_izinleri=explode(",",$checkDetail[yetkiler]);
$query=$mysqli->query("select * from magazalar where Id='$checkDetail[magazaId]'");
$mgzsayi=$query->num_rows;
if($mgzsayi==0 and $izin==0){
header("Location:index.php?page=magazaac");exit();}
$bilgiler=$query->fetch_assoc();
$stil=$bilgiler[stil];
$act=guvenlik($_GET[act]);
if($act=='users'){
$delUser=guvenlik(base64_decode($_GET[delUser]));
if(!empty($delUser)){
if($uye_izinleri[1]==0){
?>
<h2 class="PermAlert">Mağaza Kullanıcı Silme İzniniz Bulunmamaktadır!</h2>
<?php }else{
$user_chk=$mysqli->query("select * from magaza_kullanicilari where uyeId='$delUser'");
$user_chk_details=$user_chk->fetch_assoc();
$user_perms=explode(",",$user_chk_details[yetkiler]);
if($user_perms[3]==1){
echo '<script>alert("Süper Yönetici Silinemez!");</script>';
}else{
if($user_chk->num_rows==1){
$mysqli->query("delete from magaza_kullanicilari where uyeId='$delUser'");
echo '<script>alert("Mağaza Kullanıcısı Başarıyla Silindi.");</script>';
}else{
echo '<script>alert("Mağaza Kullanıcısı Geçersiz.");</script>';
}
}
}
}
$section=guvenlik($_GET['section']);
if($section=='Add_Ok'){
$user=guvenlik($_POST[uye_adi]);
$userList=$mysqli->query("select Id,username from uyeler where username='$user'");
$add_user=$userList->fetch_assoc();
$add_chk=$mysqli->query("select uyeId from magaza_kullanicilari where uyeId='$add_user[Id]'");
if($userList->num_rows!=1){
echo '<script>alert("Üye Geçersiz.");';
}elseif($add_chk->num_rows!=0){
echo '<script>alert("Üye Daha Önce Eklenmiş.");';
}else{
if(isset($_POST[Perm1])){
$yetki1="1";
}else{
$yetki1="0";
}
if(isset($_POST[Perm2])){
$yetki2="1";
}else{
$yetki2="0";
}
if(isset($_POST[Perm3])){
$yetki3="1";
}else{
$yetki3="0";
}
if(isset($_POST[Perm4])){
$yetki4="1";
}else{
$yetki4="0";
}
$yetkiler=$yetki1.','.$yetki2.','.$yetki3.','.$yetki4;
$addQuery=$mysqli->query("insert into magaza_kullanicilari (Id,magazaId,uyeId,yetkiler) VALUES(NULL,'$checkDetail[magazaId]','$add_user[Id]','$yetkiler');");
if($addQuery){
echo '<script>alert("Üye Mağazaya Eklendi.");';
}else{
echo '<script>alert("Üye Mağazaya Eklenemedi. Lütfen Tekrar Deneyiniz.");';
}
}
echo 'window.location="index.php?page=magazam&act=users";</script>';
}elseif($section=='Add'){
?>
<div class="genelbox">Yeni Kullanıcı Ekle</div>
<?php if($uye_izinleri[1]==0){?>
<h2 class="PermAlert">Bu Sayfayı Görme İzniniz Bulunmamaktadır!</h2>
<?php }else{?>

<form name="form81" class="mega_size_fields" action="index.php?page=magazam&act=users&section=Add_Ok" method="post" enctype="multipart/form-data">
<dt>Kullanıcı Adı :</dt>
<dd><input name="uye_adi" type="text"></dd>
<div style="clear:both"></div>
<dt>Kullanıcı Yetkileri :</dt>
<dd>
<input type="checkbox" name="Perm1" id="Perm1" value="1"><label for="Perm1">Mağaza Ayarlar Yönetimi</label>
<br>
<input type="checkbox" name="Perm2" id="Perm2" value="1"><label for="Perm2">Mağaza Kullanıcı Yönetimi</label>
<br>
<input type="checkbox" name="Perm3" id="Perm3" value="1"><label for="Perm3">Mağaza İlan Yönetimi</label>
<br>
<input type="checkbox" name="Perm4" id="Perm4" value="1"><label for="Perm4">Süper Yönetici</label>
</dd>
<div style="clear:both"></div>
<input type="submit" name="submit" value="Kullanıcıyı Ekle" class="v4_special_button" style="margin-left:165px"></div>
</form>
<?php }}else{?>
<div class="genelbox">Mağaza Kullanıcıları</div>
<table border="0" width="100%" style="border-collapse: collapse">
	<tr>
		<td width="150" height="30" style="background:#000000;color:#FFFFFF;font-weight:bold;padding:3px;">Kullanıcı Adı</td>
		<td width="250" height="30" style="background:#000000;color:#FFFFFF;font-weight:bold;padding:3px;">Yetkiler</td>
		<td width="30" height="30" style="background:#000000;color:#FFFFFF;font-weight:bold;padding:3px;">İşlemler</td>
	</tr>
<?php
$userSQL=$mysqli->query("select * from magaza_kullanicilari where magazaId='$checkDetail[magazaId]'");
while($users=$userSQL->fetch_assoc()){
$uyebilgi=$mysqli->query("select username from uyeler where Id='$users[uyeId]'")->fetch_assoc();
$uye_yetkileri=explode(',',$users[yetkiler]);
?>
<tr>
<td height="30" style="border-bottom:1px solid #ccc;"><?php echo $uyebilgi[username];?></td>
<td height="30" style="border-bottom:1px solid #ccc;">
<?php if($uye_yetkileri[0]=='1'){?>Ayar Yönetimi<?php }?>
<?php if($uye_yetkileri[1]=='1'){?><?php if($uye_yetkileri[0]=='1'){?>,<?php }?> Kullanıcı Yönetimi<?php }?>
<?php if($uye_yetkileri[2]=='1'){?><?php if($uye_yetkileri[0]=='1' or $uye_yetkileri[1]=='1'){?>,<?php }?> İlan Yönetimi<?php }?>
<?php if($uye_yetkileri[3]=='1'){?><?php if($uye_yetkileri[0]=='1' or $uye_yetkileri[1]=='1' or $uye_yetkileri[2]=='1'){?>,<?php }?> Süper Yönetici<?php }?>
</td>
<td height="30" style="border-bottom:1px solid #ccc;"><a href="<?php echo $site_adresi;?>/index.php?page=magazam&act=editUser&userId=<?php echo base64_encode($users[uyeId]);?>">İzinler</a> | <a href="<?php echo $site_adresi;?>/index.php?page=magazam&act=users&delUser=<?php echo base64_encode($users[uyeId]);?>">Sil</a></td>
</tr>
<?php }?>
</table>

<?php }}elseif($act=='ads'){
$delAd=guvenlik($_GET[delAd]);
if(!empty($delAd)){
if($uyeizinleri[3]==1){
$del_perm=" and uyeId='$_SESSION[uye]'";
}else{
$del_perm="";
}
$delQuery=$mysqli->query("delete from magaza_ilanlari where ilanId='$delAd' and magazaId='$checkDetail[magazaId]'".$del_perm);
if($delQuery){
echo '<script>alert("Mağaza İlanı Başarıyla Silindi.");</script>';
}else{
echo '<script>alert("Mağaza İlanı Silinemedi.");</script>';
}
}

$section=guvenlik($_GET[section]);
if($section=='Add_Ok'){
$ilanid=guvenlik($_POST[ilanid]);
$check_exists=$mysqli->query("select * from firmalar where uyeId='$_SESSION[uye]' and Id='$ilanid'")->num_rows;
if($check_exists==0){
echo '<script>alert("İlan Geçersiz.");';
}else{
$addQuery=$mysqli->query("insert into magaza_ilanlari (Id,magazaId,ilanId,uyeId) VALUES(NULL,'$checkDetail[magazaId]','$ilanid','$_SESSION[uye]');");
if($addQuery){
echo '<script>alert("İlan Mağazaya Eklendi.");';
}else{
echo '<script>alert("İlan Mağazaya Eklenemedi. Lütfen Tekrar Deneyiniz.");';
}
}
echo 'window.location="index.php?page=magazam&act=ads";</script>';
}elseif($section=='Add'){
?>
<div class="genelbox">Yeni İlan Ekle</div>
<?php if($uye_izinleri[2]==0){?>
<h2 class="PermAlert">Bu Sayfayı Görme İzniniz Bulunmamaktadır!</h2>
<?php }else{?>
<form name="form81" class="mega_size_fields" action="index.php?page=magazam&act=ads&section=Add_Ok" method="post" enctype="multipart/form-data">
<dt>İlan No :</dt>
<dd><input name="ilanid" type="text"></dd>
<div style="clear:both"></div>
<input type="submit" name="submit" value="İlanı Ekle" class="v4_special_button" style="margin-left:165px;"></div>
</form>
<?php
}}elseif($section=='import'){
if($bilgiler[kategoriId]=='hepsi'){
$filter01="";
}else{
$filter01=" and kategoriId='".$bilgiler[kategoriId]."'";
}
$countadSQL=$mysqli->query("select Id from firmalar where uyeId='".$_SESSION[uye]."'".$filter01);
while($countad=$countadSQL->fetch_assoc()){
$chkAd=$mysqli->query("select ilanId from magaza_ilanlari where ilanId='".$countad[Id]."' and uyeId='".$_SESSION['uye']."'")->num_rows;
if($chkAd==0){
$mysqli->query("insert into magaza_ilanlari (Id,magazaId,ilanId,uyeId) VALUES(null,'".$checkDetail[magazaId]."','".$countad[Id]."','".$_SESSION[uye]."')");
}
}
echo '<script>alert("İlanlarınız Mağazaya Aktarıldı");window.location="index.php?page=magazam&act=ads";</script>';
}else{
?>
<div class="genelbox">Mağaza İlanları</div>
<table border="0" width="100%" style="border-collapse: collapse">
	<tr>
		<td width="25" height="30" style="background:#000000;color:#FFFFFF;font-weight:bold;padding:3px;">Fotoğraf</td>
		<td width="60" height="30" style="background:#000000;color:#FFFFFF;font-weight:bold;padding:3px;">İlan No</td>
		<td width="400" height="30" style="background:#000000;color:#FFFFFF;font-weight:bold;padding:3px;">İlan Adı</td>
		<td width="75" height="30" style="background:#000000;color:#FFFFFF;font-weight:bold;padding:3px;">Ekleyen</td>
		<td width="50" height="30" style="background:#000000;color:#FFFFFF;font-weight:bold;padding:3px;">İşlemler</td>
	</tr>
<?php
if($uye_izinleri[3]==1){
$uye_perm="";
}else{
$uye_perm=" and uyeId='$_SESSION[uye]'";
}
$userSQL=$mysqli->query("select * from magaza_ilanlari where magazaId='$checkDetail[magazaId]'".$uye_perm);
while($users=$userSQL->fetch_assoc()){
$ilandetaylari=$mysqli->query("select Id,firma_adi,seo_url,resim1,kategoriId,kategori2 from firmalar where Id='$users[ilanId]'")->fetch_assoc();
$kategoridetay=$mysqli->query("select * from kategoriler where Id='$ilandetaylari[kategoriId]' and ust_kategori='0'")->fetch_assoc();
$kategoridetay2=$mysqli->query("select * from kategoriler where Id='$ilandetaylari[kategori2]'")->fetch_assoc();
$uyedetay=$mysqli->query("select username from uyeler where Id='$users[uyeId]'")->fetch_assoc();
?>
<tr onclick="window.location='<?php echo $site_adresi;?>/ilan/<?php echo $ilandetaylari['seo_url'];?>-<?php echo $ilandetaylari['Id'];?>';" onmouseover="this.style.background='#DFEFFF';" onmouseout="this.style.background='#FFFFFF';" style="cursor:hand;cursor:pointer;">
<td height="85" style="border-bottom:1px solid #ccc;"><img src="<?php echo $site_adresi;?>/<?php if($ilandetaylari['resim1']!='' and file_exists($ilandetaylari['resim1'])){?><?php echo $ilandetaylari['resim1'];?><?php }else{?>images/yok.png<?php }?>" width="85" height="75" title="<?php echo $ilandetaylari['firma_adi'];?>" alt="<?php echo $ilandetaylari['firma_adi'];?>"></td>
<td height="85" style="border-bottom:1px solid #ccc;"><strong style="color:brown;">#<?php echo $ilandetaylari['Id'];?></strong></td>
<td height="85" style="border-bottom:1px solid #ccc;"><h3 style="color:brown;"><?php echo $ilandetaylari['firma_adi'];?></h3><strong style="color:blue;"><?php echo $kategoridetay['kategori_adi'];?> > <?php echo $kategoridetay2['kategori_adi'];?></strong></td>
<td height="85" style="border-bottom:1px solid #ccc;"><strong style="color:brown;"><?php echo $uyedetay[username];?></strong></td>
<td height="85" style="border-bottom:1px solid #ccc;"><a href="<?php echo $site_adresi;?>/index.php?page=magazam&act=ads&delAd=<?php echo $ilandetaylari[Id];?>">Sil</a></td>
</tr>
<?php }?>
</table>
<?php }}elseif($act=='editUser'){
$userId=guvenlik(base64_decode($_GET['userId']));
$userId_chk=$mysqli->query("select * from magaza_kullanicilari where magazaId='$checkDetail[magazaId]' and uyeId='$userId'");
if($userId_chk->num_rows==0){
header("Location:index.php?page=magazam&act=users");
}else{
$store_user_details1=$mysqli->query("select username from uyeler where Id='$userId'")->fetch_assoc();
$store_user_details2=$userId_chk->fetch_assoc();
$uyenin_izinleri=explode(",",$store_user_details2[yetkiler]);
$section=guvenlik($_GET[section]);
if($section=='edit_Ok'){
if($uye_izinleri[1]==0){
?>
<h2 class="PermAlert">Mağaza Kullanıcı Düzenleme İzniniz Bulunmamaktadır!</h2>
<?php
}else{
$user_kontrol=$mysqli->query("select * from magaza_kullanicilari where uyeId='$userId'")->num_rows;
if($user_kontrol==0){
echo '<script>alert("Üye Geçersiz.");';
}else{
if(isset($_POST[Perm1])){
$yetki1="1";
}else{
$yetki1="0";
}
if(isset($_POST[Perm2])){
$yetki2="1";
}else{
$yetki2="0";
}
if(isset($_POST[Perm3])){
$yetki3="1";
}else{
$yetki3="0";
}if(isset($_POST[Perm4])){
$yetki4="1";
}else{
$yetki4="0";
}
$yetkiler=$yetki1.','.$yetki2.','.$yetki3.','.$yetki4;
$editQuery=$mysqli->query("update magaza_kullanicilari set yetkiler='$yetkiler' where uyeId='$userId' and magazaId='$checkDetail[magazaId]'");
if($editQuery){
echo '<script>alert("Üye Güncellendi.");';
}else{
echo '<script>alert("Üye Güncellenemedi.");';
}
}
echo 'window.location="index.php?page=magazam&act=users";</script>';
}
}else{
?>
<div class="genelbox">Kullanıcı Düzenle</div>
<form name="form81" class="mega_size_fields" action="index.php?page=magazam&act=editUser&section=edit_Ok&userId=<?php echo base64_encode($userId);?>" method="post" enctype="multipart/form-data">
<dt>Kullanıcı Adı :</dt>
<dd><?php echo $store_user_details1[username];?></dd>
<div style="clear:both"></div>
<dt>Kullanıcı Yetkileri :</dt>
<dd>
<input type="checkbox" name="Perm1" id="Perm1" value="1"<?php if($uyenin_izinleri[0]=='1'){?> checked<?php }?>><label for="Perm1">Mağaza Ayar Yönetimi</label>
<br>
<input type="checkbox" name="Perm2" id="Perm2" value="1"<?php if($uyenin_izinleri[1]=='1'){?> checked<?php }?>><label for="Perm2">Mağaza Kullanıcı Yönetimi</label>
<br>
<input type="checkbox" name="Perm3" id="Perm3" value="1"<?php if($uyenin_izinleri[2]=='1'){?> checked<?php }?>><label for="Perm3">Mağaza İlan Yönetimi</label>
<br>
<input type="checkbox" name="Perm4" id="Perm4" value="1"<?php if($uyenin_izinleri[3]=='1'){?> checked<?php }?>><label for="Perm4">Süper Yönetici</label>
</dd>
<div style="clear:both"></div>
<input type="submit" name="submit" value="Kullanıcıyı Düzenle" class="v4_special_button" style="margin-left:165px;"></div>
</form>
<?php }}}else{?>
<div class="genelbox">Mağaza Yönetimi</div>
<?php if($uye_izinleri[0]==0){?>
<h2 class="PermAlert">Bu Sayfayı Görme İzniniz Bulunmamaktadır!</h2>
<?php }else{?>
<script>
$(document).ready(function(){
	$("#form1").validate({
		rules:{
			'username': {
			required:true,
			minlength:5,
			maxlength:30,
			remote: {url:"<?php echo $site_adresi;?>/check_store_username.php"}
			},
			'magazaadi': {
			required:true,
			minlength:5
			},
			'm_aciklama': {
			required:true,
			minlength:5
			},
			'unvan': {
			required:true,
			minlength:5
			},
			'stil': {
			required:true
			}
			},
			messages: {
			username: { remote: "Kullanıcı adı kullanılmaktadır." }
			}
});
});
</script>
<form id="form1" class="mega_size_fields" action="index.php?page=magazaguncelleok" method="post" enctype="multipart/form-data">
<dt>Mağaza Kullanıcı Adı :</dt>
<dd><input name="username" type="text" value="<?php echo $bilgiler[username];?>" class="validate[required,maxSize[30],ajax[checkUsername]]"></dd>
<div style="clear:both"></div>
<dt>Mağaza Adı :</dt>
<dd><input name="magazaadi" type="text" value="<?php echo $bilgiler[magazaadi];?>"></dd>
<div style="clear:both"></div>
<dt>Mağaza Açıklaması :</dt>
<?php
$aciklama_old=base64_decode($bilgiler[aciklama]);
$aciklama=html_entity_decode($aciklama_old);
?>
<dd><textarea name="m_aciklama" style="width:185px;height:135px"><?php echo $aciklama;?></textarea></dd>
<div style="clear:both"></div>
<dt>Mağaza Logosu :</dt>
<dd><input type="file" name="image1"> (Değiştirmek İstemiyorsanız Boş Bırakınız)</dd>
<div style="clear:both"></div>
<dt>Mağaza Ünvanı :</dt>
<dd><input name="unvan" type="text" value="<?php echo $bilgiler[unvan];?>"></dd>
<div style="clear:both"></div>
<dt>Mağaza Stili :</dt>
<dd>
		<select name="stil">
<option value="cesitli"<?php if($stil=='cesitli'){?> selected<?php }?>>Çeşitli</option>
<option value="cesitli2"<?php if($stil=='cesitli2'){?> selected<?php }?>>Çeşitli 2</option>
<option value="cesitli3"<?php if($stil=='cesitli3'){?> selected<?php }?>>Çeşitli 3</option>
<option value="emlak"<?php if($stil=='emlak'){?> selected<?php }?>>Emlak</option>
<option value="emlak2"<?php if($stil=='emlak2'){?> selected<?php }?>>Emlak 2</option>
<option value="emlak3"<?php if($stil=='emlak3'){?> selected<?php }?>>Emlak 3</option>
<option value="emlak4"<?php if($stil=='emlak4'){?> selected<?php }?>>Emlak 4</option>
<option value="emlak5"<?php if($stil=='emlak5'){?> selected<?php }?>>Emlak 5</option>
<option value="emlak6"<?php if($stil=='emlak6'){?> selected<?php }?>>Emlak 6</option>
<option value="vasita"<?php if($stil=='vasita'){?> selected<?php }?>>Vasıta</option>
<option value="vasita2"<?php if($stil=='vasita2'){?> selected<?php }?>>Vasıta 2</option>
<option value="vasita3"<?php if($stil=='vasita3'){?> selected<?php }?>>Vasıta 3</option>
<option value="vasita4"<?php if($stil=='vasita4'){?> selected<?php }?>>Vasıta 4</option>
<option value="vasita5"<?php if($stil=='vasita5'){?> selected<?php }?>>Vasıta 5</option>
<option value="vasita6"<?php if($stil=='vasita6'){?> selected<?php }?>>Vasıta 6</option>
<option value="vasita7"<?php if($stil=='vasita7'){?> selected<?php }?>>Vasıta 7</option>
<option value="hayvanlar-alemi"<?php if($stil=='hayvanlar-alemi'){?> selected<?php }?>>Hayvanlar Alemi</option>
</select>
</dd>
<div style="clear:both"></div>
<input type="submit" name="submit" value="Mağazayı Güncelle" class="v4_special_button" style="margin:0 0 5px 165px;"></div>
</form>
<?php }}?>
