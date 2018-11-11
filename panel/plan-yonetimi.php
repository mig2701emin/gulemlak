<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$projeId=guvenlik($_GET['projeId']);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Plan Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
$plan=$mysqli->query("select * from proje_planlari where Id='".$Id."'")->fetch_assoc();
if($admin_kilit==0){
unlink("../projeler/planlar/".$plan[resim]);
}
process_mysql("delete from proje_planlari where Id='".$Id."'","plan-yonetimi.html?projeId=".$projeId);
}
?>
<a class="btn btn-large btn-danger" href="plan-ekle.html?projeId=<?=$projeId;?>" style="float:right">
										<i class="icon-plus-sign icon-white"></i>  
										Yeni Plan Ekle                                        
									</a>
<div style="clear:both"></div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Plan Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Plan</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from proje_planlari where projeId='".$projeId."'");
						  while($plan=$SQL->fetch_assoc()){
						  ?>
							<tr class="dataListClass">
								<td><?=$plan[Id];?></td>
								<td class="center"><?=$plan[baslik];?></td>
								<td class="center">
								<a class="btn btn-primary" href="../plan/<?=$plan[seo_url];?>-<?=$plan[Id];?>">
								<i class="icon-zoom-in icon-white"></i>  
								Görüntüle                                            
								</a>
									<a class="btn btn-warning" href="plan-duzenle.html?Id=<?=$plan[Id];?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<a class="btn btn-success" href="plan-yonetimi.html?Id=<?=$plan[Id];?>&projeId=<?=$projeId;?>&action=sil" onclick="confirm_delete();">
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