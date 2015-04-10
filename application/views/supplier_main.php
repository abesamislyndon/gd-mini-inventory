  <div class="templatemo-content-wrapper">
  <div class="templatemo-content">
     <h1><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;ITEM LIST CATEGORY</h1>
         <hr class = "carved">
           <div class="row">
            
              <?php foreach($category as $cat):?>
               <div class="col-md-3 category_box">
                <span class= "header_name"><?php echo $cat->cat_name?></span>
                <img src="<?php echo base_url()?>/assets/img/cat2.jpg">
                <a href="<?php echo base_url();?>item/category/<?php echo $cat->cat_id?>" class= "button_supplier">VIEW PRODUCTS</a>      
              </div>
            <?php endforeach;?>
       
        </div>
     </div><!--end of templatemo-content-->
  </div><!--end of templatemo-content-wrapper-->






