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
						Tüm Yöneticiler
					</li>
				</ul>
			</div>
			<a class="btn btn-large btn-danger" href="yonetici-ekle.html" style="float:right">
										<i class="icon-plus-sign icon-white"></i>  
										Yeni Yönetici Ekle                                          
									</a>
<div style="clear:both"></div>
<?
if($action=='sil' and $Id!=$_SESSION['admin_user']){
process_mysql("delete from yoneticiler where Id='".$Id."'","yoneticiler.html");
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Tüm Yöneticiler</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Kullanıcı Adı</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from yoneticiler");
						  while($yonetici=$SQL->fetch_assoc()){
						  ?>
							<tr class="dataListClass">
								<td><?=$yonetici[Id];?></td>
								<td><?=$yonetici[username];?></td>
								<td class="center">
									<a class="btn btn-success" href="yonetici-duzenle.html?Id=<?=$yonetici[Id];?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<?if($yonetici[Id]!=$_SESSION['admin_user']){?>
									<a class="btn btn-info" href="yoneticiler.html?Id=<?=$yonetici[Id];?>&action=sil" onclick="confirm_delete();">
										<i class="icon-trash icon-white"></i> 
										Sil
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