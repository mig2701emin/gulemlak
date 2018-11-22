<!DOCTYPE html>
<html>
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
  <style media="screen">
    .delete_adFav{
      display:block;
      position:absolute;
      margin-left:90px;
      width:20px;
      height:20px;
      background:url(<?php echo base_url(); ?>assets/images/delete_image.png) no-repeat}
  </style>
</head>
<body class="color_bg1">
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="container">
        <div class="p-3 mb-2 bg-secondary text-white text-center"><strong>Favorilerim</strong></div>
        <?php if ($toplam_kayit == 0){ ?>
          <center><strong style="font-size:16px;">Favori ilanınız bulunmamaktadır</strong></center>
        <?php }else{ ?>
          <script>
            function favori_sil(id){
              $.post("<?php echo base_url(); ?>hesabim/favorisil",{id: id}).done(function(data){
                alert("İlan Favorilerden Silindi.");
                $("#fav_Ad"+id).remove();
              });
            }
          </script>
        <div class="row">
          <?php
          foreach ($ilanlar as $ilan) {
            if (ilk_resim($ilan->Id)!= "" and file_exists("photos/thumbnail/".ilk_resim($ilan->Id))){
              $resim = '<a href="'.base_url().$ilan->seo_url.'/'.encode($ilan->Id).'"><img src = "'.base_url().'photos/thumbnail/'.ilk_resim($ilan->Id).'" height = "80" width="80" border = "0" style="margin-top:10px;"></a>';
            } else {
              $resim = '<a href="'.base_url().$ilan->seo_url.'/'.encode($ilan->Id).'"><img src = "'.base_url().'assets/images/yok.png" height = "80" width="80" border = "0" style="margin-top:10px;"></a>';
            }
            $firma_adi = html_entity_decode($ilan->firma_adi);
            $uzunluk=strlen($firma_adi);
            if($uzunluk>25){
              $firma_adi = mb_substr($firma_adi,0,25,"UTF-8").'...';
            }else{
              $firma_adi=$firma_adi;
            }

          ?>
          <div class="col-md-3" id="fav_Ad<?php echo $ilan->Id; ?>">
            <a title="İlanı Favorilerden Sil" alt="İlanı Favorilerden Sil" href="javascript:favori_sil(<?php echo $ilan->Id; ?>);" class="delete_adFav"></a>
            <center>
              <?php echo $resim; ?>
              <br>
              <br>
              <a href="<?php echo base_url(); ?><?php echo $ilan->seo_url; ?>/<?php echo encode($ilan->Id); ?>"><?php echo $firma_adi; ?></a>
            </center>
          </div>
        <?php } ?>
        </div>
            <br style="clear:both">
            <br>
            <div style="display: table;margin: auto;">
              <a class="pages pages_active" href="">1</a>
            </div>
        <?php } ?>
    </div>
    <div style="clear:both">

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
