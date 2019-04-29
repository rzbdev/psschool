<?php

error_reporting(0);
session_start();
include_once('config.php');
include_once('admin_header.php'); 
date_default_timezone_set('Asia/Kolkata');
$date1= date("Y-m-d h:i:s"); 
if(!isset($_SESSION["alid"]))
{
	echo '<script type="text/javascript">';
	echo 'window.location.href ="login.php"';
	echo '</script>';
} 

	?>
	<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
	  <script type="text/javascript">
              bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
      </script>
	<div class="message1" id="testdiv" style="display:none;">Notification Added Successfully.</div>
<div class="clearfix"></div>
	
<div class="container-fluid">
  <div class="row">
  <div class="col-md-12">
  <h1 class="page-header">Add Notification</h1>
  	<div class="row ">
				<form class="online-form" action="add_notification.php" method="post" id="form">
				<div class="col-md-4">
					<div class="form-group">
					<label for="usr">Notification title:</label>
					
	<input type="text" class="form-control" id="usr" name="title"  value="<?php echo $row['title']; ?>" required /> 
				</div>
				</div>
				<div class="col-md-4">
				<div class="form-group">
				  <label for="usr">START DATE:</label>
				  <input type="text" class="form-control" class="" name="st_date" id="date_s" value="" required>
				</div>
				</div>
				<div class="col-md-4">
				<div class="form-group">
				  <label for="usr">EXPIRY DATE:</label>
				  <input type="text" class="form-control" class="" name="date" id="date_e" value="<?php echo $row['expiredate']; ?>" required>
				</div>
				</div>
				<div class="col-md-12">
				<div class="form-group">
				  <label for="usr">Notification Detail:</label>
				 <textarea class="form-control" rows="5" id="comment" name="detail"></textarea>
				</div>
					<div class="row" style="margin-bottom:20px;">
					    <div class="col-md-6 text-right">
						<a href="manage_notification.php?page=1" class="btn btn-grey" style="margin-top:0px;">Close</a>
						</div>
						<div class="col-md-6  text-left">
						<input type="submit" class="btn btn-blue" name="submit" value="save" style="margin-top:0px;">
						</div>
					</div>
					</div>
				</form>
				<?php   ?>
			</div>
		</div>
		</div>
		<div id='preloader' style='display:none'><img src='../images/pre-loader.gif'/></div>
	</div>
<div class="clearfix"></div>
</div>
<br/><br/>
<br/><br/>
<?php include_once('admin_footer.php');?>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function (e) {
	
	
	
    $('#form').on('submit',(function(e) {
        e.preventDefault();
		$('#preloader').show();
        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: $(this).attr('action'),
            data:formData,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
$('#preloader').hide();
var data = JSON.parse(data);
alert(data.message);
if(data.message=='Notification Added Successfully')
{
	window.location='manage_notification.php';
}
    document.getElementById("form").reset();

            },
			
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

   
});

</script>
