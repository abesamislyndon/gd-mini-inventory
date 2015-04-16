<?php foreach($cat_individual as $details): ?>
<hr class = "carved">
<div class = "confirm-div"></div>        
<label for="firstName" class="control-label"><i class="fa fa-barcode"></i>&nbsp;&nbsp;catgory Name</label>
<input type="text" name = "cat_name" class="form-control" value="<?php echo $details->cat_name ?>">  
<input type="hidden" name = "id" class="form-control" value="<?php echo $details->cat_id ?>">  

<?php endforeach;?>  
