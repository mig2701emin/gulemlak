<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$detaylar=$mysqli->query("select * from sayfalar where Id='".$Id."'")->fetch_assoc();
$baslik_p=guvenlik($_POST['baslik']);	
$baslik=(!empty($baslik_p)?$baslik_p:$detaylar[baslik]);																								
$url=seo($baslik);														
$icerik_p=$_POST['icerik'];														
$icerik=(!empty($icerik_p)?$icerik_p:base64_decode($detaylar[icerik]));																									
$icerik_b64=base64_encode($icerik);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Sayfa Düzenle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){												
process_mysql("update sayfalar set baslik='".$baslik."',icerik='".$icerik_b64."' where Id='".$Id."'","sayfa-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Sayfa Düzenle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&Id=<?=$Id;?>" method="post" class="form-horizontal">
<fieldset>
<legend>Sayfa Düzenle : <?=$baslik;?></legend>
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
							  <button type="submit" class="btn btn-primary">Güncelle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>