</style>
<header class="navbar navbar-custom container-full-sm" id="header">
    <div class="header-top">
        <div class="container">
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-lgmd-20per">
                    <div class="header-middle-left">
                        <div class="navbar-header float-none-sm">
                            <a class="navbar-brand page-scroll" href="<?php echo base_url(); ?>" style="padding-top: 10px;  padding-bottom:5px;width: 280px;">
                                <img  alt="www.ticaretmeclisi.com" src="<?php echo base_url('assets/');?>images/logo.png" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-9 col-12 col-lgmd-80per">
                    <div class="bottom-inner right-side float-none-sm">
                        <div class="position-r">
                            <div class="nav_sec position-r">
                                <div class="mobilemenu-title mobilemenu">
                                    <span>Menu</span>
                                    <i class="fa fa-bars pull-right"></i>
                                </div>
                                <div class="mobilemenu-content">
                                    <ul class="nav navbar-nav" id="menu-main">
                                        <li>
                                            <a href="<?php echo base_url(); ?>"><span>Anasayfa</span></a>
                                        </li>
                                        <li class="level dropdown ">
                                            <span class="opener plus"></span>
                                            <a href="/kurumsal"><span>Kurumsal</span></a>
                                        </li>
                                        <li class="level dropdown ">
                                            <span class="opener plus"></span>
                                            <a href="#" class="page-scroll"><span>Mağaza</span></a>
                                            <div class="megamenu mobile-sub-menu">
                                                <div class="megamenu-inner-top">
                                                    <ul class="sub-menu-level1">
                                                        <li class="level2">
                                                            <ul class="sub-menu-level2 " style="width:250px;">
                                                                <li class="level3"><a href="/kurumsal/destek"><span>■</span>Mağaza Açmak İstiyorum</a></li>
                                                                <li class="level3"><a href="/kurumsal/destek"><span>■</span>Mağaza Paketleri</a></li>
                                                                <li class="level3"><a href="/kurumsal/destek"><span>■</span>Mağaza Türleri</a></li>
                                                                <li class="level3"><a href="/kurumsal/destek"><span>■</span>Mağaza Fiyatları</a></li>
                                                                <li class="level3"><a href="/kurumsal/destek"><span>■</span>Nasıl Çalışır</a></li>
                                                                <li class="level3"><a href="/kurumsal/destek"><span>■</span>Sık Sorulan Sorular</a></li>

                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="level dropdown ">
                                          <span class="opener plus"></span>
                                          <a href="/Kurumsal/SanalTur"><span>Sanal Tur</span></a>
                                        </li>
                                        <li>
                                            <a href="/kurumsal/iletisim"><span>İletİşİm</span></a>
                                        </li>

                                        <li class="level dropdown ">

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom color_bgx">
        <div class="container">
            <div class="header-line">
                <div class="row position-r">
                    <div class="col-xl-2 col-lg-3 bottom-part col-lgmd-20per position-initial">
                        <div class="sidebar-menu-dropdown home">
                            <a href="<?php echo base_url('ilanekle'); ?>" class="btn-sidebar-menu-dropdown " style="background-color:#2c9bf4;"><i class="fa fa-plus"></i>Ücretsiz İlan Ver</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 bottom-part col-lgmd-60per">
                        <div class="header-right-part">
                            <div class="category-dropdown2 select-dropdown">
                                <a href="<?php echo base_url().'emlak/45';?>" class="btn-sidebar-menu-dropdown2 color_text3" ><i class="fa fa-search" style="margin-right:5px;"></i>Detaylı Arama</a>

                            </div>
                            <div class="main-search">
                                <div class="header_search_toggle desktop-view">
                                    <form action="<?php echo base_url(); ?>home/ara" method="post">
                                        <div class="search-box">
                                            <input name="search" class="input-text" type="text" placeholder="Kelime,ilan no Giriniz">
                                            <button type="submit" class="search-btn color_bg3"></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-3 bottom-part col-lgmd-20per">
                        <div class="float-left-xs header-right-link" style="width:160px">
                            <ul >
                              <?php if ($this->session->userdata('userData')){ ?>
                                <li class="account-icon" style="padding-right:0px;" >
                                    <a href="#">
                                        <span  style="width:45px; background-color:#2c9bf4"> <i class="fa fa-user"></i></span>
                                    </a>
                                    <div class="header-link-dropdown account-link-dropdown">
                                        <ul class="link-dropdown-list">
                                            <li>
                                                <span class="dropdown-title">Hesabım</span>
                                                <ul>
                                                  <li><a href="<?php echo base_url(); ?>hesabim/anasayfa">Bana Özel</a></li>
                                                  <li><a href="<?php echo base_url(); ?>cikis">Çıkış Yap</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="cart-icon" >
                                    <a href="#" >
                                        <span style="width:45px;  background-color:red" class="cart-icon-main"><i class="fa fa-heart"></i></span>
                                    </a>
                                    <?php
                                    $favoriler=$this->db->where("uyeId",$user->Id)->get("favoriler");
                                    if ($favoriler->num_rows()>0) {?>                                    <div class="cart-dropdown header-link-dropdown">
                                        <ul class="cart-list link-dropdown-list">
                                            <?php $ilanlar=$this->db->query("select favoriler.*, firmalar.* FROM favoriler JOIN firmalar WHERE favoriler.ilanId=firmalar.Id AND favoriler.uyeId=".$user->Id)->result(); ?>
                                            <?php foreach ($ilanlar as $ilan): ?>
                                              <li>
                                                  <div class="media">
                                                      <a class="pull-left">
                                                        <img alt="<?php echo $ilan->firma_adi; ?>" src="<?php echo base_url().'photos/thumbnail/'. ilk_resim($ilan->Id) ; ?>">
                                                      </a>
                                                      <div class="media-body">
                                                          <span><a href="<?php echo base_url().$ilan->seo_url.'/'.encode($ilan->Id); ?>"><?php echo $ilan->firma_adi; ?></a></span>
                                                          <p class="cart-price"><?php echo number_format($ilan->fiyat,0, ',', '.').' '.$ilan->birim; ?></p>
                                                      </div>
                                                  </div>
                                              </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                  <?php } ?>
                                </li>
                              <?php }else{ ?>
                                <li class="account-icon">
                                    <a href="#">
                                        <span class="color_bg3"><i class="fa fa-user"></i> Giriş</span>
                                    </a>
                                    <div class="header-link-dropdown account-link-dropdown" style="width:170px;">
                                        <ul class="link-dropdown-list">
                                            <li>
                                                <span class="dropdown-title">Hesabım</span>
                                                <ul>
                                                  <li><a href="<?php echo base_url(); ?>uyegiris">Giriş Yap</a></li>
                                                  <li><a href="<?php echo base_url(); ?>uyeol">Üye Ol</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                              <?php } ?>
                                <li class="side-toggle" title="Ücretsiz İlan Ver">
                                  <a href="<?php echo base_url('ilanekle'); ?>"><span class="color_bg3"><i class="fa fa-plus"></i></span></a>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-links ">
        <div class="popup-links-inner">
            <ul>
                <li class="scroll scrollup color_bg3">
                    <a href="#"><span class="icon"><i class="fa fa-chevron-up"></i></span><span class="icon-text"></span></a>
                </li>
            </ul>
        </div>
    </div>
</header>
