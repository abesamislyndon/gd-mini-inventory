<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>SUPPLY CHAIN</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <?php echo link_tag('assets/css/templatemo_main.css'); ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
   <script src="<?php echo base_url();?>assets/js/Chart.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>

<script>
function searchItem(){
  xmlhttp= new XMLHttpRequest();
  xmlhttp.open("GET", "main/search_item?item="+document.form1.search_data.value,false);
  xmlhttp.send(null);
  document.getElementById("search_table").innerHTML=xmlhttp.responseText;
}
</script>
<script>
function goBack() {
    window.history.back()
}
</script>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  </script>
<script type="text/javascript">
$('#datepicker input').datepicker({
});
</script>

<script type="text/javascript"></script>
</head>

<body>
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><img src="<?php echo base_url();?>assets/img/logo.png"></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
        <h1 class = "nav-brand" >SUPPLY CHAIN INVENTORY STOCK & MANAGEMENT SYSTEM 1.0</h1>
      </div><!--navbar-header--> 
   </div><!--navbar-inverse-->
 <div class="template-page-wrapper wr">
