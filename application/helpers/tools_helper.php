<?php
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
    return $ip;
}

function flashdata(){
      $ci = & get_instance();

      $error = $ci->session->flashdata('error');
      if($error){
          return "'error', '".$error."'";
      }

      $success = $ci->session->flashdata('success');
      if($success){
          return "'success', '".$success."'";
      }
  }

  function getAltKategoriler($ust_kategori){

		$ci = & get_instance();
		$ci->db->order_by('siralama asc,kategori_adi asc');
		$ci->db->where('ust_kategori', $ust_kategori);
		$query = $ci->db->get('kategoriler');
		return $query->result();

}

function getKategori($Id){

  $ci = & get_instance();
  $ci->db->where('Id', $Id);
  $query = $ci->db->get('kategoriler');
  return $query->row();

}
function fileControl($road,$file,$noPic){
    if($file){
        $picRoad = $road.'/'.$file.'';

        if(file_exists($picRoad)){
            $picture = base_url($road.'/'.$file);
        }else{
            $picture = base_url('assets/images/'.$noPic.'');
        }
    }else{
        $picture = base_url('assets/images/'.$noPic.'');
    }

    return $picture;
}
function replace($database,$string,$primary_key,$id){
    $ci = & get_instance();

    $ci->db->from($database);
    $ci->db->where($primary_key, $id);
    $query = $ci->db->get();

    if($query->num_rows() > 0){
        $result = $query->row();

        return $result->$string;



    }
}

function trSubstr($string,$str='80'){
    $text = mb_substr($string, 0, $str, 'UTF-8');
    if($text == $string){
        return $string;
    }else{
        return replaceSpace($text)."...";
    }
}

function replaceSpace($string){
    $string = preg_replace("/\s+/", " ", $string);
    $string = trim($string);

    return $string;
}

function encode($input){
    return strtr(base64_encode($input), '+/=', '-_S');
}

function decode($input){
    return base64_decode(strtr($input, '-_S', '+/='));
}

function countDB($db,$field,$where){
  $ci = & get_instance();
  if($where != 0){
      $ci->db->where($field,$where);
  }
  $ci->db->from($db);
  $result=$ci->db->count_all_results();
  if($result>0){return $result;}else{return '0';}
}

