<?php
        session_start();
		ob_start();
		include_once('config.php');
		
		if(!isset($_SESSION["login"])){
    header("location: login.php");
}
 
	$kat=$_GET["kat"];
	///////////////////////////////////////////////////////////////////
	$uyeId=$_SESSION["uye_id"];
	//////////////////////////////////////////////////////////////////
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
                <h3>Arsalar</h3>
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
                    <ul class="nav navbar-left panel_toolbox">
					  <li><a href="rehber-listele.php?kat=1" class="btn btn-success btn-xs"><i class="fa fa-user-o"></i> Müşteri</a></li>
					  <li><a href="rehber-listele.php?kat=2" class="btn btn-warning btn-xs"><i class="fa fa-user-o"></i> Emlakçı</a></li>
					  <li><a href="rehber-listele.php?kat=3" class="btn btn-danger btn-xs"><i class="fa fa-user-o"></i> Görevli</a></li>
					  <li><a href="rehber-listele.php?kat=4" class="btn btn-info btn-xs"><i class="fa fa-user-o"></i> İnşaat</a></li>
                    </ul>
                    <ul class="nav navbar-right panel_toolbox">
					  <li><a href="#" onclick="goster()">Fiyatlar</a></li>
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
                          <th>Kategori</th>
                          <th>İsim</th>
                          <th>Soyisim</th>
                          <th>Telefon</th>
                          <th>Bölge</th>
						  <th>Açıklama</th>
						  <th>Silme</th>
                        </tr>
                      </thead>

						<tbody>				  
						<?php  
							if(empty($kat)){								
								$sorgu=mysql_query("select rehber.ids,rehber.kat,rehber.isim,rehber.soyisim,rehber.tel,rehber.bolge,rehber.info,rehber_kat.id,rehber_kat.kat from rehber LEFT JOIN rehber_kat ON rehber_kat.id=rehber.kat where uye_id='".$uyeId."'");
							}else{
								$sorgu=mysql_query("select rehber.ids,rehber.kat,rehber.isim,rehber.soyisim,rehber.tel,rehber.bolge,rehber.info,rehber_kat.id,rehber_kat.kat from rehber LEFT JOIN rehber_kat ON rehber_kat.id=rehber.kat where rehber_kat.id='".$kat."' and uye_id='".$uyeId."'");
							}
									$sil=$_POST["sil"];
										while($row=mysql_fetch_array($sorgu)){
						?>
						
						<tr>
						  <td><?php echo $row["kat"]?></td>
                          <td><?php echo $row["isim"]?></td>
						  <td><?php echo $row["soyisim"]?></td>
						  <td><?php echo $row["tel"]?></td>
						  <td><?php echo $row["bolge"]?></td>
						  <td><?php echo $row["info"]?></td>

						  <td id="salih">
						  <div id="butt">
							<a href="sil.php?idrehber=<?php echo $row["ids"]; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Sil</a>
						  </div>
                          </td>
						  
                        </tr>
						
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