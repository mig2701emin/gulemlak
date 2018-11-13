<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="tr">
<!--<![endif]-->
<head>
	<!-- Basic Page Needs
      ================================================== -->
	<title><?php echo $title; ?></title>
	<!-- SEO Meta
    ================================================== -->
	<?php $this->load->view('layout/metas');?>
	<!-- CSS
    ================================================== -->
	<?php $this->load->view('layout/styles');?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<style>

	/* Make the image fully responsive */
	.img-rounded:hover{
		opacity: 0.7;
	}
	.mar-bot{
		border-bottom:1px solid lightgray ;
		/*line-height:30px;*/
		font-size: 0.9em;
	}
	.mar-bot2{
		border-bottom:1px solid lightgray ;
		/*line-height:30px;*/
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
@media (max-width: 767px){
	.cont_breadcrumbs_1 {
	  position: relative;
	  width: 100%;
	  float: left;
	  /*margin: 20px;*/

	}
	.cont_breadcrumbs_1 > ul {
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

	.cont_breadcrumbs_1 > ul > li  > a {
		display: block;
		padding: 10px;
		font-size: 0.8em;
		transform: skewX(15deg);
		text-decoration:none;
		color: #444;
		font-weight: 300;
	}

	.cont_breadcrumbs_1 > ul > li:first-child {
		margin-left: 0px;
	}
	.cont_breadcrumbs_1 > ul > li:hover {
	 background-color: #CFD8DC;
	}

	.cont_breadcrumbs_1 > ul > li:last-child {
	  /* background-color: #78909C; */
		background-color: #4E978D;
	}

	.cont_breadcrumbs_1 > ul > li:last-child > a {
	  color: #fff;;
	}

	.cont_breadcrumbs_1 > ul:hover > li {
	  margin-left: 0px;
	}
}
@media (min-width: 768px){
	.cont_breadcrumbs_1 {
	  position: relative;
	  width: 100%;
	  float: left;
	  margin: 20px 20px;
	}

	.cont_breadcrumbs_1 > ul > li {
	  position: relative;
	  float: left;
	  transform: skewX(-15deg);
	  background-color: #fff;
		box-shadow: -2px 0px 20px -6px rgba(0,0,0,0.5);
		z-index: 1;
		transition: all 0.5s;
	}

	.cont_breadcrumbs_1 > ul > li:hover {
	 background-color: #CFD8DC;
	}

	.cont_breadcrumbs_1 > ul > li  > a {
	  display: block;
	  padding: 10px;
	  font-size: 0.8em;
		 transform: skewX(15deg);
		 text-decoration:none;
		 color: #444;
		font-weight: 300;
	}
	.cont_breadcrumbs_1 > ul > li:last-child {
	  /* background-color: #78909C; */
	  background-color: #4E978D;
	  transform: skew(0deg);
		margin-left: -5px;

	}

	.cont_breadcrumbs_1 > ul > li:last-child > a {
		  color: #fff;
		 transform: skewX(0deg);
	}
}
/* .bilgibaslik{
font-weight: bold;
} */
.bilgibaslik {
    display: inline-block;
    min-width: 10px;
    padding: 6px 7px;
    font-size: 11px;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-align: right;
    white-space: nowrap;
    vertical-align: middle;
    /* background-color: white; */
    /* background-color: #F5F5F5; */
    border-radius: 10px;
    margin-top: 2px;
    float: left !important;
}
.bilgiler {
    display: inline-block;
    min-width: 10px;
    padding: 6px 7px;
    font-size: 11px;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-align: left;
    white-space: nowrap;
    vertical-align: middle;
    background-color: white;
    /* background-color: #D7CCC8; */
    border-radius: 10px;
    margin-top: 2px;
    float: left !important;
}
.linkler {
    display: inline-block;
    min-width: 10px;
    padding: 6px 7px;
    font-size: 11px;
    font-weight: 700;
    line-height: 1;
    color: white;
    text-align: left;
    white-space: nowrap;
    vertical-align: middle;
    background-color: #4E978D;
    border-radius: 10px;
    margin-top: 2px;
    /*float: left !important;*/
}
.beyazyazi{
	color: white;
}


	</style>
	<link href="<?php echo base_url('assets'); ?>/light/lightgallery.css" rel="stylesheet">
</head>
<body>
	<div class="se-pre-con"></div>
	<div class="main color_bgy">
		<!-- HEADER START -->
		<?php //if ($this->session->userdata("userData")["userID"] == $ilan->uyeId){ ?>
			<?php //$this->load->view('layout/newuserheader');?>
		<?php //}else{ ?>
			<?php $this->load->view('layout/header');?>
		<?php //} ?>
		<!-- HEADER END -->
		<div class="container">
			<div class="row">
				<div class="col-12 mt-2 mb-2">
					<div class="row">
						<?php if (isset($kategorinames)){ ?>
							<div class="col-lg-4 col-md-6 col-12">
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
						<div class="col-lg-4 col-md-6 col-12">
							<div class="cont_principal">
								<div class="cont_breadcrumbs">
									<div class="cont_breadcrumbs_1">
										<ul>
											<li><a href="#"><?php echo replace('tbl_il','il_ad','il_id',$ilan->il); ?></a></li>
											<li><a href="#"><?php echo replace('tbl_ilce','ilce_ad','ilce_id',$ilan->ilce); ?></a></li>
											<li><a href="#"><?php echo baslik_yap(replace('tbl_mahalle','mahalle_ad','mahalle_id',$ilan->mahalle)); ?></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-2 hidden-md hidden-sm-down">

						</div>
					</div>
				</div>
		    <div class="col-lg-10 col-md-12 color_bg1 border">
					<?php if ($this->session->userdata("userData")["userID"] == $ilan->uyeId): ?>
						<div class="col-12">
							<p class="text text-danger"><?php echo $ilan->ilan_notu; ?></p>
						</div>
					<?php endif; ?>
						<div class="row">
						<div class="col-12 col-sm-12 col-md-8 col-lg-8 border">
							<div class="row text-center">
								<div class="col-12">
									<div class="row">
										<div class="col-3 color_bg3 text-white rounded">
											<a id="bigImage">Büyük Resim</a>
										</div>
										<div class="col-9">
											<!-- AddToAny BEGIN -->
											<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
											<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
											<a class="a2a_button_facebook"></a>
											<a class="a2a_button_twitter"></a>
											<a class="a2a_button_whatsapp"></a>
											<a class="a2a_button_google_gmail"></a>
											<a class="a2a_button_print"></a>
											</div>
											<script>
											var a2a_config = a2a_config || {};
											a2a_config.locale = "tr";
											</script>
											<script async src="https://static.addtoany.com/menu/page.js"></script>
											<!-- AddToAny END -->
										</div>
									</div>
								</div>
								<div class="col-12">
									<h3 class="text-uppercase"><?php echo $ilan->firma_adi; ?></h3>
								</div>

								<div id="demo" class="carousel slide col-12" data-ride="carousel">
									<!-- The slideshow -->
									<div class="carousel-inner">
										<?php $r=1; ?>
										<?php foreach ($resimler as $resim): ?>
											<div class="carousel-item<?php if ($r==1) {echo ' active';} ?>">
												<img src="<?php echo base_url('photos/big/'.$resim->name); ?>" alt="Chicago" class="img-rounded border border-secondary">
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
								<div id="corusel" class="col-12">
									<div class="row">
										<?php foreach ($resimler as $resim){ ?>
											<div class="col-4 col-md-3 col-lg-2 m-0 p-1">
											<a><img src="<?php echo base_url('photos/thumbnail/'.$resim->name); ?>" class="img-rounded border border-secondary" style="border-radius:15px;background-color:#EFEBE9"  alt="Cinque Terre"></a>
											</div>
										<?php } ?>
									</div>
								</div>
								<div class="demo-gallery" style="display: none;">
									<row id="lightgallery" class="list-unstyled row">
										<?php $r=1; ?>
										<?php foreach ($resimler as $resim){ ?>
											<div class="col-4 col-sm-6 col-md-4" data-responsive="<?php echo base_url('photos/big/'.$resim->name); ?> 375, <?php echo base_url('photos/big/'.$resim->name); ?> 480, <?php echo base_url('photos/big/'.$resim->name); ?> 800" data-src="<?php echo base_url('photos/big/'.$resim->name); ?>" data-sub-html="<h4 class='text-success'><?php echo $ilan->firma_adi; ?></h4><p></p>">
												<a href="">
													<img <?php if ($r==1) {echo ' id="lightImg" ';} ?> class="img-responsive" style="border-radius:20px;" src="<?php echo base_url('photos/big/'.$resim->name); ?>">
												</a>
											</div>
											<?php $r++; ?>
										<?php } ?>
									</row>
								</div>

							</div>
						</div>
						<div id="genelBilgi" class="col-12 col-sm-12 col-md-4 col-lg-4 border">
							<div class="row">
								<div class="col-12 ">
									<div class="row mar-bot">
										<div class="col-5 text-center">
											Favori
											<p class="text-center"><span class="badge badge-pill badge-dark"><?php echo $this->db->query("select * from favoriler where ilanId='".$ilan->Id."'")->num_rows(); ?></span></p>
										</div>
										<div class="col-7 text-center">
											Görüntülenme
											<p class="text-center"><span class="badge badge-pill badge-dark"><?php echo $ilan->toplam_ziyaretci;?></span></p>
										</div>
									</div>
								</div>
								<div class="col-12 mar-bot">
									<div class="row">
										<div class="col-6 bilgibaslik">
											İlan No
										</div>
										<div class="col-6 bilgiler">
											<?php echo $ilan->ilanId; ?>
										</div>
									</div>
								</div>
								<div class="col-12 mar-bot">
									<div class="row">
										<div class="col-6 bilgibaslik">
											Fiyat
										</div>
										<div class="col-6 bilgiler text-light color_bg5">
											<?php echo number_format($ilan->fiyat,0, ',', '.');?> <?php echo $ilan->birim;?>
										</div>
									</div>
								</div>
								<div class="col-12 mar-bot">
									<div class="row">
										<div class="col-6 bilgibaslik">
											İlan Tarihi
										</div>
										<div class="col-6 bilgiler">
											<?php yeni_tarih($ilan->kayit_tarihi); ?>
										</div>
									</div>
								</div>
								<?php
								echo $show_fields;
								?>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="row">
							<div class="text-center mb-3 mt-3 border-bottom">
								<?php echo base64_decode($ilan->aciklama); ?>
							</div>
							<div class="col-12">
								<div class="row">
									<?php
									echo $show_additional_fields;
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-12 color_bg1">
					<div class="row">
						<div class="col-lg-12 col-md-6 col-12">
							<div class="row text-center border">
								<?php if ($magaza_var_mi){ ?>
									<center>
									<div class="col-12"><h3><?php echo $magaza->magazaadi; ?></h3></div>
									<div class="col-12">
										<img class="img-responsive" style="border-radius:20px;" src="<?php if ($magaza->logo) {echo base_url('photos/magaza/').$magaza->logo;} else {echo base_url('assets/images/company/c1.png');}?>">
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
							</div>
						</div>
						<div class="col-lg-12 col-md-6 col-12">
							<div class="row text-center border">
								<?php if($this->session->userdata("userData")["userID"] == $ilan->uyeId){?>
								<div class="col-12 linkler"><a class="beyazyazi" href="<?php echo base_url(); ?>hesabim/ilanduzenle/<?php echo $ilan->Id; ?>">İlanı Düzenle</a></div>
								<div class="col-12 linkler"><a class="beyazyazi" href="<?php echo base_url(); ?>hesabim/samekategoriilan/<?php echo $ilan->Id; ?>">Aynı Kategoride İlan Ver</a></div>
								<div class="col-12 linkler"><a class="beyazyazi" href="<?php echo base_url(); ?>doping/ilan/<?php echo $ilan->Id; ?>">Doping Yap</a></div>
								<?php if($ilan->onay==1){?>
								<div class="col-12 linkler"><a class="beyazyazi" href="<?php echo base_url(); ?>hesabim/ilandurdur/<?php echo $ilan->Id; ?>">Yayından Kaldır</a></div>
								<?php }else{?>
								<div class="col-12 linkler"><a class="beyazyazi" href="<?php echo base_url(); ?>hesabim/ilansil/<?php echo $ilan->Id; ?>" onclick="return window.confirm('İlanı Yayından Kaldırmak İstediğinizden Eminmisiniz?');">Sil</a></div>
								<?php }?>
								<?php if($ilan->suresi_doldu==1 || $ilan->onay==2){?>
								<div class="col-12 linkler"><a class="beyazyazi" href="<?php echo base_url(); ?>hesabim/<?php if($ilan->suresi_doldu==1){?>ilansureuzat/<?php }else{?>ilanaktiflestir/<?php }?><?php echo $ilan->Id;?>">Yayına Al</a></div>

								<?php }else{?>
								<div class="col-12 linkler"><a class="beyazyazi" href="<?php echo base_url(); ?>hesabim/guncelle/<?php echo $ilan->Id; ?>">Güncelim</a></div>
							<?php }}else{?>
								<?php
								if($magaza_var_mi){
								?>
								<div class="col-12 linkler"><a class="beyazyazi" href="<?php echo base_url().$magaza->username; ?>">Üyenin Mağazası</a></div>
								<?php }?>
								<div class="col-12 linkler"><a class="beyazyazi" href="">Diğer İlanları</a></div>
								<?php if ($this->session->userdata("userData")["userID"]){ ?>
									<?php $favsor = $this->db->query("select * from favoriler where ilanId='".$ilan->Id."' and uyeId='".$user->Id."'");
									$favsorgu=$favsor->num_rows();
									if($favsorgu==0){
									?>
									<div class="col-12 linkler"><a class="beyazyazi" id="favorilink" href="javascript:favori();">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Favorilerime Ekle</a></div>
									<?php }else{?>
									<div class="col-12 linkler"><a class="beyazyazi" id="favorilink" href="javascript:favorisil();">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Favorilerimden Sil</a></div>
									<?php }?>
								<div class="col-12 linkler"><a class="beyazyazi" href="javascript:mesaj_gonder(<?php echo $ilan->uyeId;?>,<?php echo $ilan->Id;?>);">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Mesaj Gönder</a></div>
								<div class="col-12 linkler"><a class="beyazyazi" href="javascript:sikayet();">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> İlanla ilgili şikayet bildir</a></div>
							<?php } ?>
						<?php }?>
								<!-- <div class="col-12"><a class="btn btn-sm btn-secondary" href="?yazdir=1">İlanı Yazdır</a></div> -->
							</div>
						</div>
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
		$('#corusel>div>a').click(function () {
           console.log($('#corusel>div>a').index(this));
           var indexnum=$('#corusel>div>a').index(this);
            $('.carousel').carousel(indexnum);
        })
	});
</script>
<script type="text/javascript">
	function favorisil() {
		$.ajax({
				type: "post",
				url: "<?php echo base_url('hesabim/favorisil'); ?>",
				data: "id=<?php echo $ilan->Id; ?>",
				dataType: 'json',

				success: function(json){
						if(json['success']){
								$('a#favorilink').attr("href", "javascript:favori()");
								$('a#favorilink').html('&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Favorilerime Ekle');
								generate('success', json['success']);
						}

						if(json['error']){
								generate('error', json['error']);
						}
				}
		});
	}
	function favori() {

		$.ajax({
				type: "post",
				url: "<?php echo base_url('hesabim/favoriekle'); ?>",
				data: "id=<?php echo $ilan->Id; ?>",
				dataType: 'json',

				success: function(json){
						if(json['success']){
								$('a#favorilink').attr("href", "javascript:favorisil()");
								$('a#favorilink').html('&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Favorilerimden Sil');
								generate('success', json['success']);
						}

						if(json['error']){
								generate('error', json['error']);
						}
				},
				error: function(jqXHR, textStatus, errorThrown) {

            console.log('jqXHR:');
            console.log(jqXHR);
            console.log('textStatus:');
            console.log(textStatus);
            console.log('errorThrown:');
            console.log(errorThrown);
        }

		});
	}
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
