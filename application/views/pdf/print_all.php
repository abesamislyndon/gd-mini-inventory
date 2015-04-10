<div>
<h5>INVENTORY AS OF :&nbsp;&nbsp;&nbsp;<?php $today = date("F j, Y");  echo $today;?></h5>
</div>

<table cellspacing="0" style="width: 0%; border: none; text-align: center; font-size: 9pt; padding:4px;margin-left:-25px;">
        <thead>
        <tr style="background-color:#e9e6e6; font-size: 9pt; text-align: center;">
        <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">ITEM NAME</th>
        <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">BRAND</th>
        <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">CATEGORY</th>
        <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">ITEM NO</th>
        <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">SUGGESTED PRICE</th>
        <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">PURCHASE PRICE</th>
        <th style="width: 1%; border: solid 1px black;font-weight:bold; font-style:italic;font-size:9px;">ITEM BALANCE</th>
      
        </tr>
        </thead>
        <tbody>
            <?php 
                if(!empty($item_dashboard_details) ) {
               foreach($item_dashboard_details as $details): ?>  
            <tr style="border: solid 1px black;">
             <td style="width: 160px; border: solid 1px #000;"><?php echo $details->name ?></td>
             <td style="width: 60px; border: solid 1px #000;"><?php echo $details->brand ?></td>
             <td style="width: 40px; border: solid 1px #000;"><?php echo $details->cat_name ?></td>
             <td style="width: 20px; border: solid 1px #000;"><?php echo $details->item_no ?></td>
             <td style="width: 20px; border: solid 1px #000;"><?php echo $details->price ?></td>
             <td style="width: 20px; border: solid 1px #000;"><?php echo $details->item_pur_price ?></td>
             <td style="width: 20px; border: solid 1px #000;font-weight:bold;color:red;font-size:14px;font-style:italic;"><?php echo $details->item_quantity ?></td>
            </tr>
             <?php endforeach; }?>
        </tbody>
     
    </table>
    