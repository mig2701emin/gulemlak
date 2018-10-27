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
                            <a class="navbar-brand page-scroll" href="<?php echo base_url(); ?>">
                                <img  alt="" src="<?php echo base_url('assets/');?>images/logo.png" />
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
                                            <a href="#"><span>Kurumsal</span></a>
                                            <!--<div class="megamenu mobile-sub-menu">
                                                <div class="megamenu-inner-top">
                                                    <ul class="sub-menu-level1">
                                                        <li class="level2">
                                                            <ul class="sub-menu-level2 ">
                                                                <li class="level3"><a href="shop.html"><span>■</span>Shop</a></li>
                                                                <li class="level3"><a href="shop_2.html"><span>■</span>Shop 2</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>-->
                                        </li>



                                        <li class="level dropdown ">
                                            <span class="opener plus"></span>
                                            <a href="#" class="page-scroll"><span>Mağaza</span></a>
                                            <div class="megamenu mobile-sub-menu">
                                                <div class="megamenu-inner-top">
                                                    <ul class="sub-menu-level1">
                                                        <li class="level2">
                                                            <ul class="sub-menu-level2 " style="width:250px;">
                                                                <li class="level3"><a href="#"><span>■</span>Mağaza Açmak İstiyorum</a></li>
                                                                <li class="level3"><a href="#"><span>■</span>Mağaza Paketleri</a></li>
                                                                <li class="level3"><a href="#"><span>■</span>Mağaza Türleri</a></li>
                                                                <li class="level3"><a href="#"><span>■</span>Mağaza Fiyatları</a></li>
                                                                <li class="level3"><a href="#"><span>■</span>Nasıl Çalışır</a></li>
                                                                <li class="level3"><a href="#"><span>■</span>Sık Sorulan Sorular</a></li>

                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="level dropdown ">
                                            <span class="opener plus"></span>
                                            <a href="#"><span>Destek</span></a>
                                            <!--<div class="megamenu mobile-sub-menu">
                                                <div class="megamenu-inner-top">
                                                    <ul class="sub-menu-level1">
                                                        <li class="level2">
                                                            <ul class="sub-menu-level2 ">
                                                                <li class="level3"><a href="blog.html"><span>■</span>Blog</a></li>
                                                                <li class="level3"><a href="blog_2.html"><span>■</span>Blog 2</a></li>
                                                                <li class="level3"><a href="single-blog.html"><span>■</span>Single Blog</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>-->
                                        </li>
                                        <li>
                                            <a href="#"><span>İletİşİm</span></a>
                                        </li>
                                        <?php if($this->session->userdata('userData')){ ?>
                                          <li>
                                            <a  href="<?php echo base_url('cikis'); ?>" class="btn btn-danger" style="border: none" ><i class="fa fa-user"></i> ÇIKIŞ YAP</a>
                                          </li>
                                          <li>
                                            <a  href="<?php echo base_url('hesabim/anasayfa'); ?>" class="btn btn-danger" style="border: none" ><i class="fa fa-user"></i> HESABIM</a>
                                          </li>
                                        <?php }else{ ?>
                                          <li>
                                            <a  href="<?php echo base_url('uyegiris'); ?>" class="btn btn-danger" style="border: none"><i class="fa fa-user"></i> GİRİŞ YAP</a>
                                          </li>
                                          <li>
                                            <a href="<?php echo base_url('uyeol'); ?>" class="btn btn-danger" style="border: none"><i class="fa fa-user-plus"></i> ÜYE OL</a>
                                          </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
