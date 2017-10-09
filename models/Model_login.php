<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Model_login extends CI_Model{

    public function cek_username_password($username,$password){
        //cara2
        $hasil = $this->db->where('username',$username)
                            ->where('password',$password)
                            ->limit(1)
                            ->get('users');
        if($hasil->num_rows()>0){
            return $hasil->row();
        }else{
            return false;
        }
    }

}