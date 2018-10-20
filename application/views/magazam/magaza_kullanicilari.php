
﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//TR" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <title>ticaretmeclisi.com</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link href="http://www.ticaretmeclisi.com/screen.css" rel="stylesheet" type="text/css" />
  <link href="http://www.ticaretmeclisi.com/css/slider.css" rel="stylesheet" type="text/css" />
  <link href="http://www.ticaretmeclisi.com/css/breadcrumb.css" rel="stylesheet" type="text/css" />
  <link href="http://www.ticaretmeclisi.com/css/my_account.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="http://www.ticaretmeclisi.com/js/ui/jquery-ui-1.10.3.custom.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://www.ticaretmeclisi.com/js/jquery-ui-1.10.3.custom.min.js"></script>
  <script type="text/javascript" src="http://www.ticaretmeclisi.com/js/easing.js"></script>
  <script type="text/javascript" src="http://www.ticaretmeclisi.com/js/bxslider/jquery.bxslider.min"></script>
  <script type="text/javascript" src="http://www.ticaretmeclisi.com/js/jquery.cookie.1.4.0.js"></script>
  <script type="text/javascript" src="http://www.ticaretmeclisi.com/js/jquery.maskedinput.min.js" defer></script>
  <script type="text/javascript" src="http://www.ticaretmeclisi.com/js/jquery.ui.totop.min.js" defer></script>
  <script type="text/javascript" src="http://www.ticaretmeclisi.com/js/custom.js"></script>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<style>
#uiv {color:#ed1c24; background-color:white; padding: 5px; border-radius: 3px; font-weight: bold;}
#uiv:hover {color:white; background-color: #ed1c24; padding: 5px; border-radius: 3px; font-weight: bold;}
#logouiv {float:left; height:50px;}#logouiv:hover {float:left; height:50px; opacity:0.8;}
</style>
<script>
function show(a){
  $("#div"+a).slideDown("slow");
  $("#xdiv"+a).html('<a class="submenu_text" href="javascript:hide(\''+a+'\');">Gizle</a>');
}
function hide(a){
  $("#div"+a).slideUp("slow");
  $("#xdiv"+a).html('<a class="submenu_text" href="javascript:show(\''+a+'\');">Tümünü Göster</a>');
}
</script>
<body>
<!--[if gte IE 9]> <style type="text/css"> .gradient { filter: none; } </style><![endif]-->
<div class="siteContent">
  <div style="width:100%; height:50px; border-bottom:2px solid white; background:#ed1c24; z-index:1000; position:fixed; top:0; left:0;">
    <center>
      <div style="width:950px; height:50px;">
        <div style="float:left">
          <a href="<?php echo base_url(); ?>">
            <img id="logouiv" src="<?php echo base_url(); ?>assets/images/logo.png" alt="ticaretmeclisi.com" title="ticaretmeclisi.com" >
          </a>
        </div>
        <a style="margin-left: 250px; padding-top: 22px; position: absolute; color: #fff; font-size:16px;" href="http://www.ticaretmeclisi.com/index.php?page=ilanara">
          Detaylı Arama
        </a>
        <div style="float:right">
          <div class="login_bar">
            <a href="<?php echo base_url(); ?>hesabim/anasayfa" style="color:white;">
              <strong></strong>
            </a>
            <a href="<?php echo base_url(); ?>hesabim/anasayfa" style="color:white;">
              <i class="fa fa-cog"></i> Hesabım
            </a>
            <a href="<?php echo base_url(); ?>cikis">
              <i class="fa fa-sign-out"></i> Çıkış Yap
            </a>
            <a id="uiv" href="<?php echo base_url(); ?>ilanekle">
              ÜCRETSİZ İLAN VER
            </a>
          </div>
          <div style="clear:both"></div>
        </div>
        <div style="clear:both"></div>
        <form action="http://ticaretmeclisi.com/index.php" method="get" name="form9" id="form9">
          <a href="http://ticaretmeclisi.com/index.php?page=ilanara" style="position:absolute;margin-left:680px;margin-top:11px;font-size:11pt;color:#fff;">
          </a>
          <input type="hidden" id="page" name="page" value="ara">
          <input name="search" type="text" id="search" style="position:absolute;margin-top:-43px;margin-left:255px;width:235px;height:35px;font-family:Segoe UI;font-size:10pt;color:#2f2f2f;font-color;border:1px solid #C0C0C0;background-repeat:repeat-x;-webkit-border-radius:6px;-moz-border-radius:6px;border-radius:3px; font-size: 11px; font-family: arial;" placeholder="Kelime, ilan no veya mağaza adı ile ara" onFocus="this.value=''">
          <input type="submit" id="submit" name="submit" value="" style="position:absolute;margin-top:-42px;margin-left:452px;font-weight:bold;border:0px;background-image:url(http://ticaretmeclisi.com/newbutonsearch.png);width:37px;cursor:hand;cursor:pointer;height:33px;" onClick="arama();">
        </form>
      </div>
    </center>
  </div>
  <div style="width:100%; height:50px;"></div>
  <script src="http://www.ticaretmeclisi.com/js/jquery.banner-rotator.min.js"></script>
  <script>
  $(document).ready(function(){
    var e={
      width:510,
      height:242,
      playButton:false,
      cpanelAlign:"bottomRight",
      borderWidth:0,
      delay:5000,
      effect:"random",
      tooltip:"text",
      shuffle:true
    };
    $("#home_slider").bannerRotator(e);
  });
