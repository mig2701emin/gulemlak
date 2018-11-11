<?php include('header.php'); 
$action=guvenlik($_GET['action']);
$ayarlar=$mysqli->query("select * from ayarlar")->fetch_assoc();
$watermark_p=guvenlik($_POST['watermark']);
$watermark=(!empty($watermark_p)?$watermark_p:$ayarlar['watermark']);
$maxilan_p=guvenlik($_POST['maxilan']);
$maxilan=(!empty($maxilan_p)?$maxilan_p:$ayarlar['maxilan']);
$maxilan_magaza_p=guvenlik($_POST['maxilan_magaza']);
$maxilan_magaza=(!empty($maxilan_magaza_p)?$maxilan_magaza_p:$ayarlar['maxilan_magaza']);
$maxilan_supermagaza_p=guvenlik($_POST['maxilan_supermagaza']);
$maxilan_supermagaza=(!empty($maxilan_supermagaza_p)?$maxilan_supermagaza_p:$ayarlar['maxilan_supermagaza']);
$normal_resim_siniri_p=guvenlik($_POST['normal_resim_siniri']);
$normal_resim_siniri=(!empty($normal_resim_siniri_p)?$normal_resim_siniri_p:$ayarlar['normal_resim_siniri']);
$normal_magaza_resim_siniri_p=guvenlik($_POST['normal_magaza_resim_siniri']);
$normal_magaza_resim_siniri=(!empty($normal_magaza_resim_siniri_p)?$normal_magaza_resim_siniri_p:$ayarlar['normal_magaza_resim_siniri']);
$super_magaza_resim_siniri_p=guvenlik($_POST['super_magaza_resim_siniri']);
$super_magaza_resim_siniri=(!empty($super_magaza_resim_siniri_p)?$super_magaza_resim_siniri_p:$ayarlar['super_magaza_resim_siniri']);
$video_ekleme_p=guvenlik($_POST['video_ekleme']);
$video_ekleme=($video_ekleme_p!=''?$video_ekleme_p:$ayarlar['video_ekleme']);
$video_ekleme_ucreti_p=guvenlik($_POST['video_ekleme_ucreti']);
$video_ekleme_ucreti=(!empty($video_ekleme_ucreti_p)?$video_ekleme_ucreti_p:$ayarlar['video_ekleme_ucreti']);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						İlan Ayarları
					</li>
				</ul>
			</div>
<?php if($action=='ok'){						
process_mysql("update ayarlar set watermark='$watermark',maxilan='$maxilan',normal_resim_siniri='$normal_resim_siniri',maxilan_magaza='$maxilan_magaza',normal_magaza_resim_siniri='$normal_magaza_resim_siniri',maxilan_supermagaza='$maxilan_supermagaza',super_magaza_resim_siniri='$super_magaza_resim_siniri',video_ekleme='$video_ekleme',video_ekleme_ucreti='$video_ekleme_ucreti'","ilan-ayarlari.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> İlan Ayarları</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>İlan Ayarları</legend>
							<div class="control-group">
							  <label class="control-label" for="watermark">Resim Üzerine Yazılacak Yazı</label>
							  <div class="controls">
								<input type="text" name="watermark" value="<?=$watermark;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="maxilan">Maksimum Ücretsiz İlan Sayısı</label>
							  <div class="controls">
								<input type="text" name="maxilan" value="<?=$maxilan;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="normal_resim_siniri">Normal İlan Resim Sınırı</label>
							  <div class="controls">
								<input type="text" name="normal_resim_siniri" value="<?=$normal_resim_siniri;?>">* Maksimum İzin Verilen Resim Sınırı : 15
								</div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="maxilan_magaza">Normal Mağaza Maksimum İlan Sayısı</label>
							  <div class="controls">
								<input type="text" name="maxilan_magaza" value="<?=$maxilan_magaza;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="normal_magaza_resim_siniri">Normal Mağaza Resim Sınırı</label>
							  <div class="controls">
								<input type="text" name="normal_magaza_resim_siniri" value="<?=$normal_magaza_resim_siniri;?>">* Maksimum İzin Verilen Resim Sınırı : 15
								</div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="maxilan_supermagaza">Süper Mağaza Maksimum İlan Sayısı</label>
							  <div class="controls">
								<input type="text" name="maxilan_supermagaza" value="<?=$maxilan_supermagaza;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="super_magaza_resim_siniri">Süper Mağaza Resim Sınırı</label>
							  <div class="controls">
								<input type="text" name="super_magaza_resim_siniri" value="<?=$super_magaza_resim_siniri;?>">* Maksimum İzin Verilen Resim Sınırı : 15
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="video_ekleme">Video Yükleme</label>
							  <div class="controls">
								  <label class="radio inline">
									<input type="radio" name="video_ekleme" onclick="show_video_price(0);" value="0"<?php if($video_ekleme==0){?> checked<?php }?>>Pasif
								  </label>
								  <label class="radio inline">
									<input type="radio" name="video_ekleme" onclick="show_video_price(1);" value="1"<?php if($video_ekleme==1){?> checked<?php }?>>Aktif
								  <strong>* Video Yükleme Sisteminin Çalışması İçin Sunucunuzda FFmpeg + libx264 Yüklü Olması Gerekmektedir.</strong></label> 
								</div>
							</div>
							<div class="control-group" id="video_ekleme_ucreti"<?php if($video_ekleme==0){?> style="display:none"<?php }?>>
							  <label class="control-label" for="textarea2">Video Ekleme Ücreti</label>
							  <div class="controls">
								  <input type="text" name="video_ekleme_ucreti" value="<?=$video_ekleme_ucreti;?>"> TL
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