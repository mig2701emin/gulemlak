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
						Özel Alan Yönetimi
					</li>
				</ul>
			</div>
<?
if($action=='sil'){
set_time_limit(999);
$field_name=$mysqli->query("select name from fields where Id='".$Id."' ORDER BY Id DESC")->fetch_assoc();
$querys[]="delete from fields where Id='".$Id."'";
$querys[]="delete from custom_fields where field_name='".seo($field_name[name])."'";
$querys[]="delete from multiple_field_values where fieldId='".$Id."'";
process_mysql(implode("**",$querys),"ozel-alan-yonetimi.html");
}
?>
<a class="btn btn-large btn-danger" href="ozel-alan-ekle.html" style="float:right">
										<i class="icon-plus-sign icon-white"></i>  
										Yeni Ekle                                        
									</a>
<div style="clear:both"></div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Özel Alan Yönetimi</h2>
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
								  <th>Türü</th>
								  <th>Kategori</th>
								  <th>İşlemler</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <?
						  $SQL=$mysqli->query("select * from fields ORDER BY Id DESC");
						  while($alan=$SQL->fetch_assoc()){
						  if($alan[type]=='text'){
						  $tur[$alan[Id]]="Yazı Alanı (Textbox)";
						  }elseif($alan[type]=='textarea'){
						  $tur[$alan[Id]]="Çoklu Yazı Alanı (Textarea)";
						  }elseif($alan[type]=='select'){
						  $tur[$alan[Id]]="Seçim Kutusu (Selectbox)";
						  }elseif($alan[type]=='multiple_select'){
						  $tur[$alan[Id]]="Bağlantılı Seçim Kutusu (Selectbox)";
						  }elseif($alan[type]=='radio'){
						  $tur[$alan[Id]]="Seçenek Kutusu (Radio)";
						  }elseif($alan[type]=='checkbox'){
						  $tur[$alan[Id]]="Seçmeli Kutular (Checkbox)";
						  }
						  if($alan[kategori]!='0'){$kategori1[$alan[Id]]=$mysqli->query("select * from kategoriler where Id='".$alan[kategori]."'")->fetch_assoc();}
						  if($alan[kategori2]!='0'){$kategori2[$alan[Id]]=$mysqli->query("select * from kategoriler where Id='".$alan[kategori2]."'")->fetch_assoc();}
						  if($alan[kategori3]!='0'){$kategori3[$alan[Id]]=$mysqli->query("select * from kategoriler where Id='".$alan[kategori3]."'")->fetch_assoc();}
						  if($alan[kategori4]!='0'){$kategori4[$alan[Id]]=$mysqli->query("select * from kategoriler where Id='".$alan[kategori4]."'")->fetch_assoc();}
						  if($alan[kategori5]!='0'){$kategori5[$alan[Id]]=$mysqli->query("select * from kategoriler where Id='".$alan[kategori5]."'")->fetch_assoc();}
						  if($alan[kategori6]!='0'){$kategori6[$alan[Id]]=$mysqli->query("select * from kategoriler where Id='".$alan[kategori6]."'")->fetch_assoc();}
						  if($alan[kategori7]!='0'){$kategori7[$alan[Id]]=$mysqli->query("select * from kategoriler where Id='".$alan[kategori7]."'")->fetch_assoc();}
						  if($alan[kategori8]!='0'){$kategori8[$alan[Id]]=$mysqli->query("select * from kategoriler where Id='".$alan[kategori8]."'")->fetch_assoc();}
						  ?>
							<tr class="dataListClass">
								<td><?=$alan[Id];?></td>
								<td><?=$alan[name];?><?if($alan[required]==1){?><strong style="color:red"> (Zorunlu)</strong><?}?></td>
								<td><?=$tur[$alan[Id]];?></td>
								<td>
								<?=($kategori1[$alan[Id]][kategori_adi]!=''?$kategori1[$alan[Id]][kategori_adi]:"");?>
								<?=($kategori2[$alan[Id]][kategori_adi]!=''?" > ".$kategori2[$alan[Id]][kategori_adi]:"");?>
								<?=($kategori3[$alan[Id]][kategori_adi]!=''?" > ".$kategori3[$alan[Id]][kategori_adi]:"");?>
								<?=($kategori4[$alan[Id]][kategori_adi]!=''?" > ".$kategori4[$alan[Id]][kategori_adi]:"");?>
								<?=($kategori5[$alan[Id]][kategori_adi]!=''?" > ".$kategori5[$alan[Id]][kategori_adi]:"");?>
								<?=($kategori6[$alan[Id]][kategori_adi]!=''?" > ".$kategori6[$alan[Id]][kategori_adi]:"");?>
								<?=($kategori7[$alan[Id]][kategori_adi]!=''?" > ".$kategori7[$alan[Id]][kategori_adi]:"");?>
								<?=($kategori8[$alan[Id]][kategori_adi]!=''?" > ".$kategori8[$alan[Id]][kategori_adi]:"");?>
								</td>
								<td class="center">
									<a class="btn btn-warning" href="ozel-alan-duzenle.html?Id=<?=$alan[Id];?>">
										<i class="icon-edit icon-white"></i>  
										Düzenle                                            
									</a>
									<?if($alan[type]=='multiple_select'){?>
									<a class="btn btn-primary" href="alt-ozellik-yonetimi.html?Id=<?=$alan[Id];?>">
										<i class="icon-zoom-in icon-white"></i>  
										Alt Alan Özellikleri                     										
									</a>
									<?}?>
									<a class="btn btn-success" href="ozel-alan-yonetimi.html?Id=<?=$alan[Id];?>&action=sil" onclick="confirm_delete();">
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