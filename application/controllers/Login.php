<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('userData')){ redirect(base_url().'account'); }
    $this->load->model('members');
    $this->load->library('google');
    $this->load->library('facebook');
    $this->load->helper('cookie');

  }

  function index()
  {
    $userData = array();
    $data['title']='Emlak Meclisi | Üye Girişi';
    $data['ayarlar'] = "Merhaba";
    $data['loginURL'] = $this->google->loginURL();
    $data['authURL'] =  $this->facebook->login_url();

    if(isset($_POST) && !empty($_POST)){
      $formvalid = array(
      array('field' => 'email',                   'label' => 'E-Posta',               'rules' => 'required'),
      array('field' => 'password',                'label' => 'Parola',                'rules' => 'required')
      );

      $this->form_validation->set_rules($formvalid);
      $this->form_validation->set_error_delimiters('<p>', '</p>');
      $this->form_validation->set_message('required', '<strong>%s</strong> Gerekli Bir Alandır.');

      if($this->form_validation->run() == TRUE){
        $email = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $remember_me = $this->security->xss_clean($this->input->post('remember_me'));
        $return = $this->members->login($email,$password);
        if($return){
          $return_active = $this->members->isactive($return->Id);
          if($return_active){
            $userData['userID'] = $return->Id;
            $userData['oauth_provider'] = $return->oauth_provider;
            $userData['ad'] = $return->ad;
            $userData['soyad'] = $return->soyad;
            $userData['email'] = $return->email;
            $userData['picture'] = $return->picture;
            $userData['gsm'] = $return->gsm;
            $userData['sehir'] = $return->sehir;
            $this->session->set_userdata('userData', $userData);
            if ($remember_me == "on") {
                // cookie deger set et...
                $remember = array(
                        "email"     => $email,
                        "password"  => $password
                );
                // set_cookie(key, value, time);
                set_cookie("remember_me", json_encode($remember), time() + 60 * 60 * 24 * 30);
            } else {
                // cookie degeri sil...
                delete_cookie("remember_me");
            }
            //$this->session->set_flashdata('success','Giriş Yapıldı, Lütfen Bekleyiniz Yönlendiriliyorsunuz');
            //$json['success'] = 'Giriş Yapıldı, Lütfen Bekleyiniz Yönlendiriliyorsunuz';

            /*$result = $this->professionals->user($return->id);
            if($result){
              //$json['pro'] = road('user', $result->permalink);
              redirect('user/'.$result->permalink);
            }else{*/

              redirect(base_url());
            //}

          }else{
            $this->session->set_flashdata('error', 'Üyeliğiniz Henüz Aktif Değildir. Aktifleştirmek İçin E-posta Adresinize Gönderilen Linke Tıklayınız...');
            //$json['error'] = 'Üyeliğiniz Henüz Aktif Değildir. Aktifleştirmek İçin E-posta Adresinize Gönderilen Linke Tıklayınız...';
          }
        }else{
          $this->session->set_flashdata('error', 'Girmiş Olduğunuz Bilgiler İle Eşleşen Kullanıcı Bulunamadı.');
          //$json['error'] = 'Girmiş Olduğunuz Bilgiler İle Eşleşen Kullanıcı Bulunamadı';
        }
      }else{
        $this->session->set_flashdata('error', 'Lütfen Tüm Form Alanlarını Doldurunuz.');
        //$json['error'] = 'Lütfen Tüm Form Alanlarını Doldurunuz';
      }
    }

    $this->load->view('uye/uyegiris', $data);
  }

  public function add()
  {
    $data['title']='Emlak Meclisi | Üye Kayıt';
    $data['ayarlar'] = "Merhaba";

    if(isset($_POST) && !empty($_POST)){
        $formvalid = array(
            array('field' => 'name',                    'label' => 'Ad',                    'rules' => 'required'),
            array('field' => 'surname',                 'label' => 'Soyad',                 'rules' => 'required'),
            array('field' => 'email',                   'label' => 'E-Posta',               'rules' => 'required|valid_email'),
            array('field' => 'confirm_email',           'label' => 'E-Posta',               'rules' => 'required|matches[email]'),
            array('field' => 'password',                'label' => 'Parola',               	'rules' => 'callback_valid_password'),
            array('field' => 'repassword',							'label' => 'Parola',					      'rules' => 'required|matches[password]'),
            array('field' => 'white',				    				'label' => 'Sözleşme',							'rules' => 'required')

        );

        $this->form_validation->set_rules($formvalid);
        $this->form_validation->set_error_delimiters('<p>', '</p>');
        $this->form_validation->set_message('required', '<strong>%s</strong> Gerekli Bir Alandır.');
        $this->form_validation->set_message('matches','Girmiş olduğunuz %slar aynı değil!!');
        $this->form_validation->set_message('valid_email', 'Lütfen Geçerli Bir E-Posta Adresi Giriniz.');

        if($this->form_validation->run() == TRUE){
            $oauth_provider='myapp';
            //$activation_code = md5(uniqid());
            $name = $this->security->xss_clean($this->input->post('name'));
            $surname = $this->security->xss_clean($this->input->post('surname'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $password = $this->security->xss_clean($this->input->post('password'));

            $ip=getUserIP();
            // Call the function post_captcha
            $res = post_captcha($_POST['g-recaptcha-response']);

            if ($res['success']) {
              $mailControl = $this->members->email($email);
              if($mailControl == false){
                $insert = $this->members->add($oauth_provider,$name,$surname,$email,$password,$ip);
                if($insert){

    ///////////////////////////////////////////////////////////////////
                /*  $config=array(
                    'protocol' 	=>'smtp',
                    'smtp_host'	=>'smtp-mail.outlook.com',
                    'smtp_port'	=>'587',
                    'smtp_user'	=>'web_sitem@outlook.com',
                    'charset'   => 'utf-8',
                    'smtp_pass' =>'Memo428423',
                    'wordwrap'  => true,
                    'starttls'   => true,
                    'newline' => '\r\n'
                    );
                    $this->load->library('email',$config);

                    $this->email->from('mehmet emlak', 'deneme');
                    $this->email->to($email);
                    $this->email->subject("Üyelik Aktivasyonu");
                    $this->email->set_mailtype("html");
                    $link = base_url("member/login/activation/".$activation_code);

                    $message = "Merhabalar {$name}, <br> Üyeliğinizin aktifleşmesi için sadece bir adım kaldı.<br>
             Üyeliğinizi aktifleştirmek için lütfen <a href='$link'>tıklayınız</a>";
                    $this->email->message($message);

                    $send = $this->email->send();

                    if($send){*/
                    $this->session->set_flashdata('success', 'Üye Kaydınız Alındı, Sizleri Aramızda Görmekten Onur Duyuyoruz...');
                      //$this->session->set_flashdata('success', 'Üye Kaydınız Alındı, Üyeliğinizi Aktifleştirmek için e-posta Adresinize Aktivasyon Maili Gönderilmiştir.');
                      //$json['success'] = 'Üye Kaydınız Alındı, Üyeliğinizi Aktifleştirmek için e-posta Adresinize Aktivasyon Maili Gönderilmiştir.';
                      redirect(base_url().'login/welcomenewuser');
                  /*  }else{
                      $this->session->set_flashdata('error', 'Üyelik sırasında bir problem oluştu. Lütfen tekrar deneyiniz.');
                      //$json['error']  = "Üyelik sırasında bir problem oluştu. Lütfen tekrar deneyiniz";
                      //redirect('member/login/add');
                    }*/
    /////////////////////////////////////////////////////////////////

                }else{
                  $this->session->set_flashdata('error', 'Üye Kaydı Eklenemedi, Lütfen Daha Sonra Tekrar Deneyiniz.');
                  redirect(base_url().'uyeol');
                }
              }elseif ($mailControl->oauth_provider !="myapp") {
                $where = array('Id' => $mailControl->Id);
                $data  = array(
                  'oauth_provider'  =>$oauth_provider,
          				'ad'				      => $name,
                  'soyad'				    => $surname,
          				'email'				    => $email,
          				'parola'			    => md5($password),
                  'onay'            =>'1',
          				'kayit_tarihi'    => date('Y-m-d H:i:s'),
                  'ip'              => $ip
          			);
                $update=$this->members->update($where,$data);
                if ($update) {
                  $this->session->set_flashdata('success', 'Üye Kaydınız Alındı, Sizleri Aramızda Görmekten Onur Duyuyoruz...');
                  redirect(base_url().'login/welcomenewuser');
                } else {
                  $this->session->set_flashdata('error', 'Üye Kaydı Eklenemedi, Lütfen Daha Sonra Tekrar Deneyiniz.');
                  redirect(base_url().'uyeol');
                }

              }else {
                $this->session->set_flashdata('error', 'Girmiş Olduğunuz E-Posta Adresi Farklı Bir Üye Tarafından Kullanılmaktadır.');
                redirect(base_url().'uyeol');
              }
            }else {
              // What happens when the CAPTCHA wasn't checked
              $this->session->set_flashdata('error', 'Lütfen robot olmadığınızı doğrulayın.');
              redirect(base_url().'uyeol');
            }
          }



    }

    $this->load->view('uye/uyeol', $data);

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
		    // if (preg_match_all($regex_uppercase, $password) < 1)
		    // {
		    //   $this->form_validation->set_message('valid_password', '<strong>%s</strong> En Az 1 Büyük Harf İçermelidir.');
		    //   return FALSE;
		    // }
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
		    if (strlen($password) < 6)
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

      public function activation($activation_code)
      {

  			$where = array(
  				"activation_code"   => $activation_code
  			);


  			$row = $this->members->get($where);

  			if($row){

  				$data = array(
  					"onay"          => 1,
  					"activation_code"   => ""
  				);

  				$update = $this->members->update($where, $data);

  				if($update){
  					redirect('uyegiris');
  					//$this->load->view("front/member/login");

  				}else{

  					$this->load->view("error");
  				}


  			}else{
  				//$this->load->view("error");
  			}

  			// activation_code ile kaydi bul...
  				// bu kayda ait isActive => 1
  				// activation_code = ""
  				// başarılı.. sayfası
  			//else
  				// error page..

  		}
  		public function welcomenewuser(){
  			//$seo = $this->general->setting('store_seo');
        $data['title']='Emlak Meclisi | Yeni Üye';

  			$this->load->view('uye/welcomenewuser', $data);
  		}

  		public function forgotpassword(){
  				$json = array();
  				$formvalid = array(
  				array('field' => 'email',               'label' => 'E-Posta',               'rules' => 'required')
  				);

  				$this->form_validation->set_rules($formvalid);
  				$this->form_validation->set_error_delimiters('<p>', '</p>');
  				$this->form_validation->set_message('required', '<strong>%s</strong> Gerekli Bir Alandır.');

  				if($this->form_validation->run() == TRUE){
  					$email = $this->security->xss_clean($this->input->post('email'));
  					$result = $this->members->reset($email);
  					if(!$result){

  						 $json['error'] = 'Girdiğiniz Bilgiler İle Eşleşen Bir Kullanıcı Bulunamadı';
  					}else{

  						$activation_code = md5(uniqid());
  						$where=array('email' => $email);
  						$data=array('activation_code' => $activation_code);
  						$update = $this->members->update($where,$data);
  						if($update){

  							 $config=array(
  								 'protocol' 	=>'smtp',
  								 'smtp_host'	=>'mail.emlakmeclisi.com',
  								 'smtp_port'	=>'465',
  								 'smtp_user'	=>'bilgi@emlakmeclisi.com',
  								 'charset'   => 'utf-8',
  								 'smtp_pass' =>'Ticaret27',
  								 'wordwrap'  => true,
  								 'starttls'   => true,
  								 'newline' => '\r\n'
  							 );
  							 $this->load->library('email',$config);

  							 $this->email->from('bilgi@emlakmeclisi.com', 'www.emlakmeclisi.com');
  							 $this->email->to($email);
  							 $this->email->subject("Unutulan Şifre");
  							 $this->email->set_mailtype("html");
  							 $link = base_url("login/newpassword/".$activation_code);

  							 $message = "Merhabalar {$name}, <br> Şifrenizi mi unuttunuz?...<br>
  							Şifrenizi yeniden belirlemek için lütfen <a href='$link'>tıklayınız</a>";
  							 $this->email->message($message);

  							 $send = $this->email->send();

  							 if($send){

  								 $json['success'] = 'Şifrenizi yeniden belirlemek için, lütfen e-posta adresinize gönderilen linke tıklayınız...';

  							 }else{

  								 $json['error']  = "Bir problem oluştu. Lütfen tekrar deneyiniz";

  							}
  						}else{

  						 $json['error'] = 'Bir Hata Oluştu, Lütfen Daha Sonra Tekrar Deneyiniz.';

  						}
  					}
  				}else{
  					 $json['error'] = validation_errors();
  				}
  				//$json['success'] = 'Şifrenizi yeniden belirlemek için, lütfen e-posta adresinize gönderilen linke tıklayınız...';
  			echo json_encode($json);

  		}

      public function newpassword($activation_code){

        $data['title']='Emlak Meclisi | Şifre Yenileme';
  			$where = array(
  				"activation_code"   => $activation_code
  			);


  			$row = $this->members->get($where);

  			if($row){
  				$data['row']=$row;

  				if(isset($_POST) && !empty($_POST)){
                  $formvalid = array(
                      array('field' => 'new_password',		'label' => 'Parola',				'rules' => 'callback_valid_password'),
                      array('field' => 're_password',			'label' => 'Parola Tekrar',			'rules' => 'required|matches[new_password]')
                  );

                  $this->form_validation->set_rules($formvalid);
                  $this->form_validation->set_error_delimiters('<p>', '</p>');
                  $this->form_validation->set_message('required', '<strong>%s</strong> Gerekli Bir Alandır.');
  								$this->form_validation->set_message('matches','Girmiş olduğunuz şifreler aynı değil!!');

                  if($this->form_validation->run() == TRUE){
                      $new_password = $this->security->xss_clean($this->input->post('new_password'));
                      $password=md5($new_password);

                      $update = $this->members->editpass($password,$row->Id);
  										if($update){
  											$this->session->set_flashdata('success', 'Parolanız Başarıyla Güncellendi.');
  											redirect('uyegiris');
  										}else{
  											$this->session->set_flashdata('error', 'Parolanız Güncellenemedi, Lütfen Tekrar Deneyiniz.');
  											//redirect('member/account/passchange');
  										}
                  }
  			}

  				$this->load->view("uye/newpassword",$data);
  			}
  		}
}
