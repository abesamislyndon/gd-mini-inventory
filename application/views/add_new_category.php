<div class="templatemo-content-wrapper">
  <div class="templatemo-content">
    <h1><i class="fa fa-folder-open"></i>&nbsp;&nbsp;ADD NEW CATEGORY</h1>
      <hr class = "carved">
       <div class="col-md-12 form-wrapper">
         <div class = "confirm-div"></div>
          <?php echo validation_errors(); ?>
          
          <div class="row">
           <?php echo form_open_multipart('category/do_add_category');?>
            <div class="col-md-6 margin-bottom-15">
             <label for="firstName" class="control-label">Item Category</label>
               <input type="text" name = "cat_name" class="form-control" id="firstName" value="" required> 
               <hr class = "carved">
                <div class = "button-div">
                  <input type = "submit" name  = "submit" value= "&#xf055; ADD CATEGORY" class = "button">
                </div><!--end of button-div-->
            </div><!--end of margin-bottom-15-->       
   
         <div class = "col-md-6">
          <div class="table-responsive table-container"> 
              <table class="table table-striped table-hover table-bordered">
                 <thead>
                   <tr>
                      <th width = "8%"><i class="fa fa-folder-open">&nbsp;&nbsp;LIST OF CATEGORIES</th>
                   </tr>
                  </thead>
                  <tbody>
                  <?php foreach($category as $details): ?>
                  <tr>
                      <td style = "text-align:left;"><?php echo $details->cat_name?></td>
                  </tr>      
                  <?php endforeach;?>  
                 </tbody>
              </table>
            </div><!--end of table-responsive -->
           </div>
          </form>
        </div><!--end of table div-->
      <hr class = "carved">    
    </div><!--end of -->
  </div><!--end of template-container-->
</div><!--end of templatemo-content-wrapper-->

