<?php foreach($item_individual as $details): ?>
    <div class="row">
    <div class="col-md-7 item-details-modal"> 
     <h1><?php echo $details->name ?></h1>
     <p><i class="fa fa-database"></i>&nbsp;&nbsp;Item Quantity:&nbsp;<?php echo $details->item_quantity ?></p>
     <p><i class="fa fa-money"></i>&nbsp;&nbsp;Sell Price:&nbsp;<?php echo $details->price?></p>
     <p><i class="fa fa-money"></i>&nbsp;&nbsp;Purchase Price:&nbsp;<?php echo $details->item_quantity ?></p>
   </div>


   <div class="col-md-5">
      <?php if($details->img_name.$details->ext == '') {?>
          <td><img src="<?php echo base_url("uploads/")?>/default.jpg" class = "img-details-medium"></td>
          <?php }else{ ?>
          <img src="<?php echo base_url("uploads/")?>/<?php echo $details->img_name.$details->ext ?>" class = "img-details-medium">
      <?php } ?>
                  

     <input type="hidden" name = "id" class="form-control"  value="<?php echo $details->id ?>" >
     <input type="hidden" name = "item_quantity1" class="form-control"  value="<?php echo $details->item_quantity ?>" >
     <input type="hidden" name = "item_category" class="form-control"  value="<?php echo $details->item_category ?>" >  
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
               <label for="singleSelect">Category</label>
                  <select name = "item_category" class="form-control" id="singleSelect">
                    <option value = "<?php echo $details->cat_id ?>" selected><?php echo $details->cat_name ?></option>
                    <?php foreach ($category as$value) { ?>
                         <option value = "<?php echo $value->cat_id ?>"><?php echo $value->cat_name ?></option>
                    <?php } ?>

                  </select>


                </div><!--end of margin-bottom-15-->  

                    <div class="col-md-6 margin-bottom-15">
                     <label for="firstName" class="control-label"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Item No.</label>
                     <input type="text" name = "item_no" class="form-control" value="<?php echo $details->item_no ?>"> 
                    </div><!--end of margin-bottom-15-->  

                    <div class="col-md-6 margin-bottom-15">
                     <label for="firstName" class="control-label"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Selling Price</label>
                     <input type="text" name = "price" class="form-control" value="<?php echo $details->price ?>"> 
                    </div><!--end of margin-bottom-15--> 

                    <div class="col-md-6 margin-bottom-15">
                     <label for="firstName" class="control-label"><i class="fa fa-barcode"></i>&nbsp;&nbsp;Purchasing Price</label>
                     <input type="text" name = "item_pur_price" class="form-control" value="<?php echo $details->item_pur_price ?>" > 
                    </div><!--end of margin-bottom-15--> 

                    <div class="col-md-6 margin-bottom-15">
                      <label for="exampleInputFile">Update Photo</label>
                      <input type="file" name="userfile"  value = "" class = "custom-file-input">
                      <p class="help-block">Photo must not exceed 3mb <?php echo $details->img_name.$details->ext ?></p>  
                   </div><!--end of margin-bottom-15--> 

        </div><!--end of -->
      </form>
  </div><!--end of template-container-->
<?php endforeach;?>  
