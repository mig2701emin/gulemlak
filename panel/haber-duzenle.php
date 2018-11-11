<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$haber=$mysqli->query("select * from haberler where Id='".$Id."'")->fetch_assoc();
$baslik_p=guvenlik($_POST['baslik']);																																								
$icerik_p=guvenlik($_POST['icerik'],1);														
$durum_p=guvenlik($_POST['durum']);	
$baslik=(!empty($baslik_p)?$baslik_p:$haber[baslik]);
$icerik=(!empty($icerik_p)?$icerik_p:base64_decode($haber[aciklama]));
$durum=(!empty($durum_p)?$durum_p:$haber[durum]);
$icerik_b64=base64_encode($icerik);
$url=seo($baslik);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Haber Düzenle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){												
process_mysql("update haberler set baslik='$baslik',seo_url='$url',aciklama='$icerik_b64',durum='$durum' where Id='$Id'","haber-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Haber Düzenle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?Id=<?=$Id;?>&action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>Haber Düzenle: <?=$haber[baslik];?></legend>
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
								<option value="1"<?if($durum==1){?> selected<?}?>>Aktif</option>
								<option value="0"<?if($durum==0){?> selected<?}?>>Pasif</option>
								</select>
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Haberi Düzenle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>