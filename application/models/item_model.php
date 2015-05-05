<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Item_model extends CI_Model
{
    public function item_dashboard_details()
    {
        
        $this->db->select('*');
        $this->db->from('item');
        $this->db->join('uploads', 'item.id = uploads.id', 'inner');
        
        $query = $this->db->get();
        return $result = $query->result();
        
    }


    
    public function do_insert_item($item_name, $item_category, $item_no, $item_date, $item_pur_price, $item_sell_price, $item_quantity, $data, $brand, $spec)
    {
    
        $cal_date   = $item_date;
        $format     = strtotime($cal_date);
        $mysql_date = date('Y-m-d H:i:s', $format);

        $row = array(
            'name' => $item_name,
            'id_cat' => $item_category,
            'item_category' => $item_category,
            'item_no' => $item_no,
            'item_date' => $mysql_date,
            'item_pur_price' => $item_pur_price,
            'price' => $item_sell_price,
            'item_quantity' => $item_quantity,
            'brand' => $brand,
            'spec'=>$spec
        );

        $this->db->insert('item', $row);
        $id = $this->db->insert_id();
     /*   
        $row2 = array(
            'name' => $item_name,
            'price' => $item_sell_price,
            'id' => $id
        );
        $this->db->insert('item_cart', $row2);
     */        
        $file = array(
            'img_name' => $data['raw_name'],
            'thumb_name' => $data['raw_name'] . '_thumb',
            'ext' => $data['file_ext'],
            'upload_date' => time(),
            'id' => $id
        );
        
        $data = array(
            'upload_data' => $this->upload->data()
        );
        
        $this->db->insert('uploads', $file);
        $this->session->set_flashdata('msg', 'item succesfully added');
        redirect('item/add_item');
     
           
        }



 public function  check_item_no_exist($item_no)
      {
        $this->db->where("item_no", $item_no);
        $query = $this->db->get("item");
        if ($query->num_rows() > 0)
            {
            return true;
            }
          else
            {
            return false;
            }
        }

    public function get_item($id)
    {
        $this->db->select('*');
        $this->db->from('item');
        $this->db->join('uploads', 'item.id = uploads.id', 'inner');
        $this->db->join('item_category', 'item.item_category = item_category.cat_id', 'inner');
        $this->db->where('item.id', $id)->group_by('item.id');
        $query = $this->db->get();
        return $result = $query->result();
    }
    
    public function record_count()
    {
        return $this->db->count_all("item");
    }
    
    public function fetch_item($limit, $start)
    {
        $this->db->from('item');
        $this->db->join('uploads', 'item.id = uploads.id', 'inner');
        $this->db->join('item_category', 'item.item_category = item_category.cat_id', 'inner');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
     
    public function fetch_category($limit, $start, $id)
    {
        if ($id == 'SmallMachines') {
            $cat = 'Small Machines';
        } elseif ($id == "MetalWorkingMachines") {
            $cat = 'Metal Working Machines';
        } elseif ($id == "WeldingEquip") {
            $cat = 'Welding Equipments';
        } elseif ($id == "WoodWorkingMachines") {
            $cat = 'Wood Working Machines';
        } elseif ($id == "HardwareToolSupplies") {
            $cat = 'Hardware & Tooling Supplies';
        } elseif ($id == 'MaterialEquip') {
            $cat = 'Material Handling Equipment';
        } elseif ($id == 'AirCompressor') {
            $cat = 'Air Compressor';
        } elseif ($id == "ConstructionEquip") {
            $cat = 'Construction Equipments';
        }
        
        
        
        $this->db->from('item');
        $this->db->join('uploads', 'item.id = uploads.id', 'inner');
        $this->db->where('item_category', urlencode($id));
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
        
        
    }
    public function fetch_history($limit, $start)
    {
        
        $this->db->from('item');
        $this->db->join('transaction', 'item.id = transaction.id', 'inner');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function do_add_update_item($item_quantity, $id, $company_name, $item_quantity1, $item_date, $invoice_no, $item_category)
    {
        
       // $cal_date   = date('Y-m-d H:i:s');
      //  $format     = strtotime($cal_date);
        $mysql_date =  date('Y-m-d H:i:s');
        
        $this->db->select('*');
        $this->db->from('item');
        $this->db->join('transaction', 'item.id = transaction.id', 'inner');
        $item_add = "item_quantity +" . $item_quantity;
        $this->db->set('item.item_quantity', $item_add, FALSE);
        $this->db->where('item.id', $id);
        $this->db->update('item');
        $action = 'stock in';
        $bal    = $item_quantity1 + $item_quantity;
        
        $result = array(
            'quantity_in' => $item_quantity,
            'id' => $id,
            'company_name' => $company_name,
            'item_date' => $mysql_date,
            'action' => $action,
            'stock_bal' => $bal,
            'invoice_no' => $invoice_no
        );
        $this->db->insert('transaction', $result);
        
        $this->session->set_flashdata('msg', 'quantity updated');
        redirect('item/individual_update/' . $id);
    }
    
    public function do_sub_update_item($item_quantity, $id, $company_name, $item_quantity1, $item_date, $invoice_no, $item_category)
    {     
         //$cal_date   = $item_date;
         //$format     = strtotime($cal_date);
         $mysql_date =  date('Y-m-d H:i:s');
        
       if($item_quantity <= $item_quantity1) 
        {
            $item_add = "item_quantity -" . $item_quantity; 
            $this->db->set('item_quantity', $item_add, FALSE);
            $this->db->where('id', $id);
            $this->db->update('item');
            $action = 'stock out';
            $bal    = $item_quantity1 - $item_quantity;
       
            $result = array(
                'quantity_in' => $item_quantity,
                'id' => $id,
                'item_date' => $mysql_date,
                'company_name' => $company_name,
                'action' => $action,
                'stock_bal' => $bal,
                'invoice_no' => $invoice_no
            );
            $this->session->set_flashdata('msg', 'succesfully decrease item'); 
            $this->db->insert('transaction', $result);
        }
        else
        {
        $this->session->set_flashdata('msg', 'ITEM QUANTIY MUST SMALLER OR EQUAL TO ACTUAL BALANCE'); 
        }
        redirect('item/individual_update/' . $id);
    }
    
    public function item_history($id)
    {
        $this->db->select('*');
        $this->db->from('item');
        $this->db->join('transaction', 'item.id = transaction.id', 'inner');
        $this->db->where('transaction.id', $id);
        
        $query = $this->db->get();
        return $result = $query->result();
        
    }

    public function item_history_group($id)
    {
        $this->db->select('*');
        $this->db->from('item');
        $this->db->join('transaction', 'item.id = transaction.id', 'inner');
        $this->db->where('transaction.id', $id)->group_by('item.name');
        
        $query = $this->db->get();
        return $result = $query->result();
        
    }
    
    public function item_history_individual($id)
    {
        $this->db->select('*');
        $this->db->from('transaction');
        $this->db->join('item', 'item.id = transaction.id');
        $this->db->where('transaction.transaction_id', $id);
        $query = $this->db->get();
        return $result = $query->result();
        
    }
        public function item_history_individual1($id)
    {
        $this->db->select('*');
        $this->db->from('transaction');
       // $this->db->join('item', 'item.id = transaction.id');
        $this->db->where('transaction.transaction_id', $id);
        $query = $this->db->get();
        return $result = $query->result();
        
    }
    
    
    public function item_history_print($id)
    {
        $this->db->select('*');
        $this->db->from('item');
        $this->db->join('transaction', 'item.id = transaction.id', 'inner');
        $this->db->where('transaction.id', $id)->group_by('transaction.id');
        $query = $this->db->get();
        return $result = $query->result();
        
    }
    
    public function do_update_item_info($id, $item_category, $data)
    {
        
        
        $this->load->helper('date');
        $item_name       = $this->input->post('name');
        $item_no         = $this->input->post('item_no', TRUE);
        $item_category   = $this->input->post('item_category', TRUE);
        $item_date       = $this->input->post('item_date', TRUE);
        $item_pur_price  = $this->input->post('item_pur_price', TRUE);
        $item_sell_price = $this->input->post('price', TRUE);
        
        $row = array(
            'name' => $item_name,
            'item_no' => $item_no,
            'item_category' => $item_category,
            'item_date' => date('Y-m-d H:i:s', now()),
            'item_pur_price' => $item_pur_price,
            'price' => $item_sell_price
        );
        
        $this->db->where('id', $id);
        $this->db->update('item', $row);


        $file = array(
            'img_name' => $data['raw_name'],
            'thumb_name' => $data['raw_name'] . '_thumb',
            'ext' => $data['file_ext'],
            'upload_date' => time(),
            'id' => $id
        );
        
        $data = array(
            'upload_data' => $this->upload->data()
        );
        
        $this->db->where('id', $id);
        $this->db->update('uploads', $file);

        
        $this->session->set_flashdata('msg', 'item info updated');
        redirect('item/individual_update/' . $id);
    }

    public function do_update_item_info_wo_photo($id, $item_category)
    {
        $this->load->helper('date');
        $item_name       = $this->input->post('name');
        $item_no         = $this->input->post('item_no', TRUE);
        $item_category   = $this->input->post('item_category', TRUE);
        $item_date       = $this->input->post('item_date', TRUE);
        $item_pur_price  = $this->input->post('item_pur_price', TRUE);
        $item_sell_price = $this->input->post('price', TRUE);
        
        $row = array(
            'name' => $item_name,
            'item_no' => $item_no,
            'item_category' => $item_category,
            'item_date' => date('Y-m-d H:i:s', now()),
            'item_pur_price' => $item_pur_price,
            'price' => $item_sell_price
        );
        
        $this->db->where('id', $id);
        $this->db->update('item', $row);


        $this->session->set_flashdata('msg', 'item info updated');
        redirect('item/individual_update/' . $id);
    }
    
    public function do_update_history($transaction_id, $invoice_no, $item_date, $company_name)
    {
        
        $this->load->helper('date');
        $cal_date   = $item_date;
        $format     = strtotime($cal_date);
        $mysql_date = date('Y-m-d H:i:s', $format);
        
        $row = array(
            'invoice_no' => $invoice_no,
            'item_date' => $mysql_date,
             'company_name' => $company_name
        );
        
        $this->db->from('transaction');
        $this->db->where('transaction_id', $transaction_id);
        $this->db->update('transaction', $row);
        
        $this->session->set_flashdata('msg', 'item info updated');
        redirect('transaction/update_history/' . $transaction_id);
        
        
    }
    
    public function do_delete_item($id, $item_category)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->delete('item');
        
        $this->session->set_flashdata('msg', 'SUCCESFULLY delete');
        redirect('main/inventory/');
    }
    
    public function retrieve_products()
    {
        $query = $this->db->get('item_cart');
        return $query->result_array();
    }
    
    public function show_search_item($search, $category)
    {
        
        $this->db->select('*');
        $this->db->from('item');
        $this->db->join('uploads', 'item.id = uploads.id', 'inner');
        $this->db->join('item_category', 'item.item_category = item_category.cat_id', 'inner');
        $this->db->like('item.name', $search);
        $this->db->or_like('item_category.cat_name', $search);
        $this->db->or_like('item.item_no', $search);
        $this->db->or_like('item.brand', $search);
        $query = $this->db->get();
        return $query->result_array();
        
    }
    
    public function item_info_dashboard()
    {
        
        $this->db->select('cat_name');
        $this->db->select('item_category, COUNT(item_category) as total');
        $this->db->from('item');
        $this->db->join('item_category', 'item.item_category = item_category.cat_id', 'inner');
        $this->db->group_by('item.item_category');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();
        
    }
    public function top_quoted_item_dashboard()
    {
        
        $this->db->select('*');
        $this->db->select('item_name, COUNT(item_name) as total');
        $this->db->from('quote_transaction');
        $this->db->join('item', 'item.id = quote_transaction.item_id', 'inner');
        $this->db->group_by('quote_transaction.item_name');
        $this->db->order_by('total', 'desc');
        $query = $this->db->get();
        return $result = $query->result();
        
    }
    
    public function zero_balance_dashboard()
    {
        
        $this->db->select("*");
        $this->db->from('item');
        $this->db->join('uploads', 'item.id = uploads.id', 'inner');
        $this->db->where('item.item_quantity', '0');
        $query = $this->db->get();
        return $result = $query->result();
        
    }
    
    public function customer_dashboard()
    {
        $this->db->select("*");
        $this->db->from('quotation');
        $query = $this->db->get();
        return $result = $query->result();
    }
    
    public function quote_dashboard()
    {
        
        $this->db->select("*");
        $this->db->from('quotation');
        $query = $this->db->get();
        return $result = $query->num_rows();
        
    }
    
    public function fetch_item_print($search)
    {
        $this->db->from('item');
        $this->db->join('uploads', 'item.id = uploads.id', 'inner');
        $this->db->join('item_category', 'item.item_category = item_category.cat_id', 'inner');
        $this->db->like('item.name', $search);
        $this->db->or_like('item.brand', $search);
        $this->db->or_like('item_category.cat_name', $search);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
}
/* End of file crud_model.php */
/* Location: ./application/models/item_model.php */
