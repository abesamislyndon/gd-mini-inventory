<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
session_start();

class Update_item extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('item_model');
    }
    
    public function item_details()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $id                      = $this->uri->segment(3);
            $data['category']        = $this->category_model->show_category();
            $data['item_individual'] = $this->item_model->get_item($id);
       

            $this->load->view('modal_form/update_in_out_item', $data);
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function update_item_individual()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {    
            $id             = $this->input->post('id', TRUE);
            $item_category  = $this->input->post('item_category', TRUE);
            $item_quantity  = $this->input->post('item_quantity', TRUE);
            $item_quantity1 = $this->input->post('item_quantity1', TRUE);
            $company_name   = $this->input->post('company_name', TRUE);
            $item_date      = $this->input->post('item_date', TRUE);
            $invoice_no     = $this->input->post('invoice_no', TRUE);
            
            if ($this->input->post('submit') == 'add_qty') 
            {
                $this->item_model->do_add_update_item($item_quantity, $id, $company_name, $item_quantity1, $item_date, $invoice_no, $item_category);
            } 
            elseif ($this->input->post('submit') == 'sub_qty') 
            {
                $this->item_model->do_sub_update_item($item_quantity, $id, $company_name, $item_quantity1, $item_date, $invoice_no, $item_category);
            } 
            elseif ($this->input->post('submit') == 'update_info') 
            {
                $config['upload_path']   = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '1024';
                $config['max_width']     = '1024';
                $config['max_height']    = '768';
                $this->upload->initialize($config);
                $this->load->library('upload', $config);

                 if(!$this->upload->do_upload())
                 {
                    $this->item_model->do_update_item_info_wo_photo($id, $item_category);   
                 } 
                 else
                 {         
                    $data = $this->upload->data();
                    $this->thumb($data);             
                    $this->item_model->do_update_item_info($id, $item_category, $data);   
                }
             } 
            }
            else {
                redirect('login', 'refresh');
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

    
    public function update_item_info()
    {
        if ($this->session->userdata('logged_in') && $this->session->userdata['logged_in']['role_code'] == '1') {
            $id = $this->uri->segment(3);
            $this->load->model("item_model");
            $data['item_individual'] = $this->item_model->get_item($id);
            $data['category']        = $this->category_model->show_category();

            $this->load->view('modal_form/update_item_info', $data);
        } else {
            redirect('login', 'refresh');
        }
    }
    
    public function delete_item()
    {
        $item_category = $this->input->post('item_category');
        $id            = $this->uri->segment(3);
        $this->item_model->do_delete_item($id, $item_category);
    }
    
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */