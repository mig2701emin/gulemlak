<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$kategoriler=$mysqli->query("select * from kategoriler where ust_kategori='0'");
$ayarlar=$mysqli->query("select * from ayarlar")->fetch_assoc();
while($kategori=$kategoriler->fetch_assoc()){
$magaza_ucret_p[$kategori[Id].'-6ay-normal']=guvenlik($_POST['magaza-ucreti-'.$kategori[Id].'-6ay-normal']);
$magaza_ucret[$kategori[Id].'-6ay-normal']=($magaza_ucret_p[$kategori[Id].'-6ay-normal']!=''?$magaza_ucret_p[$kategori[Id].'-6ay-normal']:$kategori['magaza_normal_6']);
$magaza_ucret_p[$kategori[Id].'-12ay-normal']=guvenlik($_POST['magaza-ucreti-'.$kategori[Id].'-12ay-normal']);
$magaza_ucret[$kategori[Id].'-12ay-normal']=($magaza_ucret_p[$kategori[Id].'-12ay-normal']!=''?$magaza_ucret_p[$kategori[Id].'-12ay-normal']:$kategori['magaza_normal_12']);
$magaza_ucret_p[$kategori[Id].'-6ay-super']=guvenlik($_POST['magaza-ucreti-'.$kategori[Id].'-6ay-super']);
$magaza_ucret[$kategori[Id].'-6ay-super']=($magaza_ucret_p[$kategori[Id].'-6ay-normal']!=''?$magaza_ucret_p[$kategori[Id].'-6ay-super']:$kategori['magaza_super_6']);
$magaza_ucret_p[$kategori[Id].'-12ay-super']=guvenlik($_POST['magaza-ucreti-'.$kategori[Id].'-12ay-super']);
$magaza_ucret[$kategori[Id].'-12ay-super']=($magaza_ucret_p[$kategori[Id].'-12ay-super']!=''?$magaza_ucret_p[$kategori[Id].'-12ay-super']:$kategori['magaza_super_12']);
$querys[]="update kategoriler set magaza_normal_6='".$magaza_ucret[$kategori[Id].'-6ay-normal']."',magaza_normal_12='".$magaza_ucret[$kategori[Id].'-12ay-normal']."',magaza_super_6='".$magaza_ucret[$kategori[Id].'-6ay-super']."',magaza_super_12='".$magaza_ucret[$kategori[Id].'-12ay-super']."' where Id='".$kategori[Id]."'";
}
$magaza_ucret_p['hepsibir-6ay-normal']=guvenlik($_POST['magaza-ucreti-hepsibir-6ay-normal']);
$magaza_ucret['hepsibir-6ay-normal']=($magaza_ucret_p['hepsibir-6ay-normal']!=''?$magaza_ucret_p['hepsibir-6ay-normal']:$ayarlar['hepsibir_normal_6']);
$magaza_ucret_p['hepsibir-12ay-normal']=guvenlik($_POST['magaza-ucreti-hepsibir-12ay-normal']);
$magaza_ucret['hepsibir-12ay-normal']=($magaza_ucret_p['hepsibir-12ay-normal']!=''?$magaza_ucret_p['hepsibir-12ay-normal']:$ayarlar['hepsibir_normal_12']);
$magaza_ucret_p['hepsibir-6ay-super']=guvenlik($_POST['magaza-ucreti-hepsibir-6ay-super']);
$magaza_ucret['hepsibir-6ay-super']=($magaza_ucret_p['hepsibir-6ay-normal']!=''?$magaza_ucret_p['hepsibir-6ay-super']:$ayarlar['hepsibir_super_6']);
$magaza_ucret_p['hepsibir-12ay-super']=guvenlik($_POST['magaza-ucreti-hepsibir-12ay-super']);
$magaza_ucret['hepsibir-12ay-super']=($magaza_ucret_p['hepsibir-12ay-super']!=''?$magaza_ucret_p['hepsibir-12ay-super']:$ayarlar['hepsibir_super_12']);
$querys[]="update ayarlar set hepsibir_normal_6='".$magaza_ucret['hepsibir-6ay-normal']."',hepsibir_normal_12='".$magaza_ucret['hepsibir-12ay-normal']."',hepsibir_super_6='".$magaza_ucret['hepsibir-6ay-super']."',hepsibir_super_12='".$magaza_ucret['hepsibir-12ay-super']."'";
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Mağaza Ücret Ayarları
					</li>
				</ul>
			</div>
