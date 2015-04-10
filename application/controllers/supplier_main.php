<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Supplier_main extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('category_model');
   $this->load->model('item_model');
   $this->load->model('upload_model');  
   $this->load->library('cart');
   $this->load->model('quote_model');    
 }
   public function index()
	{   
    
   $data["category"] = $this->category_model->show_category();   
    if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '2')
    {
  		$this->load->view('scaffolds/header_supplier'); 
  		$this->load->view('scaffolds/sidebar_supplier');
  		$this->load->view('supplier_main', $data);
  		$this->load->view('scaffolds/supplier_footer');
		}
		else 
		{
          redirect('login', 'refresh');
        }
	}

    public function item_details($id = 0)
	 {   

		if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '2')
        { 
        $data['item_individual']  = $this->item_model->get_item($id);
    	$this->load->view('model_form/update_in_out_item', $data);
		}
	   else 
		{
          redirect('login', 'refresh');
        }
	 } 

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */