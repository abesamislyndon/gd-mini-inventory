
<table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th width = "25%"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;COMPANY NAME</th>
      <th width = "8%"><i class="fa fa-barcode"></i>&nbsp;&nbsp;STOCK IN</th> 
      <th width = "12%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;STOCK OUT</th>
      <th width = "14%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;STOCK BALANCE</th>
     </tr>
  </thead>

  <tbody>
    <?php foreach($transaction_details as $details): ?>
    <tr>
      <td><?php echo $details->company_name ?></td>
      <td><?php if ($details->action == 'stock in') {echo $details->quantity_in;}else{echo '-';}?></td>
      <td><?php if ($details->action == 'stock out') { echo $details->quantity_in;}else{ echo '-';}?></td>                   
      <td><?php echo $details->stock_bal;?></td>
    </tr>      
   <?php endforeach;?>  
  </tbody>
</table>

