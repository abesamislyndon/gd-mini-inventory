    <div class="modal-header header-add">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"><i class="fa fa-plus-circle"></i>&nbsp;EDIT INFORMATION</h4>
                  </div>
<?php foreach($item_individual as $details): ?>
    <div class="row">
    <div class="col-md-10 item-details-modal"> 
     <h1><?php echo $details->name ?></h1>
     <p><i class="fa fa-database"></i>&nbsp;&nbsp;Item Quantity:&nbsp;<?php echo $details->item_quantity ?></p>
     <p><i class="fa fa-money"></i>&nbsp;&nbsp;Sell Price:&nbsp;<?php echo $details->price?></p>
     <p><i class="fa fa-money"></i>&nbsp;&nbsp;Purchase Price:&nbsp;<?php echo $details->item_quantity ?></p>
   </div>
    <div class="col-md-2">
     <img src="<?php echo base_url("uploads/")?>/<?php echo $details->img_name.$details->ext ?>" class = "img-details-medium">
     <input type="hidden" name = "id" class="form-control"  value="<?php echo $details->id ?>" >
    <input type="hidden" name = "item_quantity1" class="form-control"  value="<?php echo $details->item_quantity ?>" >  
   </div>
 </div>

     <hr class = "carved">
       <div class = "confirm-div"></div>
          <?php echo validation_errors(); ?>
             <div class="row">
              <div class="col-md-12 margin-bottom-15">
                <label for="firstName" class="control-label"><i class="fa fa-calendar-o"></i>&nbsp;&nbsp;&nbsp;Date</label>
                <input type="text" name = "item_date" class="form-control" id="datepicker" value="<?php echo $details->item_date ?>"> 
              </div><!--end of margin-bottom-15-->       
              
             <div class="col-md-12 margin-bottom-15">
               <label for="firstName" class="control-label"><i class="fa fa-database"></i>&nbsp;&nbsp;Item Name</label>
               <input type="text" name = "name" class="form-control"  value="<?php echo $details->name ?>" > 
             </div><!--end of margin-bottom-15-->

              <div class="col-md-12 margin-bottom-15">
               <label for="firstName" class="control-label"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Category</label>
               <input type="text" name = "item_category" class="form-control"  value="<?php echo $details->item_category ?>" > 
              </div><!--end of margin-bottom-15-->  

              <div class="col-md-12 margin-bottom-15">
               <label for="firstName" class="control-label"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Item No.</label>
               <input type="text" name = "item_no" class="form-control" value="<?php echo $details->item_no ?>"> 
              </div><!--end of margin-bottom-15-->  

              <div class="col-md-12 margin-bottom-15">
               <label for="firstName" class="control-label"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Selling Price</label>
               <input type="text" name = "price" class="form-control" value="<?php echo $details->price ?>"> 
              </div><!--end of margin-bottom-15--> 

                   <div class="col-md-12 margin-bottom-15">
               <label for="firstName" class="control-label"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Purchasing Price</label>
               <input type="text" name = "item_pur_price" class="form-control" value="<?php echo $details->item_pur_price ?>" > 
              </div><!--end of margin-bottom-15--> 

        </div><!--end of -->
      </form>
  </div><!--end of template-container-->
<?php endforeach;?>  


  </div><!--end of template-container-->

     <div class="modal-footer">
          <button type="button" class="btn btn-primary1" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
          <button type="submit" class="btn btn-primary" name = "submit" value = "update_info"><i class="fa fa-check"></i>&nbsp;&nbsp;Update</button>
      </div> 