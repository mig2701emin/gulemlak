<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	$sunucu="localhost";
	$kul_adi="ticaretm_haluk";
	$sifre="ECCyHaa3-71H";
	$veritabani="ticaretm_muhasebe";
    $baglanti=mysql_connect("$sunucu","$kul_adi","$sifre");
	mysql_set_charset("utf8");
	if(!$baglanti) {
			echo"veri tabanı sürücüsüne bağlanılamıyor.";
			exit();
	}
	if(!mysql_select_db($veritabani,$baglanti)){
		echo "Veritabanı sürücüsüne bağlanılamıyor.";
	}
?>