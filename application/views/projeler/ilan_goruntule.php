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
		line-height:30px;
	}
	</style>
	<link href="<?php echo base_url('assets'); ?>/light/lightgallery.css" rel="stylesheet">
</head>
<body>
	<div class="se-pre-con"></div>
	<div class="main container-fluid">
		<!-- HEADER START -->
		<?php //if ($this->session->userdata("userData")["userID"] == $ilan->uyeId){ ?>
			<?php //$this->load->view('layout/newuserheader');?>
		<?php //}else{ ?>
			<?php $this->load->view('layout/headermenu');?>
		<?php //} ?>
		<!-- HEADER END -->
		<div class="container-fluid">

			<!-- <div class="row"> -->
				<?php if (isset($kategorinames)): ?>
				<div class="col-12 order-md-1 text-primary font-weight-bold" style="margin-bottom:30px;">
					<?php foreach ($kategorinames as $kategoriadi): ?>
						<?php if ($kategoriadi==end($kategorinames)): ?>
								<strong><?php echo $kategoriadi; ?></strong>
						<?php else: ?>
								<?php echo $kategoriadi; ?> <i class="fas fa-angle-double-right"></i>
						<?php endif; ?>
					<?php endforeach; ?>
					<i class="fas fa-angle-double-right"></i> <?php echo replace('tbl_il','il_ad','il_id',$ilan->il).' <i class="fas fa-angle-double-right"></i> '.replace('tbl_ilce','ilce_ad','ilce_id',$ilan->ilce).' <i class="fas fa-angle-double-right"></i> '.baslik_yap(replace('tbl_mahalle','mahalle_ad','mahalle_id',$ilan->mahalle));?>
				</div>
				<?php endif; ?>
			<!-- </div> -->
			<div class="row">
		    <div class="col-12 col-sm-6 col-lg-9">
						<div class="col-12 baslik"><?php echo $ilan->firma_adi; ?></div>
		        <div class="col-12"><a  id="bigImage" style="font-weight: bold;font-family: Poppins;">BÜYÜK RESİM</a></div>
						<div class="row">
						<div class="col-12 col-sm-12 col-md-8 col-lg-8">
							<div id="demo" class="carousel slide row" data-ride="carousel" >
								<!-- The slideshow -->
								<div class="carousel-inner">
									<?php $r=1; ?>
									<?php foreach ($resimler as $resim): ?>
										<div class="carousel-item<?php if ($r==1) {echo ' active';} ?>">
											<img src="<?php echo base_url('photos/crop/'.$resim->name); ?>" alt="Chicago" class="img-rounded border border-secondary" style="background-color:#8a8a8a">
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

								<?php foreach ($resimler as $resim): ?>
									<div class="col-3 col-lg-2 m-0 p-1">
									<a><img src="<?php echo base_url('photos/thumbnail/'.$resim->name); ?>" class="img-rounded border border-secondary" style="border-radius:15px;background-color:#8a8a8a"  alt="Cinque Terre"></a>
									</div>
								<?php endforeach; ?>

							</div>
							</center>
							<div>
							</div>
							<div class="demo-gallery" style="display: none;">
								<row id="lightgallery" class="list-unstyled row">
									<?php $r=1; ?>
									<?php foreach ($resimler as $resim): ?>
										<div class="col-4 col-sm-6 col-md-4" data-responsive="<?php echo base_url('photos/big/'.$resim->name); ?> 375, <?php echo base_url('photos/big/'.$resim->name); ?> 480, <?php echo base_url('photos/big/'.$resim->name); ?> 800" data-src="<?php echo base_url('photos/big/'.$resim->name); ?>" data-sub-html="<h2><?php echo $ilan->firma_adi; ?></h2><p></p>">
											<a href="">
												<img <?php if ($r==1) {echo ' id="lightImg" ';} ?> class="img-responsive" style="border-radius:20px;" src="<?php echo base_url('photos/big/'.$resim->name); ?>">
											</a>
										</div>
										<?php $r++; ?>
									<?php endforeach; ?>
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
								<div class="col-6">
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
				<div class="col-12 col-sm-6 col-lg-3" style="paddind-right:0;padding-left:0">
					<?php if($this->session->userdata("userData")["userID"] == $ilan->uyeId){?>
					<div class="col-12 mar-bot"><a href="<?php echo base_url(); ?>hesabim/ilanduzenle/<?php echo $ilan->Id; ?>">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> İlanı Düzenle</a></div>
					<div class="col-12 mar-bot"><a href="<?php echo base_url(); ?>hesabim/samekategoriilan/<?php echo $ilan->Id; ?>">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Aynı Kategoride Yeni İlan Ver</a></div>
					<div class="col-12 mar-bot"><a href="<?php echo base_url(); ?>doping/ilan/<?php echo $ilan->Id; ?>">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Doping Yap</a></div>
					<?php if($ilan->onay==1){?>
					<div class="col-12 mar-bot"><a href="<?php echo base_url(); ?>hesabim/ilandurdur/<?php echo $ilan->Id; ?>">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Yayından Kaldır</a></div>
					<?php }else{?>
					<div class="col-12 mar-bot"><a href="<?php echo base_url(); ?>hesabim/ilansil/<?php echo $ilan->Id; ?>" onclick="return window.confirm('İlanı Yayından Kaldırmak İstediğinizden Eminmisiniz?');">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Sil</a></div>
					<?php }?>
					<?php if($ilan->suresi_doldu==1 || $ilan->onay==2){?>
					<div class="col-12 mar-bot"><a href="<?php echo base_url(); ?>hesabim/<?php if($ilan->suresi_doldu==1){?>ilansureuzat/<?php }else{?>ilanaktiflestir/<?php }?><?php echo $ilan->Id;?>">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Yayına Al</a></div>

					<?php }else{?>
					<div class="col-12 mar-bot"><a href="<?php echo base_url(); ?>hesabim/guncelle/<?php echo $ilan->Id; ?>">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Güncelim</a></div>
					<?php }}?>

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
					<?php
					if($magaza_var_mi){
					?>
					<div class="col-12 mar-bot"><a href="<?php echo base_url().$magaza->username; ?>"> &nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png" > Üyenin Mağazası</a></div>
					<?php }?>
					<div class="col-12 mar-bot"><a href=""> &nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Diğer İlanları</a></div>
					<?php if ($this->session->userdata("userData")["userID"]){ ?>
						<?php $favsor = $this->db->query("select * from favoriler where ilanId='".$ilan->Id."' and uyeId='".$user->Id."'");
						$favsorgu=$favsor->num_rows();
						if($favsorgu==0){
						?>
						<div class="col-12 mar-bot"><a id="favorilink" href="javascript:favori();">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Favorilerime Ekle</a></div>
						<?php }else{?>
						<div class="col-12 mar-bot"><a id="favorilink" href="javascript:favorisil();">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Favorilerimden Sil</a></div>
						<?php }?>
					<div class="col-12 mar-bot"><a href="javascript:mesaj_gonder(<?php echo $ilan->uyeId;?>,<?php echo $ilan->Id;?>);">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> Mesaj Gönder</a></div>
					<div class="col-12 mar-bot"><a href="?yazdir=1">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> İlanı Yazdır</a></div>
					<div class="col-12 mar-bot"><a href="javascript:sikayet();">&nbsp;<img border="0" src="<?php echo base_url() ?>assets/images/cursor_image_right.png"> İlan ile ilgili şikayetim var</a></div>
				<?php } ?>
					<!-- <div class="col-12 mar-bot">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3185.951538138242!2d37.34923931510993!3d37.01095247990566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1531de263041cad9%3A0x2ea85746583f6db6!2sKarata%C5%9F+Mahallesi%2C+103424.+Cd.+24%2C+27470+%C5%9Eahinbey%2FGaziantep!5e0!3m2!1str!2str!4v1534592215147"  width="100%" height="250" frameborder="0" style="border:0; border-radius:30px;" allowfullscreen></iframe>
					</div> -->
				</div>
				<div class="col-12">
					<div class="row col-12 mb-3 mt-3">
						<?php echo base64_decode($ilan->aciklama); ?>
					</div>
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
