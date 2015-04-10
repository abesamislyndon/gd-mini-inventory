<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Checkout extends CI_Controller {

function __construct()
 {
   parent::__construct();
   $this->load->model('category_model');
   $this->load->model('quote_model');
   $this->load->model('item_model'); 
   $this->load->library('cart');  
 }

 public function index()
    {       
       $data['category'] = $this->category_model->show_category();
        $this->load->view('scaffolds/header_supplier'); 
        $this->load->view('scaffolds/sidebar_supplier');
        $this->load->view('checkout',$data);
        $this->load->view('scaffolds/supplier_footer');
    }

 public function do_checkout()
    {
       $this->load->library('cart');
       $this->load->model('category_model');
       $this->load->model('quote_model');
      
       if($this->input->post('submit'))
       {
         $this->quote_model->customer_quoted();
       }
   } 

}
/* End of file checkout.php */
/* Location: ./application/controllers/checkout.php */



