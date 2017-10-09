<?php if(!defined('BASEPATH'))exit('No direct scipt access allowed');

class Login extends CI_Controller{

    public function index(){
        $this->form_validation->set_rules('username','Username','required|alpha_numeric|min_length[4]|max_length[16]');
        $this->form_validation->set_rules('password','Password','required|alpha_numeric|sha1');
    
        if($this->form_validation->run()==FALSE){
            $this->load->view('form_login');
        }else{
            $username = set_value('username'); //this->input->post
            $password = set_value('password');

            $this->load->model('Model_login');
            $is_valid = $this->Model_login->cek_username_password($username,$password);
            if($is_valid != FALSE){
                $this->session->set_userdata('username',$username);
                redirect('dashboard');
            }else{
                $this->session->set_flashdata('pesan','Maaf Username atau Password salah');
                $this->load->view('form_login');
            }
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        $data['pesan'] = "Anda sudah logout";
        $this->load->view('welcome_message',$data);
    }
}