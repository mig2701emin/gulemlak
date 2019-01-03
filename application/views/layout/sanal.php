<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="tr">
<!--<![endif]-->
<head>
  <!-- Basic Page Needs
    ================================================== -->


  <title>Ticaret Meclisi</title>
  <!-- SEO Meta
  ================================================== -->
  <?php $this->load->view('layout/metas');?>
  <meta name="description" content="TicaretMeclisi, Gaziantepte kurulan ve Türkiyede adını duyurmaya başlayan ticaretin yeni merkezidir.">
  <!-- CSS
  ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  <?php $this->load->view('layout/styles');?>

</head>
<body>
    <div class="se-pre-con"></div>
    <div class="main">

             <!-- HEADER START -->
      <?php $this->load->view('layout/header');?>


        <style>
            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                font-family: Arial;
                font-size: 17px;
            }

            #myVideo {
                position: fixed;
                right: 0;
                bottom: 0;
                min-width: 100%;
                min-height: 100%;

            }

            .content {
                position: fixed;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                color: #f1f1f1;
                width: 100%;
                padding: 20px;
            }

            #myBtn {
                width: 200px;
                font-size: 18px;
                padding: 10px;
                border: none;
                background: #000;
                color: #fff;
                cursor: pointer;
            }

            #myBtn:hover {
                background: #ddd;
                color: black;
            }
        </style>
        </head>
        <body>

        <video autoplay muted loop id="myVideo">
            <source src="https://static.matterport.com/mp_cms/media/filer_public/2f/bc/2fbc53cc-aee1-44cc-84aa-f28860d3d382/janets_re_micrositevideov1-sd.mp4" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>



        <script>
            var video = document.getElementById("myVideo");
            var btn = document.getElementById("myBtn");

            function myFunction() {
                if (video.paused) {
                    video.play();
                    btn.innerHTML = "Pause";
                } else {
                    video.pause();
                    btn.innerHTML = "Play";
                }
            }
        </script>


        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                </div>


            </div>
         </div>

        <div class="container-fluid mt-60 mb-60" style="padding-top:70px; background-color:white;opacity: 0.8">

            <h3 class="text-center" style="    color: #1f1f2f;
    font-size: 22px;
    font-weight: 700;
    text-transform: uppercase;
    font-family: 'Montserrat', sans-serif;color:#7e7e7e">Bizimle İletişim Kurun</h3><br />



            <div class="row" >

                <div class="col-12">

                       </div>

                <div class="col-md-2">

                </div>
                <div class="col-md-8">
                    <form action="/post" method="post" style="font-family: 'Montserrat', sans-serif;color:#7e7e7e">
                        <input class="form-control" name="name" placeholder="Ad soyad" style=" background: transparent;"/><br />
                        <input class="form-control" name="phone" placeholder="Telefon" style=" background: transparent;"/><br />
                        <input class="form-control" name="email" placeholder="Eposta"  style=" background: transparent;"/><br />
                        <textarea class="form-control" name="text" placeholder="Nasıl yardımcı olabiliriz?" style="height:150px;    background: transparent;"></textarea><br />
                        <input class="btn btn-primary" type="submit" value="Gönder" /><br /><br />
                    </form>

                </div>
                <div class="col-md-2" style="font-family: 'Open Sans';font-size: 14px;">
                    <b style="color:white">Müşteri Hizmetleri:</b> <br />
                    <i class="fas fa-phone" style="color:#2c9bf4"></i> Phone: 0542 218 12 54<br />
                    <i class="fas fa-envelope" style="color:#2c9bf4"></i> E-mail: <a href="mailto:support@mysite.com">info@ticaretmeclisi.com</a><br />
                    <br /><br />
                    <b style="color: dimgrey">Merkez:</b><br />
                    Gül Emlak Ofisi <br />
                    Şirinevler Mahallesi, 69019. Sk. No:2, 27300 <br />
                    Şehitkamil/Gaziantep<br />
                    Telefon: 0542 218 12 54<br />
                    <a href="mailto:usa@mysite.com">iletisim@ticaretmeclisi.com</a><br />





                </div>




            </div>

        </div>

        <div class="container-fluid  ml-0 mr-0 pl-0 pr-0 mb-0"  style="margin-top: 110px;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11345.17830869545!2d37.409296934544514!3d37.066235864780154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1531e428740088d5%3A0x3594ab3ee16ac70f!2zR8OcTCBFTUxBSyBPRsSwU8Sw!5e0!3m2!1sen!2str!4v1543318005090" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <!--Section: Contact v.2-->

        <!--Section: Contact v.2-->
      <?php $this->load->view('layout/footer');?>
      <!-- FOOTER END -->
    </div>
    <?php $this->load->view('layout/scripts');?>
</body>
</html>
