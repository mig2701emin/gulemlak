<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ilanlar extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('firmalar');
    $this->load->model('kategoriler');
    $this->load->model('fields');
  }

  public function listele($key1,$val1,$key2,$val2,$key3,$val3,$key4,$val4,$key5,$val5,$key6,$val6,$key7='',$val7='')
  {

    $data['title']='Emlak Meclisi | İlanlar';
    $data['anaKategoriler']=$this->kategoriler->getAnaKategoriler();
    if ($key7!='') {
      $konum=konum($val5,$val6,$val7);
      $data['firmalar']=$this->firmalar->konut_ilanlari($key1,$val1,$key2,$val2,$key3,$val3,$key4,$val4,$key5,$konum['il'],$key6,$konum['ilce'],$key7,$konum['mahalle']);
    }else {
      $konum=konum($val4,$val5,$val6);
      $data['firmalar']=$this->firmalar->is_arsa_ilanlari($key1,$val1,$key2,$val2,$key3,$val3,$key4,$konum['il'],$key5,$konum['ilce'],$key6,$konum['mahalle']);
    }
    $this->load->view('ilanlar',$data);
  }
  public function kategoriler($anaKategoriId,$altKategoriId="")
  {

    if ($anaKategoriId=="") {
      redirect(base_url());
    }
    $data['anaKategoriler']=$this->kategoriler->getAnaKategoriler();
    $anaKategori=$this->kategoriler->getbyid($anaKategoriId);
    $data['title']='Ticaret Meclisi | '.$anaKategori->kategori_adi;
    if ($altKategoriId!='') {
      $data['firmalar']=$this->firmalar->getByKategori($anaKategoriId,$altKategoriId);
    }else {
      $data['firmalar']=$this->firmalar->getByKategori($anaKategoriId);
    }
    $this->load->view('ilanlar',$data);
  }

  // public function kategori($key1,$val1,$key2,$val2,$key3,$val3,$key4,$val4,$key5,$val5,$key6,$val6,$key7='',$val7='')
  // {
  //   //$kategori=decode($kat);
  //   if ($key7!='') {
  //     $kategori=$val4;
  //     $konum=konum($val5,$val6,$val7);
  //   }else {
  //     $kategori=$val3;
  //     $konum=konum($val4,$val5,$val6);
  //   }
  //   $data["konum"]=$konum;
  //
  //   $this->load->library("pagination");
  //   $ek="";
  //   $order="";
  //   $kategorys=getustkategorys($kategori);
  //   $urlstring="";
  //
  //   $data["kategorys"]=$kategorys;
  //   for ($i=0; $i < 9 ; $i++) {
  //     if ($i == 0) {
  //       $field_kategori=$kategorys[0]->Id;
  //       $i++;
  //       $urlstring=$kategorys[0]->seo;
  //
  //     } elseif(isset($kategorys[$i-1])){
  //       $yeni="field_kategori".$i;
  //       $$yeni=$kategorys[$i-1]->Id;
  //       $urlstring.="/".$kategorys[$i-1]->seo;
  //       $uri_segment=$i+4;
  //     }else {
  //       $yeni="field_kategori".$i;
  //       $$yeni="";
  //     }
  //   }
  //   $data["linkkategori"]=$urlstring;
  //   if ($key7!='') {
  //     $urlstring.="/".$val5."/".$val6."/".$val7;
  //   }else {
  //     $urlstring.="/".$val4."/".$val5."/".$val6;
  //   }
  //   $sql="select * from fields where ((kategori='".$field_kategori."' and kategori2='0')";
  //   if ($field_kategori2!="") {
  //     $sql.=" or (kategori2='".$field_kategori2."' and kategori3='0')";
  //   }
  //   if ($field_kategori3!="") {
  //     $sql.=" or (kategori3='".$field_kategori3."' and kategori4='0')";
  //   }
  //   $sql.=") order by siralama";
  //
  //   $fields = $this->fields->getfields($sql);
  //   //fieldlerin getirilmesi bitiş
  //   $data["fields"]=$fields;
  //
  //   $sql2="select firmalar.* from firmalar left join custom_fields ON custom_fields.ilanId=firmalar.Id where firmalar.kategoriId='".$field_kategori."'";
  //   if ($field_kategori2!="") {
  //     $sql2.=" and firmalar.kategori2='".$field_kategori2."'";
  //   }
  //   if ($field_kategori3!="") {
  //     $sql2.=" and firmalar.kategori3='".$field_kategori3."'";
  //   }
  //
  //     $add_query_to_sql="";
  //     $order_type=$this->security->xss_clean($this->input->post("order_type"));
  //     if($order_type=='descdate'){
  //       $order="firmalar.kayit_tarihi DESC";
  //     }elseif($order_type=='ascdate'){
  //       $order="firmalar.kayit_tarihi ASC";
  //     }elseif($order_type=='descprice'){
  //       $order="firmalar.fiyat DESC";
  //     }elseif($order_type=='ascprice'){
  //       $order="firmalar.fiyat ASC";
  //     }elseif($order_type=='city'){
  //       $order="firmalar.il ASC";
  //     }else{
  //       $order="firmalar.kayit_tarihi DESC";
  //     }
  //     $data["order_type"]=$order_type;
  //
  //     $limit_get=$this->security->xss_clean($this->input->post("limit"));
  //     if($limit_get<=50 and $limit_get>=10 and !empty($limit_get)){
  //       $limit=$limit_get;
  //     }elseif(empty($limit)){
  //       $limit=40;
  //     }
  //     $data["limit"]=$limit;
  //     if(isset($_POST) && !empty($_POST)){
  //       $field_values = array();
  //       $field_posted_data=array();
  //       $getirilen = array();
  //       $sehir=$this->security->xss_clean($this->input->post("sehir"));
  //       if(!empty($sehir) and is_numeric($sehir)){
  //         $add_query_to_sql.=" and firmalar.il='".$sehir."'";
  //         $data["sehir"]=$sehir;
  //         $data["ilceler"]=$this->db->where("il_id",$sehir)->order_by("seo_ilce","ASC")->get("tbl_ilce")->result();
  //       }else {
  //         $add_query_to_sql.=" and firmalar.il='".$konum['il']."'";
  //         $data["sehir"]=$konum["il"];
  //         $data["ilceler"]=$this->db->where("il_id",$konum["il"])->order_by("seo_ilce","ASC")->get("tbl_ilce")->result();
  //       }
  //
  //       $ilce=$this->security->xss_clean($this->input->post("ilce"));
  //       if(!empty($ilce) and is_numeric($ilce)){
  //         $add_query_to_sql.=" and firmalar.ilce='".$ilce."'";
  //         $data["ilce"]=$ilce;
  //         $data["mahalleler"]=$this->db->where("ilce_id",$ilce)->order_by("seo_mahalle","ASC")->get("tbl_mahalle")->result();
  //       }else {
  //         $add_query_to_sql.=" and firmalar.ilce='".$konum['ilce']."'";
  //         $data["ilce"]=$konum["ilce"];
  //         $data["mahalleler"]=$this->db->where("ilce_id",$konum["ilce"])->order_by("seo_mahalle","ASC")->get("tbl_mahalle")->result();
  //       }
  //       $mahalle=$this->security->xss_clean($this->input->post("mahalle"));
  //       if(!empty($mahalle) and is_numeric($mahalle)){
  //         $add_query_to_sql.=" and firmalar.mahalle='".$mahalle."'";
  //         $data["mahalle"]=$mahalle;
  //       }else {
  //         if ($konum['mahalle']!=0) {
  //           $add_query_to_sql.=" and firmalar.mahalle='".$konum['mahalle']."'";
  //           $data["mahalle"]=$konum["mahalle"];
  //         }
  //       }
  //       $fotograf=$this->security->xss_clean($this->input->post("fotograf"));
  //       $data["fotograf"]=$fotograf;
  //       /*if(!empty($fotograf) and is_numeric($fotograf)){
  //         $add_query_to_sql.=" and firmalar.resim1!=''";
  //       }*/
  //       $harita=$this->security->xss_clean($this->input->post("harita"));
  //       $data["harita"]=$harita;
  //       if(!empty($harita) and is_numeric($harita)){
  //         $add_query_to_sql.=" and firmalar.harita!=''";
  //       }
  //       $fiyat_1=$this->security->xss_clean($this->input->post("fiyat_1"));
  //       $data["fiyat_1"]=$fiyat_1;
  //       $fiyat_2=$this->security->xss_clean($this->input->post("fiyat_2"));
  //       $data["fiyat_2"]=$fiyat_2;
  //       if(!empty($fiyat_1) and !empty($fiyat_2)){
  //         $add_query_to_sql.=" and (firmalar.fiyat BETWEEN ".$fiyat_1." and ".$fiyat_2.")";
  //       }
  //       $ilan_tarihi=$this->security->xss_clean(base64_decode($this->input->post("ilan_tarihi")));
  //       $data["ilan_tarihi"]=$ilan_tarihi;
  //       $current_date = date("Y-m-d");
  //       if($ilan_tarihi=='Son 24 Saat'){
  //         $date_filter = date('Y-m-d',strtotime('-1 day',strtotime($current_date)));
  //         $add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
  //       }elseif($ilan_tarihi=='Son 3 Gün'){
  //         $date_filter = date('Y-m-d',strtotime('-3 day',strtotime($current_date)));
  //         $add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
  //       }elseif($ilan_tarihi=='Son 7 Gün'){
  //         $date_filter = date('Y-m-d',strtotime('-7 day',strtotime($current_date)));
  //         $add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
  //       }elseif($ilan_tarihi=='Son 15 Gün'){
  //         $date_filter = date('Y-m-d',strtotime('-15 day',strtotime($current_date)));
  //         $add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
  //       }elseif($ilan_tarihi=='Son 30 Gün'){
  //         $date_filter = date('Y-m-d',strtotime('-30 day',strtotime($current_date)));
  //         $add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
  //       }
  //
  //       foreach ($fields as $field) {
  //         if($field->type=='text'){
  //           if($field->aralik=='1'){
  //             $field_posted_data[$field->seo_name."_1"]=$this->security->xss_clean($this->input->post($field->seo_name."_1"));
  //             $field_posted_data[$field->seo_name."_2"]=$this->security->xss_clean($this->input->post($field->seo_name."_2"));
  //             if(!empty($field_posted_data[$field->seo_name."_1"]) and !empty($field_posted_data[$field->seo_name."_2"]) and is_numeric($field_posted_data[$field->seo_name."_1"]) and is_numeric($field_posted_data[$field->seo_name."_2"])){
  //               $field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."' and custom_fields.field_value BETWEEN '".$field_posted_data[$field->seo_name."_1"]."' and '".$field_posted_data[$field->seo_name."_2"]."')";
  //               $getirilen[$field->seo_name."_1"]=$field_posted_data[$field->seo_name."_1"];
  //               $getirilen[$field->seo_name."_2"]=$field_posted_data[$field->seo_name."_2"];
  //             }
  //           }else{
  //             $field_posted_data[$field->seo_name]=$this->input->post($field->seo_name);
  //             if(!empty($field_posted_data[$field->seo_name])){
  //               $field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."' and custom_fields.field_value='".$field_posted_data[$field->seo_name]."')";
  //               $getirilen[$field->seo_name]=$field_posted_data[$field->seo_name];
  //             }
  //           }
  //         }elseif($field->type=='select' or $field->type=='radio'){
  //           if (!empty($this->input->post($field->seo_name))) {
  //             $field_posted_data[$field->seo_name]=implode("','",array_map("base64_decode",$this->input->post($field->seo_name)));
  //             if(!empty($field_posted_data[$field->seo_name])){
  //               $field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."' and custom_fields.field_value In ('".$field_posted_data[$field->seo_name]."'))";
  //               //if($field->multiple==1){
  //               //	$getirilen[$field->seo_name] = array($field_posted_data[$field->seo_name]);
  //               //}else{
  //                 $getirilen[$field->seo_name]=$this->input->post($field->seo_name);
  //               //}
  //             }
  //           }
  //         }elseif($field->type=='checkbox'){
  //           if (!empty($this->input->post($field->seo_name))) {
  //             $field_posted_data[$field->seo_name]=array_map("base64_decode",$this->input->post($field->seo_name));
  //             $field_search_v="";
  //             for ($i = 0; $i <= count($field_posted_data[$field->seo_name])-1; $i++) {
  //               $field_search_v.=" and find_in_set ('".str_replace('\'','',$field_posted_data[$field->seo_name][$i])."',replace(custom_fields.field_value,', ',','))";
  //             }
  //             if(!empty($field_posted_data[$field->seo_name])){
  //               $field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."'".$field_search_v.")";
  //               $getirilen[$field->seo_name]=array($this->input->post($field->seo_name));
  //             }
  //           }
  //         }elseif($field->type=='multiple_select'){
  //           $field_posted_data[$field->seo_name]=$this->input->post($field->seo_name);
  //           $field_posted_data2[$field->multiple_field_seo_name]=implode("','",array_map('base64_decode',$this->input->post($field->multiple_field_seo_name)));
  //           if(!empty($field_posted_data[$field->seo_name]) and !empty($field_posted_data2[$field->multiple_field_seo_name])){
  //             $field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."' and custom_fields.field_value='".$field_posted_data[$field->seo_name]."' and custom_fields.field_name='".$field->multiple_field_seo_name."' and custom_fields.field_value In ('".$field_posted_data2[$field->multiple_field_seo_name]."'))";
  //             $getirilen[$field->seo_name]=array($this->input->post($field->seo_name));
  //           }
  //         }
  //       }
  //       foreach ($field_values as $field_name => $field_value) {
  //         if(!empty($field_value)){
  //           $add_query_to_sql.=$field_value;
  //         }
  //       }
  //       $data["field_posted_data"]=$getirilen;
  //
  //
  //     }else {
  //         $add_query_to_sql.=" and firmalar.il='".$konum['il']."'";
  //         $data["sehir"]=$konum["il"];
  //         $data["ilceler"]=$this->db->where("il_id",$konum["il"])->order_by("seo_ilce","ASC")->get("tbl_ilce")->result();
  //         $add_query_to_sql.=" and firmalar.ilce='".$konum['ilce']."'";
  //         $data["ilce"]=$konum["ilce"];
  //         $data["mahalleler"]=$this->db->where("ilce_id",$konum["ilce"])->order_by("seo_mahalle","ASC")->get("tbl_mahalle")->result();
  //         $add_query_to_sql.=" and firmalar.mahalle='".$konum['mahalle']."'";
  //         $data["mahalle"]=$konum["mahalle"];
  //
  //     }
  //
  //     $WithFilter_g=$this->security->xss_clean(base64_decode($this->input->get('WithFilter')));
  //     $data["WithFilter_g"]=$WithFilter_g;
  //     if(!empty($WithFilter_g)){
  //       $explode_filter=explode("**",$WithFilter_g);
  //       $ek=" and custom_fields.field_name='".$explode_filter[0]."' and custom_fields.field_value='".$explode_filter[1]."'";
  //     }else{
  //       $ek="";
  //     }
  //     // fields başlangıç
  //     // fields sonu
  //   $config["uri_segment"] = $uri_segment;
  //   $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
  //   if ($page=="index.html") {
  //     $uri_segment++;
  //     $config["uri_segment"] = $uri_segment;
  //     $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
  //   }
  //   $config["per_page"] = $limit;
  //   $config["num_links"] = 10;
  //   $config["base_url"] = base_url($urlstring);
  //   $sql2.=" and onay='1' ".$ek.$add_query_to_sql." group by firmalar.Id order by firmalar.ust_siradayim DESC,".$order;
  //   $config["total_rows"] = $this->db->query($sql2)->num_rows();
  //   $sql2.=" LIMIT ".$page.", ".$config['per_page'];
  //   $this->pagination->initialize($config);
  //   $data["links"] = $this->pagination->create_links();
  //   $ilanlar = $this->db->query($sql2)->result();
  //   $data["ilanlar"]=$ilanlar;
  //   $data["kategori"]=$this->kategoriler->getbyid($kategori);
  //   $data["altKategoriler"]=$this->kategoriler->getSubs($kategori);
  //   $data["iller"]=$this->db->get("tbl_il")->result();
  //   $bugun = date("Y-m-d");
  //   $magkatvitrin = $this->db->query("SELECT mkvitrin.*,magazalar.magazaadi,magazalar.username,magazalar.logo FROM mkvitrin join magazalar on mkvitrin.magazaId=magazalar.Id WHERE (mkvitrin.bitis_tarihi >= ".$bugun.") and mkvitrin.kategoriId='".$kategorys[0]->Id."' and magazalar.onay='1' ORDER BY rand() LIMIT 6");
  //   if ($magkatvitrin->num_rows() > 0) {
  //     $data["magazaKatVitrin"]=$magkatvitrin->result();
  //   }
  //   $data["search"]="";
  //   $data["sayfa"]=0;
  //   if ($kategori==$val4) {
  //     $title="Ticaret Meclisi - ".replace("tbl_mahalle","mahalle_ad","mahalle_id",$data["mahalle"])." ".$kategorys[2]->kategori_adi." ".$kategorys[3]->kategori_adi." ".replace("tbl_il","il_ad","il_id",$data["sehir"]);
  //     $description=replace("tbl_il","il_ad","il_id",$data["sehir"])." ili, ".replace("tbl_ilce","ilce_ad","ilce_id",$data["ilce"])." ilçesi, ".replace("tbl_mahalle","mahalle_ad","mahalle_id",$data["mahalle"])."'nde yer alan tüm ".$kategorys[2]->kategori_adi." ".$kategorys[3]->kategori_adi." ilanlarını www.ticaretmeclisi.com adresinde bulabilirsiniz";
  //   } else {
  //     $title="Ticaret Meclisi - ".replace("tbl_mahalle","mahalle_ad","mahalle_id",$data["mahalle"])." ".$kategorys[2]->kategori_adi." ".$kategorys[1]->kategori_adi." ".replace("tbl_il","il_ad","il_id",$data["sehir"]);
  //     $description=replace("tbl_il","il_ad","il_id",$data["sehir"])." ili, ".replace("tbl_ilce","ilce_ad","ilce_id",$data["ilce"])." ilçesi, ".replace("tbl_mahalle","mahalle_ad","mahalle_id",$data["mahalle"])."'nde yer alan tüm ".$kategorys[2]->kategori_adi." ".$kategorys[1]->kategori_adi." ilanlarını www.ticaretmeclisi.com adresinde bulabilirsiniz";
  //   }
  //
  //   $data["title"]=$title;
  //   $data["description"]=$description;
  //   $this->load->view("kategori2",$data);
  // }
}
