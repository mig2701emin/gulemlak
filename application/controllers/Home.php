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
			$edit = array("toplam_ziyaretci" => $ilan->toplam_ziyaretci+1);
			$this->firmalar->update($ilanId,$edit);
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
					$show_additional_fields.='<div class="col-12 col-sm-6 col-md-3 col-lg-2"><h4 class="mb-3">'.$field->name.'</h4>';
					if($show_ok[$field->name]!=1){
						$show_additional_fields.='<div class="row">';
					}
					for ($i = 0; $i <= count($new_values)-1; $i++) {
						//$show_additional_fields.='<div class="custom-control custom-checkbox col-6 col-md-3"';
						if (sorgula2($ilanId,$field->seo_name,$new_values[$i])) {
							$show_additional_fields.='<div class="custom-control custom-checkbox"';//yeni ekledim
							$show_additional_fields.=' style="background:url('.base_url().'assets/images/evet.png) no-repeat 0px -2px"';
							$show_additional_fields.='>&nbsp;'.$new_values[$i].'</div>';//yeni ekledim
						}
						//$show_additional_fields.='>&nbsp;'.$new_values[$i].'</div>';
					}
					if($show_ok[$field->name]!=1){
						$show_additional_fields.='</div><hr class="mt-4"/></div>';
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
			$user=$this->members->get($where);
			$data["user"]=$user;
			$magaza_var_mi=magaza_var_mi($user->Id);
			$data["magaza_var_mi"]=$magaza_var_mi;
			if ($magaza_var_mi) {
				$magazaId=$this->magazalar->getMagazaId($user->Id);
				$data["magaza"]=$this->magazalar->getMagaza($magazaId);
			}

	    $title=mb_convert_case(mb_strtolower($ilan->firma_adi), MB_CASE_TITLE, "UTF-8")." | Ticaret Meclisi";

			$data["title"]=$title;
			$this->load->view('projeler/ilan_goruntule',$data);

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
			$this->load->view("magaza",$data);
		}


		public function kategori($kat)
		{
			$kategori=decode($kat);
			$this->load->library("pagination");
			$ek="";
			$order="";
			$kategorys=getustkategorys($kategori);
			$urlstring="";
			$uri_segment=0;
			$data["kategorys"]=$kategorys;
			for ($i=0; $i < 9 ; $i++) {
				if ($i == 0) {
					$field_kategori=$kategorys[0]->Id;
					$i++;
					$urlstring=$kategorys[0]->seo;
					$uri_segment=$i+2;
				} elseif(isset($kategorys[$i-1])){
					$yeni="field_kategori".$i;
					$$yeni=$kategorys[$i-1]->Id;
					$urlstring.="/".$kategorys[$i-1]->seo;
					$uri_segment=$i+2;
				}else {
					$yeni="field_kategori".$i;
					$$yeni="";
				}
			}
			$urlstring.="/".$kat;
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

			$sql2="select firmalar.* from firmalar left join custom_fields ON custom_fields.ilanId=firmalar.Id where firmalar.kategoriId='".$field_kategori."'";
			if ($field_kategori2!="") {
				$sql2.=" and firmalar.kategori2='".$field_kategori2."'";
			}
			if ($field_kategori3!="") {
				$sql2.=" and firmalar.kategori3='".$field_kategori3."'";
			}
			if ($field_kategori4!="") {
				$sql2.=" and firmalar.kategori4='".$field_kategori4."'";
			}
			if ($field_kategori5!="") {
				$sql2.=" and firmalar.kategori5='".$field_kategori5."'";
			}
			if ($field_kategori6!="") {
				$sql2.=" and firmalar.kategori6='".$field_kategori6."'";
			}
			if ($field_kategori7!="") {
				$sql2.=" and firmalar.kategori7='".$field_kategori7."'";
			}
			if ($field_kategori8!="") {
				$sql2.=" and firmalar.kategori8='".$field_kategori8."'";
			}

				$add_query_to_sql="";
				$order_type=$this->security->xss_clean($this->input->post("order_type"));
				if($order_type=='descdate'){
					$order="firmalar.kayit_tarihi DESC";
				}elseif($order_type=='ascdate'){
					$order="firmalar.kayit_tarihi ASC";
				}elseif($order_type=='descprice'){
					$order="firmalar.fiyat DESC";
				}elseif($order_type=='ascprice'){
					$order="firmalar.fiyat ASC";
				}elseif($order_type=='city'){
					$order="firmalar.il ASC";
				}else{
					$order="firmalar.kayit_tarihi DESC";
				}
				$data["order_type"]=$order_type;

				$limit_get=$this->security->xss_clean($this->input->post("limit"));
				if($limit_get<=50 and $limit_get>=10 and !empty($limit_get)){
					$limit=$limit_get;
				}elseif(empty($limit)){
					$limit=40;
				}
				$data["limit"]=$limit;
				if(isset($_POST) && !empty($_POST)){
					$field_values = array();
					$field_posted_data=array();
					$getirilen = array();

					$sehir=$this->security->xss_clean($this->input->post("sehir"));
					$data["sehir"]=$sehir;
					if(!empty($sehir) and is_numeric($sehir)){
						$add_query_to_sql.=" and firmalar.il='".$sehir."'";
					}
					$ilce=$this->security->xss_clean($this->input->post("ilce"));
					$data["ilce"]=$ilce;
					if(!empty($ilce) and is_numeric($ilce)){
						$add_query_to_sql.=" and firmalar.ilce='".$ilce."'";
					}
					$mahalle=$this->security->xss_clean($this->input->post("mahalle"));
					$data["mahalle"]=$mahalle;
					if(!empty($mahalle) and is_numeric($mahalle)){
						$add_query_to_sql.=" and firmalar.mahalle='".$mahalle."'";
					}
					$fotograf=$this->security->xss_clean($this->input->post("fotograf"));
					$data["fotograf"]=$fotograf;
					/*if(!empty($fotograf) and is_numeric($fotograf)){
						$add_query_to_sql.=" and firmalar.resim1!=''";
					}*/
					$harita=$this->security->xss_clean($this->input->post("harita"));
					$data["harita"]=$harita;
					if(!empty($harita) and is_numeric($harita)){
						$add_query_to_sql.=" and firmalar.harita!=''";
					}
					$fiyat_1=$this->security->xss_clean($this->input->post("fiyat_1"));
					$data["fiyat_1"]=$fiyat_1;
					$fiyat_2=$this->security->xss_clean($this->input->post("fiyat_2"));
					$data["fiyat_2"]=$fiyat_2;
					if(!empty($fiyat_1) and !empty($fiyat_2)){
						$add_query_to_sql.=" and (firmalar.fiyat BETWEEN ".$fiyat_1." and ".$fiyat_2.")";
					}
					$ilan_tarihi=$this->security->xss_clean(base64_decode($this->input->post("ilan_tarihi")));
					$data["ilan_tarihi"]=$ilan_tarihi;
					$current_date = date("Y-m-d");
					if($ilan_tarihi=='Son 24 Saat'){
						$date_filter = date('Y-m-d',strtotime('-1 day',strtotime($current_date)));
						$add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
					}elseif($ilan_tarihi=='Son 3 Gün'){
						$date_filter = date('Y-m-d',strtotime('-3 day',strtotime($current_date)));
						$add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
					}elseif($ilan_tarihi=='Son 7 Gün'){
						$date_filter = date('Y-m-d',strtotime('-7 day',strtotime($current_date)));
						$add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
					}elseif($ilan_tarihi=='Son 15 Gün'){
						$date_filter = date('Y-m-d',strtotime('-15 day',strtotime($current_date)));
						$add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
					}elseif($ilan_tarihi=='Son 30 Gün'){
						$date_filter = date('Y-m-d',strtotime('-30 day',strtotime($current_date)));
						$add_query_to_sql.=" and firmalar.kayit_tarihi between '".$date_filter."' and '".$current_date."'";
					}

					foreach ($fields as $field) {
						if($field->type=='text'){
							if($field->aralik=='1'){
								$field_posted_data[$field->seo_name."_1"]=$this->security->xss_clean($this->input->post($field->seo_name."_1"));
								$field_posted_data[$field->seo_name."_2"]=$this->security->xss_clean($this->input->post($field->seo_name."_2"));
								if(!empty($field_posted_data[$field->seo_name."_1"]) and !empty($field_posted_data[$field->seo_name."_2"]) and is_numeric($field_posted_data[$field->seo_name."_1"]) and is_numeric($field_posted_data[$field->seo_name."_2"])){
									$field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."' and custom_fields.field_value BETWEEN '".$field_posted_data[$field->seo_name."_1"]."' and '".$field_posted_data[$field->seo_name."_2"]."')";
									$getirilen[$field->seo_name."_1"]=$field_posted_data[$field->seo_name."_1"];
									$getirilen[$field->seo_name."_2"]=$field_posted_data[$field->seo_name."_2"];
								}
							}else{
								$field_posted_data[$field->seo_name]=$this->input->post($field->seo_name);
								if(!empty($field_posted_data[$field->seo_name])){
									$field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."' and custom_fields.field_value='".$field_posted_data[$field->seo_name]."')";
									$getirilen[$field->seo_name]=$field_posted_data[$field->seo_name];
								}
							}
						}elseif($field->type=='select' or $field->type=='radio'){
							if (!empty($this->input->post($field->seo_name))) {
								$field_posted_data[$field->seo_name]=implode("','",array_map("base64_decode",$this->input->post($field->seo_name)));
								if(!empty($field_posted_data[$field->seo_name])){
									$field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."' and custom_fields.field_value In ('".$field_posted_data[$field->seo_name]."'))";
									//if($field->multiple==1){
									//	$getirilen[$field->seo_name] = array($field_posted_data[$field->seo_name]);
									//}else{
										$getirilen[$field->seo_name]=$this->input->post($field->seo_name);
									//}
								}
							}
						}elseif($field->type=='checkbox'){
							if (!empty($this->input->post($field->seo_name))) {
								$field_posted_data[$field->seo_name]=array_map("base64_decode",$this->input->post($field->seo_name));
								$field_search_v="";
								for ($i = 0; $i <= count($field_posted_data[$field->seo_name])-1; $i++) {
									$field_search_v.=" and find_in_set ('".str_replace('\'','',$field_posted_data[$field->seo_name][$i])."',replace(custom_fields.field_value,', ',','))";
								}
								if(!empty($field_posted_data[$field->seo_name])){
									$field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."'".$field_search_v.")";
									$getirilen[$field->seo_name]=array($this->input->post($field->seo_name));
								}
							}
						}elseif($field->type=='multiple_select'){
							$field_posted_data[$field->seo_name]=$this->input->post($field->seo_name);
							$field_posted_data2[$field->multiple_field_seo_name]=implode("','",array_map('base64_decode',$this->input->post($field->multiple_field_seo_name)));
							if(!empty($field_posted_data[$field->seo_name]) and !empty($field_posted_data2[$field->multiple_field_seo_name])){
								$field_values[$field->seo_name]=" and EXISTS(select * from custom_fields where custom_fields.ilanId=firmalar.Id and custom_fields.field_name='".$field->seo_name."' and custom_fields.field_value='".$field_posted_data[$field->seo_name]."' and custom_fields.field_name='".$field->multiple_field_seo_name."' and custom_fields.field_value In ('".$field_posted_data2[$field->multiple_field_seo_name]."'))";
								$getirilen[$field->seo_name]=array($this->input->post($field->seo_name));
							}
						}
					}
					foreach ($field_values as $field_name => $field_value) {
						if(!empty($field_value)){
							$add_query_to_sql.=$field_value;
						}
					}
					$data["field_posted_data"]=$getirilen;


				}

				$WithFilter_g=$this->security->xss_clean(base64_decode($this->input->get('WithFilter')));
				$data["WithFilter_g"]=$WithFilter_g;
				if(!empty($WithFilter_g)){
					$explode_filter=explode("**",$WithFilter_g);
					$ek=" and custom_fields.field_name='".$explode_filter[0]."' and custom_fields.field_value='".$explode_filter[1]."'";
				}else{
					$ek="";
				}
				// fields başlangıç
				// fields sonu
			$config["uri_segment"] = $uri_segment;
			$page = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
			$config["per_page"] = $limit;
			$config["num_links"] = 10;
			$config["base_url"] = base_url($urlstring);
      $sql2.=" and onay='1' ".$ek.$add_query_to_sql." group by firmalar.Id order by firmalar.ust_siradayim DESC,".$order;
      $config["total_rows"] = $this->db->query($sql2)->num_rows();
			$sql2.=" LIMIT ".$page.", ".$config['per_page'];
			$this->pagination->initialize($config);
			$data["links"] = $this->pagination->create_links();
			$ilanlar = $this->db->query($sql2)->result();
			$data["ilanlar"]=$ilanlar;
			$data["kategori"]=$this->kategoriler->getbyid($kategori);
			$data["altKategoriler"]=$this->kategoriler->getSubs($kategori);
			$data["iller"]=$this->db->get("tbl_il")->result();
			$bugun = date("Y-m-d");
			$magkatvitrin = $this->db->query("SELECT mkvitrin.*,magazalar.magazaadi,magazalar.username,magazalar.logo FROM mkvitrin join magazalar on mkvitrin.magazaId=magazalar.Id WHERE (mkvitrin.bitis_tarihi >= ".$bugun.") and mkvitrin.kategoriId='".$kategorys[0]->Id."' and magazalar.onay='1' ORDER BY rand() LIMIT 6");
			if ($magkatvitrin->num_rows() > 0) {
				$data["magazaKatVitrin"]=$magkatvitrin->result();
			}
			$data["search"]="";
			$data["sayfa"]=0;
			if (count($kategorys) > 3) {
				$title="Ticaret Meclisi - ".$kategorys[2]->kategori_adi." ".$kategorys[3]->kategori_adi;
				$description="Tüm ".$kategorys[2]->kategori_adi." ".$kategorys[3]->kategori_adi." ilanlarını www.ticaretmeclisi.com adresinde bulabilirsiniz";
			} elseif(count($kategorys) > 2) {
				$title="Ticaret Meclisi - ".$kategorys[2]->kategori_adi." ".$kategorys[1]->kategori_adi;
				$description="Tüm ".$kategorys[2]->kategori_adi." ".$kategorys[1]->kategori_adi." ilanlarını www.ticaretmeclisi.com adresinde bulabilirsiniz";
			}elseif(count($kategorys) > 1) {
				$title="Ticaret Meclisi - ".$kategorys[1]->kategori_adi;
				$description="Tüm ".$kategorys[1]->kategori_adi." ilanlarını www.ticaretmeclisi.com adresinde bulabilirsiniz";
			}elseif(count($kategorys) > 0) {
				$title="Ticaret Meclisi - ".$kategorys[0]->kategori_adi;
				$description="Tüm ".$kategorys[0]->kategori_adi." ilanlarını www.ticaretmeclisi.com adresinde bulabilirsiniz";
			}
			$data["title"]=$title;
			$data["description"]=$description;
			$this->load->view("kategori2",$data);
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
			$this->db->or_like('Id', $search);
			$config["total_rows"] = $this->db->get('firmalar')->num_rows();
			$this->db->like('firma_adi', $search);
			$this->db->or_like('Id', $search);
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
