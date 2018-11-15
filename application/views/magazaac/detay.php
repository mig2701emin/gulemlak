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
      <div class="row d-flex justify-content-center" style="margin-top: 50px;margin-bottom: 50px;">
        <div class="col-sm-12 col-md-2 col"><a class="btn" style="font-weight:bold;">  Paket Seçimi</a> <br></div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;">  Mağaza Tipi </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;color: orangered"><i class="fas fa-caret-right"></i> İçerik </a>	</div>
        <!-- <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;" >  Ön İzleme </a>	</div> -->
        <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;">  Doping Al </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold"> Tebrikler </a>	</div>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <h2 class="text-center">Magaza Bilgileri</h2>
        <div class="mb-3">
            <label for="username">Mağaza Kullanıcı Adı</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label for="magazaadi">Mağaza Adı</label>
            <input type="text" class="form-control" name="magazaadi">
        </div>
        <div class="mb-3">
          <label for="m_aciklama">Mağaza Açıklaması<span class="text-muted"></span></label>
          <textarea name="m_aciklama" id="m_aciklama" style="width: 100%;min-height:300px;">
          </textarea>
        </div>
        <div class="mb-3">
          <label for="image1">Mağaza Logosu</label>
          <input type="file" class="form-control-file" name="image1" id="image1">
        </div>
        <div class="mb-3">
            <label for="unvan">Mağaza Ünvanı</label>
            <input type="text" class="form-control" name="unvan">
        </div>
        <div class="mb-3">
          <label for="stil">Mağaza Stili</label>
          <select class="custom-select d-block w-100" name="stil">
              <option value="">Seçiniz</option>
              <option value="cesitli">Çeşitli</option>
              <option value="cesitli2">Çeşitli 2</option>
              <option value="cesitli3">Çeşitli 3</option>
              <option value="emlak">Emlak</option>
              <option value="emlak2">Emlak 2</option>
              <option value="emlak3">Emlak 3</option>
              <option value="emlak4">Emlak 4</option>
              <option value="emlak5">Emlak 5</option>
              <option value="emlak6">Emlak 6</option>
              <option value="vasita">Vasıta</option>
              <option value="vasita2">Vasıta 2</option>
              <option value="vasita3">Vasıta 3</option>
              <option value="vasita4">Vasıta 4</option>
              <option value="vasita5">Vasıta 5</option>
              <option value="vasita6">Vasıta 6</option>
              <option value="vasita7">Vasıta 7</option>
              <option value="hayvanlar-alemi">Hayvanlar Alemi</option>
          </select>
        </div>
        <button class="btn btn-success" type="submit" name="devam">Devam</button>
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
