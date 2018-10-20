
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
  <?php $this->load->view('front/layout/metas');?>
  <!-- CSS
  ================================================== -->
  <?php $this->load->view('front/layout/styles');?>

</head>
<body>
    <div class="se-pre-con"></div>
    <div class="main">

        <!-- HEADER START -->
      <?php $this->load->view('front/layout/header');?>
        <!-- HEADER END -->
        <!-- Bread Crumb STRAT -->

        <!-- Bread Crumb END -->
        <!-- CONTAIN START -->
        <?php $this->load->view('front/layout/contain2');?>
        <!-- CONTAINER END -->
        <!-- News Letter Start -->
        <?php $this->load->view('front/layout/newsletter');?>
        <!-- News Letter End -->
        <!-- FOOTER START -->
        <?php $this->load->view('front/layout/footer');?>
        <!-- FOOTER END -->
    </div>
    <?php $this->load->view('front/layout/scripts');?>
</body>
</html>
