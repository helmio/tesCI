<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Model_active_record extends CI_Model{

    public function insert_user($data){
        $this->db->insert('users',$data);
    }

    public function select_user(){
        $hasil = $this->db->get('users');
        if($hasil->num_rows()>0){
            return $hasil->result();
        }else{
            return false;
        }
    }

    public function delete_user($id){
        $this->db->where('id',$id)->delete('users');
    }

    public function update_user($id,$data){
        $this->db->where('id',$id)->update('users',$data);
    }

}