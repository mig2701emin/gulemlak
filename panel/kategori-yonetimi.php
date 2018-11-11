<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$ust=guvenlik($_GET['ust']);
$type_get=guvenlik($_GET['type']);
if($ust==''){
$ust="0";
}
if($type_get!=''){
$type=$type_get+1;
}else{
$type=1;
}
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Kategori Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
set_time_limit(999);
if($type==7){
$sql_query[]="delete FROM kategoriler WHERE Id = '$Id'";
}elseif($type==6){
$k1=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$Id'");
while($kat1=$k1->fetch_assoc()){
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat1[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$Id'";
}elseif($type==5){
$k1=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$Id'");
while($kat1=$k1->fetch_assoc()){
$k2=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat1[Id]'");
while($kat2=$k2->fetch_assoc()){
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat2[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat1[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$Id'";
}elseif($type==4){
$k1=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$Id'");
while($kat1=$k1->fetch_assoc()){
$k2=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat1[Id]'");
while($kat2=$k2->fetch_assoc()){
$k3=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat2[Id]'");
while($kat3=$k3->fetch_assoc()){
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat3[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat2[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat1[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$Id'";
}elseif($type==3){
$k1=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$Id'");
while($kat1=$k1->fetch_assoc()){
$k2=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat1[Id]'");
while($kat2=$k2->fetch_assoc()){
$k3=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat2[Id]'");
while($kat3=$k3->fetch_assoc()){
$k4=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat3[Id]'");
while($kat4=$k4->fetch_assoc()){
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat4[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat3[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat2[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat1[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$Id'";
}elseif($type==2){
$k1=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$Id'");
while($kat1=$k1->fetch_assoc()){
$k2=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat1[Id]'");
while($kat2=$k2->fetch_assoc()){
$k3=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat2[Id]'");
while($kat3=$k3->fetch_assoc()){
$k4=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat3[Id]'");
while($kat4=$k4->fetch_assoc()){
$k5=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat4[Id]'");
while($kat5=$k5->fetch_assoc()){
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat5[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat4[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat3[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat2[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat1[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$Id'";
}elseif($type==1){
$k1=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$Id'");
while($kat1=$k1->fetch_assoc()){
$k2=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat1[Id]'");
while($kat2=$k2->fetch_assoc()){
$k3=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat2[Id]'");
while($kat3=$k3->fetch_assoc()){
$k4=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat3[Id]'");
while($kat4=$k4->fetch_assoc()){
$k5=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat4[Id]'");
while($kat5=$k5->fetch_assoc()){
$k6=$mysqli->query("select * FROM kategoriler WHERE ust_kategori = '$kat5[Id]'");
while($kat6=$k6->fetch_assoc()){
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat6[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat5[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat4[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat3[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat2[Id]'";
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$kat1[Id]'";
}
if($admin_kilit==0){
unlink("../images/category_icon/".$kat1[icon]);
}
$sql_query[]="delete FROM kategoriler WHERE Id = '$Id'";
}
process_mysql(implode("**",$sql_query),"kategori-yonetimi.html");
}
?>
<a class="btn btn-large btn-danger" href="kategori-ekle.html?ust=<?=$ust;?>" style="float:right">
										<i class="icon-plus-sign icon-white"></i>  
										Şuanki Kategoriye Yeni Kategori Ekle                                            
									</a>
<div style="clear:both"></div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Kategori Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Kategori</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from kategoriler where ust_kategori='".$ust."' order by siralama asc,kategori_adi asc");
						  while($kategori=$SQL->fetch_assoc()){
						  ?>
							<tr class="dataListClass">
								<td><?=$kategori[Id];?></td>
								<td class="center"><?=$kategori[kategori_adi];?></td>
								<td class="center">
									<a class="btn btn-primary" href="kategori-yonetimi.html?ust=<?=$kategori[Id];?>&type=<?=$type;?>">
										<i class="icon-zoom-in icon-white"></i>  
										Alt Kategorileri Görüntüle                                            
									</a>
									<a class="btn btn-danger" href="kategori-duzenle.html?Id=<?=$kategori[Id];?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<a class="btn btn-warning" href="kategori-yonetimi.html?Id=<?=$kategori[Id];?>&type=<?=$type;?>&action=sil" onclick="confirm_delete();">
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