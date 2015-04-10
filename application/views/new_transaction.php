<div class="templatemo-content-wrapper">
  <div class="templatemo-content">
   <h1><i class="fa fa-folder-open"></i>&nbsp;&nbsp; NEW TRANSACTION</h1>
     <hr class = "carved">
       <div class="col-md-12 form-wrapper">
         <div class = "confirm-div"></div>
          <?php echo validation_errors(); ?>
           <div class="row">
            <?php echo form_open_multipart('category/do_add_category');?>
             <div class="col-md-3 margin-bottom-15">
               <label for="firstName" class="control-label">Company</label>
                <input type="text" name = "company" class="form-control" id="firstName" value="" required> 
                 <hr class = "carved">
                  <div class = "button-div">
                  <input type = "submit" name  = "submit" value= "ADD ITEM" class = "button">
                 </div><!--end of button-div-->
                </div><!--end of margin-bottom-15-->       
              <div class="col-md-3 margin-bottom-15">
             <label for="firstName" class="control-label">Quantity</label>
            <input type="text" name = "quantity" class="form-control" id="firstName" value="" required> 
          </div><!--end of margin-bottom-15-->       
        </form>
      </div>
    </div><!--end of -->
  </div><!--end of template-container-->
</div><!--end of templatemo-content-wrapper-->




