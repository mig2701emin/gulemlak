<?
include('header.php'); 
$type_Get=guvenlik($_GET['type']);
$action=guvenlik($_GET['action']);
if($type_Get=='ilce'){
$sql="select * from tbl_ilce where ilce_id='".$Id."'";
$ad="ilce_ad";
}elseif($type_Get=='semt'){
$sql="select * from tbl_semt where semt_id='".$Id."'";
$ad="mahalle_ad";
}elseif($type_Get=='mahalle'){
$sql="select * from tbl_mahalle where mahalle_id='".$Id."'";
$ad="mahalle_ad";
}else{
$sql="select * from tbl_il where il_id='".$Id."'";
$ad="il_ad";
}
$bolge=$mysqli->query($sql)->fetch_assoc();
$bolge_ad_p=guvenlik($_POST['bolge_ad']);
$bolge_ad=(!empty($bolge_ad_p)?$bolge_ad_p:$bolge[$ad]);
if($type_Get=='ilce'){
$sql2="update tbl_ilce set ilce_ad='".$bolge_ad."' where ilce_id='".$Id."'";
}elseif($type_Get=='semt'){
$sql2="update tbl_semt set semt_ad='".$bolge_ad."' where semt_id='".$Id."'";
}elseif($type_Get=='mahalle'){
$sql2="update tbl_mahalle set mahalle_ad='".$bolge_ad."' where mahalle_id='".$Id."'";
}else{
$sql2="update tbl_il set il_ad='".$bolge_ad."' where il_id='".$Id."'";
}
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Bölge Düzenle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){	
process_mysql($sql2,"bolge-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Bölge Düzenle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&Id=<?=$Id;?>&type=<?=$type_Get;?>" method="post" class="form-horizontal">
<fieldset>
<legend>Bölge Düzenle : <?=$bolge[$ad];?></legend>
							  <div class="control-group">
								<label class="control-label" for="selectError">Bölge Adı</label>
								<div class="controls">
								  <input name="bolge_ad" type="text" value="<?=$bolge_ad;?>">
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