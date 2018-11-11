<?
include('header.php'); 
$action=guvenlik($_GET['action']);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Sipariş Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
process_mysql("delete from siparis where Id='".$Id."'","siparis-yonetimi.html");
}elseif($action=='onayla'){
$siparis_detay = $mysqli->query("SELECT * FROM siparis WHERE Id = '$Id'")->fetch_assoc();
$ilanbilgi=$mysqli->query("select kategoriId from firmalar where Id='$siparis_detay[firmaId]'")->fetch_assoc();
$magazabilgi=$mysqli->query("select kategoriId from magazalar where Id='$siparis_detay[magaza]'")->fetch_assoc();
$bugun=date("Y-m-d");
$bitis=date("Y-m-d",strtotime("+".str_replace('m','',$siparis_detay[sure])." month"));
if($siparis_detay[doping]=="Ana Sayfa Vitrini"){
$querys[]="insert into gvitrin (Id,firmaId,baslangic_tarihi,bitis_tarihi) VALUES(NULL,'$siparis_detay[firmaId]','$bugun','$bitis')";
}elseif($siparis_detay[doping]=="Kategori Vitrini"){
$querys[]="insert into kvitrin (Id,firmaId,baslangic_tarihi,bitis_tarihi,kategoriId) VALUES(NULL,'$siparis_detay[firmaId]','$bugun','$bitis','$ilanbilgi[kategoriId]')";
}elseif($siparis_detay[doping]=="Güncelim"){
$querys[]="UPDATE firmalar SET guncelim='1' WHERE Id='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="Üst Sıradayım"){
$querys[]="UPDATE firmalar SET ust_siradayim='1', ust_siradayim_bitis='$bitis' WHERE Id='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="Küçük Fotoğraf"){
$querys[]="UPDATE firmalar SET kucuk_fotograf='1' WHERE Id='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="Kalın Yazı & Renkli Çerçeve"){
$querys[]="UPDATE firmalar SET kalinyazi_cerceve='1' WHERE Id='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="Acil Acil"){
$querys[]="insert into acilacilvitrin (Id,ilanId,baslangic_tarihi,bitis_tarihi) VALUES(NULL,'$siparis_detay[firmaId]','$bugun','$bitis')";
}elseif($siparis_detay[doping]=="Fiyatı Düşenler"){
$querys[]="insert into fiyatvitrin (Id,ilanId,baslangic_tarihi,bitis_tarihi) VALUES(NULL,'$siparis_detay[firmaId]','$bugun','$bitis')";
}elseif($siparis_detay[doping]=="Mağaza Anasayfa Vitrini"){
$querys[]="insert into mvitrin (Id,magazaId,baslangic_tarihi,bitis_tarihi) VALUES(NULL,'$siparis_detay[magaza]','$bugun','$bitis')";
}elseif($siparis_detay[doping]=="Mağaza Kategori Vitrini"){
$querys[]="insert into mkvitrin (Id,magazaId,kategoriId,baslangic_tarihi,bitis_tarihi) VALUES(NULL,'$siparis_detay[magaza]','$magazabilgi[kategoriId]','$bugun','$bitis')";
}elseif($siparis_detay[doping]=="Süper Mağaza"){
$querys[]="UPDATE magazalar SET supermagaza='1', onay='1', bitis='$bitis' where Id='$siparis_detay[magaza]'";
}elseif($siparis_detay[doping]=="Normal Mağaza"){
$querys[]="UPDATE magazalar SET onay='1', bitis='$bitis' where Id='$siparis_detay[magaza]'";
}elseif($siparis_detay[doping]=="Ücretli İlan"){
$querys[]="update firmalar set onay='1' where Id='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="İlan Videosu"){
$querys[]="update firmalar set video='1' where Id='$siparis_detay[firmaId]'";
}
$querys[]="update siparis set durum='1' where Id='".$Id."'";
process_mysql(implode("**",$querys),"siparis-yonetimi.html");
}elseif($action=='pasiflestir'){
$siparis_detay = $mysqli->query("SELECT * FROM siparis WHERE Id = '$Id'")->fetch_assoc();
if($siparis_detay[doping]=="Ana Sayfa Vitrini"){
$querys[]="delete from gvitrin where firmaId='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="Kategori Vitrini"){
$querys[]="delete from kvitrin where firmaId='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="Güncelim"){
$querys[]="UPDATE firmalar SET guncelim='0' WHERE Id='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="Üst Sıradayım"){
$querys[]="UPDATE firmalar SET ust_siradayim='0' WHERE Id='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="Küçük Fotoğraf"){
$querys[]="UPDATE firmalar SET kucuk_fotograf='0' WHERE Id='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="Kalın Yazı & Renkli Çerçeve"){
$querys[]="UPDATE firmalar SET kalinyazi_cerceve='0' WHERE Id='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="Acil Acil"){
$querys[]="delete from acilacilvitrin ilanId='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="Fiyatı Düşenler"){
$querys[]="delete from fiyatvitrin ilanId='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="Mağaza Anasayfa Vitrini"){
$querys[]="delete from mvitrin magazaId='$siparis_detay[magaza]'";
}elseif($siparis_detay[doping]=="Mağaza Kategori Vitrini"){
$querys[]="delete from mkvitrin where magazaId='$siparis_detay[magaza]'";
}elseif($siparis_detay[doping]=="Süper Mağaza"){
$querys[]="UPDATE magazalar SET supermagaza='0' where Id='$siparis_detay[magaza]'";
}elseif($siparis_detay[doping]=="Normal Mağaza"){
$querys[]="UPDATE magazalar SET onay='1' where Id='$siparis_detay[magaza]'";
}elseif($siparis_detay[doping]=="Ücretli İlan"){
$querys[]="update firmalar set onay='0' where Id='$siparis_detay[firmaId]'";
}elseif($siparis_detay[doping]=="İlan Videosu"){
$querys[]="update firmalar set video='0' where Id='$siparis_detay[firmaId]'";
}
$querys[]="update siparis set durum='0' where Id='".$Id."'";
process_mysql(implode("**",$querys),"siparis-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Sipariş Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Üye / Mağaza</th>
								  <th>İlan No</th>
								  <th>Sipariş</th>
								  <th>İşlem No</th>
								  <th>Süre</th>
								  <th>Tutar</th>
								  <th>Tarih</th>
								  <th>Durum</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from siparis order by durum asc");
						  while($siparis=$SQL->fetch_assoc()){
						  $uye=$mysqli->query("select * from uyeler where Id='".$siparis[uyeId]."'")->fetch_assoc();
						  $magaza=$mysqli->query("select * from magazalar where Id='".$siparis[magaza]."'")->fetch_assoc();
						  ?>
							<tr class="dataListClass">
								<td><?=$siparis[Id];?></td>
								<td class="center"><a href="../uye/<?=$uye[username];?>-<?=$uye[Id];?>"><?=$uye[username];?></a><?if($magaza[magazaadi]!=''){?> / <a href="http://<?=$magaza[username];?>.<?=$nowww;?>"><?=$magaza[magazaadi];?></a><?}?></td>
								<td class="center"><?=$siparis[firmaId];?></td>
								<td class="center"><?=$siparis[doping];?></td>
								<td class="center"><?=$siparis[islemno];?></td>
								<td class="center"><?=doping_time($siparis[sure]);?></td>
								<td class="center"><?=$siparis[tutar];?> TL</td>
								<td class="center"><?=yeni_tarih($siparis[tarih]);?></td>
								<td class="center"><?=($siparis[durum]=='1'?"Ödenmiş":"Ödenmemiş");?></td>
								<td class="center">
									<a class="btn btn-warning" href="siparis-yonetimi.html?Id=<?=$siparis[Id];?>&action=sil" onclick="confirm_delete();">
										<i class="icon-trash icon-white"></i> 
										Sil
									</a>
									<?if($siparis[durum]=='1'){?>
									<a class="btn btn-info" href="siparis-yonetimi.html?Id=<?=$siparis[Id];?>&action=pasiflestir">
										<i class="icon-remove icon-white"></i> 
										Pasifleştir
									</a>
									<?}else{?>
									<a class="btn btn-success" href="siparis-yonetimi.html?Id=<?=$siparis[Id];?>&action=onayla">
										<i class="icon-ok icon-white"></i> 
										Onayla
									</a>
									<?}?>
								</td>
							</tr>
							<?}?>
						  </tbody>
					  </table>            
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>