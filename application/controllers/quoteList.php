<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class QuoteList extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('quote_model');    
 }
    public function index()
    { 
       if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {
           $data['quote_list'] = $this->quote_model->show_quote();
           $this->load->view('scaffolds/header'); 
           $this->load->view('scaffolds/sidebar');
           $this->load->view('quoteList',$data);
           $this->load->view('scaffolds/footer');
       }
       else 
        {
           redirect('login', 'refresh');
        }
    }


    public function  customer()
    {

      if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        { 
        $id = $this->uri->segment(3);
        $data['name'] = $this->quote_model->show_quote_name($id);
        $data['quote_list'] = $this->quote_model->customer_quote_details($id);

        $this->load->view('scaffolds/header'); 
        $this->load->view('scaffolds/sidebar');
        $this->load->view('quote_individual',$data);
        $this->load->view('scaffolds/footer');
        }
        else 
        {
           redirect('login', 'refresh');
        }
    }
 
   public function  delete()
    {
    if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        { 
        $id = $this->uri->segment(3);
        $data['name'] = $this->quote_model->show_quote_name($id);
        $data['quote_list'] = $this->quote_model->customer_delete($id);

        $this->load->view('scaffolds/header'); 
        $this->load->view('scaffolds/sidebar');
        $this->load->view('quote_individual',$data);
        $this->load->view('scaffolds/footer');
        }
      else 
        {
           redirect('login', 'refresh');
        }
     }   
}
/* End of file quotelist.php */
/* Location: ./application/controllers/quotelist.php */