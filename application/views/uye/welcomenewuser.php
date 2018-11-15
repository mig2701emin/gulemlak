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
  <!-- CSS
  ================================================== -->
  <?php $this->load->view('layout/styles');?>

</head>
<body>
    <div class="se-pre-con"></div>
    <div class="main">

        <!-- HEADER START -->
      <?php $this->load->view('layout/header');?>

			<div class="centerfix siteWrapper sitePage">
			    <div class="centercontent">
			        <div class="row">
			           <div class="col-md-3"></div>
			            <div class="col-md-6">
			            	<div class="noMargin">
			            		<div class="panel panel-default">
								  	<div class="panel-body">
								  		<div class="jumbotron text-center">
		                                    <h2>TİCARET MECLİSİ PLATFORMUNA</h2><h2>HOŞ GELDİN</h2><br/>

		                                    <h5>Üye Kaydınız Alındı</h5><br/><h5>Hemen Giriş Yaparak Ücretsiz İlan Verebilirsiniz.</h5>
		                                    <br/>
		                                    <a href="<?php echo base_url(''); ?>" class="btn btn-primary btn-lg">
		                                        <i class="fa fa-home"></i>
		                                        Ana Sayfa
		                                    </a>

		                                    <a href="<?php echo base_url('uyegiris'); ?>" class="btn btn-success btn-lg">
		                                        <i class="fa fa-user"></i>
		                                        Giriş Yap
		                                    </a>
		                                </div>
								</div>

			            	</div>

			            </div>
		                <div class="col-md-3"></div>
			        </div>
			    </div>
			</div>


	<?php $this->load->view('layout/footer');?>
	<!-- FOOTER END -->
</div>
<?php $this->load->view('layout/scripts');?>
</body>
</html>
