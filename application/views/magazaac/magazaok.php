<!DOCTYPE html>
<html lang="tr">
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>bootstrap-4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
</head>
<body class="color_bg1">
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="container">
      <div class="row d-flex justify-content-center" style="margin-top: 50px;margin-bottom: 50px;">
        <div class="col-sm-12 col-md-2 col"><a class="btn" style="font-weight:bold;">  Paket Seçimi</a> <br></div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;">  Mağaza Tipi </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;"> İçerik </a>	</div>
        <!-- <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;" >  Ön İzleme </a>	</div> -->
        <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;">  Doping Al </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;color: orangered;"><i class="fas fa-caret-right"></i> Tebrikler </a>	</div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div>Ödemenizi Yaptığınızda Mağazanız Aktif Olacaktır</div>
          <h2>Ödemeniz Gereken Ücret : <font color="red"><?php echo $tutar;?></font> TL.</h2>
          <h5><strong>Ödemenizi Bana Özel > Bekleyen Ödemeler</strong> Menüsünden Yapabilirsiniz.</h5>
        </div>
        <div class="col-md-6">
          <div style="font-weight:bold;font-size:12pt;">Doping Nedir?</div>
          Doping, Ticaret Meclisi ziyaretçilerinin ilanınıza bakma oranını kat kat arttırmakta kullanılan yöntemlere verilen isimdir.
          <ul>
            <li><a href=""> Doping Nedir?</a></li>
            <li><a href=""> Doping Çeşitleri</a></li>
          </ul>
        </div>
      </div>
    </div>
    <?php $this->load->view('layout/footeruserpanel');?>
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
