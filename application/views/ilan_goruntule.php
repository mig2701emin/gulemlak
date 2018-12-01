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
	<meta name="description" content="<?php echo trSubstr(strip_tags(base64_decode($ilan->aciklama))); ?>"/>
	<meta property="og:site_name" content="www.ticaretmeclisi.com" />
	<meta property="og:title" content="<?php echo $ilan->firma_adi; ?>" />
	<meta property="og:description" content="<?php echo trSubstr(strip_tags(base64_decode($ilan->aciklama))); ?>" />
	<meta property="og:image" itemprop="image" content="<?php echo base_url(); ?>photos/big/<?php echo ilk_resim($ilan->Id); ?>"/>
	<meta property="og:image:secure_url" content="<?php echo base_url(); ?>photos/big/<?php echo ilk_resim($ilan->Id); ?>" />
	<meta property="og:type" content="website" />


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
		/* background-color: #f2eeee; */
		font-size: 0.9em;
	}
	.mar-bot2{
		border-bottom:1px solid lightgray ;
		/*line-height:30px;*/
		font-size: 0.7em;
	}
	.resimbuton:hover{
		background-color: #fff !important;
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
		background-color: #855858;
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
	  margin: 3px 10px;
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
	  padding: 6px;
	  font-size: 0.8em;
		 transform: skewX(15deg);
		 text-decoration:none;
		 color: #444;
		font-weight: 300;
	}
	.cont_breadcrumbs_1 > ul > li:last-child {
	  /* background-color: #78909C; */
	  background-color: #2a62bc;
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
    font-size: 13px;
    font-weight: 600;
    line-height: 1;
    color: #000;
    text-align: left;
    white-space: nowrap;
    vertical-align: middle;
    /* background-color: white; */
    /* background-color: #F5F5F5; */
    border-radius: 10px;
    margin-top: 2px;
    float: left !important;
    font-family: 'Open Sans';
}
.bilgiler {
    display: inline-block;
    min-width: 10px;
    padding: 6px 7px;
    font-size: 13px;

    line-height: 1;
    color: #000;
    text-align: left;
    white-space: nowrap;
    vertical-align: middle;
    /* background-color:#efecd9; */
    /* background-color: #D7CCC8; */
    border-radius: 10px;
    margin-top: 2px;
    float: left !important;
    font-family: 'Open Sans';
}
.linkler {
    /* display: inline-block; */
    /* min-width: 10px; */
    /* padding: 6px 7px; */
    font-size: 0.7em;
    /* font-weight: 700; */
    /* line-height: 1; */
    /* color: white; */
    /* text-align: left; */
    /* white-space: nowrap; */
    /* vertical-align: middle; */
    /* background-color: #bccece; */
    /* border-radius: 10px; */
    /* margin-top: 2px; */
    /*float: left !important;*/
}



	</style>
	<link href="<?php echo base_url('assets'); ?>/light/lightgallery.css" rel="stylesheet">
