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
                            <a class="navbar-brand page-scroll" href="<?php echo base_url(); ?>">
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
                                            <a href="#"><span>Kurumsal</span></a>
                                        </li>
                                        <li class="level dropdown ">
                                            <span class="opener plus"></span>
                                            <a href="#" class="page-scroll"><span>Mağaza</span></a>
                                            <div class="megamenu mobile-sub-menu">
                                                <div class="megamenu-inner-top">
                                                    <ul class="sub-menu-level1">
                                                        <li class="level2">
                                                            <ul class="sub-menu-level2 " style="width:250px;">
                                                                <li class="level3"><a href="account.html"><span>■</span>Mağaza Açmak İstiyorum</a></li>
                                                                <li class="level3"><a href="checkout.html"><span>■</span>Mağaza Paketleri</a></li>
                                                                <li class="level3"><a href="compare.html"><span>■</span>Mağaza Türleri</a></li>
                                                                <li class="level3"><a href="wishlist.html"><span>■</span>Mağaza Fiyatları</a></li>
                                                                <li class="level3"><a href="404.html"><span>■</span>Nasıl Çalışır</a></li>
                                                                <li class="level3"><a href="faq.html"><span>■</span>Sık Sorulan Sorular</a></li>

                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="level dropdown ">
                                            <span class="opener plus"></span>
                                            <a href="blog.html"><span>Destek</span></a>
                                        </li>
                                        <li>
                                            <a href="Home/giris"><span>İletİşİm</span></a>
                                        </li>

                                        <li class="level dropdown ">
                                            <!-- <a href="<?php //echo base_url('ilanekle'); ?>" ><span class="btn_ilanver"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ücretsiz İlan Ver</span></a> -->

                                            <!-- <?php //if($this->session->userdata('userData')){ ?>
                                              <a  href="<?php //echo base_url('cikis'); ?>" class="btn btn-danger" style="border: none" ><i class="fa fa-user"></i>ÇIKIŞ YAP</a>
                                              <a  href="<?php //echo base_url(); ?>" class="btn btn-danger" style="border: none" ><i class="fa fa-user"></i><?php //echo $this->session->userdata['userData']['ad']; ?></a>
                                            <?php //}else{ ?>
                                              <a  href="<?php //echo base_url('uyegiris'); ?>" class="btn btn-danger" style="border: none"><i class="fa fa-user"></i>GİRİŞ YAP</a>
                                              <a href="<?php //echo base_url('uyeol'); ?>" class="btn btn-danger" style="border: none"><i class="fa fa-user-plus"></i>ÜYE OL</a>
                                            <?php //} ?> -->

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
                            <a href="<?php echo base_url('ilanekle'); ?>" class="btn-sidebar-menu-dropdown " style="background-color:#310080;"><i class="fa fa-plus"></i>Ücretsiz İlan Ver</a>
                            <!-- <div id="cat" class="cat-dropdown">
                                <div class="sidebar-contant">
                                    <div id="menu" class="navbar-collapse collapse">
                                        <ul class="nav navbar-nav ">
                                            <li class="level sub-megamenu">
                                                <span class="opener plus"></span>
                                                <i class="fa fa-female"></i>
                                                <div class="megamenu mobile-sub-menu" style="width:430px;">
                                                    <div class="megamenu-inner-top">
                                                        <ul class="sub-menu-level1">
                                                            <li class="level2">
                                                                <ul class="sub-menu-level2 ">
                                                                    <li class="level3">
                                                                          <ul class="sub-menu-level3 ">
                                                                              <li class="level4">
                                                                                  <ul class="sub-menu-level4 ">
                                                                                        <li class="level5">
                                                                                        </li>
                                                                                  </ul>
                                                                              </li>
                                                                          </ul>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="header-top mobile">
                                            <div class="">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="language-currency select-dropdown">
                                                            <fieldset>
                                                                <select name="speed" class="countr option-drop">
                                                                    <option selected="selected">English</option>
                                                                    <option>Frence</option>
                                                                    <option>German</option>
                                                                </select>
                                                                <select name="speed" class="currenc option-drop">
                                                                    <option selected="selected">USD</option>
                                                                    <option>EURO</option>
                                                                    <option>POUND</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 bottom-part col-lgmd-60per">
                        <div class="header-right-part">
                            <div class="category-dropdown2 select-dropdown">
                                <a class="btn-sidebar-menu-dropdown2 color_text3" ><i class="fa fa-search" style="margin-right:5px;"></i>Detaylı Arama</a>

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
                        <div class="right-side float-left-xs header-right-link">
                            <ul>
                              <?php if ($this->session->userdata('userData')): ?>
                                <li class="account-icon">
                                    <a href="#">
                                        <span><i class="fa fa-user"></i></span>
                                    </a>
                                    <div class="header-link-dropdown account-link-dropdown">
                                        <ul class="link-dropdown-list">
                                            <li>
                                                <span class="dropdown-title">Hesabım</span>
                                                <ul>
                                                    <?php if($this->session->userdata('userData')){ ?>
                                                      <li><a href="<?php echo base_url(); ?>hesabim/anasayfa">Bana Özel</a></li>
                                                      <li><a href="<?php echo base_url(); ?>cikis">Çıkış Yap</a></li>
                                                    <?php }else{ ?>
                                                      <li><a href="<?php echo base_url(); ?>uyegiris">Giriş</a></li>
                                                      <li><a href="<?php echo base_url(); ?>uyeol">Üye Ol</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="cart-icon">
                                    <a href="#">
                                        <span class="cart-icon-main"><i class="fa fa-heart"></i><small class="cart-notification"><?php if(countDB("favoriler","uyeId",$user->Id)>0){echo countDB("favoriler","uyeId",$user->Id);}else{echo "0";} ?></small></span>
                                    </a>
                                    <?php
                                    $favoriler=$this->db->where("uyeId",$user->Id)->get("favoriler");
                                    if ($favoriler->num_rows()>0) {?>                                    <div class="cart-dropdown header-link-dropdown">
                                        <ul class="cart-list link-dropdown-list">
                                            <?php $ilanlar=$this->db->query("select favoriler.*, firmalar.* FROM favoriler JOIN firmalar WHERE favoriler.ilanId=firmalar.Id AND favoriler.uyeId=".$user->Id)->result(); ?>
                                            <?php foreach ($ilanlar as $ilan): ?>
                                              <li>
                                                  <!-- <a class="close-cart"><i class="fa fa-times-circle"></i></a> -->
                                                  <div class="media">
                                                      <a class="pull-left">
                                                        <img alt="<?php echo $ilan->firma_adi; ?>" src="<?php echo base_url().'photos/thumbnail/'. ilk_resim($ilan->Id) ; ?>">
                                                      </a>
                                                      <div class="media-body">
                                                          <span><a href="<?php echo base_url().$ilan->seo_url.'/'.encode($ilan->Id); ?>"><?php echo $ilan->firma_adi; ?></a></span>
                                                          <p class="cart-price"><?php echo number_format($ilan->fiyat,0, ',', '.').' '.$ilan->birim; ?></p>
                                                          <!-- <div class="product-qty">
                                                              <label>Qty:</label>
                                                              <div class="custom-qty">
                                                                  <input type="text" name="qty" maxlength="8" value="1" title="Qty" class="input-text qty">
                                                              </div>
                                                          </div> -->
                                                      </div>
                                                  </div>
                                              </li>
                                            <?php endforeach; ?>
                                        </ul>
                                        <!-- <p class="cart-sub-totle">
                                            <span class="pull-left">Toplam:</span>
                                            <span class="pull-right"><strong class="price-box">2</strong></span>
                                        </p>
                                        <div class="clearfix"></div>
                                        <div class="mt-20">
                                            <a href="checkout.html" class="btn-color btn right-side"><i class="fa fa-share"></i>İncele</a>
                                        </div> -->
                                    </div>
                                  <?php } ?>
                                </li>
                              <?php else: ?>
                                <li class="account-icon">
                                    <a href="#">
                                        <span class="color_bg3"><i class="fa fa-user"></i> Giriş</span>
                                    </a>
                                    <div class="header-link-dropdown account-link-dropdown" style="width:170px;">
                                        <ul class="link-dropdown-list">
                                            <li>
                                                <span class="dropdown-title">Hesabım</span>
                                                <ul>
                                                    <?php if($this->session->userdata('userData')){ ?>
                                                      <li><a href="<?php echo base_url(); ?>hesabim">Bana Özel</a></li>
                                                      <li><a href="<?php echo base_url(); ?>cikis">Çıkış Yap</a></li>
                                                    <?php }else{ ?>
                                                      <li><a href="<?php echo base_url(); ?>uyegiris">Giriş Yap</a></li>
                                                      <li><a href="<?php echo base_url(); ?>uyeol">Üye Ol</a></li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!-- <li class="account-icon">
                                  <a href="<?php //echo base_url(); ?>uyeol">
                                    <span style="width:95px;float:left"><i class="fa fa-user-plus"></i> Üye Ol</span>

                                  </a>
                                </li> -->
                              <?php endif; ?>

                                <!-- <li class="side-toggle">
                                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"><i class="fa fa-plus"></i></button>
                                </li> -->
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
                <!-- <li class="categories">
                    <a class="popup-with-form" href="#categories_popup"><span class="icon"><i class="fa fa-bars"></i></span><span class="icon-text">Kategoriler</span></a>
                </li>
                <li class="cart-icon">
                    <a class="popup-with-form" href="#cart_popup"><span class="icon"><i class="fa fa-heart"></i></span><span class="icon-text">Cart</span></a>
                </li>
                <li class="account">
                    <a class="popup-with-form" href="#account_popup"><span class="icon"><i class="fa fa-user"></i></span><span class="icon-text">Account</span></a>
                </li>
                <li class="search">
                    <a class="popup-with-form" href="#search_popup"><span class="icon"><i class="fa fa-search"></i></span><span class="icon-text">Search</span></a>
                </li> -->
                <li class="scroll scrollup color_bg3">
                    <a href="#"><span class="icon"><i class="fa fa-chevron-up"></i></span><span class="icon-text"></span></a>
                </li>
            </ul>
        </div>
        <!--<div id="popup_containt">
             <div id="categories_popup" class="white-popup-block mfp-hide popup-position">
                <div class="popup-title">
                    <h2 class="main_title heading"><span>Kategori</span></h2>
                </div>
                <div class="popup-detail">
                    <ul class="cate-inner">

                      <?php //foreach ($anaKategoriler as $anaKategori): ?>
                        <li class="level sub-megamenu">
                            <span class="opener plus"></span>
                            <a href="shop.html" class="page-scroll"><i class="fa fa-female"></i><?php //echo $anaKategori->kategori_adi; ?></a>
                            <div class="megamenu  mega-sub-menu">
                                <div class="megamenu-inner-top">
                                  <?php //$firstSubs=getAltKategoriler($anaKategori->Id); ?>
                                  <?php //if ($firstSubs): ?>
                                    <ul class="sub-menu-level1">

                                      <?php //foreach ($firstSubs as $firstSub): ?>
                                        <li class="level2">
                                            <a href="shop.html"><span><?php //echo $firstSub->kategori_adi; ?></span></a>
                                            <?php //$secondSubs=getAltKategoriler($firstSub->Id); ?>
                                            <?php //if ($secondSubs): ?>
                                            <ul class="sub-menu-level2 ">
                                              <?php //foreach ($secondSubs as $secondSub): ?>
                                                <li class="level3"><a href="shop.html"><span>■</span><?php //echo $secondSub->kategori_adi; ?></a></li>
                                                <?php //endforeach; ?>


                                            </ul>
                                              <?php //endif; ?>
                                        </li>
                                        <?php //endforeach; ?>

                                    </ul>
                                    <?php //endif; ?>
                                </div>
                            </div>
                        </li>
                    <?php //endforeach; ?>
                    </ul>
                </div>
            </div>
            <div id="cart_popup" class="white-popup-block mfp-hide popup-position">
                <div class="popup-title">
                    <h2 class="main_title heading"><span>cart</span></h2>
                </div>
                <div class="popup-detail">
                    <div class="cart-dropdown ">
                        <ul class="cart-list link-dropdown-list">
                            <li>
                                <a class="close-cart"><i class="fa fa-times-circle"></i></a>
                                <div class="media">
                                    <a class="pull-left"> <img alt="Ezone" src="<?php //echo base_url('assets/');?>images/1.jpg"></a>
                                    <div class="media-body">
                                        <span><a href="#">Kiralık Lüx Daire</a></span>
                                        <p class="cart-price">$14.99</p>
                                        <div class="product-qty">
                                            <label>Qty:</label>
                                            <div class="custom-qty">
                                                <input type="text" name="qty" maxlength="8" value="1" title="Qty" class="input-text qty">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a class="close-cart"><i class="fa fa-times-circle"></i></a>
                                <div class="media">
                                    <a class="pull-left"> <img alt="Ezone" src="<?php //echo base_url('assets/');?>images/2.jpg"></a>
                                    <div class="media-body">
                                        <span><a href="#">Kiralık Lüx Daire</a></span>
                                        <p class="cart-price">$14.99</p>
                                        <div class="product-qty">
                                            <label>Qty:</label>
                                            <div class="custom-qty">
                                                <input type="text" name="qty" maxlength="8" value="1" title="Qty" class="input-text qty">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <p class="cart-sub-totle"> <span class="pull-left">Cart Subtotal</span> <span class="pull-right"><strong class="price-box">$29.98</strong></span> </p>
                        <div class="clearfix"></div>
                        <div class="mt-20"> <a href="cart.html" class="btn-color btn">Cart</a> <a href="checkout.html" class="btn-color btn right-side">Checkout</a> </div>
                    </div>
                </div>
            </div>
            <div id="account_popup" class="white-popup-block mfp-hide popup-position">
                <div class="popup-title">
                    <h2 class="main_title heading"><span>Account</span></h2>
                </div>
                <div class="popup-detail">
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="account.html">
                                <div class="account-inner mb-30">
                                    <i class="fa fa-user"></i><br />
                                    <span>Account</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="register.html">
                                <div class="account-inner mb-30">
                                    <i class="fa fa-user-plus"></i><br />
                                    <span>Register</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="cart.html">
                                <div class="account-inner mb-30">
                                    <i class="fa fa-heart"></i><br />
                                    <span>Shopping</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="account.html#step4">
                                <div class="account-inner">
                                    <i class="fa fa-key"></i><br />
                                    <span>Change Pass</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="account.html#step3">
                                <div class="account-inner">
                                    <i class="fa fa-history"></i><br />
                                    <span>history</span>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="login.html">
                                <div class="account-inner">
                                    <i class="fa fa-share-square-o"></i><br />
                                    <span>log out</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="search_popup" class="white-popup-block mfp-hide popup-position">
                <div class="popup-title">
                    <h2 class="main_title heading"><span>ARA</span></h2>
                </div>
                <div class="popup-detail">
                    <div class="main-search">
                        <div class="header_search_toggle desktop-view">
                            <form>
                                <div class="search-box">
                                    <input class="input-text" type="text" placeholder="Search entire store here...">
                                    <button class="search-btn"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</header>
