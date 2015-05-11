<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');
class Category_model extends CI_Model
{
    
    function show_category()
    {
        
        $this->db->select('*');
        $this->db->from('item_category');
        // $this->db->join('item_category', 'item.item_category = item_category.cat_name', 'inner')->group_by('item_category.cat_name');
        $query = $this->db->get();
        return $result = $query->result();
        
    }
    
    
    function show_category_update($id)
    {
        
        $this->db->select('*');
        $this->db->from('item');
        $this->db->join('item_category', 'item.item_category = item_category.cat_id', 'inner');
        $query = $this->db->get();
        return $result = $query->result();
        
    }
    
    
    function do_insert_category($category)
    {
        $category = $this->input->post('cat_name', TRUE);
        $row      = array(
            'cat_name' => $category
            
        );
        
        $this->db->where('cat_name', $category);
        $query = $this->db->get('item_category');
        
        if ($query->num_rows() > 0) {
            
            $this->session->set_flashdata('msg', 'Category Already Exist - Please insert again');
            redirect('category/add_category');
            
        } else {
            
            $this->db->insert('item_category', $row);
            $this->session->set_flashdata('msg', 'category succesfully added');
            redirect('category/add_category');
            
        }
    }
    
    public function get_item($id)
    {
        $this->db->select('*');
        $this->db->from('item_category');
        $this->db->where('cat_id', $id)->group_by('cat_id');
        $query = $this->db->get();
        return $result = $query->result();
    }
    
    public function do_update_cat($cat_name, $id)
    {
        
        $this->db->where('cat_name', $cat_name);
        $query = $this->db->get('item_category');
        
        
        $row = array(
            'cat_name' => $cat_name
        );
        
        
        if ($query->num_rows() > 0) {
            
            $this->session->set_flashdata('msg', 'Category Already Exist - Please insert again');
            redirect('category/add_category');
            
        } else {
            $this->db->where('cat_id', $id);
            $this->db->update('item_category', $row);
            
            $this->session->set_flashdata('msg', 'category succesfully update');
            redirect('category/add_category');
        }
    }
    
    
    
}
/* End of file category_model.php */
/* Location: ./application/models/crud_model.php */
