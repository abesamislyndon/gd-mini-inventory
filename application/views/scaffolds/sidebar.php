<div class="navbar-collapse collapse templatemo-sidebar" id = "div1">
  <ul class="templatemo-sidebar-menu" id = "navigation">
    <li ><a href="<?php echo base_url();?>dashboard"><i class="fa fa-tachometer"></i>&nbsp;&nbsp;DASHBOARD</a></li>
    <li><a href="<?php echo base_url();?>main/inventory"><i class="fa fa-bar-chart"></i>&nbsp;&nbsp;INVENTORY</a></li>
    <li><a href="<?php echo base_url();?>item/add_item"><i class="fa fa-plus-square"></i>&nbsp;ADD NEW PRODUCT</a></li>
    <li><a href="<?php echo base_url();?>category/add_category"><i class="fa fa-folder-open"></i>&nbsp;ADD NEW CATEGORY</a></li>
    <li><a href="<?php echo base_url();?>quoteList"><i class="fa fa-archive"></i>&nbsp;&nbsp;QUOTE LIST</a></li>
    <li class="sub ">
      <a href="javascript:;">
         <i class="fa fa-users"></i>MANAGE USER<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
                <li><a href="<?php echo base_url();?>manageUser/add_user"><i class="fa fa-users"></i>&nbsp;&nbsp;   Add new user</a></li>
         </ul>  
     </li>
    <hr class = "sidebar-hr">
    <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;LOGOUT</a></li>
  </ul>
</div><!--/.navbar-collapse -->