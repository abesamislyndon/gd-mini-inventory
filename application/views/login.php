<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>SUPPLY CHAIN</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <?php echo link_tag('assets/css/templatemo_main.css'); ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

  </head>
  <body>
  <div id="main-wrapper">
    <div class="template-page-wrapper nav_container">
      <?php $attribute = Array ("Class "=>"form-horizontal templatemo-signin-form");
      echo Form_open ("verifylogin", $attribute); ?>
       <div class ="login_container"> 
        <div class="form-group">
 
          <div class="col-md-12 ">
              <span class = "error"><?php echo validation_errors(); ?></span>
            <label for="username" class="col-sm-2 control-label1">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name =  "username" id="username" placeholder="Username" required>
            </div>
          </div>              
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="password" class="col-sm-2 control-label1">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control"  name = "password" id="password" placeholder="Password" required>
            </div>
          </div>
        </div>
       
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-10 col-sm-10">
              <br>
              <input type="submit" value="LOGIN" class="button">
            </div>
          </div>
        </div>
      </div>

        <div class="form-group trademarks">
          <div class="col-md-12">
            <p class = "footer-p">GOLDEN WORLD MACHINERY PTE LTD</p>
          </div>
        </div>
      
      </form>
    </div>
  </div>
</body>
</html>