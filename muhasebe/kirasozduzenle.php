<?php ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ticaret Meclisi - Ev Konut Arsa İşyeri Satılık Kiralık</title>
<link rel="stylesheet" href="stil1.css" type="text/css" media="all">
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<?php
session_start();
if(!empty($_SESSION["kld"]) and $_SESSION["yetki"]==11){
		include("baglanti.php");
?>
<style type="text/css">
body {
	background-image: url(logo.png);
}
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p><center>
  <a href="anamenu.php"><img src="baslik.png" alt="" name="" width="253" height="50" align="middle" /></a>
</center></p>
<?php
if(!empty($_POST["bt5"])){//Kira Sözleşmesi Düzenle butonu
		$id=$_POST["id"];
		$sqls="select * from kirasozlesme where id=$id";
		$sorgus=@mysql_query($sqls);
		$degers=@mysql_fetch_array($sorgus);
?>

<form id="form1" name="form1" method="post" action="yenikirasozlesmekayit.php">
<input type="hidden" name="id" id="id" value="<?php echo $degers["id"]; ?>" />
 <table width="900" border="1" align="center"bgcolor="#FFF0EC">
  <tr>
    <td colspan="5" align="center" valign="middle"><p><img src="images/firmalogo.jpg" width="264" height="100" /><br />
      <img src="baslik.png" width="253" height="50" />      <br />
      Şirinevler Mah. Abdulkadir Konukoğlu Bulvarı<br />
      29 Ekim Sitesi No: 225 C-6/B<br />
      (Mondi Bitişiği)
    </p></td>
    <td colspan="6" align="center" valign="middle"><h1>Gayrimenkul Kiralama ve<br />Komisyon Sözleşmesi</h1><br /><?php echo $tarih=date("d-m-Y"); ?></td>
    </tr>
  <tr>
    <td colspan="5">KİRALANACAK GAYRİMENKULÜN</td>
    <td width="170">&nbsp;</td>
    <td width="170"></td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
  </tr>
  <tr>
    <td width="170">CİNSİ</td>
    <td width="340" colspan="2"><span id="sprytextfield4">
      <label for="cinsi"></label>
      <input type="text" name="cinsi" id="cinsi" value="<?php echo $degers["cinsi"]; ?>" />
</span></td>
    <td width="170">&nbsp;</td>
    <td width="170">&nbsp;</td>
    <td colspan="6">&nbsp;</td>
    </tr>
  <tr>
    <td>ADRESİ</td>
    <td colspan="10"><span id="sprytextarea1">
      <label for="adres"></label>
      <textarea name="adres" id="adres" cols="120" rows="1"> <?php echo $degers["adres"]; ?></textarea>
</span></td>
    </tr>
  <tr>
    <td colspan="11">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5">KİRAYA VERENİN</td>
    <td colspan="6">KİRACININ</td>
  </tr>
  <tr>
    <td colspan="2">ADI SOYADI</td>
    <td colspan="3"><span id="sprytextfield5">
      <label for="satad"></label>
      <input type="text" name="satad" id="satad" value="<?php echo $degers["satad"]; ?>" />
      <span class="textfieldRequiredMsg">Ad giriniz.</span></span></td>
    <td colspan="3">ADI SOYADI</td>
    <td colspan="3"><span id="sprytextfield8">
      <label for="alad"></label>
      <input type="text" name="alad" id="alad" value="<?php echo $degers["alad"]; ?>" />
      <span class="textfieldRequiredMsg">Ad giriniz.</span></span></td>
    </tr>
  <tr>
    <td colspan="2">T.C. KİMLİK NO</td>
    <td colspan="3"><span id="sprytextfield6">
      <label for="sattc"></label>
      <input type="text" name="sattc" id="sattc" value="<?php echo $degers["sattc"]; ?>" />
</span></td>
    <td colspan="3">T.C. KİMLİK NO</td>
    <td colspan="3"><span id="sprytextfield9">
      <label for="altc"></label>
      <input type="text" name="altc" id="altc" value="<?php echo $degers["altc"]; ?>" />
</span></td>
    </tr>
  <tr>
    <td colspan="2">TELEFON NO</td>
    <td colspan="3"><span id="sprytextfield7">
    <label for="sattel"></label>
    <input type="text" name="sattel" id="sattel" value="<?php echo $degers["sattel"]; ?>" />
    <span class="textfieldRequiredMsg">Telefon giriniz.</span><span class="textfieldInvalidFormatMsg">Telefon giriniz</span></span></td>
    <td colspan="3">TELEFON NO</td>
    <td colspan="3"><span id="sprytextfield10">
    <label for="altel"></label>
    <input type="text" name="altel" id="altel" value="<?php echo $degers["altel"]; ?>" />
    <span class="textfieldRequiredMsg">Telefon giriniz</span><span class="textfieldInvalidFormatMsg">Telefon giriniz.</span></span></td>
    </tr>
  <tr>
    <td colspan="2">ADRES</td>
    <td colspan="3"><span id="sprytextarea3">
      <label for="adres1"></label>
      <textarea name="adres1" id="adres1" cols="45" rows="5"> <?php echo $degers["adres1"]; ?></textarea>
</span></td>
    <td colspan="3">ADRES</td>
    <td colspan="3"><span id="sprytextarea4">
      <label for="adres2"></label>
      <textarea name="adres2" id="adres2" cols="45" rows="5"><?php echo $degers["adres2"]; ?></textarea>
</span></td>
    </tr>
  <tr>
    <td colspan="2">BANKA HESAP NO</td>
    <td colspan="3"><span id="sprytextarea6">
      <label for="iban"></label>
      <textarea name="iban" id="iban" cols="45" rows="5"><?php echo $degers["iban"]; ?></textarea>
</span></td>
    <td colspan="3">İŞ ADRESİ</td>
    <td colspan="3"><span id="sprytextarea5">
      <label for="adres3"></label>
      <textarea name="adres3" id="adres3" cols="45" rows="5"> <?php echo $degers["adres3"]; ?></textarea>
</span></td>
  </tr>
  <tr>
    <td colspan="5">1 (Bir) Aylık Kira Karşılığı</td>
    <td colspan="3"><span id="sprytextfield1">
    <label for="aylik1"></label>
    <input type="text" name="aylik1" id="aylik1" value="<?php echo $degers["aylik1"]; ?>" />
    <span class="textfieldInvalidFormatMsg">Sayı Giriniz..</span><span class="textfieldRequiredMsg">Sayı Giriniz.</span></span></td>
    <td colspan="3"><span id="sprytextfield2">
      <label for="aylik2"></label>
      <input type="text" name="aylik2" id="aylik2" value="<?php echo $degers["aylik2"]; ?>" />
</span></td>
    </tr>
  <tr>
    <td colspan="5">1 (Bir)Yıllık Kira Karşılığı</td>
    <td colspan="3"><span id="sprytextfield3">
    <label for="yillik1"></label>
    <input type="text" name="yillik1" id="yillik1" value="<?php echo $degers["yillik1"]; ?>" />
<span class="textfieldInvalidFormatMsg">Sayı Giriniz.</span></span></td>
    <td colspan="3"><span id="sprytextfield11">
      <label for="yillik2"></label>
      <input type="text" name="yillik2" id="yillik2" value="<?php echo $degers["yillik2"]; ?>" />
</span></td>
  </tr>
  <tr>
    <td colspan="5">Kiranın Ne Şekilde Ödeneceği</td>
    <td colspan="3"><span id="sprytextfield12">
      <label for="sekil"></label>
      <input type="text" name="sekil" id="sekil" value="<?php echo $degers["sekil"]; ?>" />
      <span class="textfieldRequiredMsg">Belirtiniz.</span></span></td>
    <td colspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">Depozito Miktari</td>
    <td colspan="3"><span id="sprytextfield17">
      <label for="depozito"></label>
      <input type="text" name="depozito" id="depozito" value="<?php echo $degers["depozito"]; ?>" />
  </span></td>
    <td colspan="3">Kira Artış Oranı</td>
    <td colspan="3"><span id="sprytextfield18">
      <label for="artis"></label>
      <input type="text" name="artis" id="artis" value="<?php echo $degers["artis"]; ?>" />
  </span></td>
  </tr>
  <tr>
    <td colspan="2">Kira Müddeti</td>
    <td colspan="3"><span id="sprytextfield13">
      <label for="muddet"></label>
      <input type="text" name="muddet" id="muddet" value="<?php echo $degers["muddet"]; ?>" />
      <span class="textfieldRequiredMsg">Süre giriniz.</span></span></td>
    <td colspan="3">Kiralanan Şeyin Şimdiki Durumu</td>
    <td colspan="3"><span id="sprytextfield15">
      <label for="suan"></label>
      <input type="text" name="suan" id="suan" value="<?php echo $degers["suan"]; ?>" />
  </span></td>
  </tr>
  <tr>
    <td colspan="2">Kiranın Başlangıcı</td>
    <td colspan="3"><span id="sprytextfield14">
      <label for="basi"></label>
      <input type="text" name="basi" id="basi" value="<?php echo $degers["basi"]; ?>" />
      <span class="textfieldRequiredMsg">Tarih belirtiniz.</span></span></td>
    <td colspan="3">Kiralanan Şeyin Ne için Kullanılacağı</td>
    <td colspan="3"><span id="sprytextfield16">
      <label for="neicin"></label>
      <input type="text" name="neicin" id="neicin" value="<?php echo $degers["neicin"]; ?>" />
</span></td>
    </tr>
  <tr>
    <td colspan="5">İtilaf Halinde Devreye Girecek Mahkemeler ve İcra Daireleri</td>
    <td colspan="6"><span id="sprytextfield19">
      <label for="mahkeme"></label>
      <input type="text" name="mahkeme" id="mahkeme" value="<?php echo $degers["mahkeme"]; ?>" />
      <span class="textfieldRequiredMsg">Belirtiniz.</span></span></td>
    </tr>
  <tr>
    <td colspan="11">Kiralanan yer ile beraber teslim edilan Demirbaşın beyanı ve Özel Durumlar:</td>
  </tr>
  <tr>
    <td colspan="11"><p>
      <textarea name="ozelsart" id="ozelsart" cols="145" rows="8"><?php echo $degers["ozelsart"]; ?></textarea>
      <br />
      <span id="sprytextarea2">
        <label for="ozelsart"></label>
      </span>    </p></td>
  </tr>
  <tr>
    <td height="69" colspan="3" align="center" valign="top"><p>KEFİL</p>
      <p>&nbsp;</p></td>
    <td colspan="4" align="center" valign="top">KİRACI</td>
    <td colspan="4" align="center" valign="top">KİRAYA VEREN</td>
  </tr>
  <tr>
    <td height="69" colspan="11" align="center">GENEL ŞARTLAR</td>
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
    <td height="69" colspan="11" align="center">HUSUSİ ŞARTLAR</td>
  </tr>
  <tr>
    <td height="69" colspan="11" align="left" valign="top"><p>1- Kiracı taşınması amacı dışında kullanamaz, kısmen veya tamamen devrine ciro edemez, bir başkasının istifadesine sunamaz. <br />
      2- Taşınmazın aylık kira bedeli net olarak yukarıda belirtilmiştir. Kira bedeli her ay belirtilen banka hesabına veya elden ödenecektir.<br />
      3- Banka Hesap No yukarıda belirtilmiştir.<br />
4- Aynı dönem içerisinde kira bedelinin 2 ay ödenmemesi halinde, ödenmeyen aydan dönem kirasının sonuna kadar olan kira bedelleri muacceliyet kesbedeceği gibi bu hal taşınmazın tahliyesi sebebidir.<br />
5- Taşınmaza ait olan elektrik, su ve aidat giderleri ile çevre temizlik vergisi, taşınması kiraladığı andan tahliye ettiği ana kadar kiracıya aittir.<br />
6- Kiracı apartman yönetiminin alacağı kararlara aynen uyacaktır.<br />
7- 
    Kira artış oranı yukarıda belirtilmiştir.<br />
    8- Kiracının taşınmaz sahibine verdiği depozito yukarıda belirtilmiştir. Tahliye halinde taşınmazın kira, elektrik, su, doğalgaz, çevre temizlik vergisi, yönetim giderleri sıfırlanıp taşınmazın hasarsız olarak boş teslimi takiben taşınmaz sahibi tarafından kiracıya hemen iade edilecektir. <br />
    9- Kefilin kefaletini müşterek ve müteselsil olup kefil kontratın ilk yapıldığındaki kira dönemi ve belirlenen süre için kefaletin mevcudiyetinin devamını beyan ve imzasıyla kabul ve taahhüt eder.<br />
    10- Taraflarca kira sözleşmesinde yazılı adresler kanuni ikametgah adresi olarak kabul edilmiştir. Bu adreslerin değişmesi halinde taraflar keyfiyeti bir hafta zarfında yazılı olarak birbirlerine bildireceklerdir. Aksi takdirde kontratta yazılı adreslere yapılacak tebligat muteber sayılacaktır.
    </p>
      <p>İhtilaf halinde yukarıda belirtilen il/ilçe mahkeme ve icra daireleri yetkilidir. İlgili TAŞINMAZ iki tarafın rızasıyla ve yukarıda yazılı şartlarla kiralanmış olduğuna dair bu kontrat bir nüsha olarak tanzim edilmiştir.</p></td>
    </tr>
  <tr>
    <td height="69" colspan="3" align="center" valign="top">KEFİL</td>
    <td colspan="4" align="center" valign="top">KİRACI</td>
    <td colspan="4" align="center" valign="top">KİRAYA VEREN</td>
  </tr>
  <tr>
    <td colspan="11" align="center"><input type="submit" name="btup" id="btup" value="Güncelle" /></td>
  </tr>
</table>

</form>
<?php } ?>

<center><p><a href="anamenu.php" target="_top"><img src="images/geridon.png" height="50" width="253" align="middle" /></a></p></center>
<script type="text/javascript">
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {isRequired:false});
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {isRequired:false});
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextfield6 = new Spry.Widget.ValidationTextField("sprytextfield6", "none", {isRequired:false});
var sprytextfield7 = new Spry.Widget.ValidationTextField("sprytextfield7", "phone_number", {hint:"(555) 555 5555", useCharacterMasking:true});
var sprytextfield8 = new Spry.Widget.ValidationTextField("sprytextfield8");
var sprytextfield9 = new Spry.Widget.ValidationTextField("sprytextfield9", "none", {isRequired:false});
var sprytextfield10 = new Spry.Widget.ValidationTextField("sprytextfield10", "phone_number", {hint:"(555) 555 5555", useCharacterMasking:true});
var sprytextarea2 = new Spry.Widget.ValidationTextarea("sprytextarea2", {isRequired:false});
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer", {hint:"1500"});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "none", {isRequired:false, hint:"Bin Beş Y\xFCz TL"});
var sprytextarea3 = new Spry.Widget.ValidationTextarea("sprytextarea3", {isRequired:false, hint:"Kiraya veren adresi"});
var sprytextarea4 = new Spry.Widget.ValidationTextarea("sprytextarea4", {isRequired:false, hint:"Kiracı adresi"});
var sprytextarea5 = new Spry.Widget.ValidationTextarea("sprytextarea5", {hint:"Kiracı iş adresi", isRequired:false});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "integer", {hint:"15000", isRequired:false});
var sprytextfield11 = new Spry.Widget.ValidationTextField("sprytextfield11", "none", {isRequired:false, hint:"On Beş Bin TL"});
var sprytextfield12 = new Spry.Widget.ValidationTextField("sprytextfield12", "none");
var sprytextfield13 = new Spry.Widget.ValidationTextField("sprytextfield13", "none", {hint:"1 Yıl"});
var sprytextfield14 = new Spry.Widget.ValidationTextField("sprytextfield14", "none", {hint:"12/12/2012"});
var sprytextfield15 = new Spry.Widget.ValidationTextField("sprytextfield15", "none", {isRequired:false, hint:"Boş / Dolu"});
var sprytextfield16 = new Spry.Widget.ValidationTextField("sprytextfield16", "none", {isRequired:false, hint:"Mesken / D\xFCkkan"});
var sprytextfield17 = new Spry.Widget.ValidationTextField("sprytextfield17", "none", {isRequired:false});
var sprytextfield18 = new Spry.Widget.ValidationTextField("sprytextfield18", "none", {isRequired:false});
var sprytextarea6 = new Spry.Widget.ValidationTextarea("sprytextarea6", {hint:"TR", isRequired:false});
var sprytextfield19 = new Spry.Widget.ValidationTextField("sprytextfield19", "none", {hint:"İl/İl\xE7e"});
</script>
</body>
</html>
<?php
}else{echo "<center>Giriş yapmalısınız!... Yönlendiriliyorsunuz.</center><META HTTP-EQUIV=Refresh CONTENT='2;URL=giris.php'>";}
ob_end_flush(); ?>