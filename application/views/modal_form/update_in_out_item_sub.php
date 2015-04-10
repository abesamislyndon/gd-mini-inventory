  <div class="modal-header header-sub">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-minus-circle"></i>&nbsp;DECREASE STOCK ( OUT )</h4>
                </div>  
<?php foreach($item_individual as $details): ?>
    <div class="row">
    <div class="col-md-10 item-details-modal"> 
     <h1><?php echo $details->name ?></h1>
     <p><i class="fa fa-database"></i>&nbsp;&nbsp;Item Quantity:&nbsp;<?php echo $details->item_quantity ?></p>
     <p><i class="fa fa-money"></i>&nbsp;&nbsp;Sell Price:&nbsp;<?php echo $details->price?></p>
     <p><i class="fa fa-money"></i>&nbsp;&nbsp;Purchase Price:&nbsp;<?php echo $details->item_pur_price ?></p>
   </div>
    <div class="col-md-2">
     <img src="<?php echo base_url("uploads/")?>/<?php echo $details->img_name.$details->ext ?>" class = "img-details-medium">
     <input type="hidden" name = "id" class="form-control"  value="<?php echo $details->id ?>" >
    <input type="hidden" name = "item_quantity1" class="form-control"  value="<?php echo $details->item_quantity ?>" >  
   </div>
 </div>
<?php endforeach;?>  
     <hr class = "carved">
       <div class = "confirm-div"></div>
          <?php echo validation_errors(); ?>
             <div class="row">
              <div class="col-md-12 margin-bottom-15">
                <label for="firstName" class="control-label"><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;&nbsp;Date</label>
                <input type="text" name = "item_date" class="form-control clsDatePicker" id="date" placeholder = "yyyy-mm-dd"  value=""> 
              </div><!--end of margin-bottom-15-->       
              
             <div class="col-md-12 margin-bottom-15">
               <label for="firstName" class="control-label"><i class="fa fa-database"></i>&nbsp;&nbsp;Item Quantity</label>
               <input type="text" name = "item_quantity" class="form-control"  value="" required> 
             </div><!--end of margin-bottom-15-->

              <div class="col-md-12 margin-bottom-15">
               <label for="firstName" class="control-label"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Invoice #</label>
               <input type="text" name = "invoice_no" class="form-control"  value="" > 
              </div><!--end of margin-bottom-15-->  

              <div class="col-md-12 margin-bottom-15">
               <label for="firstName" class="control-label"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Company Name</label>
               <input type="text" name = "company_name" class="form-control" value="" required> 
              </div><!--end of margin-bottom-15-->  
        </div><!--end of -->
      </form>


  </div><!--end of template-container-->

   <div class="modal-footer">
                         <button type="button" class="btn btn-primary1" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
                    <button type="submit" class="btn btn-primary" name = "submit" value = "sub_qty"><i class="fa fa-check"></i>&nbsp;&nbsp;sub quantity</button>
                </div> 