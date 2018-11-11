<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$kategori=$mysqli->query("select * from kategoriler where Id='".$Id."'")->fetch_assoc();
$ad_p=guvenlik($_POST['ad']);
$siralama_p=guvenlik($_POST['siralama']);
$description_p=guvenlik($_POST['description']);
$keywords_p=guvenlik($_POST['keywords']);
$include_keywords_p=guvenlik($_POST['include_keywords']);
$ad=(!empty($ad_p)?$ad_p:$kategori[kategori_adi]);
$siralama=(!empty($siralama_p)?$siralama_p:$kategori[siralama]);
$description=$kategori[description];
$keywords=$kategori[keywords];
$include_keywords=($include_keywords_p!=''?$include_keywords_p:$kategori[include_keywords]);
$img=$_FILES['img'];
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Kategori Düzenle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){		
if($img['tmp_name']!='' and $admin_kilit==0 and $kategori[ust_kategori]==0){
$yeni_isim="../images/category_icon/".seo($kategori[kategori_adi]);
$img_genislik="50";
$img_yukseklik="50";
include("class.image_upload.php");
$simge_url=str_replace("../images/category_icon/","",$DestinationFile).".".$fileType;	
$querys[]="update kategoriler set icon='".$simge_url."' where Id='".$Id."'";
}
$querys[]="update kategoriler set kategori_adi='".$ad."',siralama='".$siralama."',description='".$description_p."',keywords='".$keywords_p."',include_keywords='".$include_keywords."' where Id='".$Id."'";
process_mysql(implode("**",$querys),"kategori-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Kategori Düzenle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&Id=<?=$Id;?>" method="post" class="form-horizontal" enctype="multipart/form-data">
<fieldset>
<legend>Kategori Düzenle : <?=$kategori[kategori_adi];?></legend>
<div class="control-group">
							  <label class="control-label" for="textarea2">Kategori Adı</label>
							  <div class="controls">
								<input type="text" name="ad" value="<?=$ad;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Sıralama</label>
							  <div class="controls">
								<input type="text" name="siralama" value="<?=$siralama;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Kategori Açıklaması (Opsiyonel)</label>
							  <div class="controls">
								<textarea name="description" style="height:100px"><?=$description;?></textarea>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Kategori Anahtar Kelimeler (Opsiyonel)</label>
							  <div class="controls">
								<textarea name="keywords" style="height:100px"><?=$keywords;?></textarea>
								</div>
							</div>	
							<div class="control-group">
								<label class="control-label">Site Ana Kelimeleri Dahil Et</label>
								<div class="controls">
								  <label class="radio inline">
									<input type="radio" name="include_keywords" value="0"<?if($include_keywords==0){?> checked<?}?>>Hayır
								  </label>
								  <label class="radio inline">
									<input type="radio" name="include_keywords" value="1"<?if($include_keywords==1){?> checked<?}?>>Evet
								  </label>
								</div>
							  </div>							
							<?if($kategori[ust_kategori]==0){?>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Kategori Simgesi</label>
							  <div class="controls">
								<input type="file" name="img" value="<?=$simge;?>">
								</div>
							</div>
							<?}?>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Kategori Düzenle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>