<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Transaction extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model("item_model");
 }

    public function transaction_item_details()
    {    
        if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {
        $id = $this->uri->segment(3);
        $data['transaction_details'] = $this->item_model->item_history($id);
        $data['print_details'] = $this->item_model->item_history_print($id);
        $data['transaction_group'] = $this->item_model->item_history_group($id);
        $data['pid'] = $this->uri->segment(4);
      
        $this->load->view('scaffolds/header'); 
        $this->load->view('scaffolds/sidebar');
        $this->load->view('item_history', $data);
        $this->load->view('scaffolds/footer');
      }
       else 
       {
          redirect('login', 'refresh');
        }   

    }

   public function update_history()
   {
     if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {
        $id = $this->uri->segment(3);
        $data['transaction_details'] = $this->item_model->item_history_individual($id);
        $data['transaction_details1'] = $this->item_model->item_history_individual1($id);
        $data['transaction_group'] = $this->item_model->item_history_group($id);
        $data['pid'] = $this->uri->segment(3);

        $this->load->view('scaffolds/header'); 
        $this->load->view('scaffolds/sidebar');
        $this->load->view('update_history', $data);
        $this->load->view('scaffolds/footer');
        }
      else 
        {
           redirect('login', 'refresh');
        }
  }

     public function do_update_history()
   {
      if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {
        $transaction_id = $this->input->post('transaction_id');
        $item_date = $this->input->post('item_date');
        $invoice_no = $this->input->post('invoice_no'); 
        $company_name = $this->input->post('company_name'); 

        if ($this->input->post('submit')) 
        {
           $this->item_model->do_update_history($transaction_id, $invoice_no, $item_date, $company_name); 
        }
        }
       else 
        {
           redirect('login', 'refresh');
        }
     
   }

}

/* End of file transaction.php */
/* Location: ./application/controllers/transaction.php */