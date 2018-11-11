<?
include('header.php'); 
$action=guvenlik($_GET['action']);																																																	
$Id=guvenlik($_GET['Id']);																																																	
$fieldId=guvenlik($_GET['fieldId']);	
$ozel_alan=$mysqli->query("select name,field_values from fields where Id='".$fieldId."'")->fetch_assoc();
$alt_ozellik=$mysqli->query("select * from multiple_field_values where fieldId='".$fieldId."' and fieldMainValue='".$Id."'")->fetch_assoc();
$values_p=guvenlik($_POST['values'],1);	
$values=($values_p!=''?$values_p:$alt_ozellik[fieldValue]);			
$alan_value=explode("||",$ozel_alan[field_values]);																																													
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Alt Özellik Düzenle
					</li>
				</ul>
			</div>
<?

if($action=='ok'){	
$check_row=$mysqli->query("select Id from multiple_field_values where fieldId='".$fieldId."' and fieldMainValue='".$Id."'")->num_rows;
if($check_row==0){
$querys[]="insert into multiple_field_values (Id,fieldId,fieldMainValue,fieldValue) values(null,'$fieldId','$Id','$values')";							
}else{
$querys[]="update multiple_field_values set fieldValue='$values' where fieldId='".$fieldId."' and fieldMainValue='".$Id."'";							
}
process_mysql(implode("**",$querys),"alt-ozellik-yonetimi.html?Id=".$fieldId);
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Alt Özellik Düzenle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&fieldId=<?=$fieldId;?>&Id=<?=$Id;?>" method="post" class="form-horizontal">
<fieldset>
<legend>Alt Özellik Düzenle : <?=$ozel_alan['name'];?></legend>
<div class="control-group">
							  <label class="control-label" for="textarea2">Alan Adı</label>
							  <div class="controls">
								<?=$ozel_alan['name'];?>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Değer</label>
							  <div class="controls">
								<?=$alan_value[$Id];?>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Alan Değerleri</label>
							  <div class="controls">
								<textarea name="values" style="width:300px;height:100px"><?=$values;?></textarea> <strong>Değerleri || Kullanarak Ayırınız.</strong>
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