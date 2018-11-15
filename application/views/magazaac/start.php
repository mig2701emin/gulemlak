<!DOCTYPE html>
<html lang="tr">
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
</head>
<body class="color_bg1">
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="p-3 mb-2 mt-3 bg-dark text-white text-center"><strong>Mağaza Aç</strong></div>
        </div>
        <div class="panel-body">
          <h1 style="color:#608F23;">Mağaza aç, satışını artır!</h1>
        </div>
        <div class="row mb-4">
          <div class="col-sm-6">
            <img style="width:100%;height:auto" src="<?php echo base_url(); ?>assets/images/store_image.png"/>
          </div>
          <div class="col-sm-6 text-center">
            <h5>Tasarımını siz seçeceksiniz, içeriğinizi istediğiniz gibi düzenleyeceksiniz.</h5>
            <br/>
            <h6>www.ticaretmeclisi.com'da yapılan aramalar sonucunda ilanınızı gören bir ziyaretçi, mağazanıza yönlendirilecek.</h6>
          </div>
          <div class="col-12">
            <a class="btn btn-success btn-block" href="<?php echo base_url(); ?>magazaac/kategorisec">Devam</a>
          </div>
        </div>

      </div>
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
