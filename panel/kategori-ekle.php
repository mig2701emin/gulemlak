<?
include('header.php'); 
$ust=guvenlik($_GET['ust']);
$action=guvenlik($_GET['action']);
if($ust==0){
$kategori="Ana Kategori";
}else{
$kategori_detay=$mysqli->query("select * from kategoriler where Id='".$ust."'")->fetch_assoc();
$kategori=$kategori_detay['kategori_adi'];
}
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Kategori Ekle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){
$kategori_adi = guvenlik($_POST['kategoriler'],1);
$kategoriler=explode("\n", $kategori_adi);
for ($i = 0; $i <= count($kategoriler); $i++) {
if($kategoriler[$i]!=''){
$kategori_SQL[] = "INSERT INTO kategoriler (Id,kategori_adi,ust_kategori,ilan_ucreti,magaza_normal_6,magaza_normal_12,magaza_super_6,magaza_super_12,icon,siralama,description,keywords,include_keywords) VALUES (NULL,'".$kategoriler[$i]."','".$ust."','0','0','0','0','0','','0','','','0')";	
}
}																	
process_mysql(implode("**",$kategori_SQL),"kategori-yonetimi.html?ust=".$ust);
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Kategori Ekle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&ust=<?=$ust;?>" method="post" class="form-horizontal">
<fieldset>
<legend>Kategori Ekle : <?=$kategori;?></legend>
<div class="control-group">
							  <label class="control-label" for="textarea2">Kategori Adları</label>
							  <div class="controls">
								<textarea name="kategoriler" style="width:300px;height:100px"><?=$kategori_adi;?></textarea>Her Satıra Bir Kategori Adı Yazınız!
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Kategori Ekle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>