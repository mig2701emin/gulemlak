<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
   <sitemap>
      <loc><?php echo base_url();?>sitemap1.xml</loc>
   </sitemap>
   <sitemap>
      <loc><?php echo base_url();?>sitemap2.xml</loc>
   </sitemap>
   <?php
   //$anaKategoriler=$this->db->query("select Id, kategori_adi, seo from kategoriler where ust_kategori=0");
   // foreach ($anaKategoriler->result() as $anaKategori) {
   $anaKategori=$this->db->query("select Id, kategori_adi, seo from kategoriler where Id=45")->row();
   ?>
     <sitemap>
       <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $anaKategori->Id; ?>/sitemap.xml</loc>
     </sitemap>
     <?php $iller=$this->db->get("tbl_il")->result(); ?>
     <?php foreach ($iller as $il): ?>
       <sitemap>
         <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $anaKategori->Id; ?>/<?php echo $il->seo_il; ?>/sitemap.xml</loc>
       </sitemap>
       <?php $ilceler=$this->db->where("il_id",$il->il_id)->get("tbl_ilce")->result(); ?>
       <?php foreach ($ilceler as $ilce): ?>
         <sitemap>
           <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $anaKategori->Id; ?>/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/sitemap.xml</loc>
         </sitemap>
       <?php endforeach; ?>
     <?php endforeach; ?>
     <?php
     $firstSubs=$this->db->query("select Id, kategori_adi, seo from kategoriler where ust_kategori=".$anaKategori->Id);
     foreach ($firstSubs->result() as $firstSub) {?>
       <sitemap>
         <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $firstSub->Id; ?>/sitemap.xml</loc>
       </sitemap>
       <?php foreach ($iller as $il): ?>
         <sitemap>
           <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $firstSub->Id; ?>/<?php echo $il->seo_il; ?>/sitemap.xml</loc>
         </sitemap>
         <?php $ilceler=$this->db->where("il_id",$il->il_id)->get("tbl_ilce")->result(); ?>
         <?php foreach ($ilceler as $ilce): ?>
           <sitemap>
             <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $firstSub->Id; ?>/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/sitemap.xml</loc>
           </sitemap>
         <?php endforeach; ?>
       <?php endforeach; ?>
       <?php
       $secondSubs=$this->db->query("select Id, kategori_adi, seo from kategoriler where ust_kategori=".$firstSub->Id);
       foreach ($secondSubs->result() as $secondSub) {?>
         <sitemap>
           <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $secondSub->seo; ?>/<?php echo $secondSub->Id; ?>/sitemap.xml</loc>
         </sitemap>
         <?php foreach ($iller as $il): ?>
           <sitemap>
             <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $secondSub->seo; ?>/<?php echo $secondSub->Id; ?>/<?php echo $il->seo_il; ?>/sitemap.xml</loc>
           </sitemap>
           <?php $ilceler=$this->db->where("il_id",$il->il_id)->get("tbl_ilce")->result(); ?>
           <?php foreach ($ilceler as $ilce): ?>
             <sitemap>
               <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $secondSub->seo; ?>/<?php echo $secondSub->Id; ?>/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/sitemap.xml</loc>
             </sitemap>
           <?php endforeach; ?>
         <?php endforeach; ?>
         <?php
         $thirdSubs=$this->db->query("select Id, kategori_adi, seo from kategoriler where ust_kategori=".$secondSub->Id);
         if ($thirdSubs->num_rows() > 0) {
           foreach ($thirdSubs->result() as $thirdSub) {?>
             <sitemap>
                 <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $secondSub->seo; ?>/<?php echo $thirdSub->seo; ?>/<?php echo $thirdSub->Id; ?>/sitemap.xml</loc>
             </sitemap>
             <?php foreach ($iller as $il): ?>
               <sitemap>
                 <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $secondSub->seo; ?>/<?php echo $thirdSub->seo; ?>/<?php echo $thirdSub->Id; ?>/<?php echo $il->seo_il; ?>/sitemap.xml</loc>
               </sitemap>
               <?php $ilceler=$this->db->where("il_id",$il->il_id)->get("tbl_ilce")->result(); ?>
               <?php foreach ($ilceler as $ilce): ?>
                 <sitemap>
                   <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $secondSub->seo; ?>/<?php echo $thirdSub->seo; ?>/<?php echo $thirdSub->Id; ?>/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/sitemap.xml</loc>
                 </sitemap>
               <?php endforeach; ?>
             <?php endforeach; ?>
             <?php
             $fourSubs=$this->db->query("select Id, kategori_adi, seo from kategoriler where ust_kategori=".$thirdSub->Id);
             if ($fourSubs->num_rows() > 0) {
               foreach ($fourSubs->result() as $fourSub) {?>
                 <sitemap>
                     <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $secondSub->seo; ?>/<?php echo $thirdSub->seo; ?>/<?php echo $fourSub->seo; ?>/<?php echo $fourSub->Id; ?>/sitemap.xml</loc>
                 </sitemap>
                 <?php foreach ($iller as $il): ?>
                   <sitemap>
                     <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $secondSub->seo; ?>/<?php echo $thirdSub->seo; ?>/<?php echo $fourSub->seo; ?>/<?php echo $fourSub->Id; ?>/<?php echo $il->seo_il; ?>/sitemap.xml</loc>
                   </sitemap>
                   <?php $ilceler=$this->db->where("il_id",$il->il_id)->get("tbl_ilce")->result(); ?>
                   <?php foreach ($ilceler as $ilce): ?>
                     <sitemap>
                       <loc><?php echo base_url(); ?><?php echo $anaKategori->seo; ?>/<?php echo $firstSub->seo; ?>/<?php echo $secondSub->seo; ?>/<?php echo $thirdSub->seo; ?>/<?php echo $fourSub->seo; ?>/<?php echo $fourSub->Id; ?>/<?php echo $il->seo_il; ?>/<?php echo $ilce->seo_ilce; ?>/sitemap.xml</loc>
                     </sitemap>
                   <?php endforeach; ?>
                 <?php endforeach; ?>
               <?php
               }
             }
           }
         }
       }
     }
   //}
   ?>
</sitemapindex>
