<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Quote extends CI_Controller {

   public  function index()
    {
        $this->load->model('quote_model'); 
        $data['products'] = $this->quote_model->retrieve_products();
    }

    

}
/* End of file quote.php */
/* Location: ./application/controllers/quote.php */