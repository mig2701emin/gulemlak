<?
include('header.php'); 
$type_Get=guvenlik($_GET['type']);
if($type_Get=='acilacilvitrin'){
$type="acilacilvitrin";
$baslik="Acil Acil İlanı";
$page_url="acil-acil";
}else{
$type="fiyatvitrin";
$baslik="Fiyatı Düşen İlanı";
$page_url="fiyati-dusen";
}
$action=guvenlik($_GET['action']);
$ilan=$mysqli->query("select * from firmalar where Id='".$Id."'")->fetch_assoc();
$dopingSQL=$mysqli->query("select * from ".$type." where ilanId='".$Id."'");
$doping_q=$dopingSQL->fetch_assoc();
$doping_p = guvenlik($_POST['doping']);
$doping_bitis_p = guvenlik($_POST['doping_bitis']);
$doping_count=($doping_p!=''?$doping_p:$dopingSQL->num_rows);
$doping_bitis=(!empty($doping_bitis_p)?$doping_bitis_p:$doping_q[bitis_tarihi]);
$tarih=date("Y-m-d");
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						<?=$baslik;?> Düzenle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){	
if($doping_count==1){
if($dopingSQL->num_rows==1){
$querys[]="update ".$type." set bitis_tarihi='".$doping_bitis."' where ilanId='".$Id."'";
}else{
$querys[]="insert into ".$type." (Id,ilanId,baslangic_tarihi,bitis_tarihi) VALUES(NULL,'$Id','$tarih','$doping_bitis')";
}
}else{
$querys[]="delete from ".$type." where ilanId='".$Id."'";
}		
process_mysql(implode("**",$querys),$page_url."-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> <?=$baslik;?> Düzenle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&Id=<?=$Id;?>&type=<?=$type;?>" method="post" class="form-horizontal">
<fieldset>
<legend><?=$baslik;?> Düzenle : <?=$ilan[firma_adi];?></legend>
							  <div class="control-group">
								<label class="control-label" for="selectError"><?=$baslik;?></label>
								<div class="controls">
								  <select name="doping" id="doping" data-rel="chosen" onchange="active(this);">
									<option value="1"<?if($doping_count==1){?> selected<?}?>>Aktif</option>
									<option value="0"<?if($doping_count==0){?> selected<?}?>>Pasif</option>
								  </select>
								</div>
							  </div>											  
							  <div class="control-group" id="doping_bitis"<?if($doping_count==0){?> style="display:none"<?}?>>
								<label class="control-label" for="selectError"><?=$baslik;?> Bitiş Tarihi</label>
								<div class="controls">
								  <input type="text" name="doping_bitis" value="<?=$doping_bitis;?>" class="datepicker"></input>
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