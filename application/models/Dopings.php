<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dopings extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get($where)
  {
    $query=$this->db->where("type",$where)->get('dopingler');

      return $query->result();

  }
  

}
