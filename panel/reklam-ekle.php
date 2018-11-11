<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$name=guvenlik($_POST['name']);
$type=guvenlik($_POST['type']);
$code=$_POST['code'];
$location=guvenlik($_POST['location']);
$start_p=guvenlik($_POST['start']);
$start=($start_p!=''?$start_p:date("Y-m-d"));
$end=guvenlik($_POST['end']);
$status=guvenlik($_POST['status']);
$source=$_FILES['source'];
$url=guvenlik($_POST['url']);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Reklam Ekle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){	
if($admin_kilit==0){
$extension=pathinfo($source['name'], PATHINFO_EXTENSION);
$new_Id=$mysqli->query("select Id from reklam order by Id desc")->fetch_assoc();
$yeni_isim="../images/adverts/".($new_Id[Id]+1).".".$extension;
$source_url=str_replace("../images/adverts/","",$yeni_isim);
copy($source['tmp_name'],$yeni_isim);								
process_mysql("insert into reklam (Id,name,type,code,location,source,url,start,end,status) values(null,'$name','$type','$code','$location','$source_url','$url','$start','$end','$status')","reklam-yonetimi.html");
}
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Reklam Ekle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal" enctype="multipart/form-data">
<fieldset>
<legend>Reklam Ekle</legend>
<div class="control-group">
							  <label class="control-label" for="textarea2">Reklam Adı</label>
							  <div class="controls">
								<input type="text" name="name" value="<?=$name;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Reklam Türü</label>
							  <div class="controls">
								<select name="type" data-rel="chosen" onchange="change_ad_source_type(this.options[this.selectedIndex].value);">
								<option value="1"<?if($type=='1'){?> selected<?}?>>Resim</option>
								<option value="2"<?if($type=='2'){?> selected<?}?>>Flash</option>
								<option value="3"<?if($type=='3'){?> selected<?}?>>Kod</option>
								</select>
								</div>
							</div>
							<div class="control-group" id="ad_code"<?if($type!=3){?> style="display:none"<?}?>>
							  <label class="control-label" for="textarea2">Reklam Kodu</label>
							  <div class="controls">
								<textarea name="code" style="width:400px;height:100px"><?=$code;?></textarea>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Reklam Konumu</label>
							  <div class="controls">
								<select name="location" data-rel="chosen">
								<option value="1"<?if($location=='1'){?> selected<?}?>>Slayt Sağ Bölüm (241x230px)</option>
								<option value="2"<?if($location=='2'){?> selected<?}?>>Ana Sayfa Vitrini Alt Bölüm (728x90px)</option>
								<option value="3"<?if($location=='3'){?> selected<?}?>>Acil Acil Vitrini Alt Bölüm (728x90px)</option>
								<option value="4"<?if($location=='4'){?> selected<?}?>>Hizmet İlanları Vitrini Alt Bölüm (728x90px)</option>
								<option value="5"<?if($location=='5'){?> selected<?}?>>Mağaza Vitrini Alt Bölüm (728x90px)</option>
								<option value="6"<?if($location=='6'){?> selected<?}?>>Son Eklenen İlanlar Alt Bölüm (728x90px)</option>
								</select>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Reklam Başlangıç Tarihi</label>
							  <div class="controls">
								<input type="text" name="start" value="<?=$start;?>" class="datepicker">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Reklam Bitiş Tarihi</label>
							  <div class="controls">
								<input type="text" name="end" value="<?=$end;?>" class="datepicker">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Reklam Dosyası</label>
							  <div class="controls">
								<input type="file" name="source">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Reklam Linki (URL)</label>
							  <div class="controls">
								<input type="text" name="url" value="<?=$url;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Reklam Türü</label>
							  <div class="controls">
								<select name="status" data-rel="chosen">
								<option value="1"<?if($status=='1'){?> selected<?}?>>Aktif</option>
								<option value="0"<?if($status=='0'){?> selected<?}?>>Pasif</option>
								</select>
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Reklamı Ekle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>