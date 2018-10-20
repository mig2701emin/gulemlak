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
		<?php $this->load->view('layout/headermenu');?>
		<!-- HEADER END -->
		<div class="container">
			<div class=" row d-flex justify-content-center" style="margin:50px 0 50px 0;">
        <div class="col-sm-12 col-md-2 col"><a class="btn" style="color:mediumseagreen"><i class="far fa-thumbs-up"></i> Paket Seçimi</a> <br></div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-file"></i> Mağaza Tipi </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-camera"></i> İçerik </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-tags"></i>  Doping Al </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-check-circle"></i> Tebrikler </a>	</div>
      </div>
			<div class="jumbotron text-center">
				<h1>Daha fazla alıcıya ulaşmak ister misiniz?</h1>
				<h4>Doping alın, ilanınız 210* kata kadar daha fazla görüntülensin.</h4>

			</div>
			<form class="form" action="" method="post">
				<div class="row">
						<div class="col-md-12">
							<input type="hidden" name="gizli" value="1"/>
							<div class="col-12 m-3">
								<span class="h2 text-center">Mağaza Dopingleri</span>
							</div>
								<?php $d=1; ?>
								<?php foreach ($dopings as $magaza_doping): ?>
									<div class="col-12 m-3">
										<span class="h5"><?php echo $magaza_doping->doping; ?></span>
										<p><?php echo $magaza_doping->string; ?></p>
											<?php for ($i=1; $i < 4; $i++) {?>
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="mdoping_<?php echo $d; ?>" id="mdoping_<?php echo $d; ?>Radio<?php echo $i ?>" value="<?php echo $i; ?>">
													<label class="form-check-label" for="mdoping_<?php echo $d ?>Radio<?php echo $i ?>"><?php echo $i ?> Ay ( <?php echo $magaza_doping->ucret; ?> TL )</label>
												</div>
											<?php } ?>
									</div>
									<?php $d++; ?>
								<?php endforeach; ?>
						</div>
				</div>
				<button type="submit" class="btn btn-primary btn-block">Devam Et</button>
			</form>
		</div>
		<!-- FOOTER START -->
		<?php $this->load->view('layout/footer');?>
		<!-- FOOTER END -->
	</div>
<?php $this->load->view('layout/scripts');?>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/light/lightgallery-all.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/light/jquery.mousewheel.min.js"></script>
<style>
  .custom-checkbox .custom-control-input:disabled:checked ~ .custom-control-label::before {
       background-color: #007bff;
  }
</style>
</body>
</html>
