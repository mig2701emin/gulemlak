<!DOCTYPE html>
<html>
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
      <div class="p-3 mb-2 bg-secondary text-white text-center"><strong>Bilgilerim</strong></div>
      <div class="content_style">
        <div class="jumbotron jumbotron-fluid text-center">
          <div class="container">
            <h1 class="display-4">Türkiye'nin ilan ve e-ticaret platformunda yerinizi alın!</h1>
            <p class="lead">Üyelik formunu eksiksizce doldurarak üyelik hizmetlerinden hemen yararlanmaya başlayabilirsiniz.</p>
          </div>
        </div>
        <form name="form1" id="form1" method="post" class="mega_size_fields">
          <?php if(validation_errors()){ ?>
            <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
          <?php } ?>
          <div class="mb-3">
              <label for="username">Kullanıcı Adı :</label>
              <input type="text" class="form-control" name="username" placeholder="" value="<?php echo $user->username;?>" disabled>
          </div>
          <div class="mb-3">
              <label for="ad">Adınız :</label>
              <input type="text" class="form-control" name="ad" placeholder="" value="<?php echo set_value('ad',$user->ad) ;?>" required>
          </div>
          <div class="mb-3">
              <label for="soyad">Soyadınız :</label>
              <input type="text" class="form-control" name="soyad" placeholder="" value="<?php echo set_value('soyad',$user->soyad);?>" required>
          </div>
          <div class="mb-3">
              <label for="email">E-Posta Adresiniz :</label>
              <input type="text" class="form-control" name="email" placeholder="" value="<?php echo set_value('email',$user->email);?>" disabled>
          </div>
          <div class="mb-3">
              <label for="sehir">Şehir :</label>
              <select class="custom-select d-block w-100" name="sehir" id="sehir" required>
                  <option value="">Seçiniz..</option>
                  <?php foreach ($iller as $il){ ?>
                    <option value="<?php echo $il->il_id; ?>"<?php if($user->sehir==$il->il_id){ ?> selected<?php } ?>><?php echo $il->il_ad; ?></option>
                  <?php } ?>
              </select>
          </div>
          <div class="mb-3">
            <div>Cinsiyet :</div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="cinsiyet" id="cinsiyet_bay" value="Bay"<?php if($user->cinsiyet=="Bay"){?> checked<?php }?>>
              <label class="form-check-label" for="cinsiyet_bay">Bay</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="cinsiyet" id="cinsiyet_bayan" value="Bayan"<?php if($user->cinsiyet=="Bayan"){?> checked<?php }?>>
              <label class="form-check-label" for="cinsiyet_bayan">Bayan</label>
            </div>
          </div>

          <div class="mb-3">
              <label for="dogum">Doğum Tarihi:</label>
              <input type="date" class="form-control" name="dogum" placeholder="" value="<?php echo set_value('dogum',$user->dogum) ;?>">
          </div>
          <div class="mb-3">
            <label for="gsm">Cep Telefonu :</label>
            <input class="form-control" type="tel" id="gsm" size="15" name="gsm" pattern="^[\(]\d{3}[\)][\s]\d{3}[\-]\d{2}[\-]\d{2}$" value="<?php echo set_value('gsm',$user->gsm);?>" required />
          </div>
          <div class="mb-3">
            <label for="istel">İş Telefonu :</label>
            <input class="form-control" type="tel" id="istel" name="istel" pattern="^[\(]\d{3}[\)][\s]\d{3}[\-]\d{2}[\-]\d{2}$" value="<?php echo set_value('istel',$user->istel);?>"/>
          </div>
          <button type="submit" class="btn btn-success btn-block">Güncelle</button>
        </form>
      </div>
    </div>
    <?php $this->load->view('layout/footeruserpanel');?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script  src="<?php echo base_url('assets/');?>js/Inputmask-5.x/jquery.inputmask.js "></script>
  <script src="<?php echo base_url('assets/');?>js/script.js"></script>
  <script src="<?php echo base_url('assets/noty/packaged/jquery.noty.packaged.min.js'); ?>"></script>
  <?php if(flashdata()){ ?>
      <script type="text/javascript">
          generate(<?php echo flashdata(); ?>);
      </script>
  <?php } ?>
  <script type="text/javascript">
$(document).ready(function() {
  $("#gsm").inputmask({"mask": "(999) 999-99-99"});
  $("#istel").inputmask({"mask": "(999) 999-99-99"});
});
  </script>
</body>
</html>
