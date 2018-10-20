
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
  <?php //$this->load->view('layout/metas');?>
  <!-- CSS
  ================================================== -->
  <?php //$this->load->view('layout/styles');?>

</head>
<body>
    <div class="se-pre-con"></div>
    <div class="main">

        <!-- HEADER START -->
      <?php //$this->load->view('layout/header');?>
        <!-- HEADER END -->
        <!-- Bread Crumb STRAT -->

        <!-- Bread Crumb END -->
        <!-- CONTAIN START -->
<table>
  <thead>
    <tr>
      <th>resim</th><th>başlık</th><th>fiyat</th><th>tarih</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($firmalar as $ilan): ?>
      <tr>
          <td>
            <a href="<?php echo base_url('ilan/'.$ilan->seo_url).'-'.$ilan->Id; ?>">
              <img src="<?php echo base_url('photos/thumbnail/').ilk_resim($ilan->Id); ?>" width="120px"/>
            </a>
          </td>
          <td>
            <a href="<?php echo base_url('ilan/'.$ilan->seo_url).'-'.$ilan->Id; ?>">
              <?php echo $ilan->firma_adi; ?>
            </a>
          </td>
          <td>
            <?php echo $ilan->fiyat; ?>
          </td>
          <td>
            <?php echo $ilan->kayit_tarihi; ?>
          </td>
      </tr>
    <?php endforeach; ?>

  </tbody>
</table>





        <!-- CONTAINER END -->
        <!-- News Letter Start -->
        <?php //$this->load->view('layout/newsletter');?>
        <!-- News Letter End -->
        <!-- FOOTER START -->
        <?php //$this->load->view('layout/footer');?>
        <!-- FOOTER END -->
    </div>
    <?php //$this->load->view('layout/scripts');?>
</body>
</html>
