<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$kategori=guvenlik($_POST['kategori']);																																						
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Yardım Kategori Ekle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){												
process_mysql("insert into yardim_kategori (id,kategori,ust,no_subcat) VALUES(null,'$kategori','0','1')","yardim-kategori-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Yardım Kategori Ekle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>Yardım Kategori Ekle</legend>
<div class="control-group">
							  <label class="control-label" for="textarea2">Kategori Adı</label>
							  <div class="controls">
								<input type="text" name="kategori" value="<?=$kategori;?>">
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