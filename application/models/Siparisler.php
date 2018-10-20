<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siparisler extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function add($siparis)
  {
    $this->db->insert("siparis",$siparis);

  }

}
