
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
.pagination a, .pagination strong{
  padding: 5px;
  border: 1px solid #ccc;
  margin-left: 5px;
  text-decoration: none;
  box-shadow: 0px 0px 8px rgba(5,5,5,0.3);
}
.pagination strong{
  background-color: #35a5f2;
}
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
  <div style="background:url(<?php echo base_url(); ?>assets/images/magaza-resimler/<?php echo $magaza->stil; ?>.jpg) repeat-x left top;margin-top:-5px;height:125px;padding-top:20px;padding-left:15px;">
    <form method="GET" action="" style="position:absolute;margin:35px 0 0 300px">
      <input name="aranacak" id="store_search" onkeyup="check_search_store();" class="head_search_input" type="text" placeholder="Mağazada Ara" value="">
      <input type="submit" value="Ara" class="search_button">
    </form>
    <a href="">
      <img border="0" src="<?php echo base_url() ?>photos/magaza/<?php echo $magaza->logo ?>" width="264" height="100" title="<?php echo $magaza->magazaadi; ?>" alt="<?php echo $magaza->magazaadi; ?>">
    </a>
  </div>
  <div style="float:left;width:21.2%;border-right:1px solid #e1e1e1">
    <div class="genelbox">
      <a href="<?php echo base_url().$magaza->username; ?>/<?php echo encode($kategori->Id); ?>" style="background:url('<?php echo base_url(); ?>assets/images/category_icon/<?php echo $kategori->icon; ?>') no-repeat center left;background-size:20px 20px;padding-left:25px"><?php echo $kategori->kategori_adi; ?></a>
      ( <?php echo magaza_ilan_say($magaza->Id,$kategori->Id); ?> )
    </div>
    <div style="clear:both"></div>
    <?php foreach ($altKategoriler as $altKategori): ?>
      <div class="subcat">
        <a href="<?php echo base_url().$magaza->username; ?>/<?php echo encode($kategori->Id); ?>/<?php echo encode($altKategori->Id); ?>" class="submenu_text"><?php echo $altKategori->kategori_adi; ?></a>
        ( <?php echo magaza_ilan_say($magaza->Id,$kategori->Id,$altKategori->Id); ?> )
      </div>
    <?php endforeach; ?>
    <div class="genelbox">Hakkımızda</div>
    <div class="custom_content">
      <font face="Arial" size="3pt"><strong><?php echo $magaza->magazaadi; ?></strong></font>
      <div style="width:200px;max-width:200px;">
        <font face="Calibri" size="2.5pt"><?php echo base64_decode($magaza->aciklama); ?></font>
      </div>
    </div>
  </div>
  <div style="float:left;width:77%">
    <table border="0" width="100%" height="158" cellpadding="0" style="border-collapse: collapse">
      <?php $count=1; ?>
      <tr>
        <?php foreach ($ilanlar as $ilan){
          if (ilk_resim($ilan->Id) != ""){
            $resim = '<a href="'.base_url().'ilan/'.$ilan->seo_url.'-'.$ilan->Id.'"><img src = "'.base_url().'photos/thumbnail/'.ilk_resim($ilan->Id).'" width = "100" height="75" border = "0" style="margin-top:10px;"></a>';
            } else {
            $resim = '<a href="'.base_url().'ilan/'.$ilan->seo_url.'-'.$ilan->Id.'"><img src = "'.base_url().'assets/images/yok.png" width="100" height = "75" border = "0" style="margin-top:10px;"></a>';
          }
        ?>
        <td>
          <table border="0" width="100%" height="100" cellpadding="0" style="cursor:hand;cursor:pointer; border-collapse:collapse" bgcolor="#FFFFFF" onmouseover="this.style.background='#F5F5F5'" onmouseout="this.style.background='#FFFFFF'" onclick="top.window.location='<?php echo base_url(); ?>ilan/<?php echo $ilan->seo_url; ?>-<?php echo $ilan->Id; ?>'">
            <tr>
              <td width="150" align="center" valign="middle">
                <?php echo $resim; ?>
              </td>
              <td valign="top" style="text-align:left">
                <font color="red" style="font-size:9pt;">#<?php echo $ilan->Id; ?></font>
                <br/>
                <?php
                  $yazi = $ilan->firma_adi;
                  $uzunluk=strlen($yazi);
                  if($uzunluk>25){
                    $icerik = mb_substr($yazi,0,25,"UTF-8").'...';
                  }else{
                    $icerik=$yazi;
                  }
                ?>
                <font color="#000080" style="text-transform: uppercase;font-size:9pt;"><?php echo $icerik; ?></font>
                <br>
                <font color="brown" style="font-size:9pt;"><?php echo write_price($ilan->fiyat,$ilan->fiyat2);?> <?php echo $ilan->birim;?></font>
                <br>
                <font color="brown" style="font-size:9pt;">İlan Tarihi : <?php echo $ilan->kayit_tarihi;?></font>
                <br>
                <font color="#000080" style="font-size:9pt;">İl : <?php echo replace("tbl_il","il_ad","il_id",$ilan->il);?></font>
              </td>
            </tr>
          </table>
        </td>
        <?php
        $count++;
        if($count%2){echo "</tr><tr>";}
        }
        ?>
      </tr>
      <tr>
        <td align="center" colspan="2">
          <hr color="#DADADA" size="1">
          <div style="display: table;margin: auto;margin-top:5px;">
            <p class="pagination"><?php echo $links; ?></p>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <div style="clear:both"></div>
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
