<?
include('header.php');
$action=guvenlik($_GET['action']);
$order_Get=base64_decode($_GET['order']);
$type_Get=base64_decode($_GET['type']);
$ara_Get=$_GET['ara'];
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						İlan Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
$sql2 = $mysqli->query("select * from firmalar WHERE Id = '".$Id."'")->fetch_assoc();
$resimler=$mysqli->query("select * from pictures WHERE ilanId ='".$Id."'");
global $admin_kilit;
if($admin_kilit==0){
	while ($resim=$resimler->fetch_assoc()) {
		unlink("../photos/big/".$resim[name]);
		unlink("../photos/crop/".$resim[name]);
		unlink("../photos/thumbnail/".$resim[name]);
	}
}
$querys[]="delete from firmalar where Id='".$Id."'";
$querys[]="delete from custom_fields where ilanId='".$Id."'";
$querys[]="delete from acilacilvitrin where ilanId='".$Id."'";
$querys[]="delete from fiyatvitrin where ilanId='".$Id."'";
$querys[]="delete from gvitrin where firmaId='".$Id."'";
$querys[]="delete from kvitrin where firmaId='".$Id."'";
$querys[]="delete from magaza_ilanlari where ilanId='".$Id."'";
$querys[]="delete from siparis where firmaId='".$Id."'";
$querys[]="delete from favoriler where ilanId='".$Id."'";
$querys[]="delete from pictures where ilanId='".$Id."'";
if (!empty($type_Get) && $type_Get!="") {
	process_mysql(implode("**",$querys),"ilan-yonetimi.html?type=".$_GET['type']);
} else {
	process_mysql(implode("**",$querys),"ilan-yonetimi.html");
}

}elseif($action=='onayla'){
$sql2 = $mysqli->query("select * from firmalar WHERE Id = '".$Id."'")->fetch_assoc();
$detaylar=$mysqli->query("select * from uyeler where Id='".$sql2[uyeId]."'")->fetch_assoc();
$bitistarihi= date("Y-m-d H:i:s");
$yenitarih = strtotime('60 day',strtotime($bitistarihi));
$yenitarih = date('Y-m-d' ,$yenitarih );
if (!empty($type_Get) && $type_Get!="") {
	process_mysql("update firmalar set onay='1',kayit_tarihi='".$bitistarihi."', bitis_tarihi='".$yenitarih."' where Id='".$Id."'","ilan-yonetimi.html?type=".$_GET['type']);
} else {
	process_mysql("update firmalar set onay='1',kayit_tarihi='".$bitistarihi."', bitis_tarihi='".$yenitarih."' where Id='".$Id."'","ilan-yonetimi.html");
}
}elseif($action=='pasiflestir'){
	if (!empty($type_Get) && $type_Get!="") {
		process_mysql("update firmalar set onay='0' where Id='".$Id."'","ilan-yonetimi.html?type=".$_GET['type']);
	} else {
		process_mysql("update firmalar set onay='0' where Id='".$Id."'","ilan-yonetimi.html");
	}
$sql2 = $mysqli->query("select * from firmalar WHERE Id = '".$Id."'")->fetch_assoc();
$detaylar=$mysqli->query("select * from uyeler where Id='".$sql2[uyeId]."'")->fetch_assoc();
}elseif($action=='sureuzat'){
$sql2 = $mysqli->query("select * from firmalar WHERE Id = '".$Id."'")->fetch_assoc();
$detaylar=$mysqli->query("select * from uyeler where Id='".$sql2[uyeId]."'")->fetch_assoc();
$bitistarihi= date("Y-m-d H:i:s");
$yenitarih = strtotime('60 day',strtotime($bitistarihi));
$yenitarih = date('Y-m-d' ,$yenitarih );
if (!empty($type_Get) && $type_Get!="") {
	process_mysql("update firmalar set onay='1',kayit_tarihi='".$bitistarihi."', bitis_tarihi='".$yenitarih."', suresi_doldu='0'  where Id='".$Id."'","ilan-yonetimi.html?type=".$_GET['type']);
} else {
	process_mysql("update firmalar set onay='1',kayit_tarihi='".$bitistarihi."', bitis_tarihi='".$yenitarih."', suresi_doldu='0'  where Id='".$Id."'","ilan-yonetimi.html");
}
}elseif($action=='tsureuzat'){
$toptan = $_POST['idler'];
$bitistarihi= date("Y-m-d H:i:s");
$yenitarih = strtotime('60 day',strtotime($bitistarihi));
$yenitarih = date('Y-m-d' ,$yenitarih );
foreach ($toptan as $id) {
	$querys[]="update firmalar set onay='1', kayit_tarihi='".$bitistarihi."', bitis_tarihi='".$yenitarih."', suresi_doldu='0'  where Id='".$id."'";
}
if (!empty($type_Get) && $type_Get!="") {
	process_mysql(implode("**",$querys),"ilan-yonetimi.html?type=".$_GET['type']);
} else {
	process_mysql(implode("**",$querys),"ilan-yonetimi.html");
}
}elseif($action=='tonayla'){
$toptan= $_POST['idler'];
$bitistarihi= date("Y-m-d H:i:s");
$yenitarih = strtotime('60 day',strtotime($bitistarihi));
$yenitarih = date('Y-m-d' ,$yenitarih );
foreach ($toptan as $id) {
	$querys[]="update firmalar set onay='1', kayit_tarihi='".$bitistarihi."', bitis_tarihi='".$yenitarih."', suresi_doldu='0'  where Id='".$id."'";
}
if (!empty($type_Get) && $type_Get!="") {
	process_mysql(implode("**",$querys),"ilan-yonetimi.html?type=".$_GET['type']);
} else {
	process_mysql(implode("**",$querys),"ilan-yonetimi.html");
}
}elseif($action=='tpasiflestir'){
	$toptan= $_POST['idler'];
	foreach ($toptan as $id) {
		$querys[]="update firmalar set onay='0', suresi_doldu='0'  where Id='".$id."'";
	}
	if (!empty($type_Get) && $type_Get!="") {
		process_mysql(implode("**",$querys),"ilan-yonetimi.html?type=".$_GET['type']);
	} else {
		process_mysql(implode("**",$querys),"ilan-yonetimi.html");
	}
}elseif($action=='tsil'){
	$toptan= $_POST['idler'];
	foreach ($toptan as $Id) {
		$resimler=$mysqli->query("select * from pictures WHERE ilanId ='".$Id."'");
		while ($resim=$resimler->fetch_assoc()) {
			unlink("../photos/big/".$resim[name]);
			unlink("../photos/crop/".$resim[name]);
			unlink("../photos/thumbnail/".$resim[name]);
		}
		$querys[]="delete from firmalar where Id='".$Id."'";
		$querys[]="delete from custom_fields where ilanId='".$Id."'";
		$querys[]="delete from acilacilvitrin where ilanId='".$Id."'";
		$querys[]="delete from fiyatvitrin where ilanId='".$Id."'";
		$querys[]="delete from gvitrin where firmaId='".$Id."'";
		$querys[]="delete from kvitrin where firmaId='".$Id."'";
		$querys[]="delete from magaza_ilanlari where ilanId='".$Id."'";
		$querys[]="delete from siparis where firmaId='".$Id."'";
		$querys[]="delete from favoriler where ilanId='".$Id."'";
		$querys[]="delete from pictures where ilanId='".$Id."'";
	}
	if (!empty($type_Get) && $type_Get!="") {
		process_mysql(implode("**",$querys),"ilan-yonetimi.html?type=".$_GET['type']);
	} else {
		process_mysql(implode("**",$querys),"ilan-yonetimi.html");
	}
}
?>
<form action="ilan-yonetimi.html" method="get" style="float:left">
<?if(!empty($type_Get)){?><input type="hidden" name="type" value="<?=base64_encode($type_Get);?>"><?}?>
<div class="controls"><strong>Sıralama : </strong>
<select name="order" onchange="this.form.submit();" data-rel="chosen">
<option value=""<?if($order_Get==""){?> selected<?}?>>Normal</option>
<option value="<?=base64_encode("onay ASC");?>"<?if($order_Get=="onay ASC"){?> selected<?}?>>Onay - Önce Onaysız</option>
<option value="<?=base64_encode("onay DESC");?>"<?if($order_Get=="onay DESC"){?> selected<?}?>>Onay - Önce Onaylı</option>
<option value="<?=base64_encode("kayit_tarihi ASC");?>"<?if($order_Get=="kayit_tarihi ASC"){?> selected<?}?>>Kayıt Tarihi - Eskiden Yeniye</option>
<option value="<?=base64_encode("kayit_tarihi DESC");?>"<?if($order_Get=="kayit_tarihi DESC"){?> selected<?}?>>Kayıt Tarihi - Yeniden Eskiye</option>
<option value="<?=base64_encode("firma_adi ASC");?>"<?if($order_Get=="firma_adi ASC"){?> selected<?}?>>İlan Adı - A-Z</option>
<option value="<?=base64_encode("firma_adi DESC");?>"<?if($order_Get=="firma_adi DESC"){?> selected<?}?>>İlan Adı - Z-A</option>
<option value="<?=base64_encode("toplam_ziyaretci ASC");?>"<?if($order_Get=="toplam_ziyaretci ASC"){?> selected<?}?>>Toplam Ziyaretçi - Artan</option>
<option value="<?=base64_encode("toplam_ziyaretci DESC");?>"<?if($order_Get=="toplam_ziyaretci DESC"){?> selected<?}?>>Toplam Ziyaretçi - Azalan</option>
</select></div>
</form>
<form action="ilan-yonetimi.html" method="get" style="float:right">
<div class="controls"><strong>Filtrele : </strong>
<?if(!empty($order_Get)){?><input type="hidden" name="order" value="<?=base64_encode($order_Get);?>"><?}?>
<select name="type" onchange="this.form.submit();" data-rel="chosen">
<option value=""<?if($type_Get==""){?> selected<?}?>>Hepsi</option>
<option value="<?=base64_encode("onay='1'");?>"<?if($type_Get=="onay='1'"){?> selected<?}?>>Aktif İlanlar</option>
<option value="<?=base64_encode("onay='0'");?>"<?if($type_Get=="onay='0'"){?> selected<?}?>>Pasif İlanlar</option>
<option value="<?=base64_encode("onay='2'");?>"<?if($type_Get=="onay='2'"){?> selected<?}?>>Duran İlanlar</option>
<option value="<?=base64_encode("suresi_biten='1'");?>"<?if($type_Get=="suresi_biten='1'"){?> selected<?}?>>Süresi Biten İlanlar</option>
<option value="<?=base64_encode("ilan_turu='1'");?>"<?if($type_Get=="ilan_turu='1'"){?> selected<?}?>>Ücretli İlanlar</option>
<option value="<?=base64_encode("ilan_turu='0'");?>"<?if($type_Get=="ilan_turu='0'"){?> selected<?}?>>Ücretsiz İlanlar</option>
</select></div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
    $(".tumunu-sec").click(function(){
         $(this).closest('table')
                .find(':checkbox').attr('checked', this.checked);
    });
});
function topluislem(action) {
	if (action=="tsil") {
		if (confirm("Bu ilanları silmek istediğinize emin misiniz?")) {
			$("#"+action).click();
		} else {
			return false;
		}
	} else {
		$("#"+action).click();
	}

}
</script>
<div style="clear:both"></div>
			<div class="row-fluid sortable">

									<div style="float:left;"><h3> Toplu İşlemler </h3>
									<a class="btn btn-warning" href="javascript:topluislem('tsil')">
										<i class="icon-trash icon-white"></i>
										Sil
									</a>
									<a class="btn btn-success" href="javascript:topluislem('tsureuzat')">
										<i class="icon-ok icon-white"></i>
										Süre Uzat
									</a>

									<a class="btn btn-success" href="javascript:topluislem('tonayla')">
										<i class="icon-ok icon-white"></i>
										Onayla
									</a>
									<a class="btn btn-info" href="javascript:topluislem('tpasiflestir')">
										<i class="icon-remove icon-white"></i>
										Pasifleştir
									</a>
								</div>

						<div style="float:right;"><h3>Arama </h3>
							<div class="controls">
  							<form id="searchform" method="get" action="ilan-yonetimi.html">

								<input type="text" name="ara" value="<?=$ara_Get;?>">
								<input type="submit" class="btn btn-success" value="Ara"><i class="icon-search icon-white"></i>
								</form>
							</div>
						</div>
			</div>

				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> İlan Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>

					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th><input type="checkbox" class="tumunu-sec" title="Hepsini Seç"></th>
								  <th>No</th>
								  <th>İlan Adı</th>
								  <th>Üye</th>
								  <th>Kategori</th>
								  <th>Bitiş Tarihi</th>
								  <th>Durum</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>
						  <tbody>
								<form class="" action="" method="post">
						  <?
						  if(!empty($ara_Get)){
						  $ara=" where firma_adi LIKE '%$ara_Get%'";
						  }else{
						  $ara="";
						  }
						  if(!empty($type_Get)){
						  $where=" where ".$type_Get;
						  }else{
						  $where="";
						  }
						  if(!empty($order_Get)){
						  $order=" order by ".$order_Get;
						  }else{
						  $order=" order by kayit_tarihi DESC";
						  }
						  $SQLquery="select * from firmalar".$ara.$where.$order;
						  $SQL=$mysqli->query($SQLquery);
						  while($ilan=$SQL->fetch_assoc()){
								if($ilan[suresi_doldu]==1){
								$durum="Süresi Doldu";
								}elseif($ilan[onay]==0){
								$durum="Onay Bekliyor";
								}elseif($ilan[onay]==2){
								$durum="Kullanıcı İlanı Durdurdu";
								}else{
								$durum="Aktif";
								}
								$kategori_detay=$mysqli->query("select kategori_adi from kategoriler where Id='".$ilan[kategoriId]."'")->fetch_assoc();
								$kullanici_detay=$mysqli->query("select ad, soyad from uyeler where Id='".$ilan[uyeId]."'")->fetch_assoc();

						  ?>
								<tr class="dataListClass">
									<td><input type="checkbox" class="deneme" name="idler[]" value="<?=$ilan[Id];?>" /></td>
									<td><?=$ilan[Id];?></td>
									<td class="center"><?=$ilan[firma_adi];?></td>
									<td class="center"><?=$kullanici_detay[ad];?> <?=$kullanici_detay[soyad];?></td>
									<td class="center"><?=$kategori_detay[kategori_adi];?></td>
									<td class="center"><?=$ilan[bitis_tarihi];?></td>
									<td class="center"><?=$durum;?></td>
									<td class="center">
										<a class="btn btn-primary" href="../<?=$ilan[seo_url];?>/<?=strtr(base64_encode($ilan[Id]), '+/=', '-_S');?>" target="_blank">
											<i class="icon-zoom-in icon-white"></i>
											Görüntüle
										</a>
										<!-- <a class="btn btn-danger" href="ilan-yonetimi.html?loginUser=login&redirect=<?//=base64_encode('../'.$ilan[Id].'-duzenle.html');?>&Id=<?//=$ilan[uyeId];?>"> -->
										<a class="btn btn-danger" href="ilan-yonetimi.html?loginUser=login&redirect=<?=base64_encode('../yonetim/ilanduzenle/'.$ilan[Id].'/'.$ilan[uyeId]);?>&Id=<?=$ilan[uyeId];?>" target="_blank">
											<i class="icon-edit icon-white"></i>
											Düzenle
										</a>
										<a class="btn btn-warning" href="ilan-yonetimi.html?Id=<?=$ilan[Id];?>&action=sil<?if(!empty($type_Get)){?>&type=<?=$_GET['type']?><?}?>" onclick="confirm_delete();">
											<i class="icon-trash icon-white"></i>
											Sil
										</a>
										<?if($ilan[onay]==0 and $ilan[suresi_doldu]==1){?>
										<a class="btn btn-success" href="ilan-yonetimi.html?Id=<?=$ilan[Id];?>&action=sureuzat<?if(!empty($type_Get)){?>&type=<?=$_GET['type']?><?}?>">
											<i class="icon-ok icon-white"></i>
											Süre Uzat
										</a>

										<?}elseif($ilan[onay]==0 or $ilan[onay]==2){?>
										<a class="btn btn-success" href="ilan-yonetimi.html?Id=<?=$ilan[Id];?>&action=onayla<?if(!empty($type_Get)){?>&type=<?=$_GET['type']?><?}?>">
											<i class="icon-ok icon-white"></i>
											Onayla
										</a>
										<?}else{?>
										<a class="btn btn-info" href="ilan-yonetimi.html?Id=<?=$ilan[Id];?>&action=pasiflestir<?if(!empty($type_Get)){?>&type=<?=$_GET['type']?><?}?>">
											<i class="icon-remove icon-white"></i>
											Pasifleştir
										</a>
										<?}?>
										<a class="btn btn-inverse" href="ilan-vitrin.html?Id=<?=$ilan[Id];?>">
											<i class="icon-star icon-white"></i>
											Vitrin
										</a>
										<a class="btn btn-info" href="ilan-doping.html?Id=<?=$ilan[Id];?>">
											<i class="icon-star-empty icon-white"></i>
											Doping
										</a>
									</td>
								</tr>
							<?}?>
									<button type="submit" name="tsil" id="tsil" formaction="?action=tsil<?if(!empty($type_Get)){?>&type=<?=$_GET[type]?><?}?>" hidden="hidden"></button>
									<button type="submit" name="tsureuzat" id="tsureuzat" formaction="?action=tsureuzat<?if(!empty($type_Get)){?>&type=<?=$_GET[type]?><?}?>" hidden="hidden"></button>
									<button type="submit" name="tonayla" id="tonayla" formaction="?action=tonayla<?if(!empty($type_Get)){?>&type=<?=$_GET[type]?><?}?>" hidden="hidden"></button>
									<button type="submit" name="tpasiflestir" id="tpasiflestir" formaction="?action=tpasiflestir<?if(!empty($type_Get)){?>&type=<?=$_GET[type]?><?}?>" hidden="hidden"></button>
								</form>
						  </tbody>
					  </table>
					</div>
				</div>
			</div>
<?include('footer.php'); ?>
