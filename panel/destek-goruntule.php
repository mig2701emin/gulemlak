<?
include('header.php'); 
$action=guvenlik($_GET['action']);
$mesaj=guvenlik($_POST['mesaj']);
$destek=$mysqli->query("select * from tickets where Id='".$Id."'")->fetch_assoc();
$uye=$mysqli->query("select * from uyeler where Id='".$destek[uyeId]."'")->fetch_assoc();
$konular=explode("-",$destek[konu]);
$k1old=Array("a_1","a_2","a_3","a_4","b_1","b_2","c_1","c_2","d_1","d_2","e_1","e_2","e_3");
$k1new=Array("Yeni Üyelik Kaydı","Şifre Bilgilerim","Üyelik Bilgilerimi Nasıl Güncellerim","Üyelik İptali","İlan işlemleri","Hatalı ilan bildirimi","Dopinglerim","Mağazam","Bana Özel","Ürün arama","Önerileriniz","Şikâyetleriniz","Teknik bir sorun yaşıyorum");
$konu1=str_replace($k1old,$k1new,$konular[1]);

$k2old=Array("a_1","a_2","a_3","b_1","b_2","c_1","c_2","c_3","d_1","d_2","e_1","e_2","e_3","e_4","e_5","e_6","e_7","e_8","e_9","e_10","e_11","e_12","f_1","f_2","f_3","f_4","f_5","f_6","f_7","g_1","g_2","g_3","g_4","h_1","h_2","h_3","h_4","h_5","h_6","h_7","h_8","i_1","i_2","i_3","i_4","i_5","i_6","i_7","i_8","i_9","j_1","j_2","j_3","k_1","k_2","k_3","l_1","l_2","l_3","l_4","l_5","m_1","m_2","m_3","m_4");
$k2new=Array("E-posta adresim kayıtlı olduğuna dair uyarı alıyorum","Hesabınız bloke edilmiştir uyarısı alıyorum","Onay kodum ulaşmadı","Şifre bilgilerimi nasıl güncellerim?","Şifremi unuttum","E-posta adresimi nasıl değiştirebilirim?","İrtibat bilgilerimi nasıl değiştirebilirim?","Kullanıcı adımı nasıl değiştirebilirim?","Üyeliğimi iptal eder misiniz?","Üyeliğimi nasıl iptal edebilirim?","Nasıl ilan veririm?","İlanım ne zaman onaylanacak?","İlanıma fotoğraf yüklemek ücretlimidir?","Ürünümü hangi kategoride yayınlamalıyım?","İlanımı nasıl güncellerim?","İlan kategorimi değiştiremiyorum","İlanımı nasıl pasif yaparım?","İlanımı nasıl silerim?","İlanıma nasıl doping yaparım?","İlanımda irtibat bilgilerim gözükmüyor","İlanımda irtibat bilgilerim gözükmesin","Ürünümün kategorisi yer almadığından dolayı ilan veremiyorum","İlanda yer alan telefon bilgisi hatalıdır","İlanda yer alan fotoğraf bilgisi hatalıdır","İlan hatalı kategoridedir","İlanım başka bir kullanıcı tarafından kopyalanmış","İlan içeriğinde sadece reklam yapılıyor","<?=$nowww;?> harici sitelere yönlendirme yapılıyor","İlanda ürünle ilgisi olmayan içerik mevcut","Dopingim vitrinde yer almıyor","Ödeme yaptım dopingim ne zaman aktif olur?","Doping sürem bitmeden dopingim pasif oldu","Hizmet ilanıma nasıl doping satın alırım?","Mağaza görselini nasıl güncellerim?","Mağaza adımı nasıl güncellerim?","Mağazam hakkında nasıl bilgi eklerim?","Mağaza logomu nasıl güncellerim?","Mağaza süremi uzatmak istiyorum","Mağazama doping satın almak istiyorum","Mağaza vitrini nedir?","Kullanıcılar benim mağazama nasıl ulaşacak?","Bana özel sayfamda ilanımı göremiyorum","'Favorilerim' nedir?","Favori ilanlarıma nasıl ilan eklerim?","Favori ilanlarıma ilan ekleyemiyorum","Gelen mesajlarıma ulaşamıyorum","Gönderdiğim mesajlar 'Gönderilen' kutusunda yer almıyor","Üyelik bilgilerimi nasıl güncellerim?","<?=$nowww;?> hesabım nedir?","İlanımı favorilerine ekleyen kullanıcılara nasıl ulaşabilirim?","İstediğim ilana en kolay nasıl ulaşabilirim?","İlgisiz veya istenmeyen arama sonuçlarını bildir","İlan arama konusunda bilgi almak istiyorum","Mevcut olan bir bölümün geliştirilmesi konusunda bir önerim var","Yeni bir hizmet önerim var","Yeni bir kategori önerim var","Bir üyeden uygunsuz mesaj alıyorum","<?=$nowww;?> harici sitelerden alışveriş yapmam öneriliyor","Manipülasyon yaptığını düşündüğüm bir kullanıcı var","İlanım/ilan fotoğrafım kopyalanmış","Şüpheli bir mesaj aldım","Mesajlar ile ilgili sorun yaşıyorum","Bana özel sayfamda sorun yaşıyorum","İlan giriş aşamasında sorun yaşıyorum","Diğer teknik sorunları bildirmek istiyorum");
$konu2=str_replace($k2old,$k2new,$konular[2]);
if($destek[departman]=='1'){
	$departman="Teknik Destek";
	}else{
	$departman="Muhasebe";
	}
