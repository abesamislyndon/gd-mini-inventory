  <div class="templatemo-content-wrapper">
  <div class="templatemo-content">
    <div class = "confirm-div"></div>
         <hr class = "carved">
           <div class="row">
             <div class="col-md-12 details">
              <div class="table-responsive table-container" id = "search_result"> 
                <table class="table-main" id = "search_table">
                  <thead>
                    <tr>
                      <th width = "50%"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;CATEGORY</th>
                       <th width = "10%"><i class="fa fa-eye"></i></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($category as $details): ?>
                  <tr class = "category-list">
                      <td style = "text-align:left;font-size:13px;font-weight:bold;text-transform:uppercase;"><?php echo $details->cat_name?></td>
                      <td>
                        <a href="<?php echo base_url();?>item/main_category/<?php 
                        if($details->cat_id == '13'){ echo "AirCompressor"; }
                        elseif($details->cat_id == '14'){ echo "ConstructionEquip";}
                        elseif($details->cat_id == '10'){ echo "MaterialEquip";}
                        elseif($details->cat_id == '5'){ echo "SmallMachines";}
                        elseif($details->cat_id == '7'){ echo "WeldingEquip";}
                        elseif($details->cat_id == '6'){ echo "MetalWorkingMachines";}
                        elseif($details->cat_id == '8'){ echo "WoodWorkingMachines";}
                        elseif($details->cat_id == '9'){ echo "HardwareToolSupplies";}?>" class = "button"><i class="fa fa-eye"></i></a></td>
                      <input type = "hidden" value = "<?php echo $details->cat_id?>">
                  </tr>   
                    
                  <?php endforeach;?>  
               </tbody>
            </table><!-- ****************************************** END OF TABLE FOR ALL LIST ITEMS ******************************* -->
      
          </div><!--end of table-responsive -->
        </div>
      </div>
    </div><!--end of templatemo-content-->
  </div><!--end of templatemo-content-wrapper-->






