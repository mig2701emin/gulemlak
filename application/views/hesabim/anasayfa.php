<!DOCTYPE html>
<html>
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>bootstrap-4.1.3/css/bootstrap.min.css" />
  <style type="text/css">
    .pagination a, .pagination strong{

      padding: 5px;
      border: 1px solid #ccc;
      margin-left: 5px;
      text-decoration: none;
      box-shadow: 0px 0px 8px rgba(5,5,5,0.3);

    }
    .pagination strong{
      background-color: #35a5f2;

    }
    .cont_principal {
      margin: 0px auto;
      text-align:center;
      padding: 0px;
      list-style: none;
      font-family: 'Open Sans';
      /*position: absolute;*/
      width: 100%;
      height: 100%;
      /*background: rgb(212,228,239);
      background: -moz-linear-gradient(top,  rgba(212,228,239,1) 0%, rgba(134,174,204,1) 100%);
      background: -webkit-linear-gradient(top,  rgba(212,228,239,1) 0%,rgba(134,174,204,1) 100%);
      background: linear-gradient(to bottom,  rgba(212,228,239,1) 0%,rgba(134,174,204,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d4e4ef', endColorstr='#86aecc',GradientType=0 );*/

    }

    .cont_breadcrumbs {
      width: 100%;
    }
    .cont_breadcrumbs_1 {
      position: relative;
      width: 100%;
      float: left;
      /*margin: 20px 20px;*/
    }
    .cont_breadcrumbs_1 > ul {
      list-style-type: none;
    }

    .cont_breadcrumbs_1 > ul > li {
      position: relative;
      float: left;
      transform: skewX(-15deg);
      background-color: #fff;
      box-shadow: -2px 0px 20px -6px rgba(0,0,0,0.5);
      z-index: 1;
      transition: all 0.5s;
    }

    .cont_breadcrumbs_1 > ul > li:hover {
     background-color: #CFD8DC;
    }

    .cont_breadcrumbs_1 > ul > li  > a {
      display: block;
      padding: 10px;
      /*font-size: 20px;*/
       transform: skewX(15deg);
       text-decoration:none;
       color: #444;
      font-weight: 300;
    }
    .cont_breadcrumbs_1 > ul > li:last-child {
      background-color: #78909C;
      transform: skew(0deg);
      margin-left: -5px;

    }

    .cont_breadcrumbs_1 > ul > li:last-child > a {
        color: #fff;
       transform: skewX(0deg);
    }