?>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="index.html">Kontrol Paneli</a> <span class="divider">/</span>
					</li>
					<li>
						Destek Bildirimi Görüntüle
					</li>
				</ul>
			</div>
<?
if($action=='cevapla'){	
$tarih = date('Y-m-d H:i:s');
$querys[]="insert into ticket_reply (id,uyeId,ticketId,mesaj,user_group,eklenme_tarihi) VALUES(NULL,'0','$Id','$mesaj','1','$tarih')";
$querys[]="update tickets set durum='0' where Id='".$Id."'";
process_mysql(implode("**",$querys),"destek-goruntule.html?Id=".$Id);
}
?>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Destek Bildirimi Görüntüle</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					
					<div class="box-content form-horizontal">
<fieldset>
<legend>Destek Bildirimi Görüntüle : <?=$destek[konu2];?> <span style="color:#999">(#<?=$destek[Id];?>)</span></legend>
							  <div class="control-group">
								<label class="control-label" for="selectError">Destek Talebi Bölümü</label>
								<div class="controls">
								  <?=$konu1;?> > <?=$konu2;?>
								</div>
							  </div>							  
							  <div class="control-group">
								<label class="control-label" for="selectError">Destek Durumu</label>
								<div class="controls">
								  <?if($destek[durum]==1){echo "Aktif";}else{echo "Pasif";}?>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError">Destek Talebi Konusu</label>
								<div class="controls">
								  <?=$destek[konu2];?>
								</div>
							  </div>							  
							  <div class="control-group">
								<label class="control-label" for="selectError">Destek Talebi Departmanı</label>
								<div class="controls">
								  <?=$departman;?>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError">Destek Talebi Gönderilme Tarihi</label>
								<div class="controls">
								  <?=yeni_tarih($destek[eklenme_tarihi]);?>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError">Destek Talebi İçeriği</label>
								<div class="controls">
								<div style="margin:0;border:1px solid #ccc;padding:10px;"><strong><?=$uye[ad]." ".$uye[soyad];?> : </strong><br><?=$destek[mesaj];?></div>
								  <?
								  $cevapSQL=$mysqli->query("select * from ticket_reply where ticketId='$Id'");
								  $toplam_cevap=$cevapSQL->num_rows;
								  if($toplam_cevap!=0){
								  ?>
								  <div style="border-bottom:1px solid #0049A0;width:100%;height:1px;margin-top:8px;margin-bottom:8px;"></div>
								  <?
								  }
								  $i=1;
								  while($cevap = $cevapSQL->fetch_assoc()){
								  if($cevap[user_group]==1){
$color = "#FF0000";
$divcolor = "#FF0000";
}else{
$color = "#000000";
$divcolor = "#ccc";
}
?>
<div style="margin:0;border:1px solid <?=$divcolor;?>;padding:10px">
<strong style="color:<?=$color;?>;"><?=$uye[ad]." ".$uye[soyad];?><?if($cevap[user_group]==1){?> ( Yönetim )<?}?> : </strong>
<br><?=$cevap[mesaj];?>
<?if($cevap[user_group]==1){?>
<div style="border-top:1px solid #ccc;margin-top:15px;padding-top:7px;font-weight:bold;font-size:11pt;font-family:Calibri;">
Saygılar,<br><a href="<?=$site_adresi;?>"><?=$nowww;?></a> Yönetimi
</div>
<?}?>
</div>
<?if($i!=$toplam_cevap){?>
<div style="border-bottom:1px solid #0049A0;height:1px;margin-top:8px;margin-bottom:8px;"></div>
<?}$i++;}?>
								</div>
							  </div>	
<legend>Cevapla</legend>
<form action="?page=destek-goruntule&Id=<?=$Id;?>&action=cevapla" method="post" class="form-horizontal">
<div class="control-group">
								<label class="control-label" for="selectError">Mesajınız</label>
								<div class="controls">
								  <textarea name="mesaj" style="width:400px;height:150px"><?=$mesaj;?></textarea>
								</div>
							  </div>					  
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Mesajı Gönder</button>
							</div>
</fieldset>
</form>							
					</div>
				</div>
			</div>
<?php include('footer.php'); ?>