<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subdeneme extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $username=explode(".",$_SERVER['HTTP_HOST'])[0];
    echo $username;
  }
  public function magaza($username)
  {

    //$query=$this->db->where("uyeId",$this->user->Id)->get("magaza_kullanicilari");
    $query=$this->db->where("username",$username)->get("magaza_kullanicilari");
    if ($query->num_rows() > 0) {
      $magazaUser=$query->row();
    } else {
      $this->session->set_flashdata('error', 'Mağaza Bulunamadı.');
      redirect(base_url("hesabim/anasayfa"));
    }

    $query2=$this->db->where("Id",$magazaUser->magazaId)->get("magazalar");
    if ($query2->num_rows() > 0) {
      $magaza=$query2->row();
      $data["magaza"]=$magaza;
    } else {
      $this->session->set_flashdata('error', '<div id="warning_box" title="Sayın Kullanıcımız,">
    <div class="warning_content">
    <h3>Mağazanızın süresi dolmuş veya site yönetimi tarafından kapatılmış olabilir.</h3>
    <ul class="premiumAd_info">
    <li>Mağaza süresini uzatmak ve/veya tekrar açmak için lütfen Site Yönetimiyle irtibata geçiniz...</li>
    </ul>');
    redirect(base_url("hesabim/anasayfa"));

    }

    //$data["user"]=$this->user;
    $this->load->view("projeler/deneme",$data);
  }


}
