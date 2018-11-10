<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url();?></loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>


    <!-- Sitemap -->
    <?php
    //for ($i=1; $i <82 ; $i++) {
      $il="link_27";

      $linkler=$this->db->get($il)->result();
      foreach($linkler as $item) { ?>
    <url>
        <loc><?php echo base_url().$item->link; ?></loc>
    </url>
  <?php }
//} ?>


</urlset>
