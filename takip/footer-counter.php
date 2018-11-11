<?php
	if(!isset($_SESSION["login"])){
			header("location: login.php");
		}
?>

<div class="row">
              <div class="col-md-3">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Son Eklenen <small>Satılık Daireler</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<?php
						if($_SESSION["uye_id"] == 1){
							$sorgusat = mysql_query("SELECT * FROM satilik_daire where durum=1 ORDER BY id DESC LIMIT 0,5");	
						}else{
							$sorgusat = mysql_query("SELECT * FROM satilik_daire where durum=1 AND uye_id='".$_SESSION["uye_id"]."' ORDER BY id DESC LIMIT 0,5");	
						}
						
							while($sorgusat2 = mysql_fetch_array($sorgusat)){
					?>
						<article class="media event">
						  <a class="pull-left date">
							<p class="month">April</p>
							<p class="day">23</p>
						  </a>
						  <div class="media-body">
							<a class="title" href="#"><?php echo $sorgusat2["apartman"]?></a>
							<p>Bulunduğu Kat : <?php echo $sorgusat2["kat"]?></p>
							<p>Kapı Numarası :  <?php echo $sorgusat2["kapi_no"]?></p>
							<p>Oda Sayısı : 	<?php echo $sorgusat2["oda"]?></p>
							<p>Metre Karesi :   <?php echo $sorgusat2["mkare"]." m<sup>2 </sup>"?></p>
							<p>Cephe : 			<?php echo $sorgusat2["cephe"]?></p>
							<p>Fiyat : 			<?php echo $sorgusat2["fiyat"]." TL"?></p>
							<?php
								if($_SESSION["uye_id"] == 1){
									echo "<p>Ekleyen : 			".$sorgusat2["ekleyen"]."</p>";
								}
							?>
						  </div>
						</article>
					<?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Son Eklenen <small>Kiralık Daireler</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<?php
							if($_SESSION["uye_id"] == 1){
								$sorgukira = mysql_query("SELECT * FROM kiralik_daire where durum=1 ORDER BY id DESC LIMIT 0,5");
							}else{
								$sorgukira = mysql_query("SELECT * FROM kiralik_daire where durum=1 AND uye_id='".$_SESSION["uye_id"]."' ORDER BY id DESC LIMIT 0,5");
							}
						
							while($sorgukira2 = mysql_fetch_array($sorgukira)){
					?>
						<article class="media event">
						  <a class="pull-left date">
							<p class="month">April</p>
							<p class="day">23</p>
						  </a>
						  <div class="media-body">
							<a class="title" href="#"><?php echo $sorgukira2["apartman"]?></a>
							<p>Bulunduğu Kat : <?php echo $sorgukira2["kat"]?></p>
							<p>Kapı Numarası :  <?php echo $sorgukira2["kapi_no"]?></p>
							<p>Oda Sayısı : 	<?php echo $sorgukira2["oda"]?></p>
							<p>Metre Karesi :   <?php echo $sorgukira2["mkare"]." m<sup>2 </sup>"?></p>
							<p>Cephe : 			<?php echo $sorgukira2["cephe"]?></p>
							<p>Fiyat : 			<?php echo $sorgukira2["fiyat"]." TL"?></p>
							<?php
								if($_SESSION["uye_id"] == 1){
									echo "<p>Ekleyen : 			".$sorgukira2["ekleyen"]."</p>";
								}
							?>
						  </div>
						</article>
					<?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Son Eklenen <small>Arsalar</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<?php
							if($_SESSION["uye_id"] == 1){
								$sorguarsa = mysql_query("SELECT * FROM satilik_arsa where durum=1 ORDER BY id DESC LIMIT 0,5");
							}else{
								$sorguarsa = mysql_query("SELECT * FROM satilik_arsa where durum=1 AND uye_id='".$_SESSION["uye_id"]."' ORDER BY id DESC LIMIT 0,5");
							}
						
							while($sorguarsa2 = mysql_fetch_array($sorguarsa)){
					?>
						<article class="media event">
						  <a class="pull-left date">
							<p class="month">April</p>
							<p class="day">23</p>
						  </a>
						  <div class="media-body">
							<a class="title" href="#"><?php echo $sorguarsa2["ada"]?></a>
							<p>Ada : <?php echo $sorguarsa2["ada"]?></p>
							<p>Parsel :  <?php echo $sorguarsa2["parsel"]?></p>
							<p>İmar Durumu :   <?php echo $sorguarsa2["imar_durumu"]?></p>
							<p>Metre Karesi : 			<?php echo $sorguarsa2["m2"]." m<sup>2 </sup>"?></p>
							<p>Tapu Durumu : 			<?php echo $sorguarsa2["tapu_durumu"]?></p>
							<p>Fiyat : 			<?php echo $sorguarsa2["fiyat"]." TL"?></p>
							<?php
								if($_SESSION["uye_id"] == 1){
									echo "<p>Ekleyen : 			".$sorguarsa2["ekleyen"]."</p>";
								}
							?>
						  </div>
						</article>
					<?php } ?>
                  </div>
                </div>
              </div>
			  
			  <div class="col-md-3">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Son Eklenen <small>Satılık İşyerleri</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					<?php
							if($_SESSION["uye_id"] == 1){
								$sorguisyeri = mysql_query("SELECT * FROM satilik_isyeri where durum=1 ORDER BY id DESC LIMIT 0,5");
							}else{
								$sorguisyeri = mysql_query("SELECT * FROM satilik_isyeri where durum=1 AND uye_id='".$_SESSION["uye_id"]."' ORDER BY id DESC LIMIT 0,5");
							}
							while($sorguisyeri2 = mysql_fetch_array($sorguisyeri)){
					?>
						<article class="media event">
						  <a class="pull-left date">
							<p class="month">April</p>
							<p class="day">23</p>
						  </a>
						  <div class="media-body">
							<a class="title" href="#"><?php echo $sorguisyeri2["apartman"]?></a>
							<p>Bulunduğu Kat : <?php echo $sorguisyeri2["kat"]?></p>
							<p>Kapı Numarası :  <?php echo $sorguisyeri2["kapi_no"]?></p>
							<p>Oda Sayısı : 	<?php echo $sorguisyeri2["oda"]?></p>
							<p>Metre Karesi :   <?php echo $sorguisyeri2["mkare"]." m<sup>2 </sup>"?></p>
							<p>Cephe : 			<?php echo $sorguisyeri2["cephe"]?></p>
							<p>Fiyat : 			<?php echo $sorguisyeri2["fiyat"]." TL"?></p>
							<?php
								if($_SESSION["uye_id"] == 1){
									echo "<p>Ekleyen : 			".$sorguisyeri2["ekleyen"]."</p>";
								}
							?>
						  </div>
						</article>
					<?php } ?>
                  </div>
                </div>
              </div>
			  
            </div>