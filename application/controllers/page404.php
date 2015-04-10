<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page404 extends CI_Controller {

   public  function index()
    { 
    	$this->load->view('scaffolds/header_supplier');  
   		$this->load->view('page404');
   		$this->load->view('scaffolds/supplier_footer');
    }


    

}
/* End of file page404.php */
/* Location: ./application/controllers/page404.php */