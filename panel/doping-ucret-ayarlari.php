<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$ucretler=$mysqli->query("select * from dopingler");
while($ucret=$ucretler->fetch_assoc()){
$doping_ucret_p[$ucret[Id]]=guvenlik($_POST['ucret-'.$ucret[Id]]);
$doping_ucret[$ucret[Id]]=($doping_ucret_p[$ucret[Id]]!=''?$doping_ucret_p[$ucret[Id]]:$ucret['ucret']);
$querys[]="update dopingler set ucret='".$doping_ucret[$ucret[Id]]."' where Id='".$ucret[Id]."'";
}?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Doping Ücret Ayarları
					</li>
				</ul>
			</div>
<?
if($action=='ok'){						
process_mysql(implode("**",$querys),"doping-ucret-ayarlari.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Doping Ücret Ayarları</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<ul class="nav nav-tabs" id="myTab">
<?
$ucretSQL2=$mysqli->query("select * from dopingler");
while($ucret2=$ucretSQL2->fetch_assoc()){
?>
							<li><a href="#ucret-<?=$ucret2[Id];?>"><?=$ucret2[doping];?></a></li>
							<?}?>
						</ul>
<fieldset>
<legend>Doping Ücret Ayarları</legend>
<div id="myTabContent" class="tab-content">
<?
$ucretSQL3=$mysqli->query("select * from dopingler");
while($ucret3=$ucretSQL3->fetch_assoc()){
?>
							<div class="tab-pane" id="ucret-<?=$ucret3[Id];?>">
							<div class="control-group">
							  <label class="control-label" for="textarea2">Doping</label>
							  <div class="controls">
								<?=$ucret3[doping];?>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Ücret</label>
							  <div class="controls">
								<input type="text" name="ucret-<?=$ucret3[Id];?>" value="<?=$doping_ucret[$ucret3[Id]];?>"> TL <strong>(Kuruş Yazmayınız)</strong>
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