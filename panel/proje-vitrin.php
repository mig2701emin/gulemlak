<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$proje=$mysqli->query("select * from projeler where Id='".$Id."'")->fetch_assoc();
$vitrinSQL=$mysqli->query("select * from proje_vitrin where ProjeId='".$Id."'");
$vitrin_q=$vitrinSQL->fetch_assoc();
$vitrin_p = guvenlik($_POST['vitrin']);
$vitrin_bitis_p = guvenlik($_POST['vitrin_bitis']);
$vitrin_durum_p = guvenlik($_POST['vitrin_durum']);
$vitrin_count=($vitrin_p!=''?$vitrin_p:$vitrinSQL->num_rows);
$vitrin_bitis=(!empty($vitrin_bitis_p)?$vitrin_bitis_p:$vitrin_q[bitis]);
$vitrin_durum=(!empty($vitrin_durum_p)?$vitrin_durum_p:$vitrin_q[durum]);
$tarih=date("Y-m-d");
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Proje Vitrin Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='ok'){	
if($vitrin_count==1){
if($vitrinSQL->num_rows==1){
$querys[]="update proje_vitrin set bitis='".$vitrin_bitis."',durum='".$vitrin_durum."' where ProjeId='".$Id."'";
}else{
$querys[]="insert into proje_vitrin (Id,ProjeId,baslangic,bitis,durum) VALUES(NULL,'$Id','$tarih','$vitrin_bitis','$vitrin_durum')";
}
}else{
$querys[]="delete from proje_vitrin where ProjeId='".$Id."'";
}		
process_mysql(implode("**",$querys),"proje-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Proje Vitrin Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&Id=<?=$Id;?>" method="post" class="form-horizontal">
<fieldset>
<legend>Proje Vitrin Yönetimi : <?=$proje[baslik];?></legend>										  					  
							  <div class="control-group">
								<label class="control-label" for="selectError">Vitrin</label>
								<div class="controls">
								  <select name="vitrin" id="vitrin" data-rel="chosen" onchange="active(this);">
									<option value="1"<?if($vitrin_count==1){?> selected<?}?>>Aktif</option>
									<option value="0"<?if($vitrin_count==0){?> selected<?}?>>Pasif</option>
								  </select>
								</div>
							  </div>
							  	<div class="control-group" id="vitrin_bitis"<?if($vitrin_count==0){?> style="display:none"<?}?>>
								<label class="control-label" for="selectError">Vitrin Bitiş Tarihi</label>
								<div class="controls">
								  <input type="text" name="vitrin_bitis" value="<?=$vitrin_bitis;?>" class="datepicker"></input>
								</div>
							  </div>
							   <div class="control-group">
								<label class="control-label" for="selectError">Durum</label>
								<div class="controls">
								  <select name="vitrin_durum" data-rel="chosen">
									<option value="1"<?if($vitrin_durum==1){?> selected<?}?>>Aktif</option>
									<option value="0"<?if($vitrin_durum==0){?> selected<?}?>>Pasif</option>
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