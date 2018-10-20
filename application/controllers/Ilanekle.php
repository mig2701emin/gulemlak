<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ilanekle extends CI_Controller{
  private $upload_path = FCPATH."photos/";
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('userData')){ redirect('login'); }
    $this->load->model('kategoriler');
    $this->load->model('firmalar');
    $this->load->model('fields');
    $this->load->model('dopings');
    $this->load->model("magazalar");
    $this->load->model("members");

  }
  public function index()
  {
    $settings=$this->db->get("ayarlar")->row();
    //session daki kategoriyi siliyoruz.
    if ($this->session->userdata("kategori")) {
      $this->session->unset_userdata("kategori");
    }
    //ana kategorileri view e gönderiyoruz
    $data['anaKategoriler']=$this->kategoriler->getAnaKategoriler();

    $this->load->view('ilanekle/kategorisec',$data);
  }

  //ilan ekleme sayfası
  public function detay()
  {
    $kategori=$this->session->userdata("kategori");

    if ($kategori) {
      //kategori boş değilse
      $userID=$this->session->userdata("userData")["userID"];
      $data["magaza_var_mi"]=magaza_var_mi($userID);
      $data["iller"]=$this->firmalar->iller();
      $kategorinames=getustkategorinames($kategori);
      $data["kategorinames"]=$kategorinames;
      //fieldlerin getirilmesi başlangıç
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
      if ($field_kategori6!="") {
        $sql.=" or (kategori6='".$field_kategori6."' and kategori7='0')";
      }
      if ($field_kategori7!="") {
        $sql.=" or (kategori7='".$field_kategori7."' and kategori8='0')";
      }
      if ($field_kategori8!="") {
        $sql.=" or (kategori8='".$field_kategori8."')";
      }
      $sql.=") order by siralama";

      $fields = $this->fields->getfields($sql);
      //fieldlerin getirilmesi bitiş
      $data["fields"]=$fields;
      //post başlangıcı
      if (isset($_POST) && !empty($_POST)) {
        // $res = post_captcha($_POST['g-recaptcha-response']);
        // if ($res['success']) {
          //recaptcha onaylanmışsa
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
              redirect(base_url("account/ilanekle"));
            }
            $firmalar = array();
            $ilanId=ilan_id_al();
            $firmalar["Id"]=$ilanId;
            $firmalar["kategoriId"]=$field_kategori;
            $firmalar["uyeId"]=$userID;
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
            $firmalar["toplam_ziyaretci"]=0;
            $magaza_var_mi=magaza_var_mi($userID);
            $add_to_store  = $this->security->xss_clean($this->input->post('add_to_store'));

            if ($magaza_var_mi && $add_to_store) {
              $magazaId=$this->db->where("uyeId",$userID)->get("magaza_kullanicilari")->row()->magazaId;
              $magaza_ilanlari = array('Id' => null, 'magazaId' => $magazaId, 'ilanId' => $ilanId, 'uyeId' => $userID);
              $this->db->insert("magaza_ilanlari",$magaza_ilanlari);
              $onay_durum=1;
              $kucuk_fotograf=1;
            } else {
              $onay_durum=0;
              $kucuk_fotograf=0;
            }
            $firmalar["onay"]=$onay_durum;
            $firmalar["yayinla"]=$this->security->xss_clean($this->input->post('yayinla'));
            $firmalar["kategori2"] = ($field_kategori2!="") ? $field_kategori2 : 0 ;
            $firmalar["kategori3"] = ($field_kategori3!="") ? $field_kategori3 : 0 ;
            $firmalar["kategori4"] = ($field_kategori4!="") ? $field_kategori4 : 0 ;
            $firmalar["kategori5"] = ($field_kategori5!="") ? $field_kategori5 : 0 ;
            $firmalar["kategori6"] = ($field_kategori6!="") ? $field_kategori6 : 0 ;
            $firmalar["kategori7"] = ($field_kategori7!="") ? $field_kategori7 : 0 ;
            $firmalar["kategori8"] = ($field_kategori8!="") ? $field_kategori8 : 0 ;
            $firmalar["fiyat"] = $this->security->xss_clean($this->input->post('fiyat1'));
            $firmalar["fiyat2"] = $this->security->xss_clean($this->input->post('fiyat2'));
            $firmalar["birim"] = $this->security->xss_clean($this->input->post('birim'));
            $firmalar["kucuk_fotograf"] = $kucuk_fotograf;
            $firmalar["ilan_turu"] = 0;
            $firmalar["ilan_notu"] = $this->security->xss_clean($this->input->post('ilan_notu'));
            $insert=$this->firmalar->add($firmalar);
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
              $this->db->query("insert into custom_fields (Id,ilanId,field_name,field_value) VALUES(null,'".$ilanId."','".$field_name."','".$field_value."')");
            }
            $this->session->unset_userdata("kategori");
            $this->session->set_flashdata('success', 'İlanınız Kaydedildi.');
            redirect(base_url("resim/set/".$ilanId));

          } else {
            //validation kontrolü error verirse
          }
        // } else {
        //   //recaptcha onaylanmışsa.
        //   $this->session->set_flashdata('error', 'Lütfen robot olmadığınızı doğrulayın.');
        // }
      }
      //post sonu
      $this->load->view('ilanekle/detay',$data);
    } else {
      //kategori boşsa
      $this->session->set_flashdata('error', 'Lütfen Kategori Seçiminizi Yapınız.');
      redirect(base_url('ilanekle'));
    }
  }
  //ilan önizleme
  public function onizleme($ilanId)
  {
    $ilan_kontrol=$this->firmalar->ilan_kontrol($ilanId,$this->session->userdata("userData")["userID"]);
    if (!$ilan_kontrol) {
      redirect(base_url());
    }
    $ilan=$this->firmalar->get_ilan($ilanId);
    $data["ilan"]=$ilan;
    $show_fields="";
    $show_additional_fields="";
    //$fieldCallType="";
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
    $kategorinames=getustkategorinames($kategori);
    $data["kategorinames"]=$kategorinames;
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
    if ($field_kategori6!="") {
      $sql.=" or (kategori6='".$field_kategori6."' and kategori7='0')";
    }
    if ($field_kategori7!="") {
      $sql.=" or (kategori7='".$field_kategori7."' and kategori8='0')";
    }
    if ($field_kategori8!="") {
      $sql.=" or (kategori8='".$field_kategori8."')";
    }
    $sql.=") order by siralama";

    $fields = $this->fields->getfields($sql);
    //$data["kategorys"]=$kategorys;
    $data["fields"]=$fields;

    foreach ($fields as $field) {
      if($field->type=='checkbox'){
        // preview checkbox
        $show_ok[$field->name]=0;
        $check_values=get_details($ilanId,$field->seo_name);
        $explode_check=explode("||",$check_values);
        $new_values=explode("||",$field->field_values);
        $show_additional_fields.='<div class="col-12"><h4 class="mb-3">'.$field->name.'</h4>';
        if($show_ok[$field->name]!=1){
          $show_additional_fields.='<div class="row">';
        }
        for ($i = 0; $i <= count($new_values)-1; $i++) {
          $show_additional_fields.='<div class="custom-control custom-checkbox col-6 col-md-3"';
          if (sorgula2($ilanId,$field->seo_name,$new_values[$i])) {
            $show_additional_fields.=' style="background:url('.base_url().'assets/images/evet.png) no-repeat 0px -2px"';
          }
          $show_additional_fields.='>&nbsp;'.$new_values[$i].'</div>';
        }
        if($show_ok[$field->name]!=1){
          $show_additional_fields.='</div><hr class="mt-4"/></div>';
        }
        $show_ok[$field->name]="1";
        }elseif($field->type=='multiple_select'){
          // preview fields
          $change_value=get_details($ilanId,$field->seo_name);
          $change_value2=get_details($ilanId,$multiple_field_seo_name);
          $show_fields.='<div class="col-12 mar-bot">'.$field->name.':&nbsp;'.($change_value!=''?$change_value:'Belirtilmemiş').'</div>';
          $show_fields.='<div class="col-12 mar-bot">'.$field->multiple_field_name.':&nbsp;'.($change_value2!=''?$change_value2:'Belirtilmemiş').'</div>';
        }else{
          // preview fields
          $change_value=get_details($ilanId,$field->seo_name);
          $show_fields.='<div class="col-12 mar-bot">'.$field->name.':&nbsp;'.($change_value!=''?$change_value:'Belirtilmemiş').'</div>';
        }
    }

    $data["show_fields"]=$show_fields;
    $data["show_additional_fields"]=$show_additional_fields;
    $resimler=$this->db->where("ilanId",$ilanId)->get("pictures")->result();
    $data["resimler"]=$resimler;
    $user=$this->session->userdata("userData");
    $where = array('Id' => $user["userID"]);
    $user=$this->members->get($where);
    $data["user"]=$user;
    $magaza_var_mi=magaza_var_mi($user->Id);
    $data["magaza_var_mi"]=$magaza_var_mi;
    if ($magaza_var_mi) {
      $magazaId=$this->magazalar->getMagazaId($user->Id);
      $data["magaza"]=$this->magazalar->getMagaza($magazaId);
    }
    $this->load->view('ilanekle/onizleme',$data);

  }
  public function ok($ilanId)
  {
    $ilan_kontrol=$this->firmalar->ilan_kontrol($ilanId,$this->session->userdata("userData")["userID"]);
    if (!$ilan_kontrol) {
      redirect(base_url());
    }
    $data["ilanId"]=$ilanId;
    $ilan=$this->firmalar->get_ilan($ilanId);
    $data["ilan_turu"]=0;
    $data["doping_al"]=0;
    $data["video"]=0;
    $data["onay_durum"]=$ilan->onay;
    $this->load->view("ilanekle/ok",$data);
  }

}
