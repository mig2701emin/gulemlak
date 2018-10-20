<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller{

	  public function __construct()
	  {
	    parent::__construct();
	    $this->load->model('members');
			$this->load->model('kategoriler');
			$this->load->model('firmalar');
			$this->load->model('fields');
			$this->load->model('magazalar');
		}

		public function index()
		{


			$data['title']='Emlak Meclisi | Anasayfa';
			$data['anaKategoriler']=$this->kategoriler->getAnaKategoriler();
			$data['mainVitrins']=$this->firmalar->getMainVitrins();
			$data['emergencyVitrins']=$this->firmalar->getEmegencyVitrins();
			$data['sonEklenenler']=$this->firmalar->getSonEklenenler();
			$data['magazaVitrin']=$this->firmalar->getMagazaVitrin();
			//$data['ayarlar'] = "Merhaba";
			//print_r($data['mainVitrins']);
			$this->load->view('layout/home', $data);
		}


		public function detay()
		{
			$data['title']='Emlak Meclisi | Detay';
			$data['ayarlar'] = "Merhaba";
			$this->load->view('projeler/detay2', $data);
		}
		public function deneme()
		{
			$data['title']='Emlak Meclisi | Deneme';
			$data['ayarlar'] = "Merhaba";
			$this->load->view('projeler/deneme', $data);
		}

		public function liste()
		{
			$data['title']='Emlak Meclisi | Liste';
			$data['ayarlar'] = "Merhaba";
			$this->load->view('projeler/liste', $data);
		}

		public function ilan_goruntule($ilanId)
		{
			$ilan_kontrol=$this->firmalar->ilan_kontrol($ilanId);
			if (!$ilan_kontrol) {
				$this->session->set_flashdata('error', 'İlan Geçersiz veya Süresi Dolmuş.');
				redirect(base_url());
			}
			$ilan=$this->firmalar->get_ilan($ilanId);
			$data["ilan"]=$ilan;
			$show_fields="";
			$show_additional_fields="";
			//$fieldCallType="";
			$kategori=max(
				$ilan->kategoriId,
				$ilan->kategori2,
				$ilan->kategori3,
				$ilan->kategori4,
				$ilan->kategori5,
				$ilan->kategori6,
				$ilan->kategori7,
				$ilan->kategori8
			);
			$kategorys=getustkategorys($kategori);
			$kategorinames=getustkategorinames($kategori);
			$data["kategorinames"]=$kategorinames;
			for ($i=0; $i < 9 ; $i++) {
				if ($i == 0) {
					$field_kategori=$kategorys[0]->Id;
					$i++;
				} elseif(isset($kategorys[$i-1])){
					$yeni="field_kategori".$i;
					$$yeni=$kategorys[$i-1]->Id;
				}else {
					$yeni="field_kategori".$i;
					$$yeni="";
				}
			}

			$sql="select * from fields where ((kategori='".$field_kategori."' and kategori2='0')";
			if ($field_kategori2!="") {
				$sql.=" or (kategori2='".$field_kategori2."' and kategori3='0')";
			}
			if ($field_kategori3!="") {
				$sql.=" or (kategori3='".$field_kategori3."' and kategori4='0')";
			}
			if ($field_kategori4!="") {
				$sql.=" or (kategori4='".$field_kategori4."' and kategori5='0')";
			}
			if ($field_kategori5!="") {
				$sql.=" or (kategori5='".$field_kategori5."' and kategori6='0')";
			}
			if ($field_kategori6!="") {
				$sql.=" or (kategori6='".$field_kategori6."' and kategori7='0')";
			}
			if ($field_kategori7!="") {
				$sql.=" or (kategori7='".$field_kategori7."' and kategori8='0')";
			}
			if ($field_kategori8!="") {
				$sql.=" or (kategori8='".$field_kategori8."')";
			}
			$sql.=") order by siralama";

			$fields = $this->fields->getfields($sql);
			//$data["kategorys"]=$kategorys;
			$data["fields"]=$fields;

			foreach ($fields as $field) {
				if($field->type=='checkbox'){
					// preview checkbox
					$show_ok[$field->name]=0;
					$check_values=get_details($ilanId,$field->seo_name);
					$explode_check=explode("||",$check_values);
					$new_values=explode("||",$field->field_values);
					$show_additional_fields.='<div class="col-12"><h4 class="mb-3">'.$field->name.'</h4>';
					if($show_ok[$field->name]!=1){
						$show_additional_fields.='<div class="row">';
					}
					for ($i = 0; $i <= count($new_values)-1; $i++) {
						$show_additional_fields.='<div class="custom-control custom-checkbox col-6 col-md-3"';
						if (sorgula2($ilanId,$field->seo_name,$new_values[$i])) {
							$show_additional_fields.=' style="background:url('.base_url().'assets/images/evet.png) no-repeat 0px -2px"';
						}
						$show_additional_fields.='>&nbsp;'.$new_values[$i].'</div>';
					}
					if($show_ok[$field->name]!=1){
						$show_additional_fields.='</div><hr class="mt-4"/></div>';
					}
					$show_ok[$field->name]="1";
					}elseif($field->type=='multiple_select'){
						// preview fields
						$change_value=get_details($ilanId,$field->seo_name);
						$change_value2=get_details($ilanId,$multiple_field_seo_name);
						$show_fields.='<div class="col-12 mar-bot">'.$field->name.':&nbsp;'.($change_value!=''?$change_value:'Belirtilmemiş').'</div>';
						$show_fields.='<div class="col-12 mar-bot">'.$field->multiple_field_name.':&nbsp;'.($change_value2!=''?$change_value2:'Belirtilmemiş').'</div>';
					}else{
						// preview fields
						$change_value=get_details($ilanId,$field->seo_name);
						$show_fields.='<div class="col-12 mar-bot">'.$field->name.':&nbsp;'.($change_value!=''?$change_value:'Belirtilmemiş').'</div>';
					}
			}

			$data["show_fields"]=$show_fields;
			$data["show_additional_fields"]=$show_additional_fields;
			$resimler=$this->db->where("ilanId",$ilanId)->get("pictures")->result();
			$data["resimler"]=$resimler;
			$where = array('Id' => $ilan->uyeId);
			$user=$this->members->get($where);
			$data["user"]=$user;
			$magaza_var_mi=magaza_var_mi($user->Id);
			$data["magaza_var_mi"]=$magaza_var_mi;
			if ($magaza_var_mi) {
				$magazaId=$this->magazalar->getMagazaId($user->Id);
				$data["magaza"]=$this->magazalar->getMagaza($magazaId);
			}
			$this->load->view('projeler/ilan_goruntule',$data);

		}
		public function magaza_goruntule($username,$anaKategori="",$subKategori="")
		{
			if ($subKategori != "") {
				$subKategori=decode($subKategori);
			}
			if ($anaKategori != "") {
				$anaKategori=decode($anaKategori);
			}
			$query=$this->db->where("username",$username)->get("magazalar");
			if ($query->num_rows() > 0) {
				$magaza=$query->row();
				$data["magaza"]=$magaza;
			} else {
				$this->session->set_flashdata('error', '<div id="warning_box" title="Sayın Kullanıcımız,">
			<div class="warning_content">
			<h3>Mağazanızın süresi dolmuş veya site yönetimi tarafından kapatılmış olabilir.</h3>
			<ul class="premiumAd_info">
			<li>Mağaza süresini uzatmak ve/veya tekrar açmak için lütfen Site Yönetimiyle irtibata geçiniz...</li>
			</ul>');
			//redirect(base_url("hesabim/anasayfa"));
			}
			$magaza_ilanlari=$this->db->where("magazaId",$magaza->Id)->get("magaza_ilanlari")->result();
			//$data["user"]=$this->user;
			$ilanlar = array();
			foreach ($magaza_ilanlari as $magaza_ilan) {
			$this->db->where("Id",$magaza_ilan->ilanId);
			if ($anaKategori != "") {
				$this->db->where("kategoriId",$anaKategori);
			}
			if ($subKategori != "") {
				$this->db->where("kategori2",$subKategori);
			}
			$ilan=$this->db->get("firmalar")->row();
			$ilanlar[]=$ilan;
			}
			$data["ilanlar"]=$ilanlar;
			$kategori=$this->kategoriler->getbyid($magaza->kategoriId);
			$altKategoriler=$this->kategoriler->getSubs($magaza->kategoriId);
			$data["kategori"]=$kategori;
			$data["altKategoriler"]=$altKategoriler;
			$this->load->view("magaza",$data);
		}
		public function kategori($kategori,$deneme="")
		{
			$kategorys=getustkategorys($kategori);
			$data["kategorys"]=$kategorys;
			for ($i=0; $i < 9 ; $i++) {
        if ($i == 0) {
          $field_kategori=$kategorys[0]->Id;
          $i++;


        } elseif(isset($kategorys[$i-1])){
          $yeni="field_kategori".$i;
          $$yeni=$kategorys[$i-1]->Id;
        }else {
          $yeni="field_kategori".$i;
          $$yeni="";
        }
      }
      $sql="select * from fields where ((kategori='".$field_kategori."' and kategori2='0')";
      if ($field_kategori2!="") {
        $sql.=" or (kategori2='".$field_kategori2."' and kategori3='0')";
      }
      if ($field_kategori3!="") {
        $sql.=" or (kategori3='".$field_kategori3."' and kategori4='0')";
      }
      if ($field_kategori4!="") {
        $sql.=" or (kategori4='".$field_kategori4."' and kategori5='0')";
      }
      if ($field_kategori5!="") {
        $sql.=" or (kategori5='".$field_kategori5."' and kategori6='0')";
      }
      if ($field_kategori6!="") {
        $sql.=" or (kategori6='".$field_kategori6."' and kategori7='0')";
      }
      if ($field_kategori7!="") {
        $sql.=" or (kategori7='".$field_kategori7."' and kategori8='0')";
      }
      if ($field_kategori8!="") {
        $sql.=" or (kategori8='".$field_kategori8."')";
      }
      $sql.=") order by siralama";

      $fields = $this->fields->getfields($sql);
      //fieldlerin getirilmesi bitiş
      $data["fields"]=$fields;

			$sql2="select * from firmalar where kategori='".$field_kategori."'";
      if ($field_kategori2!="") {
        $sql2.=" and kategori2='".$field_kategori2."'";
      }
      if ($field_kategori3!="") {
				$sql.=" and kategori3='".$field_kategori3."'";
      }
      if ($field_kategori4!="") {
				$sql2.=" and kategori4='".$field_kategori4."'";
      }
      if ($field_kategori5!="") {
				$sql2.=" and kategori5='".$field_kategori5."'";
      }
      if ($field_kategori6!="") {
				$sql2.=" and kategori6='".$field_kategori6."'";
      }
      if ($field_kategori7!="") {
				$sql2.=" and kategori7='".$field_kategori7."'";
      }
      if ($field_kategori8!="") {
				$sql2.=" and kategori8='".$field_kategori8."'";
      }
      $sql2.=" and onay='1' order by kayit_tarihi desc ";

      $ilanlar = $this->db->query($sql2);
			$ilanlar["ilanlar"]=$ilanlar;
			$data["kategori"]=$this->kategoriler->getbyid($kategori);
			$data["altKategoriler"]=$this->kategoriler->getSubs($kategori);
			$data["iller"]=$this->db->get("tbl_il")->result();
			$data["search"]="";
			$data["sehir"]="";
			$data["ilan_tarihi"]="";
			$data["fotograf"]="";
			$data["harita"]="";
			$data["WithFilter_g"]="";


			$this->load->view("kategori",$data);
		}








}
