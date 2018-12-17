<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php
  if (isset($il)) {
    foreach ($ilceler as $item) {
      $metin='<loc>';
      $metin.=base_url();
      $metin.=$kategorys[0]->seo;
      $metin.='/';
      if (count($kategorys) > 1) {
        $metin.=$kategorys[1]->seo;
        $metin.='/';
      }
      if (count($kategorys) > 2) {
        $metin.=$kategorys[2]->seo;
        $metin.='/';
      }
      if (count($kategorys) > 3) {
        $metin.=$kategorys[3]->seo;
        $metin.='/';
      }
      if (count($kategorys) > 4) {
        $metin.=$kategorys[4]->seo;
        $metin.='/';
      }
      $metin.=$kategori->Id;
      $metin.='/';
      $metin.=$il->seo_il;
      $metin.='/';
      $metin.=$item->seo_ilce;
      $metin.='</loc>';
      echo $metin;
      $mahlar=$this->db->where("ilce_id",$item->ilce_id)->get("tbl_mahalle")->result();
      foreach ($mahlar as $mah) {
        $metin='<loc>';
        $metin.=base_url();
        $metin.=$kategorys[0]->seo;
        $metin.='/';
        if (count($kategorys) > 1) {
          $metin.=$kategorys[1]->seo;
          $metin.='/';
        }
        if (count($kategorys) > 2) {
          $metin.=$kategorys[2]->seo;
          $metin.='/';
        }
        if (count($kategorys) > 3) {
          $metin.=$kategorys[3]->seo;
          $metin.='/';
        }
        if (count($kategorys) > 4) {
          $metin.=$kategorys[4]->seo;
          $metin.='/';
        }
        $metin.=$kategori->Id;
        $metin.='/';
        $metin.=$il->seo_il;
        $metin.='/';
        $metin.=$item->seo_ilce;
        $metin.='/';
        $metin.=$mah->seo_mahalle;
        $metin.='</loc>';
        echo $metin;
      }
    }
  }/*else {
    foreach ($iller as $item) {
      $metin='<loc>';
      $metin.=base_url();
      $metin.=$kategorys[0]->seo;
      $metin.='/';
      if (count($kategorys) > 1) {
        $metin.=$kategorys[1]->seo;
        $metin.='/';
      }
      if (count($kategorys) > 2) {
        $metin.=$kategorys[2]->seo;
        $metin.='/';
      }
      if (count($kategorys) > 3) {
        $metin.=$kategorys[3]->seo;
        $metin.='/';
      }
      if (count($kategorys) > 4) {
        $metin.=$kategorys[4]->seo;
        $metin.='/';
      }
      $metin.=$kategori->Id;
      $metin.='/';
      $metin.=$il->seo_il;
      $metin.='</loc>';
      echo $metin;
    }
  }*/
  ?>
</urlset>
