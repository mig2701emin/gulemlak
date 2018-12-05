<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listele extends CI_Controller{
  private $user;
  private $magaza;
  public function __construct()
  {
    parent::__construct();
    $this->load->model('members');
    $this->load->model('kategoriler');
    $this->load->model('firmalar');
    $this->load->model('fields');
    $this->load->model('magazalar');
    if($this->session->userdata('userData')){
      $where = array("Id" => $this->session->userdata('userData')["userID"]);
      $this->user=$this->members->get($where);
      if(magaza_var_mi($this->user->Id)){
        $this->magaza=$this->magazalar->getMagaza($this->magazalar->getMagazaId($this->user->Id));
      }else {
        $this->magaza=null;
      }
    }else {
      $this->user=null;
    }
  }

  function index()
  {

  }
  public function get($kategori,$seo_il="",$seo_ilce="",$seo_mahalle="")
  {
    if ($this->user!=null) {
      $data["user"]=$this->user;
    }
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->library("pagination");
    $ek="";
    $order="";
    $kategorys=getustkategorys($kategori);
    $urlstring="";
    $uri_segment=0;
    $data["kategorys"]=$kategorys;
    for ($i=0; $i < 6 ; $i++) {
      if ($i == 0) {
        $field_kategori=$kategorys[0]->Id;
        $i++;
        $urlstring=$kategorys[0]->seo;
        $uri_segment=$i+2;
      } elseif(isset($kategorys[$i-1])){
        $yeni="field_kategori".$i;
        $$yeni=$kategorys[$i-1]->Id;
        $urlstring.="/".$kategorys[$i-1]->seo;
        $uri_segment=$i+2;
      }else {
        $yeni="field_kategori".$i;
        $$yeni="";
      }
    }
    $urlstring.="/".$kategori;
    $data["linkkategori"]=$urlstring;


    $sql="select * from fields where ((kategori='".$field_kategori."' and kategori2='0')";
    if ($field_kategori2!="") {
      $sql.=" or (kategori2='".$field_kategori2."' and kategori3='0')";
    }
    if ($field_kategori3!="") {
      $sql.=" or (kategori3='".$field_kategori3."' and kategori4='0')";
    }
    if ($field_kategori4!="") {
      $sql.=" or (kategori4='".$field_kategori4."' and kategori5='0')";
    }
    if ($field_kategori5!="") {
      $sql.=" or (kategori5='".$field_kategori5."' and kategori6='0')";
    }
    $sql.=") order by siralama";

    $fields = $this->fields->getfields($sql);
    //fieldlerin getirilmesi bitiş
    $data["fields"]=$fields;

    $sql2="select firmalar.* from firmalar left join custom_fields ON custom_fields.ilanId=firmalar.Id where firmalar.kategoriId='".$field_kategori."'";
    if ($field_kategori5!="") {
      $sql2.=" and firmalar.kategori5='".$field_kategori5."'";
    }elseif ($field_kategori4!="") {
      $sql2.=" and firmalar.kategori4='".$field_kategori4."'";
    }elseif ($field_kategori3!="") {
      $sql2.=" and firmalar.kategori3='".$field_kategori3."'";
    }elseif ($field_kategori2!="") {
      $sql2.=" and firmalar.kategori2='".$field_kategori2."'";
    }
    $data["iller"]=$this->db->order_by("seo_il","ASC")->get("tbl_il")->result();
    if ($seo_il!="") {
      $il=$this->db->where("seo_il",$seo_il)->get("tbl_il")->row();
      $data["il"]=$il;
      $urlstring.="/".$seo_il;
      $uri_segment++;
      $konum="/".$seo_il;
      $sql2.=" and firmalar.il='".$il->il_id."'";
      $data["ilceler"]=$this->db->where("il_id",$il->il_id)->order_by("seo_ilce","ASC")->get("tbl_ilce")->result();
      if ($seo_ilce!="") {
        $ilce=$this->db->where("il_id",$il->il_id)->where("seo_ilce",$seo_ilce)->get("tbl_ilce")->row();
        $data["ilce"]=$ilce;
        $urlstring.="/".$seo_ilce;
        $uri_segment++;
        $konum.="/".$seo_ilce;
        $sql2.=" and firmalar.ilce='".$ilce->ilce_id."'";
        $data["mahalleler"]=$this->db->where("ilce_id",$ilce->ilce_id)->order_by("seo_mahalle","ASC")->get("tbl_mahalle")->result();
        if ($seo_mahalle!="") {
          $mahalle=$this->db->where("ilce_id",$ilce->ilce_id)->where("seo_mahalle",$seo_mahalle)->get("tbl_mahalle")->row();
          $data["mahalle"]=$mahalle;
          $urlstring.="/".$seo_mahalle;
          $uri_segment++;
          $konum.="/".$seo_mahalle;
          $sql2.=" and firmalar.mahalle='".$mahalle->mahalle_id."'";
        }
      }
      $data["linkkonum"]=$konum;
    }
    $add_query_to_sql="";
    $order_type=$this->security->xss_clean($this->input->get("order_type"));
    if($order_type=='descdate'){
      $order="firmalar.kayit_tarihi DESC";
    }elseif($order_type=='ascdate'){
      $order="firmalar.kayit_tarihi ASC";
    }elseif($order_type=='descprice'){
      $order="firmalar.fiyat DESC";
    }elseif($order_type=='ascprice'){
      $order="firmalar.fiyat ASC";
    }elseif($order_type=='city'){
      $order="firmalar.il ASC";
    }else{
      $order="firmalar.kayit_tarihi DESC";
    }
    $data["order_type"]=$order_type;

    $limit_get=$this->security->xss_clean($this->input->get("limit"));
    if($limit_get<=50 and $limit_get>=10 and !empty($limit_get)){
      $limit=$limit_get;
    }elseif(empty($limit)){
      $limit=40;
    }
    $data["limit"]=$limit;

    if (isset($_GET) && !empty($_GET)) {
      $field_values = array();
      $field_posted_data=array();
      $getirilen = array();
      $fotograf=$this->security->xss_clean($this->input->get("fotograf"));
      $data["fotograf"]=$fotograf;
      /*if(!empty($fotograf) and is_numeric($fotograf)){
        $add_query_to_sql.=" and firmalar.resim1!=''";
      }*/
      $harita=$this->security->xss_clean($this->input->get("harita"));
      $data["harita"]=$harita;
      if(!empty($harita) and is_numeric($harita)){
        $add_query_to_sql.=" and firmalar.harita!=''";
      }
      $fiyat_1=$this->security->xss_clean($this->input->get("fiyat_1"));
      $data["fiyat_1"]=$fiyat_1;
      $fiyat_2=$this->security->xss_clean($this->input->get("fiyat_2"));
      $data["fiyat_2"]=$fiyat_2;
      if(!empty($fiyat_1) and !empty($fiyat_2)){
        $add_query_to_sql.=" and (firmalar.fiyat BETWEEN ".$fiyat_1." and ".$fiyat_2.")";
      }
      $ilan_tarihi=$this->security->xss_clean(base64_decode($this->input->get("ilan_tarihi")));
      $data["ilan_tarihi"]=$ilan_tarihi;
      $current_date = date("Y-m-d");
      if($ilan_tarihi=='Son 24 Saat'){
        $date_filter = date('Y-m-d',strtotime('-1 day',strtotime($current_date)));
        $add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
      }elseif($ilan_tarihi=='Son 3 Gün'){
        $date_filter = date('Y-m-d',strtotime('-3 day',strtotime($current_date)));
        $add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
      }elseif($ilan_tarihi=='Son 7 Gün'){
        $date_filter = date('Y-m-d',strtotime('-7 day',strtotime($current_date)));
        $add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
      }elseif($ilan_tarihi=='Son 15 Gün'){
        $date_filter = date('Y-m-d',strtotime('-15 day',strtotime($current_date)));
        $add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
      }elseif($ilan_tarihi=='Son 30 Gün'){
        $date_filter = date('Y-m-d',strtotime('-30 day',strtotime($current_date)));
        $add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
      }

      foreach ($fields as $field) {
        if($field->type=='text'){
          if($field->aralik=='1'){
            $field_posted_data[$field->seo_name."_1"]=$this->security->xss_clean($this->input->get($field->seo_name."_1"));
            $field_posted_data[$field->seo_name."_2"]=$this->security->xss_clean($this->input->get($field->seo_name."_2"));
            if(!empty($field_posted_data[$field->seo_name."_1"]) and !empty($field_posted_data[$field->seo_name."_2"]) and is_numeric($field_posted_data[$field->seo_name."_1"]) and is_numeric($field_posted_data[$field->seo_name."_2"])){
              $field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."' and custom_fields.field_value BETWEEN '".$field_posted_data[$field->seo_name."_1"]."' and '".$field_posted_data[$field->seo_name."_2"]."')";
              $getirilen[$field->seo_name."_1"]=$field_posted_data[$field->seo_name."_1"];
              $getirilen[$field->seo_name."_2"]=$field_posted_data[$field->seo_name."_2"];
            }
          }else{
            $field_posted_data[$field->seo_name]=$this->input->get($field->seo_name);
            if(!empty($field_posted_data[$field->seo_name])){
              $field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."' and custom_fields.field_value='".$field_posted_data[$field->seo_name]."')";
              $getirilen[$field->seo_name]=$field_posted_data[$field->seo_name];
            }
          }
        }elseif($field->type=='select' or $field->type=='radio'){
          if (!empty($this->input->get($field->seo_name))) {
            $field_posted_data[$field->seo_name]=implode("','",array_map("base64_decode",$this->input->get($field->seo_name)));
            if(!empty($field_posted_data[$field->seo_name])){
              $field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."' and custom_fields.field_value In ('".$field_posted_data[$field->seo_name]."'))";
              //if($field->multiple==1){
              //	$getirilen[$field->seo_name] = array($field_posted_data[$field->seo_name]);
              //}else{
                $getirilen[$field->seo_name]=$this->input->get($field->seo_name);
              //}
            }
          }
        }elseif($field->type=='checkbox'){
          if (!empty($this->input->get($field->seo_name))) {
            $field_posted_data[$field->seo_name]=array_map("base64_decode",$this->input->get($field->seo_name));
            $field_search_v="";
            for ($i = 0; $i <= count($field_posted_data[$field->seo_name])-1; $i++) {
              $field_search_v.=" and find_in_set ('".str_replace('\'','',$field_posted_data[$field->seo_name][$i])."',replace(custom_fields.field_value,', ',','))";
            }
            if(!empty($field_posted_data[$field->seo_name])){
              $field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."'".$field_search_v.")";
              $getirilen[$field->seo_name]=array($this->input->get($field->seo_name));
            }
          }
        }elseif($field->type=='multiple_select'){
          $field_posted_data[$field->seo_name]=$this->input->get($field->seo_name);
          $field_posted_data2[$field->multiple_field_seo_name]=implode("','",array_map('base64_decode',$this->input->get($field->multiple_field_seo_name)));
          if(!empty($field_posted_data[$field->seo_name]) and !empty($field_posted_data2[$field->multiple_field_seo_name])){
            $field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."' and custom_fields.field_value='".$field_posted_data[$field->seo_name]."' and custom_fields.field_name='".$field->multiple_field_seo_name."' and custom_fields.field_value In ('".$field_posted_data2[$field->multiple_field_seo_name]."'))";
            $getirilen[$field->seo_name]=array($this->input->get($field->seo_name));
          }
        }
      }
      foreach ($field_values as $field_name => $field_value) {
        if(!empty($field_value)){
          $add_query_to_sql.=$field_value;
        }
      }
      $data["field_posted_data"]=$getirilen;
    }

    $WithFilter_g=$this->security->xss_clean(base64_decode($this->input->get('WithFilter')));
    $data["WithFilter_g"]=$WithFilter_g;
    if(!empty($WithFilter_g)){
      $explode_filter=explode("**",$WithFilter_g);
      $ek=" and custom_fields.field_name='".$explode_filter[0]."' and custom_fields.field_value='".$explode_filter[1]."'";
    }else{
      $ek="";
    }

    $config["uri_segment"] = $uri_segment;
    $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
    if ($page=="index.html") {
      $uri_segment++;
      $config["uri_segment"] = $uri_segment;
      $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
    }
    $config["per_page"] = $limit;
    $config["num_links"] = 10;
    $config["base_url"] = base_url($urlstring);
    $sql2.=" and firmalar.onay='1' ".$ek.$add_query_to_sql." group by firmalar.Id order by firmalar.ust_siradayim DESC,".$order;
    $config["total_rows"] = $this->db->query($sql2)->num_rows();
    $sql2.=" LIMIT ".$page.", ".$config['per_page'];
    //$config["page_query_string"] = TRUE;
    $config["reuse_query_string"] = TRUE;
    $config["first_link"] = "İlk";
    $config["last_link"] = "Son";
    $this->pagination->initialize($config);
    $data["links"] = $this->pagination->create_links();
    $ilanlar = $this->db->query($sql2)->result();
    $data["ilanlar"]=$ilanlar;
    $data["kategori"]=$this->kategoriler->getbyid($kategori);
    $data["altKategoriler"]=$this->kategoriler->getSubs($kategori);
    $bugun = date("Y-m-d");
    $magkatvitrin = $this->db->query("SELECT mkvitrin.*,magazalar.magazaadi,magazalar.username,magazalar.logo FROM mkvitrin join magazalar on mkvitrin.magazaId=magazalar.Id WHERE (mkvitrin.bitis_tarihi >= ".$bugun.") and mkvitrin.kategoriId='".$kategorys[0]->Id."' and magazalar.onay='1' ORDER BY rand() LIMIT 6");
    if ($magkatvitrin->num_rows() > 0) {
      $data["magazaKatVitrin"]=$magkatvitrin->result();
    }
    $data["search"]="";
    $data["sayfa"]=0;
    $title="Ticaret Meclisi - ";
    $description="";
    if ($seo_mahalle!="") {
      $title.=$mahalle->mahalle_ad." ";
    }elseif ($seo_ilce!="") {
      $title.=$ilce->ilce_ad." ";
    }elseif ($seo_il!="") {
      $title.=$il->il_ad." ";
    }
    if ($seo_il!="") {
      $description.=$il->il_ad." ili, ";
    }elseif ($seo_ilce!="") {
      $description.=$ilce->ilce_ad." ilçesi, ";
    }elseif ($seo_mahalle!="") {
      $description.=$mahalle->mahalle_ad." ";
    }
    if ($field_kategori4!="") {
      $title.=$kategorys[2]->kategori_adi." ".$kategorys[3]->kategori_adi;
      $description.=$kategorys[2]->kategori_adi." ".$kategorys[3]->kategori_adi;
    }elseif ($field_kategori3!="") {
      $title.=$kategorys[2]->kategori_adi." ".$kategorys[1]->kategori_adi;
      $description.=$kategorys[2]->kategori_adi." ".$kategorys[1]->kategori_adi;
    }elseif ($field_kategori2!="") {
      $title.="Satılık Kiralık ".$kategorys[1]->kategori_adi;
      $description.="Satılık Kiralık ".$kategorys[1]->kategori_adi;
    }else {
      $title.="Satılık Kiralık ".$kategorys[0]->kategori_adi;
      $description.="Satılık Kiralık ".$kategorys[0]->kategori_adi;
    }
    if ($seo_il!="") {
      $title.=" - ".$il->il_ad;
    }
    $description.=" ilanlarını www.ticaretmeclisi.com adresinde bulabilirsiniz";
    $data["title"]=$title;
    $data["description"]=$description;
    $this->load->view("kategori2",$data);

  }

}
