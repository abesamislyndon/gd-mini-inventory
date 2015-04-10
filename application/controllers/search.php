<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Search extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

    public function index()
    {   
        if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
    {  
        $this->load->model('item_model');
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
 }
/* End of file item.php */
/* Location: ./application/controllers/Category.php */