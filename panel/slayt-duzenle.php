<?
include('header.php'); 
$slide_detail=$mysqli->query("select * from slayt where Id='".$Id."'")->fetch_assoc();
$action=guvenlik($_GET['action']);
$img=$_FILES['img'];
$url_p=guvenlik($_POST['url']);
$url=($url_p!=''?$url_p:$slide_detail[url]);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Slayt Düzenle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){	
if($admin_kilit==0){
if($img['tmp_name']!=''){
$yeni_isim="../images/home_slider/".$Id;
$img_genislik="510";
$img_yukseklik="242";
include("class.image_upload.php");
$slayt_url=str_replace("../images/home_slider/","",$DestinationFile).".".$fileType;												
}else{
$slayt_url=$slide_detail[slayt];
}		
process_mysql("update slayt set slayt='".$slayt_url."',url='".$url."' where Id='".$Id."'","slayt-yonetimi.html");
}
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Slayt Düzenle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&Id=<?=$Id;?>" method="post" class="form-horizontal" enctype="multipart/form-data">
<fieldset>
<legend>Slayt Düzenle</legend>
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
							  <button type="submit" class="btn btn-primary">Slaytı Güncelle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>