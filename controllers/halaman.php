<?php if(!defined('BASEPATH'))exit ('No direct access allowed');

class Halaman extends CI_Controller {
	public function index(){
		$this->load->view('form_tambah_user');
	}
	public function tambah_user(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('form_tambah_user');
		}
	}
	
}