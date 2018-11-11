<?php 
session_start(); 
ob_start();
include("config.php");

	
	
    
if($_SERVER['REQUEST_METHOD']=='POST'){ 
$kadi = $_POST['kadi'];
$sifre = $_POST['sifre'];
 
$sql_check = mysql_query("select * from yonetici where yonetici_kullanici='".$kadi."' and yonetici_sifre='".$sifre."' and durum=1") or die(mysql_error());
	$uye_getir = mysql_fetch_assoc($sql_check);
	
	if($uye_getir['durum'] == 0){
		echo "<script>alert('Böyle Bir Üyelik Bulunmamaktadır.'); window.location='login.php';</script>";
	}
	
	if(mysql_num_rows($sql_check))  {
		
		$_SESSION["login"] = "true";
		$_SESSION["user"] = $kadi;
		$_SESSION["pass"] = $sifre;
		$_SESSION["uye_id"] = $uye_getir['yonetici_id'] ;
		$_SESSION["name"] = $uye_getir['yonetici_ad_soyad'];
		$_SESSION["durum"] = $uye_getir['durum'];
		$_SESSION["yapım"] = "musa demir";
		header("Location:index.php");
	}
	else {
		if($kadi=="" or $sifre=="") {
			echo "<script type='text/javascript'>alert('Lütfen kullanıcı adı ya da şifreyi boş bırakmayınız..! </script>";
		}
		else {
			echo "<script type='text/javascript'>alert('Kullanıcı Adı/Şifre Yanlış.');</script>";
		}
	}
	
	
}
 
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UÇKAN Takip | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="login.php">
              <h1>Giriş Sayfası</h1>
              <div>
                <input type="text" class="form-control" name="kadi" placeholder="Kullanıcı Adı" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="sifre" placeholder="Şifre" required="" />
              </div>
              <div>
                <input type="submit" value="Giriş" class="btn btn-default submit"/>
                <a class="reset_pass" href="#">Şifreni mi unuttun?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> UÇKAN Takip</h1>
                  <p>©2016 Tüm Hakları Saklıdır. Kodlama ve Tasarım <a href="http://www.dsajans.com.tr">DS Ajans Bilişim</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>