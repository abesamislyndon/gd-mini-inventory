<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
session_start();

class Create_pdf extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("item_model");
        
    }
    
    // *************************** CREATE PDF Controller ***************************************************************
    
    public function print_history()
    {
        
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $id                          = $this->uri->segment(3);
            $data['transaction_details'] = $this->item_model->item_history($id);
            $data['print_details']       = $this->item_model->item_history_print($id);
            $this->load->view('print_history', $data);
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function print_history_search()
    {
        
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $id     = $this->uri->segment(3);
            $search = $this->session->userdata('search');
            
            $data['transaction_details'] = $this->item_model->item_history_search($id, $search);
            $data['print_details']       = $this->item_model->item_history_print_search($id, $search);
            $this->load->view('print_history', $data);
        } else {
            redirect('login', 'refresh');
        }
    }
    
    
    public function print_all_item()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $search                         = '';
            $data["item_dashboard_details"] = $this->item_model->fetch_item_print($search);
            $this->load->view('print_all', $data);
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function print_all_item_search()
    {
        
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $search                         = $this->session->userdata('search');
            $data["item_dashboard_details"] = $this->item_model->fetch_item_print($search);
            $this->load->view('print_all', $data);
        } else {
            redirect('login', 'refresh');
        }
    }
    
    
    
    
}
/* End of file create_pdf.php */
/* Location: ./application/controllers/create_pdf.php */