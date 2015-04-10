  <div class="templatemo-content-wrapper">
  <div class="templatemo-content"> 
   <div class = "row">
         <div class = "col-md-6 "></div>
            <div class = "col-md-6   search-div">
              <button onclick="goBack()" class = "goback"><i class="fa fa-backward"></i>&nbsp;Back</button>
            </div>
      </div>      
      <div class = "confirm-div"></div>
         <hr class = "carved">
           <div class="row">
             <div class="col-md-6 details">
              <div class="table-responsive table-container" id = "search_result"> 
                 <H5>QUOTATION SUMMARY</H5>
                <table class="table-main" id = "search_table">
                    <thead>
                  <tr>
                     <th width = "20%"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;ITEM NAME</th>  
                     <th width = "12%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;SP (SGD)</th>
                     <th width = "20%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;QUANTITY</th>
                     <th width = "20%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;SUB TOTAL</th>
                   </tr>
                 </thead>
                  <tbody>
                  <?php foreach($quote_list as $details): ?>
                  <tr class = "category-list">
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><?php echo $details->item_name ?></td>
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><?php echo number_format($details->price, 2); ?></td>
                       <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><?php echo $details->quantity ?></td>
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><?php echo number_format($details->subtotal,2); ?></td>
                  </tr>   
                 <?php endforeach;?>  
               </tbody>
             </table><!-- ****************************************** END OF TABLE FOR ALL LIST ITEMS ******************************* -->
          
          </div><!--end of table-responsive -->
        </div>

      <div class="col-md-6 details">
              <div class="table-responsive table-container" id = "search_result"> 
                <H5>CUSTOMER CONTACT DETAILS</H5>
                <table class="table-main" id = "search_table">
                    <thead>
                  <tr>
                     <th width = "20%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;CUSTOMER NAME</th> 
                     <th width = "20%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;COMPANY NAME</th> 
                     <th width = "20%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;ADDRESS</th>  
                     <th width = "12%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;CONTACT NUMBER</th>
                   </tr>
                 </thead>
                  <tbody>
                  <?php foreach($name as $details): ?>
                  <tr class = "category-list">
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><?php echo $details->customer_name ?></td>
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><?php echo $details->company_name ?></td>
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><?php echo $details->address ?></td>
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><?php echo $details->customer_no ?></td>
                  </tr>   
                 <?php endforeach;?>  
               </tbody>
             </table><!-- ****************************************** END OF TABLE FOR ALL LIST ITEMS ******************************* -->
            
          </div><!--end of table-responsive -->
        </div>





      </div>
    </div><!--end of templatemo-content-->
  </div><!--end of templatemo-content-wrapper-->






