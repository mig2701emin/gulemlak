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
</style>
</head>
<body>
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="container">
    <div class="p-3 mb-2 bg-secondary text-white text-center"><strong><?php echo $filter." İlanlarım" ?></strong></div>
        <table class="table-responsive">
          <thead class="p-3 mb-2 bg-light">
              <tr>
                <th>Fotoğraf</th>
                <th>Eklenme Tarihi</th>
                <th>Favori</th>
                <th>Sayaç</th>
                <th>Fiyat</th>
                <th>Durum</th>
                <th>Bitiş Tarihi</th>
                <th>İşlem</th>
              </tr>
          </thead>
          <tbody>
            <?php
            if($toplam_kayit==0){?>
              <td colspan="6">İlan Bulunamadı.</td>
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
                <tr>
                  <td rowspan="3">
                    <a href="<?php echo base_url(); ?>ilan/<?php echo $ilan->seo_url;?>-<?php echo $ilan->Id;?>">
                      <img src="<?php if(ilk_resim($ilan->Id)!='' and file_exists('photos/thumbnail/'.ilk_resim($ilan->Id))){echo base_url().'photos/thumbnail/'.ilk_resim($ilan->Id);
                      }else{echo base_url();?>assets/images/yok_thumbnail.png<?php } ?>" border="0" alt="<?php echo $ilan->firma_adi;?>" title="<?php echo $ilan->firma_adi;?>">
                    </a>
                  </td>
                  <td colspan="8" style="text-align:left">
                    <a href="<?php echo base_url();?>ilan/<?php echo $ilan->seo_url;?>-<?php echo $ilan->Id;?>">
                      <?php echo $ilan->firma_adi;?> (#<?php echo $ilan->Id;?>)
                    </a>
                  </td>
                </tr>
                <tr>
                  <td valign="top"><?php echo yeni_tarih($ilan->kayit_tarihi);?></td>
                  <td valign="top" style="text-align:center"><?php echo $favorisorgula;?></td>
                  <td valign="top" style="text-align:center"><?php echo $ilan->toplam_ziyaretci;?></td>
                  <td valign="top" style="text-align:center"><?php echo write_price($ilan->fiyat,$ilan->fiyat2);?> <?php echo $ilan->birim;?></td>
                  <td valign="top" style="text-align:center"><?php if($ilan->onay==0 and $ilan->suresi_doldu==1){?>Süresi Doldu<?php }elseif($ilan->onay==1){?>Yayında<?php }elseif($ilan->onay==2){?>İlan Durduruldu<?php }else{?>Onay Bekliyor<?php } ?></td>
                  <td valign="top" style="text-align:center"><?php echo yeni_tarih($ilan->bitis_tarihi);?></td>
                  <td valign="top">
                    <select name="islem" onchange="ilan_islemyap(this.options[selectedIndex].value,<?php echo $ilan->Id;?>,'<?php echo mb_strtolower($filter);?>');" style="margin-top:-5px">
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
                  </td>
                </tr>
                <tr>
                  <td valign="top" colspan="8" style="text-align:left">
                    <?php echo $kat1->kategori_adi;?>
                    <?php if($ilan->kategori2!=0){?>
                       > <?php echo $kat2->kategori_adi;?>
                     <?php } ?>
                     <?php if($ilan->kategori3!=0){?>
                       > <?php echo $kat3->kategori_adi;?>
                     <?php }?>
                     <?php if($ilan->kategori4!=0){?>
                       > <?php echo $kat4->kategori_adi;?>
                     <?php }?>
                     <?php if($ilan->kategori5!=0){?>
                       > <?php echo $kat5->kategori_adi;?>
                     <?php }?>
                     <?php if($ilan->kategori6!=0){?>
                       > <?php echo $kat6->kategori_adi;?>
                     <?php }?>
                     <?php if($ilan->kategori7!=0){?>
                       > <?php echo $kat7->kategori_adi;?>
                     <?php }?>
                  </td>
                </tr>
                <?php
              }
            }?>
          </tbody>
          </table>
          <p class="pagination text-center"><?php echo $links; ?></p>
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
