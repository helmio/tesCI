<?php if(!defined('BASEPATH'))exit('No direct access script allowed');

class M_product extends CI_Model{
    function get_all(){
        $hasil = $this->db->get('products');
        if($hasil->num_rows()>0){
            return $hasil->result();
        }else{
            return false;
        }
    }

    public function get_by_id($id){
        $sql = "SELECT * FROM 'products' WHERE id = $id";
        $hasil = $this->db->query($sql);
        return $hasil->row_array();
    }

}