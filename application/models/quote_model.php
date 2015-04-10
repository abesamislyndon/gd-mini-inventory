<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

  class Quote_model extends CI_Model{

   public  function retrieve_products($id)
    {

      $this->db->select('*');
      $this->db->from('item');
      $this->db->join('uploads', 'item.id = uploads.id', 'inner');
      $this->db->where('item.id_cat',$id);
     // $this->db->limit($limit, $start);
      $query = $this->db->get();
      return $query->result_array();

    } 

      public  function individual_update($id)
    {

      $this->db->select('*');
      $this->db->from('item');
      $this->db->join('uploads', 'item.id = uploads.id', 'inner');
      $this->db->where('item.id',$id);
     // $this->db->limit($limit, $start);
      $query = $this->db->get();
      return $query->result_array();

    }    


    function validate_add_cart_item()
    { 
     $this->load->library('cart');
     $id = $this->input->post('product_id'); 
     $cty = $this->input->post('quantity'); 
     $this->db->where('id', $id); 
     $query = $this->db->get('item', 1); 
     
     if($query->num_rows > 0)
     {
        foreach ($query->result() as $row)
        {
            $data = array(
                'id'      => $id,
                'qty'     => $cty,
                'price'   => $row->price,
                'name'    => $row->name,
                'brand'    => $row->brand
            );

           $this->cart->insert($data);      
           return TRUE; 
        }
      }
    else
    {
        return FALSE;
    }
   }   

  public  function validate_update_cart()
  {
    $total = $this->cart->total_items(); 
    $item = $this->input->post('rowid');
    $qty = $this->input->post('qty');
 
     for($i=0;$i < count($item);$i++) 
    {
        $data = array(
           'rowid' => $item[$i],
           'qty'   => $qty[$i]
        );   
        $this->cart->update($data);
    }
 
 }
 
 public  function remove_item()
 {
     
     $data = array(
         'rowid' => $item,
         'qty'   => 0
      );   
      $this->cart->update($data); 
 }

 public  function customer_quoted()
 {
   
     $item_id = $this->input->post('item_id'); 
     $item_name = $this->input->post('item_name'); 
     $qty = $this->input->post('quantity'); 
     $subtotal = $this->input->post('subtotal'); 
     $price = $this->input->post('price'); 
     $customer_name = $this->input->post('customer_name'); 
     $customer_no = $this->input->post('customer_no'); 
     $item = $this->input->post('rowid'); 
     $company_name = $this->input->post('company_name'); 
     $address = $this->input->post('address'); 
     $row_count = count($item_name);

      $file = array(
      'customer_name' =>$customer_name,
      'customer_no' =>$customer_no,
      'company_name' =>$company_name,
      'address' =>$address,
      );
     
      $this->db->insert('quotation',$file); 
      $quotation_id = $this->db->insert_id();

      for($i = 0; $i < $row_count; $i++)
       {
        $file = array(
          'item_id' => $item_id[$i],
          'item_name' =>$item_name[$i],
          'quantity' =>$qty[$i],
          'quote_id' =>$quotation_id,
           'price' =>$price[$i],
          'subtotal' =>$subtotal[$i],
          'customer_no' =>$customer_no,
          'customer_name' =>$customer_name,
          );

          $this->db->insert('quote_transaction',$file); 
       } 
        $this->cart->destroy();

        $this->session->set_flashdata('msg', 'QUOTATION SUCCESFULLY SENT');
        redirect('checkout');
       
 }
 
  public  function show_quote()
  {
       $this->db->select('*');
       $this->db->from('quotation');
       $query = $this->db->get();
       return $result = $query->result();

  }

 public  function customer_quote_details($id)
 {
       $this->db->select('*');
       $this->db->from('quotation');
       $this->db->join('quote_transaction', 'quote_transaction.quote_id = quotation.quotation_id', 'inner');
       $this->db->where('quote_transaction.quote_id', $id);
       $query = $this->db->get();
       return $result = $query->result();
 }

public  function show_quote_name($id)
{
       $this->db->select('*');
       $this->db->from('quotation');
       $this->db->join('quote_transaction', 'quote_transaction.quote_id = quotation.quotation_id', 'inner');
       $this->db->where('quote_transaction.quote_id', $id)->group_by('quote_transaction.customer_name');
       $query = $this->db->get();
       return $result = $query->result();
}

public function customer_delete($id)
{
       $this->db->where('quotation_id',$id);
       $this->db->delete('quotation');
         
       $this->session->set_flashdata('msg', 'SUCCESFULLY delete');
       redirect('quoteList'); 
}


}

/* End of file category_model.php */
/* Location: ./application/models/crud_model.php */
  

