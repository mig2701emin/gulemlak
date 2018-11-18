<!DOCTYPE html>
<html>
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
  <link rel="stylesheet" href="<?php echo base_url('assets/dropzone/min/dropzone.min.css'); ?>"/>
  <style>
    .bd-highlight{
        min-width: 150px;
        text-align:center;
    }
    label{
        font-weight:bold;
    }
  </style>
  <!-- <script src='https://www.google.com/recaptcha/api.js?hl=tr'></script> -->
</head>
<body class="color_bg1">
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="container" style="margin-top:20px; margin-bottom:100px;  ">
        <div class="row d-flex justify-content-center" style="margin-top: 50px;margin-bottom: 50px;">
            <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold;">  Kategori</a> <br></div>
            <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;color: orangered"><i class="fas fa-caret-right"></i> İlan Detay </a>	</div>
            <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold;"> Fotoğraf </a>	</div>
            <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold;" >  Ön İzleme </a>	</div>
            <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold;">  Doping Al </a>	</div>
            <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold"> Tebrikler </a>	</div>
        </div>
      <?php if (isset($kategorinames)): ?>
        <div class="col-md-12 order-md-1 text-primary font-weight-bold" style="margin-bottom:30px;">
          <?php foreach ($kategorinames as $kategoriadi): ?>
            <?php if ($kategoriadi==end($kategorinames)): ?>
                <strong><?php echo $kategoriadi; ?></strong>
            <?php else: ?>
                <?php echo $kategoriadi; ?> <i class="fas fa-angle-double-right"></i>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
        <div class="col-md-12 order-md-1">
          <?php if(validation_errors()){ ?>
            <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
          <?php } ?>

          <form class="needs-validation" novalidate="" method="post" id="ilan_form">
            <!--harita--------------------->
            <input type="hidden" id="map_Val" name="map_Val"/>
            <!--harita--------------------->
            <!--iletişim bilgileri --------->
            <h2 class="text-center">İletişim Bilgileri</h2>
            <div class="mb-3">
                <label for="ilanadi">Adı Soyadı</label>
                <input type="text" class="form-control" name="adsoyad" value="<?php echo $user->ad;?> <?php echo $user->soyad;?>" disabled>
            </div>
            <div class="mb-3">
                <label for="gsm">Cep Telefonu</label>
                <input type="text" class="form-control" name="gsm" value="<?php if($user->gsm!=''){echo $user->gsm;}else{echo "Belirtilmemiş";}?>" disabled>
            </div>
            <div class="mb-3">
                <label for="istel">İş Telefonu</label>
                <input type="text" class="form-control" name="istel" value="<?php if($user->istel!=''){echo $user->istel;}else{echo "Belirtilmemiş";}?>" disabled>
            </div>
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox"  class="custom-control-input" name="yayinla" id="yayinla" value="1" checked/>
              <label class="custom-control-label" for="yayinla">Telefonum ilanımda yayınlansın</label>
            </div>
            <div class="mb-3">
              <a href="<?php echo base_url(); ?>hesabim/bilgilerim" class="btn btn-primary" type="submit">Güncelle <i class="fas fa-caret-right"></i></a>
            </div>
            <hr class="mb-4"/>

            <h2 class="text-center">İlan Detayları</h2>

            <!--magaza sahipleri başlangıç-->
            <?php if ($magaza_var_mi): ?>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox"  class="custom-control-input" name="add_to_store" id="add_to_store" value="1" checked/>
                <label class="custom-control-label" for="add_to_store">İlanı Mağazaya Ekle</label>
              </div>
            <?php endif; ?>
            <!--magaza sahipleri bitiş-->
            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox"  class="custom-control-input" name="yenilensin" id="yenilensin" value="1" checked/>
              <label class="custom-control-label" for="yenilensin">Süre Bitiminde İlan Yenilensin</label>
            </div>
            <div class="mb-3">
              <label for="ilan_notu">Gizli İlan Notu :</label>
              <input class="form-control" type="text" value="<?php echo set_value('ilan_notu'); ?>" name="ilan_notu"/>
            </div>
            <!------------------------------------------------------------------------------>


              <!--başlık --------->
            <div class="mb-3">
                <label for="ilanadi">İlan Başlığı</label>
                <input type="text" class="form-control" name="ilanadi" placeholder="" value="<?php echo set_value('ilanadi'); ?>" required>
                <!--<div class="invalid-feedback">
                    Valid first name is required.
                </div>-->
            </div>

            <!--açıklama --------->
            <div class="mb-3">
              <div id="sample" >
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/nicEdit-latest.js"></script>
                <script type="text/javascript">
                    //<![CDATA[
                    bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                    //]]>
                </script>

                <label for="aciklama">İlan Bilgileri<span class="text-muted"></span></label>
                <textarea name="aciklama" id="aciklama" style="width: 100%;min-height:300px;">
                  <?php echo set_value('aciklama'); ?>
                </textarea>
                <br />
              </div>
            </div>
            <!--fiyat ve birim --------->
            <div class="row mb-3">
                <div class="col-md-8" style="float: left">
                  <label for="fiyat1">Fiyat</label>
                  <input type="text" class="form-control fiyat" name="fiyat1" id="fiyat1" placeholder="" value="<?php echo set_value('fiyat1'); ?>">
                </div>
                <div class="col-md-1" style="float: left">
                  <label for="fiyat2">Kuruş</label>
                  <input type="number" class="form-control" min="0" max="99" name="fiyat2" placeholder="" value="00">
                </div>

                <div class="col-md-3" style="float:right;">
                  <label for="birim">Birim</label>
                  <select class="custom-select d-block w-100" name="birim" required="">
                      <option value="TL"<?php if(set_value('birim') == "TL"){ echo ' selected="selected"'; } ?>>TL</option>
                      <option value="USD"<?php if(set_value('birim') == "USD"){ echo ' selected="selected"'; } ?>>USD</option>
                      <option value="EURO"<?php if(set_value('birim') == "EURO"){ echo ' selected="selected"'; } ?>>EURO</option>
                  </select>
                </div>
            </div>
  <!------------------------------------------------------------------------------>
              <!--ilan süresi --------->
              <div class="mb-3">
                <label for="bitis_suresi">İlan Süresi</label>
                <select class="custom-select d-block w-100" name="bitis_suresi" required="">
                    <option value="1 Ay"<?php if(set_value('bitis_suresi') == "1 Ay"){ echo ' selected="selected"'; } ?>>1 Ay</option>
                    <option value="2 Ay"<?php if(set_value('bitis_suresi') == "2 Ay"){ echo ' selected="selected"'; } ?>>2 Ay</option>
                    <option value="3 Ay"<?php if(set_value('bitis_suresi') == "3 Ay"){ echo ' selected="selected"'; } ?>>3 Ay</option>
                    <option value="4 Ay"<?php if(set_value('bitis_suresi') == "4 Ay"){ echo ' selected="selected"'; } ?>>4 Ay</option>
                    <option value="5 Ay"<?php if(set_value('bitis_suresi') == "5 Ay"){ echo ' selected="selected"'; } ?>>5 Ay</option>
                    <option value="6 Ay"<?php if(set_value('bitis_suresi') == "6 Ay"){ echo ' selected="selected"'; } ?>>6 Ay</option>
                    <option value="7 Ay"<?php if(set_value('bitis_suresi') == "7 Ay"){ echo ' selected="selected"'; } ?>>7 Ay</option>
                    <option value="8 Ay"<?php if(set_value('bitis_suresi') == "8 Ay"){ echo ' selected="selected"'; } ?>>8 Ay</option>
                    <option value="9 Ay"<?php if(set_value('bitis_suresi') == "9 Ay"){ echo ' selected="selected"'; } ?>>9 Ay</option>
                    <option value="10 Ay"<?php if(set_value('bitis_suresi') == "10 Ay"){ echo ' selected="selected"'; } ?>>10 Ay</option>
                    <option value="11 Ay"<?php if(set_value('bitis_suresi') == "11 Ay"){ echo ' selected="selected"'; } ?>>11 Ay</option>
                    <option value="1 Yıl"<?php if(set_value('bitis_suresi') == "1 Yıl"){ echo ' selected="selected"'; } ?>>1 Yıl</option>
                </select>
              </div>

              <hr class="mb-4"/>
              <?php
              foreach ($fields as $field) {
                if($field->type=='text'){
                  ?>

                  <div class="mb-3">
                      <label for="<?php echo $field->seo_name; ?>"><?php echo $field->name; ?><?php if($field->required==1){?> <span style="color:#FF0000">*</span><?php }?></label>
                      <input type="text" class="form-control" name="<?php echo $field->seo_name; ?>" <?php if($field->name=='m²'){?> size="6"<?php }?>
                      <?php if($field->name=='ada'){?> size="5"<?php }?><?php if($field->name=='parsel'){?> size="5"<?php }?>
                      value="<?php echo set_value($field->seo_name); ?>" <?php if($field->required==1){?> required<?php }?>>
                  </div>
                  <?php
                }elseif($field->type=='textarea'){
                  ?>
                  <dt><?php echo $field->name;?><?php if($field->required==1){?> <span style="color:#FF0000">*</span><?php }?></dt>
                  <dd><textarea name="<?php echo $field->seo_name;?>" value="<?php echo set_value($field->seo_name); ?>" style="width:185px;height:50px"<?php if($field->required==1){?> required<?php }?>></textarea></dd>
                  <div style="clear:both"></div>
                  <?php
                }elseif($field->type=='radio'){
                  $coding_ok[$field->name]=0;
                  ?>
                  <?php if ($coding_ok[$field->name]!=1): ?>
                      <h4 class="mb-3"><?php echo $field->name; ?><?php if($field->required==1){?> <span style="color:#FF0000">*</span><?php }?></h4>
                      <div>
                  <?php endif; ?>
                  <?php
                  $new_values=explode("||",$field->field_values);
                  for ($i=0; $i <= count($new_values)-1; $i++) {?>
                    <div class="custom-control custom-radio">
                      <input class="custom-control-input" type="radio" name="<?php echo $field->seo_name; ?>" id="<?php echo md5($field->seo_name."_".$i);?>" value="<?php echo $new_values[$i];?>"<?php if(set_value($field->seo_name) == $new_values[$i]){ echo ' selected="selected"'; } ?> <?php if($field->required==1){?> required<?php }?>>
                      <label class="custom-control-label" for="<?php echo md5($field->seo_name."_".$i);?>"><?php echo " ".$new_values[$i];?></label>
                    </div>
                    <?php
                  }
                  if($coding_ok[$field->name]!=1){?>
                    </div>
                    <hr class="mb-4"/>
                    <?php
                  }

                }elseif($field->type=='select'){
                  ?>

                  <div class="mb-3">
                      <label for="<?php echo $field->seo_name; ?>"><?php echo $field->name; ?><?php if($field->required==1){?> <span style="color:#FF0000">*</span><?php }?></label>
                      <?php if ($field->required==1): ?>
                        <select class="custom-select d-block w-100" name="<?php echo $field->seo_name; ?>" required>
                            <option value="">Seçiniz..</option>
                      <?php else: ?>
                        <select class="custom-select d-block w-100" name="<?php echo $field->seo_name; ?>">
                      <?php endif; ?>
                      <?php
                      $new_values=explode("||",$field->field_values);
                      for ($i = 0; $i <= count($new_values)-1; $i++) {
                        ?>
                        <option value="<?php echo $new_values[$i];?>"<?php if(set_value($field->seo_name) == $new_values[$i]){ echo ' selected="selected"'; } ?>><?php echo $new_values[$i];?></option>
                        <?php
                      }
                      ?>
                      </select>
                  </div>
                  <?php
                }elseif($field->type=='multiple_select'){
                  ?>
                  <dt><?php echo $field->name;?><?php if($field->required==1){?> <span style="color:#FF0000">*</span><?php }?></dt>
                  <dd>
                  <script>$(document).ready(function(){multiple_field_values('<?php echo $field->seo_name;?>','<?php echo $field->Id;?>','<?php echo sha1($field->multiple_field_name);?>','','Seçiniz','./');});</script>
                  <?php
                  if($field->required==1){?>
                    <select name="<?php echo $field->seo_name;?>" onchange="multiple_field_values('<?php echo $field->seo_name;?>','<?php echo $field->Id;?>','<?php echo sha1($field->multiple_field_name);?>','','Seçiniz','./');" required>
                    <option value="">Seçiniz</option>
                    <?php
                  }else{
                    ?>
                    <select name="<?php echo $field->seo_name;?>" onchange="multiple_field_values('<?php echo $field->seo_name;?>','<?php echo $field->Id;?>','<?php echo sha1($field->multiple_field_name);?>','','Seçiniz','./');">
                    <?php
                  }
                  $new_values=explode("||",$field->field_values);
                  for ($i = 0; $i <= count($new_values)-1; $i++) {
                    ?>
                    <option value="<?php echo $new_values[$i];?>"><?php echo $new_values[$i];?></option>
                    <?php
                  }
                  ?>
                  </select>
                  </dd>
                  <div style="clear:both"></div>
                  <dt><?php echo $field->multiple_field_name;?><?php if($field->required==1){?> <span style="color:#FF0000">*</span><?php }?></dt>
                  <dd>
                  <?php
                  if($field->required==1){?>
                    <select name="<?php echo $field->multiple_field_seo_name;?>" id="<?php echo sha1($field->multiple_field_name);?>" required>
                    <option value="">Seçiniz</option>
                    <?php
                  }else{
                    ?>
                    <select name="<?php echo $field->multiple_field_seo_name;?>">
                    <?php
                  }
                  ?>
                  </select>
                  </dd>
                  <div style="clear:both"></div>
                  <?php
                }elseif($field->type=='checkbox'){
                    $coding_ok[$field->name]=0;
                  ?>
                  <?php if ($coding_ok[$field->name]!=1): ?>
                    <div class="col-12">
                      <hr class="mb-4"/>
                      <h4 class="mb-3"><?php echo $field->name; ?></h4>
                      <div class="row">
                  <?php endif; ?>
                  <?php
                  $new_values=explode("||",$field->field_values);
                  for ($i = 0; $i <= count($new_values)-1; $i++) {
                    $crypted_name[$field->seo_name]=md5($field->seo_name."_".$i);
                    ?>
                    <div class="custom-control custom-checkbox col-6 col-md-2">
                        <input type="checkbox" class="custom-control-input" name="<?php echo $field->seo_name;?>[]" value="<?php echo $new_values[$i];?>" id="<?php echo $crypted_name[$field->seo_name];?>" <?php if($field->required==1){?> required<?php }?>/>
                        <label class="custom-control-label" for="<?php echo $crypted_name[$field->seo_name];?>"><?php echo $new_values[$i];?></label>
                    </div>
                    <?php
                  }
                  ?>
                  <?php if ($coding_ok[$field->name]!=1): ?>
                    </div>

                  </div>
                  <?php endif; ?>
                <?php
                }
                $coding_ok[$field->name]="1";

              }
              ?>

              <hr class="mb-4"/>
              <div class="">
                <h2 class="text-center">Adres Bilgisi</h2>
                <div class="row  mt-3">
                  <div class="col-md-4 mb-3">
                      <label for="il">İl</label>
                      <select class="custom-select d-block w-100" name="il" id="il" onchange="ilcegetir(this.options[selectedIndex].value)" required>
                          <option value="">Seçiniz..</option>
                          <?php foreach ($iller as $il): ?>
                            <option value="<?php echo $il->il_id; ?>"<?php if(set_value('il') == $il->il_id){ echo ' selected="selected"'; } ?>><?php echo $il->il_ad; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </div>
                  <div class="col-md-4 mb-3 ilceler">
                      <label for="ilce">İlçe</label>
                      <select class="custom-select d-block w-100 ajaxIlceler" name="ilce" id="ilce" onchange="mahallegetir(this.options[selectedIndex].value)" required>
                          <option value="">Seçiniz..</option>
                          <?php if (isset($ilceler)): ?>
                            <?php foreach ($ilceler as $ilce): ?>
                              <option value="<?php echo $ilce->ilce_id; ?>"<?php if($ilce->ilce_id==$ilce_id){echo ' selected="selected"'; } ?>><?php echo $ilce->ilce_ad; ?></option>
                            <?php endforeach; ?>
                          <?php endif; ?>
                      </select>
                  </div>
                  <div class="col-md-4 mb-3 mahalleler">
                      <label for="mahalle">Mahalle</label>
                      <select class="custom-select d-block w-100" name="mahalle" id="mahalle" onchange="adresgetir()" required>
                          <option value="">Seçiniz..</option>
                          <?php if (isset($mahalleler)): ?>
                            <?php foreach ($mahalleler as $mahalle): ?>
                              <option value="<?php echo $mahalle->mahalle_id; ?>"<?php if($mahalle->mahalle_id==$mahalle_id){echo ' selected="selected"'; } ?>><?php echo $mahalle->mahalle_ad; ?></option>
                            <?php endforeach; ?>
                          <?php endif; ?>
                      </select>
                  </div>
                  <hr class="mb-4"/>
                  <div style="float:left;width:25%">
                    <input type="checkbox" name="use_map" id="use_map_option" value="1"/>
                    <label for="use_map_option">Harita Özelliğini Kullanmak İstiyorum.</label>
                  </div>
                  <div style="clear:both"></div>
                </div>
                <div id="use_map_overlay">Harita Özelliğini Kullanmak İçin Tıklayınız</div>
                <div id="gmap" style="height:575px"></div>
              </div>
              <hr class="mb-4"/>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="ad_rules" id="ad_rules" value="1">
                <label class="custom-control-label" for="ad_rules">İlan verme kurallarını okudum ve kabul ediyorum</label>
              </div>
              <!-- <div class="g-recaptcha" data-sitekey="6LdibXAUAAAAAKHsHSsa7SRfCIFS8Ax1M3PzjfDz"></div> -->

              <div class="row">
                  <div class="col-md-6"></div>
                  <div class="col-md-6" style="float: left"><button class="btn btn-primary  btn-block w-75" type="submit">Devam Et <i class="fas fa-caret-right"></i></button></div>
              </div>


            </form>
          </div>
        </div>
  <?php $this->load->view('layout/footer');?>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyAgvcI5F7yEbzhTlj3HHwj7vnTZgQIdfqA&sensor=false"></script>
  <script src="<?php echo base_url(); ?>assets/map/add_ad_map.js"></script>
  <script src="<?php echo base_url('assets/');?>js/autoNumeric.js" defer></script>
  <script src="<?php echo base_url('assets/noty/packaged/jquery.noty.packaged.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/');?>js/script.js"></script>
  <?php if(flashdata()){ ?>
      <script type="text/javascript">
          generate(<?php echo flashdata(); ?>);
      </script>
  <?php } ?>
  <script type="text/javascript">
  function ilcegetir(parametre) {
    map.clearMarkers();
    if (parametre>0){
      var il_id = parametre;
      //ajax işlemi post ile yapılıyor
      $.post('<?php echo base_url(); ?>ajax/get_ilceler', {il_id : il_id}, function(result){
        //gelen cevapta hata yoksa listeleme yapılıyor..
        if ( result && result.status != 'error' )
        {
          var ilceler = result.data;
          var select ='<label for="ilce">İlçe</label>';
          select += '<select class="custom-select d-block w-100" name="ilce" id="ilce" onchange="mahallegetir(this.options[selectedIndex].value)" required>';
          select += '<option value="">Seçiniz..</option>';
          for( var i = 0; i < ilceler.length; i++)
          {
            select += '<option value="'+ ilceler[i].ilce_id +'">'+ ilceler[i].ilce_ad +'</option>';
          }
          select += '</select>';
          $('div.ilceler').empty().html(select);
        }
        else
        {
          alert('Hata : ' + result.message );
        }
      });
      codeAddress($("#il option:selected").html()+" Türkiye");
    }
  };

  function mahallegetir(parametre) {
    map.clearMarkers();
    if (parametre>0){
      var ilce_id = parametre;
      //ajax işlemi post ile yapılıyor
    $.post('<?php echo base_url(); ?>ajax/get_mahalleler', {ilce_id : ilce_id}, function(result){
        //gelen cevapta hata yoksa listeleme yapılıyor..
        if ( result && result.status != 'error' )
        {
          var mahalleler = result.data;
          var select ='<label for="mahalle">Mahalle</label>';
          select += '<select class="custom-select d-block w-100" name="mahalle" id="mahalle" onchange="adresgetir()" required>';
          select += '<option value="">Seçiniz..</option>';
          for( var i = 0; i < mahalleler.length; i++)
          {
            select += '<option value="'+ mahalleler[i].mahalle_id +'">'+ mahalleler[i].mahalle_ad +'</option>';
          }
          select += '</select>';

          $('div.mahalleler').empty().html(select);
          /*codeAddress($("#ilce option:selected").html()+" "+$("#il option:selected").html()+" Türkiye");*/
        }
        else
        {
          alert('Hata : ' + result.message );
        }
      });
      codeAddress($("#ilce option:selected").html()+" "+$("#il option:selected").html()+" Türkiye");
    }
  };
  function adresgetir() {
    codeAddress($("#mahalle option:selected").html()+" "+$("#ilce option:selected").html()+" "+$("#il option:selected").html()+" Türkiye");
  }
  function addCommas(nStr){

   nStr += '';
   var x1 = nStr.replace('.','')
   // var x = nStr.split('.');
   // var x1 = x[0];
   if (x1.length>9) {
     var rgx = /(\d+)(\d{3})(\d{3})(\d{3})/;
     while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + '.' + '$2' + '.' + '$3' + '.' + '$4');
     }
   } else if (x1.length>6) {
     var rgx = /(\d+)(\d{3})(\d{3})/;
     while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + '.' + '$2' + '.' + '$3');
     }
   }else {
     var rgx = /(\d+)(\d{3})/;
     while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + '.' + '$2');
     }
   }

   //return x1 + x2;
   return x1;
  }
$(document).ready(function() {
  $(".fiyat").keyup(function() {

     var newValue =  addCommas(this.value);
     // alert(newValue);
     console.log(newValue);
     document.querySelector('.fiyat').value = newValue;
  });
});



  </script>
</body>
</html>
