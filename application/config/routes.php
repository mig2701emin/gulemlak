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
      $route['sitemap11\.xml'] = 'sitemap/sitemap11';
      $route['sitemap12\.xml'] = 'sitemap/sitemap12';
      $route['sitemap13\.xml'] = 'sitemap/sitemap13';
      $route['sitemap14\.xml'] = 'sitemap/sitemap14';
      $route['sitemap15\.xml'] = 'sitemap/sitemap15';
      $route['sitemap16\.xml'] = 'sitemap/sitemap16';
      $route['sitemap17\.xml'] = 'sitemap/sitemap17';
      $route['sitemap18\.xml'] = 'sitemap/sitemap18';
      $route['sitemap19\.xml'] = 'sitemap/sitemap19';
      $route['sitemap20\.xml'] = 'sitemap/sitemap20';
      $route['sitemap21\.xml'] = 'sitemap/sitemap21';
      $route['sitemap22\.xml'] = 'sitemap/sitemap22';
      $route['sitemap23\.xml'] = 'sitemap/sitemap23';
      $route['sitemap24\.xml'] = 'sitemap/sitemap24';
      $route['sitemap25\.xml'] = 'sitemap/sitemap25';
      $route['sitemap26\.xml'] = 'sitemap/sitemap26';
      $route['sitemap27\.xml'] = 'sitemap/sitemap27';
      $route['sitemap28\.xml'] = 'sitemap/sitemap28';
      $route['sitemap29\.xml'] = 'sitemap/sitemap29';
      $route['sitemap30\.xml'] = 'sitemap/sitemap30';
      $route['sitemap31\.xml'] = 'sitemap/sitemap31';
      $route['sitemap32\.xml'] = 'sitemap/sitemap32';
      $route['sitemap33\.xml'] = 'sitemap/sitemap33';
      $route['sitemap34\.xml'] = 'sitemap/sitemap34';
      $route['sitemap35\.xml'] = 'sitemap/sitemap35';
      $route['sitemap36\.xml'] = 'sitemap/sitemap36';
      $route['sitemap37\.xml'] = 'sitemap/sitemap37';
      $route['sitemap38\.xml'] = 'sitemap/sitemap38';
      $route['sitemap39\.xml'] = 'sitemap/sitemap39';
      $route['sitemap40\.xml'] = 'sitemap/sitemap40';
      $route['sitemap41\.xml'] = 'sitemap/sitemap41';
      $route['sitemap42\.xml'] = 'sitemap/sitemap42';
      $route['sitemap43\.xml'] = 'sitemap/sitemap43';
      $route['sitemap44\.xml'] = 'sitemap/sitemap44';
      $route['sitemap45\.xml'] = 'sitemap/sitemap45';
      $route['sitemap46\.xml'] = 'sitemap/sitemap46';
      $route['sitemap47\.xml'] = 'sitemap/sitemap47';
      $route['sitemap48\.xml'] = 'sitemap/sitemap48';
      $route['sitemap49\.xml'] = 'sitemap/sitemap49';
      $route['sitemap50\.xml'] = 'sitemap/sitemap50';
      $route['sitemap51\.xml'] = 'sitemap/sitemap51';
      $route['sitemap52\.xml'] = 'sitemap/sitemap52';
      $route['sitemap53\.xml'] = 'sitemap/sitemap53';
      $route['sitemap54\.xml'] = 'sitemap/sitemap54';
      $route['sitemap55\.xml'] = 'sitemap/sitemap55';
      $route['sitemap56\.xml'] = 'sitemap/sitemap56';
      $route['sitemap57\.xml'] = 'sitemap/sitemap57';
      $route['sitemap58\.xml'] = 'sitemap/sitemap58';
      $route['sitemap59\.xml'] = 'sitemap/sitemap59';
      $route['sitemap60\.xml'] = 'sitemap/sitemap60';
      $route['sitemap61\.xml'] = 'sitemap/sitemap61';
      $route['sitemap62\.xml'] = 'sitemap/sitemap62';
      $route['sitemap63\.xml'] = 'sitemap/sitemap63';
      $route['sitemap64\.xml'] = 'sitemap/sitemap64';
      $route['sitemap65\.xml'] = 'sitemap/sitemap65';
      $route['sitemap66\.xml'] = 'sitemap/sitemap66';
      $route['sitemap67\.xml'] = 'sitemap/sitemap67';
      $route['sitemap68\.xml'] = 'sitemap/sitemap68';
      $route['sitemap69\.xml'] = 'sitemap/sitemap69';
      $route['sitemap70\.xml'] = 'sitemap/sitemap70';
      $route['sitemap71\.xml'] = 'sitemap/sitemap71';
      $route['sitemap72\.xml'] = 'sitemap/sitemap72';
      $route['sitemap73\.xml'] = 'sitemap/sitemap73';
      $route['sitemap74\.xml'] = 'sitemap/sitemap74';
      $route['sitemap75\.xml'] = 'sitemap/sitemap75';
      $route['sitemap76\.xml'] = 'sitemap/sitemap76';
      $route['sitemap77\.xml'] = 'sitemap/sitemap77';
      $route['sitemap78\.xml'] = 'sitemap/sitemap78';
      $route['sitemap79\.xml'] = 'sitemap/sitemap79';
      $route['sitemap80\.xml'] = 'sitemap/sitemap80';
      $route['sitemap81\.xml'] = 'sitemap/sitemap81';
      $route['sitemap82\.xml'] = 'sitemap/sitemap82';
      $route['sitemap83\.xml'] = 'sitemap/sitemap83';

      $route['404_override'] = '';
      $route['translate_uri_dashes'] = FALSE;
