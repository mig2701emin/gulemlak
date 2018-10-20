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
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-file"></i> Mağaza Tipi </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-camera"></i> İçerik </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-tags"></i>  Doping Al </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-check-circle"></i> Tebrikler </a>	</div>
      </div>
      <form action="" id="form" name="form" method="post">
        <input type="hidden" id="step" name="step" value="2">
        <?php
        $paketSQL=$this->db->query("select * from kategoriler where ust_kategori='0'")->result();
        foreach ($paketSQL as $paket) {
          $categories[]=$paket->kategori_adi;
          ?>
          <table cellpadding="0" cellspacing="0" width="970" style="margin-bottom:25px">
            <tr>
              <td width="25" align="center">
                <input name="paket" value="<?php echo $paket->Id;?>" type="radio" id="magaza_paket<?php echo $paket->Id;?>" onclick="show_promo();">
              </td>
              <td width="98">
                <label for="magaza_paket<?php echo $paket->Id;?>">
                  <div class="store_category_select">
                    <?php echo $paket->kategori_adi;?>
                  </div>
                </label>
              </td>
              <td id="mgz_paket<?php echo $paket->Id;?>" style="border-bottom:2px #8AC524 solid" width="970">
                <table cellpadding="0" cellspacing="0" border="0">
                  <tr>
                    <td align="center" width="150px" valign="top">
                      <label for="magaza_paket<?php echo $paket->Id;?>">
                        <img src="<?php echo base_url('assets/'); ?>images/category_icon/<?php echo $paket->icon;?>" border="0" width="32px" height="32px">
                        <br />
                        <?php echo $paket->kategori_adi;?>
                      </label>
                    </td>
                    <td>
                      <img src="<?php echo base_url('assets/');?>images/sag_ok.gif">
                    </td>
                    <td style="padding-left:20px;" class="f10">
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
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        <?php }?>
        <table cellpadding="0" cellspacing="0" width="970" style="margin-bottom:25px">
          <tr>
            <td width="25" align="center">
              <input name="paket" value="hepsi"  type="radio" id="magaza_pakethepsi" onclick="show_promo();">
            </td>
            <td width="98">
              <label for="magaza_pakethepsi">
                <div class="store_category_select">
                  HepsiBir
                </div>
              </label>
            </td>
            <td id="mgz_paket_hepsi" style="border-bottom:2px #907D3A solid" width="970">
              <table cellpadding="0" cellspacing="0" border="0">
                <tr>
                  <td align="center" width="150px" valign="top">
                    <label for="magaza_pakethepsi">
                      <img src="<?php echo base_url('assets/'); ?>images/category_icon/tum_kat_paket.gif" border="0" width="32px" height="32px">
                      <br />
                      HepsiBir
                    </label>
                  </td>
                  <td>
                    <img src="<?php echo base_url('assets/') ?>images/sag_ok.gif">
                  </td>
                  <td style="padding-left:20px;" class="f10">
                    <?php echo implode(", ",$categories);?>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
        <h2 style="color:#68A717;width:970px;text-align:center;">
          Lütfen mağazanızı açacağınız kategoriyi belirleyerek içinde bulunduğu paketi seçiniz.
        </h2>
        <p align="right"><input type="button" name="devam" value="Devam" class="v4_special_button" onclick="validateme()"></p>
      </form>
      <script>
      function show_promo(){
        for(var i=1; i<=7; i++){
          if (document.getElementById('magaza_paket'+i).checked){
            document.getElementById('mgz_paket'+i).style.backgroundColor='#FEE9EB';
          }else{
            document.getElementById('mgz_paket'+i).style.backgroundColor='#f8f8f8';
          }
        }
      }
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
