<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Yonetim extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }
  public function uyegir($id)
  {
    $Id=base64_decode($id);
    $return=$this->db->query("select * from uyeler WHERE Id=".$Id)->row();
    if ($return) {
      $userData['userID'] = $return->Id;
      $userData['oauth_provider'] = $return->oauth_provider;
      $userData['ad'] = $return->ad;
      $userData['soyad'] = $return->soyad;
      $userData['email'] = $return->email;
      $userData['picture'] = $return->picture;
      $userData['gsm'] = $return->gsm;
      $userData['sehir'] = $return->sehir;
      $this->session->set_userdata('userData', $userData);
      redirect(base_url("hesabim/anasayfa"));
    }
  }
  public function uyeduzenle($id)
  {
    $Id=base64_decode($id);
    $return=$this->db->query("select * from uyeler WHERE Id=".$Id)->row();
    if ($return) {
      $userData['userID'] = $return->Id;
      $userData['oauth_provider'] = $return->oauth_provider;
      $userData['ad'] = $return->ad;
      $userData['soyad'] = $return->soyad;
      $userData['email'] = $return->email;
      $userData['picture'] = $return->picture;
      $userData['gsm'] = $return->gsm;
      $userData['sehir'] = $return->sehir;
      $this->session->set_userdata('userData', $userData);
      redirect(base_url("hesabim/bilgilerim"));
    }
  }

}
