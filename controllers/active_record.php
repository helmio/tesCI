<?php if(!defined('BASEPATH'))  exit ('No direct script access allowed');

class Active_record extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('model_active_record');

    }
    public function index(){
        $this->load->view('view_active_record');	
    }
    public function tambah_user(){
        $data = array('username'=>'staf',
                        'password'=>sha1('staff'));
                        
        $this->model_active_record->insert_user($data);
        $this->session->set_flashdata('pesan','User Berhasil Ditambah');
        redirect('active_record/data_user');
    }

    public function data_user(){
        $data['users']=$this->model_active_record->select_user();
        $this->load->view('view_active_record',$data);
    }

    public function delete_user($id){
        $this->model_active_record->delete_user($id);
        $this->session->set_flashdata('pesan','user Berhasil Dihapus');
        redirect('active_record/data_user');
    }

    public function update_user($id){
        $data_user=array(
            'username'=>'member',
            'password'=>sha1('member')
        );
        $this->model_active_record->update_user($id,$data_user);
        $this->session->set_flashdata('pesan','User berhasil diubah');
        redirect('active_record/data_user');
    }
}
