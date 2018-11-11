<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ticaret Meclisi - Ev Konut Arsa İşyeri Satılık Kiralık</title>
<link rel="stylesheet" href="stil1.css" type="text/css" media="all">
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<?php
session_start();
if(!empty($_SESSION["kld"]) and $_SESSION["yetki"]==11){
	include("baglanti.php");
	date_default_timezone_set('Europe/Istanbul');
?>
<script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title></title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>

<style type="text/css">
body {
	background-image: url(logo.png);
	
}
.break {page-break-before:always;}
</style>
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p><center>
  <a href="anamenu.php"><img src="baslik.png" alt="" name="" width="253" height="50" align="middle" /></a>
</center></p>
<div id="icerik" name="icerik" style=" text-align:center;">
<?php
if(!empty($_POST["bt15"])){//Kira Sözleşme Yazdır butonu
		$id=$_POST["id"];
		$sqls="select * from kirasozlesme where id=$id";
		$sorgus=@mysql_query($sqls);
		$degers=@mysql_fetch_array($sorgus);
?>
 <table width="900" border="1" align="center"bgcolor="#FFF0EC">
  <tr>
    <td colspan="5" align="center" valign="middle"><p><img src="images/firmalogo.jpg" width="264" height="100" /><br />
      <img src="baslik.png" width="253" height="50" />      <br />
      Şirinevler Mah. Abdulkadir Konukoğlu Bulvarı<br />
      29 Ekim Sitesi No: 225 C-6/B<br />
      (Mondi Bitişiği)
    </p></td>
    <td colspan="6" align="center" valign="middle"><h1>Gayrimenkul Kiralama ve<br />Komisyon Sözleşmesi</h1><br /><?php echo $degers["tarih"]; ?></td>
   </tr>
  <tr>
    <td height="40" colspan="5" align="left" valign="middle">KİRALANACAK GAYRİMENKULÜN</td>
    <td width="170">&nbsp;</td>
    <td width="170"></td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" width="170" align="left" valign="middle">CİNSİ</td>
    <td width="340" colspan="2"><?php echo $degers["cinsi"]; ?></td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td colspan="6">&nbsp;</td>
   </tr>
  <tr>
    <td height="40" align="left" valign="middle">ADRESİ</td>
    <td colspan="10"><?php echo $degers["adres"]; ?></td>
   </tr>
  <tr>
    <td colspan="11">&nbsp;</td>
   </tr>
  <tr align="left" valign="middle">
    <td height="40" colspan="5">KİRAYA VERENİN</td>
    <td colspan="6">KİRACININ</td>
  </tr>
  <tr>
    <td height="40" colspan="2" align="left" valign="middle">ADI SOYADI</td>
    <td colspan="3"><?php echo $degers["satad"]; ?></td>
    <td colspan="3" align="left" valign="middle">ADI SOYADI</td>
    <td colspan="3"><?php echo $degers["alad"]; ?></td>
   </tr>
  <tr>
    <td height="40" colspan="2" align="left" valign="middle">T.C. KİMLİK NO</td>
    <td colspan="3"><?php echo $degers["sattc"]; ?></td>
    <td colspan="3" align="left" valign="middle">T.C. KİMLİK NO</td>
    <td colspan="3"><?php echo $degers["altc"]; ?></td>
   </tr>
  <tr>
    <td height="40" colspan="2" align="left" valign="middle">TELEFON NO</td>
    <td colspan="3"><?php echo $degers["sattel"]; ?></td>
    <td colspan="3" align="left" valign="middle">TELEFON NO</td>
    <td colspan="3"><?php echo $degers["altel"]; ?></td>
   </tr>
  <tr>
    <td height="40" colspan="2" align="left" valign="middle">ADRES</td>
    <td colspan="3"><?php echo $degers["adres1"]; ?></td>
    <td colspan="3" align="left" valign="middle">ADRES</td>
    <td colspan="3"><?php echo $degers["adres2"]; ?></td>
   </tr>
  <tr>
    <td height="40" colspan="2" align="left" valign="middle">BANKA HESAP NO</td>
    <td colspan="3"><?php echo $degers["iban"]; ?></td>
    <td colspan="3" align="left" valign="middle">İŞ ADRESİ</td>
    <td colspan="3"><?php echo $degers["adres3"]; ?></td>
  </tr>
  <tr>
    <td height="40" colspan="5" align="left" valign="middle">1 (Bir) Aylık Kira Karşılığı</td>
    <td colspan="3"><?php $aylik1=$degers["aylik1"]; $aylik1=number_format($aylik1, 2, ',', '.'); echo $aylik1; ?></td>
    <td colspan="3"><?php echo $degers["aylik2"]; ?></td>
   </tr>
  <tr>
    <td height="40" colspan="5" align="left" valign="middle">1 (Bir)Yıllık Kira Karşılığı</td>
    <td colspan="3"><?php $yillik1=$degers["yillik1"]; $yillik1=number_format($yillik1, 2, ',', '.'); echo $yillik1; ?></td>
    <td colspan="3"><?php echo $degers["yillik2"]; ?></td>
  </tr>
  <tr>
    <td height="40" colspan="5" align="left" valign="middle">Kiranın Ne Şekilde Ödeneceği</td>
    <td colspan="3"><?php echo $degers["sekil"]; ?></td>
    <td colspan="3">&nbsp;</td>
   </tr>
  <tr>
    <td height="40" colspan="2" align="left" valign="middle">Depozito Miktari</td>
    <td colspan="3"><?php $depo=$degers["depozito"]; $depo=number_format($depo, 2, ',', '.'); echo $depo; ?></td>
    <td colspan="3" align="left" valign="middle">Kira Artış Oranı</td>
    <td colspan="3"><?php echo $degers["artis"]; ?></td>
  </tr>
  <tr>
    <td height="40" colspan="2" align="left" valign="middle">Kira Müddeti</td>
    <td colspan="3"><?php echo $degers["muddet"]; ?></td>
    <td colspan="3" align="left" valign="middle">Kiralanan Şeyin Şimdiki Durumu</td>
    <td colspan="3"><?php echo $degers["suan"]; ?></td>
  </tr>
  <tr>
    <td height="40" colspan="2" align="left" valign="middle">Kiranın Başlangıcı</td>
    <td colspan="3"><?php echo $degers["basi"]; ?></td>
    <td colspan="3" align="left" valign="middle">Kiralanan Şeyin Ne için Kullanılacağı</td>
    <td colspan="3"><?php echo $degers["neicin"]; ?></td>
   </tr>
  <tr>
    <td height="40" colspan="5" align="left" valign="middle">İtilaf Halinde Devreye Girecek Mahkemeler ve İcra Daireleri</td>
    <td colspan="6"><?php echo $degers["mahkeme"]; ?></td>
   </tr>
  <tr align="left" valign="middle">
    <td height="40" colspan="11">Kiralanan yer ile beraber teslim edilan Demirbaşın beyanı ve Özel Durumlar:</td>
  </tr>
  <tr>
    <td height="100" colspan="11"><p><?php echo $degers["ozelsart"]; ?>
      <span id="sprytextarea2">
        <label for="ozelsart"></label>
      </span>    </p></td>
  </tr>
  <tr>
    <td height="69" colspan="3" align="center" valign="top"><p>KEFİL</p>
      <p>&nbsp;</p></td>
    <td colspan="4" align="center" valign="top" height="60">KİRACI<br /><br /><?php echo $degers["alad"]; ?></td>
    <td colspan="4" align="center" valign="top">KİRAYA VEREN<br /><br /><?php echo $degers["satad"]; ?>
      <p>&nbsp;</p></td>
  </tr>
  </table>
  <br /><br />
  <p class="break">
<table width="900" border="1" align="center"bgcolor="#FFF0EC">  <tr>
    <td colspan="11" align="center">GENEL ŞARTLAR</td>
  </tr>
  <tr>
    <td height="69" colspan="11" align="left" valign="top"><p>1- Kiracı kiraladığı şeyi kendi malı gibi kullanmaya ve bozmamasına evsaf ve meziyetlerini şöhret ve itibarını kaybetmesine meydan vermemeye ve içinde<br />
      oturanlarla (varsa) onlara iyi davranmaya mecburdur.<br />
      2- Kiralanan yerin su, elektrik, havagazı yakıt masrafları, kapıcı parası kiracıya aittir.<br />
      3- Kiracı kiraladığı şeyin kiralanan kiracı tarafından üçüncü şahsa kısmen veya tamamen kiralanıpta taksimatı ve ciheti tahsisi alınıpta taksimatı ve ciheti tahsisi değiştirilir veya herhangi bir suretle tahrip ve tadil edilirse, mal sahibi kira akdini bozabileceği gibi, bu yüzden vukua gelecek zarar ve ziyanı protesto çekmeye ve hüküm almaya gerek kalmaksızın kiracı tazmine mecburdur. Vaki zararın üçüncü şahıs tarafından yapılmış olması mal sahibinin birinci kiracıdan talep hakkına tesir etmez.<br />
      4- Kiralanan şeyin tamiri lazım gelir ve üçüncü şahıs onun üzerinde hak iddia ederse, kiracı hemen mal sahibine haber vermeye mecburdur. Haber vermezse zararlardan mesul olacaktır. Kira zaruri tamiratın icrasına müsade etmeye mecbrdur. Kiralanan şeyin alalade kullanılmasına menteşelemek, cam taktırmak, reze koymak, kilit ve sürgü yerleştirmek badana gibi ufak tefek ksurlar
    mal sahibine haber vermeden ve münasip müddet beklemeden, kiracı tarafından yaptırırsa mal sahibinden istenemez.<br />
    5- Kiralanan şeyin vergisi ve tamiri mal sahibine, kullanılması için lazım gelen ıslah masrafları kiracıya aittir. Bu hususta adete bakılır.
    <br />
    6- Kiracı kiraladığı şeyi ne halde buldu ise, mal sahibine o halde ve adete göre teslim etmeye mecburdur. Kiralanan gayrimenkul içinde bulunan demirbaş eşya ve aletler kontrat müddetinin bitiminde tamamen iade ile mükelleftir. Gerek bu demirbaşlar gerek kiralanan şeyin teferruatı zai edilir ve kullanılmaktan dolayı eskirse, kiracı bunların kıymetlerini tazmine ve sahibi talep eylediği halde ödemeye mecburdur.<br />
    7- 
    Kiracı kiraladığı şeyi mukaveleye göre kullanmış
    olması hesabıyla onda ve eşyasında husule gelen eksikliği ve değişiklikten mesul olmayacaktır. Kiracının kiraladığı şeyi iyi halde almış olması asıldır. <br />
    8- Kiracı mukavele müddetini son ay içinde kiralanan şeyi görmeye gelen teliplerin gezip görmesine ve vasıflarını tetkik etmesine karşı koyamaz. <br />
    9- Kira müddeti bittiği halde kiralanan şeyi boşaltmadığı takdirde, kiracı mal sahibinin bundan doğacak zarar ve ziyanını tazmin edecektir. <br />
    10- Kontratoya yapıştırılması gereken damga pulları ve kontrat bedel ve harçları belediyeye ve noter dairelerine ödenecek harç ve resimler kiracıya mal sahibine aittir.<br />
    11- Kiracının yahut kendisi ile birlikte yaşayan kimselerin yahut işçilerin sıhhatı için ciddi tehlike teşkil edecek derecede ve mahiyette bulunmayan şeyler kiracı için kiralanan şeyi tesellümümden imtina ve kira müddeti içinde zuhuri halinde kontratı bozmaya veya kiradan bir miktar kesmeye talepte bulunamazlar.<br />
    12- Kiracının kiralanan şeyin içinde ve dışında yaptıracağı tezinat masrafları kendisine ait olacak mukavele müddeti bittiğinde yapılan her türlü masraf için tazminat istemeye hakkı olmamak ve bu gayrimenkul inşaatın tamamı mal sahibinin olacaktır.<br />
    13- Kiracı mal sahibinin rızası olmadan masrafı kamilen kendisine ait olmak üzere şehir suyu, hava gazı ve elektrik alabilecek ve apartmanda umumi anten tesisatı yoksa hususi televizyon anten tesisatı yoksa hususi televizyon anteni yaptırabilecektir. Bu taçhizatın 
    sarfiyat bedeleri ve radyo ve televizyon abonesi gibi hizmet mukabili alınan resimler demirbaş telefon varsa bunun abone ücreti kiracıya ait olacaktır.<br />
    14- Bu sözleşmede yazılı bulunmayan hükümlere ihtiyaç duyulduğunda 6570
    sayılı Kira Kanunu, Medeni Kanunu, Borçlar Kanunu, 634 sayılı Kat Mülkiyeti Kanunu ve diğer yürürlükteki alakalı kanun ve yargıtay kararları uygulanır.</p></td>
   </tr>
  <tr>
    <td colspan="11" align="center">HUSUSİ ŞARTLAR</td>
  </tr>
  <tr>
    <td height="69" colspan="11" align="left" valign="top"><p>1- Kiracı taşınması amacı dışında kullanamaz, kısmen veya tamamen devrine ciro edemez, bir başkasının istifadesine sunamaz. <br />
      2- Taşınmazın aylık kira bedeli net olarak <?php echo $aylik1; ?> (<?php echo $degers["aylik2"]; ?>) belirtilmiştir. Kira bedeli her ay belirtilen banka hesabına veya elden ödenecektir.<br />
      3- Banka Hesap No: <?php echo $degers["iban"]; ?><br />
4- Aynı dönem içerisinde kira bedelinin 2 ay ödenmemesi halinde, ödenmeyen aydan dönem kirasının sonuna kadar olan kira bedelleri muacceliyet kesbedeceği gibi bu hal taşınmazın tahliyesi sebebidir.<br />
5- Taşınmaza ait olan elektrik, su ve aidat giderleri ile çevre temizlik vergisi, taşınması kiraladığı andan tahliye ettiği ana kadar kiracıya aittir.<br />
6- Kiracı apartman yönetiminin alacağı kararlara aynen uyacaktır.<br />
7- 
    Kira artış oranı <?php echo $degers["artis"]; ?> olarak belirtilmiştir.<br />
    8- Kiracının taşınmaz sahibine verdiği depozito <?php echo $depo; ?> TL dir. Tahliye halinde taşınmazın kira, elektrik, su, doğalgaz, çevre temizlik vergisi, yönetim giderleri sıfırlanıp taşınmazın hasarsız olarak boş teslimi takiben taşınmaz sahibi tarafından kiracıya hemen iade edilecektir. <br />
    9- Kefilin kefaletini müşterek ve müteselsil olup kefil kontratın ilk yapıldığındaki kira dönemi ve belirlenen süre için kefaletin mevcudiyetinin devamını beyan ve imzasıyla kabul ve taahhüt eder.<br />
    10- Taraflarca kira sözleşmesinde yazılı adresler kanuni ikametgah adresi olarak kabul edilmiştir. Bu adreslerin değişmesi halinde taraflar keyfiyeti bir hafta zarfında yazılı olarak birbirlerine bildireceklerdir. Aksi takdirde kontratta yazılı adreslere yapılacak tebligat muteber sayılacaktır.
    </p>
      <p>İhtilaf halinde <?php echo $degers["mahkeme"]; ?> mahkeme ve icra daireleri yetkilidir. İlgili TAŞINMAZ iki tarafın rızasıyla ve yukarıda yazılı şartlarla kiralanmış olduğuna dair bu kontrat bir nüsha olarak tanzim edilmiştir.</p></td>
   </tr>
  <tr>
    <td height="69" colspan="3" align="center" valign="top">KEFİL</td>
    <td colspan="4" align="center" valign="top">KİRACI<br /><br /><?php echo $degers["alad"]; ?></td>
    <td colspan="4" align="center" valign="top">KİRAYA VEREN<br /><br /><?php echo $degers["satad"]; ?>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td colspan="11" align="center"><input name="b_print" type="button" class="ipt"   onClick="printdiv('icerik');" value="Sözleşmeyi Yazdır"></td>
  </tr>
</table>
</p>
<?php } ?>
</div>
<center><p><a href="anamenu.php" target="_top"><img src="images/geridon.png" height="50" width="253" align="middle" /></a></p></center>
</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>