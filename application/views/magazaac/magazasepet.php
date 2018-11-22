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
	  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
</head>
<body class="color_bg1">
	<div class="se-pre-con"></div>
	<div class="main">
	<!-- HEADER START -->
	<?php $this->load->view('layout/newuserheader');?>
	<!-- HEADER END -->
	<div class="container mt-3 mb-3">
		<div class="row d-flex justify-content-center" style="margin-top: 50px;margin-bottom: 50px;">
			<div class="col-sm-12 col-md-2 col"><a class="btn" style="font-weight:bold;">  Paket Seçimi</a> <br></div>
			<div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;">  Mağaza Tipi </a>	</div>
			<div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;"> İçerik </a>	</div>
			<!-- <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;" >  Ön İzleme </a>	</div> -->
			<div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;">  Doping Al </a>	</div>
			<div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;color: orangered;"><i class="fas fa-caret-right"></i> Tebrikler </a>	</div>
		</div>
		<div class="jumbotron">
			<h3>Sepetiniz</h3>
			<p>Seçmiş olduğunuz dopinglerin ödemelerini tamamlamak için "Ödeme Yap" butonuna tıklayınız. Aksi takdirde ödemeniz tamamlanmayacaktır.</p>

		</div>
      <div>
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
							<?php $magaza_dopings=$this->db->where("type","0")->get('dopingler')->result(); ?>
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
		<?php $this->load->view('layout/footeruserpanel');?>
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
