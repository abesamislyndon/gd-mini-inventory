<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Category extends CI_Controller {
 function __construct()
 {
   parent::__construct();
    $this->load->model('category_model');
 }

    public function add_category()
    {    
       if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {
          $data['category'] = $this->category_model->show_category();
          $this->load->view('scaffolds/header'); 
          $this->load->view('scaffolds/sidebar');
          $this->load->view('add_new_category',$data);
          $this->load->view('scaffolds/footer');
        }
        else 
        {
          redirect('login', 'refresh');
        }
    }

    public function do_add_category()
    {
         $category = $this->input->post('cat_name', TRUE);

         if ($this->input->post('submit')) 
         {  
            $this->category_model->do_insert_category($category);
         }    
    }

}
/* End of file category.php */
/* Location: ./application/controllers/category.php */