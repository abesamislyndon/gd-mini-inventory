  <div class="templatemo-content-wrapper">
    <div class="templatemo-content">
      <div class = "row">
         <div class = "col-md-6">
         <div class = ' print-container'>
           <h5><a href="<?php echo base_url();?>create_pdf/print_all_item" target = "_blank"><i class="fa fa-print">&nbsp;&nbsp;all item</i></a></h5>
        </div>  
        </div>

         <div class = "col-md-6 pull-right">
           <div class = "search-div">
              <?php echo form_open('search'); ?>
              <div class="input-group">
                <input type = "text" name = "search" id = "search" class = "form-control custom-input" placeholder = "search here" required>
                <div class="input-group-btn">
                  <input class="btn btn-default custom-btn" type="submit"  name = "submit" class = "search-submit" id = "submit" value = "&#xf002;">
                </div>
                </form>
             </div> 
          </div><!--end of search div-->
        </div><!--end of column 6 pull right div-->
      </div><!--end of row-->
      </form>     
      <div class = "confirm-div"></div>
         <hr class = "carved">
           <div class="row">
             <div class="col-md-12 details">
              <div class="table-responsive table-container" id = "search_result"> 
                <table class="table table-main " id = "search_table">
                <thead>
                 <tr>
                   <th width = "10%" style = "font-size:11px"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;</th>
                    <th width = "25%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;<span class = "hide-text">ITEM DESCRIPTION</span></th>
                    <th width = "10%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;<span class = "small-text">SP (SGD)</span></th>
                    <th width = "10%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;<span class = "small-text">PP (SGD)</span></th>
                    <th width = "10%" style = "font-size:11px"><i class="fa fa-database"></i>&nbsp;&nbsp;<span class = "small-text">QTY</span></th>
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
                  <td>
                    <?php if($details->img_name.$details->ext == '') {?>
                        <img src="<?php echo base_url("uploads/")?>/default.jpg" class = "img-details"></td>
                    <?php }else{ ?>
                    <img src="<?php echo base_url("uploads/")?>/<?php echo $details->img_name.$details->ext ?>" class = "img-details"></td>
                  <?php } ?>
                  <td><br><?php echo $details->name ?><br><span class = "sub-desc">Item no:&nbsp;<?php echo $details->item_no ?></span><br><span class = "sub-desc-cat">Category: &nbsp;<?php echo $details->cat_name ?></span></td>
                  <td style = "text-align:center;"><br><br><?php echo $details->price ?></a></td>                    
                  <td style = "text-align:center;" ><br><br><?php echo $details->item_pur_price ?></td>
                  <td style = "font-size:13px;color:#000;font-style:italic;font-weight:bold;"><br><br><?php echo $details->item_quantity ?></a></td>
                  <td><br><a href="#add_modal" role="button"  class = "button" data-toggle="modal" data-load-remote="<?php echo base_url();?>update_item/item_details/<?php echo $details->id ?>" data-remote-target="#add_modal .modal-body">add &nbsp;<i class="fa fa-plus-circle"></i></a></td>
                  <td><br><a href="#sub_modal" role="button"  class = "button" data-toggle="modal" data-load-remote="<?php echo base_url();?>update_item/item_details/<?php echo $details->id ?>" data-remote-target="#sub_modal .modal-body">subtract&nbsp;<i class="fa fa-minus-circle"></i></a></td>
                  <td><br><a href="<?php echo base_url();?>transaction/transaction_item_details/<?php echo $details->id ?>" role="button"  class = "button2">History&nbsp;<i class="fa fa-clock-o"></i></a></td>
                  <td><br>  
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
        <div id="add_modal" class="modal modal2"  id="myModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header header-add">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"><i class="fa fa-plus-circle"></i>&nbsp;ADD STOCK ( IN )</h4>
                  </div>
                <div class="modal-body"></div>
                     <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name = "submit" value = "add_qty"><i class="fa fa-check"></i>&nbsp;&nbsp;add quantity</button>
                      <button type="button" class="btn btn-primary1" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Cancel</button>
                  </div>  
              </div>
          </div>
       </div><!--modal for stock in-->

      <div id="sub_modal" class="modal modal2"  id="myModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-sub">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-minus-circle"></i>&nbsp;DECREASE STOCK ( OUT )</h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary1" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
                    <button type="submit" class="btn btn-primary" name = "submit" value = "sub_qty"><i class="fa fa-check"></i>&nbsp;&nbsp;sub quantity</button>
                </div> 
            </div>
        </div>
      </div><!--modal for stock out-->
      

    <div id="history" class="modal modal2"  id="myModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
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
       </div><!--end of modal for history-->

      <div id="edit_modal" class="modal modal2"  id="myModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header header-add">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title"><i class="fa fa-plus-circle"></i>&nbsp;EDIT INFORMATION</h4>
                  </div>
                  <div class="modal-body"></div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-primary1" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Close</button>
                      <button type="submit" class="btn btn-primary" name = "submit" value = "update_info"><i class="fa fa-check"></i>&nbsp;&nbsp;Update</button>
                  </div> 
              </div>
          </div>
       </div><!-- end modal-dialog -->
    </form>     

    </div><!--end of table-responsive -->
   </div>
  </div>
 </div><!--end of templatemo-content-->
</div><!--end of templatemo-content-wrapper-->






