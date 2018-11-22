<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  public function email($email){
			$this->db->from('uyeler');
			$this->db->where('email', $email);
			$query = $this->db->get();

			if($query->num_rows() > 0){
				return $query->row();
			}else {
        return false;
      }
	}

  public function add($oauth_provider,$name,$surname,$email,$password,$ip){
			$string  = array(
        'oauth_provider'  =>$oauth_provider,
				'ad'				      => $name,
        'soyad'				    => $surname,
				'email'				    => $email,
				'parola'			    => md5($password),
        'onay'            =>'1',
				'kayit_tarihi'    => date('Y-m-d H:i:s'),
        'ip'              => $ip
			);

			$insert = $this->db->insert('uyeler', $string);
			if(!$insert){ return false; }else{ return true; }
		}

    public function get($where = array()){

			$row = $this->db->where($where)->get("uyeler")->row();

			return $row;

		}

    public function update($where = array(), $data = array()){

			$update = $this->db->where($where)->update("uyeler", $data);

			return $update;

		}

    public function login($email,$password){
			$this->db->from('uyeler');
			$this->db->where('email', $email);
			$this->db->where('parola', md5($password));
			$query = $this->db->get();

			if($query->num_rows() > 0){
				return $query->row();
			}
		}

    public function isactive($id){
			$this->db->from('uyeler');
			$this->db->where('Id', $id);
			$this->db->where('onay','1');
			$query = $this->db->get();

			if($query->num_rows() > 0){
				return $query->row();
			}
		}

    public function reset($email){
			$this->db->from('uyeler');
			$this->db->where('email', $email);
			$query = $this->db->get();

			if($query->num_rows() > 0){
				return $query->row();
			}
		}

    public function editpass($password,$result){
			$string  = array(
				'parola'			=> $password,
				"activation_code"   => ''
			);

			$this->db->where('Id', $result);
			$update = $this->db->update('uyeler', $string);
			if(!$update){ return false; }else{ return true; }
		}

    public function checkUser($userData = array()){
        if(!empty($userData)){
            //check whether user data already exists in database with same oauth info
            $this->db->select('Id');
            $this->db->from('uyeler');
            $this->db->where(array('oauth_provider'=>$userData['oauth_provider'],'oauth_uid'=>$userData['oauth_uid']));
            $this->db->or_where('email',$userData['email']);
            $prevQuery = $this->db->get();
            $prevCheck = $prevQuery->num_rows();

            if($prevCheck > 0){
                $prevResult = $prevQuery->row_array();

                //update user data
                $update = $this->db->update('uyeler',$userData,array('Id'=>$prevResult['Id']));

                //get user ID
                $userID = $prevResult['Id'];
            }else{
                //insert user data
                $userData['kayit_tarihi']  = date("Y-m-d H:i:s");
                $userData['onay']  = 1;
                $insert = $this->db->insert('uyeler',$userData);

                //get user ID
                $userID = $this->db->insert_id();
            }
        }

        //return user ID
        return $userID?$userID:FALSE;
    }


}
