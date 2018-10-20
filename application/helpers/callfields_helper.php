<?php
function add_fields($field->Id,$field->seo_name,$field->name,$field->type,$field->field_values,$field->aralik,$field->multiple,$field->multiple_field_name,$field->multiple_field_seo_name,$field->required,$field->arama,$field->withfilter,$field->showlist,$action)
{

  if($field->type=='text'){
    ?>

    <div class="mb-3">
        <label for="<?php echo $field->seo_name; ?>"><?php echo $field->name; ?><?php if($field->required==1){?> <span style="color:#FF0000">*</span><?php }?></label>
        <input type="text" class="form-control" name="<?php echo $field->seo_name; ?>" <?php if($field->name=='m2'){?> size="6"<?php }?>
        <?php if($field->name=='ada'){?> size="5"<?php }?><?php if($field->name=='parsel'){?> size="5"<?php }?>
        value="<?php echo set_value('$field->seo_name'); ?>" <?php if($field->required==1){?> required<?php }?>>
    </div>
    <?php
  }elseif($field->type=='textarea'){
    ?>
    <dt><?php echo $field->name;?><?php if($field->required==1){?> <span style="color:#FF0000">*</span><?php }?></dt>
    <dd><textarea name="<?php echo $field->seo_name;?>" style="width:185px;height:50px"<?php if($field->required==1){?> required<?php }?>></textarea></dd>
    <div style="clear:both"></div>
    <?php
  }elseif($field->type=='radio'){
    $coding_ok[$field->name]=0;
    ?>
    <?php if ($coding_ok[$field->name]!=1): ?>
        <h4 class="mb-3"><?php echo $field->name; ?><?php if($field->required==1){?> <span style="color:#FF0000">*</span><?php }?></h4>
    <?php endif; ?>
    <?php
    $new_values=explode("||",$field->field_values);
    for ($i=0; $i <= count($new_values)-1; $i++) {?>
      <div class="custom-control custom-radio">
        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" <?php if($field->required==1){?> required<?php }?>>
        <label class="custom-control-label" for="<?php echo md5($field->seo_name."_".$i);?>"><?php echo $new_values[$i];?></label>
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
          <option value="<?php echo $new_values[$i];?>"><?php echo $new_values[$i];?></option>
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
function getData_fields($field->Id,$field->seo_name,$field->name,$field->type,$field->field_values,$field->aralik,$field->multiple,$field->multiple_field_name,$field->multiple_field_seo_name,$field->required,$field->arama,$field->withfilter,$field->showlist,$action)
{
  global $field_values;
  global $show_fields;
  global $show_additional_fields;

  $ci = & get_instance();
  if ($action =="getData") {
    if($field->type=='checkbox'){
      $field_values[$field->seo_name]=implode($ci->security->xss_clean($ci->input->post($field->seo_name)),", ");
    }elseif($field->type=='multiple_select'){
      $field_values[$field->seo_name]=$ci->security->xss_clean($ci->input->post($field->seo_name));

      $field_values[$field->multiple_field_seo_name]=$ci->security->xss_clean($ci->input->post($field->multiple_field_seo_name));
    }else{
      $field_values[$field->seo_name]=$ci->security->xss_clean($ci->input->post($field->seo_name));
    }
  } elseif ($action =="preview") {
    if($field->type=='checkbox'){
      $show_ok[$field->name]=0;
      $check_values=implode("||",$ci->security->xss_clean($ci->input->post($field->seo_name)));
      $explode_check=explode("||",$check_values);
      $new_values=explode("||",$field->field_values);
      $show_additional_fields.='<div class="genelbox">'.$field->name.'<div class="toggle_div" data-div="'.md5($field->name).'"></div></div>';
      if($show_ok[$field->name]!=1){
        $show_additional_fields.='<div id="'.md5($field->name).'" class="show_hide_div"><ul style="margin:0;padding:0">';
      }
      for ($i = 0; $i <= count($new_values)-1; $i++) {
        $show_additional_fields.='<li style="float:left;list-style-type:none;width:25%"><div style="font-weight:bold;padding-left:20px;line-height:18px;height:18px;">&nbsp;'.$new_values[$i].'</div></li>';
      }
      if($show_ok[$field->name]!=1){
        $show_additional_fields.='</ul><div style="clear:both"></div></div>';
      }
      $show_ok[$field->name]="1";
    }elseif($field->type=='multiple_select'){
      $change_value=$ci->security->xss_clean($ci->input->post($field->seo_name));
      $change_value2=$ci->security->xss_clean($ci->input->post($field->multiple_field_seo_name));
      $show_fields.='<div class="col-12 mar-bot">'.$field->name.':&nbsp;'.($change_value!=''?$change_value:'Belirtilmemiş').'</div>';
      $show_fields.='<div class="col-12 mar-bot">'.$field->multiple_field_name.':&nbsp;'.($change_value2!=''?$change_value2:'Belirtilmemiş').'</div>';
    }else{
      $change_value=$ci->security->xss_clean($ci->input->post($field->seo_name));
      $show_fields.='<div class="col-12 mar-bot">'.$field->name.':&nbsp;'.($change_value!=''?$change_value:'Belirtilmemiş').'</div>';
    }
  }




}

function presorgula2($nerede,$ara)
{
  $ci = & get_instance();
  if(in_array($ara,$ci->security->xss_clean($ci->input->post($nerede)))){
    return "background:url('".base_url('assets')."/images/evet.png') no-repeat 0px -2px";
  }else{
    return "color:#999";
  }
}

?>
