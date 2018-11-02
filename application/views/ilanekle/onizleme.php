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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>bootstrap-4.1.3/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link href="<?php echo base_url('assets'); ?>/light/lightgallery.css" rel="stylesheet">
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
		line-height:30px;
		font-size: 0.9em;
	}
	.mar-bot2{
		border-bottom:1px solid lightgray ;
		line-height:30px;
		font-size: 0.7em;
	}
	.cont_principal {
		margin: 0px auto;
		text-align:center;
		padding: 0px;
		list-style: none;
		font-family: 'Open Sans';
	  /*position: absolute;*/
	  width: 100%;
	  height: 100%;
	  /*background: rgb(212,228,239);
		background: -moz-linear-gradient(top,  rgba(212,228,239,1) 0%, rgba(134,174,204,1) 100%);
		background: -webkit-linear-gradient(top,  rgba(212,228,239,1) 0%,rgba(134,174,204,1) 100%);
		background: linear-gradient(to bottom,  rgba(212,228,239,1) 0%,rgba(134,174,204,1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d4e4ef', endColorstr='#86aecc',GradientType=0 );*/

	}

	.cont_breadcrumbs {
	  width: 100%;
	}

	.cont_breadcrumbs_1 {
	  position: relative;
	  width: 100%;
	  float: left;
	  /*margin: 20px;*/

	}
	.cont_breadcrumbs_2 {
	  position: relative;
	  width: 100%;
	  float: right;
	  /*margin: 20px;*/

	}
	.cont_breadcrumbs_1 > ul {
		list-style-type: none;
	}
	.cont_breadcrumbs_2 > ul {
		list-style-type: none;
	}


	.cont_breadcrumbs_1 > ul > li {
	  position: relative;
	  float: left;
	  transform: skewX(-15deg);
	  background-color: #fff;
		box-shadow: -2px 0px 20px -6px rgba(0,0,0,0.5);
		z-index: 1;
	  width: auto;
	  margin-left: -50px;
		transition: all 0.5s;
	}
	.cont_breadcrumbs_2 > ul > li {
		position: relative;
		float: right;
		transform: skewX(-15deg);
		background-color: #fff;
		box-shadow: -6px 0px 20px -2px rgba(0,0,0,0.5);
		z-index: 1;
		width: auto;
		margin-right: -50px;
		transition: all 0.5s;
	}

	.cont_breadcrumbs_1 > ul > li  > a {
		display: block;
		padding: 10px;
		/*font-size: 20px;*/
		transform: skewX(15deg);
		text-decoration:none;
		color: #444;
		font-weight: 300;
	}
	.cont_breadcrumbs_2 > ul > li  > a {
		display: block;
		padding: 10px;
		/*font-size: 20px;*/
		transform: skewX(15deg);
		text-decoration:none;
		color: #444;
		font-weight: 300;
	}

	.cont_breadcrumbs_1 > ul > li:first-child {
		margin-left: 0px;
	}
	.cont_breadcrumbs_2 > ul > li:first-child {
		margin-right: 0px;
	}
	.cont_breadcrumbs_1 > ul > li:hover {
	 background-color: #CFD8DC;
	}
	.cont_breadcrumbs_2 > ul > li:hover {
	 background-color: #CFD8DC;
	}

	.cont_breadcrumbs_1 > ul > li:last-child {
	  background-color: #78909C;
	}
	.cont_breadcrumbs_2 > ul > li:last-child {
	  background-color: #78909C;
	}

	.cont_breadcrumbs_1 > ul > li:last-child > a {
	  color: #fff;;
	}
	.cont_breadcrumbs_2 > ul > li:last-child > a {
	  color: #fff;;
	}

	.cont_breadcrumbs_1 > ul:hover > li {
	  margin-left: 0px;
	}
	.cont_breadcrumbs_2 > ul:hover > li {
	  margin-right: 0px;
	}
	</style>
