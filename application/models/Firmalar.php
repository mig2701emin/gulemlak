<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Firmalar extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getMainVitrins()
  {
    $bugun = date("Y-m-d");
    $this->db->select('gvitrin.*,firmalar.*');
    $this->db->where('gvitrin.bitis_tarihi >=',$bugun);
    $this->db->where('firmalar.onay','1');
    $this->db->order_by('Id','RANDOM');
    //$this->db->limit('12');
    $this->db->from('gvitrin');
    $this->db->join('firmalar','firmalar.Id=gvitrin.firmaId');
    $query = $this->db->get();
    return $query->result();
	//$sql = $this->db->query("SELECT gvitrin.*,firmalar.Id,firmalar.firma_adi,firmalar.seo_url,firmalar.resim1 FROM gvitrin join firmalar on gvitrin.firmaId=firmalar.Id WHERE (gvitrin.bitis_tarihi >= $bugun) and firmalar.onay='1' ORDER BY rand() LIMIT 23")->result();
  }

  public function getEmegencyVitrins()
  {
    $bugun = date("Y-m-d");
    $this->db->select('acilacilvitrin.*,firmalar.*');
    $this->db->where('acilacilvitrin.bitis_tarihi >=',$bugun);
    $this->db->where('firmalar.onay','1');
    $this->db->order_by('Id','RANDOM');
    //$this->db->limit('12');
    $this->db->from('acilacilvitrin');
    $this->db->join('firmalar','firmalar.Id=acilacilvitrin.ilanId');
    $query = $this->db->get();
    return $query->result();
  }

  public function getSonEklenenler()
  {
    $this->db->select('*');
    $this->db->where('onay','1');
    $this->db->order_by('kayit_tarihi','DESC');
    $this->db->limit('18');
    $this->db->from('firmalar');
    $query = $this->db->get();
    return $query->result();

  }

  public function getMagazaVitrin()
  {
    $bugun = date("Y-m-d");
    $this->db->select('mvitrin.*,magazalar.*');
    $this->db->where('mvitrin.bitis_tarihi >=',$bugun);
    $this->db->where('magazalar.onay','1');
    $this->db->order_by('Id','RANDOM');
    //$this->db->limit('12');
    $this->db->from('mvitrin');
    $this->db->join('magazalar','magazalar.Id=mvitrin.magazaId');
    $query = $this->db->get();
    return $query->result();
  }

  public function konut_ilanlari($key1,$val1,$key2,$val2,$key3,$val3,$key4,$val4,$key5,$val5,$key6,$val6,$key7,$val7)
  {
    $where=$arrayName = array(
      $key1 => $val1,
      $key2 => $val2,
      $key3 => $val3,
      $key4 => $val4,
      $key5 => $val5,
      $key6 => $val6,
      $key7 => $val7,
      "onay" => "1",
      "suresi_doldu" => "0"
   );
    $this->db->where($where);
    $query = $this->db->get('firmalar');
    return $query->result();


  }

  public function is_arsa_ilanlari($key1,$val1,$key2,$val2,$key3,$val3,$key4,$val4,$key5,$val5,$key6,$val6)
  {
    $where=$arrayName = array(
      $key1  => $val1,
      $key2  => $val2,
      $key3  => $val3,
      $key4  => $val4,
      $key5  => $val5,
      $key6  => $val6,
      "onay" => "1",
      "suresi_doldu" => "0"
   );
    $this->db->where($where);
    $query = $this->db->get('firmalar');
    return $query->result();


  }

  public function iller(){
		$query = $this->db->get('tbl_il');
		return $query->result();
	}
  public function ilcelerbyIl($il_id){
		$query = $this->db->where("il_id",$il_id)->get('tbl_ilce');
		return $query->result();
	}
  public function mahallelerbyIlce($ilce_id){
		$query = $this->db->where("ilce_id",$ilce_id)->get('tbl_mahalle');
		return $query->result();
	}

  public function add($string){
		$insert = $this->db->insert('firmalar', $string);
		if(!$insert){ return false; }else{ return true; }
	}
  public function get_ilan($ilanId)
  {
    $query=$this->db->where("Id",$ilanId)->get("firmalar");
    if ($query->num_rows()>0) {
      return $query->row();
    }
  }
  public function ilan_kontrol($ilanId,$uyeId="")
  {

    $this->db->where("Id",$ilanId);
    if ($uyeId!="") {
      $this->db->where("uyeId",$uyeId);
    }
    $query=$this->db->get("firmalar");
    if ($query->num_rows()>0) {
      return true;
    }else {
      return false;
    }

  }
  public function update($ilanId,$update)
  {
    $this->db->where("Id",$ilanId);
    $query=$this->db->update("firmalar",$update);
    if ($query) {
      return true;
    } else {
      return false;
    }

  }
  public function gets()
  {
    $this->db->where("onay","1");
    $query=$this->db->get("firmalar");
    return $query->result();
  }
  public function getByKategori($anaKategoriId,$altKategoriId="")
  {
    $this->db->where("onay","1");
    $this->db->where("kategoriId",$anaKategoriId);
    if ($altKategoriId!="") {
      $this->db->where("kategori2",$altKategoriId);
    }
    $query=$this->db->get("firmalar");
    return $query->result();
  }
  public function getWhere($where)
  {
    $this->db->where($where);
    $query=$this->db->get("firmalar");
    return $query;
  }
}
