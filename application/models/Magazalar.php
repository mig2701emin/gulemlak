<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazalar extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getMagazaId($userID)
  {
    $this->db->where("uyeId",$userID);
    $query=$this->db->get("magaza_kullanicilari");
    if ($query->num_rows()>0) {
      return $query->row()->magazaId;
    }
  }
  public function getMagaza($magazaId)
  {
    $this->db->where("Id",$magazaId);
    $query=$this->db->get("magazalar");
    if ($query->num_rows()>0) {
      return $query->row();
    }
  }
  public function ilan_magazada_mi($ilanId)
  {
    $this->db->where("ilanId",$ilanId);
    $query=$this->db->get("magaza_ilanlari");
    if ($query->num_rows()>0) {
      return true;
    }else {
      return false;
    }
  }
  public function add($ekle)
  {
    $this->db->insert("magazalar",$ekle);
    return $this->db->insert_id();
  }
  public function addUser($magazaUser)
  {
    $insert=$this->db->insert("magaza_kullanicilari",$magazaUser);
    if ($insert) {
      return true;
    } else {
      return false;
    }

  }
  public function magaza_kontrol($magazaId,$userID)
  {
    $this->db->where("magazaId",$magazaId);
    $this->db->where("uyeId",$userID);
    $query=$this->db->get("magaza_kullanicilari")->num_rows();
    if ($query > 0) {
      return true;
    } else {
      return false;
    }

  }
  public function update($where,$edit)
  {
    $update=$this->db->where($where)->update("magazalar",$edit);
    return $update;
  }

}