function seo_link($url){
    $url = trim($url);
    $url = mb_strtolower($url);
    $find = array('<b>', '</b>');
    $url = str_replace ($find, '', $url);
    $url = preg_replace('/<(\/{0,1})img(.*?)(\/{0,1})\>/', 'image', $url);
    $find = array(' ', '&amp;amp;amp;quot;', '&amp;amp;amp;amp;', '&amp;amp;amp;', '\r\n', '\n', '/', '\\', '+', '<', '>');
    $url = str_replace ($find, '-', $url);
    $find = array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ë', 'Ê');
    $url = str_replace ($find, 'e', $url);
    $find = array('í', 'ý', 'ì', 'î', 'ï', 'I', 'Ý', 'Í', 'Ì', 'Î', 'Ï','İ','ı');
    $url = str_replace ($find, 'i', $url);
    $find = array('ó', 'ö', 'Ö', 'ò', 'ô', 'Ó', 'Ò', 'Ô');
    $url = str_replace ($find, 'o', $url);
    $find = array('á', 'ä', 'â', 'à', 'â', 'Ä', 'Â', 'Á', 'À', 'Â');
    $url = str_replace ($find, 'a', $url);
    $find = array('ú', 'ü', 'Ü', 'ù', 'û', 'Ú', 'Ù', 'Û');
    $url = str_replace ($find, 'u', $url);
    $find = array('ç', 'Ç');
    $url = str_replace ($find, 'c', $url);
    $find = array('þ', 'Þ','ş','Ş');
    $url = str_replace ($find, 's', $url);
    $find = array('ð', 'Ð','ğ','Ğ');
    $url = str_replace ($find, 'g', $url);
    $find = array('/[^A-Za-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
    $repl = array('', '-', '');
    $url = preg_replace ($find, $repl, $url);
    $url = str_replace ('--', '-', $url);
    return $url;
}
function seo_link2($url)
{
  $url2=seo_link($url);
  $url2 = str_replace ('-', '_', $url2);
  return $url2;
}
function cleanword($url){
    $url = trim($url);
    $find = array('<b>', '</b>');
    $url = str_replace ($find, '', $url);
    $url = preg_replace('/<(\/{0,1})img(.*?)(\/{0,1})\>/', 'image', $url);
    $find = array('&amp;amp;amp;quot;', '&amp;amp;amp;amp;', '&amp;amp;amp;', '\r\n', '\n', '/', '\\', '+', '<', '>','&nbsp;');
    $url = str_replace ($find, '', $url);
    return $url;
}
function baslik_yap($url){
    $url = trim($url);
    $find = array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ë', 'Ê');
    $url = str_replace ($find, 'e', $url);
    $find = array('í', 'ý', 'ì', 'î', 'ï', 'I', 'Ý', 'Í', 'Ì', 'Î', 'Ï','İ','ı');
    $url = str_replace ($find, 'i', $url);
    $find = array('ó', 'ö', 'Ö', 'ò', 'ô', 'Ó', 'Ò', 'Ô');
    $url = str_replace ($find, 'o', $url);
    $find = array('á', 'ä', 'â', 'à', 'â', 'Ä', 'Â', 'Á', 'À', 'Â');
    $url = str_replace ($find, 'a', $url);
    $find = array('ú', 'ü', 'Ü', 'ù', 'û', 'Ú', 'Ù', 'Û');
    $url = str_replace ($find, 'u', $url);
    $find = array('ç', 'Ç');
    $url = str_replace ($find, 'c', $url);
    $find = array('þ', 'Þ','ş','Ş');
    $url = str_replace ($find, 's', $url);
    $find = array('ð', 'Ð','ğ','Ğ');
    $url = str_replace ($find, 'g', $url);
    $url = mb_strtolower($url);
    $url = ucwords($url);
    return $url;
}


function seoKategori()
{
  $ci=& get_instance();
  $kategoriler=$ci->db->get('kategoriler')->result();
  foreach ($kategoriler as $kategori) {
    //$ad=seo_link($kategori['kategori_adi']);
    //$Id=$kategori['Id'];
    $ad=seo_link($kategori->kategori_adi);
    $Id=$kategori->Id;
    $ci->db->set('seo', $ad);
    $ci->db->where('Id', $Id);
    $ci->db->update('kategoriler');
  }
  return true;
}

function konum($seo_il,$seo_ilce,$seo_mahalle)
{
  $ci=& get_instance();
  $ci->db->where('seo_il',$seo_il);
  $il_id=$ci->db->get('tbl_il')->row()->il_id;

  $ci->db->where('seo_ilce',$seo_ilce);
  $ci->db->where('il_id',$il_id);
  $ilce_id=$ci->db->get('tbl_ilce')->row()->ilce_id;

  $ci->db->where('seo_mahalle',$seo_mahalle);
  $ci->db->where('ilce_id',$ilce_id);
  $mahalle_id=$ci->db->get('tbl_mahalle')->row()->mahalle_id;
  return $konum = array('il' =>$il_id ,'ilce' =>$ilce_id ,'mahalle' =>$mahalle_id  );

}

function post_captcha($user_response) {
    $fields_string = '';
    $fields = array(
        'secret' => '6LdibXAUAAAAAAZer9hgSt1cMLDLRCeTC96doGk_',
        'response' => $user_response
    );
    foreach($fields as $key=>$value)
    $fields_string .= $key . '=' . $value . '&';
    $fields_string = rtrim($fields_string, '&');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

    $result = curl_exec($ch);
    curl_close($ch);

    return json_decode($result, true);
}

function curl_connect($url){ // curl bağlantı fonksiyonu

    $curl = curl_init(); // Curl oturumu başlat
    curl_setopt($curl, CURLOPT_URL, $url); // url'ye bağlan
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Veriyi ekrana yazma. Değişkene aktarıp ayıklayacağım
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]); // Siteye tarayıcı bilgisi gönder, uyanmasın.
    $content = curl_exec($curl); // Curl oturumunu çalıştır ve gelen sonucu değişkene aktar.
    curl_close($curl); // İşimiz bitti, oturumu sonlandır.

    $content = preg_replace("/\s+/", " ", $content); // boşlukları temizle
    $content = preg_replace("/\r|\n/", " ", $content); // yeni satırları temizle
    $content = preg_replace("/\t+/", "", $content); // tabları temizle
    $content = preg_replace("/<script\b[^>]*>(.*?)<\/script>/is", "", $content); // javascript kodlarını temizle
    $content = trim($content); // başta ve sonda kalan boşlukları temizle

    return $content; // Sonuç döndür
}

