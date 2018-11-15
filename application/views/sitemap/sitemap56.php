<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php
    $il=$this->db->query("select il_id, il_ad, seo_il from tbl_il where il_id=53")->row();
    $ilceler=$this->db->query("select ilce_id, ilce_ad, seo_ilce from tbl_ilce where il_id=53")->result();
    foreach ($ilceler as $ilce) {
      $mahalleler=$this->db->query("select mahalle_id, mahalle_ad, seo_mahalle from tbl_mahalle where ilce_id=".$ilce->ilce_id)->result();
      foreach ($mahalleler as $mahalle) {?>
        <loc><?php echo base_url(); ?>emlak/konut/satilik/daire/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/<?php echo $mahalle->seo_mahalle; ?></loc>
        <loc><?php echo base_url(); ?>emlak/konut/kiralik/daire/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/<?php echo $mahalle->seo_mahalle; ?></loc>
        <loc><?php echo base_url(); ?>emlak/konut/satilik/mustakil-ev/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/<?php echo $mahalle->seo_mahalle; ?></loc>
        <loc><?php echo base_url(); ?>emlak/konut/kiralik/mustakil-ev/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/<?php echo $mahalle->seo_mahalle; ?></loc>
        <loc><?php echo base_url(); ?>emlak/konut/satilik/ciftlik-evi/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/<?php echo $mahalle->seo_mahalle; ?></loc>
        <loc><?php echo base_url(); ?>emlak/konut/kiralik/ciftlik-evi/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/<?php echo $mahalle->seo_mahalle; ?></loc>
        <loc><?php echo base_url(); ?>emlak/isyeri/satilik/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/<?php echo $mahalle->seo_mahalle; ?></loc>
        <loc><?php echo base_url(); ?>emlak/isyeri/kiralik/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/<?php echo $mahalle->seo_mahalle; ?></loc>
        <loc><?php echo base_url(); ?>emlak/arsa/satilik/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/<?php echo $mahalle->seo_mahalle; ?></loc>
        <loc><?php echo base_url(); ?>emlak/arsa/kiralik/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/<?php echo $mahalle->seo_mahalle; ?></loc>
      <?php }
    }
 ?>
</urlset>