</script>
<style>
.listable { width:900px; }
@media only screen and (min-width:960px){ /* styles for browsers larger than 960px; */
.listable { width:900px; }
}
@media only screen and (min-width:1440px){ /* styles for browsers larger than 1440px; */
.listable { width:900px; }
}
@media only screen and (min-width:2000px){ /* for sumo sized (mac) screens */
.listable { width:900px; }
}
@media only screen and (max-device-width:480px){ /* styles for mobile browsers smaller than 480px; (iPhone) */
.listable { width:670px; }
}
@media only screen and (device-width:768px){ /* default iPad screens */
.listable { width:670px; }
} /* different techniques for iPad screening */
@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait) { /* For portrait layouts only */
.listable { width:670px; }
}
@media only screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape) { /* For landscape layouts only */
.listable { width:900px; }
}
</style>
<div class="siteContent" style="width:1200px;">
  <?php $this->load->view("magazam/magaza_sidebar"); ?>
  <div style="float:left;" class="listable">
    <div class="genelbox">Mağaza Kullanıcıları</div>
    <table border="0" width="100%" style="border-collapse: collapse">
      <tr>
        <td width="150" height="30" style="background:#000000;color:#FFFFFF;font-weight:bold;padding:3px;">E-Posta</td>
        <td width="250" height="30" style="background:#000000;color:#FFFFFF;font-weight:bold;padding:3px;">Yetkiler</td>
        <td width="30" height="30" style="background:#000000;color:#FFFFFF;font-weight:bold;padding:3px;">İşlemler</td>
      </tr>
      <?php foreach ($magaza_users as $magaza_user): ?>

        <tr>
          <?php $uye_yetkileri=explode(',',$magaza_user->yetkiler); ?>
          <td height="30" style="border-bottom:1px solid #ccc;"><?php echo replace("uyeler","email","Id",$magaza_user->uyeId); ?></td>
          <td height="30" style="border-bottom:1px solid #ccc;"><?php if($uye_yetkileri[0]=='1'){?>Ayar Yönetimi<?php }?>
            <?php if($uye_yetkileri[1]=='1'){?><?php if($uye_yetkileri[0]=='1'){?>,<?php }?> Kullanıcı Yönetimi<?php }?>
            <?php if($uye_yetkileri[2]=='1'){?><?php if($uye_yetkileri[0]=='1' or $uye_yetkileri[1]=='1'){?>,<?php }?> İlan Yönetimi<?php }?>
            <?php if($uye_yetkileri[3]=='1'){?><?php if($uye_yetkileri[0]=='1' or $uye_yetkileri[1]=='1' or $uye_yetkileri[2]=='1'){?>,<?php }?> Süper Yönetici<?php }?>
          </td>
          <td height="30" style="border-bottom:1px solid #ccc;">
            <?php if ($uye_izinleri[1] == 0) {?>İzinler | Sil<?php } else {?><a href="<?php echo base_url().'magazam/magazauseredit/'.encode($magaza_user->uyeId); ?>">İzinler</a> | <a href="<?php echo base_url().'magazam/magazausersil/'.encode($magaza_user->uyeId); ?>">Sil</a><?php }?>

          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <div style="clear:both"></div>