</head>
<body>
	<div class="se-pre-con"></div>
	<div class="main container-fluid">
		<!-- HEADER START -->
		<?php $this->load->view('layout/newuserheader');?>
		<!-- HEADER END -->
		<div class="container-fluid">
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
        <div class="col-md-3">
					<a  class="btn btn-primary btn-block w-100 " name="back" style="color: white" onclick="history.back();"><i class="fas fa-caret-left"></i>  Düzelt  </a>
        </div>
				<div class="col-md-3">
					<a  class="btn btn-primary btn-block w-100"  href="<?php echo base_url('doping/ilan/'.$ilan->Id) ?>">Devam Et  <i class="fas fa-caret-right"></i></a>
        </div>
        <div class="col-md-3"></div>
			</div>

			<div class="row">
				<div class="row col-12 mt-2 mb-2">
					<?php if (isset($kategorinames)){ ?>
						<div class="col-12 col-lg-6">
							<div class="cont_principal">
								<div class="cont_breadcrumbs">
									<div class="cont_breadcrumbs_1">
										<ul>
											<?php foreach ($kategorinames as $kategoriadi){ ?>
											<?php if ($kategoriadi==end($kategorinames)){ ?>
											<li><a href="#"><strong><?php echo $kategoriadi; ?></strong></a></li>
											<?php }else{ ?>
											<li><a href="#"><?php echo $kategoriadi; ?></a></li>
											<?php } ?>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="col-12 col-lg-6">
						<div class="cont_principal">
							<div class="cont_breadcrumbs">
								<div class="cont_breadcrumbs_2">
									<ul>
										<li><a href="#"><?php echo replace('tbl_il','il_ad','il_id',$ilan->il); ?></a></li>
										<li><a href="#"><?php echo replace('tbl_ilce','ilce_ad','ilce_id',$ilan->ilce); ?></a></li>
										<li><a href="#"><?php echo baslik_yap(replace('tbl_mahalle','mahalle_ad','mahalle_id',$ilan->mahalle)); ?></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
		    <div class="col-12 col-sm-6 col-lg-10">
						<div class="col-12 jumbotron">
							<h2 class="text-uppercase"><?php echo $ilan->firma_adi; ?></h2>
						</div>
		        <div class="row col-12 mb-1"><a  id="bigImage" class="btn btn-outline-info font-weight-bold">BÜYÜK RESİM</a></div>
						<div class="row">
						<div class="col-12 col-sm-12 col-md-8 col-lg-8">
							<div id="demo" class="carousel slide row" data-ride="carousel" >
								<!-- The slideshow -->
								<div class="carousel-inner">
									<?php $r=1; ?>
									<?php foreach ($resimler as $resim): ?>
										<div class="carousel-item<?php if ($r==1) {echo ' active';} ?>">
											<img src="<?php echo base_url('photos/big/'.$resim->name); ?>" alt="Chicago" class="img-rounded border border-secondary" style="background-color:#EFEBE9;width:100%;height:auto">
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
							<center>
							<div id="corusel" class="row col-12">

								<?php foreach ($resimler as $resim){ ?>
									<div class="col-4 col-md-3 col-lg-2 m-0 p-1">
									<a><img src="<?php echo base_url('photos/thumbnail/'.$resim->name); ?>" class="img-rounded border border-secondary" style="border-radius:15px;background-color:#EFEBE9;width:100%;height:auto"  alt="Cinque Terre"></a>
									</div>
								<?php } ?>

							</div>
							</center>
							<div>
							</div>
							<div class="demo-gallery" style="display: none;">
								<row id="lightgallery" class="list-unstyled row">
									<?php $r=1; ?>
									<?php foreach ($resimler as $resim){ ?>
										<div class="col-4 col-sm-6 col-md-4" data-responsive="<?php echo base_url('photos/big/'.$resim->name); ?> 375, <?php echo base_url('photos/big/'.$resim->name); ?> 480, <?php echo base_url('photos/big/'.$resim->name); ?> 800" data-src="<?php echo base_url('photos/big/'.$resim->name); ?>" data-sub-html="<h2><?php echo $ilan->firma_adi; ?></h2><p></p>">
											<a href="">
												<img <?php if ($r==1) {echo ' id="lightImg" ';} ?> class="img-responsive" style="border-radius:20px;width:100%;height:auto" src="<?php echo base_url('photos/big/'.$resim->name); ?>">
											</a>
										</div>
										<?php $r++; ?>
									<?php } ?>
								</row>
							</div>
						</div>
						<div id="genelBilgi" class="col-12 col-sm-12 col-md-4 col-lg-4">
							<div class="col-12 mar-bot row">
								<div class="col-6">
									İlan No:
								</div>
								<div class="col-6">
									<?php echo $ilan->Id; ?>
								</div>
							</div>
							<div class="col-12 mar-bot row">
								<div class="col-6">
									Fiyat:
								</div>
								<div class="col-6 label label-info">
									<?php echo $ilan->fiyat; ?>
								</div>
							</div>
							<div class="col-12 mar-bot row">
								<div class="col-6">
									İlan Tarihi:
								</div>
								<div class="col-6">
									<?php yeni_tarih($ilan->kayit_tarihi); ?>
								</div>
							</div>
							<?php
							echo $show_fields;
							?>
						</div>

					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-2" style="paddind-right:0;padding-left:0">
				<?php if ($magaza_var_mi){ ?>
					<center>
					<div class="col-12"><h3><?php echo $magaza->magazaadi; ?></h3></div>
					<div class="col-12">
			 			<img class="img-responsive" style="border-radius:20px;width:100%;height:auto" src="<?php if ($magaza->logo) {echo base_url('photos/magaza/').$magaza->logo;} else {echo base_url('assets/images/company/c1.png');}?>">
		 			</div>
					<div class="col-12 mar-bot">Yetkili:<br/><strong><?php echo $user->ad." ".$user->soyad; ?></strong></div>
				<?php }else{ ?>
					<div class="col-12"><h3><?php echo $user->ad." ".$user->soyad; ?></h3></div>
					<div class="col-12">
			 			<img class="img-responsive" style="border-radius:20px;" src="<?php if ($user->picture) {echo $user->picture;} else {echo base_url('assets/images/picto_profil.png');}?>">
		 			</div>
				<?php } ?>
					<div class="col-12 mar-bot">Üyelik Tarihi:<br/><strong><?php yeni_tarih($user->kayit_tarihi); ?></strong></div>
					<?php if ($ilan->yayinla==1){ ?>
						<div class="col-12 mar-bot">Telefon:<br/><strong><?php echo $user->gsm; ?></strong></div>
					</center>
					<?php } ?>

				<?php if($this->session->userdata("userData")["userID"] == $ilan->uyeId){?>
				<div class="col-12 mar-bot2"><a href="<?php echo base_url(); ?>hesabim/ilanduzenle/<?php echo $ilan->Id; ?>">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> İlanı Düzenle</a></div>
				<div class="col-12 mar-bot2"><a href="<?php echo base_url(); ?>hesabim/samekategoriilan/<?php echo $ilan->Id; ?>">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Aynı Kategoride İlan Ver</a></div>
				<div class="col-12 mar-bot2"><a href="<?php echo base_url(); ?>doping/ilan/<?php echo $ilan->Id; ?>">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Doping Yap</a></div>
				<?php if($ilan->onay==1){?>
				<div class="col-12 mar-bot2"><a href="<?php echo base_url(); ?>hesabim/ilandurdur/<?php echo $ilan->Id; ?>">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Yayından Kaldır</a></div>
				<?php }else{?>
				<div class="col-12 mar-bot2"><a href="<?php echo base_url(); ?>hesabim/ilansil/<?php echo $ilan->Id; ?>" onclick="return window.confirm('İlanı Yayından Kaldırmak İstediğinizden Eminmisiniz?');">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Sil</a></div>
				<?php }?>
				<?php if($ilan->suresi_doldu==1 || $ilan->onay==2){?>
				<div class="col-12 mar-bot2"><a href="<?php echo base_url(); ?>hesabim/<?php if($ilan->suresi_doldu==1){?>ilansureuzat/<?php }else{?>ilanaktiflestir/<?php }?><?php echo $ilan->Id;?>">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Yayına Al</a></div>

				<?php }else{?>
				<div class="col-12 mar-bot2"><a href="<?php echo base_url(); ?>hesabim/guncelle/<?php echo $ilan->Id; ?>">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Güncelim</a></div>
			<?php }}else{?>
				<?php
				if($magaza_var_mi){
				?>
				<div class="col-12 mar-bot2"><a href="<?php echo base_url().$magaza->username; ?>"> &nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png" > Üyenin Mağazası</a></div>
				<?php }?>
				<div class="col-12 mar-bot2"><a href=""> &nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Diğer İlanları</a></div>
				<?php if ($this->session->userdata("userData")["userID"]){ ?>
					<?php $favsor = $this->db->query("select * from favoriler where ilanId='".$ilan->Id."' and uyeId='".$user->Id."'");
					$favsorgu=$favsor->num_rows();
					if($favsorgu==0){
					?>
					<div class="col-12 mar-bot2"><a id="favorilink" href="javascript:favori();">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Favorilerime Ekle</a></div>
					<?php }else{?>
					<div class="col-12 mar-bot2"><a id="favorilink" href="javascript:favorisil();">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Favorilerimden Sil</a></div>
					<?php }?>
				<div class="col-12 mar-bot2"><a href="javascript:mesaj_gonder(<?php echo $ilan->uyeId;?>,<?php echo $ilan->Id;?>);">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Mesaj Gönder</a></div>
				<div class="col-12 mar-bot2"><a href="javascript:sikayet();">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> İlanla ilgili şikayet bildir</a></div>
			<?php } ?>
		<?php }?>
				<div class="col-12 mar-bot2"><a href="?yazdir=1">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> İlanı Yazdır</a></div>
				<!-- AddToAny BEGIN -->
				<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
					<a class="a2a_button_facebook"></a>
					<a class="a2a_button_twitter"></a>
					<a class="a2a_button_google_plus"></a>
					<a class="a2a_button_pinterest"></a>
					<a class="a2a_button_whatsapp"></a>
				</div>
				<script>
					var a2a_config = a2a_config || {};
					a2a_config.locale = "tr";
				</script>
				<script async src="https://static.addtoany.com/menu/page.js"></script>
				<!-- AddToAny END -->
					<!-- <div class="col-12 mar-bot">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3185.951538138242!2d37.34923931510993!3d37.01095247990566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1531de263041cad9%3A0x2ea85746583f6db6!2sKarata%C5%9F+Mahallesi%2C+103424.+Cd.+24%2C+27470+%C5%9Eahinbey%2FGaziantep!5e0!3m2!1str!2str!4v1534592215147"  width="100%" height="250" frameborder="0" style="border:0; border-radius:30px;" allowfullscreen></iframe>
					</div> -->
				</div>
				<div class="col-12">
					<hr class="mb-4"/>
					<div class="row col-12 mb-3 mt-3">
						<?php echo base64_decode($ilan->aciklama); ?>
					</div>
					<hr class="mb-4"/>
					<div class="row col-12 mb-3">
						<?php
						echo $show_additional_fields;
						?>
					</div>

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
