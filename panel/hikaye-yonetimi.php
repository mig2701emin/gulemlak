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
						Hikaye Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
process_mysql("delete from hikayeler where id='".$Id."'","hikaye-yonetimi.html");
}elseif($action=='onayla'){
process_mysql("update hikayeler set onay='1' where id='".$Id."'","hikaye-yonetimi.html");
}elseif($action=='pasiflestir'){
process_mysql("update hikayeler set onay='0' where Id='".$Id."'","hikaye-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Hikaye Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Gönderen</th>
								  <th>E-Mail Adresi</th>
								  <th>Eklenme Tarihi</th>
								  <th>Mesaj</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from hikayeler");
						  while($hikaye=$SQL->fetch_assoc()){
						  ?>
							<tr class="dataListClass">
								<td><?=$hikaye[id];?></td>
								<td class="center"><?=$hikaye[ekleyen];?></td>
								<td class="center"><?=$hikaye[eposta];?></td>
								<td class="center"><?=yeni_tarih($hikaye[eklenme_tarihi]);?></td>
								<td class="center"><?=$hikaye[mesaj];?></td>
								<td class="center">
									<?if($hikaye[onay]==0){?>
									<a class="btn btn-success" href="hikaye-yonetimi.html?Id=<?=$hikaye[id];?>&action=onayla">
										<i class="icon-ok icon-white"></i> 
										Onayla
									</a>
									<?}else{?>
									<a class="btn btn-info" href="hikaye-yonetimi.html?Id=<?=$hikaye[id];?>&action=pasiflestir">
										<i class="icon-remove icon-white"></i> 
										Pasifleştir
									</a>
									<?}?>
									<a class="btn btn-warning" href="hikaye-yonetimi.html?Id=<?=$hikaye[id];?>&action=sil" onclick="confirm_delete();">
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