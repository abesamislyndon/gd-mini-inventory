  <div class="templatemo-content-wrapper">
    <div class="templatemo-content">
          <?php foreach($transaction_details as $details): ?>
                 <h1><i class="fa fa-clock-o"></i>&nbsp;&nbsp;UPDATE ITEM HISTORY <?php echo $details->name ?></h1>
                <a href="<?php echo base_url();?>transaction/transaction_item_details/<?php echo $details->id?>" class = "goback2">GO BACK</a>
              <?php endforeach;?>
      <div class = "row">
         <div class = "col-md-6">
         <div class = ' print-container'>
        </div>  
        </div>

         <div class = "col-md-6 pull-right">
 
        </div><!--end of column 6 pull right div-->
      </div><!--end of row-->
      </form>     
      <div class = "confirm-div"></div>
         <hr class = "carved">
           <div class="row">
             <div class="col-md-12 details">
              <div class="table-responsive table-container" id = "search_result"> 
             
              <table class="table table-striped table-hover table-bordered">
                <thead>
                  <tr>
                    <th width = "10%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;DATE</th>
                    <th width = "13%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;INVOCE / P.O.</th>
                    <th width = "25%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;COMPANY NAME</th>
                    <th width = "13%" style = "font-size:11px"><i class="fa fa-barcode"></i>&nbsp;&nbsp;STOCK IN</th> 
                    <th width = "12%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;STOCK OUT</th>
                    <th width = "14%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;STOCK BALANCE</th>
                     <th width = "14%" style = "font-size:11px">&nbsp;&nbsp;ACTION</th>
                   </tr>
                </thead>

                <tbody>
                  <br><br>
                   <?php echo form_open_multipart('transaction/do_update_history');?> 
                   <?php foreach($transaction_details1 as $details): ?>
                   <tr>
                    <input type = "hidden" name = "transaction_id" value = "<?php echo $details->transaction_id ?>">
                    <td><input type = "text" name = "item_date" value = "<?php echo $details->item_date ?>" class="form-control" id="datepicker"></td>
                    <td><input type = "text" name = "invoice_no" value = "<?php echo $details->invoice_no ?>" class="form-control"></td>
                    <td><input type = "text" name = "company_name" value = "<?php echo $details->company_name ?>" class="form-control"></td>
                 
                    <td><?php if ($details->action == 'stock in') {echo $details->quantity_in;}else{echo '-';}?></td>
                    <td><?php if ($details->action == 'stock out') { echo $details->quantity_in;}else{ echo '-';}?></td>                   
                    <td><?php echo $details->stock_bal;?></td>
                    <td> <input type = "submit" name  = "submit" value= "&#xf055; update" class = "button"></td>
                   </tr>      
                 <?php endforeach;?>  
                </form> 
                </tbody>
              </table>

    </div><!--end of table-responsive -->
   </div>
  </div>
 </div><!--end of templatemo-content-->
</div><!--end of templatemo-content-wrapper-->






