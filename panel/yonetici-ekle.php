<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$username=guvenlik($_POST['username']);
$password=guvenlik($_POST['password']);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Yönetici Ekle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){						
process_mysql("insert into yoneticiler (Id,username,password) VALUES(null,'$username','$password');","yoneticiler.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Yönetici Ekle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>Yönetici Ekle</legend>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Kullanıcı Adı</label>
							  <div class="controls">
								<input type="text" name="username">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Şifre</label>
							  <div class="controls">
								<input type="password" name="password">
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Ekle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>