<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php
    $magazalar=$this->db->query("select Id, magazaadi, username from magazalar")->result();
    foreach ($magazalar as $magaza) {?>
      <url>
          <loc><?php echo base_url(); ?><?php echo $magaza->username; ?></loc>
      </url>
    <?php }
  ?>
</urlset>
