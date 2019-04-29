	<?php   
error_reporting(0);
session_start();
include_once('config.php');

	?>
	<div class="clearfix"></div>
	<br/>
	  <div id="footer">
		<div class="footer-on">
				<div class="container-fluid">
				<p>&copy; All Rights Reserved.</p>
				
				</div><!--container-->
		</div>
		</div>
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
			<link rel="stylesheet" media="all" type="text/css" href="../css/jquery-ui-timepicker-addon.css" />
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  <!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->
  <!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>-->

		<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="../js/jquery-ui-sliderAccess.js"></script>

    <script>
  (function($){
	  $(document).ready(function(){
    $( "#datepicker" ).datepicker();
	
	 $( "#dob" ).datepicker();
	 $( "#from" ).datepicker();
	  $( "#to" ).datepicker();
	   $( "#from1" ).datepicker();
	  $( "#to1" ).datepicker();
	   $( "#spouse" ).datepicker();
	     $( "#spouse1" ).datepicker();
		 $( "#dep" ).datepicker();
		 
		 $("#d").datetimepicker({ dateFormat: 'yy-mm-dd'}).val(); 
		 $("#stdate").datetimepicker({ dateFormat: 'yy-mm-dd'}).val(); 
		 $("#date_e").datetimepicker({ dateFormat: 'yy-mm-dd'}).val();
		 $("#date_s").datetimepicker({ dateFormat: 'yy-mm-dd'}).val();
	  });
	  $('.nav li.dropdown').hover(function() {
		$(this).addClass('open');
	}, function() {
		$(this).removeClass('open');
	});
  })(jQuery);
  </script>
  <script>
	function fix_layout(){
    var wraph = document.getElementById('wrapper').offsetHeight;
    if(wraph<screen.height){ //if content is less than screenheight
        var headh   = document.getElementById('header').offsetHeight;
        var conth   = document.getElementById('content').offsetHeight;
        var footh   = document.getElementById('footer').offsetHeight;
        var foottop = screen.height - (headh + conth + footh);
        $("#footer").css({top:foottop+'px'});
    }
}

  </script>
  	
  </body>
</html>
