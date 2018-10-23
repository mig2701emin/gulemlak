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

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<style>
	/* Make the image fully responsive */
	.img-rounded:hover{
		opacity: 0.7;
	}
	.baslik{
         font-weight:700;
		 font-size:30px;
		margin-bottom:10px;
		margin-top: :10px;
	}
	.mar-bot{
		border-bottom:1px solid lightgray ;
		line-height:40px;
	}
	</style>
	<link href="<?php echo base_url('assets'); ?>/light/lightgallery.css" rel="stylesheet">
</head>
<body>
	<div class="se-pre-con"></div>
	<div class="main" style="overflow:visible ">
		<!-- HEADER START -->
		<?php $this->load->view('layout/newuserheader');?>
		<!-- HEADER END -->
		<div class="container">
            <div class="row d-flex justify-content-center" style="margin-top: 50px;margin-bottom: 50px;">
                <div class="col-sm-12 col-md-2 col"><a class="btn" style="font-weight:bold;">  Kategori</a> <br></div>
                <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;"> İlan Detay </a>	</div>
                <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;"> Fotoğraf </a>	</div>
                <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;color: orangered"" ><i class="fas fa-caret-right"></i>   Ön İzleme </a>	</div>
                <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;> Doping Al </a>	</div>
                <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold"> Tebrikler </a>	</div>
            </div>

				<div class="row" style="margin-bottom:50px; ">
                    <div class="col-12 text-center align-middle" style=" margin-bottom:20px; ">
                        <center>İlanınızla ilgili aşağıdaki bilgiler doğruysa "Devam Et" butonunu tıklayıp bir sonraki aşamaya geçin. Değilse "Düzelt" butonunu tıklayın.</center>


                    </div>

                    <div class="col-md-3"></div>
                    <div class="col-md-3"> <a  class="btn btn-primary btn-block w-100 " name="back" style="color: white" onclick="history.back();"><i class="fas fa-caret-left"></i>  Düzelt  </a>
                    </div><div class="col-md-3"> <a  class="btn btn-primary btn-block w-100"  href="<?php echo base_url('doping/ilan/'.$ilan->Id) ?>">Devam Et  <i class="fas fa-caret-right"></i></a>
                    </div>
                    <div class="col-md-3"></div>








				</div>
			<div class="row" >
				<?php if (isset($kategorinames)): ?>
				<div class="col-md-12 order-md-1 text-primary font-weight-bold" style="margin-bottom:30px;">
					<?php foreach ($kategorinames as $kategoriadi): ?>
						<?php if ($kategoriadi==end($kategorinames)): ?>
								<strong><?php echo $kategoriadi; ?></strong>
						<?php else: ?>
								<?php echo $kategoriadi; ?> <i class="fas fa-angle-double-right"></i>
						<?php endif; ?>
					<?php endforeach; ?>
				</div>
				<?php endif; ?>
			</div>
			<div class="row">
		    <div class="col-12 col-sm-6 col-lg-9">
	        <div class="row">
						<div class="col-12 baslik"><?php echo $ilan->firma_adi; ?></div>
		        <div class="col-12"><a  id="bigImage" style="font-weight: bold;font-family: Poppins;">Büyük resim görüntülü</a></div>
						<div class="col-12 col-sm-12 col-md-8 col-lg-8">
							<div id="demo" class="carousel slide" data-ride="carousel">
								<!-- The slideshow -->
								<div class="carousel-inner">
									<?php $r=1; ?>
									<?php foreach ($resimler as $resim): ?>
										<div class="carousel-item<?php if ($r==1) {echo ' active';} ?>">
											<img src="<?php echo base_url('photos/crop/'.$resim->name); ?>" alt="Chicago">
										</div>
										<?php $r++; ?>
									<?php endforeach; ?>
								</div>
								<!-- Left and right controls -->
								<a class="carousel-control-prev" href="#demo" data-slide="prev">
									<span class="carousel-control-prev-icon"></span>
								</a>
								<a class="carousel-control-next" href="#demo" data-slide="next">
									<span class="carousel-control-next-icon"></span>
								</a>
							</div>
							<div id="corusel"  class="row">
								<?php foreach ($resimler as $resim): ?>
									<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 m-0 p-1 ">
										<a><img src="<?php echo base_url('photos/thumbnail/'.$resim->name); ?>" class="img-rounded border border-secondary" style="border-radius:15px;" alt="Cinque Terre"></a>
									</div>
								<?php endforeach; ?>
							</div>
							<div>
							</div>
							<div class="demo-gallery" style="display: none;">
								<row id="lightgallery" class="list-unstyled row">
									<?php $r=1; ?>
									<?php foreach ($resimler as $resim): ?>
										<div class="col-4 col-sm-6 col-md-4" data-responsive="<?php echo base_url('photos/big/'.$resim->name); ?> 375, <?php echo base_url('photos/big/'.$resim->name); ?> 480, <?php echo base_url('photos/big/'.$resim->name); ?> 800" data-src="<?php echo base_url('ilanlar/uploads/big/'.$resim->name); ?>" data-sub-html="<h4>Fading Light</h4><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>">
											<a href="">
												<img <?php if ($r==1) {echo ' id="lightImg" ';} ?> class="img-responsive" style="border-radius:20px;" src="<?php echo base_url('photos/big/'.$resim->name); ?>">
											</a>
										</div>
										<?php $r++; ?>
									<?php endforeach; ?>
								</row>
							</div>
						</div>
						<div id="genelBilgi" class="col-12 col-sm-6 col-md-4 col-lg-4">
							<div class="col-12 mar-bot">İlan No:<?php echo $ilan->Id; ?></div>
							<div class="col-12 mar-bot"><?php echo $ilan->fiyat; ?></div>
							<div class="col-12 mar-bot"><?php echo replace('tbl_il','il_ad','il_id',$ilan->il).'/'.replace('tbl_ilce','ilce_ad','ilce_id',$ilan->ilce).'/'.replace('tbl_mahalle','mahalle_ad','mahalle_id',$ilan->mahalle); ?> </div>
							<div class="col-12 mar-bot">İlan Tarihi:&nbsp;<?php echo dateReplace(date("d.m.Y")); ?></div>
							<?php
							echo $show_fields;
							?>
						</div>
						<div class="row">
							<?php echo base64_decode($ilan->aciklama); ?>
						</div>
						<?php
						echo $show_additional_fields;
						?>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-3">
				<?php if ($magaza_var_mi): ?>
					<div class="col-12"><h3><?php echo $magaza->magazaadi; ?></h3></div>
					<div class="col-12">
			 			<img class="img-responsive" style="border-radius:20px;" src="<?php if ($magaza->logo) {echo base_url('photos/magaza/').$magaza->logo;} else {echo base_url('assets/images/company/c1.png');}?>">
		 			</div>
					<div class="col-12 mar-bot">Yetkili: <?php echo $user->ad." ".$user->soyad; ?></div>
				<?php else: ?>
					<div class="col-12"><h3><?php echo $user->ad." ".$user->soyad; ?></h3></div>
					<div class="col-12">
			 			<img class="img-responsive" style="border-radius:20px;" src="<?php if ($user->picture) {echo $user->picture;} else {echo base_url('assets/images/picto_profil.png');}?>">
		 			</div>
				<?php endif; ?>
					<div class="col-12 mar-bot">Üyelik Tarihi:<?php echo dateReplace($user->kayit_tarihi); ?></div>
					<?php if ($ilan->yayinla==1): ?>
						<div class="col-12 mar-bot">Telefon:<?php echo $user->gsm; ?></div>
					<?php endif; ?>
					<!-- <div class="col-12 mar-bot">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3185.951538138242!2d37.34923931510993!3d37.01095247990566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1531de263041cad9%3A0x2ea85746583f6db6!2sKarata%C5%9F+Mahallesi%2C+103424.+Cd.+24%2C+27470+%C5%9Eahinbey%2FGaziantep!5e0!3m2!1str!2str!4v1534592215147"  width="100%" height="250" frameborder="0" style="border:0; border-radius:30px;" allowfullscreen></iframe>
					</div> -->
				</div>
			</div>
		</div>
		<!-- FOOTER START -->
		<?php $this->load->view('layout/footer');?>
		<!-- FOOTER END -->
	</div>
<?php $this->load->view('layout/scripts');?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#lightgallery').lightGallery();
		$('#bigImage').click(function(){
            $( "#lightImg").trigger( "click" );
           console.log($( "#lightImg" ));
        });
		$('#corusel>a').click(function () {
           console.log($('#corusel>a').index(this));
           var indexnum=$('#corusel>a').index(this);
            $('.carousel').carousel(indexnum);
        })
	});
</script>
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
