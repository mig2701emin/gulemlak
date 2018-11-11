<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$Id=guvenlik($_GET['Id']);
$yonetici=$mysqli->query("select * from yoneticiler where Id='".$Id."'")->fetch_assoc();
$username_p=guvenlik($_POST['username']);
$password_p=guvenlik($_POST['password']);
$username=(!empty($username_p)?$username_p:$yonetici['username']);
$password=(!empty($password_p)?$password_p:$yonetici['password']);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Yönetici Düzenle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){						
process_mysql("update yoneticiler set username='$username',password='$password' where Id='".$Id."'","yoneticiler.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Yönetici Düzenle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&Id=<?=$Id;?>" method="post" class="form-horizontal">
<fieldset>
<legend>Yönetici Düzenle : <?=$yonetici[username];?></legend>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Kullanıcı Adı</label>
							  <div class="controls">
								<input type="text" name="username" value="<?=$username;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Şifre</label>
							  <div class="controls">
								<input type="password" name="password">
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