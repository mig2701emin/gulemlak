<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$detaylar=$mysqli->query("select * from paypal_ayarlar")->fetch_assoc();
$detaylar_json=json_decode($detaylar[login_details],true);
$email_p=guvenlik($_POST['email']);	
$email=(!empty($email_p)?$email_p:$detaylar_json[email]);
$certificate_sign_p=guvenlik($_POST['certificate_sign']);	
$certificate_sign=(!empty($certificate_sign_p)?$certificate_sign_p:$detaylar_json[certificate_sign]);
$test_mode_p=guvenlik($_POST['test_mode']);	
$test_mode=($test_mode_p!=''?$test_mode_p:$detaylar[test_mode]);
$status_p=guvenlik($_POST['status']);	
$status=($status_p!=''?$status_p:$detaylar[status]);
$login_details=json_encode(array(
"email"=>$email,
"certificate_sign"=>$certificate_sign
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
						Paypal Ayar Düzenle - <?=$detaylar[name];?>
					</li>
				</ul>
			</div>
<?
if($action=='ok'){												
process_mysql("update paypal_ayarlar set login_details='".$login_details."',test_mode='".$test_mode."',status='".$status."'","paypal-ayarlari.html");
}elseif($action=='generateKey'){
global $admin_kilit;
if($admin_kilit==0){
$req_key = openssl_pkey_new($config = array(
    "digest_alg" => "sha1",
    "private_key_bits" => 1024,
    "private_key_type" => OPENSSL_KEYTYPE_RSA
));
$create_key=openssl_pkey_export_to_file($req_key,"../libs/paypal_keys/paypal_priv.pem");
$dn = array(
    "countryName" => "TR",
    "organizationName" => $title,
    "organizationalUnitName" => "www.aydinwebyazilim.com",
    "commonName" => $nowww
);
$req_csr = openssl_csr_new($dn, $req_key);
$req_cert = openssl_csr_sign($req_csr, NULL, $req_key, 7300);
$create_cert=openssl_x509_export_to_file($req_cert,"../libs/paypal_keys/paypal_crt.pem");
if($create_key and $create_cert){
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>Sertifika Oluşturuldu.</div>';
$file="../libs/paypal_keys/paypal_crt.pem";
if (file_exists($file)){
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    exit(readfile($file));
}
}else{
echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>Sertifika Oluşturulamadı, Lütfen Tekrar Deneyiniz.</div>';
}
}
}
?>
<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>Önemli * : Paypal Ödeme Sistemini Kullanabilmek İçin Lütfen Aşağıdaki Talimatları Uygulayınız.
<ol class="paypal_installation" style="margin-top:15px">
<li>Öncelikle <a href="?action=generateKey" target="_blank">Buraya</a> Tıklayıp Sertifika Oluşturunuz.</li>
<li>Paypal Hesabınıza Giriş Yapınız.</li>
<li><a href="https://www.paypal.com/cgi-bin/customerprofileweb?cmd=_profile-website-cert" target="_blank" rel="nofollow">Buraya</a> Tıklayıp İndirmiş Olduğunuz Sertifika Dosyasını Ekleyiniz. Paypal Ortak Sertifikasını "İndir" Butonuna Tıklayıp İndiriniz.</li>
<li>İndirdiğiniz "paypal_cert_pem.txt" Dosyasını "libs/paypal_keys" Klasörünün İçerisine Atınız.</li>
<li>Aşağıdaki Bölüme Paypal Bilgilerinizi Giriniz. Sertifika No Alanına Paypal Sertifika Sayfasının Alt Bölümünde Bulunan "Sertifika No" Bilgisini Giriniz.
<li><a href="https://www.paypal.com/cgi-bin/customerprofileweb?cmd=_profile-language-encoding" target="_blank" rel="nofollow">Buraya</a> Tıklayınız, Gelen Sayfada "Diğer Seçenekler" Butonuna Tıklayınız. Kodlamayı "UTF-8" Olarak Değiştirip Ayarları Kaydediniz.</li>
<li><a href="https://www.paypal.com/cgi-bin/customerprofileweb?cmd=_profile-ipn-notify" target="_blank" rel="nofollow">Buraya</a> Tıklayıp IPN Sistemini Aktifleştiriniz. IPN Bildirim URL Alanına "<?=$site_adresi;?>/libs/paypal_ipn.php" Yazıp Ayarları Kaydediniz.</li>
<li><a href="https://www.paypal.com/cgi-bin/customerprofileweb?cmd=_profile-website-payments" target="_blank" rel="nofollow">Buraya</a> Tıklayınız. Açılan Sayfada "Şifrelenmeyen Web Sitesi Ödemesini Engelle" Seçeneğini "Açık" Olarak Seçerek Ayarları Kaydediniz.</li>
<li>Paypal Ödeme Sistemi Ayarları Tamamlanmıştır.</li>
</ol>
</div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Paypal Ayar Düzenle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal">
<fieldset>
<legend>Paypal Ayar Düzenle</legend>
							<div class="control-group">
							  <label class="control-label" for="status">Durum</label>
							  <div class="controls">
							  <label class="radio inline">
								<input type="radio" name="status" id="status_1" onclick="paypal_details(0);" value="0"<?if($status==0){?> checked<?}?>>Pasif
								</label>
								<label class="radio inline">
								<input type="radio" name="status" id="status_2" onclick="paypal_details(1);" value="1"<?if($status==1){?> checked<?}?>>Aktif
								</label>
								</div>
							</div>
<div class="login_details"<?if($status=='0'){?> style="display:none"<?}?>>
<div class="control-group">
							  <label class="control-label" for="email">E-Mail</label>
							  <div class="controls">
								<input type="text" name="email" value="<?=$email;?>">
								</div>
							</div>
<div class="control-group">
							  <label class="control-label" for="certificate_sign">Sertifika No</label>
							  <div class="controls">
								<input type="text" name="certificate_sign" value="<?=$certificate_sign;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="test_mode">Mod</label>
							  <div class="controls">
							  <label class="radio inline">
								<input type="radio" name="test_mode" id="mode_1" value="0"<?if($test_mode==0){?> checked<?}?>>Gerçek Mod
								</label>
								<label class="radio inline">
								<input type="radio" name="test_mode" id="mode_2" value="1"<?if($test_mode==1){?> checked<?}?>>Test Mod
								</label>
								</div>
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
