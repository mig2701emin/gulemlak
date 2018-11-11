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
						Destek Bildirimi Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
$querys[]="delete from tickets where Id='".$Id."'";
$querys[]="delete from ticket_reply where ticketId='".$Id."'";
process_mysql(implode("**",$querys),"destek-bildirimi-yonetimi.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Destek Bildirimi Yönetimi</h2>
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
								  <th>Konu</th>
								  <th>Departman</th>
								  <th>Durum</th>
								  <th>Gönderilme Tarihi</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from tickets order by eklenme_tarihi desc");
						  while($destek=$SQL->fetch_assoc()){
						  $uye_ekleyen=$mysqli->query("select * from uyeler where Id='".$destek[uyeId]."'")->fetch_assoc();
						  if($destek[departman]=='1'){
							$departman="Teknik Destek";
							}else{
							$departman="Muhasebe";
							}
							if($destek[durum]=='1'){
							$durum="Aktif";
							}else{
							$durum="Pasif";
							}
						  ?>
							<tr class="dataListClass">
								<td><?=$destek[Id];?></td>
								<td class="center"><a href="../uye/<?=$uye_ekleyen[username];?>-<?=$uye_ekleyen[Id];?>"><?=$uye_ekleyen[username];?></a></td>
								<td class="center"><?=$destek[konu2];?></td>
								<td class="center"><?=$departman;?></td>
								<td class="center"><?=$durum;?></td>
								<td class="center"><?=yeni_tarih($destek[eklenme_tarihi]);?></td>
								<td class="center">
									<a class="btn btn-primary" href="destek-goruntule.html?Id=<?=$destek[Id];?>">
										<i class="icon-zoom-in icon-white"></i>  
										Görüntüle                                            
									</a>
									<a class="btn btn-warning" href="destek-bildirimi-yonetimi.html?Id=<?=$destek[Id];?>&action=sil" onclick="confirm_delete();">
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