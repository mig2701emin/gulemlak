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
      <form action="" method="post" enctype="multipart/form-data">
        <h2 class="text-center">Magaza Bilgileri</h2>
        <!-- <div class="mb-3">
            <label for="username">Mağaza Kullanıcı Adı</label>
            <input type="text" class="form-control" name="username" value="<?php //echo $magaza->username; ?>" disabled>
        </div> -->
        <div class="mb-3">
            <label for="magazaadi">Mağaza Adı</label>
            <input type="text" class="form-control" name="magazaadi" value="<?php echo $magaza->magazaadi; ?>">
        </div>
        <div class="mb-3">
          <label for="m_aciklama">Mağaza Açıklaması<span class="text-muted"></span></label>
          <textarea name="m_aciklama" id="m_aciklama" style="width: 100%;min-height:300px;"><?php echo base64_decode($magaza->aciklama); ?></textarea>
        </div>
        <div class="mb-3">
          <label for="image1">Mağaza Logosu</label>
          <input type="file" class="form-control-file" name="image1" id="image1">
           (Değiştirmek İstemiyorsanız Boş Bırakınız)
        </div>
        <button class="btn btn-success" type="submit" name="submit">Mağazayı Güncelle</button>
      </form>
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
