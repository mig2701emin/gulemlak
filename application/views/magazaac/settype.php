<!DOCTYPE html>
<html>
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
  <style media="screen">
  .genelbox {
    background-color: #ed1c24;
    line-height: 35px;
    font-size: 14px;
    color: white;
    font-weight: 700;
    padding: 0 0 0 5px;
    margin: 0;
    border: 1px solid white;
    border-bottom: 0;
    font-family: 'Raleway', sans-serif;
  }
  .progress_list {
    height: 40px;
    background: #edeaed;
    padding: 20px 20px 20px 0;
  }
  .progress_hr {
    background: url(<?php echo base_url('assets/');?>img-icons/ad_steps.png);
    background-repeat: repeat-x;
    background-position: 0 -542px;
    width: 760px;
  }
  .p_active2 {
    width: 180px;
  }
  .progress_active {
    background: url(<?php echo base_url('assets/');?>img-icons/ad_steps.png);
    background-repeat: repeat-x;
    background-position: 0 -492px;
  }
  .store_green_border {
    float: left;
    margin-left: 5px;
    width: 440px;
    height: 250px;
    border: 1px solid #66d914;
    margin-top: 10px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    padding: 20px;
  }
  .prg_bg {
    color: #083392;
    font-size: 10pt;
    margin-left: -25px;
    background: url(img-icons/ad_steps.png);
    background-repeat: no-repeat;
    height: 15px;
    width: 150px;
    padding-top: 35px;
    float: left;
  }
  .prg_1, .show_ad_icon3 {
    background-position: 0 0;
  }
  .prg_2_active {
    background-position: 0 -150px;
    margin-left: 40px;
  }
  .prg_3 {
    background-position: 0 -200px;
    margin-left: 40px;
  }
  .prg_4 {
    background-position: 0 -300px;
    margin-left: 40px;
  }
  .prg_5 {
    background-position: 0 -400px;
    margin-left: 40px;
    width: 100px;
  }
  .store_purchase_info {
    margin-top: 90px;
    margin-left: 100px;
  }
  .store_green_border {
    float: left;
    margin-left: 5px;
    width: 440px;
    height: 250px;
    border: 1px solid #66d914;
    margin-top: 10px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    padding: 20px;
  }
  .open_store_advantage {
    margin-top: 10px;
    background: #f7f7f7;
    width: 970px;
    height: 100px;
    margin-left: 5px;
    color: #9e9e9e;
  }
  .v4_special_button, .v4_special_button_active {
    font-family: 'Raleway', sans-serif;
    font-size: 13px !important;
    cursor: hand;
    cursor: pointer;
    text-align: center;
    font-weight: bold;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    color: #000 !important;
    display: block;
    height: 27px;
    line-height: 27px;
    padding: 0 15px 0 15px;
    border: 1px solid #DDD;
    background: #fff;
    background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…EiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
    background: -moz-linear-gradient(top,#fff 0,#e5e5e5 100%);
    background: -webkit-gradient(linear,left top,left bottom,color-stop(0,#fff),color-stop(100%,#e5e5e5));
    background: -webkit-linear-gradient(top,#fff 0,#e5e5e5 100%);
    background: -o-linear-gradient(top,#fff 0,#e5e5e5 100%);
    background: -ms-linear-gradient(top,#fff 0,#e5e5e5 100%);
    background: linear-gradient(to bottom,#fff 0,#e5e5e5 100%);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#e5e5e5',GradientType=0);
  }
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
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-camera"></i> İçerik </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-tags"></i>  Doping Al </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-check-circle"></i> Tebrikler </a>	</div>
      </div>
    	<form method="post" action="">
      	<div class="store_green_border">
          <div style="width:135px;border-right:1px solid #ccc;height:100%;float:left;">
            <strong style="font-size:10pt;">Süper Mağaza</strong>
            <br><br><br><br><br>
            <img src="<?php echo base_url('assets/') ?>images/super_store.png" alt="Süper Mağaza" title="Süper Mağaza" width="100" height="100"/>
          </div>
          <div style="float:left;border-right:1px solid #ccc;width:100px;height:30px;padding-top:5px;">
            <input type="radio" name="store_type" value="1/12" onclick="button_open(1);" checked/>
            12 Ay
          </div>
          <div style="position:absolute;font-weight:bold;margin-left:250px;margin-top:10px;font-size:10pt;color:#0C026D;">
            <?php if($super_12ay!=0){?>
              <?php echo $super_12ay;?> TL
            <?php }else{?>
              Ücretsiz
            <?php }?>
          </div>
          <br><br>
          <div style="margin-left:136px;margin-top:20px;border-right:1px solid #ccc;width:100px;height:30px;padding-top:5px;position:absolute;">
            <input type="radio" name="store_type" value="1/6" onclick="button_open(1);"/>
            6 Ay
          </div>
          <div style="position:absolute;font-weight:bold;margin-left:250px;margin-top:25px;font-size:10pt;color:#0C026D;">
            <?php if($super_6ay!=0){?>
              <?php echo $super_6ay;?> TL
            <?php }else{?>Ücretsiz
            <?php }?>
          </div>
          <div style="position:absolute;font-weight:bold;margin-left:325px;margin-top:25px;">
            <input type="submit" name="devam" id="devam1" value="Devam" class="v4_special_button"/>
          </div>
          <div style="position:absolute;margin-left:140px;margin-top:60px;font-weight:bold;font-size:10pt;">
            Mağaza Özellikleri
          </div>
          <ul class="store_purchase_info">
            <li>İlanlarda <span><?php echo $super_magaza_resim_siniri;?> adet fotoğraf</span></li>
            <li>İlan listelerinde <span>fotoğraflı gösterim</span></li>
          </ul>
        </div>
    	  <div class="store_green_border">
          <div style="width:135px;border-right:1px solid #ccc;height:100%;float:left;">
            <strong style="font-size:10pt;">Normal Mağaza</strong>
            <br><br><br><br><br>
            <img src="<?php echo base_url('assets/') ?>images/normal_store.png" alt="Normal Mağaza" title="Normal Mağaza" width="100" height="100">
          </div>
          <div style="float:left;border-right:1px solid #ccc;width:100px;height:30px;padding-top:5px;">
            <input type="radio" name="store_type" value="2/12" onclick="button_open(2);">
            12 Ay
          </div>
          <div style="position:absolute;font-weight:bold;margin-left:250px;margin-top:10px;font-size:10pt;color:#0C026D;">
            <?php if($normal_12ay!=0){?>
              <?php echo $normal_12ay;?> TL
            <?php }else{?>
              Ücretsiz
            <?php }?>
          </div>
          <br><br>
          <div style="margin-left:136px;margin-top:20px;border-right:1px solid #ccc;width:100px;height:30px;padding-top:5px;position:absolute;">
            <input type="radio" name="store_type" value="2/6" onclick="button_open(2);">
            6 Ay
          </div>
          <div style="position:absolute;font-weight:bold;margin-left:250px;margin-top:25px;font-size:10pt;color:#0C026D;">
            <?php if($normal_6ay!=0){?>
              <?php echo $normal_6ay;?>
              TL
            <?php }else{?>
              Ücretsiz
            <?php }?>
          </div>
          <div style="position:absolute;font-weight:bold;margin-left:325px;margin-top:25px;">
            <input type="submit" name="devam" id="devam2" value="Devam" class="v4_special_button" style="display:none;">
          </div>
        	</form>
          <div style="position:absolute;margin-left:140px;margin-top:60px;font-weight:bold;font-size:10pt;">
            Mağaza Özellikleri
          </div>
          <ul class="store_purchase_info">
            <li>İlanlarda <span><?php echo $normal_magaza_resim_siniri;?> adet fotoğraf</span></li>
          </ul>
        </div>
        <div style="clear:both"></div>
      	<div class="open_store_advantage" style="padding-top:20px;">
        	<div style="float:left;border-right:1px solid #ccc;width:250px;margin-right:20px;">
            <h1 style="font-size:18pt;">Mağaza Açmanın<br><span>Avantajları</span></h1>
          </div>
      	  <div>
            <h2 style="float:left;border-right:1px solid #ccc;width:300px;font-weight:normal;margin-right:20px;">- Hızlı ve çok satış<br>- Milyonlarca kişiye ulaşma şansı</h2>
          </div>
      	  <div>
            <h2 style="font-weight:normal;">- Farklı tasarım seçenekleri<br>- Kendi içeriğini düzenleyebilme</h2>
          </div>
      	  <div style="clear:both"></div>
  	    </div>
    	<script>
      	function button_open(getid)
      	{
        	if(getid==1)
        	{
          	$("#devam1").show("normal");
          	$("#devam2").hide("normal");
        	}else if(getid==2)
        	{
          	$("#devam1").hide("normal");
          	$("#devam2").show("normal");
        	}
      	}
    	</script>
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
