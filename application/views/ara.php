<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="tr">
<!--<![endif]-->
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <meta name="description" content="TicaretMeclisi, Gaziantepte kurulan ve Türkiyede adını duyurmaya başlayan ticaretin yeni merkezidir.">
  <!-- CSS
  ================================================== -->
  <?php $this->load->view('layout/styles');?>
  <link rel="stylesheet" type="text/css" href="http://localhost/assets/css/custom/front.css">
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
  </style>
  <script>
    function show(a){
      $("#div"+a).slideDown("slow");
      $("#xdiv"+a).html('<a class="submenu_text" href="javascript:hide(\''+a+'\');">Gizle</a>');
    }
    function hide(a){
      $("#div"+a).slideUp("slow");
      $("#xdiv"+a).html('<a class="submenu_text" href="javascript:show(\''+a+'\');">Tümünü Göster</a>');
    }
  </script>
</head>
<body class="color_bg1">
  <div class="se-pre-con"></div>
  <div class="main">
    <!-- HEADER START -->
    <?php $this->load->view('layout/header');?>
    <div class="container">
  <div class="row">
    <?php
    $i=1;
    foreach ($ilanlar as $a){
      $firma_adi = html_entity_decode($a->firma_adi);
      $uzunluk=strlen($firma_adi);
      if($uzunluk>40){
          $firma_adi = mb_substr($firma_adi,0,40,'UTF-8').'...';
      }else{
          $firma_adi=$firma_adi;
      }
      $seolink2 = $a->seo_url;
      $il=$this->db->query("select * from tbl_il where il_id='".$a->il."'")->row();
      $ilce=$this->db->query("select * from tbl_ilce where ilce_id='".$a->ilce."'")->row();
      $ilan_no=$a->Id;
      $mahalle=$this->db->query("select * from tbl_mahalle where mahalle_id='".$a->mahalle."'")->row();
      ?>
      <div class="row mt-1 border-bottom<?php if($i%2==0){ ?> color_bg-1<?php }else{ ?> color_bg-2<?php } ?>" onclick="window.location='<?php echo base_url();?><?php echo $seolink2;?>/<?php echo encode($ilan_no);?>';">
        <div class="col-md-3">
          <?php if($a->kucuk_fotograf==1 and ilk_resim($a->Id)!='' and file_exists('photos/thumbnail/'.ilk_resim($a->Id))){?>
            <img src = "<?php echo base_url();?>photos/thumbnail/<?php echo ilk_resim($a->Id);?>" height = "150" width="220" border = "0" alt="<?php echo $a->firma_adi;?>" title="<?php echo $a->firma_adi;?>">
          <?php }else{?>
            <img src = "<?php echo base_url();?>assets/images/yok_thumbnail.png" height = "150" width="220" border = "0" alt="<?php echo $a->firma_adi;?>" title="<?php echo $a->firma_adi;?>">
          <?php }?>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-12"></div>
            <a href="javascript:void(0);"><?php echo $firma_adi;?></a>
            <br/>
            <div class="col-6" style="font-size: 12px;">
              İlan Tarihi:<?php yeni_tarih2($a->kayit_tarihi);?>
            </div>
            <div class="col-6 color_text4">
              <b><?php echo number_format($a->fiyat,0, ',', '.').' '.$a->birim; ?></b>
            </div>
          </div>
        </div>
        <div class="col-md-3 ">
          <div class="col-12 font-weight-bold " style="font-size:12px;font-family: "Raleway", sans-serif">
            <i class="fas fa-map-marker-alt"></i>
            <?php if ($il) { echo $il->il_ad;}?>
            <br/>
            <?php if($mahalle){echo $mahalle->mahalle_ad;}?>
          </div>
        </div>
      </div>
      <?php
      $i++;
    }
    ?>
    <p class="pagination"><?php echo $links; ?></p>
  </div>
</div>
<?php $this->load->view('layout/footer2');?>
</div>
  <script>
    function mesaj_gonder (uyeid,ilanid){alert('Mesaj gönderebilmek için giriş yapmalısınız.');}
    function favori (){alert('İlanı favorilerinize eklemeniz için üye girişi yapmanız gerekmektedir.');}
    function favorisil (){alert('İlanı favorilerden silebilmek için üye girişi yapmanız gerekmektedir.');}
  </script>
  <script type="text/javascript">
  function ilcegetir(parametre) {
    if (parametre > 0){
      var il_id = parametre;
      //ajax işlemi post ile yapılıyor
      $.post('<?php echo base_url(); ?>ajax/get_ilceler', {il_id : il_id}, function(result){
        //gelen cevapta hata yoksa listeleme yapılıyor..
        if ( result && result.status != 'error' )
        {
          var ilceler = result.data;
          var select = '<option value="">Seçiniz..</option>';
          for( var i = 0; i < ilceler.length; i++)
          {
            select += '<option value="'+ ilceler[i].ilce_id +'">'+ ilceler[i].ilce_ad +'</option>';
          }
          select += '</select>';
          $('#ilce').empty().html(select);
        }
        else
        {
          alert('Hata : ' + result.message );
        }
      });
    }
  }

  function mahallegetir(parametre) {
    if (parametre>0){
      var ilce_id = parametre;
      //ajax işlemi post ile yapılıyor
    $.post('<?php echo base_url(); ?>ajax/get_mahalleler', {ilce_id : ilce_id}, function(result){
        //gelen cevapta hata yoksa listeleme yapılıyor..
        if ( result && result.status != 'error' )
        {
          var mahalleler = result.data;
          var select = '<option value="">Seçiniz..</option>';
          for( var i = 0; i < mahalleler.length; i++)
          {
            select += '<option value="'+ mahalleler[i].mahalle_id +'">'+ mahalleler[i].mahalle_ad +'</option>';
          }
          select += '</select>';

          $('#mahalle').empty().html(select);
        }
        else
        {
          alert('Hata : ' + result.message );
        }
      });
    }
  }
  function order_by() {
    $("#sort").submit();
  }
  </script>
<?php $this->load->view('layout/scripts');?>
</body>
</html>
