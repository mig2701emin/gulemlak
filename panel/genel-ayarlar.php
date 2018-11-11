<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$ayarlar=$mysqli->query("select * from ayarlar")->fetch_assoc();
$baslik_p=guvenlik($_POST['baslik']);
$aciklama_p=guvenlik($_POST['aciklama']);
$kelimeler_p=guvenlik($_POST['kelimeler']);
$aciklama_p=guvenlik($_POST['aciklama']);
$durum_p=guvenlik($_POST['durum']);
$connection_type_p=guvenlik($_POST['connection_type']);
$ssl_mode_p=guvenlik($_POST['ssl_mode']);
$bakim_tarih_p=guvenlik($_POST['bakim_tarih']);
$analytics_p=addslashes($_POST['analytics']);
$baslik=(!empty($baslik_p)?$baslik_p:$ayarlar['title']);
$aciklama=(!empty($aciklama_p)?$aciklama_p:$ayarlar['description']);
$kelimeler=(!empty($kelimeler_p)?$kelimeler_p:$ayarlar['keywords']);
$connection_type=($connection_type_p!=''?$connection_type_p:$ayarlar['connection_type']);
$ssl_mode=($ssl_mode_p!=''?$ssl_mode_p:$ayarlar['ssl_mode']);
$durum=($durum_p!=''?$durum_p:$ayarlar['bakim']);
$bakim_tarih=($bakim_tarih_p!=''?$bakim_tarih_p:$ayarlar['bakim_tarih']);
$analytics=(!empty($analytics_p)?$analytics_p:$ayarlar['analytics']);
$img=$_FILES['img'];
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Genel Ayarlar
					</li>
				</ul>
			</div>
<?
if($action=='ok'){
if($img['tmp_name']!='' and $admin_kilit==0){
$yeni_isim="../images/logo";
include("class.image_upload.php");
$logo=str_replace("../images/","",$DestinationFile).".".$fileType;	
$add_query=",logo='".$logo."'";
}else{
$add_query="";
}								
process_mysql("update ayarlar set title='$baslik',description='$aciklama',keywords='$kelimeler',ssl_mode='$ssl_mode',connection_type='$connection_type',bakim='$durum',bakim_tarih='".str_replace(array(" ",":","-"),"",$bakim_tarih)."',analytics='$analytics'".$add_query,"genel-ayarlar.html");
}
?>
<script src="js/jquery-ui-timepicker-addon.js"></script>
			<script>
			$(document).ready(function(){
			$("input[name='bakim_tarih']").datetimepicker({
			timeFormat: 'HH:mm:ss',
			currentText: 'Güncel Zaman',
			closeText: 'Tamam',
			timeText: 'Zaman',
			hourText: 'Saat',
			minuteText: 'Dakika',
			secondText: 'Saniye',
			hourMax: 24
			});
			});
			</script>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Genel Ayarlar</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal" enctype="multipart/form-data">
<fieldset>
<legend>Genel Ayarlar</legend>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Site Başlığı</label>
							  <div class="controls">
								<input type="text" name="baslik" value="<?=$baslik;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Site Açıklaması</label>
							  <div class="controls">
								<textarea name="aciklama" style="width:300px;height:100px"><?=$aciklama;?></textarea>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Anahtar Kelimeler</label>
							  <div class="controls">
								<textarea name="kelimeler" style="width:300px;height:100px"><?=$kelimeler;?></textarea>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Google Analytics Kodunuz</label>
							  <div class="controls">
								<textarea name="analytics" style="width:300px;height:100px"><?=$analytics;?></textarea>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">URL Bağlantı Türü</label>
								<div class="controls">
								  <label class="radio inline">
									<input type="radio" name="connection_type" value="1"<?if($connection_type==1){?> checked<?}?>><?=$nowww;?>
								  </label>
								  <label class="radio inline">
									<input type="radio" name="connection_type" value="2"<?if($connection_type==2){?> checked<?}?>>www.<?=$nowww;?>
								  </label>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label">SSL Durumu</label>
								<div class="controls">
								  <label class="radio inline">
									<input type="radio" name="ssl_mode" value="0"<?if($ssl_mode==0){?> checked<?}?>>Pasif
								  </label>
								  <label class="radio inline">
									<input type="radio" name="ssl_mode" value="1"<?if($ssl_mode==1){?> checked<?}?>>Aktif <strong>* Sanal Pos Kullanımı İçin SSL Gerekmektedir.</strong>
								  </label>
								</div>
							  </div>
							<div class="control-group">
								<label class="control-label">Site Durumu</label>
								<div class="controls">
								  <label class="radio inline">
									<input type="radio" name="durum" onclick="show_end_time(0);" value="0"<?if($durum==0){?> checked<?}?>>Açık
								  </label>
								  <label class="radio inline">
									<input type="radio" name="durum" onclick="show_end_time(1);" value="1"<?if($durum==1){?> checked<?}?>>Bakımda
								  </label>
								</div>
							  </div>
							  <div class="control-group" id="bakim_tarih"<?if($durum!=1){?> style="display:none"<?}?>>
							  <label class="control-label" for="textarea2">Bakım Bitiş Tarihi</label>
							  <div class="controls">
								<input type="text" name="bakim_tarih" value="<?=$bakim_tarih;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Logo</label>
							  <div class="controls">
								<input type="file" name="img">
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Ayarları Güncelle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>