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
<body class="color_bg1">
	<div class="se-pre-con"></div>
	<div class="main">
		<!-- HEADER START -->
		<?php $this->load->view('layout/headermenu');?>
		<!-- HEADER END -->
		<div class="container">
			<div class="row d-flex justify-content-center" style="margin-top: 50px;margin-bottom: 50px;">
		      <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold;">  Kategori</a> <br></div>
		      <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold;"> İlan Detay </a>	</div>
		      <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold;"> Fotoğraf </a>	</div>
		      <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold;" >  Ön İzleme </a>	</div>
		      <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;color: orangered"><i class="fas fa-caret-right"></i>  Doping Al </a>	</div>
		      <div class="col-sm-12 col-md-2 d-none d-sm-block"><a class="btn" style="font-weight:bold"> Tebrikler </a>	</div>
		  </div>
			<div class="genelbox">Sepetiniz</div>
      <div>
        <p>Seçmiş olduğunuz dopinglerin ödemelerini tamamlamak için "Ödeme Yap" butonuna tıklayınız. Aksi takdirde ödemeniz tamamlanmayacaktır.</p>
        <table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Açıklama</th>
							<th>Süre</th>
							<th>Fiyat</th>
						</tr>
					</thead>
          <tbody>
						<?php $d=1; ?>
						<?php foreach ($dopings as $ilan_doping): ?>
							<?php if ($this->session->userdata("idoping_".$d)): ?>
								<tr>
									<td><?php echo $ilan_doping->doping; ?></td>
								<?php if ($ilan_doping->doping=="Kalın Yazı & Renkli Çerçeve" || $ilan_doping->doping=="Küçük Fotoğraf" || $ilan_doping->doping=="Güncelim"): ?>
										<td><?php if ($ilan_doping->doping=="Güncelim") {	echo "1 Kullanımlık";	} else {echo "İlan yayın süresince";}?></td>
								<?php else: ?>
										<td><?php echo $this->session->userdata("idoping_".$d);?> Ay</td>
								<?php endif; ?>
								<td><?php echo $this->session->userdata("iprice_".$d); ?> TL</td>
							</tr>
							<?php endif; ?>
							<?php $d++; ?>
						<?php endforeach; ?>
          </tbody>
				</table>
      </div>
      <div>Genel Toplam : <?php echo $this->session->userdata("tutar"); ?> TL</div>
			<a class="btn btn-info btn-block" href="<?php echo base_url('doping/ilanodeme/'.$ilanId); ?>">Ödeme Yap</a>
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
