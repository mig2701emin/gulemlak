<?php 	
		session_start();
		ob_start();
		include_once('config.php');
		
		if(!isset($_SESSION["login"])){
    header("location: login.php");
}
		
		

		$id	= $_GET['id'];

		$sor=mysql_query("select * from kiralik_daire where id='$id'");
		$getir=mysql_fetch_assoc($sor);
		
		
		
		
if($_SERVER['REQUEST_METHOD']=='POST'){	
		
		$mahalleid		= $_POST['mahalleid'];
		$apartman		= $_POST['apartman'];
		$kat 			= $_POST['kat'];
		$kapi 			= $_POST['kapi'];
		$oda 			= $_POST['oda'];
		$mkare 			= $_POST['mkare'];
		$cephe 			= $_POST['cephe'];
		$fiyat 			= $_POST['fiyat'];
		$sahip_isim 		= $_POST['sahip_isim'];
		$sahip_numara 		= $_POST['sahip_numara'];
		$durum			= $_POST['durum'];
		
		$resim			= $_POST["resim"];
		$resimadi		=	$_FILES["resim"]["name"];
		$resimsize		=	$_FILES["resim"]["size"];
		$resimtype		=	$_FILES["resim"]["type"];
		$resimurl		=	$_FILES["resim"]["tmp_name"];
		$hedef			=	"resimler/";
		$tarih			=	date("d m y");   

	
		if(!empty($apartman)){
				$daire_ekle=mysql_query("UPDATE kiralik_daire SET
								 mahalle_id			=	'$mahalleid',
								 apartman			=	'$apartman',
								 kat				=	'$kat',
								 kapi_no			=	'$kapi',
								 oda				=	'$oda',
								 mkare				=	'$mkare',
								 cephe				=	'$cephe',
								 fiyat				=	'$fiyat',
								 sahip_isim			=	'$sahip_isim',
								 sahip_numara		=	'$sahip_numara' where id='$id'");
		}else{
			echo "<script>alert('İlan Güncellenemedi!')</script>";
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Apartman Adı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="apartman" value="<?php echo $getir['apartman'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Bulunduğu Kat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="kat" class="form-control col-md-7 col-xs-12">
									<option value="0">Kat Numarası Seçiniz...</option>
									<option value="0">Giriş Kat</option>
						<?php
							for ( $saykat=1 ; $saykat < 101 ; $saykat++ )
							{?>
								<option value="<?php echo $saykat?>"><?php echo $saykat?></option>
						<?php	}
						?>
								<option value="0">Üst Kat</option>
							</select>
                          
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kapı No <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="kapi" class="form-control col-md-7 col-xs-12">
									<option value="<?php echo $getir['kapi_no'];?>">Kapı Numarası Seçiniz...</option>
						<?php
							for ( $say=1 ; $say < 101 ; $say++ )
							{?>
								<option value="<?php echo $say?>"><?php echo $say?></option>
						<?php	}
						?>
							</select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label  class="control-label col-md-3">Metre Karesi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="mkare" class="form-control col-md-7 col-xs-12">
									<option value="<?php echo $getir['mkare'];?>">Metre Kare Seçiniz...</option>
						<?php
							for ( $saymetre=10 ; $saymetre < 210 ; $saymetre+=10 )
							{?>
								<option value="<?php echo $saymetre?>"><?php echo $saymetre?></option>
						<?php	}
						?>
							</select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Oda Sayısı</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="oda" class="form-control col-md-7 col-xs-12">
								<option value="<?php echo $getir['oda'];?>">Oda Sayısı Seçiniz...</option>
								<option value="1+1">1+1</option>
								<option value="2+1">2+1</option>
								<option value="3+1">3+1</option>
								<option value="4+1">4+1</option>
								<option value="5+1">5+1</option>
							</select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Cephe <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="cephe" class="form-control col-md-7 col-xs-12">
								<option value="<?php echo $getir['cephe'];?>">Cephe Seçiniz...</option>
								<option value="Kuzey">Kuzey</option>
								<option value="Güney">Güney</option>
								<option value="Doğu">Doğu</option>
								<option value="Batı">Batı</option>
								<option value="Kuzeydoğu">Kuzeydoğu</option>
								<option value="Güneybatı">Güneydoğu</option>
								<option value="Kuzeybatı">Kuzeybatı</option>
								<option value="Güneybatı">Güneybatı</option>
							</select>
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Resim <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="resim"  class="form-control col-md-7 col-xs-12">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Daire Sahibinin Adı ve Soyadı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" name="sahip_isim" value="<?php echo $getir['sahip_isim'];?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Daire Sahibinin Numarası <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" name="sahip_numara" value="<?php echo $getir['sahip_numara'];?>" class="form-control col-md-7 col-xs-12">
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