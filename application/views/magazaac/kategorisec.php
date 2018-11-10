<!DOCTYPE html>
<html>
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>bootstrap-4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
  <style>
	/* The container */
	.radyocontainer {
	    display: block;
	    position: relative;
	    padding-left: 35px;
	    margin-bottom: 12px;
	    cursor: pointer;
	    /*font-size: 22px;*/
	    -webkit-user-select: none;
	    -moz-user-select: none;
	    -ms-user-select: none;
	    user-select: none;
			/*float:left;*/
	}

	/* Hide the browser's default radio button */
	.radyocontainer input {
	    position: absolute;
	    opacity: 0;
	    cursor: pointer;
	}

	/* Create a custom radio button */
	.checkmark {
	    position: absolute;
	    top: 25px;
	    left: 0;
	    height: 25px;
	    width: 25px;
	    background-color: #eee;
	    border-radius: 50%;
	}

	/* On mouse-over, add a grey background color */
	.radyocontainer:hover input ~ .checkmark {
	    background-color: #ccc;
	}

	/* When the radio button is checked, add a blue background */
	.radyocontainer input:checked ~ .checkmark {
	    background-color: #2196F3;
	}

	/* Create the indicator (the dot/circle - hidden when not checked) */
	.checkmark:after {
	    content: "";
	    position: absolute;
	    display: none;
	}

	/* Show the indicator (dot/circle) when checked */
	.radyocontainer input:checked ~ .checkmark:after {
	    display: block;
	}

	/* Style the indicator (dot/circle) */
	.radyocontainer .checkmark:after {
	 	top: 9px;
		left: 9px;
		width: 8px;
		height: 8px;
		border-radius: 50%;
		background: white;
	}
	</style>
</head>
<body>
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="container">
      <div class="row d-flex justify-content-center" style="margin-top: 50px;margin-bottom: 50px;">
        <div class="col-sm-12 col-md-2 col"><a class="btn" style="font-weight:bold;color: orangered;"><i class="fas fa-caret-right"></i>  Paket Seçimi</a> <br></div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;">  Mağaza Tipi </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;"> İçerik </a>	</div>
        <!-- <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;" >  Ön İzleme </a>	</div> -->
        <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;">  Doping Al </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold"> Tebrikler </a>	</div>
      </div>

      <form action="" id="form" name="form" method="post" style="margin-bottom:20px">
        <input type="hidden" id="step" name="step" value="2">
        <?php
        $j=0;
        foreach ($anaKategoriler as $paket) {
          $categories[]=$paket->kategori_adi;
          ?>
          <div class="row<?php if($j%2==0){?> bg-secondary<?php }else{?> bg-warning<?php } ?>" style="padding:5px">
            <div class="col-lg-2 col-md-2 col-sm-3 col-4" style="padding:5px">
              <label for="magaza_paket<?php echo $paket->Id;?>" class="radyocontainer"><img src="<?php echo base_url('assets/'); ?>images/category_icon/<?php echo $paket->icon;?>">
              <br />
              <?php echo $paket->kategori_adi;?>
                <input type="radio" name=paket id="magaza_paket<?php echo $paket->Id;?>" value="<?php echo $paket->Id;?>" <?php if($paket->Id==45){ ?>checked="checked"<?php } ?>align="center">
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                  <?php
                  $subcatSQL=$this->db->query("select * from kategoriler where ust_kategori='".$paket->Id."' LIMIT 10");
                  $count_subcat=$subcatSQL->num_rows();
                  $subcatSQL=$subcatSQL->result();
                  $i=1;
                  foreach ($subcatSQL as $subcat) {
                    ?>
                    <?php echo $subcat->kategori_adi;?><?php if($i!=$count_subcat){ ?>, <?php } ?>
                    <?php $i++;
                  }?>
            </div>
          </div>
        <?php $j++; }?>
        <div class="row<?php if($j%2==0){?> bg-secondary<?php }else{?> bg-warning<?php } ?>" style="padding:5px">
          <div class="col-lg-2 col-md-2 col-sm-3 col-4" style="padding:5px">
            <label for="magaza_pakethepsi" class="radyocontainer"><img src="<?php echo base_url('assets/'); ?>images/category_icon/tum_kat_paket.gif" border="0" width="32px" height="32px">
            <br />
            HepsiBir
              <input type="radio" name=paket id="magaza_pakethepsi" value="hepsi">
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                <?php echo implode(", ",$categories);?>
          </div>
        </div>
        <div class="row">
          <h2 style="color:#68A717;width:970px;text-align:center;">
            Lütfen mağazanızı açacağınız kategoriyi belirleyerek içinde bulunduğu paketi seçiniz.
          </h2>
        </div>
        <div class="row text-center">
          <button class="btn btn-success btn-block" type="submit" name="devam" onclick="validateme()">Devam</button>
        </div>
      </form>
      <script>
      function validateme() {
        var l = document.form.paket.length;
        var s = 0;

        for(i=0;i<l;i++) {
          if (document.form.paket[i].checked == true) {
            s = document.form.paket[i].value;
          }
        }
        if (s <= 0) {
          alert("Lütfen mağazanız için bir paket seçiniz");
          return false;
        }
      document.form.submit();
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
