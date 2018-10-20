<!DOCTYPE html>
<html>
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
  <style media="screen">
  .open_store_info {
  background: url(<?php echo base_url(); ?>assets/images/store_image.png);
  background-repeat: no-repeat;
  width: 500px;
  height: 325px;
  padding-left: 450px;
  color: #70718d;
  font-size: 10pt;
  padding-top: 10px;
}
  </style>
</head>
<body>
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/userheader');?>
    <div class="container">
      <div class="genelbox">Mağaza Aç</div>
      <h1 style="color:#608F23;">Mağaza aç, satışını artır!</h1>
      <div class="open_store_info">Tasarımını siz seçeceksiniz, içeriğinizi istediğiniz gibi düzenleyeceksiniz.
      <br>www.ticaretmeclisi.com'da yapılan aramalar sonucunda ilanınızı gören bir ziyaretçi, mağazanıza yönlendirilecek.
      <br><br>
      <a href="<?php echo base_url(); ?>magazaac/kategorisec" class="v4_special_button">Devam</a>
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
