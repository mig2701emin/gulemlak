<?php 	
			session_start();
		ob_start();
		include_once('config.php');
		
		if(!isset($_SESSION["login"])){
    header("location: login.php");
}
		
		

		
		$id				= $_GET['id'];
		
		$sor=mysql_query("select * from satilik_arsa where id='$id'");
		$getir=mysql_fetch_assoc($sor);
		
		
		
if($_SERVER['REQUEST_METHOD']=='POST'){	
		
		$mahalleid		= $_POST['mahalleid'];
		$ada			= $_POST['ada'];
		$parsel 		= $_POST['parsel'];
		$imar 			= $_POST['imar'];
		$mkare 			= $_POST['mkare'];
		$tapu 			= $_POST['tapu'];
		$fiyat 			= $_POST['fiyat'];
		$sahip_isim 		= $_POST['sahip_isim'];
		$sahip_numara 		= $_POST['sahip_numara'];
		
		$resim			= $_POST["resim"];
		$resimadi		=	$_FILES["resim"]["name"];
		$resimsize		=	$_FILES["resim"]["size"];
		$resimtype		=	$_FILES["resim"]["type"];
		$resimurl		=	$_FILES["resim"]["tmp_name"];
		$hedef			=	"resimler/";
		$tarih			=	date("d m y");
		
		
		
	

	
		if(!empty($fiyat)){
				$arsa_ekle=mysql_query("update satilik_arsa SET
								 mahalle_id		=	'$mahalleid',
								 ada			=	'$ada',
								 parsel			=	'$parsel',
								 imar_durumu	=	'$imar',
								 m2				=	'$mkare',
								 tapu_durumu	=	'$tapu',
								 fiyat			=	'$fiyat',
								 sahip_isim			=	'$sahip_isim',
								 sahip_numara		=	'$sahip_numara' where id='$id'");
		}else{
			echo "<script>alert('Güncelleme Başarısız!')</script>";
		}			
		
		if(empty($resimurl)){
	}elseif( ($resimtype != ("image/jpeg")) && ($resimtype != ("image/gif")) && ($resimtype != ("image/png"))){
		echo "<script>alert('Bu resim uzantısı uyumlu değil')</script>";
	}elseif( $resimtype > 960000){
		echo "<script>alert('Maximum 960 kb yüklenebilir')</script>";
	}else{
			$rastgeleisim = rand(1,10000);
				$resimyukle = move_uploaded_file($resimurl,$hedef."/".$rastgeleisim."-".$resimadi);
			$yeniresimadi	=	$rastgeleisim."-".$resimadi;
		$ekle = mysql_query("update fotograf set
									kategori_id	=	'$mahalleid',
									kategori	=	'$durum',
									resimadi	=	'$yeniresimadi',	
									resimsize	=	'$resimsize',
									resimturu	=	'$resimtype',
									tarih		=	'$tarih' where id='$id'");
		if($ekle){
			
			header("location:daire-guncelle.php");
		}else{
			echo "<script>alert('Resim kaydedilemedi')</script>";
			header("refresh:2;url=daire-guncelle.php");
		}
	}   
	
	
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
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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
                <h3></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
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
                          <select id="il" class="form-control col-md-7 col-xs-12"    >
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
                          <select  id="ilce"   class="form-control col-md-7 col-xs-12">
								<option value="0">İlçe Seçiniz</option>
						  </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Mahalle-Köy <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select  id="semt" name="mahalleid"  class="form-control col-md-7 col-xs-12">
								<option value="<?php echo $getir['mahalle_id'];?>">Mahalle-Köy Seçiniz</option>
								
						  </select>
						</div>
                      </div>
					  
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Ada <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="ada"  value="<?php echo $getir['ada'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Parsel <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="parsel"   value="<?php echo $getir['parsel'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >İmar Durumu <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" name="imar"  value="<?php echo $getir['imar_durumu'];?>"class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label  class="control-label col-md-3">Metre Karesi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" name="mkare"  class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Tapu Durumu</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" name="tapu"  value="<?php echo $getir['tapu_durumu'];?>" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Resim <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="resim" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Fiyat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" name="fiyat" value="<?php echo $getir['fiyat'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Arsa Sahibinin Adı ve Soyadı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" name="sahip_isim" value="<?php echo $getir['sahip_isim'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Arsa Sahibinin Numarası <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" name="sahip_numara" value="<?php echo $getir['sahip_numara'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          
                          <input type="submit" class="btn btn-success" value="Gönder">
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
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
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