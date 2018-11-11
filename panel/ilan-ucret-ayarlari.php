<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$kategoriler=$mysqli->query("select * from kategoriler where ust_kategori='0'");
while($kategori=$kategoriler->fetch_assoc()){
$kat_p[$kategori[Id]]=guvenlik($_POST['ilan-ucreti-'.$kategori[Id]]);
$kat[$kategori[Id]]=($kat_p[$kategori[Id]]!=''?$kat_p[$kategori[Id]]:$kategori['ilan_ucreti']);
$querys[]="update kategoriler set ilan_ucreti='".$kat[$kategori[Id]]."' where Id='".$kategori[Id]."'";
}
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						İlan Ücret Ayarları
					</li>
				</ul>
			</div>
<?
if($action=='ok'){						
process_mysql(implode("**",$querys),"ilan-ucret-ayarlari.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> İlan Ücret Ayarları</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>İlan Ücret Ayarları</legend>
<?
$cats=$mysqli->query("select * from kategoriler where ust_kategori='0'");
while($cat=$cats->fetch_assoc()){
?>
							<div class="control-group">
							  <label class="control-label" for="textarea2"><?=$cat[kategori_adi];?></label>
							  <div class="controls">
								<input type="text" name="ilan-ucreti-<?=$cat[Id];?>" value="<?=$kat[$cat[Id]];?>"> TL
								</div>
							</div>
							<?}?>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Güncelle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>