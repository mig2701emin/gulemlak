<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hesabim extends CI_Controller{
  private $user;
  private $magaza;
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('userData')){ redirect('login'); }
    $this->load->model('firmalar');
    $this->load->model("members");
    $this->load->model("magazalar");
    $this->load->model("fields");

    $where = array("Id" => $this->session->userdata('userData')["userID"]);
    $this->user=$this->members->get($where);
    if(magaza_var_mi($this->user->Id)){
      $this->magaza=$this->magazalar->getMagaza($this->magazalar->getMagazaId($this->user->Id));
    }else {
      $this->magaza=null;
    }

  }
  public function anasayfa($filter="")
  {
    $this->load->library("pagination");
    $config["per_page"] = 40;
    if ($filter == "aktif") {
      $where = array("uyeId" => $this->user->Id,"onay"=>"1");
      $filter2="Aktif";
      $urlstring="hesabim/anasayfa/aktif";
      $uri_segment=4;
      $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
      $query=$this->db->where($where)->order_by("kayit_tarihi","DESC")->limit($config["per_page"],$page)->get("firmalar");
      $data["toplam_kayit"]=$this->db->where($where)->get("firmalar")->num_rows();
    }elseif ($filter == "bekleyen") {
      //$where = array("uyeId" => $this->user->Id,"onay"=>"0");
      $where ="uyeId=".$this->user->Id." AND onay='0' AND suresi_doldu='0'";
      $filter2="Onay Bekleyen";
      $urlstring="hesabim/anasayfa/bekleyen";
      $uri_segment=4;
      $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
      $query=$this->db->where($where)->order_by("kayit_tarihi","DESC")->limit($config["per_page"],$page)->get("firmalar");
      $data["toplam_kayit"]=$this->db->where($where)->get("firmalar")->num_rows();
    }elseif ($filter == "durdurulan") {
      //$where = array("uyeId" => $this->user->Id,"onay"=>"0");
      $where ="uyeId=".$this->user->Id." AND onay='2'";
      $filter2="Durdurulan";
      $urlstring="hesabim/anasayfa/durdurulan";
      $uri_segment=4;
      $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
      $query=$this->db->where($where)->order_by("kayit_tarihi","DESC")->limit($config["per_page"],$page)->get("firmalar");
      $data["toplam_kayit"]=$this->db->where($where)->get("firmalar")->num_rows();
    }elseif ($filter == "suresibiten") {
      //$where = array("uyeId" => $this->user->Id,"onay"=>"0");
      $where ="uyeId=".$this->user->Id." AND onay='0' AND suresi_doldu='1'";
      $filter2="Süresi Biten";
      $urlstring="hesabim/anasayfa/suresibiten";
      $uri_segment=4;
      $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
      $query=$this->db->where($where)->order_by("kayit_tarihi","DESC")->limit($config["per_page"],$page)->get("firmalar");
      $data["toplam_kayit"]=$this->db->where($where)->get("firmalar")->num_rows();
    } else {
      $where = array("uyeId" => $this->user->Id);
      $filter2="Tüm";
      $urlstring="hesabim/anasayfa";
      $uri_segment=3;
      $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
      $query=$this->db->where($where)->order_by("kayit_tarihi","DESC")->limit($config["per_page"],$page)->get("firmalar");
      $data["toplam_kayit"]=$this->db->where($where)->get("firmalar")->num_rows();
    }
    $data["ilanlar"]=$query->result();
    $data["user"]=$this->user;
    $data["filter"]=$filter;
    $data["filter2"]=$filter2;
    $config["uri_segment"] = $uri_segment;
    $config["base_url"] = base_url($urlstring);
    $config["total_rows"] = $data["toplam_kayit"];
    $config["num_links"] = 20;
    $this->pagination->initialize($config);
    $data["links"] = $this->pagination->create_links();
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("hesabim/anasayfa",$data);

  }
  public function bilgilerim()
  {
    $data["iller"] = $this->db->query("select * from tbl_il order by il_ad")->result();
    $data["user"]=$this->user;
    if (isset($_POST) && !empty($_POST)) {
      $formvalid = array(
          array('field' => 'ad',                      'label' => 'Ad',                    'rules' => 'required'),
          array('field' => 'soyad',                   'label' => 'Soyad',                 'rules' => 'required'),
          array('field' => 'sehir',                   'label' => 'Şehir',                 'rules' => 'required'),
          array('field' => 'cinsiyet',                'label' => 'Cinsiyet',              'rules' => 'required'),
          array('field' => 'gsm',                     'label' => 'Cep Telefonu',          'rules' => 'required')
      );
      $this->form_validation->set_rules($formvalid);
      $this->form_validation->set_error_delimiters('<p>', '</p>');
      $this->form_validation->set_message('required', '<strong>%s</strong> Gerekli Bir Alandır.');
      if ($this->form_validation->run() == TRUE) {
        $ad=$this->security->xss_clean($this->input->post("ad"));
        $soyad=$this->security->xss_clean($this->input->post("soyad"));
        $sehir=$this->security->xss_clean($this->input->post("sehir"));
        $cinsiyet=$this->security->xss_clean($this->input->post("cinsiyet"));
        $dogum=$this->security->xss_clean($this->input->post("dogum"));
        $gsm=$this->security->xss_clean($this->input->post("gsm"));
        $gsm=str_replace("(","",$gsm);
        $gsm=str_replace(")","",$gsm);
        $gsm=str_replace("-","",$gsm);
        $gsm=str_replace(" ","",$gsm);
        // echo $gsm;
        // die();
        $istel=$this->security->xss_clean($this->input->post("istel"));
        $istel=str_replace("(","",$istel);
        $istel=str_replace(")","",$istel);
        $istel=str_replace("-","",$istel);
        $istel=str_replace(" ","",$istel);
        $degistir = array(
          "ad" => $ad,
          "soyad" => $soyad,
          "sehir" => $sehir,
          "cinsiyet" => $cinsiyet,
          "gsm" => $gsm,
          "istel" => $istel,
          "dogum" => $dogum
        );
        $where = array("Id" => $this->user->Id);
        $update=$this->members->update($where,$degistir);
        if ($update) {
          $this->session->set_flashdata("success","Bilgileriniz Güncellendi");
          redirect(base_url("hesabim/bilgilerim"));
        } else {
          $this->session->set_flashdata("error","Bilgileriniz güncellenirken bir hata oluştu. Lütfen tekrar deneyiniz.");
        }
      }
    }
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("hesabim/bilgilerim",$data);
  }
  public function sifredegistir()
  {
    $data["user"]=$this->user;
    if(isset($_POST) && !empty($_POST)){
      $formvalid = array(
        array('field' => 'new_password',		'label' => 'Parola',				'rules' => 'callback_valid_password'),
        array('field' => 're_password',			'label' => 'Parola Tekrar',			'rules' => 'required|matches[new_password]')
      );

      $this->form_validation->set_rules($formvalid);
      $this->form_validation->set_error_delimiters('<p>', '</p>');
      $this->form_validation->set_message('required', '<strong>%s</strong> Gerekli Bir Alandır.');
      $this->form_validation->set_message('matches','Girmiş olduğunuz şifreler aynı değil!!');

      if($this->form_validation->run() == TRUE){
        $new_password = $this->security->xss_clean($this->input->post('new_password'));
        $password=md5($new_password);

        $update = $this->members->editpass($password,$this->user->Id);
        if($update){
          $this->session->set_flashdata('success', 'Parolanız Başarıyla Güncellendi.');
          redirect(base_url().'hesabim/anasayfa');
        }else{
          $this->session->set_flashdata('error', 'Parolanız Güncellenemedi, Lütfen Tekrar Deneyiniz.');
        }
      }
    }
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("hesabim/sifredegistir",$data);
  }
  public function odemeler($filter="")
  {
    $data["user"]=$this->user;
    $data["filter"]=$filter;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("hesabim/odemeler",$data);
  }

  public function favorilerim()
  {
    $data["user"]=$this->user;
    $favoriler=$this->db->where("uyeId",$this->user->Id)->get("favoriler");
    $ilans = array();
    if ($favoriler->num_rows() > 0) {

      $favs=$favoriler->result();
      foreach ($favs as $fav) {
        $ilans[]=$fav->ilanId;
      }
      $this->db->where_in('Id', $ilans);
      $genel_sorgu = $this->db->get("firmalar");
      $toplam_kayit=$genel_sorgu->num_rows();
      //$sql = $this->db->query("SELECT * FROM firmalar WHERE Id IN ($ilans) LIMIT $sayfa, 20");
      $data["ilanlar"]=$genel_sorgu->result();
      $data["toplam_kayit"]=$toplam_kayit;
      //$ilans = implode(',',$ilans);
    }else {
      $data["toplam_kayit"]=0;
    }
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("hesabim/favorilerim",$data);
  }
  public function favoriekle($ilanId="")
  {
    $json = array();
    $id=$this->security->xss_clean($this->input->post("id"));
    $sql = $this->db->query("SELECT * FROM favoriler WHERE uyeId='".$this->user->Id."' and ilanId='".$id."'");
    $say=$sql->num_rows();
    if ($say > 0){
      $json['error'] = 'İlan Zaten Favori Listenizde';
    }else {
      $veri = array("uyeId" => $this->user->Id,"ilanId" => $id);
      $insert=$this->db->insert("favoriler",$veri);
      if ($insert) {
        $json['success'] = 'İlan Favorilerinize Eklendi';
      }else {
        $json['error'] = 'Hatalı İşlem! Lütfen Tekrar Deneyiniz..';
      }

    }
    echo json_encode($json);
  }

  public function favorisil($ilanId="")
  {
    $json = array();
    $id=$this->security->xss_clean($this->input->post("id"));
    $sql = $this->db->query("SELECT * FROM favoriler WHERE uyeId='".$this->user->Id."' and ilanId='".$id."'");
    $say=$sql->num_rows();
    if ($say > 0){
      $delete=$this->db->query("DELETE from favoriler where uyeId='".$this->user->Id."' and ilanId='".$id."'");
      if ($delete) {
        $json['success'] = 'İlan Favorilerinizden Silindi';
      }else {
        $json['error'] = 'Hatalı İşlem! Lütfen Tekrar Deneyiniz..';
      }
    }else {
      $json['error'] = 'İlan Favorilerinizde Bulunamadı';
    }
    echo json_encode($json);
  }

  public function ilanduzenle($ilanId)
  {
    $ilan_kontrol=$this->firmalar->ilan_kontrol($ilanId,$this->session->userdata("userData")["userID"]);
    if (!$ilan_kontrol) {
      redirect(base_url());
    }
    $where = array('Id' => $this->session->userdata("userData")["userID"]);
    $user=$this->members->get($where);
    $data["user"]=$user;
    $ilan=$this->firmalar->get_ilan($ilanId);
    $data["ilan"]=$ilan;
    $kategori=max(
      $ilan->kategoriId,
      $ilan->kategori2,
      $ilan->kategori3,
      $ilan->kategori4,
      $ilan->kategori5,
      $ilan->kategori6,
      $ilan->kategori7,
      $ilan->kategori8
    );
    $kategorinames=getustkategorinames($kategori);
    $data["kategorinames"]=$kategorinames;
    $seo_url="";
    $kategorys=getustkategorys($kategori);
    for ($i=0; $i < 9 ; $i++) {
      if ($i == 0) {
        $field_kategori=$kategorys[0]->Id;
        $seo_url.=$kategorys[0]->seo;
        $i++;


      } elseif(isset($kategorys[$i-1])){
        $yeni="field_kategori".$i;
        $$yeni=$kategorys[$i-1]->Id;
        $seo_url.="/".$kategorys[$i-1]->seo;
      }else {
        $yeni="field_kategori".$i;
        $$yeni="";
      }
    }
    $seo_url.="/".$kategori;
    $sql="select * from fields where ((kategori='".$field_kategori."' and kategori2='0') ";
    if ($field_kategori2!="" || $field_kategori2!=0) {
      $sql.="or (kategori2='".$field_kategori2."' and kategori3='0') ";
    }
    if ($field_kategori3!="" || $field_kategori3!=0) {
      $sql.="or (kategori3='".$field_kategori3."' and kategori4='0') ";
    }
    if ($field_kategori4!="" || $field_kategori4!=0) {
      $sql.="or (kategori4='".$field_kategori4."' and kategori5='0') ";
    }
    if ($field_kategori5!="" || $field_kategori5!=0) {
      $sql.="or (kategori5='".$field_kategori5."' and kategori6='0') ";
    }
    $sql.=") order by siralama";
    $fields=$this->fields->getfields($sql);
    $data["fields"]=$fields;
    $data["iller"]=$this->firmalar->iller();
    $data["ilceler"]=$this->firmalar->ilcelerbyIl($ilan->il);
    $data["mahalleler"]=$this->firmalar->mahallelerbyIlce($ilan->ilce);
    if (isset($_POST) && !empty($_POST)) {
      $userID=$this->session->userdata("userData")["userID"];
      $formvalid = array(
          array('field' => 'ad_rules',                'label' => 'Sözleşme Kabul',        'rules' => 'required'),
          array('field' => 'ilanadi',                 'label' => 'İlan Başlığı',          'rules' => 'required'),
          array('field' => 'aciklama',                'label' => 'İlan Açıklaması',       'rules' => 'required'),
          array('field' => 'fiyat1',                  'label' => 'Fiyat',                 'rules' => 'required'),
          array('field' => 'bitis_suresi',            'label' => 'İlan Süresi',           'rules' => 'required'),
          array('field' => 'il',                      'label' => 'İl',                    'rules' => 'required'),
          array('field' => 'ilce',                    'label' => 'İlce',                  'rules' => 'required'),
          array('field' => 'mahalle',                 'label' => 'Mahalle',               'rules' => 'required'),
      );
      foreach ($fields as $field) {
        if ($field->required==1) {
          $formvalid[]=  array('field' => $field->seo_name, 'label' => $field->name,'rules' => 'required');
        }
      }
      $this->form_validation->set_rules($formvalid);
      $this->form_validation->set_error_delimiters('<p>', '</p>');
      $this->form_validation->set_message('required', '<strong>%s</strong> Gerekli Bir Alandır.');
      if ($this->form_validation->run() == TRUE) {
        $ad_rules = $this->security->xss_clean($this->input->post('ad_rules'));
        if ($ad_rules='') {
          $this->session->set_flashdata('error', 'İlan Verme Kurallarını Kabul Etmelisiniz.');
          redirect(base_url("hesabim/ilanduzenle/".$ilanId));
        }
        $firmalar = array();
        $ilanadi       = $this->security->xss_clean($this->input->post('ilanadi'));
        $firmalar["firma_adi"]=$ilanadi;
        $map           = $this->security->xss_clean($this->input->post('map_Val'));
        $firmalar["map"]=$map;
        $aciklama      = $this->security->xss_clean($this->input->post('aciklama'));
        $firmalar["aciklama"] = base64_encode($aciklama);
        $firmalar["il"] = $this->security->xss_clean($this->input->post('il'));
        $seo_url.="/".replace("tbl_il","seo_il","il_id",$firmalar["il"]);
        $firmalar["ilce"] = $this->security->xss_clean($this->input->post('ilce'));
        $seo_url.="/".replace("tbl_ilce","seo_ilce","ilce_id",$firmalar["ilce"]);
        $firmalar["mahalle"] = $this->security->xss_clean($this->input->post('mahalle'));
        $seo_url.="/".replace("tbl_mahalle","seo_mahalle","mahalle_id",$firmalar["mahalle"]);
        //$seo_url.="-".$ilanId;
        $firmalar["seo_url"]=$seo_url;
        $firmalar["kayit_tarihi"]=date("Y-m-d H:i:s");
        $bitis_suresi  = $this->security->xss_clean($this->input->post('bitis_suresi'));
        switch ($bitis_suresi) {
          case '1 Ay':
            $bitis_tarihi=date("Y-m-d",strtotime("+1 month"));
          break;
          case '2 Ay':
            $bitis_tarihi=date("Y-m-d",strtotime("+2 month"));
          break;
          case '3 Ay':
            $bitis_tarihi=date("Y-m-d",strtotime("+3 month"));
          break;
          case '4 Ay':
            $bitis_tarihi=date("Y-m-d",strtotime("+4 month"));
          break;
          case '5 Ay':
            $bitis_tarihi=date("Y-m-d",strtotime("+5 month"));
          break;
          case '6 Ay':
            $bitis_tarihi=date("Y-m-d",strtotime("+6 month"));
          break;
          case '7 Ay':
            $bitis_tarihi=date("Y-m-d",strtotime("+7 month"));
          break;
          case '8 Ay':
            $bitis_tarihi=date("Y-m-d",strtotime("+8 month"));
          break;
          case '9 Ay':
            $bitis_tarihi=date("Y-m-d",strtotime("+9 month"));
          break;
          case '10 Ay':
            $bitis_tarihi=date("Y-m-d",strtotime("+10 month"));
          break;
          case '11 Ay':
            $bitis_tarihi=date("Y-m-d",strtotime("+11 month"));
          break;
          case '1 Yıl':
            $bitis_tarihi=date("Y-m-d",strtotime("+1 year"));
          break;
          default:
            $bitis_tarihi=date("Y-m-d",strtotime("+1 month"));
          break;
        }
        $firmalar["bitis_tarihi"]=$bitis_tarihi;
        $ilan_magazada_mi  = $this->magazalar->ilan_magazada_mi($ilanId);

        if ($ilan_magazada_mi) {
          $onay_durum=1;
          $kucuk_fotograf=1;
        } else {
          $onay_durum=0;
          $kucuk_fotograf=0;
        }
        $firmalar["onay"]=$onay_durum;
        $firmalar["yayinla"]=$this->security->xss_clean($this->input->post('yayinla'));
        $firmalar["yenilensin"]=$this->security->xss_clean($this->input->post('yenilensin'));
        $fiyat=$this->security->xss_clean($this->input->post('fiyat1'));
        $firmalar["fiyat"] =  str_replace(".","",$fiyat);
        $firmalar["fiyat2"] = $this->security->xss_clean($this->input->post('fiyat2'));
        $firmalar["birim"] = $this->security->xss_clean($this->input->post('birim'));
        $firmalar["kucuk_fotograf"] = $kucuk_fotograf;
        $firmalar["ilan_notu"] = $this->security->xss_clean($this->input->post('ilan_notu'));
        $firmalar["panaroma"] = $this->security->xss_clean($this->input->post('panaroma'));
        $insert=$this->firmalar->update($ilanId,$firmalar);
        $field_values = array();
        foreach ($fields as $field) {
          if($field->type=='checkbox'){
            // hidden fields
            $field_values[$field->seo_name]=implode($this->security->xss_clean($this->input->post($field->seo_name)),", ");

          }elseif($field->type=='multiple_select'){
            // hidden fields
            $field_values[$field->seo_name]=$this->security->xss_clean($this->input->post($field->seo_name));
            $field_values[$field->multiple_field_seo_name]=$this->security->xss_clean($this->input->post($field->multiple_field_seo_name));
          }else{
            // hidden fields
            $field_values[$field->seo_name]=$this->security->xss_clean($this->input->post($field->seo_name));
          }
        }
        foreach ($field_values as $field_name => $field_value) {
          $where = array("ilanId" => $ilanId, "field_name" => $field_name);
          $update = array("field_value" => $field_value);
          $this->fields->update($where,$update);
        //  $this->db->query("insert into custom_fields (Id,ilanId,field_name,field_value) VALUES(null,'".$ilanId."','".$field_name."','".$field_value."')");
        }
        $this->session->set_flashdata('success', 'Değişiklikler Kaydedildi.');
        redirect(base_url("resim/duzenle/".$ilanId));

      } else {
        //validation kontrolü error verirse
      }
    }
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("hesabim/ilanduzenle",$data);
  }
  public function ilansil($ilanId,$filter="")
  {
    $uye = $this->user->Id;
    $ilan=$this->db->where("Id",$ilanId)->get("firmalar")->num_rows();
    if ($ilan > 0) {
      $query=$this->db->where("ilanId",$ilanId)->get("pictures");
      if ($query->num_rows() > 0) {
        $resimler=$query->result();
        foreach ($resimler as $resim) {
          if (file_exists("photos/big/".$resim->name)) {
            unlink("photos/big/".$resim->name);
          }
          if (file_exists("photos/crop/".$resim->name)) {
            unlink("photos/crop/".$resim->name);
          }
          if (file_exists("photos/thumbnail/".$resim->name)) {
            unlink("photos/thumbnail/".$resim->name);
          }
        }
      }

    }
    $sql = $this->db->query("delete from firmalar where Id=".$ilanId);
    $sql2 = $this->db->query("delete from custom_fields where ilanId='".$ilanId."'");
    $sql3 = $this->db->query("delete from acilacilvitrin where ilanId='".$ilanId."'");
    $sql4 = $this->db->query("delete from fiyatvitrin where ilanId='".$ilanId."'");
    $sql5 = $this->db->query("delete from gvitrin where firmaId='".$ilanId."'");
    $sql6 = $this->db->query("delete from kvitrin where firmaId='".$ilanId."'");
    $sql7 = $this->db->query("delete from magaza_ilanlari where ilanId='".$ilanId."'");
    $sql8 = $this->db->query("delete from siparis where firmaId='".$ilanId."'");
    $sql9 = $this->db->query("delete from favoriler where ilanId='".$ilanId."'");
    $sql9 = $this->db->query("delete from magaza_ilanlari where ilanId='".$ilanId."'");
    if($sql){
      $this->session->set_flashdata("success","İlan Başarıyla Silindi...");
      if ($filter == "") {
        redirect(base_url("hesabim/anasayfa"));
      }else {
        redirect(base_url("hesabim/anasayfa/".$filter));
      }
    }else{
      $this->session->set_flashdata("error","İlan Silinemedi...");
      if ($filter == "") {
        redirect(base_url("hesabim/anasayfa"));
      }else {
        redirect(base_url("hesabim/anasayfa/".$filter));
      }
    }

  }
  public function ilandurdur($ilanId,$filter="")
  {
    $ilan=$this->db->where(array("Id" => $ilanId, "onay" => "1"))->get("firmalar")->num_rows();
    if ($ilan > 0) {
      $durdur=$this->firmalar->update($ilanId,array("onay" => "2"));
      if($durdur){
        $this->session->set_flashdata("success","İlan Durduruldu.");
        if ($filter == "") {
          redirect(base_url("hesabim/anasayfa"));
        }else {
          redirect(base_url("hesabim/anasayfa/".$filter));
        }
      }else{
        $this->session->set_flashdata("error","İlan Geçersiz.");
        if ($filter == "") {
          redirect(base_url("hesabim/anasayfa"));
        }else {
          redirect(base_url("hesabim/anasayfa/".$filter));
        }
      }

    }
  }
  public function ilanaktiflestir($ilanId,$filter="")
  {
    $ilan=$this->db->where(array("Id" => $ilanId, "onay" => "2"))->get("firmalar")->num_rows();
    if ($ilan > 0) {
      $kayittarihi= date("Y-m-d H:i:s");
      $yenitarih = strtotime('60 day',strtotime($kayittarihi));
      $bitistarihi = date('Y-m-d' ,$yenitarih );
      $aktiflestir=$this->firmalar->update($ilanId,array("onay" => "1","kayit_tarihi" => $kayittarihi,"bitis_tarihi" => $bitistarihi, "suresi_doldu" => "0"));
      if($aktiflestir){
        $this->session->set_flashdata("success","İlan Aktifleştirildi.");
        if ($filter == "") {
          redirect(base_url("hesabim/anasayfa"));
        }else {
          redirect(base_url("hesabim/anasayfa/".$filter));
        }
      }else{
        $this->session->set_flashdata("error","İlan Geçersiz.");
        if ($filter == "") {
          redirect(base_url("hesabim/anasayfa"));
        }else {
          redirect(base_url("hesabim/anasayfa/".$filter));
        }
      }

    }
  }
  public function ilansureuzat($ilanId,$filter="")
  {
    $ilan=$this->db->where(array("Id" => $ilanId, "onay" => "0","suresi_doldu" => "1"))->get("firmalar")->num_rows();
    if ($ilan > 0) {
      $kayittarihi= date("Y-m-d H:i:s");
      $yenitarih = strtotime('2 month',strtotime($kayittarihi));
      $bitistarihi = date('Y-m-d' ,$yenitarih );
      $sureuzat=$this->firmalar->update($ilanId,array("onay" => "1", "kayit_tarihi" => $kayittarihi, "bitis_tarihi" => $bitistarihi, "suresi_doldu" => "0"));
      if($sureuzat){
        $this->session->set_flashdata("success","İlanın Süresi Uzatıldı.");
        if ($filter == "") {
          redirect(base_url("hesabim/anasayfa"));
        }else {
          redirect(base_url("hesabim/anasayfa/".$filter));
        }
      }else{
        $this->session->set_flashdata("error","İlan Geçersiz.");
        if ($filter == "") {
          redirect(base_url("hesabim/anasayfa"));
        }else {
          redirect(base_url("hesabim/anasayfa/".$filter));
        }
      }

    }
  }
  public function samekategoriilan($ilanId,$filter="")
  {
    $isilan=$this->db->where(array("Id" => $ilanId))->get("firmalar")->num_rows();
    if ($isilan > 0) {
      $ilan=$this->firmalar->get_ilan($ilanId);
      $kategori=max(
        $ilan->kategoriId,
        $ilan->kategori2,
        $ilan->kategori3,
        $ilan->kategori4,
        $ilan->kategori5,
        $ilan->kategori6,
        $ilan->kategori7,
        $ilan->kategori8
      );
      $kategorys=getustkategorys($kategori);
      $max_ilan_kontrol=max_ilan_kontrol($this->user->Id,$kategorys[0]->Id);
      if($max_ilan_kontrol){
        $this->session->set_flashdata("error","<p>Seçilen Kategoride;</p><h5>İlan Limiti Aşıldı.</h5><p>Ücretli İlan İle Devam Edebilirsiniz.</p>");
        if ($filter == "") {
          redirect(base_url("hesabim/anasayfa"));
        }else {
          redirect(base_url("hesabim/anasayfa/".$filter));
        }
      }else {
        $this->session->set_userdata("kategori",$kategori);
        redirect(base_url("ilanekle/detay"));
      }
    }
  }
  public function guncelle($ilanId,$filter="")
  {
    $ilan=$this->db->where(array("Id" => $ilanId, "onay" => "1","guncelim" => "1"))->get("firmalar")->num_rows();
    if ($ilan > 0) {
      $kayittarihi= date("Y-m-d H:i:s");
      $yenitarih = strtotime('2 month',strtotime($kayittarihi));
      $bitistarihi = date('Y-m-d' ,$yenitarih );
      $sureuzat=$this->firmalar->update($ilanId,array("kayit_tarihi" => $kayittarihi, "bitis_tarihi" => $bitistarihi, "guncelim" => "0","onay" =>"1","suresi_doldu" => "0"));
      if($sureuzat){
        $this->session->set_flashdata("success","İlan Tarihi Güncellendi.");
        if ($filter == "") {
          redirect(base_url("hesabim/anasayfa"));
        }else {
          redirect(base_url("hesabim/anasayfa/".$filter));
        }
      }else{
        $this->session->set_flashdata("error","İlan Geçersiz.");
        if ($filter == "") {
          redirect(base_url("hesabim/anasayfa"));
        }else {
          redirect(base_url("hesabim/anasayfa/".$filter));
        }
      }

    }
  }
  public function ilanduzenle_ok($ilanId)
  {
    $ilan_kontrol=$this->firmalar->ilan_kontrol($ilanId,$this->session->userdata("userData")["userID"]);
    if (!$ilan_kontrol) {
      redirect(base_url());
    }
    $data["ilanId"]=$ilanId;
    $ilan=$this->firmalar->get_ilan($ilanId);
    $data["ilan"]=$ilan;
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("hesabim/ilanduzenle_ok",$data);
  }
  public function get_details($ilanId,$detail)
  {

    $b=$this->db->query("select * from custom_fields where ilanId='".$ilanId."' and field_name='".$detail."'")->row();
    return $b->field_value;
  }
  function sorgula2($ilanId,$nerede,$ara)
  {
      $section=$this->db->query("select * from custom_fields where ilanId='".$ilanId."' and field_name='".$nerede."' and field_value LIKE '%".$ara."%'")->num_rows();
      if($section>0){
        return true;
      }else{
        return false;
      }

  }
  public function sahistan()
  {
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("hesabim/sahistan",$data);
  }
  public function sahistanilan()
  {
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $ilan=new stdClass();
    if(isset($_POST) && !empty($_POST)){
      $formvalid = array(
        array('field' => 'url',		'label' => 'URL',				'rules' => 'required')
      );

      $this->form_validation->set_rules($formvalid);
      $this->form_validation->set_error_delimiters('<p>', '</p>');
      $this->form_validation->set_message('required', '<strong>%s</strong> Gerekli Bir Alandır.');

      if($this->form_validation->run() == TRUE){
        $url = $this->security->xss_clean($this->input->post('url'));
        $content = curl_connect($url); // fonksiyon ile bağlandık
        $classifiedBreadCrumbs = curl_search('<div class="classifiedBreadCrumb">', '</div>', $content); // Gelen içerik içinde arama yaparak başlıkları ayıklıyoruz. Sonuç diziye aktarılacak.
        foreach ($classifiedBreadCrumbs as $classifiedBreadCrumb) {
                $breadcrumbItems=curl_search('<li class="breadcrumbItem">', '</li>', $classifiedBreadCrumb);
                foreach ($breadcrumbItems as $breadcrumbItem) {
                    $as=curl_search('">','</a>', $breadcrumbItem);
                    foreach ($as as $a) {
                        $dizi[]=$a;
                    }
                }
        }
        if (seo_link($dizi[0])!="anasayfa") {
          $anaKategoriler=$this->db->where("ust_kategori","0")->get("kategoriler")->result();
          foreach ($anaKategoriler as $anaKategori) {
            if (seo_link($dizi[0])===$anaKategori->seo) {
              //echo $anaKategori->Id.'<br/>';
              $kategori=$anaKategori->Id;
              $firstSubs=$this->db->where("ust_kategori",$anaKategori->Id)->get("kategoriler")->result();
              foreach ($firstSubs as $firstSub) {
                if (seo_link($dizi[1])==$firstSub->seo) {
                  //echo $firstSub->Id.'<br/>';
                  $kategori=$firstSub->Id;
                  $secondSubs=$this->db->where("ust_kategori",$firstSub->Id)->get("kategoriler")->result();
                  foreach ($secondSubs as $secondSub) {
                    if (seo_link($dizi[2])==$secondSub->seo) {
                      //echo $secondSub->Id.'<br/>';
                      $kategori=$secondSub->Id;
                      $thirdSubs=$this->db->where("ust_kategori",$secondSub->Id)->get("kategoriler")->result();
                      foreach ($thirdSubs as $thirdSub) {
                        if (seo_link($dizi[3])==$thirdSub->seo) {
                          //echo $thirdSub->Id.'<br/>';
                          $kategori=$thirdSub->Id;
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        } else {
          $anaKategoriler=$this->db->where("ust_kategori","0")->get("kategoriler")->result();
          foreach ($anaKategoriler as $anaKategori) {
            if (seo_link($dizi[1])===$anaKategori->seo) {
              //echo $anaKategori->Id.'<br/>';
              $kategori=$anaKategori->Id;
              $firstSubs=$this->db->where("ust_kategori",$anaKategori->Id)->get("kategoriler")->result();
              foreach ($firstSubs as $firstSub) {
                if (seo_link($dizi[2])==$firstSub->seo) {
                  //echo $firstSub->Id.'<br/>';
                  $kategori=$firstSub->Id;
                  $secondSubs=$this->db->where("ust_kategori",$firstSub->Id)->get("kategoriler")->result();
                  foreach ($secondSubs as $secondSub) {
                    if (seo_link($dizi[3])==$secondSub->seo) {
                      //echo $secondSub->Id.'<br/>';
                      $kategori=$secondSub->Id;
                    }
                  }
                }
              }
            }
          }
        }


        $this->session->set_userdata("kategori",$kategori);
        $kategorinames=getustkategorinames($kategori);
        $data["kategorinames"]=$kategorinames;

        $kategorys=getustkategorys($kategori);
        for ($i=0; $i < 9 ; $i++) {
          if ($i == 0) {
            $field_kategori=$kategorys[0]->Id;
            $i++;
          } elseif(isset($kategorys[$i-1])){
            $yeni="field_kategori".$i;
            $$yeni=$kategorys[$i-1]->Id;
          }else {
            $yeni="field_kategori".$i;
            $$yeni="";
          }
        }
        $ilan->kategoriId=$field_kategori;
        $sql="select * from fields where ((kategori='".$field_kategori."' and kategori2='0') ";
        if ($field_kategori2!="" || $field_kategori2!=0) {
          $sql.="or (kategori2='".$field_kategori2."' and kategori3='0') ";
          $ilan->kategori2=$field_kategori2;
        }
        if ($field_kategori3!="" || $field_kategori3!=0) {
          $sql.="or (kategori3='".$field_kategori3."' and kategori4='0') ";
          $ilan->kategori3=$field_kategori3;
        }
        if ($field_kategori4!="" || $field_kategori4!=0) {
          $sql.="or (kategori4='".$field_kategori4."' and kategori5='0') ";
          $ilan->kategori4=$field_kategori4;
        }
        if ($field_kategori5!="" || $field_kategori5!=0) {
          $sql.="or (kategori5='".$field_kategori5."' and kategori6='0') ";
          $ilan->kategori5=$field_kategori5;
        }
        if ($field_kategori6!="" || $field_kategori6!=0) {
          $sql.="or (kategori6='".$field_kategori6."' and kategori7='0') ";
          $ilan->kategori6=$field_kategori6;
        }
        if ($field_kategori7!="" || $field_kategori7!=0) {
          $sql.="or (kategori7='".$field_kategori7."' and kategori8='0') ";
          $ilan->kategori7=$field_kategori7;
        }
        if ($field_kategori8!="" || $field_kategori8!=0) {
          $sql.="or (kategori8='".$field_kategori8."') ";
          $ilan->kategori8=$field_kategori8;
        }
        $sql.=") order by siralama";
        $fields=$this->fields->getfields($sql);
        $data["fields"]=$fields;
        $classifiedDetailTitles = curl_search('<h1>', '</h1>', $content);
        //echo $classifiedDetailTitles[0].'<br/>';
        $ilan->firma_adi=$classifiedDetailTitles[0];
        $classifiedInfos = curl_search('<h3>', '<a class="', $content);
        $ilan->fiyat=intval(str_replace(array(".","\," ),array("",""),explode(" ",trim($classifiedInfos[0]))[0]));
        $ilan->fiyat2="0";
        $ilan->birim=explode(" ",$classifiedInfos[0])[1];
        $h2s = curl_search('<h2>', '</h2>', $content);
        foreach ($h2s as $h2) {
            $adress[]= curl_search('">', '</a>', $h2);
        }
        $mah=explode(" ",$adress[0][2])[count(explode(" ",$adress[0][2]))-1];
        $mahalle=$adress[0][2];
        if($mah="Mh."){
          $mahalle=str_replace("Mh.","Mah.",$adress[0][2]);
        }
        $ilan->il=konum(seo_link($adress[0][0]),seo_link($adress[0][1]),seo_link($mahalle))["il"];
        //echo $adress[0][1].'<br/>';
        $ilan->ilce=konum(seo_link($adress[0][0]),seo_link($adress[0][1]),seo_link($mahalle))["ilce"];
        //echo $adress[0][2].'<br/>';
        $ilan->mahalle=konum(seo_link($adress[0][0]),seo_link($adress[0][1]),seo_link($mahalle))["mahalle"];
        $data["iller"]=$this->firmalar->iller();
        $data["ilceler"]=$this->firmalar->ilcelerbyIl($ilan->il);
        $data["mahalleler"]=$this->firmalar->mahallelerbyIlce($ilan->ilce);
        $classifiedInfoLists = curl_search('<ul class="classifiedInfoList">', '</ul', $content);
        foreach ($classifiedInfoLists as $classifiedInfoList) {
            $lis= curl_search('<li>', '</li>', $classifiedInfoList);
            foreach ($lis as $li) {
                $labels=curl_search('<strong>', '</strong>', $li);
                //print_r($labels);
                //echo $labels[0];
                $label[]=$labels[0];
                $values1=curl_search('<span class="classifiedId" id="classifiedId">', '</span>', $li);
                $values2=curl_search('<span>', '</span>', $li);
                $values3=curl_search('<span class="">', '</span>', $li);
                if(!empty($values1)){
                    //print_r($values1);
                    //echo $values1[0];
                    $value[]="".$values1[0];
                }elseif(!empty($values2)){
                    //print_r($values2);
                    //echo $values2[0];
                    $value[]="".$values2[0];
                }elseif(!empty($values3)){
                    //print_r($values3);
                    //echo $values3[0];
                    $value[]="".$values3[0];
                }
            }
        }
        //prinr_r($label);
        //prinr_r($value);
        /*for($i=0;$i<count($value);$i++){
        echo $label[$i].': '.$value[$i].'<br/>';

      }*/
      $ilan_notu ="";
      $usernameinfoarea = curl_search('<div class="username-info-area">', '<div class="getUserInfo noBorder">', $content);
      $prettyphonepart = curl_search('<span class="pretty-phone-part">', '</span>', $content);
      $ilan_notu.=" İlan Sahibi : ".curl_search('<h5>', '</h5>', $usernameinfoarea[0])[0].",";
      $ilan_notu.=" Telefon : ".$prettyphonepart[0].",";
      $ilan_notu.=" ".$label[0]." : ".$value[0].",";
      $deger = array();
      $aciklama1= array();
      $mevcut = array();
        for($i=2;$i<count($value);$i++){
          foreach ($fields as $field) {
            if (cleanword($label[$i])==cleanword($field->name)) {
              $deger[cleanword($label[$i])] =cleanword($value[$i]);
              $mevcut[]=cleanword($label[$i]);
            }
          }
        }
        $aciklama="";
        for($i=2;$i<count($value);$i++){
            if (!in_array(cleanword($label[$i]),$mevcut)) {
              $aciklama.=cleanword($label[$i]).': '.cleanword($value[$i]).'<br/>';
            }
        }

        // $aciklama="";
        // foreach ($aciklama1 as $key => $value) {
        //   $aciklama.=$key.': '.$value.'<br/>';
        // }
        $data["deger"]=$deger;
        $classifiedDescription=curl_search('<div id="classifiedDescription" class="uiBoxContainer">','</div>',$content);
        //echo $classifiedDescription[0].'<br/>';
        $aciklama.=$classifiedDescription[0];
        $ilan->aciklama=$aciklama;
        $images_1=curl_search('<label id="label_images_1" for="images_1" class="">','</label>',$content);
        //echo $images_1[0].'<br/>';
        $image_src=curl_search('src="','"',$images_1[0]);
        //echo $image_src[0].'<br/>';

        $classifiedDetailMainPhoto=curl_search('<div class="classifiedDetailMainPhoto">','<ul class="classifiedDetailMegaVideo">',$content);
        $classifiedDetailMainPhoto_src=curl_search('data-src="','"',$classifiedDetailMainPhoto[0]);
        $resimler = array();
        for($i=0;$i<count($classifiedDetailMainPhoto_src);$i++){
          $resimler[]=$classifiedDetailMainPhoto_src[$i];
          /*$resim=new stdClass();
          //echo explode(".",(explode("/",$classifiedDetailMainPhoto_src[$i])[count(explode("/",$classifiedDetailMainPhoto_src[$i]))-1]))[1]."<br/>";
          $uzunluk=mb_strlen($classifiedDetailMainPhoto_src[$i],'UTF-8');
          $uzanti=explode(".",(explode("/",$classifiedDetailMainPhoto_src[$i])[count(explode("/",$classifiedDetailMainPhoto_src[$i]))-1]))[1]."<br/>";
          $resim->name=mb_substr($classifiedDetailMainPhoto_src[$i],0,$uzunluk-mb_strlen($uzanti));
          $resim->uzanti=$uzanti;
          $resimler[]=$resim;
          $resim=null;*/
            //echo $classifiedDetailMainPhoto_src[$i].'<br/>';
            //copy($classifiedDetailMainPhoto_src[$i],'sahipresim/resim'.$i.'.jpg');
        }
        $data["resimler"]=$resimler;
        $ilan->map="";
        $ilan->ilan_notu=$ilan_notu;
        $data["ilan"]=$ilan;
      }
    }
    $this->load->view("hesabim/sahistanform",$data);
  }
  public function sahistanilanok()
  {

    if (isset($_POST) && !empty($_POST)) {
      // $res = post_captcha($_POST['g-recaptcha-response']);
      // if ($res['success']) {
        //recaptcha onaylanmışsa
        $userID=$this->session->userdata("userData")["userID"];
        $formvalid = array(
            array('field' => 'ad_rules',                'label' => 'Sözleşme Kabul',        'rules' => 'required'),
            array('field' => 'ilanadi',                 'label' => 'İlan Başlığı',          'rules' => 'required'),
            array('field' => 'aciklama',                'label' => 'İlan Açıklaması',       'rules' => 'required'),
            array('field' => 'fiyat1',                  'label' => 'Fiyat',                 'rules' => 'required'),
            array('field' => 'bitis_suresi',            'label' => 'İlan Süresi',           'rules' => 'required'),
            array('field' => 'il',                      'label' => 'İl',                    'rules' => 'required'),
            array('field' => 'ilce',                    'label' => 'İlce',                  'rules' => 'required'),
            array('field' => 'mahalle',                 'label' => 'Mahalle',               'rules' => 'required'),
        );
        /*foreach ($fields as $field) {
          if ($field->required==1) {
            $formvalid[]=  array('field' => $field->seo_name, 'label' => $field->name,'rules' => 'required');
          }
        }*/
        $this->form_validation->set_rules($formvalid);
        $this->form_validation->set_error_delimiters('<p>', '</p>');
        $this->form_validation->set_message('required', '<strong>%s</strong> Gerekli Bir Alandır.');
        if ($this->form_validation->run() == TRUE) {
          $ad_rules = $this->security->xss_clean($this->input->post('ad_rules'));
          if ($ad_rules=="1") {


            $kategori=$this->session->userdata("kategori");
            //$seo_url="";
            $this->session->unset_userdata("kategori");
            $kategorys=getustkategorys($kategori);
            for ($i=0; $i < 9 ; $i++) {
              if ($i == 0) {
                $field_kategori=$kategorys[0]->Id;
                //$seo_url.=$kategorys[0]->kategori_adi;
                $i++;

              } elseif(isset($kategorys[$i-1])){
                $yeni="field_kategori".$i;
                $$yeni=$kategorys[$i-1]->Id;
                //$seo_url.="-".$kategorys[$i-1]->kategori_adi;
              }else {
                $yeni="field_kategori".$i;
                $$yeni="";
              }
            }

            $sql="select * from fields where ((kategori='".$field_kategori."' and kategori2='0') ";
            if ($field_kategori2!="" || $field_kategori2!=0) {
              $sql.="or (kategori2='".$field_kategori2."' and kategori3='0') ";
            }
            if ($field_kategori3!="" || $field_kategori3!=0) {
              $sql.="or (kategori3='".$field_kategori3."' and kategori4='0') ";
            }
            if ($field_kategori4!="" || $field_kategori4!=0) {
              $sql.="or (kategori4='".$field_kategori4."' and kategori5='0') ";
            }
            if ($field_kategori5!="" || $field_kategori5!=0) {
              $sql.="or (kategori5='".$field_kategori5."' and kategori6='0') ";
            }
            if ($field_kategori6!="" || $field_kategori6!=0) {
              $sql.="or (kategori6='".$field_kategori6."' and kategori7='0') ";
            }
            if ($field_kategori7!="" || $field_kategori7!=0) {
              $sql.="or (kategori7='".$field_kategori7."' and kategori8='0') ";
            }
            if ($field_kategori8!="" || $field_kategori8!=0) {
              $sql.="or (kategori8='".$field_kategori8."') ";
            }
            $sql.=") order by siralama";
            $fields=$this->fields->getfields($sql);

            $firmalar = array();
            $firmalar["ilanId"]=ilan_id_al();
            $firmalar["kategoriId"]= $this->security->xss_clean($this->input->post('kategoriId'));
            $firmalar["uyeId"]=$userID;
            $ilanadi       = $this->security->xss_clean($this->input->post('ilanadi'));
            $firmalar["firma_adi"]=$ilanadi;
            $map           = $this->security->xss_clean($this->input->post('map_Val'));
            $firmalar["map"]=$map;
            $aciklama      = $this->security->xss_clean($this->input->post('aciklama'));
            $firmalar["aciklama"] = base64_encode($aciklama);
            $firmalar["il"] = $this->security->xss_clean($this->input->post('il'));
            $firmalar["ilce"] = $this->security->xss_clean($this->input->post('ilce'));
            $firmalar["mahalle"] = $this->security->xss_clean($this->input->post('mahalle'));
            //$seo_url.="-".$ilanId;
            $firmalar["kayit_tarihi"]=date("Y-m-d H:i:s");
            $bitis_suresi  = $this->security->xss_clean($this->input->post('bitis_suresi'));
            switch ($bitis_suresi) {
              case '1 Ay':
                $bitis_tarihi=date("Y-m-d",strtotime("+1 month"));
              break;
              case '2 Ay':
                $bitis_tarihi=date("Y-m-d",strtotime("+2 month"));
              break;
              case '3 Ay':
                $bitis_tarihi=date("Y-m-d",strtotime("+3 month"));
              break;
              case '4 Ay':
                $bitis_tarihi=date("Y-m-d",strtotime("+4 month"));
              break;
              case '5 Ay':
                $bitis_tarihi=date("Y-m-d",strtotime("+5 month"));
              break;
              case '6 Ay':
                $bitis_tarihi=date("Y-m-d",strtotime("+6 month"));
              break;
              case '7 Ay':
                $bitis_tarihi=date("Y-m-d",strtotime("+7 month"));
              break;
              case '8 Ay':
                $bitis_tarihi=date("Y-m-d",strtotime("+8 month"));
              break;
              case '9 Ay':
                $bitis_tarihi=date("Y-m-d",strtotime("+9 month"));
              break;
              case '10 Ay':
                $bitis_tarihi=date("Y-m-d",strtotime("+10 month"));
              break;
              case '11 Ay':
                $bitis_tarihi=date("Y-m-d",strtotime("+11 month"));
              break;
              case '1 Yıl':
                $bitis_tarihi=date("Y-m-d",strtotime("+1 year"));
              break;
              default:
                $bitis_tarihi=date("Y-m-d",strtotime("+1 month"));
              break;
            }
            $firmalar["bitis_tarihi"]=$bitis_tarihi;
            $firmalar["toplam_ziyaretci"]=0;
            $magaza_var_mi=magaza_var_mi($userID);
            $add_to_store  = $this->security->xss_clean($this->input->post('add_to_store'));

            if ($magaza_var_mi) {
              $onay_durum=1;
              $kucuk_fotograf=1;
            } else {
              $onay_durum=0;
              $kucuk_fotograf=0;
            }
            $firmalar["onay"]=$onay_durum;
            $firmalar["yayinla"]=$this->security->xss_clean($this->input->post('yayinla'));
            $firmalar["yenilensin"]=$this->security->xss_clean($this->input->post('yenilensin'));
            $firmalar["kategori2"] = ($this->security->xss_clean($this->input->post('kategori2'))!="") ? $this->security->xss_clean($this->input->post('kategori2')) : 0 ;
            $firmalar["kategori3"] = ($this->security->xss_clean($this->input->post('kategori3'))!="") ? $this->security->xss_clean($this->input->post('kategori3')) : 0 ;
            $firmalar["kategori4"] = ($this->security->xss_clean($this->input->post('kategori4'))!="") ? $this->security->xss_clean($this->input->post('kategori4')) : 0 ;
            $firmalar["kategori5"] = ($this->security->xss_clean($this->input->post('kategori5'))!="") ? $this->security->xss_clean($this->input->post('kategori5')) : 0 ;
            $firmalar["kategori6"] = ($this->security->xss_clean($this->input->post('kategori6'))!="") ? $this->security->xss_clean($this->input->post('kategori6')) : 0 ;
            $firmalar["kategori7"] = ($this->security->xss_clean($this->input->post('kategori7'))!="") ? $this->security->xss_clean($this->input->post('kategori7')) : 0 ;
            $firmalar["kategori8"] = ($this->security->xss_clean($this->input->post('kategori8'))!="") ? $this->security->xss_clean($this->input->post('kategori8')) : 0 ;
            $seo_url=replace("kategoriler","seo","Id",$firmalar["kategoriId"]);
            $seo_url.="/".replace("kategoriler","seo","Id",$firmalar["kategori2"]);
            $seo_url.="/".replace("kategoriler","seo","Id",$firmalar["kategori3"]);
            if ($firmalar["kategori4"]!=0) {
              $seo_url.="/".replace("kategoriler","seo","Id",$firmalar["kategori4"]);
            }
            if ($firmalar["kategori5"]!=0) {
              $seo_url.="/".replace("kategoriler","seo","Id",$firmalar["kategori5"]);
            }
            if ($firmalar["kategori5"]!=0) {
              $seo_url.="/".$firmalar["kategori5"];
            }elseif ($firmalar["kategori4"]!=0) {
              $seo_url.="/".$firmalar["kategori4"];
            }elseif ($firmalar["kategori3"]!=0) {
              $seo_url.="/".$firmalar["kategori3"];
            }elseif ($firmalar["kategori2"]!=0) {
              $seo_url.="/".$firmalar["kategori2"];
            }

            $seo_url.="/".replace("tbl_il","seo_il","il_id",$firmalar["il"]);
            $seo_url.="/".replace("tbl_ilce","seo_ilce","ilce_id",$firmalar["ilce"]);
            $seo_url.="/".replace("tbl_mahalle","seo_mahalle","mahalle_id",$firmalar["mahalle"]);
            $firmalar["seo_url"]=$seo_url;
            $fiyat=$this->security->xss_clean($this->input->post('fiyat1'));
            $firmalar["fiyat"] =  str_replace(".","",$fiyat);
            $firmalar["fiyat2"] = $this->security->xss_clean($this->input->post('fiyat2'));
            $firmalar["birim"] = $this->security->xss_clean($this->input->post('birim'));
            $firmalar["kucuk_fotograf"] = $kucuk_fotograf;
            $firmalar["ilan_turu"] = 0;
            $firmalar["ilan_notu"] = $this->security->xss_clean($this->input->post('ilan_notu'));
            $ilanId=$this->firmalar->add($firmalar);
            if ($magaza_var_mi) {
              $magazaId=$this->db->where("uyeId",$userID)->get("magaza_kullanicilari")->row()->magazaId;
              $magaza_ilanlari = array('Id' => null, 'magazaId' => $magazaId, 'ilanId' => $ilanId, 'uyeId' => $userID);
              $this->db->insert("magaza_ilanlari",$magaza_ilanlari);

            }
            $field_values = array();
            foreach ($fields as $field) {
              if($field->type=='checkbox'){
                // hidden fields
                if ($this->input->post($field->seo_name)!="") {
                  $field_values[$field->seo_name]=implode($this->security->xss_clean($this->input->post($field->seo_name)),", ");
                }
              }elseif($field->type=='multiple_select'){
                // hidden fields
                $field_values[$field->seo_name]=$this->security->xss_clean($this->input->post($field->seo_name));
                $field_values[$field->multiple_field_seo_name]=$this->security->xss_clean($this->input->post($field->multiple_field_seo_name));
              }else{
                // hidden fields
                $field_values[$field->seo_name]=$this->security->xss_clean($this->input->post($field->seo_name));
              }
            }
            foreach ($field_values as $field_name => $field_value) {
              $this->db->query("insert into custom_fields (Id,ilanId,field_name,field_value) VALUES(null,'".$ilanId."','".$field_name."','".$field_value."')");
            }
            $this->load->library('image_lib');
            for ($i=1; $i < 16; $i++) {
              $resim=$this->security->xss_clean($this->input->post('resim_'.$i));
              if (!empty($resim)) {
                $uzunluk=mb_strlen($resim,'UTF-8');
                $uzanti=explode(".",(explode("/",$resim)[count(explode("/",$resim))-1]))[1];
                //$name=mb_substr($resim,0,$uzunluk-mb_strlen($uzanti));
                $name=$ilanId.'_'.$i.'.'.$uzanti;
                // echo $name;
                // die();
                $upload=copy($resim,FCPATH.'photos/big/'.$name);
                if ($upload) {
                  /*$config['image_library'] = 'gd2';
                  $config['source_image'] = FCPATH.'photos/big/'.$name;
                  $config['maintain_ratio'] = false;
                  $config['width'] = 890;
                  $config['height'] = 550;


                  $this->image_lib->initialize($config);

                  if ( ! $this->image_lib->resize())
                  {
                    //echo "hata";
                    $this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'İlk boyutlandırma Yapılamadı'));
                  }
                  $this->image_lib->clear();*/
                  $src_image= FCPATH.'photos/big/'.$name;
                  $dst_image=FCPATH.'photos/big/'.$name;
                  switch ($uzanti) {
                    case 'png':
                      $type="image/png";
                      break;
                    case 'gif':
                      $type="image/gif";
                      break;
                    default:
                      $type="image/jpg";
                      break;
                  }
                  $width=890;
                  $height=550;
                  create_image($src_image, $dst_image,$type,$width,$height);
                  /*$config1['image_library'] = 'gd2';
                  $config1['source_image'] = FCPATH.'assets/images/deneme1.jpg';
                  $config1['new_image'] = FCPATH.'photos/big/'.$name;
                  $config1['wm_type'] = 'overlay';
                  $config1['wm_overlay_path'] = FCPATH.'photos/big/'.$name;
                  $config1['wm_opacity'] = '100';
                  $config1['wm_vrt_alignment'] = 'middle';
                  $config1['wm_hor_alignment'] = 'center';


                  $this->image_lib->initialize($config1);
                  if (!$this->image_lib->watermark()) {
                    $this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'Watermak işlemi Yapılamadı'));
                  }

                  $this->image_lib->clear();*/

                  $config1['image_library'] = 'gd2';
                  $config1['source_image'] = FCPATH.'photos/big/'.$name;
                  $config1['new_image'] = FCPATH."photos/crop/".$name;
                  $config1['maintain_ratio'] = TRUE;
                  $config1['width'] = 445;
                  $config1['height'] = 275;

                  $this->image_lib->initialize($config1);

                  if ( ! $this->image_lib->resize())
                  {
                    //echo "hata";
                    $this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'İkinci boyutlandırma Yapılamadı'));
                  }
                  $this->image_lib->clear();

                  $config2['image_library'] = 'gd2';
                  $config2['source_image'] = FCPATH.'photos/big/'.$name;
                  $config2['new_image'] = FCPATH."photos/thumbnail/".$name;
                  $config2['maintain_ratio'] = TRUE;
                  $config2['width'] = 178;
                  $config2['height'] = 110;

                  $this->image_lib->initialize($config2);

                  if ( ! $this->image_lib->resize())
                  {
                    //echo "hata";
                    $this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'Üçüncü boyutlandırma Yapılamadı'));
                  }
                  $this->image_lib->clear();
                  $data = array(
                      "ilanId" => $ilanId,
                      "name" => $name
                  );

                  $insert = $this->db->insert("pictures", $data);
                  // if ($insert) {
                  //   echo "dosya Kaydedildi";
                  // }
                }
              }
            }

          }else{
            echo "İlan Verme Kurallarını Kabul Etmelisiniz";
            die();
          }
        }
    }
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $data["ilanId"]=$ilanId;
    $data["ilan"]=$this->db->where("Id",$ilanId)->get("firmalar")->row();
    $this->load->view("resim/duzenle",$data);
  }
  public function valid_password($password = '')
      {

        $password = trim($password);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
        if (empty($password))
        {
          $this->form_validation->set_message('valid_password', '<strong>%s</strong> Gerekli Bir Alandır.');
          return FALSE;
        }
        // if (preg_match_all($regex_lowercase, $password) < 1)
        // {
        //   $this->form_validation->set_message('valid_password', '<strong>%s</strong> En Az 1 Küçük Harf İçermelidir.');
        //   return FALSE;
        // }
        // if (preg_match_all($regex_uppercase, $password) < 1)
        // {
        //   $this->form_validation->set_message('valid_password', '<strong>%s</strong> En Az 1 Büyük Harf İçermelidir.');
        //   return FALSE;
        // }
        // if (preg_match_all($regex_number, $password) < 1)
        // {
        //   $this->form_validation->set_message('valid_password', '<strong>%s</strong> En Az 1 Rakam İçermelidir.');
        //   return FALSE;
        // }
        /*if (preg_match_all($regex_special, $password) < 1)
        {
          $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
          return FALSE;
        }*/
        if (strlen($password) < 4)
        {
          $this->form_validation->set_message('valid_password', '<strong>%s</strong> Minimum 4 Karakter Uzunluğunda Olmalıdır');
          return FALSE;
        }
        if (strlen($password) > 10)
        {
          $this->form_validation->set_message('valid_password', '<strong>%s</strong> 10 Karakterden Uzun Olmamalıdır');
          return FALSE;
        }
        return TRUE;
      }
}
