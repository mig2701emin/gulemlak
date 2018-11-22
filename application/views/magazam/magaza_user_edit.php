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
      <div class="jumbotron">
  			<h3>Kullanıcı Düzenle</h3>
  		</div>
      <form name="form81" action="" method="post">
        <div class="mb-3">
            <label for="ilanadi">E-Posta</label>
            <input type="email" class="form-control" name="email" placeholder="" value="<?php echo $uye->email; ?>" disabled>
        </div>
        <div class="col-12">
          <hr class="mb-4"/>
          <h4 class="mb-3">Kullanıcı Yetkileri</h4>
          <!-- <div class="row"> -->
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox"  class="custom-control-input" name="Perm1" id="Perm1" value="1"<?php if($uyenin_izinleri[0]=='1'){?> checked<?php }?>/>
              <label class="custom-control-label" for="Perm1">Mağaza Ayar Yönetimi</label>
            </div>
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox"  class="custom-control-input" name="Perm2" id="Perm2" value="1"<?php if($uyenin_izinleri[1]=='1'){?> checked<?php }?>/>
              <label class="custom-control-label" for="Perm2">Mağaza Kullanıcı Yönetimi</label>
            </div>
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox"  class="custom-control-input" name="Perm3" id="Perm3" value="1"<?php if($uyenin_izinleri[2]=='1'){?> checked<?php }?>/>
              <label class="custom-control-label" for="Perm3">Mağaza İlan Yönetimi</label>
            </div>
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox"  class="custom-control-input" name="Perm4" id="Perm4" value="1"<?php if($uyenin_izinleri[3]=='1'){?> checked<?php }?>/>
              <label class="custom-control-label" for="Perm4">Süper Yönetici</label>
            </div>
          <!-- </div> -->
        </div>
        <button class="btn btn-warning" type="submit" name="submit">Kullanıcıyı Düzenle</button>
      </div>
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
