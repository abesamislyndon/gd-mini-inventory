<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
session_start();
class Category extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
    }
    
    public function add_category()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $data['category'] = $this->category_model->show_category();
            $this->load->view('scaffolds/header');
            $this->load->view('scaffolds/sidebar');
            $this->load->view('add_new_category', $data);
            $this->load->view('scaffolds/footer');
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function do_add_category()
    {
        $category = $this->input->post('cat_name', TRUE);
        
        if ($this->input->post('submit')) {
            $this->category_model->do_insert_category($category);
        }
    }
    
    
    public function update_cat_info()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $id                     = $this->uri->segment(3);
            $data['cat_individual'] = $this->category_model->get_item($id);
            $this->load->view('modal_form/update_cat_info', $data);
        } else {
            redirect('login', 'refresh');
        }
    }
    
    
    public function do_update_cat_info()
    {
        
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            
            $cat_name = $this->input->post('cat_name', TRUE);
            $id       = $this->input->post('id', TRUE);
            
            if ($this->input->post('submit') == 'up_cat') {
                $this->category_model->do_update_cat($cat_name, $id);
            } else {
                redirect('login', 'refresh');
            }
        }
    }
}
/* End of file category.php */
/* Location: ./application/controllers/category.php */