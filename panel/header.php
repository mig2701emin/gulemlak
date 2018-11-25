<?
session_start();
ob_start();
include("../setting.php");

if($login_page!=1){
include("guvenlik.php");
}
include("clear_site.php");
/*$bugun=date("Y-m-d");
$mysqli->query("update firmalar set onay='0',suresi_doldu='1' where bitis_tarihi<='$bugun'");*/
date_default_timezone_set('Europe/Istanbul');
function show_msg($result='false',$page=""){
if($result=='ok'){
$refresh_time=2;
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>İşlem Başarıyla Tamamlandı. '.$refresh_time.' Saniye Sonra Yönlendirileceksiniz.</div>';
if(!empty($page)){
header("refresh: ".$refresh_time."; url=".$page);
}}else{
echo '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>İşlem Başarısız. Lütfen Tekrar Deneyiniz.</div>';
}
}
function process_mysql($command,$page){
global $admin_kilit;
global $mysqli;
$explode=explode("**",$command);
for ($i = 0; $i <= count($explode)-1; $i++) {
if($admin_kilit==0){
$sql_query[$i]=$mysqli->query($explode[$i]);
if($sql_query[$i]){
$sql_response[$i]=1;
}else{
$sql_response[$i]=0;
}
}
}
if($admin_kilit==0 and !in_array("0",$sql_response)){
return show_msg('ok',$page);
}else{
return show_msg();
}
}
$Id=guvenlik($_GET['Id']);
$loginUser=guvenlik($_GET['loginUser']);
$redirect=base64_decode($_GET['redirect']);
if($loginUser=='login'and $admin_kilit==0){
$_SESSION['giris'] = 1;
$_SESSION['uye'] = $Id;
header("location:".$redirect);
}
$admin_username=$mysqli->query("select username from yoneticiler where Id='".$_SESSION['admin_user']."'")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<meta charset="utf-8">
	<title>Yönetici Paneli</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex,nofollow">
	<link id="bs-css" href="css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	  select {
	  min-width:200px
	  }
	  .dataListClass td{line-height:30px}
	  #toTop{display:none;text-decoration:none;position:fixed;bottom:10px;right:10px;overflow:hidden;width:51px;height:51px;border:0;text-indent:100%;background:url(../images/back_top.png) no-repeat left top}
#toTopHover{background:url(../images/back_top.png) no-repeat left -51px;width:51px;height:51px;display:block;overflow:hidden;float:left;opacity:0;-moz-opacity:0;filter:alpha(opacity=0)}
#toTop:active,#toTop:focus{outline:0}
	</style>
	<link href="css/bootstrap-responsive.css" rel="stylesheet">
	<link href="css/charisma-app.css" rel="stylesheet">
	<link href="css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='css/chosen.css' rel='stylesheet'>
	<link href='css/uniform.default.css' rel='stylesheet'>
	<link href='css/jquery.noty.css' rel='stylesheet'>
	<link href='css/noty_theme_default.css' rel='stylesheet'>
	<link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='css/opa-icons.css' rel='stylesheet'>
	<!--[if lt IE 9]>
	  <script src="js/html5.js"></script>
	<![endif]-->
</head>
	<script src="js/jquery-1.7.2.min.js"></script>
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<script src="js/easing.js"></script>
	<script src="js/jquery.cookie.1.4.0.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.chosen.min.js"></script>
	<script src="js/jquery.uniform.min.js"></script>
	<script src="js/jquery.noty.js"></script>
	<script src="js/jquery.raty.min.js"></script>
	<script src="js/jquery.iphone.toggle.js"></script>
	<script src="js/jquery.autogrow-textarea.js"></script>
	<script src="js/jquery.history.js"></script>
	<script src="js/editor/ckeditor.js"></script>
	<script src="js/jquery.ui.totop.min.js"></script>
	<script src="js/charisma.js"></script>

