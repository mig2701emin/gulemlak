<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoriler extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getAnaKategoriler()
  {
    $this->db->order_by('siralama asc,kategori_adi asc');
    $this->db->where('ust_kategori', '0');
    $query = $this->db->get('kategoriler');

    return $query->result();
  }
  public function getSubs($ust_kategori)
  {
    $this->db->order_by('siralama asc,kategori_adi asc');
    $this->db->where('ust_kategori', $ust_kategori);
    $query = $this->db->get('kategoriler');
    if ($query->num_rows() > 0) {
      return $query->result();
    }
  }

  public function getAnaArray()
  {
    $this->db->order_by('siralama asc,kategori_adi asc');
    $this->db->where('ust_kategori', '0');
    $query = $this->db->get('kategoriler');

    return $query->result_array();
  }

  function getSubsArray($ust_kategori){
		$this->db->order_by('siralama asc,kategori_adi asc');
		$this->db->where('ust_kategori', $ust_kategori);
		$query = $this->db->get('kategoriler');
    if ($query->num_rows() > 0) {
      return $query->result_array();
    }

  }
  public function getbyid($id)
  {
    $this->db->where('Id',$id);
    $query=$this->db->get('kategoriler');
    if ($query->num_rows() > 0) {
      return $query->row();
    }
  }

}
