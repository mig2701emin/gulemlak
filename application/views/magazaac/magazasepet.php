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
			<div class=" row d-flex justify-content-center" style="margin:50px 0 50px 0;">
        <div class="col-sm-12 col-md-2 col"><a class="btn" style="color:mediumseagreen"><i class="far fa-thumbs-up"></i> Paket Seçimi</a> <br></div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-file"></i> Mağaza Tipi </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-camera"></i> İçerik </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:mediumseagreen"><i class="fas fa-tags"></i>  Doping Al </a>	</div>
        <div class="col-sm-12 col-md-2"><a class="btn" style="color:lightgray"><i class="fas fa-check-circle"></i> Tebrikler </a>	</div>
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
						<?php $siparis=$this->session->userdata("siparis") ; ?>
						<tr>
							<td><?php echo $siparis["doping"]; ?></td>
							<td><?php echo $siparis["sure"]; ?> Ay</td>
							<td><?php echo $siparis["tutar"]; ?> TL</td>
						</tr>
						<?php if ($doping == "doping"): ?>
							<?php $d=1; ?>
							<?php foreach ($magaza_dopings as $magaza_doping): ?>
								<?php if ($this->session->userdata("mdoping_".$d)): ?>
									<tr>
										<td><?php echo $magaza_doping->doping; ?></td>
										<td><?php echo $this->session->userdata("mdoping_".$d); ?> Ay</td>
										<td><?php echo $this->session->userdata("mprice_".$d); ?> TL</td>
									</tr>
								<?php endif; ?>
								<?php $d++; ?>
							<?php endforeach; ?>
						<?php endif; ?>
          </tbody>
				</table>
      </div>
      <div >Genel Toplam : <?php if ($doping=="doping") {echo $this->session->userdata("tutar");} else {echo $this->session->userdata("siparis")["tutar"];}?> TL</div>
			<a class="btn btn-info btn-block" href="<?php echo base_url('doping/magazaodeme/'.$magazaId."/".$doping); ?>">Ödeme Yap</a>
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
