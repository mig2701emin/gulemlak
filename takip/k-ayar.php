            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">
					<?php 
						echo $_SESSION["name"];
					?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profil_guncelle.php"> Profil</a></li>
                    
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Oturumu Kapat</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>