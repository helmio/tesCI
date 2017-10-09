<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller {
    
    //function yg selalu di panggil ketika Class diakses
    public function __construct()
       {
            parent::__construct();
            $this->load->model('m_product');
            $this->load->helper('form');
       }
       
    public function index() // yg pertaman kali dipaggil Controlloer
    {
        $data['products'] = $this->m_product->get_all();        
        
        $this->load->view('view_product', $data);
        
    }

    public function add() 
    {
        $product = $this->m_product->get_by_id($this->input->post('id'));
        
        $insert = array(
            'id' => $this->input->post('id'),
            /*'qty' => 1, jk order 1*/
            'qty' => $this->input->post('qty'),
            'price' => $product['price'],
            'name' => $product['name']
        );
        
        if($product['option_name']) {
            $insert['options'] = array(
                $product['option_name'] => $this->input->post('option_value')            
            );        
        }
    
    $this->cart->insert($insert);
    
    redirect('shop');
    
    }

    public function delete($row_id) 
    {
        $this->cart->update(array(
            'rowid' => $row_id,
            'qty' => 0
        ));
        
        redirect('shop');
    
    }

    public function edit($row_id) 
    {
        $this->cart->update(array(
            'rowid' => $row_id,
            'qty' => $this->input->post('qty')
        ));
        
        redirect('shop');
    
    }

}

/*|-lable yg muncul di error
$this->form_validation->set_rules('username', 'Username', 'required');
                                        |
                                        |__ name, field db, rules validation

*/

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

