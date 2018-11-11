<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$detaylar=$mysqli->query("select * from yardim_kategori where id='".$Id."'")->fetch_assoc();
$kategori_p=guvenlik($_POST['kategori']);	
$kategori=(!empty($kategori_p)?$kategori_p:$detaylar[kategori]);																																																													
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Yardım Kategori Düzenle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){												
process_mysql("update yardim_kategori set kategori='".$kategori."' where id='".$Id."'","yardim-kategori-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Yardım Kategori Düzenle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&Id=<?=$Id;?>" method="post" class="form-horizontal">
<fieldset>
<legend>Yardım Kategori Düzenle : <?=$baslik;?></legend>
<div class="control-group">
							  <label class="control-label" for="textarea2">Kategori Adı</label>
							  <div class="controls">
								<input type="text" name="kategori" value="<?=$kategori;?>">
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