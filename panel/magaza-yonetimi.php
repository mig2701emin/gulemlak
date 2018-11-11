<?php include('header.php'); 
$action=guvenlik($_GET['action']);
$magazaId=guvenlik($_GET['magazaId']);

?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Mağaza Yönetimi
					</li>
				</ul>
			</div>
<?php if($action=='sil'){
			$magaza_detay=$mysqli->query("select logo from magazalar where Id='".$magazaId."'")->fetch_assoc();
			if($admin_kilit==0){
				unlink("../".$magaza_detay[logo]);
			}
			$querys[]="delete from magazalar where Id='".$magazaId."'";
			$querys[]="delete from magaza_kullanicilari where magazaId='".$magazaId."'";
			$querys[]="delete from magaza_ilanlari where magazaId='".$magazaId."'";
			process_mysql(implode("**",$querys),"magaza-yonetimi.html");
	}elseif($action=='onayla'){
			$siparis_detay=$mysqli->query("select Id,doping,sure from siparis where magaza='".$magazaId."'")->fetch_assoc();
			$bugun=date("Y-m-d");
			$bitis=date("Y-m-d",strtotime("+".str_replace('m','',$siparis_detay[sure])." month"));
			if($siparis_detay[doping]=="Süper Mağaza"){
				$querys[]="UPDATE magazalar SET supermagaza='1', onay='1', bitis='".$bitis."' where Id='".$magazaId."'";
			}elseif($siparis_detay[doping]=="Normal Mağaza"){
				$querys[]="UPDATE magazalar SET onay='1', bitis='".$bitis."' where Id='".$magazaId."'";
			}
			$querys[]="update siparis set durum='1' where Id='".$siparis_detay[Id]."'";
			process_mysql(implode("**",$querys),"magaza-yonetimi.html");
	}elseif($action=='aktiflestir'){
			$bugun=date("Y-m-d");
			$bitis=date("Y-m-d",strtotime("+1 year"));
			$querys[]="UPDATE magazalar SET onay='1' where Id='".$magazaId."'";
			$querys[]="UPDATE magazalar SET bitis='".$bitis."' where Id='".$magazaId."'";
			process_mysql(implode("**",$querys),"magaza-yonetimi.html");
	}elseif($action=='pasiflestir'){
			$querys[]="UPDATE magazalar SET onay='2' where Id='".$magazaId."'";
			process_mysql(implode("**",$querys),"magaza-yonetimi.html");
	}elseif($action=='sureuzat'){
			$bugun=date("Y-m-d");
			$bitis=date("Y-m-d",strtotime("+1 year"));
			$querys[]="UPDATE magazalar SET onay='1', suresi_doldu='0', bitis='".$bitis."' where Id='".$magazaId."'";
			process_mysql(implode("**",$querys),"magaza-yonetimi.html");
	}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Mağaza Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Mağaza Adı</th>
								  <th>Mağaza Türü</th>
								  <th>Mağaza Durumu</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?php $SQL=$mysqli->query("select * from magazalar");
						  while($magaza=$SQL->fetch_assoc()){
						  $uye=$mysqli->query("select * from magaza_kullanicilari where magazaId='".$magaza[Id]."' and yetkiler not like '%0%' limit 1")->fetch_assoc();
						  if($magaza[supermagaza]==1){
						  $tur="Süper Mağaza";
						  }else{
						  $tur="Normal Mağaza";
						  }
						  if($magaza[onay]==1){
						  $durum="Aktif";
						  }elseif($magaza[onay]==2){
						  $durum="Pasif";
						  }elseif($magaza[onay]==0 && $magaza[suresi_doldu]==0){
						  $durum="Onay Bekliyor";
						  }else{
							  $durum="Süresi Doldu";					 
						  }
						  ?>
							<tr class="dataListClass">
								<td><?=$magaza[Id];?></td>
								<td class="center"><?=$magaza[magazaadi];?></td>
								<td class="center"><?=$tur;?></td>
								<td class="center"><?=$durum;?></td>
								<td class="center">
									<a class="btn btn-primary" href="http://<?=$magaza[username];?>.<?=$nowww;?>" target="_blank">
										<i class="icon-zoom-in icon-white"></i>  
										Görüntüle                                            
									</a>
									<a class="btn btn-danger" href="?loginUser=login&redirect=<?=base64_encode('../index.php?page=magazam');?>&Id=<?=$uye[uyeId];?>" target="_blank">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<a class="btn btn-warning" href="magaza-yonetimi.html?magazaId=<?=$magaza[Id];?>&action=sil" onclick="confirm_delete();">
										<i class="icon-trash icon-white"></i> 
										Sil
									</a>
									<?php if($magaza[onay]==0 && $magaza[suresi_doldu]==0){?>
									<a class="btn btn-success" href="magaza-yonetimi.html?magazaId=<?=$magaza[Id];?>&action=onayla">
										<i class="icon-ok icon-white"></i> 
										Onayla
									</a>
									<?php }elseif($magaza[onay]==2){?>
									<a class="btn btn-success" href="magaza-yonetimi.html?magazaId=<?=$magaza[Id];?>&action=aktiflestir">
										<i class="icon-ok icon-white"></i> 
										Aktifleştir
									</a>
									<?php }elseif($magaza[onay]==0 && $magaza[suresi_doldu]==1){?>
									<a class="btn btn-success" href="magaza-yonetimi.html?magazaId=<?=$magaza[Id];?>&action=sureuzat">
										<i class="icon-ok icon-white"></i> 
										Süre Uzat
									</a>
									<?php }else{?>
									<a class="btn btn-info" href="magaza-yonetimi.html?magazaId=<?=$magaza[Id];?>&action=pasiflestir">
										<i class="icon-remove icon-white"></i> 
										Pasifleştir
									</a>
									<?php }?>
									<a class="btn btn-inverse" href="magaza-vitrin.html?magazaId=<?=$magaza[Id];?>">
										<i class="icon-star icon-white"></i> 
										Vitrin
									</a>
								</td>
							</tr>
							<?php }?>
						  </tbody>
					  </table>            
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>