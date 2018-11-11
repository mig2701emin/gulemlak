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
						Şikayet Edilen İlanlar 
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
process_mysql("delete from ilan_sikayet where Id='".$Id."'","sikayet-edilen-ilanlar.html");
}
?>
<div style="clear:both"></div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Şikayet Edilen İlanlar</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Ad Soyad</th>
                                  <th>E-Posta</th>
								  <th>Şikayet Türü</th>
                                  <th>Yorum</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from ilan_sikayet");
						  while($sikayet=$SQL->fetch_assoc()){
						  $ilan=$mysqli->query("select seo_url from firmalar where Id='".$sikayet[ilanId]."'")->fetch_assoc();
						  ?>
							<tr class="dataListClass">
								<td><?=$sikayet[Id];?></td>
								<td class="center"><?=$sikayet[ad]." ".$sikayet[soyad];?><?if($sikayet[uyeId]!=''){$uye_detay=$mysqli->query("select username from uyeler where Id='".$sikayet[uyeId]."'")->fetch_assoc();?> <span style="color:#999">(<?=$uye_detay[username];?>)</span><?}?></td>
								<td class="center"><?=$sikayet[eposta];?></td>
								<td class="center"><?=$sikayet[sikayetturu];?></td>
								<td class="center"><?=$sikayet[yorum];?></td>
								<td class="center">
									<a class="btn btn-primary" href="../ilan/<?=$ilan[seo_url];?>-<?=$sikayet[ilanId];?>">
										<i class="icon-trash icon-white"></i> 
										İlanı Görüntüle
									</a>
									<a class="btn btn-warning" href="sikayet-edilen-ilanlar.html?Id=<?=$sikayet[Id];?>&action=sil" onclick="confirm_delete();">
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