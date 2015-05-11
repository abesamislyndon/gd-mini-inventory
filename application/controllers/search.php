<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Search extends CI_Controller {

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
        if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
    {  
        $search = $this->input->post('search');
        $category = $this->uri->segment(3);
        $data['search_item'] = $this->item_model->show_search_item($search, $category);
        $this->session->set_userdata('search',$search);
    
        $this->load->view('scaffolds/header'); 
        $this->load->view('scaffolds/sidebar');
        $this->load->view('table_result',$data);
        $this->load->view('scaffolds/footer');
     }
       else
        {
            redirect('login', 'refresh');
        }
    }

  

   public function  do_search_item_history()
    {   
        if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
    {  
        $search = $this->input->post('search');
        $item_id = $this->input->post('item_id');
       // $data['search_item'] = $this->item_model->show_search_item_history($search, $item_id);
        $this->session->set_userdata('search',$search);
    
        $data['print_details'] = $this->item_model->show_search_item_history($search, $item_id);
        $data['print_details1'] = $this->item_model->show_item_history_print($search, $item_id);
        $data['transaction_group'] = $this->item_model->item_history_group($item_id);
        $data['pid'] = $this->uri->segment(4);
      

        $this->load->view('scaffolds/header'); 
        $this->load->view('scaffolds/sidebar');
        $this->load->view('item_history_search', $data);
        $this->load->view('scaffolds/footer');

     }
       else
        {
            redirect('login', 'refresh');
        }
    }



 }
/* End of file item.php */
/* Location: ./application/controllers/Category.php */