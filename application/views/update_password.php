<div class="templatemo-content-wrapper"> 
  <div class="templatemo-content">
   <h1><i class="fa fa-users"></i>&nbsp;&nbsp;ADD NEW USER</h1>
      <hr class = "carved">
     <div class="col-md-12">
       <div class = "confirm-div"></div>
       <?php echo validation_errors(); ?>
       <div class="row form-wrapper">
        <?php echo form_open_multipart('manageUser/do_update_user_pwd');?> 
         <?php foreach ($individual as $value):?>
         <input type="hidden" name = "id" class="form-control"  value="<?php echo $value->id ?>" required> 
         <div class="col-md-4 margin-bottom-15">
          <label for="firstName" class="control-label">Old Password</label>
         <input type = "password" name = "password"  id = "full_name" class="form-control" value = "">
         </div>

              <div class="col-md-4 margin-bottom-15">
          <label for="firstName" class="control-label">New Paasword</label>
           <input type = "password" name = "new_password"  id = "username" class="form-control" value = "">
         </div>

        <div class="col-md-4 margin-bottom-15">
          <label for="firstName" class="control-label">Confirm Password</label>
          <input type = "password" name = "confirm_password"  id = "username" class="form-control" value = "">
         </div>

         <?php endforeach;?>
         <hr class = "carved">
         <div class = "button-div1">
            <input type = "submit" name  = "submit" value= "&#xf044; update password" class = "button">
         </div>
         </form>
      </div>
    </div>
  </div>
</div><!--end of templatemo-content-wrapper-->

