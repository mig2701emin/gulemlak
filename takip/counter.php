<?php 
		if(!isset($_SESSION["login"])){
			header("location: login.php");
		}
 ?>
<div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
               <a href="sonuc-sat-hepsi.php"><div class="tile-stats">
                  <div class="icon"><i class="fa fa-institution"></i></div>
                  <div class="count">
						<?php
							if($_SESSION["uye_id"] == 1){
								$a = mysql_query("SELECT * FROM satilik_daire WHERE durum=1");
							}else{
								$a = mysql_query("SELECT * FROM satilik_daire WHERE durum=1 AND uye_id='".$_SESSION["uye_id"]."'");
							}
							
								$a1= mysql_num_rows($a);
								echo $a1;
						?>
				  </div>
                  <h3>Satılık Daire</h3>
                  <p>Tüm Satılık Daireler</p>
                </div></a>
              </div>
			  
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="sonuc-kira-hepsi.php"><div class="tile-stats">
                  <div class="icon"><i class="fa fa-building"></i></div>
                  <div class="count">
						<?php
							if($_SESSION["uye_id"] == 1){
								$b = mysql_query("SELECT * FROM kiralik_daire WHERE durum=1");
							}else{
								$b = mysql_query("SELECT * FROM kiralik_daire WHERE durum=1 AND uye_id='".$_SESSION["uye_id"]."'");
							}
							
								$b1= mysql_num_rows($b);
								echo $b1;
						?>
				  </div>
                  <h3>Kiralık Daire</h3>
                  <p>Tüm Kiralık Daireler</p>
                </div></a>
              </div>
			  
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="sonuc-arsa-hepsi.php"><div class="tile-stats">
                  <div class="icon"><i class="fa fa-tree"></i></div>
                  <div class="count">
						<?php
							if($_SESSION["uye_id"] == 1){
								$c = mysql_query("SELECT * FROM satilik_arsa WHERE durum=1");
							}else{
								$c = mysql_query("SELECT * FROM satilik_arsa WHERE durum=1 AND uye_id='".$_SESSION["uye_id"]."'");
							}
							
								$c1= mysql_num_rows($c);
								echo $c1;
						?>
				  </div>
                  <h3>Satılık Arsalar</h3>
                  <p>Tüm Satılık Arsalar</p></a>
                </div><a href="sonuc-arsa-hepsi.php">
              </div>
			  
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="sonuc-is-yeri-sat-hepsi.php"><div class="tile-stats">
                  <div class="icon"><i class="fa fa-tree"></i></div>
                  <div class="count">
						<?php
							if($_SESSION["uye_id"] == 1){
								$d = mysql_query("SELECT * FROM satilik_isyeri WHERE durum=1");
							}else{
								$d = mysql_query("SELECT * FROM satilik_isyeri WHERE durum=1 AND uye_id='".$_SESSION["uye_id"]."'");
							}
							
								$d1= mysql_num_rows($d);
								echo $d1;
						?>
				  </div>
                  <h3>Satılık İşyeri</h3>
                  <p>Tüm Satılık İşyerleri</p></a>
                </div>
              </div>
			  
            </div>