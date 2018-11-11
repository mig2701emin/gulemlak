<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$baslik=guvenlik($_POST['baslik']);																										
$url=seo($baslik);														
$icerik=guvenlik($_POST['icerik'],1);														
$icerik_b64=base64_encode($icerik);
$tarih=date("Y-m-d");
$durum=guvenlik($_POST['durum']);	
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Haber Ekle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){												
process_mysql("insert into haberler (Id,baslik,seo_url,aciklama,eklenme_tarihi,durum) VALUES(null,'$baslik','$url','$icerik_b64','$tarih','$durum')","haber-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Haber Ekle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>Haber Ekle</legend>
<div class="control-group">
							  <label class="control-label" for="textarea2">Haber Başlığı</label>
							  <div class="controls">
								<input type="text" name="baslik" value="<?=$baslik;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Haber İçeriği</label>
							  <div class="controls">
								<textarea name="icerik" class="ckeditor"><?=$icerik;?></textarea>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Haber Durumu</label>
							  <div class="controls">
								<select name="durum" data-rel="chosen">
								<option value="1"<?if($durum==1){?> selected<?}?>>Yayınla</option>
								<option value="0"<?if($durum==0){?> selected<?}?>>Pasif</option>
								</select>
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Haberi Ekle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>