<?
if($action=='ok'){						
process_mysql(implode("**",$querys),"magaza-ucret-ayarlari.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Mağaza Ücret Ayarları</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<ul class="nav nav-tabs" id="myTab">
<?
$kategoriSQL2=$mysqli->query("select * from kategoriler where ust_kategori='0'");
while($kategori2=$kategoriSQL2->fetch_assoc()){
?>
							<li><a href="#kategori-<?=$kategori2[Id];?>"><?=$kategori2[kategori_adi];?></a></li>
							<?}?>
							<li><a href="#kategori-hepsibir">Hepsi Bir</a></li>
						</ul>
<fieldset>
<legend>Mağaza Ücret Ayarları</legend>
<div id="myTabContent" class="tab-content">
<?
$kategoriSQL3=$mysqli->query("select * from kategoriler where ust_kategori='0'");
while($kategori3=$kategoriSQL3->fetch_assoc()){
?>
							<div class="tab-pane" id="kategori-<?=$kategori3[Id];?>">
							<div class="control-group">
							  <label class="control-label" for="textarea2">6 Aylık Normal Mağaza</label>
							  <div class="controls">
								<input type="text" name="magaza-ucreti-<?=$kategori3[Id];?>-6ay-normal" value="<?=$magaza_ucret[$kategori3[Id].'-6ay-normal'];?>"> TL
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">12 Aylık Normal Mağaza</label>
							  <div class="controls">
								<input type="text" name="magaza-ucreti-<?=$kategori3[Id];?>-12ay-normal" value="<?=$magaza_ucret[$kategori3[Id].'-12ay-normal'];?>"> TL
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">6 Aylık Süper Mağaza</label>
							  <div class="controls">
								<input type="text" name="magaza-ucreti-<?=$kategori3[Id];?>-6ay-super" value="<?=$magaza_ucret[$kategori3[Id].'-6ay-super'];?>"> TL
								</div>
							</div><div class="control-group">
							  <label class="control-label" for="textarea2">12 Aylık Süper Mağaza</label>
							  <div class="controls">
								<input type="text" name="magaza-ucreti-<?=$kategori3[Id];?>-12ay-super" value="<?=$magaza_ucret[$kategori3[Id].'-12ay-super'];?>"> TL
								</div>
							</div>
							</div>
<?}?>
							<div class="tab-pane" id="kategori-hepsibir">
							<div class="control-group">
							  <label class="control-label" for="textarea2">6 Aylık Normal Mağaza</label>
							  <div class="controls">
								<input type="text" name="magaza-ucreti-hepsibir-6ay-normal" value="<?=$magaza_ucret['hepsibir-6ay-normal'];?>"> TL
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">12 Aylık Normal Mağaza</label>
							  <div class="controls">
								<input type="text" name="magaza-ucreti-hepsibir-12ay-normal" value="<?=$magaza_ucret['hepsibir-12ay-normal'];?>"> TL
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">6 Aylık Süper Mağaza</label>
							  <div class="controls">
								<input type="text" name="magaza-ucreti-hepsibir-6ay-super" value="<?=$magaza_ucret['hepsibir-6ay-super'];?>"> TL
								</div>
							</div><div class="control-group">
							  <label class="control-label" for="textarea2">12 Aylık Süper Mağaza</label>
							  <div class="controls">
								<input type="text" name="magaza-ucreti-hepsibir-12ay-super" value="<?=$magaza_ucret['hepsibir-12ay-super'];?>"> TL
								</div>
							</div>
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