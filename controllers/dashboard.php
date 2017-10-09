<?php if(!defined('BASEPATH'))exit('No direct access allowed');

class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();

        if(!$this->session->userdata('username')){
            $this->session->set_flashdata('pesan','Maaf anda belum login');
            redirect('login');
        }
    }
    
    public function index(){
        $this->load->view('admin/dashboard');
    }

}