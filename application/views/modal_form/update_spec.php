  <script type="text/javascript">
    tinyMCE.init({
        mode : "specific_textareas",
        editor_selector : "myTextEditor",
        theme : "simple"
    });
  </script>
<?php foreach($item_individual as $details): ?>
<div class="row">
   <div class="col-md-5 item-details-modal"> 
    <p><?php echo $details->name ?></p>
   </div>
   
   <div class="col-md-7">
    <?php if($details->img_name.$details->ext == '') {?>
          <img src="<?php echo base_url("uploads/")?>/default.jpg" class = "img-details-large">
          <?php }else{ ?>
          <img src="<?php echo base_url("uploads/")?>/<?php echo $details->img_name.$details->ext ?>" class = "img-details-large">
     <?php } ?>
     <input type="hidden" name = "id" class="form-control"  value="<?php echo $details->id ?>" >
     <input type="hidden" name = "item_category" class="form-control"  value="<?php echo $details->item_category ?>" >
     <input type="hidden" name = "item_quantity1" class="form-control"  value="<?php echo $details->item_quantity ?>" >  
   </div>
 </div>
 
 <hr class = "carved">
 
 <div class = "confirm-div"></div>
  <?php echo validation_errors(); ?>
     <div class="row">
     <div class="col-md-12 margin-bottom-15">
       <label for="firstName" class="control-label"><i class="fa fa-database"></i>&nbsp;&nbsp;Specification</label>
         <textarea class = "spec myTextEditor" name="spec" ><?php echo $details->spec?></textarea>
     </div><!--end of margin-bottom-15-->
    </div><!--end of -->
  </div><!--end of template-container-->
<?php endforeach;?>  
