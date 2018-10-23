<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  //if(SUBDOMAIN === FALSE) {
      $route['default_controller'] = 'home';
  //} else {
      //$route['default_controller'] = "subdeneme";
  //}
      //$route['default_controller'] = 'home';

      require_once (BASEPATH.'database/DB.php');
      $db=& DB();
      /*$anaKategoriler=$db->where('ust_kategori','0')->get('kategoriler')->result();
      foreach ($anaKategoriler as $anaKategori) {
        //$route['kategori/'.$anaKategori->seo]='ilanlar/kategoriler/'.$anaKategori->Id;
        $route[$anaKategori->seo]='home/kategori/'.$anaKategori->Id;
        $altKategoriler=$db->where('ust_kategori',$anaKategori->Id)->get('kategoriler')->result();
        foreach ($altKategoriler as $altKategori) {
          //$route['kategori/'.$anaKategori->seo.'/'.$altKategori->seo]='ilanlar/kategoriler/'.$anaKategori->Id.'/'.$altKategori->Id;
          $route[$anaKategori->seo.'/'.$altKategori->seo]='home/kategori/'.$altKategori->Id;
          $altKategoriler2=$db->where('ust_kategori',$altKategori->Id)->get('kategoriler')->result();
          foreach ($altKategoriler2 as $altKategori2) {
            $route[$anaKategori->seo.'/'.$altKategori->seo.'/'.$altKategori2->seo]='home/kategori/'.$altKategori2->Id;
            $altKategoriler3=$db->where('ust_kategori',$altKategori2->Id)->get('kategoriler')->result();
            foreach ($altKategoriler3 as $altKategori3) {
              $route[$anaKategori->seo.'/'.$altKategori->seo.'/'.$altKategori2->seo.'/'.$altKategori3->seo]='home/kategori/'.$altKategori3->Id;
            }
          }
        }
      }*/
      $magazalar=$db->get('magazalar')->result();
      foreach ($magazalar as $magaza) {
        $route[$magaza->username]='home/magaza_goruntule/'.$magaza->username;
        $route[$magaza->username.'/(:any)']='home/magaza_goruntule/'.$magaza->username.'/$1';
        $route[$magaza->username.'/(:any)/(:any)']='home/magaza_goruntule/'.$magaza->username.'/$1/$2';
      }
      $anaKategoriler=$db->where('ust_kategori','0')->get('kategoriler')->result();
      foreach ($anaKategoriler as $anaKategori) {
        $route[$anaKategori->seo.'/(:num)']='home/kategori/$1';
        $route[$anaKategori->seo.'/(:any)/(:num)']='home/kategori/$2';
        $route[$anaKategori->seo.'/(:any)/(:any)/(:num)']='home/kategori/$3';
        $route[$anaKategori->seo.'/(:any)/(:any)/(:num)/(:num)']='home/kategori/$3';
        //$route[$anaKategori->seo.'/(:any)/(:any)/(:any)/(:num)']='home/kategori/$4';
        //$route[$anaKategori->seo.'/(:any)/(:any)/(:any)/(:any)/(:num)']='home/kategori/$5';

      }

      $route['sitemap\.xml'] = 'sitemap';

      $route['uyegiris'] = 'login';
      $route['uyeol'] = 'login/add';
      $route['cikis'] = 'account/logout';
      $route['emlak/konut/daire/satilik/(:any)/(:any)/(:any)']='ilanlar/listele/kategoriId/45/kategori2/46/kategori3/149/kategori4/151/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/daire/kiralik/(:any)/(:any)/(:any)']='ilanlar/listele/kategoriId/45/kategori2/46/kategori3/149/kategori4/152/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/mustakil-ev/satilik/(:any)/(:any)/(:any)']='ilanlar/listele/kategoriId/45/kategori2/46/kategori3/155/kategori4/16194/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/mustakil-ev/kiralik/(:any)/(:any)/(:any)']='ilanlar/listele/kategoriId/45/kategori2/46/kategori3/155/kategori4/16195/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/ciftlik-evi/satilik/(:any)/(:any)/(:any)']='ilanlar/listele/kategoriId/45/kategori2/46/kategori3/157/kategori4/16172/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/ciftlik-evi/kiralik/(:any)/(:any)/(:any)']='ilanlar/listele/kategoriId/45/kategori2/46/kategori3/157/kategori4/16173/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/is-yeri/satilik/(:any)/(:any)/(:any)']='ilanlar/listele/kategoriId/45/kategori2/47/kategori3/164/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/is-yeri/kiralik/(:any)/(:any)/(:any)']='ilanlar/listele/kategoriId/45/kategori2/47/kategori3/165/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/arsa/satilik/(:any)/(:any)/(:any)']='ilanlar/listele/kategoriId/45/kategori2/48/kategori3/167/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/arsa/kiralik/(:any)/(:any)/(:any)']='ilanlar/listele/kategoriId/45/kategori2/48/kategori3/168/il/$1/ilce/$2/mahalle/$3';
      $route['ilan/(:any)-(:num)']='home/ilan_goruntule/$2';

      $route['404_override'] = '';
      $route['translate_uri_dashes'] = FALSE;
