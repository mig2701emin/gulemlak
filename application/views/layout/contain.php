<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  function goster(a){

  $("#div"+a).slideDown("slow");
  $("#xdiv"+a).html('<li><div class="row"><div class="col-10"><span><a onclick="gizle(\''+a+'\');">Gizle</a></span></div><div class="col-2" style="padding:3px"><span class="badge badge-secondary" style="width:40px;"></span></div></div></li>');

  }
  function gizle(a){
  $("#div"+a).slideUp("slow");
  $("#xdiv"+a).html('<li><div class="row"><div class="col-10"><span><a onclick="goster(\''+a+'\');">Tümünü Göster</a></span></div><div class="col-2" style="padding:3px"><span class="badge badge-secondary" style="width:40px;"></span></div></div></li>');
}
</script>

<section class="mtb-30">
    <div class="container">
        <div class="row">
           <!-- slider-->
            <div class="col-xl-2 col-lg-3 mb-sm-30 col-lgmd-20per">
                <div class="sidebar-block">
                  <?php foreach ($anaKategoriler as $anaKategori){ ?>
                    <div class="sidebar-box listing-box mb-40">
                        <span class="opener plus"></span>
                        <div class="sidebar-title">
                            <h3><span><?php echo $anaKategori->kategori_adi; ?></span></h3>
                        </div>
                        <div class="sidebar-contant">
                          <?php $firstSubs=getAltKategoriler($anaKategori->Id); ?>
                          <?php if ($firstSubs){ ?>
                            <ul>
                              <?php
                              $kat_sayisi=count($firstSubs);
                              $i=0;
                              $goster=0;
                              foreach ($firstSubs as $firstSub){
                                $sinir=15;
                                if ($i<=$sinir && $kat_sayisi!=0) {?>
                                  <li>
                                      <div class="row">
                                        <div class="col-10">
                                          <span>
                                              <a href="<?php echo base_url($anaKategori->seo.'/'.$firstSub->seo.'/'.encode($firstSub->Id)); ?>"><?php echo $firstSub->kategori_adi.' '; ?></a>
                                          </span>
                                        </div>
                                        <div class="col-2" style="padding:3px">
                                            <span class="badge badge-secondary" style="width:40px;"><?php echo countDB('firmalar','kategori2',$firstSub->Id); ?></span>
                                        </div>

                                      </div>
                                  </li>

                                <?php } else { ?>
                                  <?php if ($goster=='0') { ?>
                                      <div id="div<?php echo $anaKategori->Id; ?>" style="width:100%;display:none;">
                                      <?php $goster='1';
                                  }?>
                                  <li>
                                      <div class="row">
                                        <div class="col-10">
                                          <span>
                                              <a href="<?php echo base_url($anaKategori->seo.'/'.$firstSub->seo.'/'.encode($firstSub->Id)); ?>"><?php echo $firstSub->kategori_adi.' '; ?></a>
                                          </span>
                                        </div>
                                        <div class="col-2" style="padding:3px">
                                            <span class="badge badge-secondary" style="width:40px;"><?php echo countDB('firmalar','kategori2',$firstSub->Id); ?></span>
                                        </div>
                                      </div>
                                  </li>
                                  <?php if (($kat_sayisi-1)==$i and $goster=='1') {?></div><?php }?>
                                <?php } ?>
                              <?php $i++; } ?>
                              <?php if (($i>$sinir)&&($kat_sayisi!='0')) {?>
                                <hr/>
                                <div id="xdiv<?php echo $anaKategori->Id;?>">
                                <li>
                                    <div class="row">
                                      <div class="col-10">
                                        <span>
                                            <a onclick="goster('<?php echo $anaKategori->Id; ?>')">Tümünü Göster</a>
                                        </span>
                                      </div>
                                      <div class="col-2" style="padding:3px">
                                          <span class="badge badge-secondary" style="width:40px;"></span>
                                      </div>
                                    </div>
                                </li>
                                </div>
                            <?php } ?>
                            </ul>
                          <?php } ?>

                        </div>
                    </div>
                  <?php } ?>

              </div>
            </div>
             <!-- slider-->
            <div class="col-xl-10 col-lg-9 col-lgmd-80per">
                <div class="row">
                    <div class="col-sm-8">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                  <img class="d-block w-100" src="<?php echo base_url('assets/');?>images/1slider.jpg" alt="First slide" style="height:300px;" />
                                  <div class="carousel-caption d-none d-md-block">
                                      <h5>Gül Emlak</h5>
                                      <p>Aradığınız herşey burada</p>
                                  </div>
                              </div>
                              <div class="carousel-item">
                                  <img class="d-block w-100" style="height:300px;" src="<?php echo base_url('assets/');?>images/1slider.jpg" alt="Second slide">
                              </div>
                              <div class="carousel-item">
                                  <img class="d-block w-100" style="height:300px;" src="<?php echo base_url('assets/');?>images/10.jpg" alt="Third slide">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                              <img class="d-block w-100" src="<?php echo base_url('assets/');?>images/Banner1.png" alt="First slide" style="height:300px;" />
                          </div>
                          <div class="carousel-item">
                              <img class="d-block w-100" style="height:300px;" src="<?php echo base_url('assets/');?>images/2.jpg" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                              <img class="d-block w-100" style="height:300px;" src="<?php echo base_url('assets/');?>images/10.jpg" alt="Third slide">
                          </div>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="shorting mb-20">
                  <div class="row" style="margin-top:10px;">
                    <div class="col-xl-6">
                      <div class="view">
                          <div class="list-types grid active ">
                              <div class="compare float-left-sm"> <a href="#" class="btn btn-color">Anasayfa Vitrini</a> </div>
                              <a>
                                  <div class="grid-icon list-types-icon"></div>
                              </a>
                          </div>
                          <div class="list-types list">
                              <a>
                                  <div class="list-icon list-types-icon"></div>
                              </a>
                          </div>
                      </div>
                    </div>
                    <div class="col-xl-6">
                    </div>
                  </div>
                </div>
                <div class="product-listing grid-type">
                    <div class="inner-listing">
                        <div class="row">

                          <?php foreach ($mainVitrins as $item){ ?>
                            <div class="col-md-4 col-6 item-width mb-30">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="<?php echo base_url('ilan/'.$item->seo_url).'-'.$item->Id; ?>">
                                            <img src="<?php echo fileControl('photos/crop',ilk_resim($item->Id),'yok_b.png');?>"  alt="<?php echo $item->firma_adi; ?>">
                                        </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left align-center">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><i class="fa fa-heart"></i></button>
                                                        </form>
                                                    </li>
                                                    <li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"><i class="fa fa-heart"></i></a></li>
                                                    <li class="pro-compare-icon"><a href="compare.html" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                                    <li class="pro-quick-view-icon"><a class="popup-with-product" href="#product_popup" title="quick-view"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name">
                                            <a href="<?php echo base_url('ilan/'.$item->seo_url).'-'.$item->Id; ?>"><?php echo $item->firma_adi; ?></a>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <a href="product-page.html">
                                                  <?php if ($item->kategoriId) {echo replace('kategoriler', 'kategori_adi','Id', $item->kategoriId);}?>
                                                  <?php if ($item->kategori2) {echo ' > '.replace('kategoriler', 'kategori_adi','Id', $item->kategori2);}?>
                                                  <?php if ($item->kategori3) {echo ' > '.replace('kategoriler', 'kategori_adi','Id', $item->kategori3);}?>
                                                  <?php if ($item->kategori4) {echo ' > '.replace('kategoriler', 'kategori_adi','Id', $item->kategori4);}?>
                                                </a>
                                            </div>
                                            <div class="col"><div class="price-box">
                                            <span class="price"><?php echo $item->fiyat.' '.$item->birim; ?></span></div>
                                            </div>
                                        </div>

                                        <div class="product-item-name">

                                        </div>
                                        <div class="rating-summary-block">
                                            <div class="rating-result" title="53%"> <span style="width:53%"></span> </div>
                                        </div>
                                        <div class="location">
                                          <?php if ($item->il) {echo replace('tbl_il', 'il_ad','il_id', $item->il);}?>
                                          <?php if ($item->ilce) {echo ' > '.replace('tbl_ilce', 'ilce_ad','ilce_id', $item->ilce);}?>
                                          <?php if ($item->mahalle) {echo ' > '.replace('tbl_mahalle', 'mahalle_ad','mahalle_id', $item->mahalle);}?>
                                        </div>
                                        <div class="product-des">
                                            <p><?php echo trSubstr(decode($item->aciklama)); ?></p>
                                        </div>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><i class="fa fa-heart"></i></button>
                                                        </form>
                                                    </li>
                                                    <li class="pro-wishlist-icon"><a title="Wishlist" href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                                    <li class="pro-compare-icon"><a title="Compare" href="compare.html"><i class="fa fa-refresh"></i></a></li>
                                                    <li class="pro-quick-view-icon"><a title="quick-view" href="#product_popup" class="popup-with-product"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php } ?>

                        </div>
                    </div>
                </div>
                <div class="shorting mb-20">
                  <div class="row" style="margin-top:10px;">
                    <div class="col-xl-6">
                      <div class="view">
                          <div class="list-types grid active ">
                              <div class="compare float-left-sm"> <a href="#" class="btn btn-color">Acil Acil Vitrini</a> </div>
                              <a>
                                  <div class="grid-icon list-types-icon"></div>
                              </a>
                          </div>
                          <div class="list-types list">
                              <a>
                                  <div class="list-icon list-types-icon"></div>
                              </a>
                          </div>
                      </div>
                    </div>
                    <div class="col-xl-6">
                    </div>
                  </div>
                </div>
                <div class="product-listing grid-type">
                    <div class="inner-listing">
                        <div class="row">

                          <?php foreach ($emergencyVitrins as $item){ ?>
                            <div class="col-md-4 col-6 item-width mb-30">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="<?php echo base_url('ilan/'.$item->seo_url).'-'.$item->Id; ?>">
                                            <img src="<?php echo fileControl('photos/crop',ilk_resim($item->Id),'yok_b.png');?>"  alt="<?php echo $item->firma_adi; ?>">
                                        </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left align-center">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><i class="fa fa-heart"></i></button>
                                                        </form>
                                                    </li>
                                                    <li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"><i class="fa fa-heart"></i></a></li>
                                                    <li class="pro-compare-icon"><a href="compare.html" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                                    <li class="pro-quick-view-icon"><a class="popup-with-product" href="#product_popup" title="quick-view"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name">
                                            <a href="<?php echo base_url('ilan/'.$item->seo_url).'-'.$item->Id; ?>"><?php echo $item->firma_adi; ?></a>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <a href="product-page.html">
                                                  <?php if ($item->kategoriId) {echo replace('kategoriler', 'kategori_adi','Id', $item->kategoriId);}?>
                                                  <?php if ($item->kategori2) {echo ' > '.replace('kategoriler', 'kategori_adi','Id', $item->kategori2);}?>
                                                  <?php if ($item->kategori3) {echo ' > '.replace('kategoriler', 'kategori_adi','Id', $item->kategori3);}?>
                                                  <?php if ($item->kategori4) {echo ' > '.replace('kategoriler', 'kategori_adi','Id', $item->kategori4);}?>
                                                </a>
                                            </div>
                                            <div class="col"><div class="price-box">
                                            <span class="price"><?php echo $item->fiyat.' '.$item->birim; ?></span></div>
                                            </div>
                                        </div>

                                        <div class="product-item-name">

                                        </div>
                                        <div class="rating-summary-block">
                                            <div class="rating-result" title="53%"> <span style="width:53%"></span> </div>
                                        </div>
                                        <div class="location">
                                          <?php if ($item->il) {echo replace('tbl_il', 'il_ad','il_id', $item->il);}?>
                                          <?php if ($item->ilce) {echo ' > '.replace('tbl_ilce', 'ilce_ad','ilce_id', $item->ilce);}?>
                                          <?php if ($item->mahalle) {echo ' > '.replace('tbl_mahalle', 'mahalle_ad','mahalle_id', $item->mahalle);}?>
                                        </div>
                                        <div class="product-des">
                                            <p><?php echo trSubstr(decode($item->aciklama)); ?></p>
                                        </div>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><i class="fa fa-heart"></i></button>
                                                        </form>
                                                    </li>
                                                    <li class="pro-wishlist-icon"><a title="Wishlist" href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                                    <li class="pro-compare-icon"><a title="Compare" href="compare.html"><i class="fa fa-refresh"></i></a></li>
                                                    <li class="pro-quick-view-icon"><a title="quick-view" href="#product_popup" class="popup-with-product"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php } ?>

                        </div>
                    </div>
                </div>
                <div class="shorting mb-20">
                  <div class="row" style="margin-top:10px;">
                    <div class="col-xl-6">
                      <div class="view">
                          <div class="list-types grid active ">
                              <div class="compare float-left-sm"> <a href="#" class="btn btn-color">Son Eklenenler</a> </div>
                              <a>
                                  <div class="grid-icon list-types-icon"></div>
                              </a>
                          </div>
                          <div class="list-types list">
                              <a>
                                  <div class="list-icon list-types-icon"></div>
                              </a>
                          </div>
                      </div>
                    </div>
                    <div class="col-xl-6">
                    </div>
                  </div>
                </div>
                <div class="product-listing grid-type">
                    <div class="inner-listing">
                        <div class="row">

                          <?php foreach ($sonEklenenler as $item){ ?>
                            <div class="col-md-4 col-6 item-width mb-30">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="<?php echo base_url('ilan/'.$item->seo_url).'-'.$item->Id; ?>">
                                            <img src="<?php echo fileControl('photos/crop',ilk_resim($item->Id),'yok_b.png');?>"  alt="<?php echo $item->firma_adi; ?>">
                                        </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left align-center">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><i class="fa fa-heart"></i></button>
                                                        </form>
                                                    </li>
                                                    <li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"><i class="fa fa-heart"></i></a></li>
                                                    <li class="pro-compare-icon"><a href="compare.html" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                                    <li class="pro-quick-view-icon"><a class="popup-with-product" href="#product_popup" title="quick-view"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name">
                                            <a href="<?php echo base_url('ilan/'.$item->seo_url).'-'.$item->Id; ?>"><?php echo $item->firma_adi; ?></a>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <a href="product-page.html">
                                                  <?php if ($item->kategoriId) {echo replace('kategoriler', 'kategori_adi','Id', $item->kategoriId);}?>
                                                  <?php if ($item->kategori2) {echo ' > '.replace('kategoriler', 'kategori_adi','Id', $item->kategori2);}?>
                                                  <?php if ($item->kategori3) {echo ' > '.replace('kategoriler', 'kategori_adi','Id', $item->kategori3);}?>
                                                  <?php if ($item->kategori4) {echo ' > '.replace('kategoriler', 'kategori_adi','Id', $item->kategori4);}?>
                                                </a>
                                            </div>
                                            <div class="col"><div class="price-box">
                                            <span class="price"><?php echo $item->fiyat.' '.$item->birim; ?></span></div>
                                            </div>
                                        </div>

                                        <div class="product-item-name">

                                        </div>
                                        <div class="rating-summary-block">
                                            <div class="rating-result" title="53%"> <span style="width:53%"></span> </div>
                                        </div>
                                        <div class="location">
                                          <?php if ($item->il) {echo replace('tbl_il', 'il_ad','il_id', $item->il);}?>
                                          <?php if ($item->ilce) {echo ' > '.replace('tbl_ilce', 'ilce_ad','ilce_id', $item->ilce);}?>
                                          <?php if ($item->mahalle) {echo ' > '.replace('tbl_mahalle', 'mahalle_ad','mahalle_id', $item->mahalle);}?>
                                        </div>
                                        <div class="product-des">
                                            <p><?php echo trSubstr(decode($item->aciklama)); ?></p>
                                        </div>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><i class="fa fa-heart"></i></button>
                                                        </form>
                                                    </li>
                                                    <li class="pro-wishlist-icon"><a title="Wishlist" href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                                    <li class="pro-compare-icon"><a title="Compare" href="compare.html"><i class="fa fa-refresh"></i></a></li>
                                                    <li class="pro-quick-view-icon"><a title="quick-view" href="#product_popup" class="popup-with-product"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php } ?>

                        </div>
                    </div>
                </div>
                <div class="shorting mb-20">
                  <div class="row" style="margin-top:10px;">
                    <div class="col-xl-6">
                      <div class="view">
                          <div class="list-types grid active ">
                              <div class="compare float-left-sm"> <a href="#" class="btn btn-color">Mağaza Vitrini</a> </div>
                              <a>
                                  <div class="grid-icon list-types-icon"></div>
                              </a>
                          </div>
                          <div class="list-types list">
                              <a>
                                  <div class="list-icon list-types-icon"></div>
                              </a>
                          </div>
                      </div>
                    </div>
                    <div class="col-xl-6">
                    </div>
                  </div>
                </div>
                <div class="product-listing grid-type">
                    <div class="inner-listing">
                        <div class="row">

                          <?php foreach ($magazaVitrin as $item){ ?>
                            <div class="col-md-4 col-6 item-width mb-30">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="#">
                                            <img src="<?php echo fileControl('photos/magaza',$item->logo,'yeral_mgz.png');?>"  alt="<?php echo $item->magazaadi; ?>">
                                        </a>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left align-center">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><i class="fa fa-heart"></i></button>
                                                        </form>
                                                    </li>
                                                    <li class="pro-wishlist-icon"><a href="wishlist.html" title="Wishlist"><i class="fa fa-heart"></i></a></li>
                                                    <li class="pro-compare-icon"><a href="compare.html" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                                    <li class="pro-quick-view-icon"><a class="popup-with-product" href="#product_popup" title="quick-view"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item-details">
                                        <div class="product-item-name">
                                            <a href="#"><?php echo $item->magazaadi; ?></a>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <a href="product-page.html">
                                                  <?php echo replace('kategoriler', 'kategori_adi','Id', $item->kategoriId);?>

                                                </a>
                                            </div>
                                        </div>

                                        <div class="product-item-name">

                                        </div>
                                        <div class="rating-summary-block">
                                            <div class="rating-result" title="53%"> <span style="width:53%"></span> </div>
                                        </div>
                                        <!--<div class="location">
                                          <?php //echo replace('tbl_il', 'il_ad','il_id', $item->il).' > ';?>
                                          <?php //echo replace('tbl_ilce', 'ilce_ad','ilce_id', $item->ilce).' > ';?>
                                          <?php //echo replace('tbl_mahalle', 'mahalle_ad','mahalle_id', $item->mahalle).'';?>
                                        </div>-->
                                        <div class="product-des">
                                            <p><?php echo trSubstr(decode($item->aciklama)); ?></p>
                                        </div>
                                        <div class="product-detail-inner">
                                            <div class="detail-inner-left">
                                                <ul>
                                                    <li class="pro-cart-icon">
                                                        <form>
                                                            <button title="Add to Cart"><i class="fa fa-heart"></i></button>
                                                        </form>
                                                    </li>
                                                    <li class="pro-wishlist-icon"><a title="Wishlist" href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                                    <li class="pro-compare-icon"><a title="Compare" href="compare.html"><i class="fa fa-refresh"></i></a></li>
                                                    <li class="pro-quick-view-icon"><a title="quick-view" href="#product_popup" class="popup-with-product"><i class="fa fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php } ?>

                        </div>
                    </div>
                </div>

                <div id="product_popup" class="quick-view-popup white-popup-block mfp-hide popup-position ">
                    <div class="popup-detail">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 mb-xs-30">
                                            <div class="fotorama" data-nav="thumbs" data-allowfullscreen="native">
                                                <a href="#"><img src="<?php echo base_url('assets/');?>images/1.jpg" alt="Ezone"></a>
                                                <a href="#"><img src="<?php echo base_url('assets/');?>images/2.jpg" alt="Ezone"></a>
                                                <a href="#"><img src="<?php echo base_url('assets/');?>images/3.jpg" alt="Ezone"></a>
                                                <a href="#"><img src="<?php echo base_url('assets/');?>images/4.jpg" alt="Ezone"></a>
                                                <a href="#"><img src="<?php echo base_url('assets/');?>images/5.jpg" alt="Ezone"></a>
                                                <a href="#"><img src="<?php echo base_url('assets/');?>images/6.jpg" alt="Ezone"></a>
                                                <a href="#"><img src="<?php echo base_url('assets/');?>images/4.jpg" alt="Ezone"></a>
                                                <a href="#"><img src="<?php echo base_url('assets/');?>images/5.jpg" alt="Ezone"></a>
                                                <a href="#"><img src="<?php echo base_url('assets/');?>images/6.jpg" alt="Ezone"></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-7">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-detail-main">
                                                        <div class="product-item-details">
                                                            <h1 class="product-item-name">Gaziantep Kiralık Lüx Daire</h1>
                                                            <div class="rating-summary-block">
                                                                <div title="53%" class="rating-result"> <span style="width:53%"></span> </div>
                                                            </div>
                                                            <div class="price-box"> <span class="price">$80.00</span> <del class="price old-price">$120.00</del> </div>
                                                            <div class="product-info-stock-sku">
                                                                <div>
                                                                    <label>Özellikleri: </label>
                                                                    <span class="info-deta">In stock</span>
                                                                </div>
                                                                <div>
                                                                    <label>SKU: </label>
                                                                    <span class="info-deta">20MVC-18</span>
                                                                </div>
                                                            </div>
                                                            <p>Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus.</p>
                                                            <ul class="product-list">
                                                                <li><i class="fa fa-check"></i> Satisfaction 100% Guaranteed</li>
                                                                <li><i class="fa fa-check"></i> Free shipping on orders over $99</li>
                                                                <li><i class="fa fa-check"></i> 14 day easy Return</li>
                                                            </ul>
                                                            <div class="select-size">
                                                                <span>Select Size :</span>
                                                                <ul>
                                                                    <li>
                                                                        <label class="size-option ">
                                                                            <input class="pro-size" type="radio" value="[object Object]" name="size">
                                                                            <span>S</span>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="size-option ">
                                                                            <input class="pro-size" type="radio" value="[object Object]" name="size">
                                                                            <span>M</span>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="size-option ">
                                                                            <input class="pro-size" type="radio" value="[object Object]" name="size">
                                                                            <span>L</span>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="size-option ">
                                                                            <input class="pro-size" type="radio" value="[object Object]" name="size">
                                                                            <span>XL</span>
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <label class="size-option ">
                                                                            <input class="pro-size" type="radio" value="[object Object]" name="size">
                                                                            <span>XXl</span>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="select-color">
                                                                <span>Select Color :</span>
                                                                <ul>
                                                                    <li>
                                                                        <div class="check-box">
                                                                            <div class="position-r">
                                                                                <div class="color-tooltip">
                                                                                    <span class="color-arrow"></span>red
                                                                                </div>
                                                                                <input type="checkbox" class="checkbox" id="red1" name="red">
                                                                                <label for="red1" class="red"></label>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="check-box">
                                                                            <div class="position-r">
                                                                                <div class="color-tooltip">
                                                                                    <span class="color-arrow"></span>black
                                                                                </div>
                                                                                <input type="checkbox" class="checkbox" id="black1" name="black">
                                                                                <label for="black1" class="black"></label>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="check-box">
                                                                            <div class="position-r">
                                                                                <div class="color-tooltip">
                                                                                    <span class="color-arrow"></span>navyblue
                                                                                </div>
                                                                                <input type="checkbox" class="checkbox" id="navyblue1" name="navyblue">
                                                                                <label for="navyblue1" class="navyblue"></label>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="check-box">
                                                                            <div class="position-r">
                                                                                <div class="color-tooltip">
                                                                                    <span class="color-arrow"></span>green
                                                                                </div>
                                                                                <input type="checkbox" class="checkbox" id="green1" name="green">
                                                                                <label for="green1" class="green"></label>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="check-box">
                                                                            <div class="position-r">
                                                                                <div class="color-tooltip">
                                                                                    <span class="color-arrow"></span>blue
                                                                                </div>
                                                                                <input type="checkbox" class="checkbox" id="blue1" name="blue">
                                                                                <label for="blue1" class="blue"></label>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="mb-20">
                                                                <div class="product-qty">
                                                                    <label for="qty">Qty:</label>
                                                                    <div class="custom-qty">
                                                                        <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items" type="button"> <i class="fa fa-minus"></i> </button>
                                                                        <input type="text" class="input-text qty" title="Qty" value="1" maxlength="8" id="qty" name="qty">
                                                                        <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items" type="button"> <i class="fa fa-plus"></i> </button>
                                                                    </div>
                                                                </div>
                                                                <div class="bottom-detail cart-button">
                                                                    <ul>
                                                                        <li class="pro-cart-icon">
                                                                            <form>
                                                                                <button title="Add to Cart" class="btn-color"><i class="fa fa-shopping-basket"></i></button>
                                                                            </form>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="bottom-detail">
                                                                <ul>
                                                                    <li class="pro-wishlist-icon"><a href="wishlist.html"><span><i class="fa fa-heart"></i></span>Wishlist</a></li>
                                                                    <li class="pro-compare-icon"><a href="compare.html"><span><i class="fa fa-refresh"></i></span>Compare</a></li>
                                                                    <li class="pro-email-icon"><a href="#"><span><i class="fa fa-envelope"></i></span>Email to Friends</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
