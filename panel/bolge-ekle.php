<?php 
include('header.php'); 
include('helper.php'); 
$ust=guvenlik($_GET['ust']);
$type_Get=guvenlik($_GET['type']);
$action=guvenlik($_GET['action']);
if(isset($_POST) && !empty($_POST)){
	$bolge_ad=guvenlik($_POST['bolge_ad']);
	$seo_bolge=permalink($bolge_ad);
	if($type_Get=='ilce'){
		$sql="insert into tbl_ilce (ilce_id,il_id,ilce_ad,seo_ilce) VALUES(NULL,'$ust','$bolge_ad','$seo_bolge');";
		/////////////////////////////////////////////////
		klasorleme("../emlak");
		$emlaklar=$mysqli->query("SELECT * FROM kategoriler where Id='46' or Id='47' or Id='48' order by Id");
		foreach($emlaklar as $emlak){
			$seo_emlak=permalink($emlak["kategori_adi"]);
			klasorleme("../emlak/".$seo_emlak);
			if($emlak["Id"]=='46'){
				$konutlar=$mysqli->query("SELECT * FROM kategoriler where Id='149' or Id='155' or Id='157' order by Id");
				foreach($konutlar as $konut){
					$seo_konut=permalink($konut["kategori_adi"]);
					klasorleme("../emlak/".$seo_emlak."/".$seo_konut);
					$kiralaSatlar=$mysqli->query("SELECT * FROM kategoriler where ust_kategori='$konut[Id]' order by Id asc limit 2");
					foreach($kiralaSatlar as $kiralaSat){
						$seo_kiralaSat=permalink($kiralaSat["kategori_adi"]);
						klasorleme("../emlak/".$seo_emlak."/".$seo_konut."/".$seo_kiralaSat);
						$il=$mysqli->query("SELECT * FROM tbl_il where il_id='$ust'")->fetch_assoc();
						$seo_il=$il['seo_il'];
						klasorleme("../emlak/".$seo_emlak."/".$seo_konut."/".$seo_kiralaSat."/".$seo_il);
						klasorleme("../emlak/".$seo_emlak."/".$seo_konut."/".$seo_kiralaSat."/".$seo_il."/".$seo_bolge);	
					}
				}
			}else{		
				$kiralaSatlar=$mysqli->query("SELECT * FROM kategoriler where ust_kategori='$emlak[Id]' order by Id asc limit 2");
				foreach($kiralaSatlar as $kiralaSat){
					$seo_kiralaSat=permalink($kiralaSat["kategori_adi"]);
					klasorleme("../emlak/".$seo_emlak."/".$seo_kiralaSat);
					$il=$mysqli->query("SELECT * FROM tbl_il where il_id='$ust'")->fetch_assoc();
					$seo_il=$il['seo_il'];
					klasorleme("../emlak/".$seo_emlak."/".$seo_kiralaSat."/".$seo_il);
					klasorleme("../emlak/".$seo_emlak."/".$seo_kiralaSat."/".$seo_il."/".$seo_bolge);	
				}	
			}
		}
		///////////////////////////////////////////////////////  
	}elseif($type_Get=='mahalle'){
		$sonkayit=$mysqli->query("select mahalle_id from tbl_mahalle order by mahalle_id desc limit 1")->fetch_assoc();
		$sonid=$sonkayit['mahalle_id']+1;
		$sql="insert into tbl_mahalle (mahalle_id,ilce_id,mahalle_ad,seo_mahalle) VALUES('$sonid','$ust','$bolge_ad','$seo_bolge');";
		/////////////////////////////////////////////////
		klasorleme("../emlak");
		$emlaklar=$mysqli->query("SELECT * FROM kategoriler where Id='46' or Id='47' or Id='48' order by Id");
		foreach($emlaklar as $emlak){
			$seo_emlak=permalink($emlak["kategori_adi"]);
			klasorleme("../emlak/".$seo_emlak);
			if($emlak["Id"]=='46'){
				$konutlar=$mysqli->query("SELECT * FROM kategoriler where Id='149' or Id='155' or Id='157' order by Id");
				foreach($konutlar as $konut){
					$seo_konut=permalink($konut["kategori_adi"]);
					klasorleme("../emlak/".$seo_emlak."/".$seo_konut);
					$kiralaSatlar=$mysqli->query("SELECT * FROM kategoriler where ust_kategori='$konut[Id]' order by Id asc limit 2");
					foreach($kiralaSatlar as $kiralaSat){
						$seo_kiralaSat=permalink($kiralaSat["kategori_adi"]);
						klasorleme("../emlak/".$seo_emlak."/".$seo_konut."/".$seo_kiralaSat);
						$ilce=$mysqli->query("SELECT * FROM tbl_ilce where ilce_id='$ust'")->fetch_assoc();
						$seo_ilce=$ilce['seo_ilce'];
						$il_id=$ilce["il_id"];
						$il=$mysqli->query("SELECT * FROM tbl_il where il_id='$il_id'")->fetch_assoc();
						$seo_il=$il['seo_il'];
						klasorleme("../emlak/".$seo_emlak."/".$seo_konut."/".$seo_kiralaSat."/".$seo_il);
						klasorleme("../emlak/".$seo_emlak."/".$seo_konut."/".$seo_kiralaSat."/".$seo_il."/".$seo_ilce);
						klasorleme("../emlak/".$seo_emlak."/".$seo_konut."/".$seo_kiralaSat."/".$seo_il."/".$seo_ilce."/".$seo_bolge);
						
						$metin='<!doctype html> <html lang="tr"> <head> <meta name="description" content=';
						$metin.=$bolge_ad;
						$kiralaSatTurk=$kiralaSat["kategori_adi"];
						$metin.=' ';
						$metin.=$kiralaSatTurk;
						$metin.=' ';
						$konutTurk=$konut["kategori_adi"];
						$metin.=$konutTurk;
						$metin.='"> <meta name="keywords" content=';
						$metin.=$bolge_ad;
						$metin.=', ';
						$metin.=$kiralaSatTurk;
						$metin.=', ';
						$metin.=$konutTurk;
						$metin.=', emlakmeclisi"> <title>Emlak Meclisi - ';
						$metin.=$bolge_ad;
						$metin.=' ';
						$metin.=$kiralaSatTurk;
						$metin.=' ';
						$metin.=$konutTurk;
						$metin.='</title> <style type="text/css"> body, html { margin: 0; padding: 0; height: 100%; overflow: hidden; } </style></head><body>';
						$metin.=' <iframe width="100%" height="100%" src="http://www.emlakmeclisi.com/kategori/';
						$metin.=$seo_konut;
						$metin.='/?kat1=';
						$metin.='45&kat2=';
						$metin.=$emlak["Id"];
						$metin.='&kat3=';
						$metin.=$konut["Id"];
						$metin.='&kat4=';
						$metin.=$kiralaSat["Id"];
						$metin.='&sehir=';
						$metin.=$il["il_id"];
						$metin.='&ilce=';
						$metin.=$ilce["ilce_id"];
						$metin.='&mahalle=';
						$metin.=$sonid;
						$metin.='" /></body></html>';
						if (!file_exists("../emlak/".$seo_emlak."/".$seo_konut."/".$seo_kiralaSat."/".$seo_il."/".$seo_ilce."/".$seo_bolge."/index.html")){
							touch("../emlak/".$seo_emlak."/".$seo_konut."/".$seo_kiralaSat."/".$seo_il."/".$seo_ilce."/".$seo_bolge."/index.html");
							$acilanDosya=fopen("../emlak/".$seo_emlak."/".$seo_konut."/".$seo_kiralaSat."/".$seo_il."/".$seo_ilce."/".$seo_bolge."/index.html","w");
							fwrite($acilanDosya,$metin);
							fclose($acilanDosya);
						}
						
					}
				}
			}else{		
				$kiralaSatlar=$mysqli->query("SELECT * FROM kategoriler where ust_kategori='$emlak[Id]' order by Id asc limit 2");
				foreach($kiralaSatlar as $kiralaSat){
					$seo_kiralaSat=permalink($kiralaSat["kategori_adi"]);
					klasorleme("../emlak/".$seo_emlak."/".$seo_kiralaSat);
					$ilce=$mysqli->query("SELECT * FROM tbl_ilce where ilce_id='$ust'")->fetch_assoc();
					$seo_ilce=$ilce['seo_ilce'];
					$il_id=$ilce["il_id"];
					$il=$mysqli->query("SELECT * FROM tbl_il where il_id='$il_id'")->fetch_assoc();
					$seo_il=$il['seo_il'];
					klasorleme("../emlak/".$seo_emlak."/".$seo_kiralaSat."/".$seo_il);
					klasorleme("../emlak/".$seo_emlak."/".$seo_kiralaSat."/".$seo_il."/".$seo_ilce);
					klasorleme("../emlak/".$seo_emlak."/".$seo_kiralaSat."/".$seo_il."/".$seo_ilce."/".$seo_bolge);
					
					$metin='<!doctype html> <html lang="tr"> <head> <meta name="description" content=';
						$metin.=$bolge_ad;
						$kiralaSatTurk=$kiralaSat["kategori_adi"];
						$metin.=' ';
						$metin.=$kiralaSatTurk;
						$metin.=' ';
						$emlakTurk=$emlak["kategori_adi"];
						$metin.=$emlakTurk;
						$metin.='"> <meta name="keywords" content=';
						$metin.=$bolge_ad;
						$metin.=', ';
						$metin.=$kiralaSatTurk;
						$metin.=', ';
						$metin.=$emlakTurk;
						$metin.=', emlakmeclisi"> <title>Emlak Meclisi - ';
						$metin.=$bolge_ad;
						$metin.=' ';
						$metin.=$kiralaSatTurk;
						$metin.=' ';
						$metin.=$emlakTurk;
						$metin.='</title> <style type="text/css"> body, html { margin: 0; padding: 0; height: 100%; overflow: hidden; } </style></head><body>';
						$metin.=' <iframe width="100%" height="100%" src="http://www.emlakmeclisi.com/kategori/';
						$metin.=$seo_emlak;
						$metin.='/?kat1=';
						$metin.='45&kat2=';
						$metin.=$emlak["Id"];
						$metin.='&kat3=';
						$metin.=$kiralaSat["Id"];
						$metin.='&sehir=';
						$metin.=$il["il_id"];
						$metin.='&ilce=';
						$metin.=$ilce["ilce_id"];
						$metin.='&mahalle=';
						$metin.=$sonid;
						$metin.='" /></body></html>';
						if (!file_exists("../emlak/".$seo_emlak."/".$seo_kiralaSat."/".$seo_il."/".$seo_ilce."/".$seo_bolge."/index.html")){
							touch("../emlak/".$seo_emlak."/".$seo_kiralaSat."/".$seo_il."/".$seo_ilce."/".$seo_bolge."/index.html");
							$acilanDosya=fopen("../emlak/".$seo_emlak."/".$seo_kiralaSat."/".$seo_il."/".$seo_ilce."/".$seo_bolge."/index.html","w");
							fwrite($acilanDosya,$metin);
							fclose($acilanDosya);
						}
				}	
			}
		}
		///////////////////////////////////////////////////////
	}else{
		$sql="insert into tbl_il (il_id,il_ad) VALUES(NULL,'$bolge_ad');";
	}
}
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Bölge Ekle
					</li>
				</ul>
			</div>
<?
if($action=='ok'){	
process_mysql($sql,"bolge-yonetimi.html?type=".$type_Get."&Id=".$ust);
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Bölge Ekle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
<form action="?action=ok&type=<?=$type_Get;?>&ust=<?=$ust;?>" method="post" class="form-horizontal">
<fieldset>
<legend>Bölge Ekle</legend>
							  <div class="control-group">
								<label class="control-label" for="selectError">Bölge Adı</label>
								<div class="controls">
								  <input name="bolge_ad" type="text">
								</div>
							  </div>											  
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Ekle</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>