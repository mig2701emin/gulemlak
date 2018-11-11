<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$baslik=guvenlik($_POST['baslik']);																																						
$icerik=$_POST['icerik'];														
$kategoriId=guvenlik($_POST['kategoriId']);		
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Yardım İçerik Ekle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){												
process_mysql("insert into yardim_icerik (id,baslik,icerik,kategoriId) VALUES(null,'$baslik','$icerik','$kategoriId')","yardim-icerik-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Yardım İçerik Ekle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>Yardım İçerik Ekle</legend>
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
							  <button type="submit" class="btn btn-primary">İçerik Ekle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>