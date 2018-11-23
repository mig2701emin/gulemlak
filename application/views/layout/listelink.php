<div class="col-12" style="opacity:0">
  <?php
  if (isset($il)) {
    if (isset($ilce)) {
      foreach ($mahalleler as $mah) {
        $metin='<a href="';
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
        $metin.=$ilce->seo_ilce;
        $metin.='/';
        $metin.=$mah->seo_mahalle;
        $metin.='" rel="';
        $metin.=mb_convert_case(mb_strtolower($mah->mahalle_ad), MB_CASE_TITLE, 'UTF-8');
        $metin.=', ';
        if (count($kategorys) > 3) {
          $metin.=$kategorys[2]->kategori_adi.', '.$kategorys[3]->kategori_adi;
        }elseif (count($kategorys) > 2) {
          $metin.=$kategorys[2]->kategori_adi.', '.$kategorys[1]->kategori_adi;
        }elseif (count($kategorys) > 1) {
          $metin.='Satılık Kiralık '.$kategorys[1]->kategori_adi;
        }else {
          $metin.='Satılık Kiralık '.$kategorys[0]->kategori_adi;
        }
        $metin.=', ticaretmeclisi" style="font-size:1px;">';
        $metin.=mb_convert_case(mb_strtolower($mah->mahalle_ad), MB_CASE_TITLE, 'UTF-8');
        $metin.='</a>';
        echo $metin;
      }

    }else {
      foreach ($ilceler as $item) {
        $metin='<a href="';
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
        $metin.='" rel="';
        $metin.=mb_convert_case(mb_strtolower($item->ilce_ad), MB_CASE_TITLE, 'UTF-8');
        $metin.=', ';
        if (count($kategorys) > 3) {
          $metin.=$kategorys[2]->kategori_adi.', '.$kategorys[3]->kategori_adi;
        }elseif (count($kategorys) > 2) {
          $metin.=$kategorys[2]->kategori_adi.', '.$kategorys[1]->kategori_adi;
        }elseif (count($kategorys) > 1) {
          $metin.='Satılık Kiralık '.$kategorys[1]->kategori_adi;
        }else {
          $metin.='Satılık Kiralık '.$kategorys[0]->kategori_adi;
        }
        $metin.=', ticaretmeclisi" style="font-size:1px;">';
        $metin.=mb_convert_case(mb_strtolower($item->ilce_ad), MB_CASE_TITLE, 'UTF-8');
        $metin.='</a>';
        echo $metin;
      }
    }
  }else {
    foreach ($iller as $item) {
      $metin='<a href="';
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
      $metin.=$item->seo_il;
      $metin.='" rel="';
      $metin.=mb_convert_case(mb_strtolower($item->il_ad), MB_CASE_TITLE, 'UTF-8');
      $metin.=', ';
      if (count($kategorys) > 3) {
        $metin.=$kategorys[2]->kategori_adi.', '.$kategorys[3]->kategori_adi;
      }elseif (count($kategorys) > 2) {
        $metin.=$kategorys[2]->kategori_adi.', '.$kategorys[1]->kategori_adi;
      }elseif (count($kategorys) > 1) {
        $metin.='Satılık Kiralık '.$kategorys[1]->kategori_adi;
      }else {
        $metin.='Satılık Kiralık '.$kategorys[0]->kategori_adi;
      }
      $metin.=', ticaretmeclisi" style="font-size:1px;">';
      $metin.=mb_convert_case(mb_strtolower($item->il_ad), MB_CASE_TITLE, 'UTF-8');
      $metin.='</a>';
      echo $metin;
    }
  }
  ?>
</div>