function curl_search($first, $last, $content){ // $content parametresi içinde, $first ve $last parametreleri ile gelen değerler arasındaki veriyi bulup sonuç döndürür.
    @preg_match_all('/' . preg_quote($first, '/').'(.*?)'. preg_quote($last, '/').'/i', $content, $m);
    return @$m[1];
}
function kategori($Id){
  $ci=& get_instance();
  if ($Id && $Id != '0') {

    $ci->db->where('Id',$Id);
    $query=$ci->db->get('kategoriler');
    if ($query->num_rows() > 0) {
      return $query->row();
    }
  }
}

function getustkategorinames($Id)
{
  $kategori=kategori($Id);
  if ($kategori) {
    $kategoriler[]=replace('kategoriler','kategori_adi','Id',$kategori->Id);
    $kategori=kategori($kategori->ust_kategori);
    if ($kategori) {
      $kategoriler[]=replace('kategoriler','kategori_adi','Id',$kategori->Id);
      $kategori=kategori($kategori->ust_kategori);
      if ($kategori) {
        $kategoriler[]=replace('kategoriler','kategori_adi','Id',$kategori->Id);
        $kategori=kategori($kategori->ust_kategori);
        if ($kategori) {
          $kategoriler[]=replace('kategoriler','kategori_adi','Id',$kategori->Id);
          $kategori=kategori($kategori->ust_kategori);
          if ($kategori) {
            $kategoriler[]=replace('kategoriler','kategori_adi','Id',$kategori->Id);
            $kategori=kategori($kategori->ust_kategori);
            if ($kategori) {
              $kategoriler[]=replace('kategoriler','kategori_adi','Id',$kategori->Id);
              $kategori=kategori($kategori->ust_kategori);
              if ($kategori) {
                $kategoriler[]=replace('kategoriler','kategori_adi','Id',$kategori->Id);
                $kategori=kategori($kategori->ust_kategori);
                if ($kategori) {
                  $kategoriler[]=replace('kategoriler','kategori_adi','Id',$kategori->Id);
                }
              }
            }
          }
        }
      }
    }
  }

  return array_reverse($kategoriler);
}

function getustkategorys($Id)
{
  $kategoriler = array();
  $kategori=kategori($Id);
  if ($kategori) {
    $kategoriler[]=$kategori;
    $kategori=kategori($kategori->ust_kategori);
    if ($kategori) {
      $kategoriler[]=$kategori;
      $kategori=kategori($kategori->ust_kategori);
      if ($kategori) {
        $kategoriler[]=$kategori;
        $kategori=kategori($kategori->ust_kategori);
        if ($kategori) {
          $kategoriler[]=$kategori;
          $kategori=kategori($kategori->ust_kategori);
          if ($kategori) {
            $kategoriler[]=$kategori;
            $kategori=kategori($kategori->ust_kategori);
            if ($kategori) {
              $kategoriler[]=$kategori;
              $kategori=kategori($kategori->ust_kategori);
              if ($kategori) {
                $kategoriler[]=$kategori;
                $kategori=kategori($kategori->ust_kategori);
                if ($kategori) {
                  $kategoriler[]=$kategori;
                }
              }
            }
          }
        }
      }
    }
  }
    return array_reverse($kategoriler);
}

function dateReplace($date){
    $date = new DateTime($date);

    return $date->format('d/m/Y');
}
function ilan_id_al($cls_id=0)
{
  if ($cls_id==0) {
    $cls_id=rand(1000,999999);
  }
  $ci=& get_instance();
  $sorgula=$ci->db->query("select * from firmalar where Id='".$cls_id."'")->num_rows();
  if($sorgula=='0'){
  return $cls_id;
  }else{
  $new_cls_id=rand(1000,999999);
  ilan_id_al($new_cls_id);
  }
}

