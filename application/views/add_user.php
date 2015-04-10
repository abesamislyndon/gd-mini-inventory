<div class="templatemo-content-wrapper">
  <div class="templatemo-content">
   <h1><i class="fa fa-users"></i>&nbsp;&nbsp;ADD NEW USER</h1>
      <hr class = "carved">
     <div class="col-md-12">
       <div class = "confirm-div"></div>
       <?php echo validation_errors(); ?>
       <div class="row form-wrapper">
         <?php echo form_open_multipart('manageUser/do_add_user');?>
         <div class="col-md-4 margin-bottom-15">
          <label for="firstName" class="control-label">Full Name</label>
          <input type="text" name = "full_name" class="form-control"  value="" required> 
         </div>

         <div class="col-md-4 margin-bottom-15">
          <label for="firstName" class="control-label">Username</label>
          <input type="text" name = "username" class="form-control" id="firstName" value="" required> 
         </div>

        <div class="col-md-4 margin-bottom-15">
          <label for="firstName" class="control-label">Password</label>
          <input type="password" name = "password" class="form-control" id="firstName" value="" required> 
        </div>

         <div class="col-md-4 margin-bottom-15">
          <label for="firstName" class="control-label">Repeat Password</label>
          <input type="password" name = "password1" class="form-control" id="firstName" value="" required> 
        </div>

         <div class="col-md-4 margin-bottom-15">                       
          <label for="singleSelect">Role</label>
            <select name = "role_code" class="form-control" id="singleSelect">
              <option value="" disabled selected></option>
              <option value="1">Administrator</option>
              <option value="2">supplier</option>
            </select>             
         </div>

         <hr class = "carved">
         <div class = "button-div1">
              <input type = "submit" name  = "submit" value= "&#xf055; ADD USER" class = "button">
         </div>
         </form>
      </div>
    </div>
  </div>
</div><!--end of templatemo-content-wrapper-->

