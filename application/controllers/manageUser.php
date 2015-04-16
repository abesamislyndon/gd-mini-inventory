<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class ManageUser extends CI_Controller
{
  function __construct()
   {
     parent::__construct();
     $this->load->model('user');
   }
	
	public function  add_user()
	{
	  if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
    {
			$this->load->view('scaffolds/header');
			$this->load->view('scaffolds/sidebar');
			$this->load->view('add_user');
			$this->load->view('scaffolds/footer');	
		}
		else
		{
			redirect('login', 'refresh');
		}
  	 }

  	public function do_add_user()
  	{
       if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
       {
  	    $this->load->model('user');  
  	    $full_name = $this->input->post('full_name');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password1 = $this->input->post('password1');
        $role_code = $this->input->post('role_code');
    
        if ($this->input->post('submit')) 
        {
          $this->user->do_add_user_model($full_name, $username, $password, $password1, $role_code);
        }  
       }
      else
      {
        redirect('login', 'refresh');
      } 
  	}

    public function account_list()
    {
       if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
       {   
            $data['list'] = $this->user->user_all_list();
     
            $this->load->view('scaffolds/header');
            $this->load->view('scaffolds/sidebar');
            $this->load->view('userlist', $data);
            $this->load->view('scaffolds/footer');  
       }
      else{
         redirect('login', 'refresh');
       }

    }
  public function del_user()
    {   
        $id = $this->uri->segment(3);
        $delete =  $this->user->do_user_del($id);
    }

}


/* End of file .php */
/* Location: ./application/controllers/main.php */