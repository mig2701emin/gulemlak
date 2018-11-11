<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$detaylar=$mysqli->query("select * from yardim_icerik where id='".$Id."'")->fetch_assoc();
$baslik_p=guvenlik($_POST['baslik']);	
$baslik=(!empty($baslik_p)?$baslik_p:$detaylar[baslik]);																																					
$icerik_p=$_POST['icerik'];														
$icerik=(!empty($icerik_p)?$icerik_p:$detaylar[icerik]);
$kategoriId_p=guvenlik($_POST['kategoriId']);														
$kategoriId=(!empty($kategoriId_p)?$kategoriId_p:$detaylar[kategoriId]);																									
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Yardım İçerik Düzenle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){												
process_mysql("update yardim_icerik set baslik='".$baslik."',icerik='".addslashes($icerik)."',kategoriId='".$kategoriId."' where id='".$Id."'","yardim-icerik-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Yardım İçerik Düzenle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&Id=<?=$Id;?>" method="post" class="form-horizontal">
<fieldset>
<legend>Yardım İçerik Düzenle : <?=$baslik;?></legend>
<div class="control-group">
							  <label class="control-label" for="textarea2">İçerik Başlığı</label>
							  <div class="controls">
								<input type="text" name="baslik" value="<?=$baslik;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">İçerik</label>
							  <div class="controls">
								<textarea name="icerik" class="ckeditor"><?=$icerik;?></textarea>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Kategori</label>
							  <div class="controls">
								<select name="kategoriId">
								<option value="">Seçiniz</option>
								<?
								$kats=$mysqli->query("select id,kategori from yardim_kategori");
								while($kat=$kats->fetch_assoc()){
								?>
								<option value="<?=$kat['id'];?>"<?if($kat['id']==$kategoriId){?> selected<?}?>><?=$kat['kategori'];?></option>
								<?}?>
								</select>
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