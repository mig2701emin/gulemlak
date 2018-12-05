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
</head>
<body>
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="container" style="margin-top:20px; margin-bottom:100px;  ">
        <div class="row d-flex justify-content-center" style="margin-top: 50px;margin-bottom: 50px;">
            <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;color: orangered"><i class="fas fa-caret-right"></i> İlan Düzenleme </a>	</div>
            <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold"> Tebrikler </a>	</div>
        </div>
      <?php if (isset($kategorinames)){ ?>
        <div class="col-md-12 order-md-1 text-primary font-weight-bold" style="margin-bottom:30px;">
          <?php foreach ($kategorinames as $kategoriadi){ ?>
            <?php if ($kategoriadi==end($kategorinames)){ ?>
                <strong><?php echo $kategoriadi; ?></strong>
            <?php }else{ ?>
                <?php echo $kategoriadi; ?> <i class="fas fa-angle-double-right"></i>
            <?php } ?>
          <?php } ?>
        </div>
      <?php } ?>
        <div class="col-md-12 order-md-1">
          <?php if(validation_errors()){ ?>
            <div class="alert alert-danger"><?php echo validation_errors(); ?></div>
          <?php } ?>

          <form class="needs-validation" novalidate method="post">
            <!--harita--------------------->
            <input type="hidden" id="map_Val" name="map_Val" value="<?php echo $ilan->map;?>"/>
            <!--harita--------------------->
            <!--iletişim bilgileri --------->
            <h2 class="text-center">İletişim Bilgileri</h2>
            <div class="mb-3">
                <label for="adsoyad">Adı Soyadı</label>
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

            <div class="custom-control custom-checkbox mb-3">
              <input type="checkbox"  class="custom-control-input" name="yenilensin" id="yenilensin" value="1"/>
              <label class="custom-control-label" for="yenilensin">Süre Bitiminde İlan Yenilensin</label>
            </div>
            <div class="mb-3">
              <label for="ilan_notu">Gizli İlan Notu :</label>
              <input class="form-control" type="text" name="ilan_notu" value="<?php echo set_value('ilan_notu', $ilan->ilan_notu); ?>"/>
            </div>

              <!--başlık --------->
            <div class="mb-3">
                <label for="ilanadi">İlan Başlığı</label>
                <input type="text" class="form-control" name="ilanadi" placeholder="" value="<?php  echo $ilan->firma_adi; ?>" required>
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
                  <?php  echo base64_decode($ilan->aciklama);?>
                </textarea>
                <br />
              </div>
            </div>
            <!--fiyat ve birim --------->
            <div class="row mb-3">
                <div class="col-md-8" style="float: left">
                  <label for="fiyat1">Fiyat</label>
                  <input type="text" class="form-control" size="8" name="fiyat1" placeholder="" value="<?php echo str_replace(array(".",","),"",$ilan->fiyat);?>" required>
                </div>
                <div class="col-md-1" style="float: left">
                  <label for="fiyat2">Kuruş</label>
                  <input type="number" class="form-control" min="0" max="99" name="fiyat2" placeholder="" value="<?php if($ilan->fiyat2=='0'){echo '00';}else{echo $ilan->fiyat2;}?>">
                </div>

                <div class="col-md-3" style="float:right;">
                  <label for="birim">Birim</label>
                  <select class="custom-select d-block w-100" name="birim" required="">
                      <option value="TL"<?php if($ilan->birim=='TL'){?> selected<?php }?>>TL</option>
                      <option value="USD"<?php if($ilan->birim=='USD'){?> selected<?php }?>>USD</option>
                      <option value="EURO"<?php if($ilan->birim=='EURO'){?> selected<?php }?>>EURO</option>
                  </select>
                </div>
            </div>
  <!------------------------------------------------------------------------------>
              <!--ilan süresi --------->
              <div class="mb-3">
                <label for="bitis_suresi">İlan Süresi</label>
                <select class="custom-select d-block w-100" name="bitis_suresi" required="">
                    <option value="1 Ay">1 Ay</option>
                    <option value="2 Ay">2 Ay</option>
                    <option value="3 Ay">3 Ay</option>
                    <option value="4 Ay">4 Ay</option>
                    <option value="5 Ay">5 Ay</option>
                    <option value="6 Ay">6 Ay</option>
                    <option value="7 Ay">7 Ay</option>
                    <option value="8 Ay">8 Ay</option>
                    <option value="9 Ay">9 Ay</option>
                    <option value="10 Ay">10 Ay</option>
                    <option value="11 Ay">11 Ay</option>
                    <option value="1 Yıl">1 Yıl</option>
                </select>
              </div>

              <!------------------------------------------------------------------------------>
              <hr class="mb-4"/>
              <?php
                //dinamik fieldler başlangıç
              foreach ($fields as $field) {
                if($field->type=='text'){
                  ?>

                  <div class="mb-3">
                      <label for="<?php echo $field->seo_name; ?>"><?php echo $field->name; ?><?php if($field->required==1){?> <span style="color:#FF0000">*</span><?php }?></label>
                      <input type="text" class="form-control" name="<?php echo $field->seo_name; ?>" <?php if($field->name=='m²'){?> size="6"<?php }?>
                      <?php if($field->name=='ada'){?> size="5"<?php }?><?php if($field->name=='parsel'){?> size="5"<?php }?>
                      value="<?php echo set_value($field->seo_name, get_details($ilan->Id,$field->seo_name)); ?>" <?php if($field->required==1){?> required<?php }?>>
                  </div>
                  <?php
                }elseif($field->type=='textarea'){
                  ?>
                  <dt><?php echo $field->name;?><?php if($field->required==1){?> <span style="color:#FF0000">*</span><?php }?></dt>
                  <dd><textarea name="<?php echo $field->seo_name;?>" value="<?php echo get_details($ilan->Id,$field->seo_name); ?>" style="width:185px;height:50px"<?php if($field->required==1){?> required<?php }?>></textarea></dd>
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
                      <input class="custom-control-input" type="radio" name="<?php echo $field->seo_name; ?>"
                      id="<?php echo md5($field->seo_name."_".$i);?>" value="<?php echo $new_values[$i];?>"
                      <?php if(get_details($ilan->Id,$field->seo_name)==$new_values[$i]){?> checked<?php }?><?php if($field->required==1){?> required<?php }?>>
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
                        <option value="<?php echo $new_values[$i];?>"<?php if(get_details($ilan->Id,$field->seo_name)==$new_values[$i]){?> selected<?php }?>><?php echo $new_values[$i];?></option>
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
                    <option value=""<?php if(get_details($ilan->Id,$field->seo_name)==$new_values[$i]){?> selected<?php }?>>Seçiniz</option>
                    <?php
                  }else{
                    ?>
                    <select name="<?php echo $field->seo_name;?>" onchange="multiple_field_values('<?php echo $field->seo_name;?>','<?php echo $field->Id;?>','<?php echo sha1($field->multiple_field_name);?>','','Seçiniz','./');">
                    <?php
                  }
                  $new_values=explode("||",$field->field_values);
                  for ($i = 0; $i <= count($new_values)-1; $i++) {
                    ?>
                    <option value="<?php echo $new_values[$i];?>"<?php if(get_details($ilan->Id,$field->seo_name)==$new_values[$i]){?> selected<?php }?>><?php echo $new_values[$i];?></option>
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
                    <option value=""<?php if(get_details($ilan->Id,$field->seo_name)==''){?> selected<?php }?>>Seçiniz</option>
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
                  $check_values=get_details($ilan->Id,$field->seo_name);
                  $explode_check=explode(", ",$check_values);
                  $new_values=explode("||",$field->field_values);
                  for ($i = 0; $i <= count($new_values)-1; $i++) {
                    $crypted_name[$field->seo_name]=md5($field->seo_name."_".$i);
                    ?>
                    <div class="custom-control custom-checkbox col-6 col-md-2">
                        <input type="checkbox" class="custom-control-input" name="<?php echo $field->seo_name;?>[]" value="<?php echo $new_values[$i];?>" id="<?php echo $crypted_name[$field->seo_name];?>"
                        <?php if($field->required==1){?> required<?php }if(in_array($new_values[$i],$explode_check)){?> checked<?php }?>>
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
                //dinamik fieldler bitiş
              ?>

              <hr class="mb-4"/>
              <div class="">
                <h2 class="text-center">Adres Bilgisi</h2>
                <div class="row  mt-3">
                  <div class="col-md-4 mb-3">
                      <label for="il">İl</label>
                      <select class="custom-select d-block w-100" name="il" id="il" onchange="ilcegetir(this.options[selectedIndex].value)" required>
                          <option value="">Seçiniz..</option>
                          <?php foreach ($iller as $il){ ?>
                            <option value="<?php echo $il->il_id; ?>"<?php if ($il->il_id==$ilan->il) {?> selected <?php }?>><?php echo $il->il_ad; ?></option>
                          <?php } ?>
                      </select>
                  </div>
                  <div class="col-md-4 mb-3 ilceler">
                      <label for="ilce">İlçe</label>
                      <select class="custom-select d-block w-100 ajaxIlceler" name="ilce" id="ilce" onchange="mahallegetir(this.options[selectedIndex].value)" required>
                          <option value="">Seçiniz..</option>
                          <?php foreach ($ilceler as $ilce){ ?>
                            <option value="<?php echo $ilce->ilce_id; ?>"<?php if ($ilce->ilce_id==$ilan->ilce) {?> selected <?php }?>><?php echo $ilce->ilce_ad; ?></option>
                          <?php } ?>
                      </select>
                  </div>
                  <div class="col-md-4 mb-3 mahalleler">
                      <label for="mahalle">Mahalle</label>
                      <select class="custom-select d-block w-100" name="mahalle" id="mahalle" onchange="adresgetir()" required>
                          <option value="">Seçiniz..</option>
                          <?php foreach ($mahalleler as $mahalle){ ?>
                            <option value="<?php echo $mahalle->mahalle_id; ?>"<?php if ($mahalle->mahalle_id==$ilan->mahalle) {?> selected <?php } ?>><?php echo $mahalle->mahalle_ad; ?></option>
                          <?php } ?>
                      </select>
                  </div>
                  <hr class="mb-4"/>
                </div>
                <div id="gmap" style="height:575px"></div>
              </div>
              <hr class="mb-4"/>
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="ad_rules" id="ad_rules" value="1">
                <label class="custom-control-label" for="ad_rules">İlan verme kurallarını okudum ve kabul ediyorum</label>
              </div>
              <div class="row">
                  <div class="col-md-6"></div>
                  <div class="col-md-6"   style="float: left">   <button class="btn btn-primary  btn-block w-75" type="submit">Devam Et <i class="fas fa-caret-right"></i></button></div>
              </div>
            </form>
          </div>
        </div>
  <?php $this->load->view('layout/footeruserpanel');?>
    </div>

  <script src="<?php echo base_url('assets/dropzone/min/dropzone.min.js'); ?>"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maps.google.com/maps/api/js?key=AIzaSyAgvcI5F7yEbzhTlj3HHwj7vnTZgQIdfqA&sensor=false"></script>
  <script src="<?php echo base_url('assets/');?>map/map_edit.php?currentlatlong=<?php echo base64_encode($ilan->map);?>" defer></script>
  <script type="text/javascript" src="<?php echo base_url('assets/');?>js/validation/jquery.validate.js" defer></script>
  <script type="text/javascript" src="<?php echo base_url('assets/');?>js/validation/messages_tr.js" defer></script>
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
      $.post('<?php echo base_url(); ?>ajax/get_ilceler', {il_id : il_id}, function(result){
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
    $.post('<?php echo base_url(); ?>ajax/get_mahalleler', {ilce_id : ilce_id}, function(result){
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
  };

function map_location(){
   <?php if($ilan->map!=''){?>codeAddress("<?php echo replace('tbl_mahalle','mahalle_ad','mahalle_id',$ilan->mahalle).' '.replace('tbl_ilce','ilce_ad','ilce_id',$ilan->ilce).' '.replace('tbl_il','il_ad','il_id',$ilan->il);?> Türkiye");<?php }?>
 };
 $(document).ready(function(){
 $("#ilan_form").validate({
 ignore: 'input:hidden:not(input:hidden.required)',
   rules:{
     'ilanadi': {
       required:true,
       minlength:5,
       maxlength:75
     },
     'aciklama': {
       required: true
     },
     'il': {
       required: true
     },
     'ilce': {
       required: true
     },
     'mahalle': {
       required: true
     },
     'fiyat1': {
       required: true,
       maxlength: 10
     },
     'fiyat2': {
       required: true,
       minlength: 2,
       maxlength: 2
     },
     'birim': {
       required: true
     },
     'bitis_suresi': {
       required: true
     },
     'ad_rules': {
       required: true
     }
   },
   groups:{
     fiyat: "fiyat1 fiyat2 birim",
     bolge: "il ilce mahalle"
   }
 });
});
 $(document).ready(function() {
 	$("input[name='fiyat1']").autoNumeric('init',{vMax:'99999999',aPad:false,aSep: '.',aDec:','});
 	$("input[name='m2']").autoNumeric('init',{vMax:'999999',aPad:false,aSep: '.',aDec:','});
 	$("input[name='ada']").autoNumeric('init',{vMax:'99999',aPad:false,aSep: '',aDec:','});
 	$("input[name='parsel']").autoNumeric('init',{vMax:'99999',aPad:false,aSep: '',aDec:','});
 });
 window.addEventListener("load", function(){
   codeAddress("<?php echo replace('tbl_mahalle','mahalle_ad','mahalle_id',$ilan->mahalle).' '.replace('tbl_ilce','ilce_ad','ilce_id',$ilan->ilce).' '.replace('tbl_il','il_ad','il_id',$ilan->il);?> Türkiye");
 });
</script>
</body>
</html>
