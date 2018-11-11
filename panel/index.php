<?include('header.php');?>
<?
function onay_kontrol($table,$where)
{
global $mysqli;
return $mysqli->query("select * from ".$table." ".$where)->num_rows;
}
?>
<style>
.indexStats{margin:0;padding:0}
.indexStats li{line-height:35px;list-style-type:none}
</style>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Ana Sayfa
					</li>
				</ul>
			</div>
			<div class="sortable row-fluid">
				<a data-rel="tooltip" title="<?=onay_kontrol("firmalar","where onay='0'");?> Onay Bekleyen İlan." class="well span3 top-block" href="ilan-yonetimi.html">
					<span class="icon32 icon-red icon-tag"></span>
					<div>Toplam İlan</div>
					<div><?=onay_kontrol("firmalar","where onay='1'");?></div>
					<span class="notification"><?=onay_kontrol("firmalar","where onay='0'");?></span>
				</a>

				<a data-rel="tooltip" title="<?=onay_kontrol("uyeler","where onay='0'");?> Onay Bekleyen Üye." class="well span3 top-block" href="uye-yonetimi.html">
					<span class="icon32 icon-color icon-user"></span>
					<div>Toplam Üye</div>
					<div><?=onay_kontrol("uyeler","where onay='1'");?></div>
					<span class="notification green"><?=onay_kontrol("uyeler","where onay='0'");?></span>
				</a>

				<a data-rel="tooltip" title="<?=onay_kontrol("magazalar","where onay='0'");?> Onay Bekleyen Mağaza." class="well span3 top-block" href="magaza-yonetimi.html">
					<span class="icon32 icon-color icon-cart"></span>
					<div>Toplam Mağaza</div>
					<div><?=onay_kontrol("magazalar","where onay='1'");?></div>
					<span class="notification yellow"><?=onay_kontrol("magazalar","where onay='0'");?></span>
				</a>

				<a data-rel="tooltip" title="<?=onay_kontrol("projeler","where durum='0'");?> Onay Bekleyen Proje." class="well span3 top-block" href="proje-yonetimi.html">
					<span class="icon32 icon-color icon-lightbulb"></span>
					<div>Toplam Proje</div>
					<div><?=onay_kontrol("projeler","where durum='1'");?></div>
					<span class="notification red"><?=onay_kontrol("projeler","where durum='0'");?></span>
				</a>
			</div>
			<div class="row-fluid sortable">
				<div class="box span4">
					<div class="box-header well">
						<h2><i class="icon-th"></i> Son 5 İlan</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
			<?if(onay_kontrol("firmalar","where onay='1'")!=0){?>
			<ul class="indexStats">
			<?
			$ilanSQL=$mysqli->query("select Id,uyeId,firma_adi,seo_url from firmalar where onay='1' order by kayit_tarihi DESC limit 5");
			$i=1;
			while($ilan=$ilanSQL->fetch_assoc()){
			$ilan_uye=$mysqli->query("select Id,username from uyeler where Id='".$ilan[uyeId]."'")->fetch_assoc();
			?>
			<li<?if($i!=onay_kontrol("firmalar","where onay='1' limit 5")){?> style="border-bottom:1px solid #CCC"<?}?>><div style="float:left;width:65%"><a href="../ilan/<?=$ilan[seo_url];?>-<?=$ilan[Id];?>" target="_blank"><?=$ilan[firma_adi];?></a></div><div style="float:right;width:35%;text-align:right"><a href="../uye/<?=$ilan_uye[username];?>-<?=$ilan_uye[Id];?>" target="_blank"><?=$ilan_uye[username];?></a></div><div style="clear:both"></div></li>
			<?$i++;}?>
			</ul>
			<?}else{?>
			<strong>İlan Yok.</strong>
			<?}?>
							</div>
						</div>
						<div class="box span4">
					<div class="box-header well">
						<h2><i class="icon-th"></i> Son 5 Üye</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
			<?if(onay_kontrol("uyeler","where onay='1'")!=0){?>
			<ul class="indexStats">
			<?
			$uyeSQL=$mysqli->query("select Id,username,kayit_tarihi from uyeler where onay='1' order by kayit_tarihi DESC limit 5");
			$i=1;
			while($uye=$uyeSQL->fetch_assoc()){
			?>
			<li<?if($i!=onay_kontrol("uyeler","where onay='1' limit 5")){?> style="border-bottom:1px solid #CCC"<?}?>><div style="float:left;width:65%"><a href="../uye/<?=$uye[username];?>-<?=$uye[Id];?>" target="_blank"><?=$uye[username];?></a></div><div style="float:right;width:35%;text-align:right"><?=yeni_tarih($uye[kayit_tarihi]);?></div><div style="clear:both"></div></li>
			<?$i++;}?>
			</ul>
			<?}else{?>
			<strong>İlan Yok.</strong>
			<?}?>
							</div>
						</div>
				<div class="box span4">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list"></i>İstatistikler</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<ul class="dashboard-list">
							<li>
							<a href="ilan-yonetimi.html?type=<?=base64_encode("onay='0'");?>">
							<i class="icon-certificate"></i>
							<span class="green"><?=onay_kontrol("firmalar","where onay='0'");?></span>
							Onay Bekleyen İlan
							</a>
							</li>
						  <li>
							<a href="uye-yonetimi.html">
							  <i class="icon-certificate"></i>
							  <span class="red"><?=onay_kontrol("uyeler","where onay='0'");?></span>
							  Onay Bekleyen Üye
							</a>
						  </li>
						  <li>
							<a href="magaza-yonetimi.html">
							  <i class="icon-certificate"></i>
							  <span class="blue"><?=onay_kontrol("magazalar","where onay='0' or onay='2'");?></span>
							  Onay Bekleyen Mağaza
							</a>
						  </li>
						  <li>
							<a href="siparis-yonetimi.html">
							  <i class="icon-certificate"></i>
							  <span class="yellow"><?=onay_kontrol("siparis","where durum='0'");?></span>
							  Onay Bekleyen Sipariş
							</a>
						  </li>
						  <li>
							<a href="proje-yonetimi.html">
							  <i class="icon-certificate"></i>
							  <span class="green"><?=onay_kontrol("projeler","where durum='0'");?></span>
							  Onay Bekleyen Proje
							</a>
						  </li>
						  <li>
							<a href="hikaye-yonetimi.html">
							  <i class="icon-certificate"></i>
							  <span class="red"><?=onay_kontrol("hikayeler","where onay='0'");?></span>
							  Onay Bekleyen Hikaye
							</a>
						  </li>
						</ul>
					</div>
				</div>
			</div>
						</div>
<?php include('footer.php'); ?>
