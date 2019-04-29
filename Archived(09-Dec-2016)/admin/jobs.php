<!DOCTYPE html>
<?php 
error_reporting(0);
session_start();
include_once('config.php');
include_once('admin_header.php');
if(!isset($_SESSION["alid"]))
{
	echo '<script type="text/javascript">';
	echo 'window.location.href ="login.php"';
	echo '</script>';
}  
function mysqli_escape_mimic($inp) {
    if(is_array($inp))
        return array_map(__METHOD__, $inp);
    if(!empty($inp) && is_string($inp)) {
        return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
    }
    return $inp;
}
$date11= date("Y-m-d h:i:s"); 
 $admin_name=$_SESSION['admin_name'];
 $admin_id=$_SESSION['alid'];
  $admin_id_email=$_SESSION['admin1'];
$select2="SELECT *  FROM notification WHERE status='1'";
	$row2=mysqli_Query($select2);
    $rc=mysqli_num_rows($row2);
	$ro=mysqli_fetch_array($row2);
		$nidddd=$ro['nid'];
?>

<button type="button" style="display:none" class="btn btn-default btn-sm" id="pop" data-toggle="modal" data-target="#myModal"></button>
<div class="clearfix"></div>
	<div class="container-fluid relative">
		<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">Manage Jobs</h1>
		</div>
		<div class="clearfix"></div>
		<div class="show-rcord">
		<div class="success_msg" id="deletesuccess"><?php echo $msg;?></div>
		    <div class="col-md-6" style="margin-bottom:20px;">
			<form class="form-inline" action="" method="post">
			  <div class="form-group">
				 <input type="text" class="form-control" name="title"  value="<?php echo htmlentities($job) ?>" id="inputkeyword" placeholder="Search by title...." onkeyup="clearnow()">
			  </div>
			  <button type="submit" class="btn srch" name="search">Search</button>
			  <?php 
						if(isset($_POST['search'])){
$job = $_POST['title'];		?>					
						<input class="btn srch" type="submit" value ="Clear" name="clear">
						 <?php
						 } else {?>
						 	<input class="btn srch" style="display:none" type="submit" value = "Clear" name="clear" id="clear">
						
						 <?php } ?>
			</form>
			</div>
			
			<div class="col-md-6" style="margin-bottom:20px;">
			<!--<a href="old_jobs.php?page=1"  class="btn  btn-lg srch pull-right">OLD JOBS</a>-->
			<button type="button" class="btn  btn-lg srch pull-right" data-toggle="modal" data-target="#myModal">ADD JOBS</button>
  <?php 
  if(isset($_POST['submit']))
  {
	$title =mysqli_escape_mimic($_POST['job']);
	$teaching =$_POST['teaching'];
	$post=$_POST['post'];
	 $sql1="SELECT * FROM jobs where title='$title' and nid='$post'";
  $row2=mysqli_query($sql1);
  if(mysqli_num_rows($row2)>0)
  {
	    ?>
	<script type="text/javascript"> 
      alert("Job name already exist");
    </script>
	  <?php 
  }
  else{
	  $sql="INSERT INTO jobs(`title`, `nid`, `teching`) VALUES ('$title','$post','$teaching')";
  $row=mysqli_query($sql);
  $log_sql="insert into log_eligible_table(admin_email,admin_id,user_name,user_id,comment,eligible_status,dt_created,name) values('$admin_id_email','$admin_id','','','16','','$date11','$admin_name')";
   $row1=mysqli_query($log_sql);
  if($row)
  {
	  
	  
	  
	  
	  ?>
	   <script type="text/javascript"> 
	   
      alert("Job Added Successfully");
	  $('#preloader').hide();
    </script>
	  <?php 
	  
  }
  }
  }
	
  
  else{
	 // echo "Something went wrong!";
  }
  
  ?>
  
  <!-- Form to add jobs-->
<form method="POST"  name="form">
  <div class="modal fade add-job-popup" id="myModal" role="dialog">
    <div class="modal-dialog">
          <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD JOBS</h4>
        </div>
        <div class="modal-body">
		<div class="form-group">
  <label for="usr">Notification:</label>
  <select class="form-control required jobs" id="apply_post" name="post" placeholder="" required>
							
							<option value="">Select Notification</option>
							
							<?php 
							
							$select="SELECT * FROM notification ";
							$rows=mysqli_query($select);
							 $r=mysqli_num_rows($rows);
							while($row=mysqli_fetch_array($rows))
							{
							?>
							<option value="<?php echo $row['nid'];?>"><?php echo $row['title']; ?></option>
							<?php 
							}  
							?>
							</select>
</div>
 <div class="form-group">
  <label for="usr">JOB TITLE:</label>
  <input type="text" class="form-control" id="usr" name="job" required/>