function resim_limit($userID,$super_magaza_resim_siniri,$normal_magaza_resim_siniri,$normal_resim_siniri)
{
  $ci=& get_instance();
  $mgzsor= $ci->db->query("select * from magaza_kullanicilari where uyeId='".$userID."'");
  $mgzsrg= $mgzsor->num_rows();
  $mgz_detay= $mgzsor->row();
  $sprmgz= $ci->db->query("select * from magazalar where Id='".$mgz_detay->magazaId ."' and onay='1'")->row();

  if ($mgzsrg!= 0 and $sprmgz->supermagaza == "1") {
    return $super_magaza_resim_siniri;
  }elseif ($mgzsrg!= 0 and $sprmgz->supermagaza == "0") {
    return $normal_magaza_resim_siniri;
  }else {
    return $normal_resim_siniri;
  }
}
function max_ilan_kontrol($userID,$kategori)
{
  $ci=& get_instance();
  $maxkontrol=$ci->db->query("select * from firmalar where kategoriId='".$kategori."' and uyeId='".$userID."'")->num_rows();
  $ilansayilari= $ci->db->query("select maxilan,maxilan_magaza,maxilan_supermagaza from ayarlar")->row();
  $maxilan=$ilansayilari->maxilan;
  $maxilan_magaza=$ilansayilari->maxilan_magaza;
  $maxilan_supermagaza=$ilansayilari->maxilan_supermagaza;
  if (magaza_aktif_mi($userID)) {
    $magaza=$ci->db->query("select * from magaza_kullanicilari where uyeId='".$userID."'")->row();
    $nolimit1=$ci->db->query("select * from magazalar where Id='".$magaza->magazaId."' and supermagaza='1' and onay='1'")->num_rows();
    $nolimit2=$ci->db->query("select * from magazalar where Id='".$magaza->magazaId."' and onay='1'")->num_rows();
    if($nolimit1 == 1){
      $maxilan2=$maxilan_supermagaza;
    }elseif($nolimit2 == 1){
      $maxilan2=$maxilan_magaza;
    }
  }else {
      $maxilan2=$maxilan;
  }

  if ($maxkontrol>=$maxilan2) {
    return true;
  } else {
    return false;
  }
}
function magaza_var_mi($userID)
{
  $ci=& get_instance();
  $ci->db->where("uyeId",$userID);
  $query=$ci->db->get("magaza_kullanicilari")->num_rows();
  if ($query > 0) {
    return true;
  } else {
    return false;
  }
}
function magaza_aktif_mi($userID)
{
  $ci=& get_instance();
  $ci->db->where("uyeId",$userID);
  $query=$ci->db->get("magaza_kullanicilari");
  if ($query->num_rows() > 0) {
    $mgz_check=$query->row();
    $mgz_check_row=$ci->db->query("select * from magazalar where Id='".$mgz_check->magazaId."' and onay='1'")->num_rows();
    if ($mgz_check_row==0) {
      return false;
    } else {
      return true;
    }
  }
}
function get_details($ilanId,$detail)
{
  $ci=& get_instance();
  $b=$ci->db->query("select * from custom_fields where ilanId='".$ilanId."' and field_name='".$detail."'")->row_array();
  return $b["field_value"];
}
function sorgula2($ilanId,$nerede,$ara)
{
  $ci=& get_instance();
  $section=$ci->db->query("select * from custom_fields where ilanId='".$ilanId."' and field_name='".$nerede."' and field_value LIKE '%".$ara."%'")->num_rows();
  if($section>0){
    return true;
  }else{
    return false;
  }

}

function get_fileExt($filename) {
 if( !preg_match('/\./', $filename) ) return '';
 return preg_replace('/^.*\./', '', $filename);
}

function get_fileName($filename){
 return preg_replace('/\.[^.]*$/', '', $filename);
}

