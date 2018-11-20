<!DOCTYPE html>
<html>
<head>
  <title>Ticaret Meclisi</title>
  <?php $this->load->view('layout/metas');?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>css/style.css"/>
</head>
<body class="color_bg1">
  <div class="se-pre-con"></div>
  <div class="main">
    <?php $this->load->view('layout/newuserheader');?>
    <div class="container">
      <div class="p-3 mb-2 bg-secondary text-white text-center"><strong>Ödeme Geçmişi</strong></div>
      <?php
      if($this->db->query("select Id from pos_ayarlar where status='1' limit 1")->num_rows()!=0){
      	$show_credit_card=1;
      }else{
      	$show_credit_card=0;
      }
      $paypal_check=$this->db->query("select * from paypal_ayarlar where status='1'");
      if($paypal_check->num_rows()!=0){
      	$show_paypal=1;
      	$paypal_details=$paypal_check->row();
      	$paypal_details_json=json_decode($paypal_details->login_details,true);
      }else{
      	$show_paypal=0;
      }
      ?>
      <?php
      $limit=10;
      $sayfa=0;
      $uye=$this->session->userdata('userdata')['userID'];
      if($filter=='tamam'){
      	$ek=" and durum='1'";
      }elseif($filter=='bekleyen'){
      	$ek=" and durum='0'";
      }
      $genel_sorgu_orj = $this->db->query("SELECT * FROM siparis WHERE uyeId = '".$uye."'".$ek." ORDER BY tarih DESC,durum ASC");
      $genel_sorgu = $this->db->query("SELECT * FROM siparis WHERE uyeId = '".$uye."'".$ek." ORDER BY tarih DESC,durum ASC limit $sayfa, ".$limit);
      $toplam_kayit=$genel_sorgu_orj->num_rows();
      ?>
      <table width="100%" cellpadding="1" class="v4_special_heads v4_order_list">
      	<tr>
      		<th style="width:70px">İşlem No</th>
      		<th style="width:190px">Tür</th>
      		<th style="width:65px">İlan No</th>
      		<th style="width:85px">Süre</th>
      		<th style="width:48px">Miktar</th>
      		<th style="width:80px">Tarih</th>
      		<th style="width:90px">Durum</th>
      		<th>İşlem</th>
      	</tr>
      			<?php if($toplam_kayit==0){?>
      		    <td colspan="8">Ödeme Bulunamadı.</td>
      			<?php
      			}else{
      				$i=0;
      			foreach ($genel_sorgu->result() as $odeme) {
      				if($odeme->durum==1){$status_bg="C8FDB0";}else{$status_bg="FFAEAE";$pending_list[]=$odeme->Id;$pending_total[]=$odeme->tutar;}
      				?>
      			  <tr style="background:#<?php echo $status_bg;?>">
      			    <td><?php echo $odeme->islemno;?></td>
      			    <td><?php echo $odeme->doping;?></td>
      			    <td><?php if($odeme->firmaId==0){?>Yok<?php }else{$iln_detay=$this->db->query("select firma_adi,seo_url from firmalar where Id='".$odeme->firmaId."'")->row();?><a href="<?php echo base_url();?><?php echo seo_link($iln_detay->seo_url)."/".encode($odeme->firmaId);?>"><?php echo $odeme->firmaId;?></a><?php }?></td>
      			    <td><?php echo doping_time($odeme->sure);?></td>
      			    <td><?php echo $odeme->tutar;?> TL</td>
      			    <td><?php echo yeni_tarih($odeme->tarih);?></td>
      			    <td><?php if($odeme->durum==1){?>Tamamlandı<?php }else{?>Ödeme Bekliyor<?php }?></td>
      			    <td>
      						<?php if($odeme->durum==0){?>
      							<a class="v4_special_button_active" href="javascript:pay_now('<?php echo $odeme->Id;?>','<?php echo $show_paypal;?>');" style="width:70px;float:left">Ödeme Yap</a>
      							<a class="v4_special_button" href="<?php echo base_url();?>index.php?page=banaozel&type=odemeler&action=delete&Id=<?php echo $odeme->Id;?>" style="width:45px;float:left;margin-left:5px">İptal Et</a>
      							<div style="clear:both"></div>
      						<?php }else{?>
      							<a class="pay_completed">Ödeme Tamamlandı</a>
      						<?php }?>
      					</td>
      				</tr>
      			<?php $i++;
      		}
      	}?>
      </table>
      <?php if($toplam_kayit!=0){?>
      <?php if(count($pending_total)!=0){?><div class="pay_total">Ödenmesi Gereken Toplam Ücret : <?php echo array_sum($pending_total);?> TL</div><div style="clear:both"></div><?php }?>
      <?php if(count($pending_list)!=0){?><a class="v4_special_button_active" href="javascript:pay_now('<?php echo implode(",",$pending_list);?>','<?php echo $show_paypal;?>');" style="float:right;margin-top:5px">Tümünü Öde</a><?php }?>
      	<div id="pay_now" style="display:none">
      	<div id="tabs">
      	<ul>
      	<?php if($show_credit_card=='1'){?><li><a href="#pay_credit_cart">Kredi Kartı İle Öde</a></li><?php }?>
      	<?php if($show_paypal=='1'){?><li><a href="#pay_paypal">Paypal İle Öde</a></li><?php }?>
      	</ul>
      	<?php if($show_credit_card=='1'){?>
      	<div id="pay_credit_cart">
      	<form action="<?php echo base_url();?>odeme-kontrol.php" method="post" class="mega_size_fields" id="pay_form">
      	<div id="pay_status"></div>
      	<input type="hidden" name="post" value="1">
      	<input type="hidden" name="item_Id" id="item_Id">
      	<dt>Kart Numarası :</dt>
      	<dd><input type="text" name="card_number" autocomplete="off"></dd>
      	<div style="clear:both"></div>
      	<dt>Kart CVV Numarası :</dt>
      	<dd><input type="text" name="card_cvv" autocomplete="off"></dd>
      	<div style="clear:both"></div>
      	<dt>Kart Son Kullanım Tarihi :</dt>
      	<dd><select name="card_end_month" style="width:95px">
      	<option value="">Seçiniz</option>
      	<option value="01">Ocak</option>
      	<option value="02">Şubat</option>
      	<option value="03">Mart</option>
      	<option value="04">Nisan</option>
      	<option value="05">Mayıs</option>
      	<option value="06">Haziran</option>
      	<option value="07">Temmuz</option>
      	<option value="08">Ağustos</option>
      	<option value="09">Eylül</option>
      	<option value="10">Ekim</option>
      	<option value="11">Kasım</option>
      	<option value="12">Aralık</option>
      	</select>
      	<select name="card_end_year" style="margin-left:10px;width:95px">
      	<option value="">Seçiniz</option>
      	<?php for  ($i = date('Y'); $i <= date('Y')+10; $i++) {?>
      	<option value="<?php echo substr($i,2,4);?>"><?php echo $i;?></option>
      	<?php }?>
      	</select>
      	</dd>
      	<div style="clear:both"></div>
      	<input type="submit" value="Devam Et" class="v4_special_button_active" style="margin:5px 0 0 165px">
      	</form>
      	</div>
      	<?php }if($show_paypal=='1'){?>
      	<div id="pay_paypal">
      	<div id="paypal_form"></div>
      	</div>
      	<?php }?>
      	</div>
      	</div>
      	<script>
      	$(document).ready(function(){$("#tabs").tabs();});
      	</script>
      	<?php }?>
    </div>
    <?php $this->load->view('layout/footer');?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/');?>js/script.js"></script>
  <script src="<?php echo base_url('assets/noty/packaged/jquery.noty.packaged.min.js'); ?>"></script>
  <?php if(flashdata()){ ?>
      <script type="text/javascript">
          generate(<?php echo flashdata(); ?>);
      </script>
  <?php } ?>
</body>
</html>
