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
</head>
<body>
	<div class="se-pre-con"></div>
	<div class="main">
		<!-- HEADER START -->
		<?php $this->load->view('layout/headermenu');?>
		<!-- HEADER END -->
		<div class="container">
			<div class=" row d-flex justify-content-center" style="margin:50px 0 50px 0;">
				<div class="col-sm-12 col-md-2 col"><a class="btn" style="color:mediumseagreen"><i class="far fa-thumbs-up"></i> Kategori</a> <br></div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-file"></i> İlan Detay </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-camera"></i> Fotoğraf </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-search"></i>  Ön İzleme </a>	</div>
				<div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-tags"></i>  Doping Al </a>	</div>
				<div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-check-circle"></i> Tebrikler </a>	</div>
			</div>
			<div class="ad_divs" style="width:700px;float:left;">
				<div class="ad_post_icons post_icon1">
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
		       	</div>
				<?php if($doping_al==1 or $ilan_turu==1 or $video==1){?>
					<h2>Ödemeniz Gereken Ücret : <font color="red"><?php echo $tutar; ?> TL</font> TL.</h2>
					<h2>Ödemenizi <strong>Bana Özel > Bekleyen Ödemeler</strong> Menüsünden Yapabilirsiniz.</h2>
					<div style="clear:both"></div>
				<?php }?>
				<?php if($ilan_turu==1 or $onay_durum!=1){?>
		            <div class="ad_post_icons post_icon_valid">İlanınızın "<a href="index.php?page=sayfa&sayfa=yardim&kategori=32">İlan Verme Kuralları</a>"na uygunluğu, uzman ekiplerimiz tarafından kontrol ediliyor.</div>
		            <div class="ad_post_icons post_icon_valid">"<a href="index.php?page=sayfa&sayfa=yardim&kategori=32">İlan Verme Kuralları</a>"na uygun olan ilanları 6 saat içinde yayına alıyoruz.</div>
		            <div class="ad_post_icons post_icon_valid">Güvenlik gereği onay aşamasındaki ilanlara erişim sınırlıdır. Bu nedenle çağrı merkezimizden onay aşamasındaki ilanlarla ilgili yardımcı olamıyoruz. Anlayışınız için teşekkür ederiz.</div>
		            <div class="ad_post_icons post_icon_valid">İlanınız yayınlanmaya başladığında size e-posta yoluyla bilgi vereceğiz.</div>
				<?php }?>
		        <div class="ad_post_icons post_icon_valid">İlanınızla ilgili durumu <a href="index.php?page=banaozel">Bana Özel</a> > <a href="index.php?page=banaozel&type=ilan">İlanlarım</a> bölümünden takip edebilirsiniz.</div>
		        <div class="ad_id_box">Vermiş olduğunuz ilanın numarası <div class="ad_id_box2"><?php echo $ilanId; ?></div></div>
		        <div class="yellow_div">
		            <h2 align="center">Şimdi Neler Yapabilirim?</h2>
		            <div class="ad_post_icons ad_div ad_browse"><a href="">İlanıma gözat</a></div>
		            <div class="ad_post_icons ad_div ad_use_doping"><a href="">İlanıma Doping Yap</a></div>
		            <div class="ad_post_icons ad_div new_ad_text"><a href="">Yeni İlan Ver</a></div>
		        </div>
		        <div class="ad_post_icons doping_time_notice">İlan değerlendirme süreci en fazla 6 saat sürmektedir. Değerlendirme süreci sonunda ticaretmeclisi.com ilan yayınlama kriterlerine uygun bulunan ilanlar yayına alınacaktır.</div>
		    </div>
		    <div class="ad_divs" style="width:230px;margin-left:730px;">
		        <div class="ad_post_icons doping_time_notice" style="font-weight:bold;font-size:12pt;">Doping Nedir?</div>
		        Doping, ticaretmeclisi.com ziyaretçilerinin ilanınıza bakma oranını kat kat arttırmakta kullanılan yöntemlere verilen isimdir.
		        <ul class="whatis_Doping">
		            <li><a href="index.php?page=sayfa&sayfa=doping">> Doping Nedir?</a></li>
		            <li><a href="index.php?page=sayfa&sayfa=doping-cesitleri">> Doping Çeşitleri</a></li>
		        </ul>
		    </div>
		    <div style="clear:both"></div>

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
