			<?php 
				if(!isset($_SESSION["login"])){
			header("location: index.php");
		}				
			?>
			<div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>HalitUckan Takip</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hoşgeldin,</span>
                <h2>
					<?php 
						$sql_check = mysql_query("select * from yonetici where yonetici_kullanici='".$_SESSION["user"]."'");
							while($user_name = mysql_fetch_assoc($sql_check)){
								echo $user_name['yonetici_ad_soyad'];
							} 
					?>
				</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Yonetici</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Anasayfa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Anasayfa</a></li>
                      
                    </ul>
                  </li>
				  
				  <li><a><i class="fa fa-university"></i> Mülkler <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="sorgu.php">Satılık Daireler</a></li>
                      <li><a href="sorgu-kira.php">Kiralık Daireler</a></li>
					  <li><a href="sorgu-isyeri-sat.php">Satılık İşyerleri</a></li>
                      <li><a href="sorgu-isyeri-kira.php">Kiralık İşyerleri</a></li>
                      <li><a href="sorgu-arsa.php">Satılık Arsalar</a></li>
					  <li><a href="sonuc-talep.php">Talepler</a></li>
                    </ul>
                  </li>
				  <li><a><i class="fa fa-plus"></i> Ekleme <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="daire-ekle.php">Daire Ekle</a></li>
					  <li><a href="is-yeri-ekle.php">İşyeri Ekle</a></li>
					  <li><a href="arsa-ekle.php">Arsa Ekle</a></li>
					  <li><a href="grup-ekle.php">Grup Ekle</a></li>
					  <li><a href="talep-ekle.php">Talep Ekle</a></li>
					  <li><a href="konum-ekle.php">Konum Ekle</a></li>
                    </ul>
                  </li>
				  <li><a><i class="fa fa-trash"></i> Silme <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="grup-degistirme.php">Grup İsimleri Değiştirme</a></li>
					  <li><a href="sonuc-sat-hepsi-deaktif.php">Silinen Satılık Daireler</a></li>
					  <li><a href="sonuc-kira-hepsi-deaktif.php">Silinen Kiralık Daireler</a></li>
					  <li><a href="sonuc-is-yeri-sat-hepsi-deaktif.php">Silinen Satılık İşyerleri</a></li>
					  <li><a href="sonuc-is-yeri-kira-hepsi-deaktif.php">Silinen Kiralık İşyerleri</a></li>
					  <li><a href="sonuc-arsa-hepsi-deaktif.php">Silinen Arsalar</a></li>
					  <li><a href="sonuc-talep-deaktif.php">Silinen Talepler</a></li>
                    </ul>
                  </li>
				  <li><a><i class="fa fa-group"></i> Gruplar <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  
					<li>Satılık Daireler
					<?php
						$grup = mysql_query("SELECT * FROM gruplar ORDER BY Sira");
							while($grup2 = mysql_fetch_array($grup)){
					?>
						<li><a href="sonuc-sat-grup.php?grp-sat=<?php echo $grup2["id"]?>"><?php echo $grup2["grup"]?></a></li>
					<?php } ?></li>
                    </ul>
                  </li>
				  <li><a><i class="fa fa-user"></i> Rehber İşlemleri <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="rehber-listele.php">Rehber Listele</a></li>
					  <li><a href="rehber-ekle.php">Kişi Ekle</a></li>
					  <li><a href="rehber-kat.php">Rehber Kategorisi</a></li>
					  
                    </ul>
                  </li>				  
				  <li><a><i class="fa fa-sitemap"></i> Üyelik İşlemleri <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
					  <li><a href="uye-ekle.php">Üye Ekleme</a></li>
					  <li><a href="sonuc-uye.php">Üye Listesi</a></li>
					  <li><a href="sonuc-uye-deaktif.php">Silinen Üyeler</a></li>
					  
                    </ul>
                  </li>
				  
              </div>
              <div class="menu_section">
                
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->