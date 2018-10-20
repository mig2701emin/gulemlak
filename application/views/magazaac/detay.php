<!DOCTYPE html>
<html>
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
  <style media="screen">
    /******/
  </style>
</head>
<body>
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/userheader');?>
    <div class="container">
      <div class=" row d-flex justify-content-center" style="margin:50px 0 50px 0;">
        <div class="col-sm-12 col-md-2 col"><a class="btn" style="color:mediumseagreen"><i class="far fa-thumbs-up"></i> Paket Seçimi</a> <br></div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-file"></i> Mağaza Tipi </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-camera"></i> İçerik </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-tags"></i>  Doping Al </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-check-circle"></i> Tebrikler </a>	</div>
      </div>
      <div class="content_style">
      <script>
      $(document).ready(function(){
      	$("#form1").validate({
      		rules:{
      			'username': {
      			required:true,
      			minlength:5,
      			maxlength:30,
      			remote: {url:"<?=$site_adresi;?>/check_store_username.php?type=new_store"}
      			},
      			'magazaadi': {
      			required:true,
      			minlength:5
      			},
      			'm_aciklama': {
      			required:true,
      			minlength:5
      			},
      			'image1': {
      			required:true
      			},
      			'unvan': {
      			required:true,
      			minlength:5
      			},
      			'stil': {
      			required:true
      			}
      			},
      			messages: {
      			username: { remote: "Kullanıcı adı kullanılmaktadır." }
      			}
      });
      });
      </script>
      <form id="form1" class="mega_size_fields" action="" method="post" enctype="multipart/form-data">
        <dt>Mağaza Kullanıcı Adı :</dt>
        <dd><input name="username" type="text"></dd>
        <div style="clear:both"></div>
        <dt>Mağaza Adı :</dt>
        <dd><input name="magazaadi" type="text"></dd>
        <div style="clear:both"></div>
        <dt>Mağaza Açıklaması :</dt>
        <dd><textarea name="m_aciklama" style="width:185px;height:135px;"></textarea></dd>
        <div style="clear:both"></div>
        <dt>Mağaza Logosu :</dt>
        <dd><input type="file" name="image1"></dd>
        <div style="clear:both"></div>
        <dt>Mağaza Ünvanı :</dt>
        <dd><input name="unvan" type="text"></dd>
        <div style="clear:both"></div>
        <dt>Mağaza Stili :</dt>
        <dd>
        <select name="stil">
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
        </dd>
        <div style="clear:both"></div>
        <input type="submit" name="devam" value="Devam" class="v4_special_button" style="margin:0 0 10px 165px"/>

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
