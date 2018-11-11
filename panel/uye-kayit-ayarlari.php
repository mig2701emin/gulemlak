<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$ayarlar=$mysqli->query("select aktivasyon_turu,sms_bilgiler from ayarlar")->fetch_assoc();
$ayarlar_json=json_decode($ayarlar[sms_bilgiler],true);
$aktivasyon_turu_p=guvenlik($_POST['aktivasyon_turu']);
$aktivasyon_turu=($aktivasyon_turu_p!=''?$aktivasyon_turu_p:$ayarlar['aktivasyon_turu']);
$user_p=guvenlik($_POST['user']);
$user=(!empty($user_p)?$user_p:$ayarlar_json['user']);
$pass_p=guvenlik($_POST['pass']);
$pass=(!empty($pass_p)?$pass_p:$ayarlar_json['pass']);
$sender_p=guvenlik($_POST['sender']);
$sender=(!empty($sender_p)?$sender_p:$ayarlar_json['sender']);
$sms_bilgiler=json_encode(array(
"user"=>$user,
"pass"=>$pass,
"sender"=>$sender
),true);
?>
<script>
function toggle_password()
{
if($("input[name='pass']").prop("type")=="text"){
$("input[name='pass']").prop("type","password");
}else{
$("input[name='pass']").prop("type","text");
}
}
</script>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Üye Kayıt Ayarları
					</li>
				</ul>
			</div>
<?
if($action=='ok'){							
process_mysql("update ayarlar set aktivasyon_turu='$aktivasyon_turu',sms_bilgiler='$sms_bilgiler'","uye-kayit-ayarlari.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Üye Kayıt Ayarları</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>Üye Kayıt Ayarları</legend>
							<div class="control-group">
								<label class="control-label">Aktivasyon Türü</label>
								<div class="controls">
								  <label class="radio inline">
									<input type="radio" name="aktivasyon_turu" onclick="show_sms_details(0);" value="0"<?if($aktivasyon_turu==0){?> checked<?}?>>E-Mail İle Doğrulama
								  </label>
								  <label class="radio inline">
									<input type="radio" name="aktivasyon_turu" onclick="show_sms_details(1);" value="1"<?if($aktivasyon_turu==1){?> checked<?}?>>SMS İle Doğrulama
								  </label>
								</div>
							  </div>
							<div class="control-group sms_details"<?if($aktivasyon_turu=='0'){?> style="display:none"<?}?>>
							  <label class="control-label" for="textarea2">Kullanılan SMS Hizmeti</label>
							  <div class="controls">
								<a href="https://www.iletimerkezi.com" rel="nofollow" target="_blank">İleti Merkezi</a>
								</div>
							</div>
							<div class="control-group sms_details"<?if($aktivasyon_turu=='0'){?> style="display:none"<?}?>>
							  <label class="control-label" for="textarea2">Kullanıcı Adı</label>
							  <div class="controls">
								<input type="text" name="user" value="<?=$user;?>">
								</div>
							</div>
							<div class="control-group sms_details"<?if($aktivasyon_turu=='0'){?> style="display:none"<?}?>>
							  <label class="control-label" for="textarea2">Şifre</label>
							  <div class="controls">
								<input type="password" name="pass" value="<?=$pass;?>"> <a href="javascript:toggle_password();">Göster/Gizle</a>
								</div>
							</div>
							<div class="control-group sms_details"<?if($aktivasyon_turu=='0'){?> style="display:none"<?}?>>
							  <label class="control-label" for="textarea2">Gönderen</label>
							  <div class="controls">
								<input type="text" name="sender" value="<?=$sender;?>">
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