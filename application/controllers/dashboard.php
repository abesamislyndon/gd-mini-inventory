<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Dashboard extends CI_Controller
{
  function __construct()
 {
   parent::__construct();
   $this->load->model('item_model');
 }
	
	public function  index()
	{
	  if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
     {
			
			$data['item_info']  = $this->item_model->item_info_dashboard();
			$data['top_item_quote']  = $this->item_model->top_quoted_item_dashboard();
        	$data['data1']  = $this->item_model->quote_dashboard();
        	$data['zero_bal'] = $this->item_model->zero_balance_dashboard();
        	$data['customer'] = $this->item_model->customer_dashboard();

			$this->load->view('scaffolds/header');
			$this->load->view('scaffolds/sidebar');
			$this->load->view('dashboard', $data);
			$this->load->view('scaffolds/footer', $data);	
		}
		else
		{
			redirect('login', 'refresh');
		}
  	 }
}


/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */