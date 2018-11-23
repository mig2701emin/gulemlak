<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazaac extends CI_Controller{
  private $user;
  private $magaza;
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('userData')){ redirect('login'); }
    $this->load->model("magazalar");
    $this->load->model("members");
    $this->load->model("kategoriler");
    $this->load->model("siparisler");
    $where = array("Id" => $this->session->userdata('userData')["userID"]);
    $this->user=$this->members->get($where);
    if(magaza_var_mi($this->user->Id)){
      $this->magaza=$this->magazalar->getMagaza($this->magazalar->getMagazaId($this->user->Id));
    }else {
      $this->magaza=null;
    }
  }

  function index()
  {
    if (magaza_var_mi($this->user->Id)) {
      redirect(base_url("hesabim/magazam"));
    }
    $data["user"]=$this->user;
    $this->load->view("magazaac/start",$data);
  }

  public function kategorisec()
  {
    $data["user"]=$this->user;
    $data["anaKategoriler"]=$this->kategoriler->getAnaKategoriler();
    $this->load->view("magazaac/kategorisec",$data);

    if (isset($_POST) && !empty($_POST)) {
      $paket=$this->security->xss_clean($this->input->post("paket"));
      redirect(base_url("magazaac/settype/").encode($paket));
    }
  }
  public function settype($paket)
  {
    $paket=decode($paket);
    $a=$this->db->get("ayarlar")->row();
    if($paket=='hepsi'){
      $data["super_12ay"]=$a->hepsibir_super_12;
      $data["super_6ay"]=$a->hepsibir_super_6;
      $data["normal_12ay"]=$a->hepsibir_normal_12;
      $data["normal_6ay"]=$a->hepsibir_normal_6;
    }else{
      $kategori=$this->kategoriler->getbyid($paket);
      $data["super_12ay"]=$kategori->magaza_super_12;
      $data["super_6ay"]=$kategori->magaza_super_6;
      $data["normal_12ay"]=$kategori->magaza_normal_12;
      $data["normal_6ay"]=$kategori->magaza_normal_6;
    }
    $data["paket"]=$paket;
    $data["super_magaza_resim_siniri"]=$a->super_magaza_resim_siniri;
    $data["normal_magaza_resim_siniri"]=$a->normal_magaza_resim_siniri;
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("magazaac/settype",$data);
    if (isset($_POST) && !empty($_POST)) {
      $store_type=$this->security->xss_clean($this->input->post("store_type"));
      redirect(base_url("magazaac/detay/".encode($paket)."/".encode($store_type)));
    }

  }
  public function detay($paket,$store_type1)
  {
    $a=$this->db->get("ayarlar")->row();
    $paket=decode($paket);
    $store_type2=decode($store_type1);
    $store_type=explode("/",$store_type2);

    if($paket=="hepsi"){
    	$super_12=$a->hepsibir_super_12;
    	$super_6=$a->hepsibir_super_6;
    	$normal_12=$a->hepsibir_normal_12;
    	$normal_6=$a->hepsibir_normal_6;
  	}else{
      $chk_paket=$this->db->query("select * from kategoriler where Id='".$paket."'");
    	if($chk_paket->num_rows()==0){
        $this->session->set_flashdata('error', 'Hatalı işlem.');
        redirect(base_url("magazaac"));
    	}else{
        $kategori=$chk_paket->row();
      	$super_12=$kategori->magaza_super_12;
      	$super_6=$kategori->magaza_super_6;
      	$normal_12=$kategori->magaza_normal_12;
      	$normal_6=$kategori->magaza_normal_6;
    	}
  	}
  	if($store_type[0]=="1" and $store_type[1]=="6"){
    	$magaza_turu="Süper Mağaza";
    	$magaza_ucret=$super_6;
    	$super_mgz=1;
  	}elseif($store_type[0]=="1" and $store_type[1]=="12"){
    	$magaza_turu="Süper Mağaza";
    	$magaza_ucret=$super_12;
    	$super_mgz=1;
  	}elseif($store_type[0]=="2" and $store_type[1]=="6"){
    	$magaza_turu="Normal Mağaza";
    	$magaza_ucret=$normal_6;
    	$super_mgz=0;
  	}elseif($store_type[0]=="2" and $store_type[1]=="12"){
    	$magaza_turu="Normal Mağaza";
    	$magaza_ucret=$normal_12;
    	$super_mgz=0;
  	}
  	$magaza_sure=$store_type[1]."m";

    if (isset($_POST) && !empty($_POST)) {
      // $username=$this->security->xss_clean($this->input->post("username"));
      $magazaadi=$this->security->xss_clean($this->input->post("magazaadi"));
      $m_aciklama=$this->security->xss_clean($this->input->post("m_aciklama"));
      // $unvan=$this->security->xss_clean($this->input->post("unvan"));
      // $stil=$this->security->xss_clean($this->input->post("stil"));


      $magazaekle = array(
        "username"    =>seo_link($magazaadi),
        "magazaadi"   => $magazaadi,
        "aciklama"    => base64_encode($m_aciklama),
        "onay"        => 0,
        "kategoriId"  => $paket,
        "supermagaza" =>$super_mgz
      );

      if ( ! empty($_FILES))
  		{

        $config["upload_path"]   = FCPATH."photos/magaza/";
        $config["allowed_types"] = "gif|jpg|png|jpeg";
        $config["file_name"]="magaza_";

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("image1")){
          $magazaekle["logo"]=$this->upload->file_name;
          $this->load->library('image_lib');
          $config4['image_library'] = 'gd2';
          $config4['source_image'] = $this->upload->upload_path.$this->upload->file_name;
          $config4['maintain_ratio'] = false;
          $config4['width'] = 178;
          $config4['height'] = 110;
          $this->image_lib->initialize($config4);

          if ( ! $this->image_lib->resize())
          {
            $this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'resim boyutlandırma hatası'));
          }

          $this->image_lib->clear();
        }
      }

      $insert_id=$this->magazalar->add($magazaekle);
      $magazaUser = array("magazaId" => $insert_id, "uyeId" => $this->session->userdata("userData")["userID"], "yetkiler" => "1,1,1,1");
      $insert=$this->magazalar->addUser($magazaUser);
      $islemno=rand(0,9999999);
      $tarih=date('Y-m-d');
      $siparis = array(
        "islemno" => $islemno,
        "uyeId"   => $this->session->userdata('userData')['userID'],
        "firmaId" => 0,
        "doping"  => $magaza_turu,
        "sure"    => $magaza_sure,
        "tutar"   => $magaza_ucret,
        "magaza"  => $insert_id,
        "durum"   => 0,
        "tarih"   => $tarih
       );
       $data["user"]=$this->user;
       if ($this->magaza!=null) {
         $data["magaza"]=$this->magaza;
       }
       $this->session->set_userdata("siparis",$siparis);
       //$this->siparisler->add($siparis);

      if ($insert) {
        $this->session->set_flashdata('success', 'Magaza kaydınız yapıldı.');
      }else {
        $this->session->set_flashdata('error', 'Hatalı işlem');
      }
      redirect(base_url("doping/magaza/".$insert_id));
    }
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("magazaac/detay",$data);
  }
  public function magazaok($magazaId)
  {
    $data["magazaId"]=$magazaId;
    $user=$this->session->userdata("userData");
    $magaza_kontrol=magaza_kontrol($magazaId,$user["userID"]);
    if (!$magaza_kontrol) {
      redirect(base_url());
    }
    $data["magazaId"]=$magazaId;
    $data["ucret"]=$ucret;
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("magazaac/magazaok",$data);
  }

}
