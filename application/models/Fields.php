<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fields extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getfields($sql)
  {
    $query=$this->db->query($sql);
    return $query->result();
  }

  public function update($where,$update)
  {
    $this->db->where($where);
    $query=$this->db->update("custom_fields",$update);
    if ($query) {
      return true;
    } else {
      return false;
    }

  }

}
