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
</head>
<body>
	<div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="container" style="margin-top:20px; margin-bottom:100px;  ">
        <div class="row d-flex justify-content-center" style="margin-top: 50px;margin-bottom: 50px;">
            <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold"> İlan Düzenleme </a>	</div>
            <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;color: orangered"><i class="fas fa-caret-right"></i> Tebrikler </a>	</div>
        </div>
				<div class="row mt-40">
					<div class="col-xl-8">
						<div class=" row m-portlet m--bg-accent m-portlet--bordered-semi m-portlet--skin-dark m-portlet--full-height " style="padding-bottom: 30px;">
							<div class="col-md-6" >
								<div class="m-portlet__head">
								</div>
									<div class="m-portlet__body" style="border-right: 1px solid white">
										<!--begin::Widget 7-->
										<div class="m-widget7 m-widget7--skin-dark">
											<div class="m-widget7__desc">
												<b>
												<?php if($ilan->onay==1){?>
										        	İlanınız yayına alınmıştır.
												<?php }else{?>
										        	İlanınızı kontrol ettikten sonra yayına alacağız.
												<?php }?>
												</b>
												<br>
								        <div class="ad_post_icons post_icon_valid">İlanınızla ilgili durumu
													<br>
													<a  class="btn  btn-block w-100 " style="background:transparent;font-size: 1.3rem; " href="<?php echo base_url(); ?>hesabim/anasayfa">
														İlanlarım
													</a> bölümünden takip edebilirsiniz.
												</div>
												<br>
												<div class="m-widget7__button">
														<a class="m-btn m-btn--pill btn btn-danger" href="<?php echo base_url(); ?>ilan/<?php echo $ilan->seo_url; ?>-<?php echo $ilanId; ?>" role="button">İlanı incele</a>
												</div>
												<b>
													<div class="ad_id_box">
														İlan no :<?php echo $ilanId; ?>
													</div>
												</b>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
								<div class="m-portlet__head">
								</div>
								<div class="m-portlet__body">
									<!--begin::Widget 7-->
									<div class="m-widget7 m-widget7--skin-dark">
										<div class="m-widget7__desc">
											<div>
												<p style="text-align:center">İlan değerlendirme süreci en fazla 6 saat sürmektedir.
													<br>
													<br>
													Değerlendirme süreci sonunda ticaretmeclisi.com ilan yayınlama kriterlerine uygun bulunan ilanlar yayına alınacaktır.
												</p>
											</div>
											<div class="m-widget7__button">
													<a class="m-btn m-btn--pill btn btn-danger" href="<?php echo base_url(); ?>hesabim/anasayfa" role="button">Hesabım</a>
											</div>
										</div>
										<div class="m-widget7__user">
											<div class="m-widget7__user-img">
													<img class="m-widget7__img" src="<?php echo base_url(); ?>assets/app/media/img//users/100_3.jpg" alt="">
											</div>
											<!-- <div class="m-widget7__info">
												<span class="m-widget7__username">
														İlan Yayınlanma Süresi 3 Ay
												</span>
												<br>
												<span class="m-widget7__time">
												</span>
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4">
						<!--begin:: Widgets/Sales States-->
						<div class="m-portlet m-portlet--full-height ">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Doping Nedir?
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									<ul class="m-portlet__nav">
										<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
											<a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl">
												<i class="fa fa-genderless m--font-brand"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="m-portlet__body">
									<div class="m-widget6">
										<br>
										<br>
										<br>
										<br>
										<div>Doping Nedir?</div>
											Doping, ticaretmeclisi.com ziyaretçilerinin ilanınıza bakma oranını kat kat arttırmakta kullanılan yöntemlere verilen isimdir.
											<ul >
												<li><a href="index.php?page=sayfa&sayfa=doping">> Doping Nedir?</a></li>
												<li><a href="index.php?page=sayfa&sayfa=doping-cesitleri">> Doping Çeşitleri</a></li>
											</ul>
											<div class="m-widget19__action">
													<a href="<?php echo base_url() ?>doping/ilan/<?php echo $ilanId; ?>" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">Doping Satın Al</a>
											</div>
										</div>
									</div>
								</div>
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
