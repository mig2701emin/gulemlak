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
	<style>
	/* The container */
	.radyocontainer {
	    display: block;
	    position: relative;
	    padding-left: 35px;
	    margin-bottom: 12px;
	    cursor: pointer;
	    /*font-size: 22px;*/
	    -webkit-user-select: none;
	    -moz-user-select: none;
	    -ms-user-select: none;
	    user-select: none;
			/*float:left;*/
	}

	/* Hide the browser's default radio button */
	.radyocontainer input {
	    position: absolute;
	    opacity: 0;
	    cursor: pointer;
	}

	/* Create a custom radio button */
	.checkmark {
	    position: absolute;
	    top: 0;
	    left: 0;
	    height: 25px;
	    width: 25px;
	    background-color: #eee;
	    border-radius: 50%;
	}

	/* On mouse-over, add a grey background color */
	.radyocontainer:hover input ~ .checkmark {
	    background-color: #ccc;
	}

	/* When the radio button is checked, add a blue background */
	.radyocontainer input:checked ~ .checkmark {
	    background-color: #2196F3;
	}

	/* Create the indicator (the dot/circle - hidden when not checked) */
	.checkmark:after {
	    content: "";
	    position: absolute;
	    display: none;
	}

	/* Show the indicator (dot/circle) when checked */
	.radyocontainer input:checked ~ .checkmark:after {
	    display: block;
	}

	/* Style the indicator (dot/circle) */
	.radyocontainer .checkmark:after {
	 	top: 9px;
		left: 9px;
		width: 8px;
		height: 8px;
		border-radius: 50%;
		background: white;
	}
	</style>
