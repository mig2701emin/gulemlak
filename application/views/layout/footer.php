
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom/footer.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<div class="footer">

     <div class="container">
         <figure  style=" left: 0;right: 0;bottom:50px;display:block;position: absolute ;   margin-bottom: 0;    margin: 0 0 1rem;">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="none" x="0px" y="0px" viewBox="0 0 1920 347.1" style="margin-bottom: -9px; enable-background:new 0 0 1920 347.1;" xml:space="preserve" class="injected-svg js-svg-injector" data-parent="#SVGheroBgElements">
<style type="text/css">
    .wave-4-bottom-0{fill:#FFFFFF;}
</style>
                <linearGradient id="wave4Bottom" gradientUnits="userSpaceOnUse" x1="960" y1="347.082" x2="960" y2="50.6077">
                    <stop class="stop-color-primary" offset="1.500162e-07" stop-opacity="0.3" style="stop-color:#377DFF"></stop>
                    <stop class="stop-color-white" offset="1" stop-opacity="0.3" style="stop-color:#FFFFFF"></stop>
                </linearGradient>
                <path fill="url(#wave4Bottom)" d="M0,233c0,0,311.2-97,706.6-35.5c152.8,23.8,304.3,73.9,459.2,81.8c69.2,3.5,138.2-4.1,205.7-19.6     c43.2-9.9,85.8-22.8,127.7-37.3c74.1-25.6,144.2-61.1,210-103.5c62.4-40.2,134.7-74.7,210.9-67.3c0,0,0,295.5,0,295.5H0.5L0,233z"></path>
                <path class="wave-4-bottom-0 fill-white" d="M0,326.1c0,0,321-226.7,960.5-76.4S1920,0,1920,0v347H0L0,326.1z"></path>
</svg>
        </figure>

        <div class="footer-inner">
            <div class="footer-middle">
                <div class="row">
                    <div class="col-xl-4 f-col">
                        <div class="footer-static-block">
                            <span class="opener plus"></span>
                            <h3 class="title">İletİşİm<span></span></h3>
                            <ul class="footer-block-contant address-footer">
                                <li class="item">
                                    <i class="fa fa-map-marker"> </i>
                                    <?php $ayarlar=$this->db->get("ayarlar")->row();?>
                                    <p>TİCARETMECLİSİ.COM <br /> <?php echo $ayarlar->adres; ?></p>
                                </li>
                                <li class="item">
                                    <i class="fa fa-envelope"> </i>
                                    <p> <a href="#"><?php echo $ayarlar->sitemail; ?></a> </p>
                                </li>
                                <li class="item">
                                    <i class="fa fa-phone"> </i>
                                    <p><?php echo $ayarlar->mobil; ?></p>
                                </li>
                                <li class="item">
                                    <i class="fa fa-phone"> </i>
                                    <p><?php echo $ayarlar->telefon; ?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-8 footer-right-side">
                        <div class="row">
                            <div class="col-xl-4 f-col">
                                <div class="footer-static-block">
                                    <span class="opener plus"></span>
                                    <h3 class="title">Paketlerİmİz<span></span></h3>
                                    <ul class="footer-block-contant link">
                                        <li><a href="#">Altın Paket</a></li>
                                        <li><a href="#">Gümüş Paket</a></li>
                                        <li><a href="#">Bronz Paket</a></li>
                                        <li><a href="#">Standart Paket</a></li>
                                        <li><a href="#">Tüm Paketler</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 f-col">
                                <div class="footer-static-block">
                                    <span class="opener plus"></span>
                                    <h3 class="title">Mağaza<span></span></h3>
                                    <ul class="footer-block-contant link">
                                        <li><a href="#">Mağazam</a></li>
                                        <li><a href="#">Mağaza Açmak İstiyorum</a></li>
                                        <li><a href="#">Neden Mağaza</a></li>
                                        <li><a href="#">Mağaza Fiyatları</a></li>
                                        <li><a href="#">Nasıl Çalışır</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-4 f-col">
                                <div class="footer-static-block">
                                    <span class="opener plus"></span>
                                    <h3 class="title">Destek<span></span></h3>
                                    <ul class="footer-block-contant link">
                                        <li><a href="#">Hakkımızda</a></li>
                                        <li><a href="#">Yönetim İlkeleri</a></li>
                                        <li><a href="#">İnsan Kaynakları</a></li>
                                        <li><a href="#">Yönetim</a></li>
                                        <li><a href="#">Online Yardım</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="footer-bottom ">
                <div class="row mtb-30">
                    <div class="col-xl-4">
                        <div class="footer_social center-md">
                            <ul class="social-icon" >
                                <li><div class="title">Bizi Takip Edin:</div></li>
                                <li><a title="Facebook" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a title="Twitter" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                <li><a title="Linkedin" class="linkedin"><i class="fab fa-linkedin"> </i></a></li>
                                <li><a title="RSS" class="rss"><i class="fas fa-rss-square"></i></a></li>
                                <li><a title="Pinterest" class="pinterest"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4">

                    </div>
                    <div class="col-xl-4 ">
                        <div class="payment">
                            <ul class="payment_icon">

                                <li class="discover"><a href="#"><img src="<?php echo base_url('assets/');?>images/pay2.png" alt="Ezone"></a></li>
                                <li class="paypal"><a href="#"><img src="<?php echo base_url('assets/');?>images/pay3.png" alt="Ezone"></a></li>
                                <li class="vindicia"><a href="#"><img src="<?php echo base_url('assets/');?>images/pay4.png" alt="Ezone"></a></li>
                                <li class="atos"><a href="#"><img src="<?php echo base_url('assets/');?>images/pay5.png" alt="Ezone"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-link-bg">
        <div class="container">
            <div class="row align-center">
                <div class="col-12">
                    <div class="site-link">
                        <ul>
                            <li><a href="#">Hakkımızda</a>|</li>
                            <li><a href="#">iletişim</a>|</li>
                            <li><a href="#">Müşteri</a>|</li>
                            <li><a href="#">Hizmetler</a>|</li>
                            <li><a href="#">Kullanım Koşulları</a>|</li>
                            <li><a href="#">Gizlilik </a>|</li>
                            <li><a href="#">Künye</a>|</li>
                            <li><a href="#">Hizmet Sözleşmesi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12">
                <div class="align-center">
                    <div class="copy-right"><a href="#" style="color: #007bff;font-size: 12px;">© 2018  Ticaret Meclisi Tüm Hakları Saklıdır </a>  </div>
                </div></div>
            </div>
        </div>
    </div>
</div>
<div class="scroll-top">
    <div class="scrollup color_bg3"></div>
</div>
