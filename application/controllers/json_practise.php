<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');

class Json_practise extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('quote_model');
    }
    public function index()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $data  = $this->quote_model->show_quote_json();
            $data1 = json_encode($data);
            $this->load->view('scaffolds/header');
            $this->load->view('scaffolds/sidebar');
            $this->load->view('json_practise', $data1);
            $this->load->view('scaffolds/footer_json');
        } else {
            redirect('login', 'refresh');
        }
    }
    
    
    public function json()
    {
        
        // $data = $this->quote_model->show_quote_json();
        // $data1 = json_encode($data);
        //echo $data1;
        
        $this->load->view('js');
        
    }
    
    public function delete()
    {
        $id                 = $this->uri->segment(3);
        $data['name']       = $this->quote_model->show_quote_name($id);
        $data['quote_list'] = $this->quote_model->customer_delete($id);
        
        $this->load->view('scaffolds/header');
        $this->load->view('scaffolds/sidebar');
        $this->load->view('quote_individual', $data);
        $this->load->view('scaffolds/footer');
    }
    
    
    
}
/* End of file quotelist.php */
/* Location: ./application/controllers/quotelist.php */