<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
  }
  public function sitemap()
  {
    header("Content-Type: text/xml;charset=iso-8859-1");
    $this->load->view('sitemap/sitemap');
  }
  public function sitemap1()
  {
    header("Content-Type: text/xml;charset=iso-8859-1");
    $this->load->view('sitemap/sitemap1');
  }
  public function sitemap2()
  {
    header("Content-Type: text/xml;charset=iso-8859-1");
    $this->load->view('sitemap/sitemap2');
  }
  public function sitemap3()
  {
    header("Content-Type: text/xml;charset=iso-8859-1");
    $this->load->view('sitemap/sitemap3');
  }
  public function sitemap4()
  {
    header("Content-Type: text/xml;charset=iso-8859-1");
    $this->load->view('sitemap/sitemap4');
  }
  public function sitemap5()
  {
    header("Content-Type: text/xml;charset=iso-8859-1");
    $this->load->view('sitemap/sitemap5');
  }
  public function sitemap6()
  {
    header("Content-Type: text/xml;charset=iso-8859-1");
    $this->load->view('sitemap/sitemap6');
  }
  public function sitemap7()
  {
    header("Content-Type: text/xml;charset=iso-8859-1");
    $this->load->view('sitemap/sitemap7');
  }
  public function sitemap8()
  {
    header("Content-Type: text/xml;charset=iso-8859-1");
    $this->load->view('sitemap/sitemap8');
  }
  public function sitemap9()
  {
    header("Content-Type: text/xml;charset=iso-8859-1");
    $this->load->view('sitemap/sitemap9');
  }
  public function sitemap10()
  {
    header("Content-Type: text/xml;charset=iso-8859-1");
    $this->load->view('sitemap/sitemap10');
  }
}
