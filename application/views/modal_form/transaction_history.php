
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th width = "10%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;DATE</th>
        <th width = "13%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;INVOCE / P.O.</th>
        <th width = "25%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;COMPANY NAME</th>
        <th width = "13%" style = "font-size:11px"><i class="fa fa-barcode"></i>&nbsp;&nbsp;STOCK IN</th> 
        <th width = "12%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;STOCK OUT</th>
        <th width = "14%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;STOCK BALANCE</th>
         <th width = "14%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;EDIT</th>
       </tr>
    </thead>

    <tbody>
     <?php foreach($print_details as $details): ?>
      <div>
      <a href="<?php echo base_url();?>create_pdf/print_history/<?php echo $details->id ?>" target = "_blank"><i class="fa fa-print">&nbsp;</i></a>
      </div>
     <?php endforeach;?>  
      <br><br>
        <?php foreach($transaction_details as $details): ?>
      <tr>
        <td><?php echo $details->item_date ?></td>
         <td><?php echo $details->invoice_no ?></td>
        <td><?php echo $details->company_name ?></td>
        <td><?php if ($details->action == 'stock in') {echo $details->quantity_in;}else{echo '-';}?></td>
        <td><?php if ($details->action == 'stock out') { echo $details->quantity_in;}else{ echo '-';}?></td>                   
        <td><?php echo $details->stock_bal;?></td>
        <td><a href="<?php echo base_url()?>transaction/update_history/<?php echo $details->transaction_id?>">edit</a></td>
      </tr>      
     <?php endforeach;?>  
    </tbody>
  </table>
  

