
      <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p>Supply Chain Inventory Stock & Management System 1.0</p>
        </div>
      </footer>
    </div>
 </div><!--main-wrapper-->

 <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
 <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
 <script src="<?php echo base_url();?>assets/js/templatemo_script.js"></script>
 <script src="<?php echo base_url();?>assets/js/core.js"></script>
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
 <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
 <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>


 

 <script type="text/javascript"> 
  $(document).ready(function(){
   $('confirm.div').hide();
    <?php if($this->session->flashdata('msg')){ ?>
    $('.confirm-div').html('<?php echo "<p>"."&nbsp;&nbsp;&nbsp;".$this->session->flashdata('msg');"</p>" ?>').fadeIn( "slow").fadeOut(4500);
    });
    <?php } ?>
 </script>

 <script type="text/javascript">
 $('[data-load-remote]').on('click',function(e) {
    e.preventDefault();
    var $this = $(this);
    var remote = $this.data('load-remote');
    if(remote) {
        $($this.data('remote-target')).load(remote);
    }
  });
 </script>

<script type="text/javascript">
 $(document).ready(function(){ 
 $(".delete_item").click(function(event){
     alert("Delete?");
     var href = $(this).attr("href");
     var btn = this;

      $.ajax({
        type: "GET",
        url: href,
        success: function(response) {

          if (response == "Success")
          {
            $(btn).closest('#tr<?php echo $details->name ?>').fadeOut("slow").remove();
          }
          else
          {
            alert("Error");
          }

        }
      });
     event.preventDefault();
   })
 });
</script> 

 </body>
</html>