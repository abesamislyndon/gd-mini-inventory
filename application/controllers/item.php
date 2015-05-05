<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Item extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('category_model');
   $this->load->model('item_model');
   $this->load->model('upload_model');  
   $this->load->library('cart');
   $this->load->model('quote_model');    
 }

	public function add_item()
	{  
     if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
     {
        $data['category'] = $this->category_model->show_category();
    		$this->load->view('scaffolds/header'); 
    		$this->load->view('scaffolds/sidebar');
    		$this->load->view('add_new_product',$data);
    		$this->load->view('scaffolds/footer');
	   }
    else
      {
        redirect('login', 'refresh');
      }
    }

  public function do_add_item()
	{	
     if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
     {
	     	
		        $item_name  = $this->input->post('name', TRUE);
		        $item_no    = $this->input->post('item_no', TRUE);
		        $item_category  = $this->input->post('id_cat', TRUE);
		        $item_date  = $this->input->post('item_date', TRUE);
            $item_sell_price = $this->input->post('price', TRUE);
            $item_pur_price = $this->input->post('item_pur_price', TRUE);
            $item_quantity = $this->input->post('item_quantity', TRUE);
            $brand = $this->input->post('brand', TRUE);
            $spec = $this->input->post('spec', TRUE);

            $id = $this->uri->segment(3);    
            if ($this->input->post('submit')) 
            {    
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '1024';
            $config['max_width']     = '1024';
            $config['max_height']    = '768';
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload())
               {
                $error = array(
                    'error' => $this->upload->display_errors()
                );
             
                $data = $this->upload->data();
                $this->thumb($data);             
                $this->item_model->do_insert_item($item_name, $item_category, $item_no, $item_date,$item_sell_price,$item_pur_price,$item_quantity, $data,$brand, $spec);    
               } 
              else 
              {
                $data = $this->upload->data();
                $this->thumb($data);             
                $this->item_model->do_insert_item($item_name, $item_category, $item_no, $item_date,$item_sell_price,$item_pur_price,$item_quantity, $data,$brand, $spec);    
              }
         } 
         else 
         {
            redirect(site_url('upload'));
         }
      }
       else
       {
            redirect('login', 'refresh');    
        } 
    }

  public function  check_item_no()
   {
            $item_no =  $this->input->post('item_no');
            $result  =  $this->item_model->check_item_no_exist($item_no);
            if($result)
            {
                echo "false"; 
            }
            else
            {
               echo "true";
            }      
   }
    
    public function thumb($data)
    {
        $config['image_library']  = 'gd2';
        $config['source_image']   = $data['full_path'];
        $config['create_thumb']   = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width']          = 275;
        $config['height']         = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }

    public function category()
    {
        $id = $this->uri->segment(3);    
        $config = array();
        $config["base_url"] = base_url().'main/index';
        $config["total_rows"] = $this->item_model->record_count();
        $config["per_page"] = 5;
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
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["item_dashboard_details"] = $this->item_model->fetch_category($config["per_page"], $page,  $id);
        $data["links"] = $this->pagination->create_links();
        $data['products'] = $this->quote_model->retrieve_products($id);
    
        
        if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '2')
        {

        $this->load->view('scaffolds/header_supplier'); 
        $this->load->view('scaffolds/sidebar_supplier');
        $this->load->view('category', $data);
        $this->load->view('scaffolds/supplier_footer');
      
        }
        else 
        {
          redirect('login', 'refresh');
        }
    }

   function main_category()
    {

        $id = $this->uri->segment(3);         
        $config = array();
        $config["base_url"] = base_url().'item/main_category/'.$id;
        $config["total_rows"] = $this->item_model->record_count();
        $config["per_page"] = 200;
        $config["uri_segment"] = 4;
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
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //$data["item_dashboard_details"] = $this->item_model->fetch_category($config["per_page"], $page,  $id);
        $data["links"] = $this->pagination->create_links();
        $data['products'] = $this->quote_model->retrieve_products($id);
    
        
        if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {

        $this->load->view('scaffolds/header'); 
        $this->load->view('scaffolds/sidebar');
        $this->load->view('main_category', $data);
        $this->load->view('scaffolds/footer');
      
        }
        else 
        {
          redirect('login', 'refresh');
        }
    }

       function individual_update()
    {

        $id = $this->uri->segment(3);         
        $config = array();
        $config["base_url"] = base_url().'item/individual/'.$id;
        $config["total_rows"] = $this->item_model->record_count();
        $config["per_page"] = 200;
        $config["uri_segment"] = 4;
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
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        //$data["item_dashboard_details"] = $this->item_model->fetch_category($config["per_page"], $page,  $id);
        $data["links"] = $this->pagination->create_links();
        $data['products'] = $this->quote_model->individual_update($id);
    
        
        if($this->session->userdata('logged_in')&&$this->session->userdata['logged_in']['role_code'] == '1')
        {

        $this->load->view('scaffolds/header'); 
        $this->load->view('scaffolds/sidebar');
        $this->load->view('main_category', $data);
        $this->load->view('scaffolds/footer');
      
        }
        else 
        {
          redirect('login', 'refresh');
        }
    }




   public function add_cart_item()
   {
    $id = $this->input->post('cat');

   if($this->quote_model->validate_add_cart_item() == TRUE)
    {
        if($this->input->post('ajax') != '1')
        {
            redirect('item/category/'.$id); // If javascript is not enabled, reload the page with new data
        }
       else
       {
        echo 'true'; // If javascript is enabled, return true, so the cart gets updated
      }
    }
 }

 public function do_edit()
  {    
      
      $id = $this->input->post('cat');
          
     if($this->input->post('update'))
     {
      $this->quote_model->validate_update_cart();
      redirect('item/category/'.$id);
     }
     elseif($this->input->post('delete'))    
     {
      $this->cart->destroy();
      redirect('item/category/'.$id);
     }
     else
      {
          $rowid = $this->input->post('rowid');
          foreach ($rowid as $value) 
          {
           $this->cart->update(array(
           'rowid' => $value,
           'qty' => 0
          ));
         redirect('item/category/'.$id);
        }  
     }   
  }
  

  public function item_spec()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $id                      = $this->uri->segment(3);
            $data['category']        = $this->category_model->show_category();
            $data['item_individual'] = $this->item_model->get_item($id);
       

            $this->load->view('modal_form/spec', $data);
        } else {
            redirect('login', 'refresh');
        }
    }


}

/* End of file item.php */
/* Location: ./application/controllers/item.php */