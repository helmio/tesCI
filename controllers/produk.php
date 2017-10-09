<?php
class Produk extends CI_Controller{
    private $limit=3;
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('pagination','form_validation','upload'));
        $this->load->model('model_produk');
        
        if(!$this->session->userdata('username')){
            redirect('dashboard');
        }
    }
    
    function index($offset=0,$order_column='name',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='name';
        if(empty($order_type)) $order_type='asc';
        
        //load data
        $data['produk']=$this->model_produk->semua($this->limit,$offset,$order_column,$order_type)->result();
        $data['title']="Data Produk";
        
        $config['base_url']=site_url('produk/index/');
        $config['total_rows']=$this->model_produk->jumlah();
        $config['per_page']=$this->limit;
        $config['uri_segment']=3;
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();
        
        
        if($this->uri->segment(3)=="delete_success")
            $data['message']="<div class='alert alert-success'>Data berhasil dihapus</div>";
        else if($this->uri->segment(3)=="add_success")
            $data['message']="<div class='alert alert-success'>Data Berhasil disimpan</div>";
        else
            $data['message']='';
            $this->load->view('admin/index',$data);
    }
    
    
    function edit($id){
        $data['title']="Edit Data Produk";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $name=$this->input->post('name');
            //setting konfiguras upload image
            $config['upload_path'] = './image/products/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '10000';
            $config['max_width']  = '2000';
            $config['max_height']  = '1024';
                
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('gambar')){
                $gambar="";
            }else{
                $gambar=$this->upload->file_name;
            }
            
            $info=array(
                    'name'=>$this->input->post('name'),
                    'price'=>$this->input->post('price'),
                    'option_name'=>$this->input->post('option_name'),
                    'option_values'=>$this->input->post('option_values'),
                    'image'=>$this->input->post('gambar'),
                    'image'=>$gambar
            );
            //update data angggota
            $this->model_produk->update($name,$info);
            
            //tampilkan pesan
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            
            //tampilkan data produk 
            $data['produk']=$this->model_produk->cek($id)->row_array();
            $this->load->view('admin/edit',$data);
        }else{
            $data['produk']=$this->model_produk->cek($id)->row_array();
            $data['message']="";
            $this->load->view('admin/edit',$data);
        }
    }
    
    
    function tambah(){
        $data['title']="Tambah Data Produk";
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $name=$this->input->post('name');
            $cek=$this->model_produk->cek($name);
            if($cek->num_rows()>0){
                $data['message']="<div class='alert alert-warning'>Nis sudah digunakan</div>";
                $this->load->view('produk/tambah',$data);
            }else{
                //setting konfiguras upload image
                  $config['upload_path'] = './image/products/';
                  $config['allowed_types'] = 'gif|jpg|png';
                  //$config['max_size']    = '1000';
                  //$config['max_width']  = '2000';
                  //$config['max_height']  = '1024';
                
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('gambar')){
                    $gambar="";
                }else{
                    $gambar=$this->upload->file_name;
                }
                
                $info=array(
                    'name'=>$this->input->post('name'),
                    'price'=>$this->input->post('price'),
                    'option_name'=>$this->input->post('option_name'),
                    'option_values'=>$this->input->post('option_values'),
                    'image'=>$this->input->post('gambar'),
                    'image'=>$gambar
                );
                $this->model_produk->simpan($info);
                redirect('produk/index/add_success');
            }
        }else{
            $data['message']="";
            $this->load->view('admin/tambah',$data);
        }
    }
    
    
    function hapus($id){
        $this->model_produk->hapus($id);
        redirect('produk');
    }
    
    
    function _set_rules(){
        $this->form_validation->set_rules('name','name','required|max_length[10]');
        $this->form_validation->set_rules('price','Price','required|max_length[50]');
        $this->form_validation->set_rules('option_name','Option name','required|max_length[120]');
        $this->form_validation->set_rules('option_values','Option values','required');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}