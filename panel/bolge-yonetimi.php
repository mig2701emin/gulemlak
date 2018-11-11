<?
include('header.php'); 
$Id=guvenlik($_GET['Id']);
$action=guvenlik($_GET['action']);
$ust=guvenlik($_GET['ust']);
$type_get=guvenlik($_GET['type']);
if($type_get=='ilce'){
	//$with="tbl_ilce+ilce_id+ilce_ad+Semtleri Görüntüle+semt+İlçe Adı";
	$with="tbl_ilce+ilce_id+ilce_ad+Mahalleleri Görüntüle+mahalle+İlçe Adı";
	$filter=" where il_id='".$Id."'";
	$type="ilce";
	/*}elseif($type_get=='semt'){
	$with="tbl_semt+semt_id+semt_ad+Mahalleleri Görüntüle+mahalle+Semt Adı";
	$filter=" where ilce_id='".$Id."'";
	$type="semt";*/
}elseif($type_get=='mahalle'){
	$with="tbl_mahalle+mahalle_id+mahalle_ad+++Mahalle Adı";
	$filter=" where ilce_id='".$Id."'";
	//$filter=" where semt_id='".$Id."'";
	$type="mahalle";
}else{
	$type_get="il";
	$with="tbl_il+il_id+il_ad+İlçeleri Görüntüle+ilce+İl Adı";
	$filter="";
	$type="il";
}
$ayir=explode('+',$with);
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Bölge Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
	set_time_limit(999);
	if($type_get=='mahalle'){
		$querys[] = "delete FROM tbl_mahalle WHERE mahalle_id = '$Id'";
		/*}elseif($type_get=='semt'){
		$k1=$mysqli->query("select * FROM tbl_mahalle WHERE semt_id = '$Id'");
		while($kat1=$k1->fetch_assoc()){
		$querys[]="delete FROM tbl_mahalle WHERE Id = '$kat1[mahalle_id]'";
		}
		$querys[]="delete FROM tbl_semt WHERE semt_id = '$Id'";*/
	}elseif($type_get=='ilce'){
		$k1=$mysqli->query("select * FROM tbl_mahalle WHERE ilce_id = '$Id'");
		//$k1=$mysqli->query("select * FROM tbl_semt WHERE ilce_id = '$Id'");
		while($kat1=$k1->fetch_assoc()){
			//$k2=$mysqli->query("select * FROM tbl_mahalle WHERE semt_id = '$kat1[semt_id]'");
			//while($kat2=$k2->fetch_assoc()){
			//$querys[]="delete FROM tbl_mahalle WHERE mahalle_id = '$kat2[mahalle_id]'";
			$querys[]="delete FROM tbl_mahalle WHERE mahalle_id = '$kat1[mahalle_id]'";
			//}
			//$querys[]="delete FROM tbl_semt WHERE semt_id = '$kat1[semt_id]'";
		}
		$querys[]="delete FROM tbl_ilce WHERE ilce_id = '$Id'";
	}elseif($type_get=='il'){
		$k1=$mysqli->query("select * FROM tbl_ilce WHERE il_id = '$Id'");
		while($kat1=$k1->fetch_assoc()){
			//$k2=$mysqli->query("select * FROM tbl_semt WHERE ilce_id = '$kat1[ilce_id]'");
			$k2=$mysqli->query("select * FROM tbl_mahalle WHERE ilce_id = '$kat1[ilce_id]'");
			while($kat2=$k2->fetch_assoc()){
				//$k3=$mysqli->query("select * FROM tbl_mahalle WHERE semt_id = '$kat2[semt_id]'");
				//while($kat3=$k3->fetch_assoc()){
				//$querys[]="delete FROM tbl_mahalle WHERE mahalle_id = '$kat3[mahalle_id]'";
				$querys[]="delete FROM tbl_mahalle WHERE mahalle_id = '$kat2[mahalle_id]'";
				//}
				//$querys[]="delete FROM tbl_semt WHERE semt_id = '$kat2[semt_id]'";
			}
			$querys[]="delete FROM tbl_ilce WHERE ilce_id = '$kat1[ilce_id]'";
		}
		$querys[]="delete FROM tbl_il WHERE il_id = '$Id'";
	}
	process_mysql(implode("**",$querys),"bolge-yonetimi.html");
}
?>
<a class="btn btn-large btn-danger" href="bolge-ekle.html?type=<?=$type;?>&ust=<?=$Id;?>" style="float:right">
										<i class="icon-plus-sign icon-white"></i>  
										Yeni Ekle                                        
									</a>
<div style="clear:both"></div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Bölge Yönetimi</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable dataTable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th><?=$ayir[5];?></th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from ".$ayir[0].$filter." ORDER BY ".$ayir[1]);
						  $bolge_id=$ayir[1];
						  $bolge_ad=$ayir[2];
						  $aciklama=$ayir[3];
						  $new_type=$ayir[4];
						  while($bolge=$SQL->fetch_assoc()){
						  ?>
							<tr class="dataListClass">
								<td><?=$bolge[$bolge_id];?></td>
								<td class="center"><?=$bolge[$bolge_ad];?></td>
								<td class="center">
								<?if(!empty($aciklama)){?>
									<a class="btn btn-primary" href="bolge-yonetimi.html?type=<?=$new_type;?>&Id=<?=$bolge[$bolge_id];?>">
										<i class="icon-zoom-in icon-white"></i>  
										<?=$aciklama;?>                                          
									</a>
									<?}?>
									<a class="btn btn-danger" href="bolge-duzenle.html?Id=<?=$bolge[$bolge_id];?>&type=<?=$type_get;?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<a class="btn btn-warning" href="bolge-yonetimi.html?Id=<?=$bolge[$bolge_id];?>&type=<?=$type_get;?>&action=sil" onclick="confirm_delete();">
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