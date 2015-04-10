  <div class="templatemo-content-wrapper">
  <div class="templatemo-content">
     <h1><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;CATEGORY</h1>
       <div class = "confirm-div"></div>
         <hr class = "carved">
           <div class="row">
             <div class="col-md-7 details">
              <div class="table-responsive table-container"> 
               <table class="table-main ">
                 <thead>
                  <tr>
                     <th width = "12%" style = "font-size:11px"><i class="fa fa-picture-o"></i>&nbsp;&nbsp;SNAPSHOT</th>
                     <th width = "20%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;ITEM NAME</th>
                     <th width = "15%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;BRAND</th>    
                     <th width = "15%" style = "font-size:11px"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;CATEGORY</th>
                     <th width = "12%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;SP (SGD)</th>
                     <th width = "20%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;QUANTITY</th>
                   </tr>
                 </thead>

              	<?php 
                 if( !empty($products)) {
                  foreach($products as $details): ?>
                  <tbody>
                  <tr id = "<?php echo $details['id']?>">
                    <td class ="img-atri"><img src="<?php echo base_url("uploads/")?>/<?php echo $details['img_name'].$details['ext'] ?>" class = "img-details"></td>
                    <td><?php echo $details['name'] ?></td>
                    <td><?php echo $details['brand'] ?></td>
                    <td><?php echo $details['item_category'] ?></td>
                    <td><?php echo $details['price'] ?></a></td>  
                    <td>
                    <?php echo form_open('item/add_cart_item'); ?>
                    <fieldset>
                       <input type = "text" name = "quantity" value = "1" class = "text_quote">
                       <input type = "hidden" name = "product_id" value = "<?php echo $details['id']?>">
                       <input type = "hidden" name = "cat" value = "<?php echo $details['id_cat']?>">
                       <input type  = "submit" name  = "add" class = "button-quote" value = "Add to Quote">
                     </fieldset>
                    <?php echo form_close(); ?>
                   </td>                 
                 </tr>      
               </tbody>
               <?php endforeach; }?><!--END OF FOREACH LOOP FOR ITEM FROM $item_dashboard_details ARRAY--> 
            </table><!-- ****************************************** END OF TABLE FOR ALL LIST ITEMS ******************************* -->

     
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
      </div>
    </form>     
  </div><!--end of table-responsive -->
</div>

<div class="col-md-5 details">

  <h5><i class="fa fa-briefcase"></i>&nbsp;<strong>QUOTATION LIST</strong></h5>
  <a href="<?php echo base_url();?>supplier_main" class = "con_browse" ><i class="fa fa-backward"></i>&nbsp;Continue Quote</a>
  <hr>
  <?php if(!$this->cart->contents()):echo 'You dont have any items to quote yet.';else:?>
 
  <?php echo form_open('item/do_edit'); ?>
    <table class="quote_cart">
      <thead>
        <tr>
          <th>QTY</th>
          <th>ITEM DESC.</th>
          <th>BRAND</th>
          <th>ITEM PRICE</th>
          <th>SUBTOTAL</th>
          <th></th>
       </tr>
      </thead>
        <tbody>
            <?php 
            $grand_total = 0; $i = 1;
            foreach($products as $items1):?>
            <input type = "hidden" name = "cat" class = "text_quote" value = "<?php echo $details['id_cat'] ?>">
            <?php endforeach; ?>
            <?php $i = 1; ?>
            <?php foreach($this->cart->contents() as $items): ?>
            <?php echo form_hidden('rowid[]', $items['rowid']); ?>
            <tr<?php if($i&1){ echo 'class="alt"'; }?>>
                <td> <input type = "text" name = "qty[]" class = "text_quote" value = "<?php echo $items['qty'];?>"></td>
                <td width = "20%"><?php echo $items['name']; ?></td>
                <td width = "10%" style = "font-size:10px"><?php echo $items['brand']; ?></td>
                <td>SGD&nbsp;&nbsp;<?php echo $this->cart->format_number($items['price']); ?></td>       
                <td colspan = "4">SGD&nbsp;&nbsp;<?php echo number_format($items['subtotal'],2) ?></td>
                <td class = "remove"><input type = "submit" value = "&#xf014;" class = "empty1" name = "remove"></td>
            </tr>
            <?php $grand_total = $grand_total + $items['subtotal']; ?>
            <?php $i++; ?>
            <?php endforeach; ?>
            <tr>
            <td colspan = "4">OVERALL TOTAL&nbsp;&nbsp;&nbsp;<strong><?php echo number_format($grand_total,2); ?></strong></td>
            </tr>  
        </tbody>
      </table>     
            <td class = "remove"><input type = "submit" value = "&#xf044;" class = "empty" name = "update"></td>
            <td class = "remove"><input type = "submit" value = "&#xf014;" class = "empty1" name = "delete"></td>
            <td><a href="<?php echo base_url();?>checkout" class = "empty2 tooltips" ><i class="fa fa-inbox"></i>&nbsp;<span>Place Quote</span></a></td>
            <?php echo form_close(); endif;?>
          </div>
       </div>
     </div><!--end of templatemo-content-->
  </div><!--end of templatemo-content-wrapper-->






