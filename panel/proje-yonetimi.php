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
						Proje Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
$proje_detay=$mysqli->query("select logo,resimler from projeler where Id='".$Id."'")->fetch_assoc();
$planSQL=$mysqli->query("select * from proje_planlari where ProjeId='".$Id."'");
if($admin_kilit==0){
while($plan=$planSQL->fetch_assoc()){
unlink("../projeler/planlar/".$plan[resim]);
}
unlink("../projeler/logolar/".$proje_detay[logo]);
$explode=explode(",",$proje_detay[resimler]);
for ($count = 1; $i <= count($explode); $i++) {
if($explode[$i]!=''){
unlink("../projeler".$explode[$i]);
}
}
}
$querys[]="delete from projeler where Id='".$Id."'";
$querys[]="delete from proje_planlari where projeId='".$Id."'";
$querys[]="delete from proje_vitrin where ProjeId='".$Id."'";
process_mysql(implode("**",$querys),"proje-yonetimi.html");
}elseif($action=='onayla'){
process_mysql("update projeler set durum='1' where Id='".$Id."'","proje-yonetimi.html");
}elseif($action=='pasiflestir'){
process_mysql("update projeler set durum='0' where Id='".$Id."'","proje-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Proje Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Proje</th>
								  <th>Kategori</th>
								  <th>Bölge</th>
								  <th>Durum</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from projeler");
						  while($proje=$SQL->fetch_assoc()){
						  $il=$mysqli->query("select * from tbl_il where il_id='".$proje[sehir]."'")->fetch_assoc();
						  $ilce=$mysqli->query("select * from tbl_ilce where ilce_id='".$proje[ilce]."'")->fetch_assoc();
						  $kategori=$mysqli->query("select * from proje_kategoriler where Id='".$proje[kategori]."'")->fetch_assoc();
						  ?>
							<tr class="dataListClass">
								<td><?=$proje[Id];?></td>
								<td class="center"><?=$proje[baslik];?></td>
								<td class="center"><?=$kategori[kategori_adi];?></td>
								<td class="center"><?=$il[il_ad];?> /<?=$ilce[ilce_ad];?></td>
								<td class="center"><?if($proje[durum]==1){?>Aktif<?}else{?>Pasif<?}?></td>
								<td class="center">
								<a class="btn btn-primary" href="../proje/<?=$proje[seo_url];?>-<?=$proje[Id];?>">
								<i class="icon-zoom-in icon-white"></i>  
								Görüntüle                                            
								</a>
								<a class="btn btn-danger" href="plan-yonetimi.html?projeId=<?=$proje[Id];?>">
										<i class="icon-asterisk icon-white"></i>  
										Planları Görüntüle                                            
									</a>
									<a class="btn btn-warning" href="proje-duzenle.html?Id=<?=$proje[Id];?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<a class="btn btn-success" href="proje-yonetimi.html?Id=<?=$proje[Id];?>&action=sil" onclick="confirm_delete();">
										<i class="icon-trash icon-white"></i> 
										Sil
									</a>
									<?if($proje[durum]==0){?>
									<a class="btn btn-success" href="proje-yonetimi.html?Id=<?=$proje[Id];?>&action=onayla">
										<i class="icon-ok icon-white"></i> 
										Onayla
									</a>
									<?}else{?>
									<a class="btn btn-info" href="proje-yonetimi.html?Id=<?=$proje[Id];?>&action=pasiflestir">
										<i class="icon-remove icon-white"></i> 
										Pasifleştir
									</a>
									<?}?>
									<a class="btn btn-inverse" href="proje-vitrin.html?Id=<?=$proje[Id];?>">
										<i class="icon-star icon-white"></i> 
										Vitrin
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