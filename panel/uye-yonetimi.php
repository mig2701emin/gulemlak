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
						Tüm Üyeler
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
$uye_sql=$mysqli->query("select Id from firmalar where uyeId='".$Id."'");
while($ilan=$uye_sql->fetch_assoc()){
$sql_ilan[$ilan[Id]] = $mysqli->query("select * from firmalar WHERE Id = '".$ilan[Id]."'")->fetch_assoc();
$resimler=$mysqli->query("select * from pictures WHERE ilanId = '".$ilan[Id]."'");
global $admin_kilit;
if($admin_kilit==0){
while ($resim=$resimler->fetch_assoc()) {
	unlink("../photos/big/".$resim[name]);
	unlink("../photos/crop/".$resim[name]);
	unlink("../photos/thumbnail/".$resim[name]);
}
}
$querys[]="delete from firmalar where Id='".$ilan[Id]."'";
$querys[]="delete from custom_fields where ilanId='".$ilan[Id]."'";
$querys[]="delete from acilacilvitrin where ilanId='".$ilan[Id]."'";
$querys[]="delete from fiyatvitrin where ilanId='".$ilan[Id]."'";
$querys[]="delete from gvitrin where firmaId='".$ilan[Id]."'";
$querys[]="delete from kvitrin where firmaId='".$ilan[Id]."'";
$querys[]="delete from magaza_ilanlari where ilanId='".$ilan[Id]."'";
$querys[]="delete from siparis where firmaId='".$ilan[Id]."'";
$querys[]="delete from favoriler where ilanId='".$ilan[Id]."'";
$querys[]="delete from pictures where ilanId='".$ilan[Id]."'";

}
$querys[]="delete from uyeler where Id='".$Id."'";
$querys[]="delete from aktivasyon where uyeId='".$Id."'";
process_mysql(implode("**",$querys),"uye-yonetimi.html");
}elseif($action=='onayla'){
process_mysql("update uyeler set onay='1' where Id='".$Id."'","uye-yonetimi.html");
}elseif($action=='pasiflestir'){
process_mysql("update uyeler set onay='0' where Id='".$Id."'","uye-yonetimi.html");
}
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Tüm Üyeler</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>

					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Kullanıcı Adı</th>
								  <th>Ad Soyad</th>
								  <th>E-Mail Adresi</th>
								  <th>Kayıt Tarihi</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from uyeler order by onay ASC,Id DESC");
						  while($uye=$SQL->fetch_assoc()){
						  ?>
							<tr class="dataListClass">
								<td><?=$uye[Id];?></td>
								<td class="center"><?=$uye[username];?></td>
								<td class="center"><?=$uye[ad]." ".$uye[soyad];?></td>
								<td class="center"><?=$uye[email];?></td>
								<td class="center"><?=yeni_tarih($uye[kayit_tarihi]);?></td>
								<td class="center">
									<a class="btn btn-primary" href="<?=$site_adresi_ssl;?>/yonetim/uyegir/<?=strtr(base64_encode($uye[Id]), '+/=', '-_S');?>" target="_blank">
										<i class="icon-lock icon-white"></i>
										Giriş Yap
									</a>
									<a class="btn btn-danger" href="../uye/<?=$uye[username];?>-<?=$uye[Id];?>">
										<i class="icon-zoom-in icon-white"></i>
										Görüntüle
									</a>
									<a class="btn btn-success" href="<?=$site_adresi;?>/yonetim/uyeduzenle/<?=base64_encode($uye[Id]);?>" target="_blank">
										<i class="icon-edit icon-white"></i>
										Düzenle
									</a>
									<a class="btn btn-info" href="uye-yonetimi.html?Id=<?=$uye[Id];?>&action=sil" onclick="confirm_delete();">
										<i class="icon-trash icon-white"></i>
										Sil
									</a>
									<?if($uye[onay]==0){?>
									<a class="btn btn-inverse" href="uye-yonetimi.html?Id=<?=$uye[Id];?>&action=onayla">
										<i class="icon-ok icon-white"></i>
										Onayla
									</a>
									<?}else{?>
									<a class="btn btn-inverse" href="uye-yonetimi.html?Id=<?=$uye[Id];?>&action=pasiflestir">
										<i class="icon-remove icon-white"></i>
										Pasifleştir
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
