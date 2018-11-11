<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$Id=guvenlik($_GET['Id']);
$field_details=$mysqli->query("select Id,name,field_values from fields where Id='".$Id."'")->fetch_assoc();
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Alt Özellik Yönetimi
					</li>
				</ul>
			</div>
<div style="clear:both"></div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Alt Özellik Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>Id</th>
								  <th>Alan Adı</th>
								  <th>Değer</th>
								  <th>Alt Değerler</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $main_values=explode("||",$field_details['field_values']);
						  for ($i = 0; $i <= count($main_values)-1; $i++) {
						  $fetch_vals=$mysqli->query("select * from multiple_field_values where fieldId='".$Id."' and fieldMainValue='".$i."'")->fetch_assoc();
						  $values[$i]=($fetch_vals[fieldValue]!=''?str_replace("||",", ",$fetch_vals[fieldValue]):"Yok");
						  ?>
							<tr class="dataListClass">
								<td><?=$field_details[Id];?></td>
								<td><?=$field_details[name];?></td>
								<td><?=$main_values[$i];?></td>
								<td><?=$values[$i];?></td>
								<td class="center">
									<a class="btn btn-warning" href="alt-ozellik-duzenle.html?fieldId=<?=$Id;?>&Id=<?=$i;?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
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