</div>
</div>
<div style="clear:both"></div>
<div class="footer2">
  <div style="margin:auto;width:980px">
    <div class="border" style="margin-left:173px"></div>
    <div class="border" style="margin-left:370px"></div>
    <div class="border" style="margin-left:565px"></div>
    <div class="border" style="margin-left:772px"></div>
    <ul class="footerTitles">
      <li>Kurumsal</li>
      <li>Hizmetlerimiz</li>
      <li>Mağazalar</li>
      <li>Gizlilik ve Kullanım</li>
      <li><center>Sosyal Medyada Biz ?</center></li>
    </ul>
    <div style="clear:both"></div>
    <ul class="footerSections">
      <li class="footerSection">
        <ul class="footerLinks"><li>
          <a href="http://www.ticaretmeclisi.com/index.php?page=sayfa&sayfa=hakkimizda" style="color:#fff">Hakkımızda</a>
        </li>
        <li>
          <a href="http://www.ticaretmeclisi.com/index.php?page=sayfa&sayfa=yardim&kategori=iletisim" style="color:#fff">İletişim</a>
        </li>
        <li>
          <a href="http://www.ticaretmeclisi.com/index.php?page=destek" style="color:#fff">Destek</a>
        </li>
      </ul>
    </li>
    <li class="footerSection">
      <ul class="footerLinks"><li>
        <a href="http://www.ticaretmeclisi.com/index.php?page=sayfa&sayfa=doping" style="color:#fff">Doping</a>
      </li>
      <li>
        <a href="http://www.ticaretmeclisi.com/index.php?page=sayfa&sayfa=reklam" style="color:#fff">Reklam</a>
      </li>
    </ul>
  </li>
  <li class="footerSection">
    <ul class="footerLinks">
      <li><a href="http://www.ticaretmeclisi.com/index.php?page=magazam" style="color:#fff">Mağazam</a></li>
      <li><a href="http://www.ticaretmeclisi.com/index.php?page=magazaac" style="color:#fff">Mağaza Açmak İstiyorum</a></li>
      <li><a href="http://www.ticaretmeclisi.com/index.php?page=sayfa&sayfa=magaza" style="color:#fff">Neden Mağaza?</a></li>
      <li><a href="http://www.ticaretmeclisi.com/index.php?page=sayfa&sayfa=magazafiyatlari" style="color:#fff">Mağaza Fiyatları</a></li>
    </ul>
  </li>
  <li class="footerSection">
    <ul class="footerLinks">
      <li><a href="http://www.ticaretmeclisi.com/index.php?page=sayfa&sayfa=hizmet-sozlesmesi" style="color:#fff">Hizmet Sözleşmesi</a></li>
      <li><a href="http://www.ticaretmeclisi.com/index.php?page=sayfa&sayfa=guvenlik-ve-gizlilik" style="color:#fff">Güvenlik Ve Gizlilik</a></li>
      <li><a href="http://www.ticaretmeclisi.com/index.php?page=sayfa&sayfa=hesap-numaralarimiz" style="color:#fff">Hesap Numaralarımız</a></li>
      <li><a href="http://www.ticaretmeclisi.com/index.php?page=sayfa&sayfa=yardim" style="color:#fff">Yardım</a></li>
    </ul>
  </li>
  <li class="footerSection">
    <a href="http://www.ticaretmeclisi.com">
      <img src="http://www.ticaretmeclisi.com/images/logo.jpg" alt="ticaretmeclisi.com" title="ticaretmeclisi.com" widtH="175" height="50" style="margin-left:10px">
    </a>
    <ul class="footerSocial">
      <li><a href="https://www.facebook.com" target="_blank" rel="nofollow" class="social_link facebook" title="Facebook"></a></li>
      <li><a href="#" target="_blank" rel="nofollow" class="social_link twitter" title="Twitter"></a></li>
      <li><a href="#" target="_blank" rel="nofollow" class="social_link google" title="Google+"></a></li>
      <li><a href="#" target="_blank" rel="nofollow" class="social_link youtube" title="Youtube"></a></li>
      <li><a href="#" target="_blank" rel="nofollow" class="social_link linkedin" title="LinkedIn"></a></li>
      <li><a href="#" target="_blank" rel="nofollow" class="social_link digg" title="Digg"></a></li>
      <li><a href="#" target="_blank" rel="nofollow" class="social_link friendfeed" title="FriendFeed"></a></a></li>
      <li><a href="#" target="_blank" rel="nofollow" class="social_link myspace" title="Myspace"></a></li>
      <li><a href="#" target="_blank" rel="nofollow" class="social_link pinterest" title="Pinterest"></a></li>
    </ul>
  </li>
