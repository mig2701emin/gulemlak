<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seourl extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $ilanlar=$this->db->query("select * from firmalar")->result();
    foreach ($ilanlar as $ilan) {
      $seo_url = replace("kategoriler","seo","Id",$ilan->kategoriId);
      $seo_url.= "/".replace("kategoriler","seo","Id",$ilan->kategori2);
      $seo_url.= "/".replace("kategoriler","seo","Id",$ilan->kategori3);
      if ($ilan->kategori4 >0 ) {
        $seo_url.= "/".replace("kategoriler","seo","Id",$ilan->kategori4);
      }
      if ($ilan->kategori5 >0 ) {
        $seo_url.= "/".replace("kategoriler","seo","Id",$ilan->kategori5);
      }
      if ($ilan->kategori5 >0 ) {
        $seo_url.= "/".$ilan->kategori5;
      }elseif ($ilan->kategori4 >0 ) {
        $seo_url.= "/".$ilan->kategori4;
      }elseif ($ilan->kategori3 >0 ) {
        $seo_url.= "/".$ilan->kategori3;
      }elseif ($ilan->kategori2 >0 ) {
        $seo_url.= "/".$ilan->kategori2;
      }
      $seo_url.= "/".replace("tbl_il","seo_il","il_id",$ilan->il);
      $seo_url.= "/".replace("tbl_ilce","seo_ilce","ilce_id",$ilan->ilce);
      $seo_url.= "/".replace("tbl_mahalle","seo_mahalle","mahalle_id",$ilan->mahalle);
      $this->db->query("update firmalar set seo_url='".$seo_url."' where Id=".$ilan->Id);
    }
    echo "bitti";
  }

}
