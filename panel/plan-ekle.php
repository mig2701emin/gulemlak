<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$projeId=guvenlik($_GET['projeId']);
$proje=$mysqli->query("select * from projeler where Id='".$projeId."'")->fetch_assoc();
$baslik=guvenlik($_POST['baslik']);			
$url=seo($baslik);																									
$konutsekli=guvenlik($_POST['konutsekli']);																												
$m2=guvenlik($_POST['m2']);																												
$odasayisi=guvenlik($_POST['odasayisi']);																												
$banyosayisi=guvenlik($_POST['banyosayisi']);		
$salonsayisi=guvenlik($_POST['salonsayisi']);		
$genelozellikler=guvenlik(implode(",",$_POST['genelozellikler']));
$genelozellikler_check=explode(",",$genelozellikler);																											
$img=$_FILES['img'];
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Plan Ekle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){
if($img['type']!='' and $admin_kilit==0){
$new_Id=$mysqli->query("select Id from proje_planlari order by Id desc")->fetch_assoc();
$yeni_isim="../projeler/planlar/".($new_Id[Id]+1);
$img_genislik="600";
$img_yukseklik="450";
include("class.image_upload.php");
$resim=str_replace("../projeler/planlar/","",$DestinationFile).".".$fileType;												
}
process_mysql("insert into proje_planlari (Id,projeId,baslik,seo_url,resim,konutsekli,m2,odasayisi,banyosayisi,salonsayisi,genelozellikler) VALUES(null,'$projeId','$baslik','$url','$resim','$konutsekli','$m2','$odasayisi','$banyosayisi','$salonsayisi','$genelozellikler')","plan-yonetimi.html?projeId=".$projeId);
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Plan Ekle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&projeId=<?=$projeId;?>" method="post" class="form-horizontal" enctype="multipart/form-data">
<fieldset>
<legend>Plan Ekle</legend>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Plan Başlığı</label>
							  <div class="controls">
								<input type="text" name="baslik" value="<?=$baslik;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Resim</label>
							  <div class="controls">
								<input type="file" name="img">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Konut Şekli</label>
							  <div class="controls">
								<input type="text" name="konutsekli" value="<?=$konutsekli;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">m2</label>
							  <div class="controls">
								<input type="text" name="m2" value="<?=$m2;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Oda Sayısı</label>
							<div class="controls">
							  <input type="text" name="odasayisi" value="<?=$odasayisi;?>">
								</div>
							</div>							
							<div class="control-group">
							  <label class="control-label" for="textarea2">Banyo Sayısı</label>
							  <div class="controls">
								<input type="text" name="banyosayisi" value="<?=$banyosayisi;?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Salon Sayısı</label>
							  <div class="controls">
								<input type="text" name="salonsayisi" value="<?=$salonsayisi;?>">
								</div>
							</div>
							<legend>Genel Özellikler</legend>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Bina Özellikleri</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Asansör"<?if(in_array("Asansör",$genelozellikler_check)){?> checked<?}?>>Asansör</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Görüntülü Diafon"<?if(in_array("Görüntülü Diafon",$genelozellikler_check)){?> checked<?}?>>Görüntülü Diafon</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Teras"<?if(in_array("Teras",$genelozellikler_check)){?> checked<?}?>>Teras</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Yangın Alarmı"<?if(in_array("Yangın Alarmı",$genelozellikler_check)){?> checked<?}?>>Yangın Alarmı</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Vale Hizmeti"<?if(in_array("Vale Hizmeti",$genelozellikler_check)){?> checked<?}?>>Vale Hizmeti</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Dinlenme & Bekleme Salonu"<?if(in_array("Dinlenme & Bekleme Salonu",$genelozellikler_check)){?> checked<?}?>>Dinlenme & Bekleme Salonu</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Asansör"<?if(in_array("Asansör",$genelozellikler_check)){?> checked<?}?>>Asansör</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Resepsiyon"<?if(in_array("Resepsiyon",$genelozellikler_check)){?> checked<?}?>>Resepsiyon</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Gaz Alarmı"<?if(in_array("Gaz Alarmı",$genelozellikler_check)){?> checked<?}?>>Gaz Alarmı</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Intercom"<?if(in_array("Intercom",$genelozellikler_check)){?> checked<?}?>>Intercom</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Su Arıtma Sistemi"<?if(in_array("Su Arıtma Sistemi",$genelozellikler_check)){?> checked<?}?>>Su Arıtma Sistemi</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Sismik Kesici"<?if(in_array("Sismik Kesici",$genelozellikler_check)){?> checked<?}?>>Sismik Kesici</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Merkezi Klima"<?if(in_array("Merkezi Klima",$genelozellikler_check)){?> checked<?}?>>Merkezi Klima</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Isı Yalıtımı"<?if(in_array("Isı Yalıtımı",$genelozellikler_check)){?> checked<?}?>>Isı Yalıtımı</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Alt Yapı</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Fiber İnternet"<?if(in_array("Fiber İnternet",$genelozellikler_check)){?> checked<?}?>>Fiber İnternet</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Kablo TV"<?if(in_array("Kablo TV",$genelozellikler_check)){?> checked<?}?>>Kablo TV</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Uydu"<?if(in_array("Uydu",$genelozellikler_check)){?> checked<?}?>>Uydu</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Klima Altyapısı"<?if(in_array("Klima Altyapısı",$genelozellikler_check)){?> checked<?}?>>Klima Altyapısı</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Isınma Tipi</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Merkezi Sistem"<?if(in_array("Merkezi Sistem",$genelozellikler_check)){?> checked<?}?>>Merkezi Sistem</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Kombi"<?if(in_array("Kombi",$genelozellikler_check)){?> checked<?}?>>Kombi</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Soba"<?if(in_array("Soba",$genelozellikler_check)){?> checked<?}?>>Soba</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Şömine"<?if(in_array("Şömine",$genelozellikler_check)){?> checked<?}?>>Şömine</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Klima"<?if(in_array("Klima",$genelozellikler_check)){?> checked<?}?>>Klima</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Yerden Isıtma"<?if(in_array("Yerden Isıtma",$genelozellikler_check)){?> checked<?}?>>Yerden Isıtma</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Konut Şekli</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Çatı Katı"<?if(in_array("Çatı Katı",$genelozellikler_check)){?> checked<?}?>>Çatı Katı</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Bahçe Katı"<?if(in_array("Bahçe Katı",$genelozellikler_check)){?> checked<?}?>>Bahçe Katı</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Ara Kat"<?if(in_array("Ara Kat",$genelozellikler_check)){?> checked<?}?>>Ara Kat</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Villa"<?if(in_array("Villa",$genelozellikler_check)){?> checked<?}?>>Villa</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Müstakil"<?if(in_array("Müstakil",$genelozellikler_check)){?> checked<?}?>>Müstakil</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Dubleks"<?if(in_array("Dubleks",$genelozellikler_check)){?> checked<?}?>>Dubleks</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Tripleks"<?if(in_array("Tripleks",$genelozellikler_check)){?> checked<?}?>>Tripleks</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Balkon Tipleri</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Teras"<?if(in_array("Teras",$genelozellikler_check)){?> checked<?}?>>Teras</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Balkon"<?if(in_array("Balkon",$genelozellikler_check)){?> checked<?}?>>Balkon</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Fransız Balkon"<?if(in_array("Fransız Balkon",$genelozellikler_check)){?> checked<?}?>>Fransız Balkon</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Kat Bahçesi"<?if(in_array("Kat Bahçesi",$genelozellikler_check)){?> checked<?}?>>Kat Bahçesi</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Banyo</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Ebeveyn Banyosu"<?if(in_array("Ebeveyn Banyosu",$genelozellikler_check)){?> checked<?}?>>Ebeveyn Banyosu</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Hilton Lavabo"<?if(in_array("Hilton Lavabo",$genelozellikler_check)){?> checked<?}?>>Hilton Lavabo</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Duşakabin"<?if(in_array("Duşakabin",$genelozellikler_check)){?> checked<?}?>>Duşakabin</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Küvet"<?if(in_array("Küvet",$genelozellikler_check)){?> checked<?}?>>Küvet</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Jakuzi"<?if(in_array("Jakuzi",$genelozellikler_check)){?> checked<?}?>>Jakuzi</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Duş Teknesi"<?if(in_array("Duş Teknesi",$genelozellikler_check)){?> checked<?}?>>Duş Teknesi</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Mutfak</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Amerikan Mutfak"<?if(in_array("Amerikan Mutfak",$genelozellikler_check)){?> checked<?}?>>Amerikan Mutfak</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Ankastre Mutfak"<?if(in_array("Ankastre Mutfak",$genelozellikler_check)){?> checked<?}?>>Ankastre Mutfak</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Kiler"<?if(in_array("Kiler",$genelozellikler_check)){?> checked<?}?>>Kiler</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Mutfak Doğalgazı"<?if(in_array("Mutfak Doğalgazı",$genelozellikler_check)){?> checked<?}?>>Mutfak Doğalgazı</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Buzdolabı"<?if(in_array("Buzdolabı",$genelozellikler_check)){?> checked<?}?>>Buzdolabı</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Banyo</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Ebeveyn Banyosu"<?if(in_array("Ebeveyn Banyosu",$genelozellikler_check)){?> checked<?}?>>Ebeveyn Banyosu</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Hilton Lavabo"<?if(in_array("Hilton Lavabo",$genelozellikler_check)){?> checked<?}?>>Hilton Lavabo</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Duşakabin"<?if(in_array("Duşakabin",$genelozellikler_check)){?> checked<?}?>>Duşakabin</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Küvet"<?if(in_array("Küvet",$genelozellikler_check)){?> checked<?}?>>Küvet</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Jakuzi"<?if(in_array("Jakuzi",$genelozellikler_check)){?> checked<?}?>>Jakuzi</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Duş Teknesi"<?if(in_array("Duş Teknesi",$genelozellikler_check)){?> checked<?}?>>Duş Teknesi</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Doğrama Özellikleri</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Ahşap"<?if(in_array("Ahşap",$genelozellikler_check)){?> checked<?}?>>Ahşap</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Alüminyum"<?if(in_array("Alüminyum",$genelozellikler_check)){?> checked<?}?>>Alüminyum</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="PVC"<?if(in_array("PVC",$genelozellikler_check)){?> checked<?}?>>PVC</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Çift Cam"<?if(in_array("Çift Cam",$genelozellikler_check)){?> checked<?}?>>Çift Cam</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Ekstra Özellik</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Kiler"<?if(in_array("Kiler",$genelozellikler_check)){?> checked<?}?>>Kiler</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Giyinme Odası"<?if(in_array("Giyinme Odası",$genelozellikler_check)){?> checked<?}?>>Giyinme Odası</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Gömme Dolap"<?if(in_array("Gömme Dolap",$genelozellikler_check)){?> checked<?}?>>Gömme Dolap</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Çamaşır Odası"<?if(in_array("Çamaşır Odası",$genelozellikler_check)){?> checked<?}?>>Çamaşır Odası</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Depo"<?if(in_array("Depo",$genelozellikler_check)){?> checked<?}?>>Depo</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Hizmetli Odası"<?if(in_array("Hizmetli Odası",$genelozellikler_check)){?> checked<?}?>>Hizmetli Odası</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Kapı Özellikleri</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Laminant"<?if(in_array("Laminant",$genelozellikler_check)){?> checked<?}?>>Laminant</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Çelik"<?if(in_array("Çelik",$genelozellikler_check)){?> checked<?}?>>Çelik</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Lake"<?if(in_array("Lake",$genelozellikler_check)){?> checked<?}?>>Lake</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="PanelMasif"<?if(in_array("PanelMasif",$genelozellikler_check)){?> checked<?}?>>PanelMasif</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="MDF"<?if(in_array("MDF",$genelozellikler_check)){?> checked<?}?>>MDF</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Duvar Özellikleri</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Saten Boya"<?if(in_array("Saten Boya",$genelozellikler_check)){?> checked<?}?>>Saten Boya</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Yağlı Boya"<?if(in_array("Yağlı Boya",$genelozellikler_check)){?> checked<?}?>>Yağlı Boya</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Plastik Boya"<?if(in_array("Plastik Boya",$genelozellikler_check)){?> checked<?}?>>Plastik Boya</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Kartonpiyer"<?if(in_array("Kartonpiyer",$genelozellikler_check)){?> checked<?}?>>Kartonpiyer</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Duvar Kağıdı"<?if(in_array("Duvar Kağıdı",$genelozellikler_check)){?> checked<?}?>>Duvar Kağıdı</label>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="textarea2">Yer Döşeme</label>
							  <div class="controls">
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Ahşap Parke"<?if(in_array("Ahşap Parke",$genelozellikler_check)){?> checked<?}?>>Ahşap Parke</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Laminant Parke"<?if(in_array("Laminant Parke",$genelozellikler_check)){?> checked<?}?>>Laminant Parke</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Lamine Parke"<?if(in_array("Lamine Parke",$genelozellikler_check)){?> checked<?}?>>Lamine Parke</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Halı Döşeme"<?if(in_array("Halı Döşeme",$genelozellikler_check)){?> checked<?}?>>Halı Döşeme</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Seramik"<?if(in_array("Seramik",$genelozellikler_check)){?> checked<?}?>>Seramik</label>
				<label class="checkbox inline" style="width:23%"><input type="checkbox" name="genelozellikler[]" value="Doğal Taş"<?if(in_array("Doğal Taş",$genelozellikler_check)){?> checked<?}?>>Doğal Taş</label>
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Planı Ekle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>