</style>
</head>
<body>
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="container">
      <div class="row">
        <div class="col-12 bg-secondary text-center pt-3 pb-3"><h3><strong><?php echo $filter." İlanlarım" ?></strong></h3></div>
      </div>
      <?php if ($toplam_kayit==0){ ?>
        <div class="col-12 border border-secondary">
          <h5>İlan Bulunamadı.</h5>
        </div>
        <?php
      }else{
        foreach ($ilanlar as $ilan) {
          $kat1=$this->db->query("select * from kategoriler where Id='".$ilan->kategoriId."'")->row();
          if($ilan->kategori2!=0){
            $kat2=$this->db->query("select * from kategoriler where Id='".$ilan->kategori2."'")->row();
          }if($ilan->kategori3!=0){
            $kat3=$this->db->query("select * from kategoriler where Id='".$ilan->kategori3."'")->row();
          }
          if($ilan->kategori4!=0){
            $kat4=$this->db->query("select * from kategoriler where Id='".$ilan->kategori4."'")->row();
          }
          if($ilan->kategori5!=0){
            $kat5=$this->db->query("select * from kategoriler where Id='".$ilan->kategori5."'")->row();
          }
          if($ilan->kategori6!=0){
            $kat6=$this->db->query("select * from kategoriler where Id='".$ilan->kategori6."'")->row();
          }
          if($ilan->kategori7!=0){
            $kat7=$this->db->query("select * from kategoriler where Id='".$ilan->kategori7."'")->row();
          }
          $favorisorgula=$this->db->query("select * from favoriler where ilanId='".$ilan->Id."'")->num_rows();
          ?>
        <div class="row border border-dark mt-3">
          <div class="col-12">
            <a class="btn btn-dark btn-block" href="<?php echo base_url();?>ilan/<?php echo $ilan->seo_url;?>-<?php echo $ilan->Id;?>">
              <?php echo $ilan->firma_adi;?>
            </a>
          </div>
          <div class="col-lg-3 col-md-5 col-sm-12 col-12">
            <div class="row">
              <div class="col-lg-8 col-md-10 col-sm-10 col-12">
                <a href="<?php echo base_url(); ?>ilan/<?php echo $ilan->seo_url;?>-<?php echo $ilan->Id;?>">
                  <img src="<?php if(ilk_resim($ilan->Id)!='' and file_exists('photos/thumbnail/'.ilk_resim($ilan->Id))){echo base_url().'photos/thumbnail/'.ilk_resim($ilan->Id);
                  }else{echo base_url();?>assets/images/yok_thumbnail.png<?php } ?>" border="0" alt="<?php echo $ilan->firma_adi;?>" title="<?php echo $ilan->firma_adi;?>" style="width:100%;height:auto">
                </a>
              </div>
              <div class="col-lg-4 col-md-2 col-sm-2 col-12 text-center">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-4">
                    Favori
                    <h6><span class="badge badge-pill badge-lg badge-dark"><?php echo $favorisorgula;?></span></h6>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-4">
                    Sayaç
                    <h6><span class="badge badge-pill badge-lg badge-dark"><?php echo $ilan->toplam_ziyaretci;?></span></h6>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-4">
                    No
                    <h6><span class="badge badge-pill badge-lg badge-dark"> <?php echo $ilan->ilanId;?> </span></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-7 col-sm-12 col-12 text-center">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-6 col-6">
                    Eklenme Tarihi
                    <p><strong><?php echo yeni_tarih($ilan->kayit_tarihi);?></strong></p>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-6 col-6">
                    Bitiş Tarihi
                    <p><strong><?php echo yeni_tarih($ilan->bitis_tarihi);?></strong></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-6 col-6">
                    Durumu
                    <h6><span class="badgen badge-pill <?php if($ilan->onay==0 and $ilan->suresi_doldu==1){?>badge-secondary<?php }elseif($ilan->onay==1){?>badge-success<?php }elseif($ilan->onay==2){?>badge-danger<?php }else{?>badge-warning<?php } ?>"><?php if($ilan->onay==0 and $ilan->suresi_doldu==1){?>Süresi Doldu<?php }elseif($ilan->onay==1){?>Yayında<?php }elseif($ilan->onay==2){?>İlan Durduruldu<?php }else{?>Onay Bekliyor<?php } ?></span></h6>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-6 col-6">
                    <br/>
                    <h4 class="text text-primary text-weight-bold"><?php echo number_format($ilan->fiyat,0, ',', '.');?> <?php echo $ilan->birim;?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-12 col-12">
                <div class="cont_principal">
  								<div class="cont_breadcrumbs">
  									<div class="cont_breadcrumbs_1">
  										<ul>
                      <li><a href="#"><?php echo $kat1->kategori_adi;?></a></li>
                      <?php if($ilan->kategori2!=0){?>
                      <li><a href="#"><?php echo $kat2->kategori_adi;?></a></li>
                       <?php } ?>
                       <?php if($ilan->kategori3!=0){?>
                      <li><a href="#"><?php echo $kat3->kategori_adi;?></a></li>
                       <?php }?>
                       <?php if($ilan->kategori4!=0){?>
                      <li><a href="#"><?php echo $kat4->kategori_adi;?></a></li>
                       <?php }?>
                       <?php if($ilan->kategori5!=0){?>
                      <li><a href="#"><?php echo $kat5->kategori_adi;?></a></li>
                       <?php }?>
                       <?php if($ilan->kategori6!=0){?>
                      <li><a href="#"><?php echo $kat6->kategori_adi;?></a></li>
                       <?php }?>
                       <?php if($ilan->kategori7!=0){?>
                      <li><a href="#"><?php echo $kat7->kategori_adi;?>
                       <?php }?>
                     </ul>
                   </div>
                 </div>
               </div>
              </div>

              <div class="col-lg-12 col-md-6 col-sm-12 col-12">
                <br/>
                <select class="col-12 form-control bg-secondary" name="islem" onchange="ilan_islemyap(this.options[selectedIndex].value,<?php echo $ilan->Id;?>,'<?php echo mb_strtolower($filter);?>');">
                  <option value="0">Seçiniz</option>
                  <option value="1">İlanı Düzenle</option>
                  <option value="2">Doping Yap</option>
                  <option value="3">Aynı Kategoride İlan Ver</option>
                  <?php if($ilan->onay==0 and $ilan->suresi_doldu==1){?>
                    <option value="8">İlan Süresini Uzat</option>
                  <?php }elseif($ilan->onay==1){?>
                    <option value="6">İlanı Durdur</option>
                  <?php }elseif($ilan->onay==2){?>
                    <option value="7">İlanı Aktifleştir</option>
                  <?php } ?>
                  <option value="4">İlanı Sil</option>
                  <?php
                  $dpsorgu=$this->db->query("select * from firmalar where uyeId='".$user->Id."' and guncelim='1' and onay='1' and Id='".$ilan->Id."'")->num_rows();
                  if($dpsorgu!=0){?>
                    <option value="5">İlan Tarihini Güncelle</option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      <?php } ?>
        <div class="col-12">
            <p class="pagination"><?php echo $links; ?></p>
        </div>
    </div>

    <?php $this->load->view('layout/footer');?>
  </div>
  <div id="ilan-sil" title="İlan Silme Onayı" style="display:none">
    <p><span class="ui-icon ui-icon-alert" style="float: left; margin: 0 7px 20px 0;"></span>İlanı Silmek İstediğinizden Emin Misiniz?</p>
  </div>
  <script type="text/javascript">
    function ilan_islemyap(e,d,f){

      if(e==1){
        window.location.href="<?php echo base_url(); ?>hesabim/ilanduzenle/"+d
      }else{
        if(e==2){
          window.location.href="<?php echo base_url(); ?>doping/ilan/"+d
        }else{
          if(e==3){
            window.location.href="<?php echo base_url(); ?>hesabim/samekategoriilan/"+d
          }else{
            if(e==4){

              $("#ilan-sil").dialog({
                resizable:false,
                width:400,
                height:150,
                modal:true,
                buttons:{
                  "Evet":function(){window.location.href="<?php echo base_url(); ?>hesabim/ilansil/"+d+"/"+f},
                  "Hayır":function(){$(this).dialog("close")}
                }
              });
            }else{
              if(e==5){
                window.location.href="<?php echo base_url(); ?>hesabim/guncelle/"+d+"/"+f
              }else{
                if(e==6){
                  window.location.href="<?php echo base_url(); ?>hesabim/ilandurdur/"+d+"/"+f
                }else{
                  if(e==7){
                    window.location.href="<?php echo base_url(); ?>hesabim/ilanaktiflestir/"+d+"/"+f
                  }else{
                    if(e==8){
                      window.location.href="<?php echo base_url(); ?>hesabim/ilansureuzat/"+d+"/"+f
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?php echo base_url('assets/');?>js/script.js"></script>
  <script src="<?php echo base_url('assets/noty/packaged/jquery.noty.packaged.min.js'); ?>"></script>
  <?php if(flashdata()){ ?>
      <script type="text/javascript">
          generate(<?php echo flashdata(); ?>);
      </script>
  <?php } ?>
</body>
</html>
