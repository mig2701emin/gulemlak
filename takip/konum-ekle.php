<?php 	
			session_start();
		ob_start();
		include_once('config.php');
		
		if(!isset($_SESSION["login"])){
    header("location: login.php");
}
		
		
	
	
			
	
if($_SERVER['REQUEST_METHOD']=='POST'){	
		$mulkid				= $row["id"];
		
		$durum				= $_POST['durum'];
		
		$il 		=$_POST["il"];
		$ilce 		=$_POST["ilce"];
		$mahalle 	=$_POST["mahalleid"];
		
		$ildiger 		=$_POST["ildiger"];
		$ilcediger 		=$_POST["ilcediger"];
		$mahallediger 	=$_POST["mahallediger"];

$ilsor=mysql_query("select * from il ");
$ilgetir=mysql_fetch_array($ilsor);

$ilcesor=mysql_query("select * from ilce ");
$ilcegetir=mysql_fetch_array($ilcesor);

$mahallesor=mysql_query("select * from semt ");
$mahallegetir=mysql_fetch_array($mahallesor);

					
				
						
					if(!empty($ilcediger)&&($ilcediger!=$ilcegetir["ILCE_ADI_KUCUK"])){
						$konum_ekle=mysql_query("INSERT INTO ilce SET
								 IL_ID					=	'$il',
								 ILCE_ADI				=	'$ilcediger'");
						header("location:konum-ekle.php");
					}elseif(!empty($ilcediger)&&($ilcediger!=$ilcegetir["ILCE_ADI_BUYUK"])){
						$konum_ekle=mysql_query("INSERT INTO ilce SET
								 IL_ID					=	'$il',
								 ILCE_ADI				=	'$ilcediger'");
						header("location:konum-ekle.php");
					}elseif(!empty($ilcediger)&&($ilcediger!=$ilcegetir["ILCE_ADI"])){
						$konum_ekle=mysql_query("INSERT INTO ilce SET
								 IL_ID					=	'$il',
								 ILCE_ADI				=	'$ilcediger'");
						header("location:konum-ekle.php");
					}elseif(!empty($mahallediger)&&($mahallediger!=$mahallegetir["SEMT_ADI_KUCUK"])){
						$konum_ekle=mysql_query("INSERT INTO mahalle_koy SET
								 IL_ID					=	'$il',
								 ILCE_ID				=	'$ilce',
								 MAHALLE_ADI				=	'$mahallediger'");
						header("location:konum-ekle.php");
					}elseif(!empty($mahallediger)&&($mahallediger!=$mahallegetir["SEMT_ADI_BUYUK"])){
						$konum_ekle=mysql_query("INSERT INTO mahalle_koy SET
								 IL_ID					=	'$il',
								 ILCE_ID				=	'$ilce',
								 MAHALLE_ADI				=	'$mahallediger'");
						header("location:konum-ekle.php");
					}elseif(!empty($mahallediger)&&($mahallediger!=$mahallegetir["SEMT_ADI"])){
						$konum_ekle=mysql_query("INSERT INTO mahalle_koy SET
								 IL_ID					=	'$il',
								 ILCE_ID				=	'$ilce',
								 MAHALLE_ADI				=	'$mahallediger'");
						header("location:konum-ekle.php");
					}else{
						echo "<script>alert('mahalleler eşit değil')</script>";
						header("refresh:1;url=konum-ekle.php");
					}
				
					
					/*if(!empty($il)&&($ilce)){
						$konum_ekle=mysql_query("INSERT INTO semt2 SET
								 IL_ID					=	'$il',
								 ILCE_ID				=	'$ilce',
								 SEMT_ADI				=	'$mahallediger'");
					}else{
						echo "<script>alert('kaydedilemedi')</script>";
					}*/
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

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="script.js"></script>
	
	
	
	
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
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
        <div class="top_nav">
          <div class="nav_menu">
            <?php
                include "k-ayar.php";
            ?>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Konum Ekle</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Sitede Ara...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Git!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <ul class="nav navbar-right panel_toolbox">
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

                    <form class="form-horizontal form-label-left" method="POST" action="" enctype="multipart/form-data">

                      

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >İl <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="il" name="il" class="form-control col-md-7 col-xs-12"    >
						<option value="0">İl Seçiniz</option>
						  <?php
							
							$sorgu=mysql_query("select * from il where IL_ID");
							while($row=mysql_fetch_array($sorgu)){
								echo'<option  value="'.$row['IL_ID'].'">'.$row['IL_ADI'].'</option>';
							}
						  ?>
							</select>
                        </div>
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >İlçe <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select  id="ilce" name="ilce"  class="form-control col-md-7 col-xs-12">
				<option value="0">İlçe Seçiniz</option>
			  </select>
                        </div>
				<div>Diğer <input type="checkbox" onclick="ilcegoster()"/></div>
                      </div>
					  
		     <div id="ilce2" class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Eklenecek İlçe <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="ilcediger"   class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Mahalle-Köy <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select  id="semt" name="mahalleid"  class="form-control col-md-7 col-xs-12">
				<option value="0">Mahalle-Köy Seçiniz</option>					
			  </select>
			</div>
				<div>Diğer <input type="checkbox" onclick="mahallegoster()"/></div>
                      </div>
					  
                      <div id="mahalle2" class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Eklenecek Mahalle-Köy <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" name="mahallediger"  class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          
                          <input type="submit"  class="btn btn-success" value="Gönder">
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
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
    <!-- validator -->
    <script src="vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <!-- validator -->
    <script>
	
						$(document).ready(function () { $("div#il2").hide(100); });
								function ilgoster(){
								$("div#il2").toggle(100); 
							}
							
						$(document).ready(function () { $("div#ilce2").hide(100); });
								function ilcegoster(){
								$("div#ilce2").toggle(100); 
							}
							
							$(document).ready(function () { $("div#mahalle2").hide(100); });
								function mahallegoster(){
								$("div#mahalle2").toggle(100); 
							}
							
						
      // initialize the validator function
      validator.message.date = 'not a real date';

      // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
      $('form')
        .on('blur', 'input[required], input.optional, select.required', validator.checkField)
        .on('change', 'select.required', validator.checkField)
        .on('keypress', 'input[required][pattern]', validator.keypress);

      $('.multi.required').on('keyup blur', 'input', function() {
        validator.checkField.apply($(this).siblings().last()[0]);
      });

      $('form').submit(function(e) {
        e.preventDefault();
        var submit = true;

        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
          submit = false;
        }

        if (submit)
          this.submit();

        return false;
      });
    </script>
    <!-- /validator -->
  </body>
</html>