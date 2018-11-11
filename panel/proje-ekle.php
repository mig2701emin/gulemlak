<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$baslik=guvenlik($_POST['baslik']);																										
$url=seo($baslik);	
$icerik=guvenlik($_POST['icerik'],1);										
$icerik_b64=base64_encode($icerik);
$kategori=guvenlik($_POST['kategori']);		
$kategori2=guvenlik($_POST['kategori2']);		
$firma=guvenlik($_POST['firma']);		
$sehir=guvenlik($_POST['sehir']);		
$ilce=guvenlik($_POST['ilce']);		
$m2araligi1=guvenlik($_POST['m2araligi1']);		
$m2araligi2=guvenlik($_POST['m2araligi2']);		
$m2araligi=$m2araligi1." m2 - ".$m2araligi2." m2";	
$projealani=guvenlik($_POST['projealani']);		
$emlaktipi=guvenlik($_POST['emlaktipi']);		
$odasecenekleri1=guvenlik($_POST['odasecenekleri1']);		
$odasecenekleri2=guvenlik($_POST['odasecenekleri2']);		
$odasecenekleri=$odasecenekleri1."+".$odasecenekleri2;
$teslimtarihi=guvenlik($_POST['teslimtarihi'],1);		
$iletisim=guvenlik($_POST['iletisim']);		
$map=guvenlik($_POST['map_Val']);		
$genelozellikler=guvenlik(implode(",",$_POST['genelozellikler']));
$genelozellikler_check=explode(",",$genelozellikler);	
$durum=guvenlik($_POST['durum']);			
$img=$_FILES['img'];
?>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAgvcI5F7yEbzhTlj3HHwj7vnTZgQIdfqA&sensor=false"></script>
<script src="../js/add_project_map.js"></script>
<script>
function bolgegetir(id,type)
{
if(type=='il'){
$('#ilce').load('../ilce.php?id='+id,function(){$("select[name='ilce']").attr("data-rel","chosen");$("select[name='ilce']").chosen();});
}
}
function katgetir(id)
{
$('#kategori2').load('proje_katgetir.php?id='+id,function(){$("select[name='kategori2']").chosen();});
}
</script>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Proje Ekle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){
if($admin_kilit==0){
$new_Id=$mysqli->query("select Id from projeler order by Id desc")->fetch_assoc();
$yeni_isim="../projeler/logolar/".($new_Id[Id]+1);
$yeni_isim_multi="../projeler/".($new_Id[Id]+1);
$img_genislik="980";
$img_yukseklik="200";
include("class.image_upload.php");
include("class.multi_image_upload.php");
for($i = 0; $i <= 20; $i++){
if($DestinationFile_multi[$i]!=''){
$resimler.=str_replace("../projeler/","",$DestinationFile_multi[$i].".".$fileType_multi[$i].",");
}
}
$logo=str_replace("../projeler/logolar/","",$DestinationFile).".".$fileType;	
}											
process_mysql("insert into projeler (Id,baslik,seo_url,logo,resimler,aciklama,kategori,kategori2,firma,sehir,ilce,m2araligi,projealani,emlaktipi,odasecenekleri,teslimtarihi,iletisim,map,genelozellikler,durum) VALUES(null,'$baslik','$url','$logo','$resimler','$icerik_b64','$kategori','$kategori2','$firma','$sehir','$ilce','$m2araligi','$projealani','$emlaktipi','$odasecenekleri','$teslimtarihi','$iletisim','$map','$genelozellikler','$durum')","proje-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Proje Ekle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" name="map_Val" id="map_Val">
<fieldset>
<legend>Proje Ekle</legend>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Proje Başlığı</label>
							  <div class="controls">
								<input type="text" name="baslik" value="<?=$baslik;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Proje Logosu</label>
							  <div class="controls">
								<input type="file" name="img">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Firma</label>
							  <div class="controls">
								<input type="text" name="firma" value="<?=$firma;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Şehir</label>
							  <div class="controls">
								<select name="sehir" data-rel="chosen" onchange="bolgegetir(this.options[selectedIndex].value,'il')">
								<option value="">Seçiniz</option>
								<?
								$ilSQL=$mysqli->query("select * from tbl_il");
								while($il_q=$ilSQL->fetch_assoc()){
								?>
								<option value="<?=$il_q[il_id];?>"<?if($il_q[il_id]==$sehir){?> selected<?}?>><?=$il_q[il_ad];?></option>
								<?}?>
								</select>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">İlçe</label>
							  <div class="controls" id="ilce">
								<select name="ilce" data-rel="chosen">
								<?if($ilce==''){?>
								<option value="">Önce İl Seçiniz</option>
								<?
								}else{
								$ilce_list_sql=$mysqli->query("select * from tbl_ilce where il_id='".$sehir."'");
								while($ilce_list=$ilce_list_sql->fetch_assoc()){
								?>
								<option value="<?=$ilce_list[ilce_id];?>"<?if($ilce_list[ilce_id]==$ilce){?> selected<?}?>><?=$ilce_list[ilce_ad];?></option>
								<?}}?>
								</select>
								</div>
							</div>							
							<div class="control-group">
							  <label class="control-label" for="textarea2">Kategori</label>
							  <div class="controls">
								<select name="kategori" data-rel="chosen" onchange="katgetir(this.options[selectedIndex].value)">
								<option value="">Seçiniz</option>
								<?
								$katSQL=$mysqli->query("select * from proje_kategoriler where ust_kategori='0'");
								while($kat=$katSQL->fetch_assoc()){
								?>
								<option value="<?=$kat[Id];?>"<?if($kat[Id]==$kategori){?> selected<?}?>><?=$kat[kategori_adi];?></option>
								<?}?>
								</select>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Alt Kategori</label>
							  <div class="controls" id="kategori2">
								<select name="kategori2" data-rel="chosen">
								<?if($kategori2==''){?>
								<option value="">Önce Kategori Seçiniz</option>
								<?
								}else{
								$kategori2_list_sql=$mysqli->query("select * from proje_kategoriler where ust_kategori='$kategori'");
								while($kategori2_list=$kategori2_list_sql->fetch_assoc()){
								?>
								<option value="<?=$kategori2_list[Id];?>"<?if($kategori2_list[Id]==$kategori2){?> selected<?}?>><?=$kategori2_list[kategori_adi];?></option>
								<?}}?>
								</select>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Durum</label>
							  <div class="controls">
								<select name="durum" data-rel="chosen">
								<option value="1"<?if($durum==1){?> selected<?}?>>Aktif</option>
								<option value="0"<?if($durum==0){?> selected<?}?>>Pasif</option>
								</select>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Emlak Tipi</label>
							  <div class="controls">
								<select name="emlaktipi" data-rel="chosen">
								<option value="">Seçiniz</option>
								<?
								$emlaktipiSQL=$mysqli->query("select * from proje_emlaktipleri");
								while($tip=$emlaktipiSQL->fetch_assoc()){
								?>
								<option value="<?=$tip[Id];?>"<?if($emlaktipi==$tip[Id]){?> selected<?}?>><?=$tip[emlaktipi];?></option>
								<?}?>
								</select>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">M2 Aralığı</label>
							  <div class="controls">
								<input type="text" name="m2araligi1" value="<?=$m2araligi1;?>" style="width:95px"> - 
								<input type="text" name="m2araligi2" value="<?=$m2araligi2;?>" style="width:94px"> m2
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Proje Alanı</label>
							  <div class="controls">
								<input type="text" name="projealani" value="<?=$projealani;?>"> m2
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Oda Seçenekleri</label>
							  <div class="controls">
								<input type="text" name="odasecenekleri1" value="<?=$odasecenekleri1;?>" style="width:95px"> + 
								<input type="text" name="odasecenekleri2" value="<?=$odasecenekleri2;?>" style="width:94px"> Oda / Salon
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Teslim Tarihi</label>
							  <div class="controls">
								<input type="text" name="teslimtarihi" value="<?=$teslimtarihi;?>" class="datepicker">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">İletişim Bilgileri</label>
							  <div class="controls">
								<textarea name="iletisim" style="width:300px;height:100px"><?=$iletisim;?></textarea>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Proje Konumu</label>
							  <div class="controls">
								<div id="gmap" style="height:500px"></div>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Proje Resimleri</label>
							  <div class="controls">
								<div id="uploader"><p>Tarayıcınız Flash, Silverlight Veya HTML5 Desteklemiyor.</p></div>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Proje Açıklaması</label>
							  <div class="controls">
								<textarea name="icerik" class="ckeditor"><?=$icerik;?></textarea>
								</div>
							</div>
														<legend>Genel Özellikler</legend>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Sağlık</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Sağlık Ocağı"<?if(in_array("Sağlık Ocağı",$genelozellikler_check)){?> checked<?}?>>Sağlık Ocağı</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Poliklinik"<?if(in_array("Poliklinik",$genelozellikler_check)){?> checked<?}?>>Poliklinik</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Eczane"<?if(in_array("Eczane",$genelozellikler_check)){?> checked<?}?>>Eczane</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Veteriner"<?if(in_array("Veteriner",$genelozellikler_check)){?> checked<?}?>>Veteriner</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Eğitim</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Kreş"<?if(in_array("Kreş",$genelozellikler_check)){?> checked<?}?>>Kreş</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Anaokulu"<?if(in_array("Anaokulu",$genelozellikler_check)){?> checked<?}?>>Anaokulu</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="İlköğretim"<?if(in_array("İlköğretim",$genelozellikler_check)){?> checked<?}?>>İlköğretim</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Lise"<?if(in_array("Lise",$genelozellikler_check)){?> checked<?}?>>Lise</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Ulaşım</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Merkezi Noktalara Servis"<?if(in_array("Merkezi Noktalara Servis",$genelozellikler_check)){?> checked<?}?>>Merkezi Noktalara Servis</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Toplu Taşımaya Yakın"<?if(in_array("Toplu Taşımaya Yakın",$genelozellikler_check)){?> checked<?}?>>Toplu Taşımaya Yakın</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Anayollara Yakın"<?if(in_array("Anayollara Yakın",$genelozellikler_check)){?> checked<?}?>>Anayollara Yakın</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Güvenlik</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="24 Saat Güvenlik"<?if(in_array("24 Saat Güvenlik",$genelozellikler_check)){?> checked<?}?>>24 Saat Güvenlik</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Gece Bekçisi"<?if(in_array("Gece Bekçisi",$genelozellikler_check)){?> checked<?}?>>Gece Bekçisi</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Güvenlik Kamerası"<?if(in_array("Güvenlik Kamerası",$genelozellikler_check)){?> checked<?}?>>Güvenlik Kamerası</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Eğlence & Alışveriş</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Alışveriş Merkezi"<?if(in_array("Alışveriş Merkezi",$genelozellikler_check)){?> checked<?}?>>Alışveriş Merkezi</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Market"<?if(in_array("Market",$genelozellikler_check)){?> checked<?}?>>Market</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Eğlence Merkezi"<?if(in_array("Eğlence Merkezi",$genelozellikler_check)){?> checked<?}?>>Eğlence Merkezi</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Park"<?if(in_array("Park",$genelozellikler_check)){?> checked<?}?>>Park</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Restoran"<?if(in_array("Restoran",$genelozellikler_check)){?> checked<?}?>>Restoran</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Cafe & Bar"<?if(in_array("Cafe & Bar",$genelozellikler_check)){?> checked<?}?>>Cafe & Bar</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Kuaför"<?if(in_array("Kuaför",$genelozellikler_check)){?> checked<?}?>>Kuaför</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Sinema"<?if(in_array("Sinema",$genelozellikler_check)){?> checked<?}?>>Sinema</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Tiyatro"<?if(in_array("Tiyatro",$genelozellikler_check)){?> checked<?}?>>Tiyatro</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Kuru Temizleme"<?if(in_array("Kuru Temizleme",$genelozellikler_check)){?> checked<?}?>>Kuru Temizleme</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Çocuk Oyun Parkı"<?if(in_array("Çocuk Oyun Parkı",$genelozellikler_check)){?> checked<?}?>>Çocuk Oyun Parkı</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Kütüphane"<?if(in_array("Kütüphane",$genelozellikler_check)){?> checked<?}?>>Kütüphane</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Teknik Detay</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Arıtma Sistemi"<?if(in_array("Arıtma Sistemi",$genelozellikler_check)){?> checked<?}?>>Arıtma Sistemi</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Hidrofor"<?if(in_array("Hidrofor",$genelozellikler_check)){?> checked<?}?>>Hidrofor</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Jeneratör"<?if(in_array("Jeneratör",$genelozellikler_check)){?> checked<?}?>>Jeneratör</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Ses Yalıtımı"<?if(in_array("Ses Yalıtımı",$genelozellikler_check)){?> checked<?}?>>Ses Yalıtımı</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Su Deposu"<?if(in_array("Su Deposu",$genelozellikler_check)){?> checked<?}?>>Su Deposu</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Paratoner"<?if(in_array("Paratoner",$genelozellikler_check)){?> checked<?}?>>Paratoner</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Isı Yalıtımı"<?if(in_array("Isı Yalıtımı",$genelozellikler_check)){?> checked<?}?>>Isı Yalıtımı</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Spor ve SPA Olanakları</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Jakuzi"<?if(in_array("Jakuzi",$genelozellikler_check)){?> checked<?}?>>Jakuzi</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Tenis Kortu"<?if(in_array("Tenis Kortu",$genelozellikler_check)){?> checked<?}?>>Tenis Kortu</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Fitness Salonu"<?if(in_array("Fitness Salonu",$genelozellikler_check)){?> checked<?}?>>Fitness Salonu</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Yüzme Havuzu - Kapalı"<?if(in_array("Yüzme Havuzu - Kapalı",$genelozellikler_check)){?> checked<?}?>>Yüzme Havuzu - Kapalı</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Yüzme Havuzu - Açık"<?if(in_array("Yüzme Havuzu - Açık",$genelozellikler_check)){?> checked<?}?>>Yüzme Havuzu - Açık</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Basketbol Sahası"<?if(in_array("Basketbol Sahası",$genelozellikler_check)){?> checked<?}?>>Basketbol Sahası</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Voleybol Sahası"<?if(in_array("Voleybol Sahası",$genelozellikler_check)){?> checked<?}?>>Voleybol Sahası</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Futbol Sahası"<?if(in_array("Futbol Sahası",$genelozellikler_check)){?> checked<?}?>>Futbol Sahası</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Voleybol Sahası"<?if(in_array("Voleybol Sahası",$genelozellikler_check)){?> checked<?}?>>Voleybol Sahası</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Yürüyüş Parkuru"<?if(in_array("Yürüyüş Parkuru",$genelozellikler_check)){?> checked<?}?>>Yürüyüş Parkuru</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Squash Salonu"<?if(in_array("Squash Salonu",$genelozellikler_check)){?> checked<?}?>>Squash Salonu</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Aerobik Salonu"<?if(in_array("Aerobik Salonu",$genelozellikler_check)){?> checked<?}?>>Aerobik Salonu</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="SPA"<?if(in_array("SPA",$genelozellikler_check)){?> checked<?}?>>SPA</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Spor Salonu"<?if(in_array("Spor Salonu",$genelozellikler_check)){?> checked<?}?>>Spor Salonu</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Masaj"<?if(in_array("Masaj",$genelozellikler_check)){?> checked<?}?>>Masaj</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Hamam"<?if(in_array("Hamam",$genelozellikler_check)){?> checked<?}?>>Hamam</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Sauna"<?if(in_array("Sauna",$genelozellikler_check)){?> checked<?}?>>Sauna</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Buhar Odası"<?if(in_array("Buhar Odası",$genelozellikler_check)){?> checked<?}?>>Buhar Odası</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Bisiklet Parkuru"<?if(in_array("Bisiklet Parkuru",$genelozellikler_check)){?> checked<?}?>>Bisiklet Parkuru</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Bowling"<?if(in_array("Bowling",$genelozellikler_check)){?> checked<?}?>>Bowling</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Bilardo"<?if(in_array("Bilardo",$genelozellikler_check)){?> checked<?}?>>Bilardo</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Masa Tenisi"<?if(in_array("Masa Tenisi",$genelozellikler_check)){?> checked<?}?>>Masa Tenisi</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Mini Golf"<?if(in_array("Mini Golf",$genelozellikler_check)){?> checked<?}?>>Mini Golf</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Bahçe"<?if(in_array("Bahçe",$genelozellikler_check)){?> checked<?}?>>Bahçe</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Otopark</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Otopark - Açık"<?if(in_array("Otopark - Açık",$genelozellikler_check)){?> checked<?}?>>Otopark - Açık</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Otopark - Kapalı"<?if(in_array("Otopark - Kapalı",$genelozellikler_check)){?> checked<?}?>>Otopark - Kapalı</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Otopark - Misafir"<?if(in_array(">Otopark - Misafir",$genelozellikler_check)){?> checked<?}?>>Otopark - Misafir</label>
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Projeyi Ekle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<link rel="stylesheet" href="../js/upload/jquery.plupload.queue/css/jquery.plupload.queue.css" type="text/css" media="screen" />
<script type="text/javascript" src="../js/upload/plupload.full.min.js"></script>
<script type="text/javascript" src="../js/upload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
<script type="text/javascript" src="../js/upload/i18n/tr.js"></script>
<script type="text/javascript">
$(function() {
	$("#uploader").pluploadQueue({
		runtimes : 'html5,flash,silverlight,html4',
		url : 'image_upload.php',
		chunk_size: '1mb',
		max_file_count: 20,
		resize : false,
		filters : {
			max_file_size : '1000mb',
			mime_types: [
				{title : "Resim Dosyaları", extensions : "jpg,jpeg,gif,png"},
			]
		},
		rename: true,
		unique_names : true,
		multiple_queues : true,
		sortable: true,
		dragdrop: true,
		flash_swf_url : 'js/upload/Moxie.swf',
		silverlight_xap_url : 'js/upload/Moxie.xap'
	});
});
</script>
<?php include('footer.php'); ?>