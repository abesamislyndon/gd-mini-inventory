<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Main extends CI_Controller {

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
        $data['category'] = $this->category_model->show_category();

        if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {
		$this->load->view('scaffolds/header'); 
		$this->load->view('scaffolds/sidebar');
		$this->load->view('main', $data);
		$this->load->view('scaffolds/footer');
		}
		else 
		{
          redirect('login', 'refresh');
        }
	}

	
     public function item_details($id = 0)
	 {   

		if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {
 
        $data['item_individual']  = $this->item_model->get_item($id);
  
    	$this->load->view('model_form/update_in_out_item', $data);
		}
	   else 
		{
          redirect('login', 'refresh');
        }
	} 
	

	public function search_item()
	{   
	   if(isset($_GET['item']))
		{
		  $search_data=$_GET['item'];
		}
				
        $config = array();
        $config["base_url"] = base_url().'main/index';
        $config["total_rows"] = $this->item_model->record_count();
        $config["per_page"] = 12;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
 
        $this->pagination->initialize($config);
        $search_data = $this->input->post('search_data', TRUE);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["item_dashboard_details"] = $this->item_model->fetch_item($config["per_page"], $page, $search_data);
        $data["links"] = $this->pagination->create_links();
       
        if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {
		$this->load->view('scaffolds/header'); 
		$this->load->view('scaffolds/sidebar');
		$this->load->view('main', $data);
		$this->load->view('scaffolds/footer');
		}
		else 
		{
          redirect('login', 'refresh');
        }
	}


	public function inventory()
	{   
        
        $config = array();
        $config["base_url"] = base_url().'main/inventory';
        $config["total_rows"] = $this->item_model->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
 
      $this->pagination->initialize($config);
        $search_data = $this->input->post('search_data', TRUE);
        
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
        $data["item_dashboard_details"] = $this->item_model->fetch_item($config["per_page"], $page, $search_data);
        $data["links"] = $this->pagination->create_links();
        $data['pid'] = $this->uri->segment(3);
       
        if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {
		$this->load->view('scaffolds/header'); 
		$this->load->view('scaffolds/sidebar');
		$this->load->view('inventory', $data);
		$this->load->view('scaffolds/footer');
		}
		else 
		{
          redirect('login', 'refresh');
        }
	}

}

/* End of file main.php */
/* Location: ./application/controllers/main.php */