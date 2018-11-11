<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$ayarlar=$mysqli->query("select * from ayarlar")->fetch_assoc();
$facebook_p=guvenlik($_POST['facebook']);
$twitter_p=guvenlik($_POST['twitter']);
$google_p=guvenlik($_POST['google']);
$youtube_p=guvenlik($_POST['youtube']);
$linkedin_p=guvenlik($_POST['linkedin']);
$digg_p=guvenlik($_POST['digg']);
$friendfeed_p=guvenlik($_POST['friendfeed']);
$myspace_p=guvenlik($_POST['myspace']);
$pinterest_p=guvenlik($_POST['pinterest']);
$facebook=(!empty($facebook_p)?$facebook_p:$ayarlar['facebook']);
$twitter=(!empty($twitter_p)?$twitter_p:$ayarlar['twitter']);
$google=(!empty($google_p)?$google_p:$ayarlar['google']);
$youtube=(!empty($youtube_p)?$youtube_p:$ayarlar['youtube']);
$linkedin=(!empty($linkedin_p)?$linkedin_p:$ayarlar['linkedin']);
$digg=(!empty($digg_p)?$digg_p:$ayarlar['digg']);
$friendfeed=(!empty($friendfeed_p)?$friendfeed_p:$ayarlar['friendfeed']);
$myspace=(!empty($myspace_p)?$myspace_p:$ayarlar['myspace']);
$pinterest=(!empty($pinterest_p)?$pinterest_p:$ayarlar['pinterest']);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Sosyal Ağ Ayarları
					</li>
				</ul>
			</div>
<?
if($action=='ok'){						
process_mysql("update ayarlar set facebook='$facebook',twitter='$twitter',google='$google',youtube='$youtube',linkedin='$linkedin',digg='$digg',friendfeed='$friendfeed',myspace='$myspace',pinterest='$pinterest'","sosyal-ag-ayarlari.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Sosyal Ağ Ayarları</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>Sosyal Ağ Ayarları</legend>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Facebook Sayfa Adresi</label>
							  <div class="controls">
								<input type="text" name="facebook" value="<?=$facebook;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Twitter Sayfa Adresi</label>
							  <div class="controls">
								<input type="text" name="twitter" value="<?=$twitter;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Google+ Sayfa Adresi</label>
							  <div class="controls">
								<input type="text" name="google" value="<?=$google;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Youtube Sayfa Adresi</label>
							  <div class="controls">
								<input type="text" name="youtube" value="<?=$youtube;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">LinkedIn Sayfa Adresi</label>
							  <div class="controls">
								<input type="text" name="linkedin" value="<?=$linkedin;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Digg Sayfa Adresi</label>
							  <div class="controls">
								<input type="text" name="digg" value="<?=$digg;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">FriendFeed Sayfa Adresi</label>
							  <div class="controls">
								<input type="text" name="friendfeed" value="<?=$friendfeed;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Myspace Sayfa Adresi</label>
							  <div class="controls">
								<input type="text" name="myspace" value="<?=$myspace;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Pinterest Sayfa Adresi</label>
							  <div class="controls">
								<input type="text" name="pinterest" value="<?=$pinterest;?>">
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