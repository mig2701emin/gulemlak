<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$order_Get=guvenlik(base64_decode($_GET['order']));
$type_Get=guvenlik(base64_decode($_GET['type']));
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Fiyatı Düşenler İlanlar
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
process_mysql("delete from fiyatvitrin where ilanId='".$Id."'","fiyati-dusen-yonetimi.html");
}
?>
<form action="fiyati-dusen-yonetimi.html" method="get" style="float:left">
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
<form action="fiyati-dusen-yonetimi.html" method="get" style="float:right">
<div class="controls"><strong>Filtrele : </strong>
<?if(!empty($order_Get)){?><input type="hidden" name="order" value="<?=base64_encode($order_Get);?>"><?}?>
<select name="type" onchange="this.form.submit();" data-rel="chosen">
<option value=""<?if($type_Get==""){?> selected<?}?>>Hepsi</option>
<option value="<?=base64_encode("onay='1'");?>"<?if($type_Get=="onay='1'"){?> selected<?}?>>Aktif İlanlar</option>
<option value="<?=base64_encode("onay='0'");?>"<?if($type_Get=="onay='0'"){?> selected<?}?>>Pasif İlanlar</option>
<option value="<?=base64_encode("ilan_turu='1'");?>"<?if($type_Get=="ilan_turu='1'"){?> selected<?}?>>Ücretli İlanlar</option>
<option value="<?=base64_encode("ilan_turu='0'");?>"<?if($type_Get=="ilan_turu='0'"){?> selected<?}?>>Ücretsiz İlanlar</option>
</select></div>
</form>
<div style="clear:both"></div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Fiyatı Düşen İlanlar</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>İlan Adı</th>
								  <th>Durum</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  if(!empty($type_Get)){
						  $where=" where firmalar.".$type_Get;
						  }else{
						  $where="";
						  }
						  if(!empty($order_Get)){
						  $order=" order by firmalar.".$order_Get;
						  }else{
						  $order=" order by firmalar.onay ASC";
						  }
						  $tarih=date("Y-m-d");
						  $SQL=$mysqli->query("select *,fiyatvitrin.bitis_tarihi as yeni_bitis from fiyatvitrin join firmalar on firmalar.Id=fiyatvitrin.ilanId ".$where.$order);
						  while($ilan=$SQL->fetch_assoc()){
		if(strtotime($ilan[yeni_bitis]) <= time()){
		$durum="Süresi Doldu";
		}else{
		$durum="Aktif";
		}
						  ?>
							<tr class="dataListClass">
								<td><?=$ilan[Id];?></td>
								<td class="center"><?=$ilan[firma_adi];?></td>
								<td class="center"><?=$durum;?></td>
								<td class="center">
									<a class="btn btn-danger" href="ilan-doping-duzenle.html?Id=<?=$ilan[ilanId];?>&type=fiyatvitrin">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<a class="btn btn-warning" href="fiyati-dusen-yonetimi.html?Id=<?=$ilan[Id];?>&action=sil" onclick="confirm_delete();">
										<i class="icon-trash icon-white"></i> 
										Sil
									</a>
								</td>
							</tr>
							<?}?>
						  </tbody>
					  </table>            
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>