</head>





                        <body >
                        <div class="se-pre-con"></div>
                        <div class="main">
                            <?php $this->load->view('layout/header');?>
                            <!-- HEADER END -->
                            <div class="container  mb-30">
                                <div class="row p-1">
                                    <div class="col-12">
                                        <div class="row">


						<?php if (isset($kategorinames)){ ?>
							<div class="col-lg-6 col-md-6 col-12">
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
						<div class="col-lg-5 col-md-6 col-12">
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
						<div class="col-lg-1 hidden-md hidden-sm-down">
						</div>
					</div>
				</div>
			</div>
			<?php if ($this->session->userdata("userData")["userID"] == $ilan->uyeId): ?>
                <div class="row p-1">
                    <div class="col-12 ">
						<p class="text text-danger"><?php echo $ilan->ilan_notu; ?></p>
					</div>
				</div>
			<?php endif; ?>


                <div class="row pt-1 pb-1 pl-1">
                    <div class="col-lg-9 col-md-12">
						<div class="row">

                            <div class="col-12 mb-1 mt-1">

                                    <h3  style="    color: #1f1f2f;
    font-size: 17px;
    font-weight: 700;

    line-height: 18px;
    display: inline-block;
    text-transform: uppercase;
    font-family: 'Montserrat', sans-serif"><?php echo $ilan->firma_adi; ?></h3>

                            </div>
						<div class="col-12 col-sm-12 col-md-8 col-lg-8 ">
							<div class="row text-center">




								<div id="demo" class="carousel slide col-12" data-ride="carousel" style="    padding-left: 0px;padding-right: 0px;">
									<!-- The slideshow -->
									<div class="carousel-inner">
										<?php if (count($resimler) > 0): ?>
											<?php $r=1; ?>
											<?php foreach ($resimler as $resim): ?>
												<?php if(file_exists('photos/big/'.$resim->name)){?>
													<div class="carousel-item<?php if ($r==1) {echo ' active';} ?>">
														<img src="<?php echo base_url('photos/big/'.$resim->name); ?>" alt="<?php echo $ilan->firma_adi ?>" class="img-rounded">
													</div>
						            <?php }?>
												<?php $r++; ?>
											<?php endforeach; ?>
										<?php else: ?>
											<div class="carousel-item active">
												<img src="<?php echo base_url('assets/images/yok.png'); ?>" alt="<?php echo $ilan->firma_adi ?>" class="img-rounded">
											</div>
										<?php endif; ?>
									</div>
                                    <div class="col-12" style="position:absolute;top: 0px;">

                                            <div class="col-12 text-white " style="border-right:white 2px solid;">

                                                <div class="float-right p-1" style="font-size: 12px;height:30px;background-color: #0040a5;">İlan No:   <?php echo $ilan->ilanId; ?></div>
                                            </div>


                                    </div>
                                    <div class="col-12" style="position:absolute;bottom: 0px; left: 0; background-color:#e12222; width:170px;opacity: 0.7;z-index: 9999">
                                        <b><a id="bigImage" style="font-weight: 600;font-size: 12px;color: white"><i class="fas fa-search-plus"></i> BÜYÜK RESİM</a></b>
                                    </div>
									<!-- Left and right controls -->
									<a class="carousel-control-prev" href="#demo" data-slide="prev" style="left:15px;">
										<span class="carousel-control-prev-icon"></span>
									</a>
									<a class="carousel-control-next" href="#demo" data-slide="next" style="right:15px;">
										<span class="carousel-control-next-icon"></span>
									</a>
								</div>

								<div id="corusel" class="col-12">
									<div class="row">
										<?php if (count($resimler) > 0): ?>
											<?php foreach ($resimler as $resim){ ?>
												<?php if (file_exists('photos/big/'.$resim->name)): ?>
													<div class="col-4 col-md-3 col-lg-2 m-0 p-1">
													<a><img src="<?php echo base_url('photos/thumbnail/'.$resim->name); ?>" class="img-rounded" style="border-radius:15px;background-color:#EFEBE9"  alt="<?php echo $ilan->firma_adi ?>"></a>
													</div>
												<?php endif; ?>
											<?php } ?>
										<?php else: ?>
											<div class="col-4 col-md-3 col-lg-2 m-0 p-1">
											<a><img src="<?php echo base_url('assets/images/yok_thumbnail.png'); ?>" class="img-rounded" style="border-radius:15px;background-color:#EFEBE9"  alt="<?php echo $ilan->firma_adi ?>"></a>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<div class="demo-gallery" style="display: none;">
									<row id="lightgallery" class="list-unstyled row">
										<?php if (count($resimler) > 0): ?>
											<?php $r=1; ?>
											<?php foreach ($resimler as $resim){ ?>
												<?php if (file_exists('photos/big/'.$resim->name)): ?>
													<div class="col-4 col-sm-6 col-md-4" data-responsive="<?php echo base_url('photos/big/'.$resim->name); ?> 375, <?php echo base_url('photos/big/'.$resim->name); ?> 480, <?php echo base_url('photos/big/'.$resim->name); ?> 800" data-src="<?php echo base_url('photos/big/'.$resim->name); ?>" data-sub-html="<h4 class='text-success'><?php echo $ilan->firma_adi; ?></h4><p></p>">
														<a href="">
															<img <?php if ($r==1) {echo ' id="lightImg" ';} ?> class="img-responsive" style="border-radius:20px;" src="<?php echo base_url('photos/big/'.$resim->name); ?>" alt="<?php echo $ilan->firma_adi ?>">
														</a>
													</div>
													<?php $r++; ?>
												<?php endif; ?>
											<?php } ?>
										<?php else: ?>
											<div class="col-4 col-sm-6 col-md-4" data-responsive="<?php echo base_url('assets/images/yok_b.png'); ?> 375, <?php echo base_url('assets/images/yok_b.png'); ?> 480, <?php echo base_url('assets/images/yok_b.png'); ?> 800" data-src="<?php echo base_url('assets/images/yok_b.png'); ?>" data-sub-html="<h4 class='text-success'><?php echo $ilan->firma_adi; ?></h4><p></p>">
												<a href="">
													<img  id="lightImg" class="img-responsive" style="border-radius:20px;" src="<?php echo base_url('assets/images/yok_b.png'); ?>" alt="<?php echo $ilan->firma_adi ?>">
												</a>
											</div>
										<?php endif; ?>
									</row>
								</div>

							</div>
						</div>
						<div id="genelBilgi" class="col-12 col-sm-12 col-md-4 col-lg-4 bg-light">
							<div class="row">




								<div class="col-12">
									<div class="row " style="min-height:30px;">
										<div class="col-6 " style="font-weight:600;background-color:#ff7e7e;color:white;border-right: white 1px solid">
											Fiyat
										</div>
										<div class="col-6" style="font-weight: 600 ;background-color:#ff7e7e;color:white">
											<?php echo number_format($ilan->fiyat,0, ',', '.');?> <?php echo $ilan->birim;?>
										</div>
									</div>
								</div>

								<?php
								echo $show_fields;
								?>
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
                                <div class="col-12 pt-3">
                                    <!-- AddToAny BEGIN -->
                                    <div class="a2a_kit a2a_kit_size_32 a2a_default_style text-center align-center">
                                        <div style="    width: 200px;
    height: 32px;
    float: right;">
                                            <a class="a2a_button_facebook"></a>
                                            <a class="a2a_button_twitter"></a>
                                            <a class="a2a_button_google_plus"></a>
                                            <a class="a2a_button_pinterest"></a>
                                            <a class="a2a_button_whatsapp"></a>
                                        </div></div>
                                    <script>
                                        var a2a_config = a2a_config || {};
                                        a2a_config.locale = "tr";
                                    </script>
                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                    <!-- AddToAny END -->
                                </div>
                                <div class="col-12" style="min-height:50px">
                                    <div class="row  p-1">
                                        <div class="col-5 text-center">
                                            Favori
                                            <p class="text-center"><span class="badge badge-pill color_bg3 text-light"><?php echo $this->db->query("select * from favoriler where ilanId='".$ilan->Id."'")->num_rows(); ?></span></p>
                                        </div>
                                        <div class="col-7 text-center">
                                            Görüntülenme
                                            <p class="text-center"><span class="badge badge-pill color_bg3 text-light"><?php echo $ilan->toplam_ziyaretci;?></span></p>
                                        </div>
                                    </div>
                                </div>
							</div>
						</div>
					</div>
					<div class="row " style="border-bottom: ghostwhite 1px solid;">
						<div class="col-12">
							<div class="row">
								<div class="col-12 text-center  p-3 pt-5" style="    color: #1f1f2f;
    font-size:15px;
    font-weight: 700;

    display: inline-block;

    font-family: 'Montserrat', sans-serif;">
									<?php echo base64_decode($ilan->aciklama); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row" style="border-bottom: ghostwhite 1px solid;">
						<div class="col-12">
							<div class="row p-3" style="    color: #1f1f2f;
    font-size: 12px;
    font-weight: 700;



    font-family: 'Montserrat', sans-serif;">
								<?php
								echo $show_additional_fields;
								?>
							</div>
						</div>
					</div>
					<?php if ($ilan->map): ?>
						<div class="row pt-3 mb-3">
							<div class="col-12" id="gmap" style="width:100%;height:400px;"></div>
						</div>
					<?php endif; ?>
				</div>
          <div class="col-lg-3 col-md-12">
              <div class="row pl-3 pr-3">
                  <div class="col-lg-12 col-md-6 col-12 ">
                      <div class="row text-center pt-3">
								<?php if (isset($ilanmagaza)){ ?>
									<div class="col-12"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="<?php echo base_url().$ilanmagaza->username; ?>"><strong><?php echo $ilanmagaza->magazaadi; ?></strong></a></div>
									<div class="col-12">
										<a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="<?php echo base_url().$ilanmagaza->username; ?>">
											<img class="img-responsive" style="border-radius:20px;" src="<?php if ($ilanmagaza->logo) {echo base_url('photos/magaza/').$ilanmagaza->logo;} else {echo base_url('assets/images/company/c1.png');}?>" alt="<?php echo $ilanmagaza->magazaadi; ?>">
										</a>
									</div>
									<div class="col-12 mar-bot">Yetkili:<br/><strong><?php echo $ilansahibi->ad." ".$ilansahibi->soyad; ?></strong></div>
								<?php }else{ ?>
									<div class="col-12"><h3><?php echo $ilansahibi->ad." ".$ilansahibi->soyad; ?></h3></div>
									<div class="col-12">
										<img class="img-responsive" style="border-radius:20px;" src="<?php if ($ilansahibi->picture) {echo $ilansahibi->picture;} else {echo base_url('assets/images/picto_profil.png');}?>" alt="<?php echo $ilansahibi->ad." ".$ilansahibi->soyad; ?>">
									</div>
								<?php } ?>
									<div class="col-12 mar-bot">Üyelik Tarihi:<br/><strong><?php yeni_tarih($ilansahibi->kayit_tarihi); ?></strong></div>
									<?php if ($ilan->yayinla==1){ ?>
										<div class="col-12 pl-0 pr-0">Cep Telefonu:<br/><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="tel:<?php echo '+90'.$ilansahibi->gsm; ?>"><strong><?php echo "0 (".substr($ilansahibi->gsm,0,3).") ".substr($ilansahibi->gsm,3,3)." ".substr($ilansahibi->gsm,6,2)." ".substr($ilansahibi->gsm,8,2); ?></strong></a></div>
										<?php if ($ilansahibi->istel!="" && $ilansahibi->istel!=null): ?>
											<div class="col-12 pl-0 pr-0">İş Telefonu:<br/><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="tel:<?php echo '+90'.$ilansahibi->istel; ?>"><strong><?php echo "0 (".substr($ilansahibi->istel,0,3).") ".substr($ilansahibi->istel,3,3)." ".substr($ilansahibi->istel,6,2)." ".substr($ilansahibi->istel,8,2); ?></strong></a></div>
										<?php endif; ?>
									<?php } ?>
							</div>
						</div>
						<div class="col-lg-12 col-md-6 col-12">
							<div class="row text-center">
								<?php if($this->session->userdata("userData")["userID"] == $ilan->uyeId){?>
								<div class="col-12 pl-0 pr-0"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="<?php echo base_url(); ?>hesabim/ilanduzenle/<?php echo $ilan->Id; ?>">İlanı Düzenle</a></div>
								<div class="col-12 pl-0 pr-0"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="<?php echo base_url(); ?>hesabim/samekategoriilan/<?php echo $ilan->Id; ?>">Aynı Kategoride İlan Ver</a></div>
								<div class="col-12 pl-0 pr-0"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="<?php echo base_url(); ?>doping/ilan/<?php echo $ilan->Id; ?>">Doping Yap</a></div>
								<?php if($ilan->onay==1){?>
								<div class="col-12 pl-0 pr-0"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="<?php echo base_url(); ?>hesabim/ilandurdur/<?php echo $ilan->Id; ?>">Yayından Kaldır</a></div>
								<?php }else{?>
								<div class="col-12 pl-0 pr-0"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="<?php echo base_url(); ?>hesabim/ilansil/<?php echo $ilan->Id; ?>" onclick="return window.confirm('İlanı Yayından Kaldırmak İstediğinizden Eminmisiniz?');">Sil</a></div>
								<?php }?>
								<?php if($ilan->suresi_doldu==1 || $ilan->onay==2){?>
								<div class="col-12 pl-0 pr-0"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="<?php echo base_url(); ?>hesabim/<?php if($ilan->suresi_doldu==1){?>ilansureuzat/<?php }else{?>ilanaktiflestir/<?php }?><?php echo $ilan->Id;?>">Yayına Al</a></div>

								<?php }else{?>
								<div class="col-12 pl-0 pr-0"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="<?php echo base_url(); ?>hesabim/guncelle/<?php echo $ilan->Id; ?>">Güncelim</a></div>
							<?php }}else{?>
								<?php
								if(isset($ilanmagaza)){
								?>

								<div class="col-12 pl-0 pr-0 mb-1"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="<?php echo base_url().$ilanmagaza->username; ?>">Üyenin Mağazası</a></div>
								<div class="col-12 pl-0 pr-0 mb-1"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="<?php echo base_url().$ilanmagaza->username; ?>">Diğer İlanları</a></div>
								<?php }?>

								<?php if ($this->session->userdata("userData")["userID"]){ ?>
									<?php $favsor = $this->db->query("select * from favoriler where ilanId='".$ilan->Id."' and uyeId='".$ilansahibi->Id."'");
									$favsorgu=$favsor->num_rows();
									if($favsorgu==0){
									?>
									<div class="col-12 pl-0 pr-0 mb-1"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" id="favorilink" href="javascript:favori();">Favorilerime Ekle</a></div>
									<?php }else{?>
									<div class="col-12 pl-0 pr-0 mb-1"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" id="favorilink" href="javascript:favorisil();">Favorilerimden Sil</a></div>
									<?php }?>
								<!-- <div class="col-12 pl-0 pr-0 mb-1"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="javascript:mesaj_gonder(<?php echo $ilan->uyeId;?>,<?php echo $ilan->Id;?>);">Mesaj Gönder</a></div>
								<div class="col-12 pl-0 pr-0 mb-1"><a class="btn btn-outline-info btn-block ml-0 mr-0 linkler" href="javascript:sikayet();">Şikayet Et</a></div> -->

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
		$('#corusel>div>div>a').click(function () {
           console.log($('#corusel>div>div>a').index(this));
           var indexnum=$('#corusel>div>div>a').index(this);
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
<script src="https://maps.google.com/maps/api/js?key=AIzaSyAgvcI5F7yEbzhTlj3HHwj7vnTZgQIdfqA&sensor=false"></script>
<script src="<?php echo base_url(); ?>assets/map/map_show.php?currentlatlong=<?php echo base64_encode($ilan->map);?>" defer></script>
<style>
  .custom-checkbox .custom-control-input:disabled:checked ~ .custom-control-label::before {
       background-color: #007bff;
  }
</style>
</body>
</html>
