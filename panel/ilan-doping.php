<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$ilan=$mysqli->query("select * from firmalar where Id='".$Id."'")->fetch_assoc();
$acilacilSQL=$mysqli->query("select * from acilacilvitrin where ilanId='".$Id."'");
$acilacil_q=$acilacilSQL->fetch_assoc();
$fiyatidusenlerSQL=$mysqli->query("select * from fiyatvitrin where ilanId='".$Id."'");
$fiyatidusenler_q=$fiyatidusenlerSQL->fetch_assoc();
$acilacil_p = guvenlik($_POST['acilacil']);
$acilacil_bitis_p = guvenlik($_POST['acilacil_bitis']);
$fiyatidusenler_p = guvenlik($_POST['fiyatidusenler']);
$fiyatidusenler_bitis_p = guvenlik($_POST['fiyatidusenler_bitis']);
$ustsiradayim_p = guvenlik($_POST['ustsiradayim']);
$ustsiradayim_bitis_p = guvenlik($_POST['ustsiradayim_bitis']);
$guncelim_p = guvenlik($_POST['guncelim']);
$kucukfotograf_p = guvenlik($_POST['kucukfotograf']);
$kalinyazi_p = guvenlik($_POST['kalinyazi']);
$acilacil_count=($acilacil_p!=''?$acilacil_p:$acilacilSQL->num_rows);
$fiyatidusenler_count=($fiyatidusenler_p!=''?$fiyatidusenler_p:$fiyatidusenlerSQL->num_rows);
$guncelim_count=($guncelim_p!=''?$guncelim_p:$ilan[guncelim]);
$kucukfotograf_count=($kucukfotograf_p!=''?$kucukfotograf_p:$ilan[kucuk_fotograf]);
$kalinyazi_count=($kalinyazi_p!=''?$kalinyazi_p:$ilan[kalinyazi_cerceve]);
$ustsiradayim_count=($ustsiradayim_p!=''?$ustsiradayim_p:$ilan[ust_siradayim]);
$acilacil_bitis=(!empty($acilacil_bitis_p)?$acilacil_bitis_p:$acilacil_q[bitis_tarihi]);
$fiyatidusenler_bitis=(!empty($fiyatidusenler_bitis_p)?$fiyatidusenler_bitis_p:$fiyatidusenler_q[bitis_tarihi]);
$ustsiradayim_bitis=(!empty($ustsiradayim_bitis_p)?$ustsiradayim_bitis_p:$ilan[ust_siradayim_bitis]);
$tarih=date("Y-m-d");
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						İlan Doping Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='ok'){	
if($acilacil_count==1){
if($acilacilSQL->num_rows==1){
$querys[]="update acilacilvitrin set bitis_tarihi='".$acilacil_bitis."' where ilanId='".$Id."'";
}else{
$querys[]="insert into acilacilvitrin (Id,ilanId,baslangic_tarihi,bitis_tarihi) VALUES(NULL,'$Id','$tarih','$acilacil_bitis')";
}
}else{
$querys[]="delete from acilacilvitrin where ilanId='".$Id."'";
}
if($fiyatidusenler_count==1){
if($fiyatidusenlerSQL->num_rows==1){
$querys[]="update fiyatvitrin set bitis_tarihi='".$fiyatidusenler_bitis."' where ilanId='".$Id."'";
}else{
$querys[]="insert into fiyatvitrin (Id,ilanId,baslangic_tarihi,bitis_tarihi) VALUES(NULL,'$Id','$tarih','$fiyatidusenler_bitis')";
}
}else{
$querys[]="delete from fiyatvitrin where ilanId='".$Id."'";
}
if($ustsiradayim_count==1){
$querys[]="update firmalar set ust_siradayim='1',ust_siradayim_bitis='".$ustsiradayim_bitis."' where Id='".$Id."'";
}else{
$querys[]="update firmalar set ust_siradayim='0' where Id='".$Id."'";
}
if($guncelim_count==1){
$querys[]="update firmalar set guncelim='1' where Id='".$Id."'";
}else{
$querys[]="update firmalar set guncelim='0' where Id='".$Id."'";
}	
if($kucukfotograf_count==1){
$querys[]="update firmalar set kucuk_fotograf='1' where Id='".$Id."'";
}else{
$querys[]="update firmalar set kucuk_fotograf='0' where Id='".$Id."'";
}	
if($kalinyazi_count==1){
$querys[]="update firmalar set kalinyazi_cerceve='1' where Id='".$Id."'";
}else{
$querys[]="update firmalar set kalinyazi_cerceve='0' where Id='".$Id."'";
}
process_mysql(implode("**",$querys),"ilan-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> İlan Doping Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&Id=<?=$Id;?>" method="post" class="form-horizontal">
<fieldset>
<legend>İlan Doping Yönetimi : <?=$ilan[firma_adi];?></legend>
							  <div class="control-group">
								<label class="control-label" for="selectError">Acil Acil</label>
								<div class="controls">
								  <select name="acilacil" id="acilacil" data-rel="chosen" onchange="active(this);">
									<option value="1"<?if($acilacil_count==1){?> selected<?}?>>Aktif</option>
									<option value="0"<?if($acilacil_count==0){?> selected<?}?>>Pasif</option>
								  </select>
								</div>
							  </div>											  
							  <div class="control-group" id="acilacil_bitis"<?if($acilacil_count==0){?> style="display:none"<?}?>>
								<label class="control-label" for="selectError">Acil Acil Bitiş Tarihi</label>
								<div class="controls">
								  <input type="text" name="acilacil_bitis" value="<?=$acilacil_bitis;?>" class="datepicker"></input>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError">Fiyatı Düşenler</label>
								<div class="controls">
								  <select name="fiyatidusenler" id="fiyatidusenler" data-rel="chosen" onchange="active(this);">
									<option value="1"<?if($fiyatidusenler_count==1){?> selected<?}?>>Aktif</option>
									<option value="0"<?if($fiyatidusenler_count==0){?> selected<?}?>>Pasif</option>
								  </select>
								</div>
							  </div>											  
							  <div class="control-group" id="fiyatidusenler_bitis"<?if($fiyatidusenler_count==0){?> style="display:none"<?}?>>
								<label class="control-label" for="selectError">Fiyatı Düşenler Bitiş Tarihi</label>
								<div class="controls">
								  <input type="text" name="fiyatidusenler_bitis" value="<?=$fiyatidusenler_bitis;?>" class="datepicker"></input>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError">Üst Sıradayım</label>
								<div class="controls">
								  <select name="ustsiradayim" id="ustsiradayim" data-rel="chosen" onchange="active(this);">
									<option value="1"<?if($ustsiradayim_count==1){?> selected<?}?>>Aktif</option>
									<option value="0"<?if($ustsiradayim_count==0){?> selected<?}?>>Pasif</option>
								  </select>
								</div>
							  </div>											  
							  <div class="control-group" id="ustsiradayim_bitis"<?if($ustsiradayim_count==0){?> style="display:none"<?}?>>
								<label class="control-label" for="selectError">Üst Sıradıym Bitiş Tarihi</label>
								<div class="controls">
								  <input type="text" name="ustsiradayim_bitis" value="<?=$ustsiradayim_bitis;?>" class="datepicker"></input>
								</div>
							  </div>	
								<div class="control-group">
								<label class="control-label" for="selectError">Güncelim</label>
								<div class="controls">
								  <select name="guncelim" id="guncelim" data-rel="chosen" onchange="active(this);">
									<option value="1"<?if($guncelim_count==1){?> selected<?}?>>Aktif</option>
									<option value="0"<?if($guncelim_count==0){?> selected<?}?>>Pasif</option>
								  </select>
								</div>
							  </div>		
							  <div class="control-group">
								<label class="control-label" for="selectError">Küçük Fotoğraf</label>
								<div class="controls">
								  <select name="kucukfotograf" id="kucukfotograf" data-rel="chosen" onchange="active(this);">
									<option value="1"<?if($kucukfotograf_count==1){?> selected<?}?>>Aktif</option>
									<option value="0"<?if($kucukfotograf_count==0){?> selected<?}?>>Pasif</option>
								  </select>
								</div>
							  </div>	
							  <div class="control-group">
								<label class="control-label" for="selectError">Kalın Yazı & Renkli Çerçeve</label>
								<div class="controls">
								  <select name="kalinyazi" id="kalinyazi" data-rel="chosen" onchange="active(this);">
									<option value="1"<?if($kalinyazi_count==1){?> selected<?}?>>Aktif</option>
									<option value="0"<?if($kalinyazi_count==0){?> selected<?}?>>Pasif</option>
								  </select>
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