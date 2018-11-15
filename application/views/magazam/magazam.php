<!DOCTYPE html>
<html lang="tr">
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>bootstrap-4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
</head>
<body>
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="container">
      <form action="" method="post" enctype="multipart/form-data">
        <h2 class="text-center">Magaza Bilgileri</h2>
        <div class="mb-3">
            <label for="username">Mağaza Kullanıcı Adı</label>
            <input type="text" class="form-control" name="username" value="<?php echo $magaza->username; ?>">
        </div>
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
        <div class="mb-3">
            <label for="unvan">Mağaza Ünvanı</label>
            <input type="text" class="form-control" name="unvan" value="<?php echo $magaza->unvan; ?>">
        </div>
        <div class="mb-3">
          <label for="stil">Mağaza Stili</label>
          <select class="custom-select d-block w-100" name="stil">
            <option value="cesitli"<?php if ($magaza->stil == 'cesitli') {echo ' selected';} ?>>Çeşitli</option>
            <option value="cesitli2"<?php if ($magaza->stil == 'cesitli2') {echo ' selected';} ?>>Çeşitli 2</option>
            <option value="cesitli3"<?php if ($magaza->stil == 'cesitli3') {echo ' selected';} ?>>Çeşitli 3</option>
            <option value="emlak"<?php if ($magaza->stil == 'emlak') {echo ' selected';} ?>>Emlak</option>
            <option value="emlak2"<?php if ($magaza->stil == 'emlak2') {echo ' selected';} ?>>Emlak 2</option>
            <option value="emlak3"<?php if ($magaza->stil == 'emlak3') {echo ' selected';} ?>>Emlak 3</option>
            <option value="emlak4"<?php if ($magaza->stil == 'emlak4') {echo ' selected';} ?>>Emlak 4</option>
            <option value="emlak5"<?php if ($magaza->stil == 'emlak5') {echo ' selected';} ?>>Emlak 5</option>
            <option value="emlak6"<?php if ($magaza->stil == 'emlak6') {echo ' selected';} ?>>Emlak 6</option>
            <option value="vasita"<?php if ($magaza->stil == 'vasita') {echo ' selected';} ?>>Vasıta</option>
            <option value="vasita2"<?php if ($magaza->stil == 'vasita2') {echo ' selected';} ?>>Vasıta 2</option>
            <option value="vasita3"<?php if ($magaza->stil == 'vasita3') {echo ' selected';} ?>>Vasıta 3</option>
            <option value="vasita4"<?php if ($magaza->stil == 'vasita4') {echo ' selected';} ?>>Vasıta 4</option>
            <option value="vasita5"<?php if ($magaza->stil == 'vasita5') {echo ' selected';} ?>>Vasıta 5</option>
            <option value="vasita6"<?php if ($magaza->stil == 'vasita6') {echo ' selected';} ?>>Vasıta 6</option>
            <option value="vasita7"<?php if ($magaza->stil == 'vasita7') {echo ' selected';} ?>>Vasıta 7</option>
            <option value="hayvanlar-alemi"<?php if ($magaza->stil == 'hayvanlar-alemi') {echo ' selected';} ?>>Hayvanlar Alemi</option>
          </select>
        </div>
        <button class="btn btn-success" type="submit" name="submit">Mağazayı Güncelle</button>
      </form>
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