</div>
<div class="col-md-12">
<label class="radio-inline"><input type="radio" name="teaching" value="teaching">TEACHING</label>
<label class="radio-inline"><input type="radio" name="teaching" value="non-teaching">NON-TEACHING</label>
</div>
<div id='preloader' style='display:none'><img src='../images/pre-loader.gif'/></div>
<br>
<div class="form-group">
<button type="submit" class="btn btn-blue load" name="submit">Submit</button>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 
  </form>

			</div>	
			</div>	
			<div class="clearfix"></div>
			<?php
			if($r>0)
			{
				?>
			<div class="col-md-12">
			
			   <div class="table-responsive no-scroll">
			  
			<table class="table table-strip table-bordered show-data datatable table-res" id="example">
				<thead>
				<th>S.No</th>
				<th>Job Title</th>
				
				<th align="center" style="text-align:center;">Notification Title</th>
				<th align="center" style="text-align:center;">Applied For</th>
				<th align="center" style="text-align:center;">Action</th>
				</thead>
				
				<tbody>
				
				<?php 
				if(isset($_POST['search'])){
					$job = $_POST['title'];
					$get_jobs="SELECT * FROM jobs WHERE title LIKE '%$job%' and nid='$nidddd' ";
				}
				else{
				$get_jobs="select * from jobs where nid IN(SELECT nid FROM notification WHERE status='1')";
					
				}
$start_from1=$start_from;
				$result_jobs=mysqli_query($get_jobs);
				if(mysqli_num_rows($result_jobs) > 0) 
				{
				 while($row = mysqli_fetch_assoc($result_jobs)) { 
				
				 ?>
				<tr class="record"> 
				<td><?php echo ++$start_from1; ?></th>
				<th scope="row"><?php echo $row['title']; ?></th>
				
				<?php $nid=$row['nid']; ?>
				<?php 
				$get="SELECT `nid`, `title`, `date_ex`, `detail` FROM `notification` WHERE nid=$nid";
				$resu=mysqli_query($get);
				if($rows = mysqli_fetch_array($resu))
				{
					
					$title=$rows['title'];
				}
				?>
				<td align="center"><?php echo $title; ?> </td>
				<td class="cptl" align="center"><?php echo $row['teching']; ?></td>
				<td align="center">
				<a href="edit_job.php?jobid=<?php echo $row['jobs_id']; ?>"><button type="button" class="btn btn-default btn-sm " ><span class="glyphicon glyphicon-zoom-in " aria-hidden="true"></span> EDIT</button></a>	
					
				<button class="btn btn-default btn-sm job_del" id="<?php echo $row['jobs_id']; ?>">DELETE</button></td>
				</tr>
				<?php }
				} else{
					 // $msg='There is no active notification at the moment';
				 } ?>
				 
				</tbody>
				
				</table>

				</div>
				</div>
							<div class="col-md-12 margin-top">
				 <p><b>Note</b>:Showing list Of jobs put under active notification.</p></div>		<br/>
			<?php 
				if($msg=='There is no active notification at the moment')
				{
 ?>					
 <div class="col-md-12">
 <h3 id="msg2" class="text-center no_data"><?php echo $msg;?></h3>
 </div>
<?php 
				}
				?>
				
				<?php
				
			}
			else
			{
				?>
				 <div class="col-md-12">
			<h3 id="msg2" class="text-center no_data">There is no active notification at the moment</h3>	
			</div>
			<?php 	
			}
			?>
		</div>
		<div class="clearfix"></div>
		</div>
		</div>
				<br/><br/>
  <?php include_once('admin_footer.php');?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(function() {
$(".load").click(function(){	
$('#preloader').show();
});
$(".job_del").click(function(){
	
var element = $(this);
var job_id = element.attr("id");
var info = 'job_id=' + job_id;
if(confirm("Are you sure you want to delete this Record?")){
    $.ajax({
        type: "POST",
        url: "delete_jobs.php",
        data: info,
        success: function(data)
          {   
            
          }
});
    $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
    .animate({ opacity: "hide" }, "slow");
}
return false;
});
});
$(function() {
		$('#clear').click(function(e){
	e.preventDefault();
	$('#inputkeyword').val('');
			$('#clear').hide();
			
			
});
});	
</script>
	

  <script src="jquery.dataTables.min.js"></script>
<script src="dataTables.bootstrap.min.js "></script>
		<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$('#example').dataTable({
			oLanguage: {
        sProcessing: "<img src='../images/pre-loader.gif'>"
    },
    processing : true
		});
		
	 });
	 })(jQuery);
</script>
 <script type="text/javascript">

function clearnow(){
	var date2 = $('#inputkeyword').val();
	if(date2!="")
	{
		$('#clear').show();
	}
	else{
		$('#clear').hide();
	}
}
clearnow();
</script>