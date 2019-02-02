<?php
			session_start();
		ob_start();
		include_once('config.php');

		if(!isset($_SESSION["login"])){
    header("location: login.php");
}




		$id				= $_GET['id'];

		$sor=mysql_query("SELECT * FROM yonetici WHERE yonetici_id='".$_SESSION['uye_id']."'");
		$getir=mysql_fetch_assoc($sor);



if($_SERVER['REQUEST_METHOD']=='POST'){

		$isim_soyisim		= $_POST['uye_ad_soyad'];
		$username			= $_POST['uye_kullanici'];
		$password1			= $_POST['uye_eski_sifre'];
		$password2			= $_POST['uye_sifre'];
		$password3			= $_POST['sifre_tekrar'];
		$email				= $_POST['uye_email'];
		$telefon			= $_POST['uye_telefon'];


		$tarih			=	date("d m y");






		if(!empty($isim_soyisim)){
				$uye_guncelle=mysql_query("update yonetici SET
								 yonetici_ad_soyad		=	'$isim_soyisim',
								 yonetici_kullanici		=	'$username',
								 yonetici_email			=	'$email',
								 yonetici_telefon		=	'$telefon' where yonetici_id='".$_SESSION["uye_id"]."'");

		}else{
			echo "<script>alert('Güncelleme Başarısız!'); window.location='profil_guncelle.php';</script>";
		}





		if(!empty($password1) && !empty($password2) && !empty($password3)){
			if($getir['yonetici_sifre'] == $password1){
				if($password2 == $password3){
					$uye_guncelle2=mysql_query("UPDATE yonetici SET
									 yonetici_sifre			=	'$password2' WHERE yonetici_id='".$_SESSION["uye_id"]."'");
				}else{
					echo "<script>alert('Şifreler Birbiriyle Uyuşmuyor!'); window.location='profil_guncelle.php';</script>";
				}

			}else{
				echo "<script>alert('Eski Şifre Doğru Değil!')</script>";
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
                <h3>Profil Güncelleme</h3>
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

                   <form class="form-horizontal form-label-left" method="POST" action="" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >İsim ve Soyisim <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="uye_ad_soyad" value="<?php echo $getir['yonetici_ad_soyad']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Kullanıcı Adı <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  name="uye_kullanici" value="<?php echo $getir['yonetici_kullanici']; ?>"  class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Eski Şifre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="password" name="uye_eski_sifre"   class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Yeni Şifre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="password" name="uye_sifre"   class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Yeni Şifre Tekrar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="password" name="sifre_tekrar"   class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label  class="control-label col-md-3">E-Mail</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" name="uye_email"  value="<?php echo $getir['yonetici_email']; ?>" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      <div class="item form-group">
                        <label  class="control-label col-md-3 col-sm-3 col-xs-12">Telefon</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  type="text" name="uye_telefon"  value="<?php echo $getir['yonetici_telefon']; ?>" class="form-control col-md-7 col-xs-12" >
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
