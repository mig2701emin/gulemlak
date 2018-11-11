<?php
$no_visible_elements=true;
$login_page=1;
include('header.php');
$action=guvenlik($_GET['action']);
$username=guvenlik($_POST['username']);
$password=guvenlik($_POST['password']);
?>
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>Yönetici Paneline Hoş Geldiniz</h2>
				</div>
			</div>
			<?
if($action=='check'){
$checkSQL=$mysqli->query("select * from yoneticiler where username='".$username."' and password='".$password."'");
$login_details=$checkSQL->fetch_assoc();
if($checkSQL->num_rows==0){
echo '<div class="alert alert-error" style="width:350px;margin:0 auto 5px auto"><button type="button" class="close" data-dismiss="alert">×</button>Kullanıcı Adı / Şifre Geçersiz. Lütfen Tekrar Deneyiniz.</div>';
}else{
$_SESSION['admin_login']="ok";
$_SESSION['admin_user']=$login_details[Id];
echo '<div class="alert alert-success" style="width:350px;margin:0 auto 5px auto"><button type="button" class="close" data-dismiss="alert">×</button>Giriş Yapıldı. 2 Saniye Sonra Yönlendirileceksiniz.</div>';
header("refresh: 2; url=index.html");
}}
?>
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						Lütfen Yönetici Bilgileriniz İle Giriş Yapınız.
					</div>
					<form class="form-horizontal" action="login.html?action=check" method="post">
						<fieldset>
							<div class="input-prepend" title="Kullanıcı Adı" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span><input autofocus class="input-large span10" name="username" id="username" type="text" value="<?=$username;?>" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Şifre" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large span10" name="password" id="password" type="password" value="" />
							</div>
							<div class="clearfix"></div>

							<p class="center span5">
							<button type="submit" class="btn btn-primary">Giriş Yap</button>
							</p>
						</fieldset>
					</form>
				</div>
			</div>
<?php include('footer.php'); ?>
