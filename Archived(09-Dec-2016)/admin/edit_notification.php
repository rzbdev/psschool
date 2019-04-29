<?php
error_reporting(0);
session_start();
include_once('config.php');
include_once('admin_header.php'); 
$nid = $_GET['nid'];
if(!isset($_SESSION["alid"]))
{
	
	echo '<script type="text/javascript">';
	echo 'window.location.href ="login.php"';
	echo '</script>';
} 
	?>
	<div class="message1" id="testdiv" style="display:none">Notification Updated Successfully.</div>
<div class="clearfix"></div>
<div class="container-fluid">
  <div class="row">
  <div class="col-md-12">
  <h1 class="page-header">Edit Notification</h1>
		<div class="row ">
	<?php 
					$get_jobs="SELECT * FROM notification where nid=$nid";
			
				    $result_jobs=mysqli_query($get_jobs);
				    while($row = mysqli_fetch_assoc($result_jobs))
				 {
					 $nid = $row['nid'];
					 	$title = $row['title'];
	$date =$row['date_ex'];
	$stdate =$row['start_date'];
	$detail =$row['detail'];
					 
				 }
					
					
			?>		
			
					
					<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> 
	  <script type="text/javascript">
              bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
      </script>		
				<form class="online-form" action="Update_notification.php" method="post" id="form">
					<div class="col-md-4">
				<div class="form-group">
					<label for="usr">Notification title:</label>
		             <input type="text" class="form-control" id="usr" name="title" value="<?php echo $title; ?>" required /> 
					<input type="hidden" class="form-control"  name="id" value="<?php echo $nid; ?>">
				</div>
				</div>
				<div class="col-md-4">
				<div class="form-group">
				  <label for="usr">START DATE:</label>
				  <input type="text" class="form-control" class="" name="st_date" id="stdate" value="<?php $to_arr = explode(" ",$stdate);
 $r8=$to_arr[0];
 echo $stdate;
				  ?>" >
				</div>
				</div>
				<div class="col-md-4">
				<div class="form-group">
				  <label for="usr">EXPIRY DATE:</label>
				  <input type="text" class="form-control" class="" name="date" id="d" value="<?php $to_arr = explode(" ",$date);
 $r8=$to_arr[0]; echo $date;
				  ?>" >
				</div>
				</div>
				<div class="col-md-12">
				<div class="form-group">
				  <label for="usr">Notification Detail:</label>
				 <textarea class="form-control" rows="5" id="comment" name="detail"><?php echo $detail; ?></textarea>
				</div>
		<div class="row">
		<div class="col-md-12 text-center"><input type="submit" class="btn btn-blue" name="submit" value="Update" style="margin-bottom:20px;">
						</div>
		</div>
					<!--<div class="row">
					<?php //$sele="SELECT * FROM notification WHERE date_ex >= DATE_FORMAT(NOW(),'%m/%d/%Y')";
		//$qu=mysqli_query($sele);
		//$q2=mysqli_num_rows($qu);
		//if(!$q2>0)
		//{
			//?>
	
						<div class="col-md-3"><input type="submit" class="btn btn-blue" name="submit" value="Update">
						</div>
					//	<?php
						
		//}
		//else
		//{
		//	?>
			<div class="col-md-3"><button type="button" class="btn btn-blue add" data-toggle="modal" data-target="#myModal">UPdate</button>
						</div>
			
		 
		//	<?php
		//	
		//}
			//?>

			</div> -->
			</div>
			 <div id='preloader' style='display:none'><img src='../images/pre-loader.gif'/></div>
				</form>
				
			</div>
		</div>
		</div>
	</div>
	</div>
<br/><br/>
<br/><br/>
<?php include_once('admin_footer.php');?>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog">
      <div class="modal-content" style="padding:32px; ">
     Notification is active at the moment.Fields cannot be Edited.
    </div>
   </div>
 </div>
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
if(data.message=='Notification Updated Successfully')
{
	window.location='manage_notification.php';
}

            },
			
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    }));

   
});

</script>

<script type='text/javascript'>
										$(document).ready(function(){
											$('.add').click(function(e) {
									
										setTimeout(function(){
					$('#myModal').modal('hide');
				}, 3000);
				 	
										});
										});
										</script>


