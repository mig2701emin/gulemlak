<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$ayarlar=$mysqli->query("select * from ayarlar")->fetch_assoc();
$adres_p=guvenlik($_POST['adres']);
$mobil_p=guvenlik($_POST['mobil']);
$telefon_p=guvenlik($_POST['telefon']);
$fax_p=guvenlik($_POST['fax']);
$adres=(!empty($adres_p)?$adres_p:$ayarlar['adres']);
$mobil=(!empty($mobil_p)?$mobil_p:$ayarlar['mobil']);
$telefon=(!empty($telefon_p)?$telefon_p:$ayarlar['telefon']);
$fax=(!empty($fax_p)?$fax_p:$ayarlar['fax']);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						İletişim Bilgileri
					</li>
				</ul>
			</div>
<?
if($action=='ok'){						
process_mysql("update ayarlar set adres='$adres',mobil='$mobil',telefon='$telefon',fax='$fax'","iletisim-bilgileri.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> İletişim Bilgileri</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>İletişim Bilgileri</legend>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Adres</label>
							  <div class="controls">
								<textarea name="adres" style="width:300px;height:100px"><?=$adres;?></textarea>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Mobil</label>
							  <div class="controls">
								<input type="text" name="mobil" value="<?=$mobil;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Telefon</label>
							  <div class="controls">
								<input type="text" name="telefon" value="<?=$telefon;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Fax</label>
							  <div class="controls">
								<input type="text" name="fax" value="<?=$fax;?>">
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