<div class="col-12">
  <?php
  $mahalleler=$this->db->where("ilce_id",$konum["ilce"])->get("tbl_mahalle")->result();
  $ilce=$this->db->where("ilce_id",$konum["ilce"])->get("tbl_ilce")->row();
  $il=$this->db->where("il_id",$konum["il"])->get("tbl_il")->row();
  foreach ($mahalleler as $mah) {
    $metin='<a href="https://www.ticaretmeclisi.com/emlak/';
    $metin.=$kategorys[1]->seo;
    $metin.='/';
    $metin.=$kategorys[2]->seo;
    $metin.='/';
    if (count($kategorys) > 3) {
      $metin.=$kategorys[3]->seo;
      $metin.='/';
    }
    $metin.=$il->seo_il;
    $metin.='/';
    $metin.=$ilce->seo_ilce;
    $metin.='/';
    $metin.=$mah->seo_mahalle;
    $metin.='" rel="';
    $metin.=mb_convert_case(mb_strtolower($mah->mahalle_ad), MB_CASE_TITLE, 'UTF-8');
    $metin.=', ';
    $metin.=$kategorys[2]->kategori_adi;
    $metin.=', ';
    if (count($kategorys) > 3) {
      $metin.=$kategorys[3]->kategori_adi;
    }else {
      $metin.=$kategorys[1]->kategori_adi;
    }
    $metin.=', ticaretmeclisi" style="font-size:0.1em;color:#588585 !important">';
    $metin.=mb_convert_case(mb_strtolower($mah->mahalle_ad), MB_CASE_TITLE, 'UTF-8');
    $metin.='</a>';
    echo $metin;
  }
  ?>
</div>
