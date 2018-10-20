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
			<?php $onay_durum=0; ?>
			<div class="ad_divs" style="width:700px;float:left;">
				<div class="ad_post_icons post_icon1">
				<?php if($onay_durum==1){?>
		        	İlanınız yayına alınmıştır.
				<?php }else{?>
		        	İlanınızı kontrol ettikten sonra yayına alacağız.
				<?php }?>
		    </div>
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
