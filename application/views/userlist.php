


<div class="templatemo-content-wrapper">
  <div class="templatemo-content">
   <h1><i class="fa fa-users"></i>&nbsp;&nbsp;ADD NEW USER</h1>
      <hr class = "carved">
     <div class="col-md-12">
       <div class = "confirm-div"></div>
       <?php echo validation_errors(); ?>
   
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th style = "width:5%;">Action</th>
                </tr>
            </thead>
            <tbody>
             <?php if (isset($list) & ($list <> NULL)) {?>  
              <?php foreach ($list as $individual):?>   
                <tr>
                    <td ><?php echo $individual->full_name?></td>
                    <td ><?php echo $individual->username?></td>
                    <?php if($individual->role_code == "1"){ ?>
                        <td>admin</td>    
                     <?php }else{ ?>
                        <td>Supplier</td> 
                    <?php } ?>
                    <td>
                      <div class="btn-group pull-right">
                           <button type="button" class="button3 dropdown-toggle" data-toggle="dropdown">
                              <span class="caret"></span>
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="<?php echo base_url();?>manageUser/update_user/<?php echo $individual->id?>"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Edit Username</a></li>
                              <li><a href="<?php echo base_url();?>manageUser/update_user_pwd/<?php echo $individual->id?>"><i class="fa fa-key"></i></i>&nbsp;&nbsp;Edit Password</a></li>
                              <li><a href="<?php echo base_url();?>manageUser/del_user/<?php echo $individual->id?>" class  =  "delete_item" ><i class="fa fa-trash-o"></i>&nbsp;&nbsp;Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
               <?php endforeach;?>
               <?php }?>
            </tbody>
          </table>
          <br><br><br><br>
        </div>
      </div>
    </div>
  </div>


