
      <footer class="templatemo-footer footer">
        <div class="templatemo-copyright">
          <p>MESAN ASIA PTE LTD ®</p>
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

<script>
  function getRandomColor() {
      var letters = '0123456789ABCDEF'.split('');
      var color = '#';
      for (var i = 0; i < 6; i++ ) {
          color += letters[Math.floor(Math.random() * 16)];
      }
      return color;
  }

    $(function() {
  var data = [
     <?php foreach($item_info as $value):?>
        {
          value: <?php echo $value->total ?>,
          color:getRandomColor(),
          highlight: "#FF5A5E",
          label: "<?php echo $value->cat_name ?>"
      },
      <?php endforeach;?>   

  ];
  var canvas = document.getElementById("hours");
  var ctx = canvas.getContext("2d");
  new Chart(ctx).Doughnut(data);

    });    
</script>

<script>
function getRandomColor() {
    var letters = '0123456789ABCDEF'.split('');
    var color = '#';
    for (var i = 0; i < 6; i++ ) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

  $(function() {
var data = [
    <?php foreach($top_item_quote as $value):?>
      {
        value:<?php echo $value->total ?>,
        color:getRandomColor(),
        highlight: "#FF5A5E",
        label: "<?php echo $value->name ?>"
    },
    <?php endforeach;?>   

];
var canvas = document.getElementById("hours1");
var ctx = canvas.getContext("2d");
new Chart(ctx).Doughnut(data);

  });    
</script>

 </body>
</html>