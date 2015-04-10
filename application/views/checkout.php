  <div class="templatemo-content-wrapper">
   <form method = "post" action = "<?php base_url();?>checkout/do_checkout">
   <div class="templatemo-content">
         
     <h1><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;FINAL QUOTE CHECKOUT </h1>

       <div class = "confirm-div"></div>
         <hr class = "carved">
           <div class="row">
             <div class="col-md-8 details">
              <div class="table-responsive table-container"> 
               <table class="table table-striped table-hover table-bordered">
                 <thead>
                  <tr>
                   <th width = "20%"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;ITEM NAME</th>
                   <th width = "10%"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;BRAND</th>
                   <th width = "10%"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;QUANTITY</th>
                   <th width = "10%"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;PRICE</th>
                   <th width = "10%"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;SUB TOTAL</th>
                   </tr>
                 </thead>
      
             <?php 
              $grand_total = 0; $i = 1;
                if(!$this->cart->contents())
                  { 
                    echo '<p class = "no-qoute">You dont have any items to quote yet.</p>';
                  }
                elseif($cart = $this->cart->contents())
                {
                 foreach ($cart as $item): ?>
                  <?php echo form_hidden('rowid[]', $item['rowid']); ?>
                    <tbody>
                    <tr id = "<?php echo $item['id']?>">
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['brand'] ?></td>
                    <td><?php echo $item['qty'] ?></td>
                    <td><?php echo $item['price'] ?></td>
                    <td><?php echo $item['subtotal'] ?></td>
                    <input type = "hidden" name = "item_id[]" value = "<?php echo $item['id']?>">
                    <input type = "hidden" name = "quantity[]" value = "<?php echo $item['qty'] ?>">
                    <input type = "hidden" name = "item_name[]" value = "<?php echo $item['name'] ?>"> 
                       <input type = "hidden" name = "price[]" value = "<?php echo $item['price'] ?>"> 
                    <input type = "hidden" name = "subtotal[]" value = "<?php echo $item['subtotal'] ?>"> 
                    </tr>    
                 </tbody>
                <?php
                    $item1 = $item['name'];
                    endforeach;
                }
            ?>
          
               <!--END OF FOREACH LOOP FOR ITEM FROM $item_dashboard_details ARRAY--> 
            </table><!-- ****************************************** END OF TABLE FOR ALL LIST ITEMS ******************************* -->
            </div>
          </div>
  <div class="col-md-4 details">
  <h5><i class="fa fa-briefcase"></i>&nbsp;<strong>FORM</strong></h5>
  <a href="<?php echo base_url();?>supplier_main" class = "con_browse" ><i class="fa fa-backward"></i>&nbsp;Continue Quote</a>
  <hr>
  <table class = "form">
   <tr>
      <td>name:</td>  
      <td><input type = "text" name = "customer_name" required/></td> 
  </tr>
  
  <tr>
      <td>Company Name</td>  
      <td><input type = "text" name = "company_name" required/></td> 
  </tr>
    <tr>
      <td>Contact no.</td>  
      <td><input type = "text" name = "customer_no" required/></td> 
  </tr>

  <tr>
      <td>Address</td>  
      <td><input type = "text" name = "address" required/></td> 
  </tr>

</table>
 <div class = "submit-span"><input type = "submit" name = "submit" value = "send"></div> 

</form>  

</div>

   </div>
 </div><!--end of templatemo-content-->
</div><!--end of templatemo-content-wrapper-->



