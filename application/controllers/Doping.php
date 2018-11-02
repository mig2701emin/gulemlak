<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doping extends CI_Controller{
  private $user;
  private $magaza;
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('userData')){ redirect('login'); }
    $this->load->model('kategoriler');
    $this->load->model('firmalar');
    $this->load->model('fields');
    $this->load->model('dopings');
    $this->load->model("magazalar");
    $this->load->model("members");
    $this->load->model("siparisler");
    $where = array("Id" => $this->session->userdata('userData')["userID"]);
    $this->user=$this->members->get($where);
    if(magaza_var_mi($this->user->Id)){
      $this->magaza=$this->magazalar->getMagaza($this->magazalar->getMagazaId($this->user->Id));
    }else {
      $this->magaza=null;
    }

  }
  public function ilan($ilanId)
  { $ilan=$this->firmalar->get_ilan($ilanId);
    if($this->user->Id != $ilan->uyeId){
      redirect(base_url());
    }
    //$user=$this->session->userdata("userData");
    if ($ilanId) {
      for ($i=1; $i < 11; $i++) {
        $this->session->unset_userdata("doping_".$i);
      }
      $ilan=$this->firmalar->get_ilan($ilanId);
      if ($ilan->uyeId==$this->user->Id) {

        $ilan_dopings=$this->dopings->get("1");
        $data["dopings"]=$ilan_dopings;
        if (isset($_POST) && !empty($_POST)) {
          $tutar=0;
          $d=1;
          foreach ($ilan_dopings as $ilan_doping) {
              $degisken="idoping_".$d;
              $degisken2="iprice_".$d;
              $$degisken=$this->security->xss_clean($this->input->post('idoping_'.$d));
              if ($$degisken) {
                $this->session->set_userdata($degisken,$$degisken);
                $$degisken2=$$degisken*$ilan_doping->ucret;
                $this->session->set_userdata($degisken2,$$degisken2);
                $tutar+=$$degisken2;
              }
              $d++;
          }
          if ($tutar == 0) {
            redirect(base_url("ilanekle/ok/".$ilanId));
          }else{
            $this->session->set_userdata("tutar",$tutar);
            redirect(base_url("doping/ilansepet/".$ilanId));
          }
        }

        $data["user"]=$this->user;
        if ($this->magaza!=null) {
          $data["magaza"]=$this->magaza;
        }
        $this->load->view('ilanekle/ilandopingsec',$data);
      }
    }
  }
  public function ilansepet($ilanId)
  {
    $ilan_kontrol=$this->firmalar->ilan_kontrol($ilanId,$this->session->userdata("userData")["userID"]);
    if (!$ilan_kontrol) {
      redirect(base_url());
    }
    //$user=$this->session->userdata("userData");
    $data["ilanId"]=$ilanId;
    $ilan_dopings=$this->dopings->get("1");
    $data["dopings"]=$ilan_dopings;
    $this->load->view('ilanekle/ilansepet',$data);
  }
  public function ilanodeme($ilanId)
  {
    $ilan_kontrol=$this->firmalar->ilan_kontrol($ilanId,$this->session->userdata("userData")["userID"]);
    if (!$ilan_kontrol) {
      redirect(base_url());
    }
    $data["ilanId"]=$ilanId;
    $ilan=$this->firmalar->get_ilan($ilanId);
    $data["ilan_turu"]=0;
    $data["doping_al"]=1;
    $data["video"]=0;
    $data["onay_durum"]=$ilan->onay;
    //$user=$this->session->userdata("userData");
    $ilan_dopings=$this->dopings->get("1");
  	$islemno=rand(100,999999);
    $tarih=date("Y-m-d");
    $d=1;
    foreach ($ilan_dopings as $ilan_doping) {
        if ($this->session->userdata("idoping_".$d)) {
          $sql="insert into siparis (id,islemno,uyeId,firmaId,doping,sure,tutar,";
          $sql.="magaza,durum,tarih) values(null,'".$islemno."','".$this->user->Id;
          $sql.="','".$ilanId."','".$ilan_doping->doping."','".$this->session->userdata('idoping_'.$d);
          $sql.="m','".$this->session->userdata('iprice_'.$d)."','','0','".$tarih."')";
          $this->db->query($sql);
          $this->session->unset_userdata('idoping_'.$d);
        }
        $d++;
    }

    $data["tutar"]=$this->session->userdata("tutar");
    $this->session->unset_userdata("tutar");
    $this->load->view("ilanekle/ok",$data);
  }
  public function magaza($magazaId)
  {
    $data["magazaId"]=$magazaId;
    //$user=$this->session->userdata("userData");
    $magaza_kontrol=$this->magazalar->magaza_kontrol($magazaId,$this->user->Id);
    if (!$magaza_kontrol) {
      redirect(base_url());
    }
    for ($i=1; $i < 11; $i++) {
      $this->session->unset_userdata("doping_".$i);
    }
    $magaza_dopings=$this->dopings->get("0");
    $data["dopings"]=$magaza_dopings;

    if (isset($_POST) && !empty($_POST)) {
      $tutar=$this->session->userdata("siparis")["tutar"];
      $d=1;
      foreach ($magaza_dopings as $magaza_doping) {
          $degisken="mdoping_".$d;
          $degisken2="mprice_".$d;
          $$degisken=$this->security->xss_clean($this->input->post('mdoping_'.$d));
          if ($$degisken) {
            $this->session->set_userdata($degisken,$$degisken);
            $$degisken2=$$degisken*$ilan_doping->ucret;
            $this->session->set_userdata($degisken2,$$degisken2);
            $tutar+=$$degisken2;
          }
          $d++;
      }
      if ($tutar == $this->session->userdata("siparis")["tutar"]) {
        redirect(base_url("doping/magazasepet/".$magazaId."/nodoping"));
      }else {
        $this->session->set_userdata("tutar",$tutar);
        redirect(base_url("doping/magazasepet/".$magazaId."/doping"));

      }
    }
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view('magazaac/magazadopingsec',$data);
  }
  public function magazasepet($magazaId, $doping)
  {
    $data["magazaId"]=$magazaId;
    //$user=$this->session->userdata("userData");
    $magaza_kontrol=$this->magazalar->magaza_kontrol($magazaId,$this->user->Id);
    if (!$magaza_kontrol) {
      redirect(base_url());
    }
    $data["doping"]=$doping;
    $magaza_dopings=$this->dopings->get("0");
    $data["dopings"]=$magaza_dopings;
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }

    $this->load->view('magazaac/magazasepet',$data);
  }
  public function magazaodeme($magazaId,$doping)
  {
    $data["magazaId"]=$magazaId;
    //$user=$this->session->userdata("userData");
    $magaza_kontrol=$this->magazalar->magaza_kontrol($magazaId,$this->user->Id);
    if (!$magaza_kontrol) {
      redirect(base_url());
    }
      $siparis=$this->session->userdata("siparis");
      $this->siparisler->add($siparis);
      $this->session->unset_userdata("siparis");
      if ($doping == "doping") {
        $tarih=date("Y-m-d");
        $d=1;
        $magaza_dopings=$this->dopings->get("0");
        foreach ($magaza_dopings as $magaza_doping) {
          if ($this->session->userdata("mdoping_".$d)) {
            $sql="insert into siparis (id,islemno,uyeId,firmaId,doping,sure,tutar,";
            $sql.="magaza,durum,tarih) values(null,'".$siparis['islemno']."','".$this->user->Id;
            $sql.="','','".$magaza_dopings->doping."','".$this->session->userdata('mdoping_'.$d);
            $sql.="m','".$this->session->userdata('mprice_'.$d)."','".$magazaId."','0','".$tarih."')";
            $this->db->query($sql);
            $this->session->unset_userdata('mdoping_'.$d);
          }
          $d++;
        }

        $data["tutar"]=$this->session->userdata("tutar");
        $this->session->unset_userdata("tutar");
      } else {
        $data["tutar"]=$siparis["tutar"];
      }

      $data["user"]=$this->user;
      if ($this->magaza!=null) {
        $data["magaza"]=$this->magaza;
      }

    $this->load->view("magazaac/magazaok",$data);
  }

}
