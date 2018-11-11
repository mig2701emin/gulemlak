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
						Tüm Sayfalar
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
process_mysql("delete from sayfalar where Id='".$Id."'","sayfa-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Tüm Sayfalar</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Sayfa Adı</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from sayfalar");
						  while($sayfa=$SQL->fetch_assoc()){
						  ?>
							<tr class="dataListClass">
								<td><?=$sayfa[Id];?></td>
								<td class="center"><?=$sayfa[baslik];?></td>
								<td class="center">
									<a class="btn btn-primary" href="../index.php?page=sayfa&sayfa=<?=$sayfa[url];?>">
										<i class="icon-zoom-in icon-white"></i>  
										Görüntüle                                            
									</a>
									<a class="btn btn-danger" href="sayfa-duzenle.html?Id=<?=$sayfa[Id];?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<a class="btn btn-warning" href="sayfa-yonetimi.html?Id=<?=$sayfa[Id];?>&action=sil" onclick="confirm_delete();">
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