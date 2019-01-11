<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kurumsal extends CI_Controller{
  private $user;
  private $magaza;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('members');
    if($this->session->userdata('userData')){
      $where = array("Id" => $this->session->userdata('userData')["userID"]);
      $this->user=$this->members->get($where);
      if(magaza_var_mi($this->user->Id)){
        $this->magaza=$this->magazalar->getMagaza($this->magazalar->getMagazaId($this->user->Id));
      }else {
        $this->magaza=null;
      }
    }else {
      $this->user=null;
    }
  }

  function index()
  {
    if ($this->user!=null) {
      $data["user"]=$this->user;
    }
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
      $data['title']='Emlak Meclisi | Anasayfa';
      $this->load->view('layout/kurumsal', $data);
  }

    function destek()
    {
      if ($this->user!=null) {
        $data["user"]=$this->user;
      }
      if ($this->magaza!=null) {
        $data["magaza"]=$this->magaza;
      }
        $data['title']='Emlak Meclisi | Anasayfa';
        $this->load->view('layout/destek', $data);
    }

    function  iletisim(){
      if ($this->user!=null) {
				$data["user"]=$this->user;
			}
			if ($this->magaza!=null) {
				$data["magaza"]=$this->magaza;
			}
        $data['title']='Emlak Meclisi | Anasayfa';
        $this->load->view('layout/iletisim', $data);
    }
    function  SanalTur(){

        $data['title']='Emlak Meclisi | Anasayfa';
        $this->load->view('layout/sanal', $data);
    }
}
