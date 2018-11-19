<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resim extends CI_Controller{
  private $upload_path = FCPATH."photos/";
  private $user;
  private $magaza;
  public function __construct()
  {
    parent::__construct();
    $this->load->model("magazalar");
    $this->load->model("members");
    if(!$this->session->userdata('userData')){ redirect('login'); }
    $this->load->model('firmalar');
    $where = array("Id" => $this->session->userdata('userData')["userID"]);
    $this->user=$this->members->get($where);
    if(magaza_var_mi($this->user->Id)){
      $this->magaza=$this->magazalar->getMagaza($this->magazalar->getMagazaId($this->user->Id));
    }else {
      $this->magaza=null;
    }
  }
  public function set($ilanId)
  {
    $data["ilanId"]=$ilanId;
    $ilan_kontrol=$this->firmalar->ilan_kontrol($ilanId,$this->session->userdata("userData")["userID"]);
    if (!$ilan_kontrol) {
      redirect(base_url());
    }
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("resim/ekle",$data);
  }
  public function duzenle($ilanId)
  {
    $data["ilanId"]=$ilanId;
    $ilan_kontrol=$this->firmalar->ilan_kontrol($ilanId,$this->session->userdata("userData")["userID"]);
    if (!$ilan_kontrol) {
      redirect(base_url());
    }
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("resim/duzenle",$data);
  }

  public function yukle($ilanId)
  {

    if ( ! empty($_FILES))
		{
      /*$type=explode(".",$_FILES["file"]["nmae"]);
      $type=$type[count($type)-1];*/
			$config["upload_path"]   = $this->upload_path."big/";
			$config["allowed_types"] = "gif|jpg|png|jpeg";
      $config["file_name"]=$ilanId."_";

			$this->load->library('upload', $config);

			if ($this->upload->do_upload("file")){
        $src_image=$this->upload->upload_path.$this->upload->file_name;
        $dst_image=$this->upload->upload_path.$this->upload->file_name;
        $type=$this->upload->upload_path.$this->upload->file_type;
        $width=890;
        $height=550;
        create_image($src_image, $dst_image,$type,$width,$height);


        $this->load->library('image_lib');
        /*$config1['image_library'] = 'gd2';
        $config1['source_image'] = 'assets/images/deneme1.png';
        $config1['new_image'] = $this->upload->upload_path.$this->upload->file_name;
        $config1['wm_type'] = 'overlay';
        $config1['wm_overlay_path'] = $this->upload->upload_path.$this->upload->file_name;
        $config1['wm_opacity'] = '100';
        $config1['wm_vrt_alignment'] = 'middle';
        $config1['wm_hor_alignment'] = 'center';
        $this->image_lib->initialize($config1);
        if (!$this->image_lib->watermark()) {
          $this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'Watermak işlemi Yapılamadı'));
        }
        $this->image_lib->clear();*/

        $config2['image_library'] = 'gd2';
        $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
        //$config2['new_image'] = $this->upload->upload_path."watermark_2/".$this->upload->file_name;
        $config2['wm_type'] = 'overlay';
        $config2['wm_overlay_path'] = 'assets/images/deneme2.png';
        $config2['wm_opacity'] = '100';
        $config2['wm_vrt_alignment'] = 'middle';
        $config2['wm_hor_alignment'] = 'center';


        $this->image_lib->initialize($config2);
        if (!$this->image_lib->watermark()) {
          $this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'Watermak işlemi Yapılamadı'));
        }

        $this->image_lib->clear();

        $config3['image_library'] = 'gd2';
        $config3['source_image'] = $this->upload->upload_path.$this->upload->file_name;
        $config3['new_image'] = $this->upload_path."crop/".$this->upload->file_name;
        $config3['maintain_ratio'] = TRUE;
        $config3['width'] = 445;
        $config3['height'] = 275;


        $this->image_lib->initialize($config3);

        if ( ! $this->image_lib->resize())
        {
          $this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'İkinci boyutlandırma Yapılamadı'));
        }
        $this->image_lib->clear();

        $this->image_lib->clear();

        $config4['image_library'] = 'gd2';
        $config4['source_image'] = $this->upload->upload_path.$this->upload->file_name;
        $config4['new_image'] = $this->upload_path."thumbnail/".$this->upload->file_name;
        $config4['maintain_ratio'] = TRUE;
        $config4['width'] = 178;
        $config4['height'] = 110;


        $this->image_lib->initialize($config4);

        if ( ! $this->image_lib->resize())
        {
          $this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'İkinci boyutlandırma Yapılamadı'));
        }
        $this->image_lib->clear();

        $data = array(
            "ilanId" => $ilanId,
            "name" => $this->upload->file_name
        );

        $update = $this->db->insert("pictures", $data);
      }else {
				//echo "(s) dosyası yüklenemedi";
        print "dosya yüklenemedi";
			}
		}


  }
  public function sil($ilanId)
  {
    $file = $this->input->post("file");
		if ($file && file_exists($this->upload_path."big/".$file)) {
			unlink($this->upload_path. "big/".$file);
    }
    if ($file && file_exists($this->upload_path . "crop/" . $file)) {
      unlink($this->upload_path . "crop/". $file);
    }
    if ($file && file_exists($this->upload_path . "thumbnail/" . $file)) {
			unlink($this->upload_path . "thumbnail/" . $file);
    }
      $this->db->delete('pictures', array('name' => $file,"ilanId" => $ilanId));

  }
  public function getir($ilanId)
  {
      $files = array();
      $sonuclar=$this->db->where("ilanId",$ilanId)->get("pictures")->result();

      foreach ($sonuclar as $sonuc) {
        $files[]=$sonuc->name;
      }

        foreach ($files as &$file) {
          $file = array(
            'name' => $file,
            'size' => filesize($this->upload_path . "thumbnail/" . $file)
          );
        }
        //print $files;
      header("Content-type: text/json");
      header("Content-type: application/json");
      echo json_encode($files);
  }
}
