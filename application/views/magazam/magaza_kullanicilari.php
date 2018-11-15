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
  			<h3>Mağaza Kullanıcıları</h3>
  		</div>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>E-Posta</th>
            <th>Yetkiler</th>
            <th>İşlemler</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($magaza_users as $magaza_user): ?>
                <tr>
                  <?php $uye_yetkileri=explode(',',$magaza_user->yetkiler); ?>
                  <td><?php echo replace("uyeler","email","Id",$magaza_user->uyeId); ?></td>
                  <td><?php if($uye_yetkileri[0]=='1'){?>Ayar Yönetimi<?php }?>
                    <?php if($uye_yetkileri[1]=='1'){?><?php if($uye_yetkileri[0]=='1'){?>,<?php }?> Kullanıcı Yönetimi<?php }?>
                    <?php if($uye_yetkileri[2]=='1'){?><?php if($uye_yetkileri[0]=='1' or $uye_yetkileri[1]=='1'){?>,<?php }?> İlan Yönetimi<?php }?>
                    <?php if($uye_yetkileri[3]=='1'){?><?php if($uye_yetkileri[0]=='1' or $uye_yetkileri[1]=='1' or $uye_yetkileri[2]=='1'){?>,<?php }?> Süper Yönetici<?php }?></td>
                  <td><?php if ($uye_izinleri[1] == 0) {?>İzinler | Sil<?php } else {?><a href="<?php echo base_url().'magazam/magazauseredit/'.encode($magaza_user->uyeId); ?>">İzinler</a> | <a href="<?php echo base_url().'magazam/magazausersil/'.encode($magaza_user->uyeId); ?>">Sil</a><?php }?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
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
