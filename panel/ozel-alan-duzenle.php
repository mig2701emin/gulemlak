<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$ozel_alan=$mysqli->query("select * from fields where Id='".$Id."'")->fetch_assoc();
$ad_p=guvenlik($_POST['ad']);		
$ad=($ad_p!=''?$ad_p:$ozel_alan[name]);																																																			
$tur_p=guvenlik($_POST['tur']);			
$tur=($tur_p!=''?$tur_p:$ozel_alan[type]);																																																			
$values_p=guvenlik($_POST['values'],1);	
$values=($values_p!=''?$values_p:$ozel_alan[field_values]);																																																					
$siralama_p=guvenlik($_POST['siralama']);	
$siralama=($siralama_p!=''?$siralama_p:$ozel_alan[siralama]);		
$multiple_field_name_p=guvenlik($_POST['multiple_field_name']);	
$multiple_field_name=($multiple_field_name_p!=''?$multiple_field_name_p:$ozel_alan[multiple_field_name]);	
$multiple_field_seo_name=seo($multiple_field_name);																																																				
$between_p=guvenlik($_POST['between']);		
$between=($between_p!=''?$between_p:$ozel_alan[aralik]);																																																				
$multiple_p=guvenlik($_POST['multiple']);	
$multiple=($multiple_p!=''?$multiple_p:$ozel_alan[multiple]);																																																				
$arama_p=guvenlik($_POST['arama']);			
$arama=($arama_p!=''?$arama_p:$ozel_alan[arama]);																																																		
$required_p=guvenlik($_POST['required']);	
$required=($required_p!=''?$required_p:$ozel_alan[required]);
$withfilter_p=guvenlik($_POST['withfilter']);	
$withfilter=($withfilter_p!=''?$withfilter_p:$ozel_alan[withfilter]);	
$showlist_p=guvenlik($_POST['showlist']);	
$showlist=($showlist_p!=''?$showlist_p:$ozel_alan[showlist]);																																														
$kategori1_p=guvenlik($_POST['kategori1']);		
$kategori1=($kategori1_p!=''?$kategori1_p:$ozel_alan[kategori]);																																																			
$kategori2_p=guvenlik($_POST['kategori2']);	
$kategori2=($kategori2_p!=''?$kategori2_p:$ozel_alan[kategori2]);																																																				
$kategori3_p=guvenlik($_POST['kategori3']);		
$kategori3=($kategori3_p!=''?$kategori3_p:$ozel_alan[kategori3]);																																																			
$kategori4_p=guvenlik($_POST['kategori4']);		
$kategori4=($kategori4_p!=''?$kategori4_p:$ozel_alan[kategori4]);																																																			
$kategori5_p=guvenlik($_POST['kategori5']);		
$kategori5=($kategori5_p!=''?$kategori5_p:$ozel_alan[kategori5]);																																																			
$kategori6_p=guvenlik($_POST['kategori6']);		
$kategori6=($kategori6_p!=''?$kategori6_p:$ozel_alan[kategori6]);																																																			
$kategori7_p=guvenlik($_POST['kategori7']);		
$kategori7=($kategori7_p!=''?$kategori7_p:$ozel_alan[kategori7]);																																																			
$kategori8_p=guvenlik($_POST['kategori8']);		
$kategori8=($kategori8_p!=''?$kategori8_p:$ozel_alan[kategori8]);																																																			
?>
<script>
$(document).ready(function(){
<?if($tur!=""){?>
change_type('<?=$tur;?>');
<?}?>
<?if($kategori1!=0){?>change_category('<?=$kategori1;?>','kategori2','<?=$kategori2;?>');<?}?>
<?if($kategori2!=0){?>change_category('<?=$kategori2;?>','kategori3','<?=$kategori3;?>');<?}?>
<?if($kategori3!=0){?>change_category('<?=$kategori3;?>','kategori4','<?=$kategori4;?>');<?}?>
<?if($kategori4!=0){?>change_category('<?=$kategori4;?>','kategori5','<?=$kategori5;?>');<?}?>
<?if($kategori5!=0){?>change_category('<?=$kategori5;?>','kategori6','<?=$kategori6;?>');<?}?>
<?if($kategori6!=0){?>change_category('<?=$kategori6;?>','kategori7','<?=$kategori7;?>');<?}?>
<?if($kategori7!=0){?>change_category('<?=$kategori7;?>','kategori8','<?=$kategori8;?>');<?}?>
});
</script>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Özel Alan Düzenle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){		
$old_name=seo($ozel_alan[name]);
$new_name=seo($ad);
$querys[]="update custom_fields set field_name='$new_name' where field_name='$old_name'";							
$querys[]="update fields set name='$ad',type='$tur',field_values='$values',kategori='$kategori1',kategori2='$kategori2',kategori3='$kategori3',kategori4='$kategori4',kategori5='$kategori5',kategori6='$kategori6',kategori7='$kategori7',kategori8='$kategori8',required='$required_p',siralama='$siralama',multiple_field_name='$multiple_field_name',multiple_field_seo_name='$multiple_field_seo_name',arama='$arama_p',aralik='$between_p',multiple='$multiple_p',withfilter='$withfilter_p',showlist='$showlist' where Id='".$Id."'";
process_mysql(implode("**",$querys),"ozel-alan-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Özel Alan Düzenle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&Id=<?=$Id;?>" method="post" class="form-horizontal">
<fieldset>
<legend>Özel Alan Düzenle : <?=$ozel_alan[name];?></legend>
<div class="control-group">
							  <label class="control-label" for="textarea2">Alan Adı</label>
							  <div class="controls">
								<input type="text" name="ad" value="<?=$ad;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Alan Türü</label>
							  <div class="controls">
								<select name="tur" data-rel="chosen" onchange="change_type(this.options[this.selectedIndex].value);">
								<option value="text"<?if($tur=='text'){?> selected<?}?>>Yazı Alanı</option>
								<option value="textarea"<?if($tur=='textarea'){?> selected<?}?>>Çoklu Yazı Alanı (Textarea)</option>
								<option value="select"<?if($tur=='select'){?> selected<?}?>>Seçim Kutusu (Selectbox)</option>
								<option value="multiple_select"<?if($tur=='multiple_select'){?> selected<?}?>>Bağlantılı Seçim Kutusu (Selectbox)</option>
								<option value="radio"<?if($tur=='radio'){?> selected<?}?>>Seçenek Kutusu (Radio)</option>
								<option value="checkbox"<?if($tur=='checkbox'){?> selected<?}?>>Seçmeli Kutular (Checkbox)</option>
								</select>
								</div>
							</div>
							<div class="control-group" id="values" style="display:none">
							  <label class="control-label" for="textarea2">Alan Değerleri</label>
							  <div class="controls">
								<textarea name="values" style="width:300px;height:100px"><?=$values;?></textarea> <strong>Değerleri || Kullanarak Ayırınız.</strong>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Kategori 1</label>
							  <div class="controls">
								<select name="kategori1" data-rel="chosen" onchange="change_category(this.options[this.selectedIndex].value,'kategori2','');">
								<option value="0">Seçiniz</option>
								<?
								$katSQL=$mysqli->query("select * from kategoriler where ust_kategori='0'");
								while($kat=$katSQL->fetch_assoc()){
								?>
								<option value="<?=$kat[Id];?>"<?if($kat[Id]==$kategori1){?> selected<?}?>><?=$kat[kategori_adi];?></option>
								<?}?>
								</select>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Kategori 2</label>
							  <div class="controls" id="kategori2">
								<select name="kategori2" data-rel="chosen" onchange="change_category(this.options[this.selectedIndex].value,'kategori3','');">
								<option value="0">Hepsi</option>
								</select>
								</div>
							</div><div class="control-group">
							  <label class="control-label" for="textarea2">Kategori 3</label>
							  <div class="controls" id="kategori3">
								<select name="kategori3" data-rel="chosen" onchange="change_category(this.options[this.selectedIndex].value,'kategori4','');">
								<option value="0">Hepsi</option>
								</select>
								</div>
							</div><div class="control-group">
							  <label class="control-label" for="textarea2">Kategori 4</label>
							  <div class="controls" id="kategori4">
								<select name="kategori4" data-rel="chosen" onchange="change_category(this.options[this.selectedIndex].value,'kategori5','');">
								<option value="0">Hepsi</option>
								</select>
								</div>
							</div><div class="control-group">
							  <label class="control-label" for="textarea2">Kategori 5</label>
							  <div class="controls" id="kategori5">
								<select name="kategori5" data-rel="chosen" onchange="change_category(this.options[this.selectedIndex].value,'kategori6','');">
								<option value="0">Hepsi</option>
								</select>
								</div>
							</div><div class="control-group">
							  <label class="control-label" for="textarea2">Kategori 6</label>
							  <div class="controls" id="kategori6">
								<select name="kategori6" data-rel="chosen" onchange="change_category(this.options[this.selectedIndex].value,'kategori7','');">
								<option value="0">Hepsi</option>
								</select>
								</div>
							</div><div class="control-group">
							  <label class="control-label" for="textarea2">Kategori 7</label>
							  <div class="controls" id="kategori7">
								<select name="kategori7" data-rel="chosen" onchange="change_category(this.options[this.selectedIndex].value,'kategori8','');">
								<option value="0">Hepsi</option>
								</select>
								</div>
							</div><div class="control-group">
							  <label class="control-label" for="textarea2">Kategori 8</label>
							  <div class="controls" id="kategori8">
								<select name="kategori8" data-rel="chosen">
								<option value="0">Hepsi</option>
								</select>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Sıralama</label>
							  <div class="controls">
								<input type="text" name="siralama" value="<?=$siralama;?>">
								</div>
							</div>
							<div class="control-group" id="multiple_field_name" style="display:none">
							  <label class="control-label" for="textarea2">Alt Alan Adı</label>
							  <div class="controls">
								<input type="text" name="multiple_field_name" value="<?=$multiple_field_name;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Zorunlu Alan</label>
							  <div class="controls">
								<input type="checkbox" name="required" value="1"<?if($required==1){?> checked<?}?>>
								</div>
							</div>
							<div class="control-group" id="withfilter"<?if($tur=='text' or $tur=='textarea' or $tur=='checkbox'){?> style="display:none"<?}?>>
							  <label class="control-label" for="textarea2">Filtreleme</label>
							  <div class="controls">
								<input type="checkbox" name="withfilter" value="1"<?if($withfilter==1){?> checked<?}?>>
								</div>
							</div>
							<div class="control-group" id="showlist" style="display:none">
							  <label class="control-label" for="textarea2">Kategori Sayfasında Göster</label>
							  <div class="controls">
								<input type="checkbox" name="showlist" value="1"<?if($showlist==1){?> checked<?}?>>
								</div>
							</div>
							<div class="control-group" id="between">
							  <label class="control-label" for="textarea2">Aralıklı Arama</label>
							  <div class="controls">
								<input type="checkbox" name="between" value="1"<?if($between==1){?> checked<?}?>>
								</div>
							</div>
							<div class="control-group" id="multiple" style="display:none">
							  <label class="control-label" for="textarea2">Çoklu Seçim</label>
							  <div class="controls">
								<input type="checkbox" name="multiple" value="1"<?if($multiple==1){?> checked<?}?>>
								</div>
							</div>
							<div class="control-group" id="detailed_search">
							  <label class="control-label" for="textarea2">Detaylı Aramada Göster</label>
							  <div class="controls">
								<input type="checkbox" name="arama" value="1"<?if($arama==1){?> checked<?}?>>
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Güncelle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>