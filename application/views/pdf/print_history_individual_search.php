<div>
  <?php foreach($print_details as $details): ?>  
  <h5>ITEM NAME:&nbsp;&nbsp;&nbsp;<?php echo $details->name ?></h5>
  <?php endforeach; ?>
</div>

        <table cellspacing="0" style="width: 93%; border: none; text-align: center; font-size: 9pt; padding:4px;margin-left:-25px;">
        <thead>
        <tr style="background-color:#e9e6e6; font-size: 9pt; text-align: center;">
        <th style="width: 15%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">DATE</th>
        <th style="width: 10%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">INVOICE # / PO #</th>
        <th style="width: 15%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">COMPANY NAME</th>
        <th style="width: 12%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">STOCK IN</th>
        <th style="width: 14%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">STOCK OUT</th>
        <th style="width: 13%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">STOCK BAL</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($print_details as $details): ?>  
            <tr style="border: solid 1px black;">
             <td style="width: 6%; border: solid 1px #000;"><?php echo $details->item_date ?></td>
             <td style="width: 16%; border: solid 1px #000;"><?php echo $details->invoice_no ?></td>
             <td style="width: 49%; border: solid 1px #000;"><?php echo $details->company_name ?></td>
             <td style="width: 6%; border: solid 1px #000;"><?php if ($details->action == 'stock in') {echo $details->quantity_in;}else{echo '-';}?></td>
             <td style="width: 10%; border: solid 1px #000;"><?php if ($details->action == 'stock out') { echo $details->quantity_in;}else{ echo '-';}?></td>                   
             <td style="width: 15%; border: solid 1px #000;font-weight:bold;color:red;font-size:14px;font-style:italic;"><?php echo $details->stock_bal;?></td>
           </tr>
             <?php endforeach; ?>
        </tbody>
     
    </table>
    