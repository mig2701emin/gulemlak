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
						Haber Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
process_mysql("delete from haberler where Id='".$Id."'","haber-yonetimi.html");
}elseif($action=='onayla'){
process_mysql("update haberler set durum='1' where Id='".$Id."'","haber-yonetimi.html");
}elseif($action=='pasiflestir'){
process_mysql("update haberler set durum='0' where Id='".$Id."'","haber-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Haber Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Haber Adı</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from haberler");
						  while($haber=$SQL->fetch_assoc()){
						  ?>
							<tr class="dataListClass">
								<td><?=$haber[Id];?></td>
								<td class="center"><?=$haber[baslik];?></td>
								<td class="center">
									<a class="btn btn-primary" href="../haber/<?=$haber[seo_url];?>-<?=$haber[Id];?>">
										<i class="icon-zoom-in icon-white"></i>  
										Görüntüle                                            
									</a>
									<a class="btn btn-danger" href="haber-duzenle.html?Id=<?=$haber[Id];?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<a class="btn btn-warning" href="haber-yonetimi.html?Id=<?=$haber[Id];?>&action=sil" onclick="confirm_delete();">
										<i class="icon-trash icon-white"></i> 
										Sil
									</a>
									<?if($haber[durum]==0){?>
									<a class="btn btn-success" href="haber-yonetimi.html?Id=<?=$haber[Id];?>&action=onayla">
										<i class="icon-ok icon-white"></i> 
										Onayla
									</a>
									<?}else{?>
									<a class="btn btn-info" href="haber-yonetimi.html?Id=<?=$haber[Id];?>&action=pasiflestir">
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