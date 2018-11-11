<?php
        session_start();
		ob_start();
		include_once('config.php');
 
		if(!isset($_SESSION["login"])){
    header("location: login.php");
}
	if($_GET["grupno"]){
		$sorgu=mysql_query("update kiralik_daire set grup='".$_GET["grupno"]."' where id='".$_GET["ilanid"]."'");
		}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UÇKAN Takip |  DS Ajans</title>
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="build/css/custom.min.css" rel="stylesheet" media="screen, print">
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="script.js"></script>
	<script src="js/custom.js"></script>
	<link rel="stylesheet" href="css/slider.css"/>
	<style type="text/css">

		@media print{
			#editt{display:none}
			#salih{display:none}
			.salih2{display:block}
			
		}
	</style>
	
	
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div id="editt" class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php
                if($_SESSION["uye_id"] == 1){
					include "sagmenu.php";
				}else{
					include "sagmenu-uye.php";
				}
              ?>
          </div>
        </div>

        <!-- top navigation -->
        <div id="editt" class="top_nav">
          <div class="nav_menu">
            <?php
                include "k-ayar.php";
            ?>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div id="editt" class="page-title">
              <div class="title_left">
                <h3>Kiralık <small>Daireler</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Sitede ara...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Git!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <ul class="nav navbar-right panel_toolbox">
					  <li><a href="#" onclick="goster()">Fiyatlar</a></li>
                      <li><a href="#" onclick="sgoster()">Sahipler</a></li>
  					  <li><input type="button" onclick="window.print()"  value="Yazdır" /></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
						<tr>
						  <th>Mahalle</th>
						  <?php
							if($_SESSION["uye_id"] == 1){
								echo "<th>Ekleyen</th>";
							}
						  ?>
                          <th>Apartman Adı</th>
                          <th>Kat</th>
                          <th>Kapı Numarası</th>
                          <th>Oda Sayısı</th>
						  <th>Metre Karesi</th>
						  <th>Cephe</th>
						  <th>Fiyat</th>
						  <th>Sahibi</th>
                          <th id="salih"><div id="editt">#Edit</div></th>
                        </tr>
                      </thead>

						<tbody>				  
						<?php  
							if($_SESSION["uye_id"] == 1){							
								$sorgu=mysql_query("select kiralik_daire.id,kiralik_daire.mahalle_id,kiralik_daire.apartman,kiralik_daire.kat,kiralik_daire.kapi_no,kiralik_daire.oda,kiralik_daire.mkare,kiralik_daire.cephe,kiralik_daire.fiyat,kiralik_daire.sahip_isim,kiralik_daire.sahip_numara,kiralik_daire.grup,kiralik_daire.ekleyen,kiralik_daire.durum,mahalle_koy.MAH_ID,mahalle_koy.MAHALLE_ADI from kiralik_daire LEFT JOIN mahalle_koy ON kiralik_daire.mahalle_id=mahalle_koy.MAH_ID where durum=1");
							}else{
								$sorgu=mysql_query("select kiralik_daire.id,kiralik_daire.mahalle_id,kiralik_daire.apartman,kiralik_daire.kat,kiralik_daire.kapi_no,kiralik_daire.oda,kiralik_daire.mkare,kiralik_daire.cephe,kiralik_daire.fiyat,kiralik_daire.sahip_isim,kiralik_daire.sahip_numara,kiralik_daire.grup,kiralik_daire.durum,mahalle_koy.MAH_ID,mahalle_koy.MAHALLE_ADI from kiralik_daire LEFT JOIN mahalle_koy ON kiralik_daire.mahalle_id=mahalle_koy.MAH_ID where durum=1 AND uye_id='".$_SESSION["uye_id"]."'");
							}		
									$sil=$_POST["sil"];
										while($row=mysql_fetch_array($sorgu)){
						?>
						
						<tr>
						  <td><?php echo $row["MAHALLE_ADI"]?></td>
						  <?php
							if($_SESSION["uye_id"] == 1){
								echo "<th>".$row["ekleyen"]."</th>";
							}
						  ?>
                          <td><?php echo $row["apartman"]?></td>
						  <td><?php echo $row["kat"]?></td>
						  <td><?php echo $row["kapi_no"]?></td>
						  <td><?php echo $row["oda"]?></td>
						  <td><?php echo $row["mkare"]."m<sup>2</sup>"?></td>
						  <td><?php echo $row["cephe"]?></td>

                          <td><div id="fiyat"><?php echo $row["fiyat"]." TL"?></div></td>
                          <td><div id="sahip"><?php echo $row["sahip_isim"]."-".$row["sahip_numara"]; ?></div></td>

						  <td id="salih">
						  <div id="butt">
                            <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?php echo $row["id"]; ?>"><i class="fa fa-folder"></i> Sahip </a>
                            <a href="daire-guncelle.php?id=<?php echo $row["id"]; ?>" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> Düzenle </a>
                            <a href="sil.php?idkira=<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Sil </a>
                      <!----------------------------------------------------------------------------------------------------------->
                                <div>
                                  <select  name="grup"   class="<?php if ($row["grup"]==0){?>text-danger<?php }?>" onchange="ilan_grup_degistir('sonuc-kira-hepsi.php',this.options[selectedIndex].value,<?=$row["id"];?>);">
                                        <option value="0">Lütfen Grup Seçiniz...</option>
                            <?php
                                $grup = mysql_query("SELECT * FROM gruplar WHERE uye_id='".$_SESSION["uye_id"]."' ORDER BY Sira");
                                    while($grup2 = mysql_fetch_array($grup)){
                            ?>
                                        <option value="<?php echo $grup2["id"]?>"<?php if ($grup2["id"]==$row["grup"]){?> selected<?php }?>><?php echo $grup2["grup"]?></option>
                            <?php } ?>								
                                  </select>
                                </div>
                      <!------------------------------------------------------------------------------------------------->
						  </div>
                          </td>
						  
                        </tr>
							<?php include('sahip-bilgi.php'); ?>
							<?php include('slider-arsa.php'); ?>
						
							<?php } ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Kodlama ve Tasarım <a href="http://www.dsajans.com.tr">DS Ajans Bilişim</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <!-- Datatables -->
    <script>
						
						$(document).ready(function () { $("div#fiyat").hide(100); });
								function goster(){
								$("div#fiyat").toggle(100); 
							}
							
						$(document).ready(function () { $("div#sahip").hide(100); });
								function sgoster(){
								$("div#sahip").toggle(100); 
							}
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
          'order': [[ 1, 'asc' ]],
          'columnDefs': [
            { orderable: false, targets: [0] }
          ]
        });
        $datatable.on('draw.dt', function() {
          $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
          });
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->
  </body>
</html>