<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurumsal extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
      $data['title']='Emlak Meclisi | Anasayfa';
      $this->load->view('layout/kurumsal', $data);
  }

    function Destek()
    {
        $data['title']='Emlak Meclisi | Anasayfa';
        $this->load->view('layout/destek', $data);
    }

}