<body>
	<?if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.html"> <img src="img/logo20.png" /> <span>Yönetim Paneli</span></a>
				<div class="btn-group pull-right theme-container" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-leaf"></i><span class="hidden-phone"> Tema Değiştir</span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" id="themes">
						<li><a data-value="classic" href="#"><i class="icon-blank"></i> Klasik</a></li>
						<li><a data-value="cerulean" href="#"><i class="icon-blank"></i> Gök Mavisi</a></li>
						<li><a data-value="cyborg" href="#"><i class="icon-blank"></i> Siyah</a></li>
						<li><a data-value="redy" href="#"><i class="icon-blank"></i>
						Kırmızı</a></li>
						<li><a data-value="journal" href="#"><i class="icon-blank"></i> Dergi</a></li>
						<li><a data-value="simplex" href="#"><i class="icon-blank"></i> Basit</a></li>
						<li><a data-value="slate" href="#"><i class="icon-blank"></i>
						Açık Siyah</a></li>
						<li><a data-value="spacelab" href="#"><i class="icon-blank"></i> Beyaz</a></li>
						<li><a data-value="united" href="#"><i class="icon-blank"></i> Açık Kırmızı</a></li>
					</ul>
				</div>
								<div class="btn-group pull-right" >
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-off"></i><span class="hidden-phone"> <?=$admin_username[username];?></span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="yonetici-duzenle.html?Id=<?=$_SESSION['admin_user'];?>"><i class="icon-user"></i> Bilgilerimi Değiştir</a></li>
						<li><a href="guvenli_cikis.html"><i class="icon-off"></i> Güvenli Çıkış</a></li>
					</ul>
				</div>
				<div class="btn-group pull-right" >
					<a class="btn" href="../index.php" target="_blank">
						<i class="icon-home"></i><span class="hidden-phone"> Site Önizleme</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<? } ?>
	<div class="container-fluid">
		<div class="row-fluid">
		<? if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Kontrol Paneli</li>
						<li><a class="ajax-link" href="index.html"><i class="icon-home"></i><span class="hidden-tablet"> Ana Sayfa</span></a></li>
						<li class="nav-header hidden-tablet">İlan Yönetimi</li>
						<li><a class="ajax-link" href="ilan-yonetimi.html"><i class="icon-tags"></i><span class="hidden-tablet"> Tüm İlanlar</span></a></li>
						<li><a class="ajax-link" href="acil-acil-yonetimi.html"><i class="icon-exclamation-sign"></i><span class="hidden-tablet"> Acil Acil İlanları</span></a></li>
						<li><a class="ajax-link" href="fiyati-dusen-yonetimi.html"><i class="icon-download"></i><span class="hidden-tablet"> Fiyatı Düşen İlanlar</span></a></li>
						<li><a class="ajax-link" href="dopingli-ilanlar-yonetimi.html"><i class="icon-signal"></i><span class="hidden-tablet"> Dopingli İlanlar</span></a></li>
						<li class="nav-header hidden-tablet">Reklam Yönetimi</li>
						<li><a class="ajax-link" href="reklam-yonetimi.html"><i class="icon-picture"></i><span class="hidden-tablet"> Tüm Reklamlar</span></a></li>
						<li><a class="ajax-link" href="reklam-ekle.html"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Reklam Ekle</span></a></li>
						<li class="nav-header hidden-tablet">Özel Alan Yönetimi</li>
						<li><a class="ajax-link" href="ozel-alan-yonetimi.html"><i class="icon-tasks"></i><span class="hidden-tablet"> Tüm Özel Alanlar</span></a></li>
						<li><a class="ajax-link" href="ozel-alan-ekle.html"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Özel Alan Ekle</span></a></li>
						<li class="nav-header hidden-tablet">Kategori Yönetimi</li>
						<li><a class="ajax-link" href="kategori-yonetimi.html"><i class="icon-th"></i><span class="hidden-tablet"> Tüm Kategoriler</span></a></li>
						<li class="nav-header hidden-tablet">Üye Yönetimi</li>
						<li><a class="ajax-link" href="uye-yonetimi.html"><i class="icon-user"></i><span class="hidden-tablet"> Tüm Üyeler</span></a></li>
						<li class="nav-header hidden-tablet">Sayfa Yönetimi</li>
						<li><a class="ajax-link" href="sayfa-yonetimi.html"><i class="icon-file"></i><span class="hidden-tablet"> Tüm Sayfalar</span></a></li>
						<li><a class="ajax-link" href="sayfa-ekle.html"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Sayfa Ekle</span></a></li>
						<li class="nav-header hidden-tablet">Yardım İçerik Yönetimi</li>
						<li><a class="ajax-link" href="yardim-icerik-yonetimi.html"><i class="icon-file"></i><span class="hidden-tablet"> Yardım İçerikleri</span></a></li>
						<li><a class="ajax-link" href="yardim-icerik-ekle.html"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Yardım İçeriği Ekle</span></a></li>
						<li><a class="ajax-link" href="yardim-kategori-yonetimi.html"><i class="icon-th"></i><span class="hidden-tablet"> Yardım Kategorileri</span></a></li>
						<li><a class="ajax-link" href="yardim-kategori-ekle.html"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Yardım Kategorisi Ekle</span></a></li>
						<li class="nav-header hidden-tablet">Şikayet Yönetimi</li>
						<li><a class="ajax-link" href="sikayet-edilen-ilanlar.html"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Şikayet Edilen İlanlar</span></a></li>
						<li class="nav-header hidden-tablet">İçerik Yönetimi</li>
						<li><a class="ajax-link" href="magaza-yonetimi.html"><i class="icon-shopping-cart"></i><span class="hidden-tablet"> Mağazalar</span></a></li>
						<li><a class="ajax-link" href="siparis-yonetimi.html"><i class="icon-asterisk"></i><span class="hidden-tablet"> Siparişler</span></a></li>
						<li><a class="ajax-link" href="destek-bildirimi-yonetimi.html"><i class="icon-question-sign"></i><span class="hidden-tablet"> Destek Bildirimleri</span></a></li>
						<li><a class="ajax-link" href="hikaye-yonetimi.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Hikayeler</span></a></li>
						<li><a class="ajax-link" href="bolge-yonetimi.html"><i class="icon-globe"></i><span class="hidden-tablet"> Bölgeler</span></a></li>
						<li class="nav-header hidden-tablet">Haber Yönetimi</li>
						<li><a class="ajax-link" href="haber-yonetimi.html"><i class="icon-list-alt"></i><span class="hidden-tablet"> Tüm Haberler</span></a></li>
						<li><a class="ajax-link" href="haber-ekle.html"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Haber Ekle</span></a></li>
						<li class="nav-header hidden-tablet">Proje Yönetimi</li>
						<li><a class="ajax-link" href="proje-yonetimi.html"><i class="icon-tint"></i><span class="hidden-tablet"> Tüm Projeler</span></a></li>
						<li><a class="ajax-link" href="proje-ekle.html"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Proje Ekle</span></a></li>
						<li class="nav-header hidden-tablet">Slayt Yönetimi</li>
						<li><a class="ajax-link" href="slayt-yonetimi.html"><i class="icon-th-large"></i><span class="hidden-tablet"> Tüm Slaytlar</span></a></li>
						<li><a class="ajax-link" href="slayt-ekle.html"><i class="icon-plus-sign"></i><span class="hidden-tablet"> Slayt Ekle</span></a></li>
						<li class="nav-header hidden-tablet">Araçlar</li>
						<li><a class="ajax-link" href="uye-mail.html"><i class="icon-envelope"></i><span class="hidden-tablet"> Üyelere Mail Gönder</span></a></li>
						<li class="nav-header hidden-tablet">Site Ayarları</li>
						<li><a class="ajax-link" href="genel-ayarlar.html"><i class="icon-cog"></i><span class="hidden-tablet"> Genel Ayarlar</span></a></li>
						<li><a class="ajax-link" href="sanal-pos-ayarlari.html"><i class="icon-leaf"></i><span class="hidden-tablet"> Sanal Pos Ayarları</span></a></li>
						<li><a class="ajax-link" href="paypal-ayarlari.html"><i class="icon-leaf"></i><span class="hidden-tablet"> Paypal Ayarları</span></a></li>
						<li><a class="ajax-link" href="sosyal-ag-ayarlari.html"><i class="icon-star"></i><span class="hidden-tablet"> Sosyal Ağ Ayarlari</span></a></li>
						<li><a class="ajax-link" href="uye-kayit-ayarlari.html"><i class="icon-cog"></i><span class="hidden-tablet"> Üye Kayıt Ayarları</span></a></li>
						<li><a class="ajax-link" href="yoneticiler.html"><i class="icon-lock"></i><span class="hidden-tablet"> Yöneticiler</span></a></li>
						<li><a class="ajax-link" href="mail-ayarlari.html"><i class="icon-envelope"></i><span class="hidden-tablet"> Mail Ayarları</span></a></li>
						<li><a class="ajax-link" href="iletisim-bilgileri.html"><i class="icon-briefcase"></i><span class="hidden-tablet"> İletişim Bilgileri</span></a></li>
						<li><a class="ajax-link" href="ilan-ayarlari.html"><i class="icon-tag"></i><span class="hidden-tablet"> İlan Ayarları</span></a></li>
						<li><a class="ajax-link" href="ilan-ucret-ayarlari.html"><i class="icon-leaf"></i><span class="hidden-tablet"> İlan Ücret Ayarları</span></a></li>
						<li><a class="ajax-link" href="magaza-ucret-ayarlari.html"><i class="icon-leaf"></i><span class="hidden-tablet"> Mağaza Ücret Ayarları</span></a></li>
						<li><a class="ajax-link" href="doping-ucret-ayarlari.html"><i class="icon-leaf"></i><span class="hidden-tablet"> Doping Ücret Ayarları</span></a></li>
					</ul>
				</div>
			</div>

			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Uyarı!</h4>
					<p>Tarayıcınızın JavaScript Özelliğini Açmanız Gerekmektedir.</p>
				</div>
			</noscript>

			<div id="content" class="span10" style="margin-left:15px">
			<? } ?>
