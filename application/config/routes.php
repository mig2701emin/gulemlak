<?php
defined('BASEPATH') OR exit('No direct script access allowed');

      $route['default_controller'] = 'home';
      $route['sitemap\.xml'] = 'home/sitemap';
      $route['sitemap1\.xml'] = 'home/sitemap/kategori';
      $route['sitemap2\.xml'] = 'home/sitemap/ilan';

      require_once (BASEPATH.'database/DB.php');
      $db=& DB();
      $anaKategoriler=$db->select('Id, seo')->where('ust_kategori','0')->get('kategoriler')->result();
      foreach ($anaKategoriler as $anaKategori) {
        $route[$anaKategori->seo."/(:num)"]="listele/get/$1";
        $route[$anaKategori->seo."/(:num)/sitemap\.xml"]="home/sitemap/$1";
        $route[$anaKategori->seo."/(:num)/(:num)"]="listele/get/$1";
        $route[$anaKategori->seo."/(:num)/(:any)"]="listele/get/$1/$2";
        $route[$anaKategori->seo."/(:any)/(:num)"]="listele/get/$2";
        $route[$anaKategori->seo."/(:num)/(:any)/sitemap\.xml"]="home/sitemap/$1/$2";
        $route[$anaKategori->seo."/(:num)/(:any)/(:num)"]="listele/get/$1/$2";
        $route[$anaKategori->seo."/(:num)/(:any)/(:any)"]="listele/get/$1/$2/$3";
        $route[$anaKategori->seo."/(:any)/(:num)/(:num)"]="listele/get/$2";
        $route[$anaKategori->seo."/(:any)/(:num)/sitemap\.xml"]="home/sitemap/$2";
        $route[$anaKategori->seo."/(:any)/(:num)/(:any)"]="listele/get/$2/$3";
        $route[$anaKategori->seo."/(:any)/(:any)/(:num)"]="listele/get/$3";
        $route[$anaKategori->seo."/(:num)/(:any)/(:any)/sitemap\.xml"]="home/sitemap/$1/$2/$3";
        $route[$anaKategori->seo."/(:num)/(:any)/(:any)/(:num)"]="listele/get/$1/$2/$3";
        $route[$anaKategori->seo."/(:num)/(:any)/(:any)/(:any)"]="listele/get/$1/$2/$3/$4";
        $route[$anaKategori->seo."/(:any)/(:num)/(:any)/sitemap\.xml"]="home/sitemap/$2/$3";
        $route[$anaKategori->seo."/(:any)/(:num)/(:any)/(:num)"]="listele/get/$2/$3";
        $route[$anaKategori->seo."/(:any)/(:num)/(:any)/(:any)"]="listele/get/$2/$3/$4";
        $route[$anaKategori->seo."/(:any)/(:any)/(:num)/sitemap\.xml"]="home/sitemap/$3";
        $route[$anaKategori->seo."/(:any)/(:any)/(:num)/(:num)"]="listele/get/$3";
        $route[$anaKategori->seo."/(:any)/(:any)/(:num)/(:any)"]="listele/get/$3/$4";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:num)"]="listele/get/$4";
        $route[$anaKategori->seo."/(:num)/(:any)/(:any)/(:any)/(:num)"]="listele/get/$5";
        $route[$anaKategori->seo."/(:any)/(:num)/(:any)/(:any)/sitemap\.xml"]="home/sitemap/$2/$3/$4";
        $route[$anaKategori->seo."/(:any)/(:num)/(:any)/(:any)/(:num)"]="listele/get/$2/$3/$4";
        $route[$anaKategori->seo."/(:any)/(:num)/(:any)/(:any)/(:any)"]="listele/get/$2/$3/$4/$5";
        $route[$anaKategori->seo."/(:any)/(:any)/(:num)/(:any)/sitemap\.xml"]="home/sitemap/$3/$4";
        $route[$anaKategori->seo."/(:any)/(:any)/(:num)/(:any)/(:num)"]="listele/get/$3/$4";
        $route[$anaKategori->seo."/(:any)/(:any)/(:num)/(:any)/(:any)"]="listele/get/$3/$4/$5";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:num)/sitemap\.xml"]="home/sitemap/$4";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:num)/(:num)"]="listele/get/$4";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:num)/(:any)"]="listele/get/$4/$5";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:any)/(:num)"]="listele/get/$5";
        $route[$anaKategori->seo."/(:any)/(:num)/(:any)/(:any)/(:any)/(:num)"]="listele/get/$2/$3/$4/$5";
        $route[$anaKategori->seo."/(:any)/(:any)/(:num)/(:any)/(:any)/sitemap\.xml"]="home/sitemap/$3/$4/$5";
        $route[$anaKategori->seo."/(:any)/(:any)/(:num)/(:any)/(:any)/(:num)"]="listele/get/$3/$4/$5";
        $route[$anaKategori->seo."/(:any)/(:any)/(:num)/(:any)/(:any)/(:any)"]="listele/get/$3/$4/$5/$6";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:num)/(:any)/sitemap\.xml"]="home/sitemap/$4/$5";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:num)/(:any)/(:num)"]="listele/get/$4/$5";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:num)/(:any)/(:any)"]="listele/get/$4/$5/$6";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:any)/(:num)/(:num)"]="listele/get/$5";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:any)/(:num)/(:any)"]="listele/get/$5/$6";
        $route[$anaKategori->seo."/(:any)/(:any)/(:num)/(:any)/(:any)/(:any)/(:num)"]="listele/get/$3/$4/$5/$6";
        $route[$anaKategori->seo."/(:any)/(:any)/(:num)/(:any)/(:any)/(:any)/(:any)"]="home/ilan_goruntule/$7";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:num)/(:any)/(:any)/sitemap\.xml"]="home/sitemap/$4/$5/$6";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:num)/(:any)/(:any)/(:num)"]="listele/get/$4/$5/$6";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:num)/(:any)/(:any)/(:any)"]="listele/get/$4/$5/$6/$7";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:any)/(:num)/(:any)/(:num)"]="listele/get/$5/$6";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:any)/(:num)/(:any)/(:any)"]="listele/get/$5/$6/$7";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:num)/(:any)/(:any)/(:any)/(:num)"]="listele/get/$4/$5/$6/$7";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:any)/(:num)/(:any)/(:any)/(:any)"]="listele/get/$5/$6/$7/$8";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:any)/(:num)/(:any)/(:any)/(:any)/(:num)"]="listele/get/$5/$6/$7/$8";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:num)/(:any)/(:any)/(:any)/(:any)"]="home/ilan_goruntule/$8";
        $route[$anaKategori->seo."/(:any)/(:any)/(:any)/(:any)/(:num)/(:any)/(:any)/(:any)/(:any)"]="home/ilan_goruntule/$9";
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


      $route['404_override'] = '';
      $route['translate_uri_dashes'] = FALSE;
