<!DOCTYPE html>
<html>
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
  <style media="screen">
    /******/
  </style>
</head>
<body>
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/userheader');?>
    <div class="container">
      <div class=" row d-flex justify-content-center" style="margin:50px 0 50px 0;">
        <div class="col-sm-12 col-md-2 col"><a class="btn" style="color:mediumseagreen"><i class="far fa-thumbs-up"></i> Paket Seçimi</a> <br></div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-file"></i> Mağaza Tipi </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-camera"></i> İçerik </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-tags"></i>  Doping Al </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-check-circle"></i> Tebrikler </a>	</div>
      </div>
      <div class="ad_divs" style="width:700px;float:left;margin-top:25px;">
        <div class="ad_post_icons post_icon1">Ödemenizi Yaptığınızda Mağazanız Aktif Olacaktır</div>
        <h2>Ödemeniz Gereken Ücret : <font color="red"><?php echo $tutar;?></font> TL.</h2>
        <h2><strong>Ödemenizi Bana Özel > Bekleyen Ödemeler</strong> Menüsünden Yapabilirsiniz.</h2>
        <div style="clear:both"></div>
      </div>
      <div class="ad_divs" style="width:230px;margin-left:730px;margin-top:25px;">
        <div class="ad_post_icons doping_time_notice" style="font-weight:bold;font-size:12pt;">Doping Nedir?</div>
        Doping, Ticaret Meclisi ziyaretçilerinin ilanınıza bakma oranını kat kat arttırmakta kullanılan yöntemlere verilen isimdir.
        <ul class="whatis_Doping">
          <li><a href="index.php?page=sayfa&sayfa=doping">> Doping Nedir?</a></li>
          <li><a href="index.php?page=sayfa&sayfa=doping-cesitleri">> Doping Çeşitleri</a></li>
        </ul>
      </div>
      <div style="clear:both"></div>
    </div>
    <?php $this->load->view('layout/footer');?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/');?>js/script.js"></script>
  <script src="<?php echo base_url('assets/noty/packaged/jquery.noty.packaged.min.js'); ?>"></script>
  <?php if(flashdata()){ ?>
      <script type="text/javascript">
          generate(<?php echo flashdata(); ?>);
      </script>
  <?php } ?>
</body>
</html>
