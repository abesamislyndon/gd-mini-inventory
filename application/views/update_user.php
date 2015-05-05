<div class="templatemo-content-wrapper"> 
  <div class="templatemo-content">
   <h1><i class="fa fa-users"></i>&nbsp;&nbsp;ADD NEW USER</h1>
      <hr class = "carved">
     <div class="col-md-12">
       <div class = "confirm-div"></div>
       <?php echo validation_errors(); ?>
       <div class="row form-wrapper">
        <?php echo form_open_multipart('manageUser/do_update_user');?> 
         <?php foreach ($individual as $value):?>
         <input type="hidden" name = "id" class="form-control"  value="<?php echo $value->id ?>" required> 
         <div class="col-md-4 margin-bottom-15">
          <label for="firstName" class="control-label">Full Name</label>
          <input type="text" name = "full_name" class="form-control"  value="<?php echo $value->full_name ?>" required> 
         </div>

         <div class="col-md-4 margin-bottom-15">
          <label for="firstName" class="control-label">Username</label>
          <input type="text" name = "username" class="form-control" id="firstName" value="<?php echo $value->username ?>" required> 
         </div>
  
         <div class="col-md-4 margin-bottom-15">                       
          <label for="singleSelect">Role</label>
            <select name = "role_code" class="form-control" id="singleSelect">
              <option value="<?php echo $value->role_code?>">
                <?php 
                if($value->role_code =='1'){
                  echo "admin";
                 }else{
                  echo "surveyor";
                 }?>
               </option>
               <option value="1">Admin</option>
               <option value="2">Surveyor</option>
            </select>            
         </div>
         <?php endforeach;?>
         <hr class = "carved">
         <div class = "button-div1">
            <input type = "submit" name  = "submit" value= "&#xf044; update user" class = "button">
         </div>
         </form>
      </div>
    </div>
  </div>
</div><!--end of templatemo-content-wrapper-->

