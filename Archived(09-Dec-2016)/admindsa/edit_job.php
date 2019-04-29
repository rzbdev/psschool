<?php
error_reporting(0);
session_start();
include_once('config.php');
include_once('admin_header.php'); 
$jobid = $_GET['jobid'];
if(!isset($_SESSION["alid"]))
{
	
	echo '<script type="text/javascript">';
	echo 'window.location.href ="login.php"';
	echo '</script>';
} 
function mysql_escape_mimic($inp) {
    if(is_array($inp))
        return array_map(__METHOD__, $inp);
    if(!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }
    return $inp;
} 
	?>
	<?php
if(isset($_POST['submit'])){
	$date11= date("Y-m-d h:i:s"); 
 $admin_name=$_SESSION['admin_name'];
 $admin_id=$_SESSION['alid'];
  $admin_id_email=$_SESSION['admin1'];
	$id=$_POST['nid'];
	$i=$_POST['d'];
	$title =mysql_escape_mimic($_POST['job']);
	$teaching =$_POST['teaching'];
	
 $update_job="UPDATE jobs SET title='$title',teching='$teaching' WHERE jobs_id=$i";
	 $result=mysql_query($update_job);
	 $log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin_id_email','$admin_id','','','18','','$date11','$admin_name')";
 $row1=mysql_query($log_sql);
	if($result){
		?>
			<script>
			alert("Job Updated Successfully");
			 $('#preloader').hide();
			
</script>			
      <?php echo '<script type="text/javascript">';
	echo 'window.location.href ="jobs.php?page=1"';
	echo '</script>';  
?>
<?php 

} }
?>


<div class="clearfix"></div>
<div class="container">
    <div class="login">
		<div class="row form-outer">
		<div class="f-heading" style="text-align:center;padding-top:10px;"><h1 style="margin-top:0px;">Edit Job</h1></div>
			<?php 
				$get_jobs="SELECT * FROM jobs where jobs_id = '$jobid'";
				$result_jobs=mysql_query($get_jobs);
				if(mysql_num_rows($result_jobs) > 0) 
				{
				 while($row = mysql_fetch_assoc($result_jobs)) { 
				 
				  $nid=$row['nid'];
				 $get_noti="SELECT * FROM notification where nid = '$nid'";
			$result_noti=mysql_query($get_noti);
			while($row_noti = mysql_fetch_assoc($result_noti))
			{
				$noti_name=$row_noti['title'];
			}
				 ?>
				
				 
				 
				 
				 
				<form class="online-form" action="" method="post">
				<div class="col-md-12">
					<div class="form-group">
					<label for="usr">Job Title:</label>
					<input type="text" class="form-control" id="usr" name="job" value="<?php echo $row['title']; ?>">
				   </div>
					<div class="form-group">
					  <label for="usr">Notification title:</label>
					  <input type="hidden" name="d" value="<?php echo $row['jobs_id']; ?>">
					  <input type="hidden" name="nid" value="<?php echo $row['nid']; ?>">
					   <input type="text" class="form-control" class="" name="nid_name" value="<?php echo $noti_name; ?>">
					</div>
					<div class="form-group">	
					<div class="col-md-12">	
					<div id='preloader' style='display:none'><img src='../images/pre-loader.gif'/></div>
					<div class="radio-inline">
					  <label><input type="radio" name="teaching" value="teaching" <?php if($row['teching']=="teaching") { echo "checked"; } ?>>TEACHING</label>
					</div>
					<div class="radio-inline">
					  <label><input type="radio" name="teaching" value="non-teaching" <?php if($row['teching']=="non-teaching") { echo "checked"; } ?>>NON-TEACHING</label>
					</div>
					</div>
					</div>
					
					<div class="row" style="margin-bottom:20px;">
					    <div class="col-md-6 text-center"><a href="jobs.php?page=1" class="btn btn-grey">Cancel</a></div>
						<div class="col-md-6 text-center load"><input type="submit" class="btn btn-blue" name="submit" value="Save"></div>
					</div>
					</div>
				</form>
				<?php } } ?>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<?php include_once('admin_footer.php');?>
<script>
$(function() {
$(".load").click(function(){	
$('#preloader').show();
});
});
</script>
