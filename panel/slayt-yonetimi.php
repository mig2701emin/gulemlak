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
						Slayt Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
if($admin_kilit==0){
$slayt_detay=$mysqli->query("select * from slayt where Id='".$Id."'")->fetch_assoc();
unlink("../images/home_slider/".$slayt_detay[slayt]);
}
process_mysql("delete from slayt where Id='".$Id."'","slayt-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Slayt Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>Slayt</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from slayt");
						  while($slayt=$SQL->fetch_assoc()){
						  ?>
							<tr class="dataListClass">
								<td><img src="../images/home_slider/<?=$slayt[slayt];?>" width="510" height="242"></td>
								<td class="center">
									<a class="btn btn-warning" href="slayt-duzenle.html?Id=<?=$slayt[Id];?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<a class="btn btn-success" href="slayt-yonetimi.html?Id=<?=$slayt[Id];?>&action=sil" onclick="confirm_delete();">
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