function ilk_resim($ilanId)
{
  $ci=& get_instance();
  $ci->db->where("ilanId",$ilanId);
  $ci->db->order_by("id","ASC");
  $ci->db->limit(1);
  $query=$ci->db->get("pictures");
  if ($query->num_rows()>0) {
    return $query->row()->name;
  }
}
function yeni_tarih($tarih) {

  $tarih1= substr($tarih,0,4);
  $tarih2= substr($tarih,5,2);

  $tarih3= substr($tarih,8,2);
  $saat= substr($tarih,11,8);
  $ay1= array("01","02","03","04","05","06","07","08","09","10","11","12");

  $ay2= array("Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos",
  "Eylül","Ekim","Kasım","Aralık");
  $yeniay= str_replace($ay1,$ay2,$tarih2);

  //echo $tarih3." ".$yeniay." ".$tarih1." ".$saat;
  echo $tarih3." ".$yeniay." ".$tarih1;

}
function write_price($price1,$price2) {
  if ($price2== "0") {
    $price2= "00";
  }
  if (str_replace(array(".",","),"",$price1) >999) {
    return $price1;
  }else {
    return $price1.",<sup>".$price2."</sup>";
  }
}
function clear_phone($phone)
{
  return str_replace(array("(",")"," "),array("","",""),$phone);
}
function magaza_username($userID)
{
  $ci=& get_instance();
  $user=$ci->db->where("uyeId",$userID)->get("magaza_kullanicilari")->row();
  $query=$ci->db->where("Id",$user->magazaId)->get("magazalar");
  if ($query->num_rows() > 0) {
    return $query->row()->username;
  }
}
function magaza_ilan_say($magazaId,$kategoriId="",$kategori2="")
{
  $ci=& get_instance();
  $magaza_ilanlar=$ci->db->where("magazaId", $magazaId)->get("magaza_ilanlari")->result();
  $ilanlar =0;
  foreach ($magaza_ilanlar as $magaza_ilan) {
    $ci->db->where("Id",$magaza_ilan->ilanId);
    if ($kategoriId != "") {
      $ci->db->where("kategoriId", $kategoriId);
    }
    if ($kategori2 != "") {
      $ci->db->where("kategori2", $kategori2);
    }
    $ilan=$ci->db->get("firmalar");
    if ($ilan->num_rows() > 0) {
      $ilanlar++;
    }
  }
  return $ilanlar;
}
function ilansay($where)
{
  $ci=& get_instance();
  return $ci->db->where($where)->get("firmalar")->num_rows();
}

function CallWithFilter($GetCall)
{
  $suankiadres="http://".str_replace("www.","",$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]);
  $yeniadres=preg_replace("/&sayfa=(.*)/", "", $suankiadres);
  $adres=explode("?WithFilter=",$yeniadres);
  $new_adres=$adres[0];
  if($GetCall!=''){
    $WithFilter="?WithFilter=".$GetCall;
  }else{
    $WithFilter="";
  }
  echo $new_adres.$WithFilter;
}

function check_url($text){
  if(strstr($_SERVER[REQUEST_URI],$text)){
    $order_url=preg_replace("/&".$text."=[a-z-0-9]+/i","",$_SERVER[REQUEST_URI]);
    $order_go=$order_url;
  }else{
    $order_url=$_SERVER[REQUEST_URI];
    $order_go=$order_url;
  }
  return $order_go;
}

function yeni_tarih2($tarih) {
  $tarih1= substr($tarih,0,4);
  $tarih2= substr($tarih,5,2);

  $tarih3= substr($tarih,8,2);
  $saat= substr($tarih,11,8);
  $ay1= array("01","02","03","04","05","06","07","08","09","10","11","12");

  $ay2= array("Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos",
  "Eylül","Ekim","Kasım","Aralık");
  $yeniay= str_replace($ay1,$ay2,$tarih2);

  echo $tarih3."/".$yeniay."/".$tarih1;
}
function get_ad_cat_show_detail($detail,$adId)
{
  $ci=& get_instance();
  $b=$ci->db->query("select * from custom_fields where ilanId='".$adId."' and field_name='".$detail."'");
  if ($b->num_rows() > 0) {
    return $b->row()->field_value;
  }
}
function resim_sil()
{
  $ci=& get_instance();
  $resimler=$ci->db->get("pictures")->result();
  $i=1;
  foreach ($resimler as $resim) {
    if (!file_exists("photos/big/".$resim->name)) {
      $delete=$ci->db->delete("pictures",array("name" => $resim->name));
      if ($delete) {
        echo $i.". resim ".$resim->name." silindi.<br />";
        $i++;
      }
    }
  }
}
