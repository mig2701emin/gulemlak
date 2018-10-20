<?php

function get_details($detail)
{
  global $id;
  global $mysqli;
  $b=$mysqli->query("select * from custom_fields where ilanId='$id' and field_name='$detail'")->fetch_assoc();
  return $b['field_value'];
}

function sorgula($nerede,$ara)
{
  global $id;
  global $mysqli;
  $section=$mysqli->query("select * from custom_fields where ilanId='".$id."' and field_name='$nerede' and field_value LIKE '%".$ara."%'")->num_rows;
  if($section=='1'){
    echo "checked";
  }
}
function sorgula2($nerede,$ara,$action)
{
  global $id;
  global $site_adresi;
  global $mysqli;
  if($action=='show'){
    $section=$mysqli->query("select * from custom_fields where ilanId='".$id."' and field_name='$nerede' and field_value LIKE '%".$ara."%'")->num_rows;
    if($section=='1'){
      return "background:url('".$site_adresi."/images/evet.png') no-repeat 0px -2px";
    }else{
      return "color:#999";
    }
  }else{
    if(in_array($ara,$_POST[$nerede])){
      return "background:url('".$site_adresi."/images/evet.png') no-repeat 0px -2px";
    }else{
      return "color:#999";
    }
  }
}

function call_fields($field_main_Id,$fieldId,$name,$type,$values,$between,$multiple,$multiple_field_name,$multiple_field_seo_name,$required,$arama,$withfilter,$showlist,$action)
{
  global $mysqli;
  global $field_values;
  global $show_fields;
  global $show_additional_fields;
  global $checkbox_fields;
  global $site_adresi;
  global $WithFilter_g;
  global $list_field_title;
  global $list_field_value;
  if($action=='withfilter'){
    if($withfilter=='1' and ($type=='radio' or $type=='select')){
      $new_values=explode("||",$values);
      for ($i = 0; $i <= count($new_values)-1; $i++) {
        ?>
        <div class="<?php if($WithFilter_g==$fieldId."**".$new_values[$i]){?>ActiveButton<?php }else{?>WithButtons<?php }?>" style="margin-left:2px;float:left" onclick="window.location='<?php CallWithFilter(str_replace("==","",base64_encode($fieldId."**".$new_values[$i])));?>';"><?=$new_values[$i];?></div>
        <?php
      }
    }
  }elseif($action=='showlist'){
    if($showlist==1){
      $list_field_title[]='<td style="background:#E9E9E9;height:35px;font-weight:bold;text-align:center;">'.$name.'</td>';
      $list_field_value[]=$fieldId;
    }
  }elseif($action=='search_post'){
    if($type=='text'){
      if($between=='1'){
        $field_posted_data[$fieldId."_1"]=$_GET[$fieldId."_1"];
        $field_posted_data[$fieldId."_2"]=$_GET[$fieldId."_2"];
        if(!empty($field_posted_data[$fieldId."_1"]) and !empty($field_posted_data[$fieldId."_2"]) and is_numeric($field_posted_data[$fieldId."_1"]) and is_numeric($field_posted_data[$fieldId."_2"])){
          $field_values[$fieldId]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$fieldId."' and custom_fields.field_value BETWEEN '".$field_posted_data[$fieldId."_1"]."' and '".$field_posted_data[$fieldId."_2"]."')";
        }
      }else{
        $field_posted_data[$fieldId]=$_GET[$fieldId];
        if(!empty($field_posted_data[$fieldId])){
          $field_values[$fieldId]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$fieldId."' and custom_fields.field_value='".$field_posted_data[$fieldId]."')";
        }
      }
    }elseif($type=='select' or $type=='radio'){
      $field_posted_data[$fieldId]=implode("','",array_map("guvenlik",array_map("base64_decode",$_GET[$fieldId])));
      if(!empty($field_posted_data[$fieldId])){
        $field_values[$fieldId]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$fieldId."' and custom_fields.field_value In ('".$field_posted_data[$fieldId]."'))";
      }
    }elseif($type=='checkbox'){
      $field_posted_data[$fieldId]=array_map("guvenlik",array_map("base64_decode",$_GET[$fieldId]));
      $field_search_v="";
      for ($i = 0; $i <= count($field_posted_data[$fieldId])-1; $i++) {
        $field_search_v.=" and find_in_set ('".str_replace('\'','',$field_posted_data[$fieldId][$i])."',replace(custom_fields.field_value,', ',','))";
      }
      if(!empty($field_posted_data[$fieldId])){
        $field_values[$fieldId]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$fieldId."'".$field_search_v.")";
      }
    }elseif($type=='multiple_select'){
      $field_posted_data[$fieldId]=$_GET[$fieldId];
      $field_posted_data2[$multiple_field_seo_name]=implode("','",array_map("guvenlik",array_map('base64_decode',$_GET[$multiple_field_seo_name])));
      if(!empty($field_posted_data[$fieldId]) and !empty($field_posted_data2[$multiple_field_seo_name])){
        $field_values[$fieldId]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$fieldId."' and custom_fields.field_value='".$field_posted_data[$fieldId]."' and custom_fields.field_name='".$multiple_field_seo_name."' and custom_fields.field_value In ('".$field_posted_data2[$multiple_field_seo_name]."'))";
      }
    }
  }elseif($action=='advancedSearchFields'){
    if($type=='checkbox'){
      if($coding_ok[$name]!=1){
        global $display_checkbox_fields;
        $display_checkbox_fields.='
        <br>
        <font face="Arial" color="#800000" size="2"><strong>'.$name.'</strong></font>
        <div class="checkbox_fields_list">
        <ul style="margin:0;padding:0">';
      }
      $new_values=explode("||",$values);
      for ($i = 0; $i <= count($new_values)-1; $i++) {
        $crypted_name[$fieldId]=md5($fieldId."_".$i);
        $display_checkbox_fields.='<li style="float:left;line-height:25px;list-style-type:none;width:25%"><input type="checkbox" name="'.$fieldId.'" value="'.base64_encode($new_values[$i]).'" id="'.$crypted_name[$fieldId].'"><label for="'.$crypted_name[$fieldId].'" style="font-family:Calibri;font-size:13px">&nbsp;'.$new_values[$i].'</label></li>';
      }
      if($coding_ok[$name]!=1){
        $display_checkbox_fields.='</ul>
        <div style="clear:both"></div>
        </div>
        ';
      }
      $coding_ok[$name]="1";
    }elseif($arama=='1'){
      ?>
      <dt><?=$name;?> :</dt>
      <dd>
      <?php
      if($type=='text'){
        if($between=='1'){
          $field_current_date=$_GET[$fieldId."_1"];
          $field_current_date2=$_GET[$fieldId."_2"];
          ?>
          <input type="text" name="<?=$fieldId;?>_1" style="width:74px" value="<?=$field_current_date;?>"> - <input type="text" name="<?=$fieldId;?>_2" value="<?=$field_current_date2;?>" style="width:74px">
          <?php
        }else{
          $field_current_date=$_GET[$fieldId];
          ?>
          <input type="text" name="<?=$fieldId;?>" value="<?=$field_current_date;?>">
          <?php
        }
        ?>
        <?php
      }elseif($type=='select' or $type=='radio'){
        if($multiple==1){
          $field_current_date=array_map('guvenlik',$_GET[$fieldId]);
          if(count($field_current_date)==0){
            $all_selected=1;
          }
        }else{
          $field_current_date=$_GET[$fieldId];
          $all_selected=1;
        }
        ?>
        <select name="<?=$fieldId;?><?php if($multiple==1){?>[]" size="5" onchange="select_check('<?=$fieldId;?>[]');" multiple<?php }else{?>"<?php }?>>
        <option value=""<?php if($all_selected==1){?> selected<?php }?>>Hepsi</option>
        <?php $new_values=explode("||",$values);
        for ($i = 0; $i <= count($new_values)-1; $i++) {
          ?>
          <option value="<?=str_replace("==","",base64_encode($new_values[$i]));?>"<?php if(in_array(str_replace("==","",base64_encode($new_values[$i])),$field_current_date)){?> selected<?php }?>><?=$new_values[$i];?></option>
          <?php
        }
        ?>
        </select>
        <?php
      }elseif($type=='multiple_select'){
        if($multiple==1){
          $posted_values[$multiple_field_seo_name]=guvenlik(implode(",",$_GET[$multiple_field_seo_name]),1);
        }else{
          $posted_values[$multiple_field_seo_name]=guvenlik($_GET[$multiple_field_seo_name],1);
        }
        ?>
        <script>$(document).ready(function(){multiple_field_values('<?=$fieldId;?>','<?=$field_main_Id;?>','<?=sha1($multiple_field_name);?>','<?=$posted_values[$multiple_field_seo_name];?>','Hepsi','../../');});</script>
        <select name="<?=$fieldId;?>" onchange="multiple_field_values('<?=$fieldId;?>','<?=$field_main_Id;?>','<?=sha1($multiple_field_name);?>','','Hepsi','../../');">
        <option value="">Hepsi</option>
        <?php $field_current_date=$_GET[$fieldId];
        $new_values=explode("||",$values);
        for ($i = 0; $i <= count($new_values)-1; $i++) {
          ?>
          <option value="<?=str_replace("==","",base64_encode($new_values[$i]));?>"<?php if(str_replace("==","",base64_encode($new_values[$i]))==$field_current_date){?> selected<?php }?>><?=$new_values[$i];?></option>
          <?php
        }
        ?>
        </select>
        </dd>
        <div style="clear:both"></div>
        <dt><?=$multiple_field_name;?> :</dt>
        <dd>
        <select id="<?=sha1($multiple_field_name);?>" name="<?=$multiple_field_seo_name;?><?php if($multiple==1){?>[]" size="5" onchange="select_check('<?=$multiple_field_seo_name;?>[]');" multiple<?php }else{?>"<?php }?>>
        <option value="">Hepsi</option>
        </select>
        <?php
      }
      ?>
      <?php echo '</dd><div style="clear:both"></div>';
    }
  }elseif($action=='searchFields'){
    if($arama=='1'){
      ?>
      <div onclick="aramaGoster('<?=md5($name);?>');" class="category_fieldName"><?=$name;?><span style="float:right;" id="field_i_<?=md5($name);?>"><img src="<?=$site_adresi;?>/images/close_field.png" width="16" height="15" title="Göster" alt="Göster"></span></div>
      <div id="field_<?=md5($name);?>" class="category_openField">
      <?php
      if($type=='text'){
        if($between=='1'){
          $field_current_date=$_GET[$fieldId."_1"];
          $field_current_date2=$_GET[$fieldId."_2"];
          ?>
          <input type="text" name="<?=$fieldId;?>_1" style="width:60px" value="<?=$field_current_date;?>"> - <input type="text" name="<?=$fieldId;?>_2" value="<?=$field_current_date2;?>" style="width:60px">
          <?php
        }else{
          $field_current_date=$_GET[$fieldId];
          ?>
          <input type="text" name="<?=$fieldId;?>" value="<?=$field_current_date;?>">
          <?php
        }
        ?>
        <?php
      }elseif($type=='select' or $type=='radio'){
        if($multiple==1){
          $field_current_date=array_map('guvenlik',$_GET[$fieldId]);
          if(count($field_current_date)==0){
            $all_selected=1;
          }
        }else{
          $field_current_date=$_GET[$fieldId];
          $all_selected=1;
        }
        ?>
        <select name="<?=$fieldId;?><?php if($multiple==1){?>[]" size="5" onchange="select_check('<?=$fieldId;?>[]');" multiple<?php }else{?>"<?php }?>>
        <option value=""<?php if($all_selected==1){?> selected<?php }?>>Hepsi</option>
        <?php $new_values=explode("||",$values);
        for ($i = 0; $i <= count($new_values)-1; $i++) {
        ?>
          <option value="<?=str_replace("==","",base64_encode($new_values[$i]));?>"<?php if(in_array(str_replace("==","",base64_encode($new_values[$i])),$field_current_date)){?> selected<?php }?>><?=$new_values[$i];?></option>
          <?php
        }
        ?>
        </select>
        <?php
      }elseif($type=='multiple_select'){
        if($multiple==1){
          $posted_values[$multiple_field_seo_name]=guvenlik(implode(",",$_GET[$multiple_field_seo_name]),1);
        }else{
          $posted_values[$multiple_field_seo_name]=guvenlik($_GET[$multiple_field_seo_name],1);
        }
        ?>
        <script>$(document).ready(function(){multiple_field_values('<?=$fieldId;?>','<?=$field_main_Id;?>','<?=sha1($multiple_field_name);?>','<?=$posted_values[$multiple_field_seo_name];?>','Hepsi','../../');});</script>
        <select name="<?=$fieldId;?>" onchange="multiple_field_values('<?=$fieldId;?>','<?=$field_main_Id;?>','<?=sha1($multiple_field_name);?>','','Hepsi','../../');">
        <option value="">Hepsi</option>
        <?php $field_current_date=$_GET[$fieldId];
        $new_values=explode("||",$values);
        for ($i = 0; $i <= count($new_values)-1; $i++) {
          ?>
          <option value="<?=str_replace("==","",base64_encode($new_values[$i]));?>"<?php if(str_replace("==","",base64_encode($new_values[$i]))==$field_current_date){?> selected<?php }?>><?=$new_values[$i];?></option>
          <?php
        }
        ?>
        </select>
        </div>
        <div class="category_fieldSep"></div>
        <div onclick="aramaGoster('<?=md5($multiple_field_name);?>');" class="category_fieldName"><?=$multiple_field_name;?><span style="float:right;" id="field_i_<?=md5($multiple_field_name);?>"><img src="<?=$site_adresi;?>/images/close_field.png" width="16" height="15" title="Göster" alt="Göster"></span></div>
        <div id="field_<?=md5($multiple_field_name);?>" class="category_openField">
        <select id="<?=sha1($multiple_field_name);?>" name="<?=$multiple_field_seo_name;?><?php if($multiple==1){?>[]" size="5" onchange="select_check('<?=$multiple_field_seo_name;?>[]');" multiple<?php }else{?>"<?php }?>>
        <option value="">Hepsi</option>
        </select>
        <?php
      }
      ?>
      </div>
      <div class="category_fieldSep"></div>
      <?php
    }
  }elseif($action=='show' or $action=='preview'){
    if($type=='checkbox'){
      if($action=='show'){
        $check_values=get_details($fieldId);
      }else{
        $check_values=implode("||",$this->security->xss_clean($this->input->post($fieldId)));
      }
      $explode_check=explode("||",$check_values);
      $new_values=explode("||",$values);
      $show_additional_fields.='<div class="genelbox">'.$name.'<div class="toggle_div" data-div="'.md5($name).'"></div></div>';
      if($show_ok[$name]!=1){
        $show_additional_fields.='<div id="'.md5($name).'" class="show_hide_div"><ul style="margin:0;padding:0">';
      }
      for ($i = 0; $i <= count($new_values)-1; $i++) {
        $show_additional_fields.='<li style="float:left;list-style-type:none;width:25%"><div style="font-weight:bold;padding-left:20px;line-height:18px;height:18px;'.sorgula2($fieldId,$new_values[$i],$action).'">&nbsp;'.$new_values[$i].'</div></li>';
      }
      if($show_ok[$name]!=1){
        $show_additional_fields.='</ul><div style="clear:both"></div></div>';
      }
      $show_ok[$name]="1";
    }elseif($type=='multiple_select'){
      if($action=='show'){
        $change_value=get_details($fieldId);
        $change_value2=get_details($multiple_field_seo_name);
      }else{
        $change_value=$this->security->xss_clean($this->input->post($fieldId));
        $change_value2=$this->security->xss_clean($this->input->post($multiple_field_seo_name));
      }
      $show_fields.='<div class="detail_left">'.$name.'</div>
      <div class="detail_right">&nbsp;'.($change_value!=''?$change_value:'Belirtilmemiş').'</div>';
      $show_fields.='<div class="detail_left">'.$multiple_field_name.'</div>
      <div class="detail_right">&nbsp;'.($change_value2!=''?$change_value2:'Belirtilmemiş').'</div>';
    }else{
      if($action=='show'){
        $change_value=get_details($fieldId);
      }else{
        $change_value=$this->security->xss_clean($this->input->post($fieldId));
      }
      $show_fields.='<div class="detail_left">'.$name.'</div>
      <div class="detail_right">&nbsp;'.($change_value!=''?$change_value:'Belirtilmemiş').'</div>';
    }
  }elseif($action=='getData'){
    if($type=='checkbox'){
      $field_values[$fieldId]=implode($this->security->xss_clean($this->input->post($fieldId)),", ");
    }elseif($type=='multiple_select'){
      $field_values[$fieldId]=$this->security->xss_clean($this->input->post($fieldId));
      $field_values[$multiple_field_seo_name]=$this->security->xss_clean($this->input->post($multiple_field_seo_name));
    }else{
      $field_values[$fieldId]=$this->security->xss_clean($this->input->post($fieldId));
    }
  }elseif($action=='getData_Edit'){
    if($type=='multiple_select'){
      $field_values[$fieldId]=$this->security->xss_clean($this->input->post($fieldId));
      $field_values[$multiple_field_seo_name]=$this->security->xss_clean($this->input->post($multiple_field_seo_name));
    }else{
      $field_values[$fieldId]=$this->security->xss_clean($this->input->post($fieldId));
    }
  }else{
    if($type=='text'){
      ?>
      <dt><?=$name;?><?php if($required==1){?> <span style="color:#FF0000">*</span><?php }?></dt>
      <dd><input name="<?=$fieldId;?>" type="text"<?php if($name=='m2'){?> size="6"<?php }?><?php if($name=='ada'){?> size="5"<?php }?><?php if($name=='parsel'){?> size="5"<?php }?><?php if($action=='edit'){?> value="<?=get_details($fieldId);?>"<?php }?><?php if($required==1){?> required<?php }?>></dd>
      <div style="clear:both"></div>
      <?php }elseif($type=='textarea'){?>
      <dt><?=$name;?><?php if($required==1){?> <span style="color:#FF0000">*</span><?php }?></dt>
      <dd><textarea name="<?=$fieldId;?>" style="width:185px;height:50px"<?php if($required==1){?> required<?php }?>><?php if($action=='edit'){echo get_details($fieldId);}?></textarea></dd>
      <div style="clear:both"></div>
      <?php
    }elseif($type=='radio'){?>
      <?php
      if($coding_ok[$name]!=1){?>
        <dt><?=$name;?><?php if($required==1){?> <span style="color:#FF0000">*</span><?php }?></dt>
        <dd>
        <?php
      }
      $new_values=explode("||",$values);
      for ($i = 0; $i <= count($new_values)-1; $i++) {
        ?>
        <input type="radio" name="<?=$fieldId;?>" id="<?=md5($fieldId."_".$i);?>"
        value="<?=$new_values[$i];?>"<?php if($required==1){?> required<?php }?>
        <?php if($action=='edit' and get_details($fieldId)==$new_values[$i]){?> checked
        <?php }?>><label for="<?=md5($fieldId."_".$i);?>">&nbsp;<?=$new_values[$i];?></label>
        <?php }if($coding_ok[$name]!=1){?><label for="<?=$fieldId;?>" class="error"></label>
        </dd>
        <div style="clear:both"></div>
        <?php
      }
    }elseif($type=='select'){?>
      <dt><?=$name;?><?php if($required==1){?> <span style="color:#FF0000">*</span><?php }?></dt>
      <dd>
      <?php
      if($required==1){?>
        <select name="<?=$fieldId;?>" required>
        <option value="">Seçiniz</option>
        <?php
      }else{
        ?>
        <select name="<?=$fieldId;?>">
        <?php
      }
      $new_values=explode("||",$values);
      for ($i = 0; $i <= count($new_values)-1; $i++) {
        ?>
        <option value="<?=$new_values[$i];?>"<?php if($action=='edit' and get_details($fieldId)==$new_values[$i]){?> selected<?php }?>><?=$new_values[$i];?></option>
        <?php
      }
      ?>
      </select>
      </dd>
      <div style="clear:both"></div>
      <?php
    }elseif($type=='multiple_select'){?>
      <dt><?=$name;?><?php if($required==1){?> <span style="color:#FF0000">*</span><?php }?></dt>
      <dd>
      <script>$(document).ready(function(){multiple_field_values('<?=$fieldId;?>','<?=$field_main_Id;?>','<?=sha1($multiple_field_name);?>','<?=get_details($multiple_field_seo_name);?>','Seçiniz','./');});</script>
      <?php
      if($required==1){?>
        <select name="<?=$fieldId;?>" onchange="multiple_field_values('<?=$fieldId;?>','<?=$field_main_Id;?>','<?=sha1($multiple_field_name);?>','','Seçiniz','./');" required>
        <option value=""<?php if($action=='edit' and get_details($fieldId)==$new_values[$i]){?> selected<?php }?>>Seçiniz</option>
        <?php
      }else{
        ?>
        <select name="<?=$fieldId;?>" onchange="multiple_field_values('<?=$fieldId;?>','<?=$field_main_Id;?>','<?=sha1($multiple_field_name);?>','','Seçiniz','./');">
        <?php
      }
      $new_values=explode("||",$values);
      for ($i = 0; $i <= count($new_values)-1; $i++) {
        ?>
        <option value="<?=$new_values[$i];?>"<?php if($action=='edit' and get_details($fieldId)==$new_values[$i]){?> selected<?php }?>><?=$new_values[$i];?></option>
        <?php
      }
      ?>
      </select>
      </dd>
      <div style="clear:both"></div>
      <dt><?=$multiple_field_name;?><?php if($required==1){?> <span style="color:#FF0000">*</span><?php }?></dt>
      <dd>
      <?php
      if($required==1){?>
        <select name="<?=$multiple_field_seo_name;?>" id="<?=sha1($multiple_field_name);?>" required>
        <option value=""<?php if($action=='edit' and get_details($fieldId)==''){?> selected<?php }?>>Seçiniz</option>
        <?php
      }else{
        ?>
        <select name="<?=$multiple_field_seo_name;?>">
        <?php
      }
      ?>
      </select>
      </dd>
      <div style="clear:both"></div>
      <?php
    }elseif($type=='checkbox'){?>
      <?php
      $coding_ok[$name]=0;
      if($coding_ok[$name]!=1){?>
        <dt style="color:#800000;margin-bottom:5px"><?=$name;?><label for="<?=$fieldId;?>[]" class="error"><label></dt>
        <div style="clear:both"></div>
        <div class="checkbox_fields_list">
        <ul style="margin:0;padding:0">
        <?php
      }
      if($action=='edit'){
        $check_values=get_details($fieldId);
        $explode_check=explode(", ",$check_values);
      }
      $new_values=explode("||",$values);
      for ($i = 0; $i <= count($new_values)-1; $i++) {
        $crypted_name[$fieldId]=md5($fieldId."_".$i);
        ?>
        <li style="float:left;line-height:25px;list-style-type:none;width:25%">
          <input type="checkbox" name="<?=$fieldId;?>[]" value="<?=$new_values[$i];?>" id="<?=$crypted_name[$fieldId];?>"
          <?php if($required==1){?> required<?php }if($action=='edit' and in_array($new_values[$i],$explode_check)){?> checked<?php }?>>
          <label for="<?=$crypted_name[$fieldId];?>" style="font-family:Calibri;font-size:13px">&nbsp;<?=$new_values[$i];?></label></li>
        <?php
      }
      if($coding_ok[$name]!=1){
        ?>
        </ul>
        <div style="clear:both"></div>
        </div>
        <?php
      }
    }
    $coding_ok[$name]="1";
  }
}
?>
