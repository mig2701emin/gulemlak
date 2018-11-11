<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$detaylar=$mysqli->query("select * from pos_ayarlar where Id='".$Id."'")->fetch_assoc();
$detaylar_json=json_decode($detaylar[account],true);
$merchantId_p=guvenlik($_POST['merchantId']);	
$merchantId=(!empty($merchantId_p)?$merchantId_p:$detaylar_json[merchantId]);
$user_p=guvenlik($_POST['user']);	
$user=(!empty($user_p)?$user_p:$detaylar_json[user]);
$pass_p=guvenlik($_POST['pass']);	
$pass=(!empty($pass_p)?$pass_p:$detaylar_json[pass]);
$mode_p=guvenlik($_POST['mode']);
$mode=($mode_p!=''?$mode_p:$detaylar[mode]);
$terminalId_p=guvenlik($_POST['terminalId']);	
$terminalId=(!empty($terminalId_p)?$terminalId_p:$detaylar_json[terminalId]);
$terminalId_9_p=guvenlik($_POST['terminalId_9']);	
$terminalId_9=(!empty($terminalId_9_p)?$terminalId_9_p:$detaylar_json[terminalId_9]);
$provUserId_p=guvenlik($_POST['provUserId']);	
$provUserId=(!empty($provUserId_p)?$provUserId_p:$detaylar_json[provUserId]);
$provUserPass_p=guvenlik($_POST['provUserPass']);	
$provUserPass=(!empty($provUserPass_p)?$provUserPass_p:$detaylar_json[provUserPass]);
$details=json_encode(array(
"merchantId"=>$merchantId,
"user"=>$user,
"pass"=>$pass,
"terminalId"=>$terminalId,
"terminalId_9"=>$terminalId_9,
"provUserId"=>$provUserId,
"provUserPass"=>$provUserPass
));
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
function toggle_password2()
{
if($("input[name='provUserPass']").prop("type")=="text"){
$("input[name='provUserPass']").prop("type","password");
}else{
$("input[name='provUserPass']").prop("type","text");
}
}
</script>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Sanal Pos Ayar Düzenle - <?=$detaylar[name];?>
					</li>
				</ul>
			</div>
<?
if($action=='ok'){												
process_mysql("update pos_ayarlar set account='".$details."',mode='".$mode."' where Id='".$Id."'","sanal-pos-ayarlari.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Sanal Pos Ayar Düzenle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&Id=<?=$Id;?>" method="post" class="form-horizontal">
<fieldset>
<legend>Sanal Pos Ayar Düzenle - <?=$detaylar[name];?></legend>
<div class="control-group">
							  <label class="control-label" for="textarea2">İşyeri No</label>
							  <div class="controls">
								<input type="text" name="merchantId" value="<?=$merchantId;?>">
								</div>
							</div>
<div class="control-group">
							  <label class="control-label" for="textarea2">Kullanıcı Adı</label>
							  <div class="controls">
								<input type="text" name="user" value="<?=$user;?>">
								</div>
							</div>
<div class="control-group">
							  <label class="control-label" for="textarea2">Şifre</label>
							  <div class="controls">
								<input type="password" name="pass" value="<?=$pass;?>"> <a href="javascript:toggle_password();">Göster/Gizle</a>
								</div>
							</div>
<?if($detaylar[code]=='garanti'){?>
<div class="control-group">
							  <label class="control-label" for="textarea2">Terminal ID</label>
							  <div class="controls">
								<input type="text" name="terminalId" value="<?=$terminalId;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Terminal ID - 9 Haneli</label>
							  <div class="controls">
								<input type="text" name="terminalId_9" value="<?=$terminalId_9;?>"> İşyeri No 9 Haneye Tamamlanarak Yazılmalıdır.
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Provizyon Kullanıcısı</label>
							  <div class="controls">
								<input type="text" name="provUserId" value="<?=$provUserId;?>">
								</div>
							</div>
														<div class="control-group">
							  <label class="control-label" for="textarea2">Provizyon Şifresi</label>
							  <div class="controls">
								<input type="password" name="provUserPass" value="<?=$provUserPass;?>"> <a href="javascript:toggle_password2();">Göster/Gizle</a>
								</div>
							</div>
<?}?>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Mod</label>
							  <div class="controls">
							  <label class="radio inline">
								<input type="radio" name="mode" id="mode_1" value="0"<?if($mode==0){?> checked<?}?>>Gerçek Mod
								</label>
								<label class="radio inline">
								<input type="radio" name="mode" id="mode_2" value="1"<?if($mode==1){?> checked<?}?>>Test Mod
								</label>
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
