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



</head>
<body>
	<div class="se-pre-con"></div>
	<div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
      <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="container" >
          <div class="row d-flex justify-content-center" style="margin-top: 50px;margin-bottom: 50px;">
            <div class="col-sm-12 col-md-2 col"><a class="btn" style="font-weight:bold;"> Kategori</a> <br></div>
            <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;"> İlan Detay </a>	</div>
            <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;"> Fotoğraf </a>	</div>
            <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;" >  Ön İzleme </a>	</div>
            <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;">  Doping Al </a>	</div>
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
                            <?php if($ilan_turu==1 or $video==1){?>
                                Ödemenizi yaptığınızda ilanınızı yayına alacağız.
                            <?php }elseif($doping_al==1){?>
                                <?php if($onay_durum==1){?>
                                    İlanınız yayına alınmıştır.
                                <?php }else{?>
                                    İlanınızı kontrol ettikten sonra yayına alacağız.
                                <?php }?>
                                Ödemenizi yaptığınızda dopingleriniz aktifleştirilecektir.
                            <?php }elseif($onay_durum==1){?>
                                İlanınız yayına alınmıştır.
                            <?php }else{?>
                                İlanınızı kontrol ettikten sonra yayına alacağız.
                            <?php }?>
													</b>
													<br>
													<?php if($doping_al==1 or $ilan_turu==1 or $video==1){?>
                            <h2>Ödemeniz Gereken Ücret : <font color="red"><?php echo $tutar; ?> </font> TL.</h2>
                            <h2>Ödemenizi <strong>Bana Özel > Bekleyen Ödemeler</strong> Menüsünden Yapabilirsiniz.</h2>
                          <?php }?>
                          <br>
                          <?php if($ilan_turu==1 or $onay_durum!=1){?>
                            <div class="ad_post_icons post_icon_valid">İlanınızın "<a href="index.php?page=sayfa&sayfa=yardim&kategori=32">İlan Verme Kuralları</a>"na uygunluğu, uzman ekiplerimiz tarafından kontrol ediliyor.</div>
                            <div class="ad_post_icons post_icon_valid">"<a href="index.php?page=sayfa&sayfa=yardim&kategori=32">İlan Verme Kuralları</a>"na uygun olan ilanları 6 saat içinde yayına alıyoruz.</div>
                            <div class="ad_post_icons post_icon_valid">Güvenlik gereği onay aşamasındaki ilanlara erişim sınırlıdır. Bu nedenle çağrı merkezimizden onay aşamasındaki ilanlarla ilgili yardımcı olamıyoruz. Anlayışınız için teşekkür ederiz.</div>
                            <div class="ad_post_icons post_icon_valid">İlanınız yayınlanmaya başladığında size e-posta yoluyla bilgi vereceğiz.</div>
                          <?php }?>
	                        <br>
                          <div class="ad_post_icons post_icon_valid">İlanınızla ilgili durumu
														<br>
                            <a  class="btn  btn-block w-100 " style="background:transparent;font-size: 1.3rem; " href="<?php echo base_url(); ?>hesabim/anasayfa">
															İlanlarım
														</a> bölümünden takip edebilirsiniz.
													</div>
													<br>
                          <div class="m-widget7__button">
                              <a class="m-btn m-btn--pill btn btn-danger" href="<?php echo base_url(); ?>ilan/<?php echo $ilan->seo_url; ?>-<?php echo $ilan->Id; ?>" role="button">İlanı incele</a>
                          </div>
                          <b>
														<div class="ad_id_box">
															İlan no :<?php echo $ilan->ilanId; ?>
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
                            <a href="<?php echo base_url() ?>doping/ilan/<?php echo $ilan->Id; ?>" class="btn m-btn--pill btn-secondary m-btn m-btn--hover-brand m-btn--custom">Doping Satın Al</a>
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
    <?php $this->load->view('layout/footer');?>
<style>
  .custom-checkbox .custom-control-input:disabled:checked ~ .custom-control-label::before {
       background-color: #007bff;
  }
</style>
</body>
</html>
