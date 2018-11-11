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
						Tüm Yardım Sayfaları
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
process_mysql("delete from yardim_icerik where id='".$Id."'","yardim-icerik-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Tüm Yardım Sayfaları</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>İçerik Adı</th>
								  <th>İçerik Kategorisi</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from yardim_icerik");
						  while($icerik=$SQL->fetch_assoc()){
						  $kategori=$mysqli->query("select kategori from yardim_kategori where id='".$icerik[kategoriId]."'")->fetch_assoc();
						  ?>
							<tr class="dataListClass">
								<td><?=$icerik[id];?></td>
								<td class="center"><?=$icerik[baslik];?></td>
								<td class="center"><?=($kategori[kategori]!=''?$kategori[kategori]:'Yok');?></td>
								<td class="center">
									<a class="btn btn-danger" href="yardim-icerik-duzenle.html?Id=<?=$icerik[id];?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<a class="btn btn-warning" href="yardim-icerik-yonetimi.html?Id=<?=$icerik[id];?>&action=sil" onclick="confirm_delete();">
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