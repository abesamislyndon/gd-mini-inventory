  <div class="templatemo-content-wrapper">
  <div class="templatemo-content">
    <div class = "row">
         <div class = "col-md-6 "></div>
            <div class = "col-md-6   search-div">
            </div>
      </div>     
      <div class = "confirm-div"></div>
         <hr class = "carved">
           <div class="row">
             <div class="col-md-12 details">
              <div class="table-responsive table-container" id = "search_result"> 
                <table class="table-main" id = "search_table">
                  <thead>
                    <tr>
                    <th width = "10%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;QUOTATION #</th> 
                     <th width = "20%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;CUSTOMER NAME</th> 
                     <th width = "20%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;COMPANY NAME</th> 
                     <th width = "20%" style = "font-size:11px"><i class="fa fa-suitcase"></i>&nbsp;&nbsp;ADDRESS</th>  
                     <th width = "12%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;CONTACT NUMBER</th>
                      <th width = "5%" style = "font-size:11px"><i class="fa fa-money"></i>&nbsp;&nbsp;VIEW</th>
                      <th width = "8%" style = "font-size:11px">&nbsp;&nbsp;DELETE</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($quote_list as $details): ?>
                  <tr class = "category-list">
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><?php echo $details->quotation_id ?></td>
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><?php echo $details->customer_name ?></td>
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><?php echo $details->company_name ?></td>
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><?php echo $details->address ?></td>
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><?php echo $details->customer_no ?></td>
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><a href="<?php echo base_url();?>quoteList/customer/<?php echo $details->quotation_id ?>" class = "button"><i class="fa fa-eye"></a></td>
                      <td style = "text-align:left;font-size:13px;text-transform:uppercase;"><a href="<?php echo base_url();?>quoteList/delete/<?php echo $details->quotation_id ?>" class = "button3"><i class="fa fa-trash"></i></a></td>
                  </tr>   
                 <?php endforeach;?>  
               </tbody>
            </table><!-- ****************************************** END OF TABLE FOR ALL LIST ITEMS ******************************* -->
      
          </div><!--end of table-responsive -->
        </div>


      </div>
    </div><!--end of templatemo-content-->
  </div><!--end of templatemo-content-wrapper-->





