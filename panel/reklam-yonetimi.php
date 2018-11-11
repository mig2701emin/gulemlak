<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$Id=guvenlik($_GET['Id']);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Reklam Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
$rklm_dty=$mysqli->query("select source from reklam where Id='".$Id."'")->fetch_assoc();
$querys[]="delete from reklam where Id='".$Id."'";
process_mysql(implode("**",$querys),"reklam-yonetimi.html");
if($admin_kilit==0){
unlink("../images/adverts/".$rklm_dty[source]);
}
}elseif($action=='onayla'){
$querys[]="update reklam set status='1' where Id='".$Id."'";
process_mysql(implode("**",$querys),"reklam-yonetimi.html");
}elseif($action=='pasiflestir'){
$querys[]="update reklam set status='0' where Id='".$Id."'";
process_mysql(implode("**",$querys),"reklam-yonetimi.html");
}
?>
<a class="btn btn-large btn-danger" href="reklam-ekle.html" style="float:right">
										<i class="icon-plus-sign icon-white"></i>  
										Yeni Ekle                                        
									</a>
<div style="clear:both"></div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Reklam Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>Id</th>
								  <th>Reklam Adı</th>
								  <th>Türü</th>
								  <th>Konum</th>
								  <th>Eklenme Tarihi</th>
								  <th>Bitiş Tarihi</th>
								  <th>Durum</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from reklam");
						  while($reklam=$SQL->fetch_assoc()){
						  if($reklam[type]==1){
						  $type="Resim";
						  }elseif($reklam[type]==2){
						  $type="Flash";
						  }else{
						  $type="Kod";
						  }
						  $durum=($reklam[status]==1?"Aktif":"Pasif");
						  if($reklam[location]==1){
						  $location="Slayt Sağ Bölüm (241x230px)";
						  }elseif($reklam[location]==2){
						  $location="Ana Sayfa Vitrini Alt Bölüm (728x90px)";
						  }elseif($reklam[location]==3){
						  $location="Acil Acil Vitrini Alt Bölüm (728x90px)";
						  }elseif($reklam[location]==4){
						  $location="Hizmet İlanları Vitrini Alt Bölüm (728x90px)";
						  }elseif($reklam[location]==5){
						  $location="Mağaza Vitrini Alt Bölüm (728x90px)";
						  }elseif($reklam[location]==6){
						  $location="Son Eklenen İlanlar Alt Bölüm (728x90px)";
						  }
?>
							<tr class="dataListClass">
								<td><?=$reklam[Id];?></td>
								<td><?=$reklam[name];?></td>
								<td><?=$type;?></td>
								<td><?=$location;?></td>
								<td><?=yeni_tarih($reklam[start]);?></td>
								<td><?=yeni_tarih($reklam[end]);?></td>
								<td><?=$durum;?></td>
								<td class="center">
									<a class="btn btn-danger" href="reklam-duzenle.html?Id=<?=$reklam[Id];?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<?if($reklam[status]==0){?>
									<a class="btn btn-success" href="reklam-yonetimi.html?Id=<?=$reklam[Id];?>&action=onayla">
										<i class="icon-ok icon-white"></i> 
										Onayla
									</a>
									<?}else{?>
									<a class="btn btn-info" href="reklam-yonetimi.html?Id=<?=$reklam[Id];?>&action=pasiflestir">
										<i class="icon-remove icon-white"></i> 
										Pasifleştir
									</a>
									<?}?>
									<a class="btn btn-warning" href="reklam-yonetimi.html?Id=<?=$reklam[Id];?>&action=sil" onclick="confirm_delete();">
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