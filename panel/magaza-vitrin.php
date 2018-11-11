<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$magaza=$mysqli->query("select * from magazalar where Id='".$Id."'")->fetch_assoc();
$gvitrinSQL=$mysqli->query("select * from mkvitrin where magazaId='".$Id."'");
$gvitrin_q=$gvitrinSQL->fetch_assoc();
$kvitrinSQL=$mysqli->query("select * from mvitrin where magazaId='".$Id."'");
$kvitrin_q=$kvitrinSQL->fetch_assoc();
$gvitrin_p = guvenlik($_POST['gvitrin']);
$gvitrin_bitis_p = guvenlik($_POST['gvitrin_bitis']);
$kvitrin_p = guvenlik($_POST['kvitrin']);
$kvitrin_bitis_p = guvenlik($_POST['kvitrin_bitis']);
$gvitrin_count=($gvitrin_p!=''?$gvitrin_p:$gvitrinSQL->num_rows);
$kvitrin_count=($kvitrin_p!=''?$kvitrin_p:$kvitrinSQL->num_rows);
$gvitrin_bitis=(!empty($gvitrin_bitis_p)?$gvitrin_bitis_p:$gvitrin_q[bitis_tarihi]);
$kvitrin_bitis=(!empty($kvitrin_bitis_p)?$kvitrin_bitis_p:$kvitrin_q[bitis_tarihi]);
$tarih=date("Y-m-d");
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Mağaza Vitrin Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='ok'){	
if($gvitrin_count==1){
if($gvitrinSQL->num_rows==1){
$querys[]="update mvitrin set bitis_tarihi='".$gvitrin_bitis."' where firmaId='".$Id."'";
}else{
$querys[]="insert into mvitrin (Id,magazaId,baslangic_tarihi,bitis_tarihi) VALUES(NULL,'$Id','$tarih','$gvitrin_bitis')";
}
}else{
$querys[]="delete from mvitrin where magazaId='".$Id."'";
}
if($kvitrin_count==1){
if($kvitrinSQL->num_rows==1){
$querys[]="update mkvitrin set bitis_tarihi='".$kvitrin_bitis."',kategoriId='".$magaza[kategoriid]."' where firmaId='".$Id."'";
}else{
$querys[]="insert into mkvitrin (Id,magazaId,baslangic_tarihi,bitis_tarihi,kategoriId) VALUES(NULL,'$Id','$tarih','$kvitrin_bitis','$ilan[kategoriId]')";
}
}else{
$querys[]="delete from mkvitrin where magazaId='".$Id."'";
}		
process_mysql(implode("**",$querys),"magaza-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> İlan Vitrin Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&Id=<?=$Id;?>" method="post" class="form-horizontal">
<fieldset>
<legend>Mağaza Vitrin Yönetimi : <?=$magaza[magazaadi];?></legend>
							  <div class="control-group">
								<label class="control-label" for="selectError">Ana Sayfa Vitrini</label>
								<div class="controls">
								  <select name="gvitrin" id="gvitrin" data-rel="chosen" onchange="active(this);">
									<option value="1"<?if($gvitrin_count==1){?> selected<?}?>>Aktif</option>
									<option value="0"<?if($gvitrin_count==0){?> selected<?}?>>Pasif</option>
								  </select>
								</div>
							  </div>											  
							  <div class="control-group" id="gvitrin_bitis"<?if($gvitrin_count==0){?> style="display:none"<?}?>>
								<label class="control-label" for="selectError">Ana Sayfa Vitrini Bitiş Tarihi</label>
								<div class="controls">
								  <input type="text" name="gvitrin_bitis" value="<?=$gvitrin_bitis;?>" class="datepicker"></input>
								</div>
							  </div>							  
							  <div class="control-group">
								<label class="control-label" for="selectError">Kategori Vitrini</label>
								<div class="controls">
								  <select name="kvitrin" id="kvitrin" data-rel="chosen" onchange="active(this);">
									<option value="1"<?if($kvitrin_count==1){?> selected<?}?>>Aktif</option>
									<option value="0"<?if($kvitrin_count==0){?> selected<?}?>>Pasif</option>
								  </select>
								</div>
							  </div>
							  	<div class="control-group" id="kvitrin_bitis"<?if($kvitrin_count==0){?> style="display:none"<?}?>>
								<label class="control-label" for="selectError">Kategori Vitrini Bitiş Tarihi</label>
								<div class="controls">
								  <input type="text" name="kvitrin_bitis" value="<?=$kvitrin_bitis;?>" class="datepicker"></input>
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