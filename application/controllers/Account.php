<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller{
  private $user;
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('userData')){ redirect('login'); }
    $this->load->model('kategoriler');
    $this->load->model('firmalar');
    $this->load->model('fields');
    $this->load->library('google');
    $this->load->library('facebook');
    $this->load->model('dopings');
    $this->load->model("magazalar");
    $this->load->model("members");
    $this->user=$this->session->userdata("userData");

  }
  public function index()
  {
    redirect(base_url());
  }

  //çıkış işlemi
  public function logout()
  {
    $this->facebook->destroy_session();
    // Remove user data from session

    $this->session->unset_userdata('userData');
    // Redirect to login page

    $this->session->sess_destroy();

    redirect(base_url().'cikis');
  }

}
