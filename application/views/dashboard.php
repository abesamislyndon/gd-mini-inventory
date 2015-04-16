 <div class="templatemo-content-wrapper">
    <div class="templatemo-content">
      <div class = "confirm-div"></div>
        <hr class = "carved">

     
         
              <div class = "row">
                <div class="col-md-3">
                   <div class = "box">
                     <h5><i class="fa fa-suitcase"></i>&nbsp;&nbsp;NO. OF ITEMS PER CATEGORY</h5>
                      <hr class  = "box-hr">
                      <?php foreach($item_info as $value):?>
                      <ul>
                        <li><?php echo $value->cat_name ?>&nbsp;&nbsp;<strong><?php echo $value->total ?></strong></li>
                      </ul>
                      <?php endforeach;?>   
                   </div><!--end of box division--> 
                 </div>
                 
                 <div class="col-md-3">
                    <div class = "box">
                     <h5><i class="fa fa-pencil-square"></i>&nbsp;&nbsp;NO. OF QUOTES&nbsp;&nbsp;-&nbsp;&nbsp;<?php echo $data1;?></h5> 
                       <hr class  = "box-hr">
                         <?php foreach($customer as $value):?>
                        <ul>
                         <li><a href = "<?php echo base_url();?>quoteList/customer/<?php echo $value->quotation_id?>"><?php echo $value->customer_name ?></a></li>
                       </ul> 
                         <?php endforeach;?>
                    </div><!--end of box division--> 
                </div>

                <div class="col-md-6">
         

         <div class = "box">
                     <h5><i class="fa fa-suitcase"></i>&nbsp;&nbsp;NO. OF ITEM QUOTED</h5>
                      <hr class  = "box-hr">
                      <?php foreach($top_item_quote as $value):?>
                      <ul>
                        <li><?php echo $value->name ?>&nbsp;&nbsp;<strong>(&nbsp;<?php echo $value->total ?>&nbsp;TIMES&nbsp;)</strong></li>
                      </ul>
                      <?php endforeach;?>   
                   </div><!--end of box division--> 


                 </div>  
            </div><!--end of row-->

         <div class="row">
             <div class="col-md-12">
                   <div class = "box">
                     <h5><i class="fa fa-pencil-square"></i>&nbsp;&nbsp;0 Balance item</h5>
                       <hr class  = "box-hr">
                           <ul>
                        <?php foreach($zero_bal as $value):?>
                    
                        <li><?php echo $value->name ?></li>
                       
                        <?php endforeach;?>
                         </ul>  
                     </div><!--end of box division--> 
              </div> 

               <div class="col-md-6">
                 <div class="panel panel-success">
                   <div class="panel-heading">NO. OF ITEMS PER CATEGORY IN CHART</div>
                    <div class = "chart">
                       <canvas id="hours" width="250" height="300"></canvas>
                    </div>
                 </div>                       
                </div>
              <div class="col-md-6">
                 <div class="panel panel-success">
                   <div class="panel-heading">NO. OF ITEM QUOTED IN CHART</div>
                    <div class = "chart">
                       <canvas id="hours1" width="250" height="300"></canvas>
                    </div>
                 </div>                       
                </div>
             </div>
       </div><!--end of templatemo-content-->
  </div><!--end of templatemo-content-wrapper-->






