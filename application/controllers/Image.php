<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $upload_path="uploads/foldername/";
        $newFileName = explode(".",$_FILES['image']['name']);
        $filename = time()."-".rand(00,99).".".end($newFileName);
        $filename_new = time()."-".rand(00,99)."_new.".end($filename);
        $config['file_name'] = $filename;
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image'))
        {
        //Image Resizing
        $config1['source_image'] = $this->upload->upload_path.$this->upload->file_name;
        $config1['new_image'] =  'uploads/foldername/'.$filename_new;
        $config1['maintain_ratio'] = FALSE;
        $config1['width'] = 181;
        $config1['height'] = 181;
        $this->load->library('image_lib', $config1);
        if ( ! $this->image_lib->resize()){
        $this->session->set_flashdata('message', $this->image_lib->display_errors('', ''));

        }
        $post_data['image'] = $filename;
        }
        else
        {
        $this->session->set_flashdata('msg',$this->upload->display_errors());
        }
    }
  }

  public function resize_image($image_data){
    $this->load->library('image_lib');
    $w = $image_data['image_width']; // original image's width
    $h = $image_data['image_height']; // original images's height

    $n_w = 273; // destination image's width
    $n_h = 246; // destination image's height

    $source_ratio = $w / $h;
    $new_ratio = $n_w / $n_h;
    if($source_ratio != $new_ratio){

        $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/uploaded_image.jpg';
        $config['maintain_ratio'] = FALSE;
        if($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1))){
            $config['width'] = $w;
            $config['height'] = round($w/$new_ratio);
            $config['y_axis'] = round(($h - $config['height'])/2);
            $config['x_axis'] = 0;

        } else {

            $config['width'] = round($h * $new_ratio);
            $config['height'] = $h;
            $size_config['x_axis'] = round(($w - $config['width'])/2);
            $size_config['y_axis'] = 0;

        }

        $this->image_lib->initialize($config);
        $this->image_lib->crop();
        $this->image_lib->clear();
    }
    $config['image_library'] = 'gd2';
    $config['source_image'] = './uploads/uploaded_image.jpg';
    $config['new_image'] = './uploads/new/resized_image.jpg';
    $config['maintain_ratio'] = TRUE;
    $config['width'] = $n_w;
    $config['height'] = $n_h;
    $this->image_lib->initialize($config);

    if (!$this->image_lib->resize()){

        echo $this->image_lib->display_errors();

    } else {

        echo "done";

    }
  }

}
