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
						Sanal Pos Ayarları
					</li>
				</ul>
			</div>
<?
if($action=='aktiflestir'){
$querys[]="update pos_ayarlar set status='1' where Id='".$Id."'";
process_mysql(implode("**",$querys),"sanal-pos-ayarlari.html");
}elseif($action=='pasiflestir'){
$querys[]="update pos_ayarlar set status='0' where Id='".$Id."'";
process_mysql(implode("**",$querys),"sanal-pos-ayarlari.html");
}
?>
<div style="clear:both"></div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Sanal Pos Ayarları</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>Id</th>
								  <th>Banka Adı</th>
								  <th>Mod</th>
								  <th>Durum</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from pos_ayarlar order by status DESC");
						  while($pos=$SQL->fetch_assoc()){
						  if($pos[mode]==1){
						  $mode="Test Mod";
						  }else{
						  $mode="Gerçek mod";
						  }
						  $durum=($pos[status]==1?"Aktif":"Pasif");
?>
							<tr class="dataListClass">
								<td><?=$pos[Id];?></td>
								<td><?=$pos[name];?></td>
								<td><?=$mode;?></td>
								<td><?=$durum;?></td>
								<td class="center">
									<a class="btn btn-danger" href="sanal-pos-bilgi-duzenle.html?Id=<?=$pos[Id];?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<?if($pos[status]==0){?>
									<a class="btn btn-success" href="sanal-pos-ayarlari.html?Id=<?=$pos[Id];?>&action=aktiflestir">
										<i class="icon-ok icon-white"></i> 
										Aktifleştir
									</a>
									<?}else{?>
									<a class="btn btn-info" href="sanal-pos-ayarlari.html?Id=<?=$pos[Id];?>&action=pasiflestir">
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
