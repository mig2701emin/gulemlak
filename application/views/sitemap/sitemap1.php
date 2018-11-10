<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
    <loc><?php echo base_url();?></loc>
    <priority>1.0</priority>
  </url>
    <!-- Sitemap -->
    <?php
    $mainKategori= 'emlak';
    $item1 = 'konut';
    $item2 = 'is-yeri';
    $item3 = 'arsa';
    $firstSubs=array($item1,$item2,$item3);

    foreach ($firstSubs as $firstSub) {
          $item1 = 'satilik';
          $item2 = 'kiralik';
          $secondSubs=array($item1,$item2);

      foreach ($secondSubs as $secondSub) {
        switch($firstSub){
          case 'is-yeri':
          case 'arsa':
          $link=$mainKategori."/".$firstSub."/".$secondSub;
    ?>

  <url>
      <loc><?php echo base_url().$link; ?></loc>
  </url>
    <?php
          break;
          case 'konut':
            $item1 = 'daire';
            $item2 = 'mustakil-ev';
            $item3 = 'ciftlik-evi';
            $thirdSubs=array($item1,$item2,$item3);
            foreach ($thirdSubs as $thirdSub) {
              $link=$mainKategori."/".$firstSub."/".$secondSub."/".$thirdSub;

    ?>

  <url>
      <loc><?php echo base_url().$link; ?></loc>
  </url>
    <?php
            }
          break;
        }
      }
    }
 ?>
</urlset>
