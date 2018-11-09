<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magazam extends CI_Controller{
  private $user;
  private $magaza;
  private $uye_izinleri;

  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('userData')){ redirect('login'); }
    $this->load->model('firmalar');
    $this->load->model("members");
    $this->load->model("magazalar");

    $where = array("Id" => $this->session->userdata('userData')["userID"]);
    $this->user=$this->members->get($where);

    $checker=$this->db->query("select * from magaza_kullanicilari where uyeId='".$this->user->Id."'");
    if($checker->num_rows()==0){
    $izin="0";
    }else{
    $izin="1";
    }
    $checkDetail=$checker->row();
    $query=$this->db->query("select * from magazalar where Id='".$checkDetail->magazaId."'");
    $mgzsayi=$query->num_rows();
    if($mgzsayi==0 and $izin==0){
      redirect(base_url("magazaac"));
    }
    $this->magaza=$query->row();
    $this->uye_izinleri=explode(",",$checkDetail->yetkiler);
    if($this->uye_izinleri[0] == 0){
      $this->session->set_flashdata('error', 'Bu Sayfayı Görme Yetkiniz Yoktur.');
      redirect(base_url("hesabim/anasayfa"));
    }

  }
  public function magazam()
  {
    // $magaza_user=$this->db->where("uyeId",$this->user->Id)->get("magaza_kullanicilari")->row();
    // $magaza=$this->db->where("Id",$magaza_user->magazaId)->get("magazalar")->row();
    $data["magaza"]=$this->magaza;

    if (isset($_POST) && !empty($_POST)) {
      $username=$this->security->xss_clean($this->input->post("username"));
      $magazaadi=$this->security->xss_clean($this->input->post("magazaadi"));
      $m_aciklama=$this->security->xss_clean($this->input->post("m_aciklama"));
      $unvan=$this->security->xss_clean($this->input->post("unvan"));
      $stil=$this->security->xss_clean($this->input->post("stil"));


      $edit = array(
        "unvan"       => $unvan,
        "magazaadi"   => $magazaadi,
        "username"    => $username,
        "aciklama"    => base64_encode($m_aciklama),
        "stil"        => $stil
      );

      if ( ! empty($_FILES))
      {

        $config["upload_path"]   = FCPATH."photos/magaza/";
        $config["allowed_types"] = "gif|jpg|png|jpeg";
        $config["file_name"]="magaza_";

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("image1")){
          if (file_exists(FCPATH."photos/magaza/".$this->magaza->logo)) {unlink(FCPATH."photos/magaza/".$this->magaza->logo);}
          $edit["logo"]=$this->upload->file_name;
          $this->load->library('image_lib');
          $config4['image_library'] = 'gd2';
          $config4['source_image'] = $this->upload->upload_path.$this->upload->file_name;
          $config4['maintain_ratio'] = false;
          $config4['width'] = 240;
          $config4['height'] = 135;
          $this->image_lib->initialize($config4);

          if ( ! $this->image_lib->resize())
          {
            $this->session->set_flashdata('error', $this->image_lib->display_errors('error', 'resim boyutlandırma hatası'));
          }

          $this->image_lib->clear();
        }
      }
      $where = array('Id' => $this->magaza->Id);
      $update=$this->magazalar->update($where,$edit);
      if ($update) {
        $this->session->set_flashdata('success', 'Mağazanız Başarıyla Güncellendi.');
      }else {
        $this->session->set_flashdata('error', 'Mağazanız Güncellenemedi.');
      }
    }
    $data["user"]=$this->user;
    $this->load->view("magazam/magazam",$data);
  }
  public function magazakullanicilari()
  {
    // $magaza_user=$this->db->where("uyeId",$this->user->Id)->get("magaza_kullanicilari")->row();
    // $magaza=$this->db->where("Id",$magaza_user->magazaId)->get("magazalar")->row();
    $magaza_users=$this->db->where("magazaId",$this->magaza->Id)->get("magaza_kullanicilari")->result();
    $data["magaza_users"]=$magaza_users;
    $data["uye_izinleri"]=$this->uye_izinleri;
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("magazam/magaza_kullanicilari",$data);
  }
  public function magazauseradd()
  {
    if($this->uye_izinleri[1]==0){
      $this->session->set_flashdata('error', 'Mağaza Kullanıcı Ekleme İzniniz Bulunmamaktadır!.');
      redirect(base_url("magazam/magazakullanicilari"));
    }
    if (isset($_POST) && !empty($_POST)) {

      $email=$this->security->xss_clean($this->input->post("email"));
      $userList=$this->db->query("select Id,username from uyeler where email='".$email."'");
      $add_user=$userList->row();
      $add_chk=$this->db->query("select uyeId from magaza_kullanicilari where uyeId='".$add_user->Id."'");
      if($userList->num_rows()!=1){
        $this->session->set_flashdata('error', 'Üye Geçersiz..');
        die();
      }elseif($add_chk->num_rows()!=0){
        $this->session->set_flashdata('error', 'Üye Daha Önce Eklenmiş.');
        die();
      }
      $perm1=$this->security->xss_clean($this->input->post("Perm1"));
      if($perm1 == 1){$yetki1="1";}else{$yetki1="0";}
      $perm2=$this->security->xss_clean($this->input->post("Perm2"));
      if($perm2 == 1){$yetki2="1";}else{$yetki2="0";}
      $perm3=$this->security->xss_clean($this->input->post("Perm3"));
      if($perm3 == 1){$yetki3="1";}else{$yetki3="0";}
      $perm4=$this->security->xss_clean($this->input->post("Perm4"));
      if($perm4 == 1){$yetki4="1";}else{$yetki4="0";}
      $yetkiler=$yetki1.','.$yetki2.','.$yetki3.','.$yetki4;
      $addQuery=$this->db->query("insert into magaza_kullanicilari (Id,magazaId,uyeId,yetkiler) VALUES(NULL,'".$this->magaza->Id."','".$add_user->Id."','".$yetkiler."');");
      if($addQuery){
        $this->session->set_flashdata('success', 'Üye Mağazaya Eklendi.');
      }else{
        $this->session->set_flashdata('error', 'Üye Mağazaya Eklenemedi. Lütfen Tekrar Deneyiniz.');
      }
      redirect(base_url("magazam/magazakullanicilari"));
    }
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("magazam/magaza_user_add",$data);
  }

  public function magazauseredit($uyeId)
  {
    $uyeId=decode($uyeId);
    if($this->uye_izinleri[1]==0){
      $this->session->set_flashdata('error', 'Mağaza Kullanıcı Düzenleme İzniniz Bulunmamaktadır!.');
      redirect(base_url("magazam/magazakullanicilari"));
    }
    $where = array("Id" => $uyeId);
    $uye=$this->members->get($where);
    $data["uye"]=$uye;
    $magaza_user=$this->db->where("uyeId",$uyeId)->get("magaza_kullanicilari")->row();
    $uyenin_izinleri=explode(",",$magaza_user->yetkiler);
    $data["uyenin_izinleri"]=$uyenin_izinleri;
    if (isset($_POST) && !empty($_POST)) {
      $perm1=$this->security->xss_clean($this->input->post("Perm1"));
      if($perm1 == 1){$yetki1="1";}else{$yetki1="0";}
      $perm2=$this->security->xss_clean($this->input->post("Perm2"));
      if($perm2 == 1){$yetki2="1";}else{$yetki2="0";}
      $perm3=$this->security->xss_clean($this->input->post("Perm3"));
      if($perm3 == 1){$yetki3="1";}else{$yetki3="0";}
      $perm4=$this->security->xss_clean($this->input->post("Perm4"));
      if($perm4 == 1){$yetki4="1";}else{$yetki4="0";}
      $yetkiler=$yetki1.','.$yetki2.','.$yetki3.','.$yetki4;
      $editQuery=$this->db->query("update magaza_kullanicilari set yetkiler='".$yetkiler."' where uyeId='".$uye->Id."' and magazaId='".$this->magaza->Id."'");
      if($editQuery){
        $this->session->set_flashdata('success', 'Üye Güncellendi.');
      }else{
        $this->session->set_flashdata('error', 'Üye Güncellenemedi.');
      }
      redirect(base_url("magazam/magazakullanicilari"));
    }
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }

    $this->load->view("magazam/magaza_user_edit",$data);
  }
  public function magazausersil($uyeId)
  {
    $uyeId=decode($uyeId);
    if($this->uye_izinleri[1]==0){
      $this->session->set_flashdata('error', 'Mağaza Kullanıcı Silme İzniniz Bulunmamaktadır!.');
      redirect(base_url("magazam/magazakullanicilari"));
    }
    $where = array("Id" => $uyeId);
    $uye=$this->members->get($where);
    $data["uye"]=$uye;
    $magaza_user=$this->db->where("uyeId",$uyeId)->get("magaza_kullanicilari")->row();
    $uyenin_izinleri=explode(",",$magaza_user->yetkiler);
    if ($uyenin_izinleri[3] == 1) {
      $this->session->set_flashdata('error', 'Süper Yönetici Silinemez!.');
      redirect(base_url("magazam/magazakullanicilari"));
    }
    $delete=$this->db->query("delete from magaza_kullanicilari where uyeId='".$uyeId."'");
    if($delete){
      $this->session->set_flashdata('success', 'Mağaza Kullanıcısı Başarıyla Silindi.');
    }else{
      $this->session->set_flashdata('error', 'Mağaza Kullanıcısı Geçersiz.');
    }
    redirect(base_url("magazam/magazakullanicilari"));
  }
  public function magazailanlari()
  {
    $ilanlar = array();
    $magaza_ilanlar=$this->db->where("magazaId",$this->magaza->Id)->get("magaza_ilanlari")->result();
    foreach ($magaza_ilanlar as $magaza_ilan) {
      $ilanlar[]=$this->db->where("Id",$magaza_ilan->ilanId)->get("firmalar")->row();
    }
    $data["ilanlar"]=$ilanlar;
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("magazam/magaza_ilanlari",$data);
  }
  public function magazailansil($ilanId)
  {
    $delete=$this->db->delete("magaza_ilanlari",array('ilanId' => decode($ilanId)));
    if ($delete) {
      $this->session->set_flashdata("success","Mağaza İlanı Başarıyla Silindi.");
      redirect(base_url("magazam/magazailanlari"));
    }else {
      $this->session->set_flashdata("error","Mağaza İlanı Silinemedi.");
      redirect(base_url("magazam/magazailanlari"));
    }
  }
  public function magazailanadd()
  {
    if($this->uye_izinleri[1]==0){
      $this->session->set_flashdata('error', 'Mağaza Kullanıcı Silme İzniniz Bulunmamaktadır!.');
      redirect(base_url("magazam/magazakullanicilari"));
    }
    if (isset($_POST) && !empty($_POST)) {
      $ilanId=$this->security->xss_clean($this->input->post("ilanid"));
      $check_exists=$this->db->query("select * from firmalar where uyeId='".$this->user->Id."' and Id='".$ilanId."'")->num_rows();
      if($check_exists==0){
        $this->session->set_flashdata("error","İlan Geçersiz.");
      }else{
        $addQuery=$this->db->query("insert into magaza_ilanlari (Id,magazaId,ilanId,uyeId) VALUES(NULL,'".$this->magaza->Id."','".$ilanId."','".$this->user->Id."')");
        if($addQuery){
          $this->session->set_flashdata("success","İlan Mağazaya Eklendi.");
          redirect(base_url("magazam/magazailanlari"));
        }else{
          $this->session->set_flashdata("error","İlan Mağazaya Eklenemedi. Lütfen Tekrar Deneyiniz.");
          redirect(base_url("magazam/magazailanlari"));
        }
      }
    }
    $data["user"]=$this->user;
    if ($this->magaza!=null) {
      $data["magaza"]=$this->magaza;
    }
    $this->load->view("magazam/magaza_ilan_add",$data);

  }
  public function importallilan()
  {
    if($this->magaza->kategoriId=='hepsi'){
    $filter01="";
    }else{
    $filter01=" and kategoriId='".$this->magaza->kategoriId."'";
    }
    $countadSQL=$this->db->query("select Id from firmalar where uyeId='".$this->user->Id."'".$filter01)->result();
    foreach ($countadSQL as $countad) {
      $chkAd=$this->db->query("select ilanId from magaza_ilanlari where ilanId='".$countad->Id."' and uyeId='".$this->user->Id."'")->num_rows();
      if($chkAd==0){
        $this->db->query("insert into magaza_ilanlari (Id,magazaId,ilanId,uyeId) VALUES(null,'".$this->magaza->Id."','".$countad->Id."','".$this->user->Id."')");
      }
    }
    $this->session->set_flashdata("success","İlanlarınız Mağazaya Aktarıldı.");
    redirect(base_url("magazam/magazailanlari"));
  }
  public function valid_password($password = '')
  {
    $password = trim($password);
    $regex_lowercase = '/[a-z]/';
    $regex_uppercase = '/[A-Z]/';
    $regex_number = '/[0-9]/';
    $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
    if (empty($password))
    {
      $this->form_validation->set_message('valid_password', '<strong>%s</strong> Gerekli Bir Alandır.');
      return FALSE;
    }
    if (preg_match_all($regex_lowercase, $password) < 1)
    {
      $this->form_validation->set_message('valid_password', '<strong>%s</strong> En Az 1 Küçük Harf İçermelidir.');
      return FALSE;
    }
    if (preg_match_all($regex_uppercase, $password) < 1)
    {
      $this->form_validation->set_message('valid_password', '<strong>%s</strong> En Az 1 Büyük Harf İçermelidir.');
      return FALSE;
    }
    if (preg_match_all($regex_number, $password) < 1)
    {
      $this->form_validation->set_message('valid_password', '<strong>%s</strong> En Az 1 Rakam İçermelidir.');
      return FALSE;
    }
    /*if (preg_match_all($regex_special, $password) < 1)
    {
      $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
      return FALSE;
    }*/
    if (strlen($password) < 8)
    {
      $this->form_validation->set_message('valid_password', '<strong>%s</strong> Minimum 8 Karakter Uzunluğunda Olmalıdır');
      return FALSE;
    }
    if (strlen($password) > 32)
    {
      $this->form_validation->set_message('valid_password', '<strong>%s</strong> 32 Karakterden Uzun Olmamalıdır');
      return FALSE;
    }
    return TRUE;
  }

}
