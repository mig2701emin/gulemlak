<?php
defined('BASEPATH') OR exit('No direct script access allowed');

      $route['default_controller'] = 'home';

      require_once (BASEPATH.'database/DB.php');
      $db=& DB();
      $anaKategoriler=$db->select('Id, seo')->where('ust_kategori','0')->get('kategoriler')->result();
      foreach ($anaKategoriler as $anaKategori) {
        $route[$anaKategori->seo."/(:any)"]="home/kategori/$1";
        $route[$anaKategori->seo."/(:any)/(:num)"]="home/kategori/$1";
        $route[$anaKategori->seo."/(:any)/(:any)"]="home/kategori/$2";
        $route[$anaKategori->seo."/(:any)/(:any)/(:num)"]="home/kategori/$2";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)"]="home/kategori/$3";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:num)"]="home/kategori/$3";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:any)"]="home/kategori/$4";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:any)/(:num)"]="home/kategori/$4";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:any)/(:any)"]="home/kategori/$5";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:any)/(:any)/(:num)"]="home/kategori/$5";
      }
      $magazalar=$db->get('magazalar')->result();
      foreach ($magazalar as $magaza) {
        $route[$magaza->username]='home/magaza_goruntule/'.$magaza->username;
        $route[$magaza->username.'/(:any)']='home/magaza_goruntule/'.$magaza->username.'/$1';
        $route[$magaza->username.'/(:any)/(:any)']='home/magaza_goruntule/'.$magaza->username.'/$1/$2';
      }

      $route['sitemap\.xml'] = 'sitemap/sitemap';
      $route['sitemap1\.xml'] = 'sitemap/sitemap1';
      $route['sitemap2\.xml'] = 'sitemap/sitemap2';
      $route['sitemap3\.xml'] = 'sitemap/sitemap3';
      $route['sitemap4\.xml'] = 'sitemap/sitemap4';
      $route['sitemap5\.xml'] = 'sitemap/sitemap5';
      $route['sitemap6\.xml'] = 'sitemap/sitemap6';
      $route['sitemap7\.xml'] = 'sitemap/sitemap7';
      $route['sitemap8\.xml'] = 'sitemap/sitemap8';
      $route['sitemap9\.xml'] = 'sitemap/sitemap9';
      $route['sitemap10\.xml'] = 'sitemap/sitemap10';


      $route['uyegiris'] = 'login';
      $route['uyeol'] = 'login/add';
      $route['cikis'] = 'account/logout';

      $route['daire/satilik/(:any)/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/149/il/$1/ilce/$2/mahalle/$4';
      $route['daire/kiralik/(:any)/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/75/il/$1/ilce/$2/mahalle/$4';
      $route['daire/satilik/(:any)/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/149/il/$1/ilce/$2/mahalle/$4';
      $route['daire/kiralik/(:any)/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/75/il/$1/ilce/$2/mahalle/$4';

      $route['is-yeri/satilik/(:any)/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/47/kategori3/164/il/$1/ilce/$2/mahalle/$4';
      $route['is-yeri/kiralik/(:any)/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/47/kategori3/165/il/$1/ilce/$2/mahalle/$4';
      $route['is-yeri/satilik/(:any)/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/47/kategori3/164/il/$1/ilce/$2/mahalle/$4';
      $route['is-yeri/kiralik/(:any)/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/47/kategori3/165/il/$1/ilce/$2/mahalle/$4';

      $route['arsa/satilik/(:any)/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/48/kategori3/167/il/$1/ilce/$2/mahalle/$4';
      $route['arsa/kiralik/(:any)/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/48/kategori3/168/il/$1/ilce/$2/mahalle/$4';
      $route['arsa/satilik/(:any)/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/48/kategori3/167/il/$1/ilce/$2/mahalle/$4';
      $route['arsa/kiralik/(:any)/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/48/kategori3/168/il/$1/ilce/$2/mahalle/$4';

      $route['emlak/konut/satilik/daire/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/149/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/satilik/daire/(:any)/(:any)/(:any)/(:num)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/149/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/kiralik/daire/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/75/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/kiralik/daire/(:any)/(:any)/(:any)/(:num)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/75/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/satilik/mustakil-ev/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/155/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/satilik/mustakil-ev/(:any)/(:any)/(:any)/(:num)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/155/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/kiralik/mustakil-ev/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/728/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/kiralik/mustakil-ev/(:any)/(:any)/(:any)/(:num)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/728/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/satilik/ciftlik-evi/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/157/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/satilik/ciftlik-evi/(:any)/(:any)/(:any)/(:num)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/157/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/kiralik/ciftlik-evi/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/726/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/kiralik/ciftlik-evi/(:any)/(:any)/(:any)/(:num)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/726/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/isyeri/satilik/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/47/kategori3/164/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/isyeri/satilik/(:any)/(:any)/(:any)/(:num)']='ilanlar/kategori/kategoriId/45/kategori2/47/kategori3/164/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/isyeri/kiralik/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/47/kategori3/165/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/isyeri/kiralik/(:any)/(:any)/(:any)/(:num)']='ilanlar/kategori/kategoriId/45/kategori2/47/kategori3/165/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/arsa/satilik/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/48/kategori3/167/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/arsa/satilik/(:any)/(:any)/(:any)/(:num)']='ilanlar/kategori/kategoriId/45/kategori2/48/kategori3/167/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/arsa/kiralik/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/48/kategori3/168/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/arsa/kiralik/(:any)/(:any)/(:any)/(:num)']='ilanlar/kategori/kategoriId/45/kategori2/48/kategori3/168/il/$1/ilce/$2/mahalle/$3';

      $route['emlak/konut/daire/satilik/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/149/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/daire/kiralik/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/75/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/mustakil-ev/satilik/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/155/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/mustakil-ev/kiralik/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/728/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/ciftlik-evi/satilik/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/157/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/ciftlik-evi/kiralik(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/726/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/is-yeri/satilik/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/47/kategori3/164/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/is-yeri/kiralik/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/47/kategori3/165/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/arsa/satilik/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/48/kategori3/167/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/arsa/kiralik/(:any)/(:any)/(:any)/index\.html']='ilanlar/kategori/kategoriId/45/kategori2/48/kategori3/168/il/$1/ilce/$2/mahalle/$3';


      $route['emlak/konut/daire/satilik/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/149/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/daire/kiralik/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/75/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/mustakil-ev/satilik/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/155/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/mustakil-ev/kiralik/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/728/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/ciftlik-evi/satilik/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/49/kategori4/157/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/konut/ciftlik-evi/kiralik(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/46/kategori3/67/kategori4/726/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/is-yeri/satilik/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/47/kategori3/164/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/is-yeri/kiralik/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/47/kategori3/165/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/arsa/satilik/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/48/kategori3/167/il/$1/ilce/$2/mahalle/$3';
      $route['emlak/arsa/kiralik/(:any)/(:any)/(:any)']='ilanlar/kategori/kategoriId/45/kategori2/48/kategori3/168/il/$1/ilce/$2/mahalle/$3';
      $route['ilan/(:any)-(:num)']='home/ilan_goruntule/$2';

      $route['404_override'] = '';
      $route['translate_uri_dashes'] = FALSE;
