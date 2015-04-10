  <div class="templatemo-content-wrapper">
  <div class="templatemo-content">
    <div class = "row">
    <?php
        $item = array('id' => 'my_form', 'item' => 'form1');
        echo form_open('main/search_item', $item);
      ?>
         <div class = "col-md-6 "> <h1><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;INVENTORY</h1></div>
            <div class = "col-md-6   search-div">
              <input type = "text" class = "search-input" name = "search_data" id = "search_data " onkeyup = "searchItem()"/>
            </div>
      </div>
    </form>     
      <div class = "confirm-div"></div>
         <hr class = "carved">
           <div class="row">
             <div class="col-md-12 details">
              <div class="table-responsive table-container" id = "search_result"> 
                <table class="table-main" id = "search_table">
                <thead>
                 <tr>
                    <th width = "25%"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;ITEM NAME</th>
                    <th width = "10%"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;</th>
                    <th width = "15%"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;CATEGORY</th>
                    <th width = "8%"><i class="fa fa-barcode"></i>&nbsp;&nbsp;ITEM #</th> 
                    <th width = "12%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;SP (SGD)</th>
                    <th width = "14%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;PP (SGD)</th>
                    <th width = "9%"><i class="fa fa-database"></i>&nbsp;&nbsp;QTY</th>
                    <th><i class="fa fa-plus-circle"></i></th>
                    <th><i class="fa fa-minus-circle"></i></th>
                    <th><i class="fa fa-clock-o"></i></th>
                    <th><i class="fa fa-pencil-square-o"></i></th>
                   </tr>
                 </thead>

              	<?php
                if (isset($item_dashboard_details) & ($item_dashboard_details <> NULL)) {
                foreach($item_dashboard_details as $details): ?>
                <tbody>
                <tr id = "<?php echo $details->id?>">
                  <td class = "td"><?php echo $details->name ?></td>
                  <td><img src="<?php echo base_url("uploads/")?>/<?php echo $details->img_name.$details->ext ?>" class = "img-details"></td>
                  <td><?php echo $details->item_category ?></td>
                  <td><?php echo $details->item_no ?></td>
                  <td><?php echo $details->price ?></a></td>                    
                  <td><?php echo $details->item_pur_price ?></td>
                  <td style = "font-size:14px;color:#000;font-style:italic;font-weight:bold;"><?php echo $details->item_quantity ?></a></td>
                  <td><a href="#add_modal" role="button"  class = "button" data-toggle="modal" data-load-remote="<?php echo base_url();?>update_item/item_details/<?php echo $details->id ?>" data-remote-target="#add_modal .modal-body"><i class="fa fa-plus-circle"></i></a></td>
                  <td><a href="#sub_modal" role="button"  class = "button" data-toggle="modal" data-load-remote="<?php echo base_url();?>update_item/item_details/<?php echo $details->id ?>" data-remote-target="#sub_modal .modal-body"><i class="fa fa-minus-circle"></i></a></td>
                  <td><a href="#history" role="button"  class = "button2" data-toggle="modal" data-load-remote="<?php echo base_url();?>transaction/transaction_item_details/<?php echo $details->id ?>" data-remote-target="#history .modal-body"><i class="fa fa-clock-o"></i></a></td>
                  <td>  
                     <div class="btn-group pull-right">
                      <button type="button" class="button3 dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                          <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#edit_modal" role="button" data-toggle="modal" data-load-remote="<?php echo base_url();?>update_item/update_item_info/<?php echo $details->id ?>" data-remote-target="#edit_modal .modal-body"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Edit</a></li>
                          <li><a href="<?php echo base_url();?>update_item/delete_item/<?php echo $details->id?>" class  =  "delete_item" ><i class="fa fa-trash"></i>&nbsp;&nbsp;Delete</a></li>
                        </ul>
                       </div>
                     </td>
                    </tr>      
                  </tbody>
               <?php endforeach;}
               ?><!--END OF FOREACH LOOP FOR ITEM FROM $item_dashboard_details ARRAY--> 
            </table><!-- ****************************************** END OF TABLE FOR ALL LIST ITEMS ******************************* -->

         <div class = "col-md-12 pagination">  
          <p><?php echo $links; ?></p>
         </div>

       <?php echo form_open_multipart('update_item/update_item_individual');?>
        <div id="add_modal" class="modal fade"  id="myModal" tabindex="-1" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header header-add">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"><i class="fa fa-plus-circle"></i>&nbsp;ADD STOCK ( IN )</h4>
                  </div>
                <div class="modal-body"></div>
                     <div class="modal-footer">
                      <button type="button" class="btn btn-primary1" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
                      <button type="submit" class="btn btn-primary" name = "submit" value = "add_qty"><i class="fa fa-check"></i>&nbsp;&nbsp;add quantity</button>
                  </div>  
              </div>
          </div>
      </div><!--modal for stock in-->

    <div id="sub_modal" class="modal fade"  id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-sub">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-minus-circle"></i>&nbsp;DECREASE STOCK ( OUT )</h4>
                </div>
                <div class="modal-body">
                    
                </div>
            <div class="modal-footer">
                         <button type="button" class="btn btn-primary1" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
                    <button type="submit" class="btn btn-primary" name = "submit" value = "sub_qty"><i class="fa fa-check"></i>&nbsp;&nbsp;sub quantity</button>
                </div> 
            </div>
        </div>
      </div><!--modal for stock out-->
      

    <div id="history" class="modal fade"  id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog history">
            <div class="modal-content">
                <div class="modal-header header-history">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-minus-circle"></i>&nbsp;HISTORY</h4>
                </div>
                <div class="modal-body"></div>
               <div class="modal-footer">
              <button type="button" class="btn btn-primary1" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
             </div>
           </div>
          </div>
       </div>

      <div id="edit_modal" class="modal fade"  id="myModal" tabindex="-1" role="dialog">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header header-add">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"><i class="fa fa-plus-circle"></i>&nbsp;EDIT INFORMATION</h4>
                  </div>
                  <div class="modal-body">
                      
                  </div>
                     <div class="modal-footer">
                      <button type="button" class="btn btn-primary1" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
                      <button type="submit" class="btn btn-primary" name = "submit" value = "update_info"><i class="fa fa-check"></i>&nbsp;&nbsp;Update</button>
                  </div> 
                
              </div>
          </div>
      </div>
    </form>     

          </div><!--end of table-responsive -->
        </div>
      </div>
    </div><!--end of templatemo-content-->
  </div><!--end of templatemo-content-wrapper-->