</head>
<body class="color_bg1">
	<div class="se-pre-con"></div>
	<div class="main">
	<!-- HEADER START -->
	<?php $this->load->view('layout/newuserheader');?>
	<!-- HEADER END -->
	<div class="container" style="margin-top: 50px; margin-bottom: 100px;">
	  <div class="row d-flex justify-content-center" style="margin-top: 50px;margin-bottom: 50px;">
	      <div class="col-sm-12 col-md-2 col"><a class="btn" style="font-weight:bold;">  Kategori</a> <br></div>
	      <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;"> İlan Detay </a>	</div>
	      <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;"> Fotoğraf </a>	</div>
	      <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;" >  Ön İzleme </a>	</div>
	      <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold;color: orangered"><i class="fas fa-caret-right"></i>  Doping Al </a>	</div>
	      <div class="col-sm-12 col-md-2"><a class="btn" style="font-weight:bold"> Tebrikler </a>	</div>
	  </div>
		<form class="form" action="" method="post">
			<div class="row">
				<input type="hidden" name="gizli" value="1">
				<div class="col-md-12">
        </div>
      </div>
      <div class="row">
	      <div class="col-md-6">
	        <!--begin:: Widgets/Profit Share-->
	        <div class="m-widget14">
            <div class="m-widget14__header">
              <h3 class="m-widget14__title">
                  Daha fazla müşteriye ulaşmak İster misin?
              </h3>
              <span class="m-widget14__desc">Doping alın, ilanınız 10 kata kadar daha fazla görüntülensin.</span>
            </div>
            <div class="row  align-items-center">
              <div class="col">
	              <div id="m_chart_profit_share" class="m-widget14__chart" style="height: 160px">
	                  <div class="m-widget14__stat" style="left:35%">%100</div>
	                  <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-donut" style="width: 100%; height: 100%;">
											<g class="ct-series custom">
												<path d="M144.79,108.314A66.5,66.5,0,0,0,84.619,13.5" class="ct-slice-donut" ct:value="32" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#716aca&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="133.70703125px 133.70703125px" stroke-dashoffset="-133.70703125px" stroke="#716aca">
													<animate attributeName="stroke-dashoffset" id="anim0" dur="1000ms" from="-133.70703125px" to="0px" fill="freeze" stroke="#716aca" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate>
												</path>
											</g>
											<g class="ct-series custom">
												<path d="M33.38,122.389A66.5,66.5,0,0,0,144.888,108.104" class="ct-slice-donut" ct:value="32" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#00c5dc&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="133.93869018554688px 133.93869018554688px" stroke-dashoffset="-133.93869018554688px" stroke="#00c5dc">
													<animate attributeName="stroke-dashoffset" id="anim1" dur="1000ms" from="-133.93869018554688px" to="0px" fill="freeze" stroke="#00c5dc" begin="anim0.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate>
												</path>
											</g>
											<g class="ct-series custom">
												<path d="M84.619,13.5A66.5,66.5,0,0,0,33.528,122.567" class="ct-slice-donut" ct:value="36" ct:meta="{&amp;quot;data&amp;quot;:{&amp;quot;color&amp;quot;:&amp;quot;#ffb822&amp;quot;}}" style="stroke-width: 17px;" stroke-dasharray="150.65414428710938px 150.65414428710938px" stroke-dashoffset="-150.65414428710938px" stroke="#ffb822">
													<animate attributeName="stroke-dashoffset" id="anim2" dur="1000ms" from="-150.65414428710938px" to="0px" fill="freeze" stroke="#ffb822" begin="anim1.end" calcMode="spline" keySplines="0.23 1 0.32 1" keyTimes="0;1"></animate>
												</path>
											</g>
										</svg>
									</div>
	              </div>
                <div class="col">
	                <div class="m-widget14__legends">
	                  <div class="m-widget14__legend">
                      <span class="m-widget14__legend-bullet m--bg-accent"></span>
                      <span class="m-widget14__legend-text">97% Görüntülenme Sayısı</span>
	                  </div>
                    <div class="m-widget14__legend">
                      <span class="m-widget14__legend-bullet m--bg-warning"></span>
                      <span class="m-widget14__legend-text">87% Tıklanma Sayısı</span>
                    </div>
                    <div class="m-widget14__legend">
                      <span class="m-widget14__legend-bullet m--bg-brand"></span>
                      <span class="m-widget14__legend-text">79% İş Yapma Endexi </span>
                    </div>
                  </div>
                </div>
	            </div>
		        </div>
		        <!--end:: Widgets/Profit Share-->
			    </div>
          <div class="col-md-6">
              <img src="<?php echo base_url(); ?>assets/images/doping.svg">
          </div>
          <div class="col-12">
              <span class="h2 text-center">İlan Dopingleri</span>
          </div>
		      <?php $d=1; ?>
		      <?php foreach ($dopings as $ilan_doping): ?>
	          <div class="col-md-6" style="margin-top:25px;margin-bottom: 25px; ">
		          <div class="m-portlet__head-tools">
	              <span class="h5"><?php echo $ilan_doping->doping; ?></span>
	              <p><?php echo $ilan_doping->string; ?></p>
                <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                  <?php if ($ilan_doping->doping=="Kalın Yazı & Renkli Çerçeve" || $ilan_doping->doping=="Küçük Fotoğraf" || $ilan_doping->doping=="Güncelim"): ?>
										<li class="nav-item m-tabs__item">
											<label class="radyocontainer">Hiçbiri
												<input type="radio" name="idoping_<?php echo $d; ?>" value="0" checked="checked">
												<span class="checkmark"></span>
											</label>
											<!-- <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_widget2_tab1_content" role="tab" aria-selected="true">
													Hiçbiri
											</a> -->
										</li>
									<li class="nav-item m-tabs__item">
										<label class="radyocontainer"><?php if ($ilan_doping->doping=="Güncelim") {	echo "1 Kullanımlık";	} else {echo "İlan yayın süresince";}?> ( <?php echo $ilan_doping->ucret; ?> TL )
										  <input type="radio" name="idoping_<?php echo $d; ?>" id="idoping_<?php echo $d; ?>Radio1" value="1">
										  <span class="checkmark"></span>
										</label>
                    <!-- <a class="nav-link m-tabs__link  show" data-toggle="tab" href="#m_widget2_tab1_content" role="tab" aria-selected="true" value="1">
                        <?php //if ($ilan_doping->doping=="Güncelim") {	echo "1 Kullanımlık";	} else {echo "İlan yayın süresince";}?> ( <?php //echo $ilan_doping->ucret; ?> TL )
                    </a> -->
                  </li>
		              <?php else: ?>
										<li class="nav-item m-tabs__item">
											<label class="radyocontainer">Hiçbiri
												<input type="radio"  name="idoping_<?php echo $d; ?>" value="0" checked="checked">
												<span class="checkmark"></span>
											</label>
											<!-- <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_widget2_tab1_content" role="tab" aria-selected="true">
													Hiçbiri
											</a> -->
										</li>
                  <?php for ($i=1; $i < 4; $i++) {?>

                  <li class="nav-item m-tabs__item">
										<label class="radyocontainer"><?php echo $i ?> Ay ( <?php echo $ilan_doping->ucret*$i; ?> TL )
										  <input type="radio" name="idoping_<?php echo $d; ?>" id="idoping_<?php echo $d; ?>Radio<?php echo $i ?>" value="<?php echo $i; ?>">
										  <span class="checkmark"></span>
										</label>
                      <!-- <a class="nav-link m-tabs__link  show" data-toggle="tab" href="#m_widget2_tab1_content" role="tab" aria-selected="true" value="<?php //echo $i; ?>">
                          <?php //echo $i ?> Ay ( <?php //echo $ilan_doping->ucret; ?> TL )
                      </a> -->
                  </li>
                  <?php } ?>
		              <?php endif; ?>
	              </ul>
		          </div>
            </div>
	          <?php $d++; ?>
			      <?php endforeach; ?>
					</div>
          <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6"   style="float: left">
							<button type="submit" class="btn btn-primary btn-block w-75">Devam Et <i class="fas fa-caret-right"></i> </button>
						</div>
          </div>
      </form>
		</div>
		<!-- FOOTER START -->
		<?php $this->load->view('layout/footer');?>
		<!-- FOOTER END -->
	</div>
<style>
  .custom-checkbox .custom-control-input:disabled:checked ~ .custom-control-label::before {
       background-color: #007bff;
  }
</style>
</body>
</html>
