<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php
    $ilanlar=$this->db->query("select Id,ilanId, seo_url from firmalar where onay=1")->result();
    foreach ($ilanlar as $ilan) {?>
      <url>
          <loc><?php echo base_url(); ?><?php echo $ilan->seo_url; ?>-<?php echo $ilan->Id; ?></loc>
      </url>
    <?php }
  ?>
</urlset>
