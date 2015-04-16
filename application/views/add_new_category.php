<div class="templatemo-content-wrapper">
  <div class="templatemo-content">
    <h1><i class="fa fa-folder-open"></i>&nbsp;&nbsp;MANAGE CATEGORY</h1>
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
   
         <div class = "col-md-6"><br>
          <div class="table-responsive table-container"> 
            <table class="table">
              <thead>
                <tr>
                   <th><i class="fa fa-folder-open">&nbsp;&nbsp;LIST OF CATEGORIES</th>
                   <th><i class="fa fa-folder-open">&nbsp;&nbsp;ACTION</th>
                </tr>
              </thead>
              <tbody>
               <?php foreach($category as $details): ?>
                <tr>
                  <td><?php echo $details->cat_name?></td>
                  <td>  
                   <div class="btn-group pull-right">
                    <button type="button" class="button3 dropdown-toggle" data-toggle="dropdown">options<span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                     <ul class="dropdown-menu" role="menu">
                      <li><a href="#edit_modal" role="button" data-toggle="modal" data-load-remote="<?php echo base_url();?>category/update_cat_info/<?php echo $details->cat_id ?>" data-remote-target="#edit_modal .modal-body"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Edit</a></li>                 
                     </ul>
                    </div>
                    <br><br>
                    </td>
                  </tr>      
                  <?php endforeach;?>  
                 </tbody>
               </table>
             </div><!--end of table-responsive -->
            </div>
          </form>
        </div><!--end of table div-->
    
    <?php echo form_open_multipart('category/do_update_cat_info');?>
        <div id="edit_modal" class="modal modal2"  id="myModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header header-add">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"><i class="fa fa-plus-circle"></i>&nbsp;UPDATE CATEGORY</h4>
                  </div>
                  <div class="modal-body"></div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name = "submit" value = "up_cat"><i class="fa fa-check"></i>&nbsp;&nbsp;Update</button>
                      <button type="button" class="btn btn-primary1" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
                  </div> 
              </div>
          </div>
       </div><!-- end modal-dialog -->      
   </form>
      <hr class = "carved">    
    </div><!--end of -->
  </div><!--end of template-container-->
</div><!--end of templatemo-content-wrapper-->

