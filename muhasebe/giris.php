<?php ob_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ticaret Meclisi - Ev Konut Arsa İşyeri Satılık Kiralık</title>
<script type="text/javascript" src="jquery-1.5.min.js"></script>
<script type="text/javascript">
	function kontrol(){
		var kld=$("#kld").val();
		kld=jQuery.trim(kld);
		var sfr=$("#sfr").val();
		sfr=jQuery.trim(sfr);
		if(kld==''||sfr==''){
			if(kld==''){
				document.getElementById("bilgi1").innerHTML="<img src='images/file1800.GIF' width=25 height=25> Lütfen Kullanıcı Adınızı giriniz";
				document.getElementById("bilgi3").innerHTML="";
			}else{document.getElementById("bilgi1").innerHTML="";}
			if(sfr==''){
				document.getElementById("bilgi3").innerHTML="";
				document.getElementById("bilgi2").innerHTML="<img src='images/file1800.GIF' width=25 height=25> Lütfen Şifrenizi giriniz";
			}else{document.getElementById("bilgi2").innerHTML="";}
		}else{
			
			document.getElementById("bilgi1").innerHTML="";
			document.getElementById("bilgi2").innerHTML="";
			document.getElementById("bilgi3").innerHTML="";
			window.location="anamenu.php";
				$("#form").removeAttr("onsubmit");
			
		}
	}

</script>

<style type="text/css">
a:link {
	color: #000;
}
a:hover {
	color: #000;
}
a:active {
	color: #000;
}
#ana{
	position:relative;
	margin:0px;
	padding:0px;
	color:#F00;
}
body {
	background-image: url(logo.png);
}
a:visited {
	color: #000;
}
</style>
</head>

<body>
<br>
<br>
<br>
<br>
<p><center><img src="baslik.png" alt="" name="" width="253" height="50" align="middle" /></center></p>

<div align="center" id="ana">
  <form name="form1" id="form" method="post" action="anamenu.php" onSubmit="return false;">
    <table width="600" cellpadding="0" cellspacing="0" border="0" bgcolor="#FFF0EC">
      <tr>
        <td colspan="2" align="center" valign="middle">
        <H1>EMLAK TAKİP SİSTEMİ</H1></td>
      </tr>
      <tr>
        <td width="250" align="right" valign="middle">Kullanıcı Adı :</td>
        <td width="" align="left" valign="middle"><input name="kld" type="text" id="kld" width="150"></td>
      </tr>
      <tr>
        <td colspan="2" height="30" align="center" valign="middle"><div style="font-family:'Arial Black', Gadget, sans-serif; color:#F00;" id="bilgi1"></div></td>
      </tr>
      <tr>
        <td align="right" valign="middle">Şifre :</td>
        <td align="left" valign="middle"><input name="sfr" type="password" id="sfr" maxlength="16" width="150"></td>
      </tr>
      <tr>
        <td colspan="2" height="30" align="center" valign="middle"><div style="font-family:'Arial Black', Gadget, sans-serif; color:#F00;" id="bilgi2"></div></td>
      </tr>
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="left" valign="middle"><input type="submit" name="bt" id="bt" value="     Gönder     " onClick="kontrol()"></td>
      </tr>
      <tr>
        <td colspan="2" align="center" valign="middle"><div style="font-family:'Arial Black', Gadget, sans-serif; color:#F00; height:25px; font-size:14px;" id="bilgi3"></div></td>
      </tr>
    </table>
  </form>
</div>
<div style="height:10%"></div>
</body>
</html>
<?php ob_end_flush(); ?>