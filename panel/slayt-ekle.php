<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$img=$_FILES['img'];
$url=guvenlik($_POST['url']);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Slayt Ekle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){	
if($img['tmp_name']!='' and $admin_kilit==0){
$new_Id=$mysqli->query("select Id from slayt order by Id desc")->fetch_assoc();
$yeni_isim="../images/home_slider/".($new_Id[Id]+1);
$img_genislik="510";
$img_yukseklik="242";
include("class.image_upload.php");
$slayt_url=str_replace("../images/home_slider/","",$DestinationFile).".".$fileType;												
process_mysql("insert into slayt (Id,slayt,url) values(null,'$slayt_url','$url')","slayt-yonetimi.html");
}
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Slayt Ekle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok" method="post" class="form-horizontal" enctype="multipart/form-data">
<fieldset>
<legend>Slayt Ekle</legend>
<div class="control-group">
							  <label class="control-label" for="textarea2">Slayt Resmi</label>
							  <div class="controls">
								<input type="file" name="img">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Slayt Linki</label>
							  <div class="controls">
								<input type="text" name="url" value="<?=$url;?>">
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Slaytı Ekle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>