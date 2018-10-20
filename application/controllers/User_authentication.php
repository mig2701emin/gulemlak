<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_Authentication extends CI_Controller
{
    function __construct() {
        parent::__construct();

        //load google login library
        $this->load->library('google');

        // Load facebook library
        $this->load->library('facebook');

        //Load user model
        $this->load->model('members');


    }

    public function index(){
        $userData = array();

        // Check if user is logged in
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $fbUserProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid']      = $fbUserProfile['id'];
            $userData['ad']             = $fbUserProfile['first_name'];
            $userData['soyad']          = $fbUserProfile['last_name'];
            $userData['email']          = $fbUserProfile['email'];
            $userData['picture']        = !empty($fbUserProfile['picture'])?$fbUserProfile['picture']['data']['url']:null;

            // Insert or update user data
            $userID = $this->members->checkUser($userData);

            // Check user data insert or update status
            if(!empty($userID)){
                $userData['userID']      = $userID;
                $userData['gsm'] = replace("uyeler","gsm","Id",$userID);
                $userData['sehir'] = replace("uyeler","sehir","Id",$userID);
                // Get logout URL
                $userData['logoutURL'] = $this->facebook->logout_url();
                $this->session->set_userdata('userData',$userData);
                redirect(base_url());
            }else{
              //////////
            }

        }elseif(isset($_GET['code'])){
            //authenticate user
            $this->google->getAuthenticate();

            //get user info from google
            $gpInfo = $this->google->getUserInfo();

            //preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid']      = $gpInfo['id'];
            $userData['ad']             = $gpInfo['given_name'];
            $userData['soyad']          = $gpInfo['family_name'];
            $userData['email']          = $gpInfo['email'];
            $userData['picture']        = !empty($gpInfo['picture'])?$gpInfo['picture']:'';

            //insert or update user data to the database
            $userID = $this->members->checkUser($userData);

            if(!empty($userID)){
                $userData['userID']      = $userID;
                $userData['gsm'] = replace("uyeler","gsm","Id",$userID);
                $userData['sehir'] = replace("uyeler","sehir","Id",$userID);
                $this->session->set_userdata('userData',$userData);
                redirect(base_url());
            }else{
              //////////
            }

            //redirect to profile page
            redirect(base_url().'uyegiris');
        }
    }
}
