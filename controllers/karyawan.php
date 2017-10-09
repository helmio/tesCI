<?php

class karyawan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('model_karyawan');
	}

	public function index(){
		$this->load->view('form_tambah_karyawan');
	}

	public function data_karyawan($page = 0)
    {
        $config = array (
            'base_url'   => 'http://localhost/lat/codeigniter/karyawan/data_karyawan',
            'total_rows' => count($this->model_karyawan->select_karyawan()),
            'per_page'     => 3
        );
        
        $this->load->library('pagination');
        $per_page = $config['per_page'];
        
        $this->pagination->initialize($config); 
        
        
        //ini klo pggil di controller
        //$sql = "SELECT * FROM tbl_siswa";
        //$hasil = $this->db->query($sql); // mysql_query
        //$data['siswa'] = $hasil->result_array(); // mysql_fetch_array
        
        $data['karyawan'] = $this->model_karyawan->get_all_karyawan3($per_page,$page);
        /*echo $page;
        echo "<br/>";
        echo $total_page; */
        $this->load->view('view_data_karyawan', $data);    
        
    }


	public function tambah_karyawan(){
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('no_tlp','Nomor Telepon atau Handphone','required|min_length[10]|max_length[16]');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('alamat','Alamat','required|min_length[4]|max_length[200]');

		if($this->form_validation->run() == FALSE){
			$this->load->view('form_tambah_karyawan');
		}else{
			$data_karyawan = array('nama_lengkap' => set_value('nama_lengkap'),
									'jenis_kelamin' => set_value('jenis_kelamin'),
									'no_tlp' => set_value('no_tlp'),
									'email' => set_value('email'),
									'alamat' => set_value('alamat'),
			);

			$this->model_karyawan->tambah_karyawan($data_karyawan);

			$this->session->set_flashdata('pesan','Karyawan berhasil ditambah');
			redirect('karyawan/data_karyawan');
		}
	} 

	public function delete_karyawan($id){
		$this->model_karyawan->delete_karyawan($id);
		$this->session->set_flashdata('pesan','Karyawan berhasil dihapus');
		redirect('karyawan/data_karyawan');
	}

	public function edit_karyawan($id){
		$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('no_tlp','Nomor Telepon atau Handphone','required|min_length[10]|max_length[16]');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('alamat','Alamat','required|min_length[4]|max_length[200]');
		
		if($this->form_validation->run() == FALSE){
			$ini['karyawan'] = $this->model_karyawan->get_karyawan_by_id($id);
			$this->load->view('form_edit_karyawan',$ini);
		}else{
			$data_karyawan = array('nama_lengkap' => set_value('nama_lengkap'),
									'jenis_kelamin' => set_value('jenis_kelamin'),
									'no_tlp' => set_value('no_tlp'),
									'email' => set_value('email'),
									'alamat' => set_value('alamat'),
			);

			$this->model_karyawan->update_karyawan($id,$data_karyawan);

			$this->session->set_flashdata('pesan','Karyawan berhasil diubah');
			redirect('karyawan/data_karyawan');
		}
	}

}