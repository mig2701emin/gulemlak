<?php

class Ajax extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //Sadece AJAX işlemi için kullanılmasını sağlıyoruz..
        if ( false == $this->input->is_ajax_request() )
        {
            log_message('error', 'Geçersiz Ajax Erişimi : '. date('d-m-Y H:i:s').' tarihinde '. $this->input->ip_address() .' adresinden gerçekleşti');
            die('Yetkisiz İşlem');
        }
        $this->load->model('kategoriler');
    }

    public function get_ilceler()
    {
        //ajaxta post ile gelen il id'si
        $il_id = $this->input->post('il_id');

        if ( empty($il_id) )
        {
            $data = array('status' => 'error', 'message' => 'İl ID Bilgisi Alınamadı..!');
        }
        else
        {
            //ile göre ilçeler çekiliyor...
            //$ilceler = $this->db->where('il_id', $il_id)->orber_by('ilce_ad', 'ASC')->get('tbl_ilce');
            $this->db->where("il_id",$il_id);
            $this->db->order_by("ilce_ad","ASC");
            $ilceler=$this->db->get("tbl_ilce");

            if ( $ilceler->num_rows() > 0 )
            {
                $ilceList = array();
                foreach ($ilceler->result() as $item) {
                    $ilceList[] = array('ilce_id' => $item->ilce_id, 'ilce_ad' => $item->ilce_ad);
                }

                //var olan iller data keyine aktarılıyor...
                $data = array('status' => 'ok', 'message' => '', 'data' => $ilceList);

            }
            else
            {
                $data = array('status' => 'error', 'message' => 'İlçe Bulunamadı..!');
            }

        }

        //çıktıyı jsona uygun bir yapıda set ediyoruz...
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
        //echo json_encode($data);
    }

    public function get_mahalleler()
    {
        //ajaxta post ile gelen ilce id'si
        $ilce_id = $this->input->post('ilce_id');

        if ( empty($ilce_id) )
        {
            $data = array('status' => 'error', 'message' => 'İlçe ID Bilgisi Alınamadı..!');
        }
        else
        {
            //ilçeye göre mahalleler çekiliyor...
            //$mahalleler = $this->db->where('ilce_id', $ilce_id)->orber_by('mahalle_ad','ASC')->get('tbl_mahalle');
            $this->db->where("ilce_id",$ilce_id);
            $this->db->order_by("mahalle_ad","ASC");
            $mahalleler=$this->db->get("tbl_mahalle");
            if ( $mahalleler->num_rows() > 0 )
            {
                $mahalleList = array();
                foreach ($mahalleler->result() as $item) {
                    $mahalleList[] = array('mahalle_id' => $item->mahalle_id, 'mahalle_ad' => $item->mahalle_ad);
                }

                //var olan mahalleler data keyine aktarılıyor...
                $data = array('status' => 'ok', 'message' => '', 'data' => $mahalleList);

            }
            else
            {
                $data = array('status' => 'error', 'message' => 'İlçe Bulunamadı..!');
            }

        }

        //çıktıyı jsona uygun bir yapıda set ediyoruz...
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
        //echo json_encode($data);
    }

    public function altkategoriler()
    {

      $Id=$this->input->post("Id");
      $json = array();
      if ($Id==0) {
        $ust_kategori = array('ust_kategori' => -1);
        $json[]=$ust_kategori;
        $altKategoriler=$this->kategoriler->getAnaArray();
        $json[]=$altKategoriler;
      } else {
        $altKategoriler=$this->kategoriler->getSubsArray($Id);
        if ($altKategoriler == null) {
          $ust_kategori=$this->kategoriler->getbyid($Id);
          $json[]=$ust_kategori;
          $userID=$this->session->userdata("userData")["userID"];
          $kategorys=getustkategorys($Id);
          $max_ilan_kontrol=max_ilan_kontrol($userID,$kategorys[0]->Id);
          if($max_ilan_kontrol){
            $json[]="overthemax";
          }else {
            $json[]="completed";
            $this->session->set_userdata("kategori",$Id);
            $json[]=getustkategorinames($Id);
          }
        } else {
          $ust_kategori=$this->kategoriler->getbyid($Id);
          $json[]=$ust_kategori;
          $json[]=$altKategoriler;
        }
      }
        echo json_encode($json);
    }
}
