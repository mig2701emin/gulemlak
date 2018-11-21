<?
include("../protect_page.php");
//include("../setting.php");
$bugun=date("Y-m-d");
$mysqli->query("delete from mesajlar where gonderensil='1' and alicisil='1' and bildirildi='0'");
$mysqli->query("update firmalar set ust_siradayim='0' where ust_siradayim='1' and ust_siradayim_bitis<='$bugun'");
$mysqli->query("delete from acilacilvitrin where bitis_tarihi<='$bugun'");
$mysqli->query("delete from fiyatvitrin where bitis_tarihi<='$bugun'");
$mysqli->query("delete from gvitrin where bitis_tarihi<='$bugun'");
$mysqli->query("delete from kvitrin where bitis_tarihi<='$bugun'");
$mysqli->query("update magazalar set onay='0', suresi_doldu='1' where bitis<='$bugun'");
$mysqli->query("delete from mkvitrin where bitis_tarihi<='$bugun'");
$mysqli->query("delete from mvitrin where bitis_tarihi<='$bugun'");
$mysqli->query("update firmalar set onay='0',suresi_doldu='1' where bitis_tarihi<='$bugun'");
$mysqli->query("update reklam set status='0' where end<='$bugun'");
/*$bitis_tarih=date("Y-m-d",strtotime("+3 day"));
$ilanlar=$mysqli->query("select Id,uyeId,firma_adi from firmalar where bitis_tarihi='$bitis_tarih'");
while($sorgula=$ilanlar->fetch_assoc()){
$uyedetay=$mysqli->query("select * from uyeler where Id='$sorgula[uyeId]'")->fetch_assoc();
require("../class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP(true); 
$mail->Port = "587";
$mail->Host = $mailhost;
$mail->SMTPAuth = true;
$mail->Username = $sitemail;
$mail->Password = $mailsifresi;
$mail->From = $sitemail;
$mail->FromName = $noww." İlanınızın Süresi Dolmak Üzere!";
$mail->AddAddress($uyedetay[email], $uyedetay[ad]." ".$uyedetay[soyad]);
$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->Subject = $nowww." İlanınızın Süresi Dolmak Üzere!";
$mail->Body    = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<img src="'.$site_adresi.'/images/'.$logo.'">
<br><br>
<div style="width:100%;padding:10px;font-size:13pt;font-family:Calibri;">
<strong>Sayın '.$uyedetay[ad].' '.$uyedetay[soyad].'</strong>
<br><br>
'.$sorgula[firma_adi].' (#'.$sorgula[Id].') İsimli İlanınızın Süresinin Dolmasına 3 Gün Kaldı.
<br><br>
İlanınızın Tarihini Yenilemek İçin Lütfen İlanınızı <strong>Bana Özel > İlanlarım</strong> Sayfanızdan Düzenleyiniz.
</div>
<p align="right">Saygılarımızla,<br><a href="'.$site_adresi.'">'.$nowww.' Yönetimi</a></p>
</body>
</html>
';

$mail->AltBody = "";											
$mail->Send();
}*/
clearstatcache();
foreach(scandir("image_temp/") as $file1){if (is_file("image_temp/".$file1) and $file1!='.htaccess' and (time()-3600<filemtime($file1))){unlink("image_temp/".$file1);}}
foreach(scandir("image_cache/") as $file2){if (is_file("image_cache/".$file2) and ($file2!='.htaccess' and $file2!='index.html') and (time()-86400<filemtime($file2))){unlink("image_cache/".$file2);}}
?>