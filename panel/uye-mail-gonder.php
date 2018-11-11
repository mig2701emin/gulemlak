<?
include("../setting.php");
session_start();
include("guvenlik.php");
set_time_limit(999);
include("../class.phpmailer.php");
$gonderilecekler=guvenlik(base64_decode($_POST['gonderilecekler']));
$konu=guvenlik(base64_decode($_POST['konu']));
$icerik=guvenlik(base64_decode($_POST['icerik']),1);
if($gonderilecekler=='1'){
$SQL=$mysqli->query("select email,ad,soyad from uyeler");
}elseif($gonderilecekler=='2'){				
$SQL=$mysqli->query("select email,ad,soyad from uyeler where onay='1'");
}elseif($gonderilecekler=='3'){
$SQL=$mysqli->query("select email,ad,soyad from uyeler where onay='0'");
}
$i=1;
while($email=$SQL->fetch_assoc()){
$mail[$i] = new PHPMailer();
$mail[$i]->IsSMTP(); 
$mail[$i]->Port = "587";
$mail[$i]->Host = $mailhost;
$mail[$i]->SMTPAuth = true;
$mail[$i]->Username = $sitemail;
$mail[$i]->Password = $mailsifresi;
$mail[$i]->From = $sitemail;
$mail[$i]->FromName = $nowww." ".$konu;				
$mail[$i]->AddAddress($email[email], $email[ad]." ".$email[soyad]);
$mail[$i]->WordWrap = 50;
$mail[$i]->IsHTML(true);
$mail[$i]->Subject = $nowww." ".$konu;
$mail[$i]->Body    = $icerik;
$mail[$i]->AltBody = "";
if(!$mail[$i]->Send()){
$gonderilemedi[]=$email[email];
}				
$i++;
}
if(empty($gonderilemedi)){
echo '<script>$(".progress").slideUp("slow");</script><div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>İşlem Başarıyla Tamamlandı.</div>';
}else{
echo '<script>$(".progress").slideUp("slow");</script><div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">×</button>İşlem Başarıyla Tamamlandı. Bazı E-Mail Adreslerine Mail Gönderilemedi :<br>'.implode("<br>",$gonderilemedi).'</div>';
}
?>