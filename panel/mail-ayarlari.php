<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$ayarlar=$mysqli->query("select * from ayarlar")->fetch_assoc();
$mailhost_p=guvenlik($_POST['mailhost']);
$mailhost=(!empty($mailhost_p)?$mailhost_p:$ayarlar['mailhost']);
$sitemail_p=guvenlik($_POST['sitemail']);
$sitemail=(!empty($sitemail_p)?$sitemail_p:$ayarlar['sitemail']);
$mailsifresi_p=guvenlik($_POST['mailsifresi']);
$mailsifresi=(!empty($mailsifresi_p)?$mailsifresi_p:$ayarlar['mailsifresi']);
?>
<script>
function toggle_password()
{
if($("input[name='mailsifresi']").prop("type")=="text"){
$("input[name='mailsifresi']").prop("type","password");
}else{
$("input[name='mailsifresi']").prop("type","text");
}
}
</script>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Mail Ayarları
					</li>
				</ul>
			</div>
<?
if($action=='ok'){						
process_mysql("update ayarlar set mailhost='$mailhost',sitemail='$sitemail',mailsifresi='$mailsifresi'","mail-ayarlari.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Mail Ayarları</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>Mail Ayarları</legend>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Mail Sunucusu</label>
							  <div class="controls">
								<input type="text" name="mailhost" value="<?=$mailhost;?>"> Varsayılan : mail.<?=$nowww;?>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Mail Adresi</label>
							  <div class="controls">
								<input type="text" name="sitemail" value="<?=$sitemail;?>"> Varsayılan : destek@<?=$nowww;?>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Mail Şifreniz</label>
							  <div class="controls">
								<input type="password" name="mailsifresi" value="<?=$mailsifresi;?>"> <a href="javascript:toggle_password();">Göster/Gizle</a>
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