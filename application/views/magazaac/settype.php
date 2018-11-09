<!DOCTYPE html>
<html>
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>bootstrap-4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
  <style media="screen">
  .open_store_advantage {
    margin-top: 10px;
    background: #f7f7f7;
    /*width: 970px;
    height: 100px;*/
    margin-left: 5px;
    color: #9e9e9e;
  }

  </style>
</head>
<body>
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="container">
      <div class="row d-flex justify-content-center" style="margin:50px 0 50px 0;">
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="far fa-thumbs-up"></i> Paket Seçimi</a> <br></div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-file"></i> Mağaza Tipi </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-camera"></i> İçerik </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-tags"></i>  Doping Al </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-check-circle"></i> Tebrikler </a>	</div>
        <div class="col-sm-12 col-md-2"></div>
      </div>
      <form action="" method="post">
        <div class="row">
          <div class="col-md-6 col-sm-12 border border-success">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-12">
                <img class="p-3" src="<?php echo base_url('assets/') ?>images/super_store.png" alt="Süper Mağaza" title="Süper Mağaza"/>
              </div>
              <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                  <div class="col-md-4 col-sm-6 col-5 pt-3 pb-3">
                    <input class="p-3" type="radio" name="store_type" value="1/12" onclick="button_open(1);" checked/>
                    12 Ay
                  </div>
                  <div class="col-md-4 col-sm-6 col-7 pt-3 pb-3">
                    <?php if($super_12ay!=0){?>
                      <?php echo $super_12ay;?> TL
                    <?php }else{?>
                      Ücretsiz
                    <?php }?>
                  </div>
                  <div class="col-md-4 col-sm-12 col-12">

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-6 col-5">
                    <input class="p-3" type="radio" name="store_type" value="1/6" onclick="button_open(1);"/>
                    6 Ay
                  </div>
                  <div class="col-md-4 col-sm-6 col-7">
                    <?php if($super_6ay!=0){?>
                      <?php echo $super_6ay;?> TL
                    <?php }else{?>Ücretsiz
                    <?php }?>
                  </div>
                  <div class="col-md-4 col-sm-12 col-12">
                    <button class="btn btn-success btn-sm" type="submit" name="devam" id="devam1">Devam</button>
                  </div>
                </div>
              </div>
              <div class="col-md-12 pt-3">
                <h6>Mağaza Özellikleri</h6>
                <ul>
                  <li class="lead">İlanlarda <span><?php echo $super_magaza_resim_siniri;?> adet fotoğraf</span></li>
                  <li class="lead">İlan listelerinde <span>fotoğraflı gösterim</span></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-12 border border-success">
            <div class="row">
              <div class="col-lg-3 col-md-4 col-12">
                <img class="p-3" src="<?php echo base_url('assets/') ?>images/normal_store.png" alt="Normal Mağaza" title="Normal Mağaza">
              </div>
              <div class="col-lg-9 col-md-8 col-12">
                <div class="row">
                  <div class="col-md-4 col-sm-6 col-5 pt-3 pb-3">
                    <input class="p-3" type="radio" name="store_type" value="2/12" onclick="button_open(2);">
                    12 Ay
                  </div>
                  <div class="col-md-4 col-sm-6 col-7 pt-3 pb-3">
                    <?php if($normal_12ay!=0){?>
                      <?php echo $normal_12ay;?> TL
                    <?php }else{?>
                      Ücretsiz
                    <?php }?>
                  </div>
                  <div class="col-md-4 col-sm-12 col-12">

                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-sm-6 col-5">
                    <input class="p-3" type="radio" name="store_type" value="2/6" onclick="button_open(2);">
                    6 Ay
                  </div>
                  <div class="col-md-4 col-sm-6 col-7">
                    <?php if($normal_6ay!=0){?>
                      <?php echo $normal_6ay;?>
                      TL
                    <?php }else{?>
                      Ücretsiz
                    <?php }?>
                  </div>
                  <div class="col-md-4 col-sm-12 col-12">
                    <button class="btn btn-success btn-sm" type="submit" name="devam" id="devam2" style="display:none;">Devam</button>
                  </div>
                </div>
              </div>
              <div class="col-md-12 pt-3">
                <h6>Mağaza Özellikleri</h6>
                <ul>
                  <li class="lead">İlanlarda <span><?php echo $normal_magaza_resim_siniri;?> adet fotoğraf</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </form>
      <div class="row p-3 border border-success">
        <div class="col-12 text-center text-success text-weight-bold p-3 border border-success">
          <h2>Mağaza Açmanın Avantajları</h2>
        </div>
        <div class="col-md-6 col-12 text-center p-2">
          <h4>- Hızlı ve çok satış</h4>
        </div>
        <div class="col-md-6 col-12 text-center p-2">
          <h4>- Milyonlarca kişiye ulaşma şansı</h4>
        </div>
        <div class="col-md-6 col-12 text-center p-2">
          <h4>- Farklı tasarım seçenekleri</h4>
        </div>
        <div class="col-md-6 col-12 text-center p-2">
          <h4>- Kendi içeriğini düzenleyebilme</h4>
        </div>
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
