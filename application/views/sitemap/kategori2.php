<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc><?php echo base_url();?></loc>
    <priority>0.5</priority>
  </url>
  <?php
    $magazalar=$this->db->query("select Id, magazaadi, username from magazalar")->result();
    foreach ($magazalar as $magaza) {?>
      <url>
          <loc><?php echo base_url(); ?><?php echo $magaza->username; ?></loc>
      </url>
    <?php }
  ?>
    <?php
    $anaKategoriler=$this->db->query("select Id, kategori_adi, seo from kategoriler where ust_kategori=0");
    foreach ($anaKategoriler->result() as $anaKategori) {?>
      <url>
        <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $anaKategori->Id; ?></loc>
      </url>
      <?php
      $firstSubs=$this->db->query("select Id, kategori_adi, seo from kategoriler where ust_kategori=".$anaKategori->Id);
      foreach ($firstSubs->result() as $firstSub) {?>
        <url>
          <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $firstSub->Id; ?></loc>
        </url>
        <?php
        $secondSubs=$this->db->query("select Id, kategori_adi, seo from kategoriler where ust_kategori=".$firstSub->Id);
        foreach ($secondSubs->result() as $secondSub) {?>
          <url>
            <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $secondSub->seo; ?>/<?php echo $secondSub->Id; ?></loc>
          </url>
          <?php
          $thirdSubs=$this->db->query("select Id, kategori_adi, seo from kategoriler where ust_kategori=".$secondSub->Id);
          if ($thirdSubs->num_rows() > 0) {
            foreach ($thirdSubs->result() as $thirdSub) {?>
              <url>
                  <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $secondSub->seo; ?>/<?php echo $thirdSub->seo; ?>/<?php echo $thirdSub->Id; ?></loc>
              </url>
              <?php
              $fourSubs=$this->db->query("select Id, kategori_adi, seo from kategoriler where ust_kategori=".$thirdSub->Id);
              if ($fourSubs->num_rows() > 0) {
                foreach ($fourSubs->result() as $fourSub) {?>
                  <url>
                      <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $secondSub->seo; ?>/<?php echo $thirdSub->seo; ?>/<?php echo $fourSub->seo; ?>/<?php echo $fourSub->Id; ?></loc>
                  </url>
                <?php
                }
              }
            }
          }
        }
      }
    }
 ?>
</urlset>
