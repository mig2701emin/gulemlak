<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hesabim extends CI_Controller{
  private $user;

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
      $query=$this->db->where($where)->limit($config["per_page"],$page)->get("firmalar");
      $data["toplam_kayit"]=$this->db->where($where)->get("firmalar")->num_rows();
    }elseif ($filter == "pasif") {
      $where = array("uyeId" => $this->user->Id,"onay"=>"0");
      $filter2="Pasif";
      $urlstring="hesabim/anasayfa/pasif";
      $uri_segment=4;
      $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
      $query=$this->db->where($where)->limit($config["per_page"],$page)->get("firmalar");
      $data["toplam_kayit"]=$this->db->where($where)->get("firmalar")->num_rows();
    } else {
      $where = array("uyeId" => $this->user->Id);
      $filter2="Tüm";
      $urlstring="hesabim/anasayfa";
      $uri_segment=3;
      $page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
      $query=$this->db->where($where)->limit($config["per_page"],$page)->get("firmalar");
      $data["toplam_kayit"]=$this->db->where($where)->get("firmalar")->num_rows();
    }
    $data["ilanlar"]=$query->result();
    $data["user"]=$this->user;
    $data["filter"]=$filter2;

    $config["uri_segment"] = $uri_segment;
    $config["base_url"] = base_url($urlstring);
    $config["total_rows"] = $data["toplam_kayit"];
    $config["num_links"] = 20;
    $this->pagination->initialize($config);
    $data["links"] = $this->pagination->create_links();
    $this->load->view("hesabim/anasayfa",$data);

  }
  public function bilgilerim()
  {
    $data["iller"] = $this->db->query("select * from tbl_il order by il_id")->result();
    $data["user"]=$this->user;
    if (isset($_POST) && !empty($_POST)) {
      $formvalid = array(
          array('field' => 'ad',                      'label' => 'Ad',                    'rules' => 'required'),
          array('field' => 'soyad',                   'label' => 'Soyad',                 'rules' => 'required'),
          array('field' => 'sehir',                   'label' => 'Şehir',                 'rules' => 'required'),
          array('field' => 'cinsiyet',                'label' => 'Cinsiyet',              'rules' => 'required'),
          array('field' => 'gsm',                     'label' => 'Cep Telefonu',          'rules' => 'required'),
          array('field' => 'istel',                   'label' => 'İş Telefonu',           'rules' => 'required')
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
        $istel=$this->security->xss_clean($this->input->post("istel"));
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
        } else {
          $this->session->set_flashdata("error","Bilgileriniz güncellenirken bir hata oluştu. Lütfen tekrar deneyiniz.");
        }
      }
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

        $update = $this->members->editpass($password,$user->Id);
        if($update){
          $this->session->set_flashdata('success', 'Parolanız Başarıyla Güncellendi.');
          redirect(base_url().'hesabim/anasayfa');
        }else{
          $this->session->set_flashdata('error', 'Parolanız Güncellenemedi, Lütfen Tekrar Deneyiniz.');
        }
      }
    }
    $this->load->view("hesabim/sifredegistir",$data);
  }
  public function odemeler($filter="")
  {
    $data["user"]=$this->user;
    $data["filter"]=$filter;
    $this->load->view("hesabim/odemeler",$data);
  }
  public function favorilerim()
  {
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
    $this->load->view("hesabim/favorilerim",$data);
  }
  public function favorisil($ilanId)
  {
    $id=$this->security->xss_clean($this->input->post("id"));
    $sql = $this->db->query("SELECT * FROM favoriler WHERE uyeId='".$this->user->Id."' and ilanId='".$id."'");
    $say=$sql->num_rows();
    if ($say==1){
    $this->db->query("DELETE from favoriler where uyeId='".$this->user->Id."' and ilanId='".$id."'");
    }
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
        $seo_url.=$kategorys[0]->kategori_adi;
        $i++;


      } elseif(isset($kategorys[$i-1])){
        $yeni="field_kategori".$i;
        $$yeni=$kategorys[$i-1]->Id;
        $seo_url.="-".$kategorys[$i-1]->kategori_adi;
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
    $data["fields"]=$fields;
    $data["iller"]=$this->firmalar->iller();
    $data["ilceler"]=$this->firmalar->ilcelerbyIl($ilan->il);
    $data["mahalleler"]=$this->firmalar->mahallelerbyIlce($ilan->ilce);
    if (isset($_POST) && !empty($_POST)) {
      $userID=$this->session->userdata("userData")["userID"];
      $formvalid = array(
          array('field' => 'ilanadi',                 'label' => 'İlan Başlığı',          'rules' => 'required'),
          array('field' => 'aciklama',                'label' => 'İlan Açıklaması',       'rules' => 'required'),
          array('field' => 'fiyat1',                  'label' => 'Fiyat',                 'rules' => 'required'),
          array('field' => 'bitis_suresi',            'label' => 'İlan Süresi',           'rules' => 'required')
      );
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
        $use_map       = $this->security->xss_clean($this->input->post('use_map'));
        $map           = $this->security->xss_clean($this->input->post('map_Val'));
        if($use_map!=1 or $map==''){$map="";}
        $firmalar["map"]=$map;
        $aciklama      = $this->security->xss_clean($this->input->post('aciklama'));
        $firmalar["aciklama"] = base64_encode($aciklama);
        $firmalar["il"] = $this->security->xss_clean($this->input->post('il'));
        $seo_url.="-".replace("tbl_il","il_ad","il_id",$firmalar["il"]);
        $firmalar["ilce"] = $this->security->xss_clean($this->input->post('ilce'));
        $seo_url.="-".replace("tbl_ilce","ilce_ad","ilce_id",$firmalar["ilce"]);
        $firmalar["mahalle"] = $this->security->xss_clean($this->input->post('mahalle'));
        $seo_url.="-".replace("tbl_mahalle","mahalle_ad","mahalle_id",$firmalar["mahalle"]);
        //$seo_url.="-".$ilanId;
        $firmalar["seo_url"]=$seo_url;
        $firmalar["kayit_tarihi"]=date("Y-m-d");
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
        $firmalar["fiyat"] = $this->security->xss_clean($this->input->post('fiyat1'));
        $firmalar["fiyat2"] = $this->security->xss_clean($this->input->post('fiyat2'));
        $firmalar["birim"] = $this->security->xss_clean($this->input->post('birim'));
        $firmalar["kucuk_fotograf"] = $kucuk_fotograf;
        $firmalar["ilan_notu"] = $this->security->xss_clean($this->input->post('ilan_notu'));
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
        redirect(base_url("hesabim/ilanduzenle_ok/".$ilanId));

      } else {
        //validation kontrolü error verirse
      }
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
      $aktiflestir=$this->firmalar->update($ilanId,array("onay" => "1"));
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
      $bitistarihi= date("Y-m-d");
      $yenitarih = strtotime('2 month',strtotime($bitistarihi));
      $yenitarih = date('Y-m-d' ,$yenitarih );
      $sureuzat=$this->firmalar->update($ilanId,array("onay" => "1", "kayit_tarihi" => $bitistarihi, "bitis_tarihi" => $yenitarih, "suresi_doldu" => "0"));
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
      $bitistarihi= date("Y-m-d");
      $yenitarih = strtotime('2 month',strtotime($bitistarihi));
      $yenitarih = date('Y-m-d' ,$yenitarih );
      $sureuzat=$this->firmalar->update($ilanId,array("kayit_tarihi" => $bitistarihi, "bitis_tarihi" => $yenitarih, "guncelim" => "0"));
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

}