</ul>
<div style="clear:both"></div>
<div class="contactBlockBg">
  <ul class="contactBlock">
    <li><strong style="font-size:16px">Bize Ulaşın</strong></li>
    <li>0542 218 12 54</li>
    <li><a href="mailto:destek@ticaretmeclisi.com" style="font-weight:bold;color:#fff">destek@ticaretmeclisi.com</a></li>
  </ul>
  <div style="clear:both"></div>
</div>
<div style="clear:both"></div>
<div style="font-size:11px;border-top:1px dotted #DDD;padding:8px;margin-top:5px">
  ticaretmeclisi.com'da Yer Alan Kullanıcıların Oluşturduğu Tüm İçerik, Görüş Ve Bilgilerin Doğruluğu, Eksiksiz Ve Değişmez Olduğu, Yayınlanması İle İlgili Yasal Yükümlülükler İçeriği Oluşturan Kullanıcıya Aittir.Bu İçeriğin, Görüş Ve Bilgilerin Yanlışlık, Eksiklik Veya Yasalarla Düzenlenmiş Kurallara Aykırılığından ticaretmeclisi.com Hiçbir Şekilde Sorumlu Değildir. Sorularınız İçin İlan Sahibi İle İrtibata Geçebilirsiniz.
</div>
</div>
<div class="footer_copyright">
  Copyright 2018 ticaretmeclisi.com Tüm Hakları Saklıdır
  <div style="clear:both"></div>
</div>
</div>
<script>
function mesaj_gonder (uyeid,ilanid){window.location='http://www.ticaretmeclisi.com/index.php?page=mesajgonder&uyeid=&ilanid=';}
function favori (){
  $.ajax({
    url: 'http://www.ticaretmeclisi.com/favoriekle.php?id=',
    success: function(data) {
      $('.result').html(data); alert('İlan favorilerinize eklendi !');
      document.location.reload(true);
    }
  });
}
function favorisil (){$.ajax({
  url: 'http://www.ticaretmeclisi.com/favorisil.php?id=',
  success: function(data) {
    $('.result').html(data);
    alert('İlan favorilerden silindi !');
    document.location.reload(true);
  }
});
}
</script>
<style type="css/text">a{ font-family: 'Raleway', sans-serif;}</style>
</body>
</html>
