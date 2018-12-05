<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Home extends CI_Controller{
		private $user;
		private $magaza;
	  public function __construct()
	  {
	    parent::__construct();
	    $this->load->model('members');
			$this->load->model('kategoriler');
			$this->load->model('firmalar');
			$this->load->model('fields');
			$this->load->model('magazalar');
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
		public function index()
		{
			if ($this->user!=null) {
				$data["user"]=$this->user;
			}
			if ($this->magaza!=null) {
				$data["magaza"]=$this->magaza;
			}
			$data['title']='Emlak Meclisi | Anasayfa';
			$data['anaKategoriler']=$this->kategoriler->getAnaKategoriler();
			$data['mainVitrins']=$this->firmalar->getMainVitrins();
			$data['emergencyVitrins']=$this->firmalar->getEmegencyVitrins();
			$data['sonEklenenler']=$this->firmalar->getSonEklenenler();
			$data['magazaVitrin']=$this->firmalar->getMagazaVitrin();
			//$data['ayarlar'] = "Merhaba";
			//print_r($data['mainVitrins']);
			$this->load->driver("cache");
			$this->output->cache(1);
			$this->load->view('layout/home', $data);
		}
		public function sitemap($kategori=0,$seo_il="",$seo_ilce="")
		{
			if($kategori==0){
				header("Content-Type: text/xml;charset=iso-8859-1");
		    $this->load->view('sitemap/dizin');
			}elseif ($kategori=="kategori") {
				header("Content-Type: text/xml;charset=iso-8859-1");
		    $this->load->view('sitemap/kategori');
			}elseif ($kategori=="ilan") {
				header("Content-Type: text/xml;charset=iso-8859-1");
		    $this->load->view('sitemap/ilan');
			}else {
				$data["kategori"]=$this->kategoriler->getbyid($kategori);
				$kategorys=getustkategorys($kategori);
				$data["kategorys"]=$kategorys;
				$data["iller"]=$this->db->order_by("seo_il","ASC")->get("tbl_il")->result();
				if ($seo_il!="") {
					$il=$this->db->where("seo_il",$seo_il)->get("tbl_il")->row();
		      $data["il"]=$il;
					$data["ilceler"]=$this->db->where("il_id",$il->il_id)->order_by("seo_ilce","ASC")->get("tbl_ilce")->result();
					if ($seo_ilce!="") {
						$ilce=$this->db->where("il_id",$il->il_id)->where("seo_ilce",$seo_ilce)->get("tbl_ilce")->row();
		        $data["ilce"]=$ilce;
						$data["mahalleler"]=$this->db->where("ilce_id",$ilce->ilce_id)->order_by("seo_mahalle","ASC")->get("tbl_mahalle")->result();
					}
				}
				header("Content-Type: text/xml;charset=iso-8859-1");
		    $this->load->view('sitemap/konum',$data);
			}
		}

		public function ilan_goruntule($ilanId1)
		{
			$ilanId=decode($ilanId1);
			$ilan_kontrol=$this->firmalar->ilan_kontrol($ilanId);
			if (!$ilan_kontrol) {
				$this->session->set_flashdata('error', 'İlan Geçersiz veya Süresi Dolmuş.');
				redirect(base_url());
			}
			$ilan=$this->firmalar->get_ilan($ilanId);
			$edit = array("toplam_ziyaretci" => $ilan->toplam_ziyaretci+1);
			$this->firmalar->update($ilanId,$edit);
			$data["ilan"]=$ilan;
			$data["ilansahibi"]=$this->db->where("Id",$ilan->uyeId)->get("uyeler")->row();
			$ilanmagaza=$this->db->query("select * from magazalar where Id=(select magazaId from magaza_kullanicilari where uyeId=".$ilan->uyeId.")");
			if ($ilanmagaza->num_rows()>0) {
				$data["ilanmagaza"]=$ilanmagaza->row();
			}
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
					$show_additional_fields.='<div class="col-12 col-sm-6 col-md-3"><h4 class="mb-3">'.$field->name.'</h4>';
					if($show_ok[$field->name]!=1){
						$show_additional_fields.='<div class="row">';
					}
					for ($i = 0; $i <= count($new_values)-1; $i++) {
						//$show_additional_fields.='<div class="custom-control custom-checkbox col-6 col-md-3"';
						if (sorgula2($ilanId,$field->seo_name,$new_values[$i])) {
							$show_additional_fields.='<div class="col-12 custom-control custom-checkbox"';//yeni ekledim
							$show_additional_fields.=' style="background:url('.base_url().'assets/images/evet.png) no-repeat 0px -2px"';
							$show_additional_fields.='>&nbsp;'.$new_values[$i].'</div>';//yeni ekledim
						}
						//$show_additional_fields.='>&nbsp;'.$new_values[$i].'</div>';
					}
					if($show_ok[$field->name]!=1){
						$show_additional_fields.='</div></div>';
					}
					$show_ok[$field->name]="1";
					}elseif($field->type=='multiple_select'){
						// preview fields
						$change_value=get_details($ilanId,$field->seo_name);
						$change_value2=get_details($ilanId,$multiple_field_seo_name);
						$show_fields.='<div class="col-12 mar-bot"><div class="row"><div class="col-6 bilgibaslik">'.$field->name.'</div><div class="col-6 bilgiler">'.($change_value!=''?$change_value:'Belirtilmemiş').'</div></div></div>';
						$show_fields.='<div class="col-12 mar-bot"><div class="row"><div class="col-6 bilgibaslik">'.$field->multiple_field_name.'</div><div class="col-6 bilgiler">'.($change_value2!=''?$change_value2:'Belirtilmemiş').'</div></div></div>';
					}else{
						// preview fields
						$change_value=get_details($ilanId,$field->seo_name);
						$show_fields.='<div class="col-12 mar-bot"><div class="row"><div class="col-6 bilgibaslik">'.$field->name.'</div><div class="col-6 bilgiler">'.($change_value!=''?$change_value:'Belirtilmemiş').'</div></div></div>';
					}
			}

			$data["show_fields"]=$show_fields;
			$data["show_additional_fields"]=$show_additional_fields;
			$resimler=$this->db->where("ilanId",$ilanId)->get("pictures")->result();
			$data["resimler"]=$resimler;
			$where = array('Id' => $ilan->uyeId);
			if ($this->user!=null) {
				$data["user"]=$this->user;
			}
			if ($this->magaza!=null) {
				$data["magaza"]=$this->magaza;
				$data["magaza_var_mi"]=true;
			}
	    $title=mb_convert_case(mb_strtolower($ilan->firma_adi), MB_CASE_TITLE, "UTF-8")." | Ticaret Meclisi";

			$data["title"]=$title;
			$this->load->view('ilan_goruntule',$data);

		}
		public function magaza_goruntule($username,$anaKategori="",$subKategori="")
		{


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
			$uri_segment=1;
			$urlstring=$magaza->username;
			if ($anaKategori != "") {
				$anaKategori=decode($anaKategori);
				$uri_segment++;
				$urlstring.="/".$anaKategori;
			}
			if ($subKategori != "") {
				$subKategori=decode($subKategori);
				$uri_segment++;
				$urlstring.="/".$subKategori;
			}
			$magaza_ilanlari=$this->db->where("magazaId",$magaza->Id)->order_by("Id","DESC")->get("magaza_ilanlari")->result();
			$ilanlar = array();

			$say=0;
			foreach ($magaza_ilanlari as $magaza_ilan) {
				$this->db->where("Id",$magaza_ilan->ilanId);
				if ($anaKategori != "") {
					$this->db->where("kategoriId",$anaKategori);
				}
				if ($subKategori != "") {
					$this->db->where("kategori2",$subKategori);
				}
				$ilan=$this->db->get("firmalar");
				if ($ilan->num_rows() > 0) {
						$say++;
				}
			}
			$this->load->library("pagination");
			$config["total_rows"] = $say;
			$config["uri_segment"] = $uri_segment;
			$page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
			$config["per_page"] = 24;
			$config["num_links"] = 10;
			$config["base_url"] = base_url($urlstring);
			$i=1;
			foreach ($magaza_ilanlari as $magaza_ilan) {
				$this->db->where("Id",$magaza_ilan->ilanId);
				if ($anaKategori != "") {
					$this->db->where("kategoriId",$anaKategori);
				}
				if ($subKategori != "") {
					$this->db->where("kategori2",$subKategori);
				}
				$ilan=$this->db->get("firmalar");
				if ($ilan->num_rows() > 0 && $i > $page && ($i <= $page + $config["per_page"])) {
						$ilanlar[]=$ilan->row();
						$i++;
				}
			}
			$this->pagination->initialize($config);
			$data["links"] = $this->pagination->create_links();
			$data["ilanlar"]=$ilanlar;
			$kategori=$this->kategoriler->getbyid($magaza->kategoriId);
			$altKategoriler=$this->kategoriler->getSubs($magaza->kategoriId);
			$data["kategori"]=$kategori;
			$data["altKategoriler"]=$altKategoriler;
			$data['anaKategoriler']=$this->kategoriler->getAnaKategoriler();
			$data["user"]=$this->user;
			$this->load->view("magaza",$data);
		}
		public function ara()
		{
			$this->load->library("pagination");
			$uri_segment=3;
			$limit=40;
			$page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
			$config["per_page"] = $limit;
			$search=$this->security->xss_clean($this->input->post("search"));
			$this->db->like('firma_adi', $search);
			$this->db->or_like('ilanId', $search);
			$config["total_rows"] = $this->db->get('firmalar')->num_rows();
			$this->db->like('firma_adi', $search);
			$this->db->or_like('ilanId', $search);
			$this->db->order_by('kayit_tarihi', 'DESC');
			$this->db->limit($limit, $page);
			$ilanlar=$this->db->get('firmalar')->result();
			$data["ilanlar"]=$ilanlar;
			$config["uri_segment"] = $uri_segment;
			$config["num_links"] = 25;
			$config["base_url"] = base_url("home/ara");
			//$config["total_rows"] = count($ilanlar);
			$this->pagination->initialize($config);
			$data["links"] = $this->pagination->create_links();
			$this->load->view("ara",$data);
		}
}
