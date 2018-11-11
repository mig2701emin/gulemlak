<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$baslik=guvenlik($_POST['baslik']);																										
$url=seo($baslik);														
$icerik=$_POST['icerik'];														
$icerik_b64=base64_encode($icerik);		
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Sayfa Ekle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){												
process_mysql("insert into sayfalar (Id,baslik,url,icerik) VALUES(null,'$baslik','$url','$icerik_b64')","sayfa-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Sayfa Ekle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>Sayfa Ekle</legend>
<div class="control-group">
							  <label class="control-label" for="textarea2">Sayfa Başlığı</label>
							  <div class="controls">
								<input type="text" name="baslik" value="<?=$baslik;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Sayfa İçeriği</label>
							  <div class="controls">
								<textarea name="icerik" class="ckeditor"><?=$icerik;?></textarea>
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Sayfa Ekle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>