<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ilanlar extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('firmalar');
    $this->load->model('kategoriler');
  }

  public function listele($key1,$val1,$key2,$val2,$key3,$val3,$key4,$val4,$key5,$val5,$key6,$val6,$key7='',$val7='')
  {

    $data['title']='Emlak Meclisi | İlanlar';
    $data['anaKategoriler']=$this->kategoriler->getAnaKategoriler();
    if ($key7!='') {
      $konum=konum($val5,$val6,$val7);
      $data['firmalar']=$this->firmalar->konut_ilanlari($key1,$val1,$key2,$val2,$key3,$val3,$key4,$val4,$key5,$konum['il'],$key6,$konum['ilce'],$key7,$konum['mahalle']);
    }else {
      $konum=konum($val4,$val5,$val5);
      $data['firmalar']=$this->firmalar->is_arsa_ilanlari($key1,$val1,$key2,$val2,$key3,$val3,$key4,$konum['il'],$key5,$konum['ilce'],$key6,$konum['mahalle']);
    }
    $this->load->view('ilanlar',$data);
  }
  public function kategoriler($anaKategoriId,$altKategoriId="")
  {

    if ($anaKategoriId=="") {
      redirect(base_url());
    }
    $data['anaKategoriler']=$this->kategoriler->getAnaKategoriler();
    $anaKategori=$this->kategoriler->getbyid($anaKategoriId);
    $data['title']='Ticaret Meclisi | '.$anaKategori->kategori_adi;
    if ($altKategoriId!='') {
      $data['firmalar']=$this->firmalar->getByKategori($anaKategoriId,$altKategoriId);
    }else {
      $data['firmalar']=$this->firmalar->getByKategori($anaKategoriId);
    }
    $this->load->view('ilanlar',$data);
  }




}
