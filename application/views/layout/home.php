<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html>
<!--<![endif]-->
<head>
  <!-- Basic Page Needs
    ================================================== -->


  <title>Ticaret Meclisi</title>
  <!-- SEO Meta
  ================================================== -->
  <?php $this->load->view('layout/metas');?>
  <meta name="description" content="TicaretMeclisi, Gaziantepte kurulan ve Türkiyede adını duyurmaya başlayan ticaretin yeni merkezidir.">
  <!-- CSS
  ================================================== -->
  <?php $this->load->view('layout/styles');?>

</head>
<body class="color_bg1">
    <div class="se-pre-con"></div>
    <div class="main">
      <!-- HEADER START -->
      <?php $this->load->view('layout/header');?>
      <!-- HEADER END -->
      <!-- Bread Crumb STRAT -->

      <!-- Bread Crumb END -->
      <!-- CONTAIN START -->
      <?php $this->load->view('layout/contain');?>
      <!-- CONTAINER END -->
      <!-- News Letter Start -->

      <!-- News Letter End -->
      <!-- FOOTER START -->
      <?php $this->load->view('layout/footer');?>
      <!-- FOOTER END -->
    </div>
    <?php $this->load->view('layout/scripts');?>
</body>
</html>
