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
						Tüm Yardım Kategorileri
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
process_mysql("delete from yardim_kategori where id='".$Id."'","yardim-kategori-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Tüm Yardım Kategorileri</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Kategori Adı</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from yardim_kategori");
						  while($kategori=$SQL->fetch_assoc()){
						  ?>
							<tr class="dataListClass">
								<td><?=$kategori[id];?></td>
								<td class="center"><?=$kategori[kategori];?></td>
								<td class="center">
									<a class="btn btn-danger" href="yardim-kategori-duzenle.html?Id=<?=$kategori[id];?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<a class="btn btn-warning" href="yardim-kategori-yonetimi.html?Id=<?=$kategori[id];?>&action=sil" onclick="confirm_delete();">
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